<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class IndexController extends Controller {
    public function index(){
		$Article = D('Article');
		$articleList = $Article->get_article();
		$hotList= $Article->get_hot();
		$User = D('User');
		$userList = $User->get_BAF(session('id'));
		$userList['user'] = session('user');
		$userList['id'] = session('id');
		if(isset($userList['id'])){
			$Info = M('Info');
			$infoList = $Info->field('info_email,info_intro')->where("info_userid=$userList[id]")->find();
		}else{
			$infoList['info_intro'] = "您是游客，欢迎注册！";
			$infoList['info_email'] = "官方邮箱465629989@qq.com";
		}
		$this->assign('navList',$navList);
		$this->assign('userList',$userList);
		$this->assign('articleList',$articleList);
		$this->assign('infoList',$infoList);
		$this->assign('hotList',$hotList);
		$this->display();
	}
	public function insertpwd(){
		$User = M('User');
		$data['account']="UziQAQ";
		$data['user']="小狗";
		$data['salt']=base64_encode(mcrypt_create_iv(32,MCRYPT_DEV_RANDOM));
		$data['pwd']=sha1("123".$data['salt']);
		$User->add($data);
	}
	public function getIp(){
		$cip =get_client_ip();
		echo $cip;
	}
	public function getCurrentUrl(){
	}
}
//1 首页 
//2	留言
//3 划水
//