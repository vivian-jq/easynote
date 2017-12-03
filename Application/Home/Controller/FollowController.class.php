<?php
/**
 * Created by PhpStorm.
 * UserModel: jqwu
 * Date: 2017/12/3
 * Time: 18:05
 */
namespace Home\Controller;
use Think\Controller;


class FollowController extends Controller
{

    public function following(){
        $this->assign(['user' => $this->getUser()]);
        $this->display('following');
    }

    public function followers(){
        $this->assign(['user' => $this->getUser()]);
        $this->display('followers');
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