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
        $this->assign(['user' => $this->getUser()]);
        return $this->display('index');
    }

    public function photoUpload(){
        $uploadFolder = "upload";
        if(!file_exists($uploadFolder)){
            mkdir($uploadFolder,0777,true);
        }
        $filename = "profile" . session('id').'.'.substr(strrchr($_FILES["file"]["name"], '.'), 1);
        $url = $uploadFolder.'/'.$filename;
        move_uploaded_file($_FILES["file"]["tmp_name"], $url);
    }

    public function saveProfile(){
//        return $this->display('profile');
    }

    public function profile(){
        $this->assign(['user' => $this->getUser()]);
        return $this->display('profile');
    }

    public function profileModify(){
        $this->assign(['user' => $this->getUser()]);
        return $this->display('profile_modify');
    }
//$user['img_url'] = "/upload/profile".$id.".jpg";

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