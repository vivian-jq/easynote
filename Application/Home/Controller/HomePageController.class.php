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

    public function profile(){
        $this->assign(['user' => $this->getUser()]);
        $this->display('profile');
    }

    public function profileModify(){
        $this->assign(['user' => $this->getUser()]);
        $this->display('profile_modify');
    }

    public function lock(){
        session('uid',session('id'));
        session('id',0);
        $this->assign(['uid' => session('uid')]);
        $this->display('lock_screen');
    }

    public function unlock(){
        $user = M('User');
        $condition['id'] = I('post.id');
        $condition['password']=md5(I('post.password'));
        $data = ($user->where($condition)->select());

        if(count($data)==0){
            $this->error('密码错误');
        }else{
            session('id',I('post.id'));
            if($data[0]['auth']>1){
                $this->redirect('Admin/index');
            }else{
                $this->index();
            }
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