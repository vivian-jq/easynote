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
    var $user=null;

    public function index(){
        $this->getUser();
        $this->assign(['user' => $this->user]);
        return $this->display('index');
    }

    public function photoUpload(){
//        return $this->display('profile');
    }

    public function saveProfile(){
//        return $this->display('profile');
    }

    public function profile(){
        $this->getUser();
        $this->assign(['user' => $this->user]);
        return $this->display('profile');
    }

    public function profileModify(){
        $this->getUser();
        $this->assign(['user' => $this->user]);
        return $this->display('profile_modify');
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