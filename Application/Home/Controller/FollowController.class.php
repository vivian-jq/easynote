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
        $Model = new \Think\Model();
        $sql = "SELECT u.username, u.id, ifnull(COUNT(f2.id),0) followers
                FROM follow f1 LEFT JOIN follow f2 on f2.uid_to=f1.uid_to ,user u
                WHERE f1.uid_from=".session('id')." AND f1.uid_to=u.id GROUP BY f1.uid_to;";
        $data = $Model->query($sql);

        $this->assign(['user' => $this->getUser(), 'people'=>$data]);
        $this->display('following');
    }

    public function unfollow($uid){
        $follow = M('follow');
        $condition['uid_from']=session('id');
        $condition['uid_to']=$uid;
        $follow->where($condition)->delete();
        $this->following();
    }

    public function followers(){
        $Model = new \Think\Model();
        $sql = "SELECT u.id, u.username,a.followers,ifnull(f3.id,0) exfollow
FROM (SELECT f1.uid_from,f1.uid_to, ifnull(COUNT(f2.id),0) followers
      FROM follow f1 LEFT JOIN follow f2 on f2.uid_to=f1.uid_from
      WHERE f1.uid_to=".session('id')." GROUP BY f1.uid_from) a 
  LEFT JOIN follow f3 ON a.uid_from=f3.uid_to AND f3.uid_from=a.uid_to, user u
WHERE u.id=a.uid_from;";
        $data = $Model->query($sql);

        $this->assign(['user' => $this->getUser(),'people'=>$data]);
        $this->display('followers');
    }

    public function follow($uid){
        $follow = M('follow');
        $data['uid_from']=session('id');
        $data['uid_to']=$uid;
        $data['follow_time'] = date('Y-m-d H:i:s',time());
        $follow->add($data);
        $this->followering();
    }

    public function searchUser(){
        $name = I('post.name');

        if($name!=""){
            $Model = new \Think\Model();
            $sql = "SELECT a.id,a.username,a.followers , ifnull(f2.id,0) exfollow
FROM (SELECT u.id, u.username, ifnull(COUNT(f1.id),0) followers
      FROM user u LEFT JOIN follow f1 on u.id=f1.uid_to
      WHERE u.username LIKE \"%".$name."%\" GROUP BY u.id) a
  LEFT JOIN follow f2 on a.id=f2.uid_to AND f2.uid_from=".session('id').";";
            $data = $Model->query($sql);
            $this->assign(['people'=>$data]);
        }
        $this->assign(['user' => $this->getUser()]);
        $this->display('search_user');
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