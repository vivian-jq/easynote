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
        return $this->display('all_emails');
    }

    public function unReadEmails(){
        return $this->display('unread_emails');
    }

    public function readEmails(){
        return $this->display('read_emails');
    }

    public function userManager(){
        return $this->display('user_manager');
    }

    public function adminManager(){
        return $this->display('admin_manager');
    }

    public function logout(){
        return $this->redirect('Index/index');
    }
}