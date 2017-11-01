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
    public function index($id){

        return $this->display();
    }

    public function allEmails(){
//        return $this->redirect('Index/index');
    }

    public function unReadEmails(){
//        return $this->redirect('Index/index');
    }

    public function readEmails(){
//        return $this->redirect('Index/index');
    }

    public function userManager(){
//        return $this->redirect('Index/index');
    }

    public function adminManager(){
//        return $this->redirect('Index/index');
    }

    public function logout(){
        return $this->redirect('Index/index');
    }
}