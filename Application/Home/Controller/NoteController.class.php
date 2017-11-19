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
    var $user=null;
    public function newNote(){
        $this->getUser();
        $this->assign(['user' => $this->user,'hideWarn' => 'hide']);
        return $this->display('new_note');
    }

    public function createNote(){
        $this->getUser();
        $this->assign(['user' => $this->user]);

        $data['title'] = I('post.title');
        $data['content'] = I('post.content');
        $data['note_stat'] = 1;//默认公开

        if($data['title']==""){
            $this->assign(['warning' => '标题不能为空']);
            return $this->display('new_note');
        }else if($data['content']==""){
            $this->assign(['warning' => '正文不能为空']);
            return $this->display('new_note');
        }
        if(I('post.private')=='on'){
            $data['note_stat'] = 0;//私有
        }
        $data['create_time'] = $data['modify_time'] = date('Y-m-d H:i:s',time());
        $data['uid'] = session('id');
        //将note数据保存到数据库
        $note = M('note');
        $note->add($data);
        echo $data;
    }

    public function newNotebook(){
        $this->getUser();
        $this->assign(['user' => $this->user]);
        return $this->display('new_notebook');
    }

    public function createNotebook(){
        $data['title'] = I('post.title');
        if($data['title']=="")
            $this->noteByBook();
        $data['uid'] = session('id');
        $data['create_time'] = $data['modify_time'] = date('Y-m-d H:i:s',time());
        //将notebook数据保存到数据库
        $notebook = M('notebook');
        $notebook->add($data);
        $this->noteByBook();

    }

    public function noteByBook(){
        $this->getUser();
        $this->assign(['user' => $this->user]);
        $notebook = M('notebook');
        $condition['uid'] = session('id');
        $data = ($notebook->where($condition)->select());
        $this->assign(['books' => $data]);
        return $this->display('note_by_book');
    }

    public function noteByTime(){
        return $this->display('note_by_time');
    }

    public function noteByTag(){
        return $this->display('note_by_tag');
    }


    private function getUser(){
        $id = session('id');
        if($id==0)
            return $this->redirect("Index/index");
        $User = M('User');
        $condition['id'] = $id;
        $data = ($User->where($condition)->select());

        $this->user = $data[0];
        $this->user['img_url'] = "/public/images/temp/ui-sam.jpg";
    }
}