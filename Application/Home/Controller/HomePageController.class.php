<?php
/**
 * Created by PhpStorm.
 * UserModel: jqwu
 * Date: 2017/10/29
 * Time: 14:05
 */
namespace Home\Controller;
use Think\Controller;


class HomePageController extends Controller
{
    public function index($id=1){
        $user = $this->getUser($id);
        $this->assign(['user' => $user]);
        return $this->display('index');
    }

    public function newNote(){
        return $this->display('new_note');
    }

    public function newNotebook(){
        return $this->display('new_notebook');
    }

    public function noteByBook(){
        return $this->display('note_by_book');
    }

    public function noteByTime(){
        return $this->display('note_by_time');
    }

    public function noteByTag(){
        return $this->display('note_by_tag');
    }

    public function friends(){
        return $this->display('friends');
    }

    public function friendShare(){
        return $this->display('friend_share');
    }

    public function myShare(){
        return $this->display('my_share');
    }

    public function logout(){
        return $this->redirect('Index/index');
    }

    private function getUser($id=1){
        $User = M('User');
        $condition['id'] = $id;
        $data = ($User->where($condition)->select());

        $user = $data[0];
        $user['img_url'] = "/public/images/temp/ui-sam.jpg";
        return $user;
    }
}