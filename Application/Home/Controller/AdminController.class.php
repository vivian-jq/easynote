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
        $user = M('user');
        $condition['auth']=1;
        $data = $user->where($condition)->select();

        $this->assign(['user' => $this->getUser(),'users'=>$data]);
        return $this->display('users_manager');
    }

    public function editPassword(){
        $user=M('user');

        if(I('post.password1')!=''&&(I('post.password1')==I('post.password2'))){
            $password = md5(I('post.password1'));
            $condition['id']=I('post.id');
            $user->where($condition)->setField('password',$password);
            $this->success('修改成功','javascript:history.back(-1);',1);
        }else{
            $this->error('密码不一致');
        }
    }

    public function deleteUser($uid){
        $user=M('user');
        if($uid!=''){
            $condition['id']=$uid;
            $user->where($condition)->delete();
        }
        $this->userManager();
    }

    public function modifyAuth($uid){
        $user=M('user');
        $auth=I('post.auth')==''?2:I('post.auth');
        if($uid!=''&&$this->getUser()['auth']>=$auth){
            $condition['id']=$uid;
            $user->where($condition)->setField('auth',$auth);
        }else{
            $this->redirect('Index/warning');
        }

        if($auth==1){
            $this->userManager();
        }else{
            $this->adminManager();
        }

    }

    public function adminManager(){
        $me = $this->getUser();
        $user = M('user');
        $condition['auth']=2;
        $normal = $user->where($condition)->select();
        $this->assign(['user' => $me,'normals'=>$normal,'able'=>'disabled']);

        if($me['auth']==3){
            $condition['auth']=3;
            $super = $user->where($condition)->select();
            $this->assign(['supers' => $super,'able'=>'']);
        }
        $this->display('admin_manager');
    }

    public function profile(){
        $this->assign(['user' => $this->getUser()]);
        $this->display('profile');
    }

    public function profileModify(){
        $this->assign(['user' => $this->getUser()]);
        $this->display('profile_modify');
    }

    public function saveProfile(){
        $user = M('user');
        $condition['id']=session('id');

        $data['username']=I('post.username');
        $password_old=I('post.password');
        $data['tel']=intval(I('post.tel'));
        $data['mailbox']=I('post.mailbox');
        $data['introduction']=I('post.introduction');

        if($password_old==''){
            $user->where($condition)->save($data);
            $this->success('更新成功','profile',1);
        }else if(I('post.password1')==I('post.password2')){
            if($user->where($condition)->select()[0]['password']==md5($password_old)){
                $data['password']=md5(I('post.password1'));
                $user->where($condition)->save($data);
                $this->success('更新成功','profile',1);
            }else{
                $this->error('原密码错误，更新失败','javascript:history.back(-1);',1);
            }

        }else{
            $this->error('两次密码不一致，更新失败','javascript:history.back(-1);',1);
        }
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