<?php
/**
 * Created by PhpStorm.
 * UserModel: jqwu
 * Date: 2017/10/29
 * Time: 14:05
 */
namespace Home\Controller;
use Think\Controller;


class AdminController extends Controller
{
    public function index(){

        $this->userManager();
    }

    public function userManager(){
        $this->assign(['user' => $this->getUser()]);
        return $this->display('users_manager');
    }

    public function adminManager(){

        $this->assign(['user' => $this->getUser()]);
        return $this->display('admin_manager');
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