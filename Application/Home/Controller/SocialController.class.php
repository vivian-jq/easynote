<?php
/**
 * Created by PhpStorm.
 * UserModel: jqwu
 * Date: 2017/12/5
 * Time: 14:09
 */
namespace Home\Controller;
use Think\Controller;


class SocialController extends Controller
{

    public function myShare(){
        $Model = new \Think\Model();
        $sql = "SELECT s.*, n.modify_time, n.title, n.content, n.tags, n.votes, u.username 
FROM share s, note n, user u 
WHERE s.uid_from=".session('id')." AND s.nid=n.id AND u.id=s.uid_to 
ORDER BY s.share_time DESC;";
        $data = $Model->query($sql);

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


        $this->assign(['user' => $this->getUser(),'shares'=>$data,'comments'=>$cmts, 'votes'=>$votes]);
        $this->display('my_share');
    }


    public function otherComment(){
        $Model = new \Think\Model();

        $sql="SELECT c.*,n.title,u2.username
FROM comment c LEFT JOIN user u2 ON c.uid=u2.id,user u, note n
WHERE n.uid=".session('id')." AND u.id=n.uid AND c.nid=n.id 
ORDER BY c.cmt_time LIMIT 5;";
        $cmts = $Model->query($sql);

        $this->assign(['user' => $this->getUser(),'comments'=>$cmts]);
        $this->display('other_comment');
    }

    public function share($sid){
        $Model = new \Think\Model();
        $sql = "SELECT s.*, n.uid, n.modify_time, n.title, n.content, n.tags, n.votes, u.username 
FROM share s, note n, user u 
WHERE s.id=".$sid." AND s.nid=n.id AND u.id=n.uid;";
        $data = $Model->query($sql);

        if(count($data)==0){
            $this->redirect('index/warning');
        }else if($data[0]['uid_to']!=session('id')){
            if($data[0]['uid']!=session('id')){
                $this->redirect('index/warning');
            }else{
                $data[0]['share_stat']=4;
            }
        }
        $sql="SELECT c.*,u.username
FROM comment c, user u 
WHERE u.id=c.uid AND c.nid=".$data[0]['nid'].";";
        $cmts = $Model->query($sql);
        $this->assign(['user' => $this->getUser(),'share'=>$data[0], 'comments'=>$cmts]);
        $this->display('share');
    }

    public function note($nid){
        $Model = new \Think\Model();
        $sql = "SELECT n.*, u.username 
FROM note n, user u 
WHERE n.id=".$nid." AND u.id=n.uid;";
        $data = $Model->query($sql);
        $stat = 3;

        if(count($data)==0){
            $this->redirect('index/warning');
        }else if($data[0]['note_stat']!=1){
            $result=$this->confirm($nid);
            if($result==false)
                $this->redirect('index/warning');
            foreach ($result as $single){
                if($single['share_stat']>$stat||$single['share_stat']==2) {
                    $stat = 4;
                    break;
                }
            }
        }
        $sql="SELECT c.*,u.username
FROM comment c, user u 
WHERE u.id=c.uid AND c.nid=".$nid.";";
        $cmts = $Model->query($sql);
        $data[0]['share_stat']=$stat;
        $this->assign(['user' => $this->getUser(),'share'=>$data[0], 'comments'=>$cmts]);
        $this->display('share');
    }

    public function modifyAuth(){
        $share = M('share');
        $condition['id']=I('post.sid');
        $data['share_stat']=I('post.share_stat');

        $share->where($condition)->save($data);
        $this->myShare();

    }

    public function vote(){
        $vote=M('vote');
        $note = M('note');
        $nid = I('post.nid');
        $condition['uid']=session('id');
        $condition['nid']=$nid;

        $result = $note->where('id='.$nid)->select()[0]['votes'];
        $data = $vote->where($condition)->select();

        if(count($data)>0){
            $vote->where($condition)->delete();
            $result--;
        }else{
            $condition['vote_time']=date('Y-m-d H:i:s',time());
            $vote->add($condition);
            $result++;
        }
        $note->where('id='.$nid)->setField('votes',$result);
        $this->ajaxReturn($result);

    }

    public function otherShare(){
        $Model = new \Think\Model();
        $sql = "SELECT s.*, n.modify_time, n.title, n.content, n.tags, n.votes, u.username  
FROM share s, note n, user u 
WHERE s.uid_to=".session('id')." AND s.nid=n.id AND u.id=s.uid_from 
ORDER BY s.share_time DESC;";
        $data = $Model->query($sql);

        $sql="SELECT c.*,n.title,u.username
FROM comment c,user u, note n
WHERE c.uid=".session('id')." AND u.id=n.uid AND c.nid=n.id 
ORDER BY c.cmt_time LIMIT 5;";
        $cmts = $Model->query($sql);

        $sql="SELECT v.*,n.title,u.username
FROM vote v,user u, note n
WHERE v.uid=".session('id')." AND u.id=n.uid AND v.nid=n.id 
ORDER BY v.vote_time LIMIT 5;";
        $votes = $Model->query($sql);

        $this->assign(['user' => $this->getUser(),'shares'=>$data,'comments'=>$cmts, 'votes'=>$votes]);
        $this->display('other_share');
    }

    public function myComment(){
        $Model = new \Think\Model();

        $sql="SELECT c.*,n.title,u.username
FROM comment c,user u, note n
WHERE c.uid=".session('id')." AND u.id=n.uid AND c.nid=n.id 
ORDER BY c.cmt_time LIMIT 5;";
        $cmts = $Model->query($sql);

        $this->assign(['user' => $this->getUser(),'comments'=>$cmts]);
        $this->display('my_comment');
    }

    public function comment(){
        $comment = M('comment');

        $data['nid']=I('post.nid');
        $data['content']=I('post.comment');
        $data['uid']=session('id');
        $data['cmt_time'] = date('Y-m-d H:i:s',time());

        $comment->add($data);
        $this->success('评论成功','javascript:history.back(-1);',1);
    }

    public function publicNote($keyword=""){
        $Model = new \Think\Model();
        $sql = 'SELECT * FROM note n, user u 
WHERE n.note_stat=1 AND n.title LIKE "%'.$keyword.'%" AND n.uid=u.id 
ORDER BY n.modify_time DESC;';

        if($keyword==""){
            $sql='SELECT * FROM note n, user u
WHERE n.note_stat=1 AND n.title LIKE "%'.$keyword.'%" AND n.uid=u.id
ORDER BY n.modify_time DESC LIMIT 3;';
        }
        $data = $Model->query($sql);

        $this->assign(['user' => $this->getUser(),'notes'=>$data]);
        $this->display('public_note');
    }

    public function searchNote(){
        $keyword = I('post.key');
        $this->publicNote($keyword);
    }

    public function editNote($nid){
        $note = M('note');
        $condition['id']=$nid;
        $data = $note->where($condition)->select();

        if(count($data)==0||$this->confirm($nid)==false){
            $this->redirect('index/warning');
        }
        $data[0]['stat']=($data[0]['note_stat']==1)?'':'checked';
        $data[0]['content']=htmlspecialchars_decode($data[0]['content']);

        $this->assign(['user' => $this->getUser(),'note'=>$data[0]]);
        $this->display('edit_share');

    }

    public function updateNote(){
        $note = M('note');
        $condition['id']=I('post.id');
        $data['content']=I('post.content');
        $data['title']=I('post.title');
        $data['modify_time'] = date('Y-m-d H:i:s',time());
        $data['tags']=I('post.tags');
        $note->where($condition)->save($data);
        $this->note($condition['id']);
    }

    private function confirm($nid){
        $share = M('share');
        $condition['uid_to']=session('id');
        $condition['nid']=$nid;
        $result = $share->where($condition)->select();
        if(count($result)==0)
            return false;
        else
            return $result;
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