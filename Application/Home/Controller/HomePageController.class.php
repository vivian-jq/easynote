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
    public function index(){
        $Model = new \Think\Model();

//        获取笔记数，点赞量
        $sql="SELECT sum(n.votes) votes, count(n.id) notes FROM note n WHERE n.uid=".session('id').";";
        $numbers=$Model->query($sql)[0];

//        获取笔记本数
        $sql="SELECT count(b.id) books FROM notebook b WHERE b.uid=".session('id').";";
        $numbers['books']=$Model->query($sql)[0]['books'];

//        获取评论数
        $sql="SELECT count(c.id) comments FROM comment c, note n WHERE n.uid=".session('id')." AND n.id=c.nid;";
        $numbers['comments']=$Model->query($sql)[0]['comments'];

//        获取关注量
        $sql="SELECT count(f.id) followers FROM follow f WHERE f.uid_to=".session('id')." ;";
        $numbers['followers']=$Model->query($sql)[0]['followers'];

//        获取最近修改的3篇笔记
        $sql="SELECT * FROM note n WHERE n.uid=".session('id')." ORDER BY n.modify_time DESC LIMIT 6;";
        $notes=$Model->query($sql);

        $sql = "SELECT s.*, n.modify_time, n.title, n.content, n.tags, n.votes, u.username  
FROM share s, note n, user u 
WHERE s.uid_to=".session('id')." AND s.nid=n.id AND u.id=s.uid_from 
ORDER BY s.share_time DESC;";
        $shares = $Model->query($sql);


        $sql="SELECT c.*,n.title,u2.username
FROM comment c LEFT JOIN user u2 ON c.uid=u2.id,user u, note n
WHERE n.uid=".session('id')." AND u.id=n.uid AND c.nid=n.id 
ORDER BY c.cmt_time LIMIT 5;";
        $cmts = $Model->query($sql);

        $sql="SELECT v.*,n.title,u2.username
FROM vote v LEFT JOIN user u2 ON v.uid=u2.id,user u, note n
WHERE n.uid=".session('id')." AND u.id=n.uid AND v.nid=n.id 
ORDER BY v.vote_time LIMIT 5;";
        $votes = $Model->query($sql);

        $this->assign(['user' => $this->getUser(),'comments'=>$cmts, 'votes'=>$votes,'numbers'=>$numbers,
            'notes'=>$notes, 'shares'=>$shares]);
        return $this->display('index');
    }

    public function photoUpload(){
        $uploadFolder = "upload/profile";
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