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
    public function index($id){

        return $this->display('index');
    }

    public function logout(){
        return $this->redirect('Index/index');
    }
}