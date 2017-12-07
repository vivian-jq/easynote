<?php
/**
 * Created by PhpStorm.
 * UserModel: jqwu
 * Date: 2017/10/29
 * Time: 14:05
 */
namespace Home\Controller;
use function Sodium\add;
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

    public function noteByBook($title=""){
        $notebook = M('notebook');
        $condition['uid'] = session('id');
        $condition['title']=array('like','%'.$title.'%');
        $data = ($notebook->where($condition)->select());
        $this->assign(['books' => $data,'user' => $this->getUser()]);
        $this->display('notebooks');
    }

    public function searchByBook(){
        $title=I('post.title');
        $this->noteByBook($title);
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
        if(count($data)==0||$data[0]['uid']!=session('id')){
            $this->redirect('index/warning');
        }
        $data[0]['stat']=($data[0]['note_stat']==1)?'公开':'私有';
        $data[0]['content']=htmlspecialchars_decode($data[0]['content']);

        $Model = new \Think\Model();
        $sql="SELECT c.*,u.username
FROM comment c, user u 
WHERE u.id=c.uid AND c.nid=".$nid.";";
        $cmts = $Model->query($sql);
        $this->assign(['user' => $this->getUser(),'note'=>$data[0],'comments'=>$cmts]);
        $this->display('note');
    }

    public function editNote($nid){
        $note = M('note');
        $condition['id']=$nid;
        $data = $note->where($condition)->select();

        if(count($data)==0||$data[0]['uid']!=session('id')){
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

    public function shareNote(){
        $data['uid_from'] = session('id');
        $data['nid'] = I('post.nid');
        $data['uid_to'] = I('post.uid');
        $data['reason'] = I('post.reason');
        $data['share_time'] = date('Y-m-d H:i:s',time());
        $data['share_stat'] = I('post.share_stat');

        $share = M('share');
        $share->add($data);
        $this->redirect('Social/myShare');

    }

    public function validate(){
        $uid = I('post.uid');
        $user = M('user');
        $condition['id']=$uid;
        $data = $user->where($condition)->select();
        if(count($data)>0)
            $this->ajaxReturn("true");
        else{
            $this->ajaxReturn("false");
        }
    }

    public function noteByTime(){
        $note = M('note');
        $condition['uid']=session('id');
        $data=($note->where($condition)->order('modify_time desc')->select());

        $this->assign(['user' => $this->getUser(),'notes'=>$data]);
        $this->display('note_by_time');
    }

    public function noteByTag($tag=""){
        $note = M('note');
        $condition['uid']=session('id');
        $condition['tags']=array('like','%'.$tag.'%');
        $data=($note->where($condition)->select());

        if($tag!=""){
            $data_tag[$tag]=$data;
            $this->assign(['user' => $this->getUser(),'notesTag'=>$data_tag]);
            $this->display('note_by_tag');
        }

        $allTags = "";
        foreach($data as $note){
            $allTags=$allTags.'；'.$note['tags'];
        }
        $tags=array_unique(explode("；",$allTags));
        $data_tag = array();

        foreach($tags as $tag){
            $temp = array();
            if($tag==""){
                foreach ($data as $note){
                    if($note['tags']=="")
                        $temp[]=$note;
                }
                $data_tag['无标签']=$temp;
            }else{
                foreach ($data as $note){
                    if(($note['tags']!="")&&stripos('；'.$note['tags'],$tag))
                        $temp[]=$note;
                }
                $data_tag[$tag]=$temp;
            }
        }

        $this->assign(['user' => $this->getUser(),'notesTag'=>$data_tag]);
        $this->display('note_by_tag');
    }

    public function searchByTag(){
        $tag=I('post.tag');
        $this->noteByTag($tag);
    }

    private function getUser(){
        $id = session('id');
        if($id==0)
            return $this->redirect("Index/index");
        $User = M('User');
        $condition['id'] = $id;
        $data = ($User->where($condition)->select());

        $user = $data[0];
        return $user;
    }
}