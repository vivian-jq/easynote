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
        $data=['username'=>"小敏",'reason'=>"这文章写的真好",'modify_time'=>"2017-12-01 13:12:11",
            'tags'=>"小敏",'title'=>"小敏",'content'=>"&lt;p&gt;欢迎使用easynote2017-12-0420:47:29&lt;/p&gt;&lt;hr/&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;pre class=&quot;brush:as3;toolbar:false;&quot;&gt;include&amp;nbsp;&amp;lt;&amp;gt;&lt;/pre&gt;&lt;p&gt;&lt;img width=&quot;530&quot; height=&quot;340&quot; src=&quot;http://api.map.baidu.com/staticimage?center=116.404,39.915&amp;zoom=18&amp;width=530&amp;height=340&amp;markers=116.404,39.915&quot;/&gt;&lt;/p&gt;",
            'votes'=>"5"];
        $this->assign(['user' => $this->getUser(),'share'=>$data]);
        $this->display('my_share');
    }

    public function otherShare(){

        $this->assign(['user' => $this->getUser()]);
        $this->display('other_share');
    }

    public function publicNote(){

        $this->assign(['user' => $this->getUser()]);
        $this->display('public_note');
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