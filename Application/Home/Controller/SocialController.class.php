<?php
/**
 * Created by PhpStorm.
 * UserModel: jqwu
 * Date: 2017/12/5
 * Time: 14:09
 */
namespace Home\Controller;
use Think\Controller;


class SocialController extends Controller
{

    public function myShare(){
        $Model = new \Think\Model();
        $sql = "SELECT * FROM share s, note n, user u 
WHERE s.uid_from=".session('id')." AND s.nid=n.id AND u.id=s.uid_to 
ORDER BY s.share_time DESC;";
        $data = $Model->query($sql);


        $this->assign(['user' => $this->getUser(),'shares'=>$data]);
        $this->display('my_share');
    }

    public function otherShare(){
        $Model = new \Think\Model();
        $sql = "SELECT * FROM share s, note n, user u 
WHERE s.uid_to=".session('id')." AND s.nid=n.id AND u.id=s.uid_from 
ORDER BY s.share_time DESC;";
        $data = $Model->query($sql);

        $this->assign(['user' => $this->getUser(),'shares'=>$data]);
        $this->display('other_share');
    }

    public function publicNote($keyword=""){
        $Model = new \Think\Model();
        $sql = 'SELECT * FROM note n, user u 
WHERE n.note_stat=1 AND n.title LIKE "%'.$keyword.'%" AND n.uid=u.id 
ORDER BY n.modify_time DESC;';

//        if($keyword==""){
//            $sql='SELECT * FROM note n, user u
//WHERE n.note_stat=1 AND n.title LIKE "%'.$keyword.'%" AND n.uid=u.id
//ORDER BY n.modify_time DESC LIMIT 3;';
//        }
        $data = $Model->query($sql);

        $this->assign(['user' => $this->getUser(),'notes'=>$data]);
        $this->display('public_note');
    }

    public function searchNote(){
        $keyword = I('post.key');
        $this->publicNote($keyword);
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