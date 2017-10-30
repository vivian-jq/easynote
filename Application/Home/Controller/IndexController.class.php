<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->assign(['hideWarn' => 'hide']);
        $this->display('login');
    }

    public function login(){
        $username = I('post.username');
        $password = I('post.password');
        $warning = '';

        $user = M('User');
        $condition['username'] = $username;
        $data = ($user->where($condition)->select());

        if($data){
            if($data[0]['password']==md5($password))
                $this->redirect('HomePage/show',['id'=>$data[0]['id']]);
            else{
                $warning = '密码错误，请重新输入';
            }
        }else{
            $warning = '用户名不存在';
        }
        $this->assign(['username' => $username,'warning' => $warning,'hideWarn' => '']);
        $this->display('login');
    }

}