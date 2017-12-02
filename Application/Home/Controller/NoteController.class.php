<?php
/**
 * Created by PhpStorm.
 * UserModel: jqwu
 * Date: 2017/10/29
 * Time: 14:05
 */
namespace Home\Controller;
use Think\Controller;


class NoteController extends Controller
{
    public function newNote(){
        $notebook = M('notebook');
        $condition['uid'] = session('id');
        $data = ($notebook->where($condition)->select());

        $this->assign(['user' => $this->getUser(),'hideWarn' => 'hide','books'=>$data]);
        $this->display('new_note');
    }

    public function createNote(){
        $this->assign(['user' => $this->getUser()]);

        $data['title'] = I('post.title');
        $data['content'] = I('post.content');
        $data['note_stat'] = 1;//默认公开

        if($data['title']==""){
            $this->assign(['warning' => '标题不能为空']);
            return $this->display('new_note');
        }else if($data['content']==""){
            $this->assign(['warning' => '正文不能为空']);
            $this->display('new_note');
        }
        if(I('post.private')=='on'){
            $data['note_stat'] = 0;//私有
        }
        $data['create_time'] = $data['modify_time'] = date('Y-m-d H:i:s',time());
        $data['tags']=I('post.tags');
        $data['bid']=I('post.notebook');
        $data['uid'] = session('id');
        //将note数据保存到数据库
        $note = M('note');
        $this->note($note->add($data));
    }

    public function createNotebook(){
        $data['title'] = I('post.title');
        if($data['title']=="")
            $this->noteByBook();
        $data['uid'] = session('id');
        $data['create_time'] = $data['modify_time'] = date('Y-m-d H:i:s',time());
        //将notebook数据保存到数据库
        $data['note_stat']=I('post.private');
        $notebook = M('notebook');
        $notebook->add($data);
        $this->noteByBook();



    }

    public function noteByBook(){
        $notebook = M('notebook');
        $condition['uid'] = session('id');
        $data = ($notebook->where($condition)->select());
        $this->assign(['books' => $data,'user' => $this->getUser()]);
        $this->display('notebooks');
    }

    public function notebook($bid){
        $note = M('note');
        $notebook = M('notebook');
        $condition1['bid']=$bid;
        $data = ($note->where($condition1)->select());
        $condition2['id']=$bid;
        $book = ($notebook->where($condition2)->select())[0];

        if(count($data)!=0&&$data[0]['uid']!=session('id')){
            $this->redirect('index/warning');
        }

        $this->assign(['user' => $this->getUser(),'notes'=>$data, 'notebook'=>$book]);
        $this->display('note_by_book');
    }

    public function deleteNote($nid){
        $note = M('note');
        $condition['id']=$nid;
        $data = $note->where($condition)->select();
        if(count($data)==0||$data[0]['uid']!=session('id')){
            $this->redirect('index/warning');
        }
        $note->where($condition)->delete();
        $this->notebook($data[0]['bid']);
    }

    public function note($nid){
        $note = M('note');
        $condition['id']=$nid;
        $data = $note->where($condition)->select();
        if(count($data)==0||($data[0]['note_stat']==0&&$data[0]['uid']!=session('id'))){
            $this->redirect('index/warning');
        }
        $data[0]['stat']=($data[0]['note_stat']==1)?'公开':'私有';
        $data[0]['content']=htmlspecialchars_decode($data[0]['content']);
        $this->assign(['user' => $this->getUser(),'note'=>$data[0]]);
        $this->display('note');
    }

    public function editNote($nid){
        $note = M('note');
        $condition['id']=$nid;
        $data = $note->where($condition)->select();
        if(count($data)==0||($data[0]['note_stat']==0&&$data[0]['uid']!=session('id'))){
            $this->redirect('index/warning');
        }
        $data[0]['stat']=($data[0]['note_stat']==1)?'':'checked';
        $data[0]['content']=htmlspecialchars_decode($data[0]['content']);

        $notebook = M('notebook');
        $condition2['uid'] = session('id');
        $books = ($notebook->where($condition2)->select());

        $this->assign(['user' => $this->getUser(),'note'=>$data[0],'books'=>$books]);
        $this->display('edit_note');
    }

    public function updateNote(){
        $note = M('note');
        $condition['id']=I('post.id');
        $data['content']=I('post.content');
        $data['title']=I('post.title');
        $data['modify_time'] = date('Y-m-d H:i:s',time());
        $data['note_stat']=I('post.private');
        $data['bid']=I('post.notebook');
        $data['tags']=I('post.tags');
        $note->where($condition)->save($data);
        $this->note($condition['id']);
    }

    public function noteByTime(){
        $note = M('note');
        $condition['uid']=session('id');
        $data=($note->where($condition)->order('modify_time desc')->select());

        $this->assign(['user' => $this->getUser(),'notes'=>$data]);
        $this->display('note_by_time');
    }

    public function noteByTag(){
        $this->display('note_by_tag');
    }


    private function getUser(){
        $id = session('id');
        if($id==0)
            return $this->redirect("Index/index");
        $User = M('User');
        $condition['id'] = $id;
        $data = ($User->where($condition)->select());

        $user = $data[0];
        $user['img_url'] = "/public/images/temp/ui-sam.jpg";
        return $user;
    }
}