<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->assign(['hideWarn' => 'hide']);
        $this->display('login');
    }

    public function newAccount(){
        $this->assign(['hideWarn' => 'hide']);
        $this->display('new_account');
    }

    public function create(){
        $username = I('post.username');
        $password1 = I('post.password1');
        $password2 = I('post.password2');

        $user = M('User');
        $condition['username'] = $username;
        $s_data = ($user->where($condition)->select());

        if($s_data){
            $this->assign(['warning' => '该用户名已被使用']);
            $this->display('new_account');
        }
        if($password1!=$password2){
            $this->assign(['warning' => '密码不一致']);
            $this->display('new_account');
        }
        $data['username'] = $username;
        $data['password'] = md5($password1);
        $this->redirect('HomePage/index', ['id' => $user->add($data)]);
    }

    public function login(){
        $username = I('post.username');
        $password = I('post.password');
        $warning = '';

        $user = M('User');
        $condition['username'] = $username;
        $data = ($user->where($condition)->select());

        if($data){
            if($data[0]['password']==md5($password)){
                session('id',$data[0]['id']);
                if($username=='admin') {
                    $this->redirect('Admin/index');
                }
                $this->redirect('HomePage/index');
            }else{
                $warning = '密码错误，请重新输入';
            }
        }else{
            $warning = '用户名不存在';
        }
        $this->assign(['username' => $username,'warning' => $warning,'hideWarn' => '']);
        $this->display('login');
    }

    public function logout(){
        session('id',0);
        $this->index();
    }

}