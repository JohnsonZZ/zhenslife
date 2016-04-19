<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class IndexController extends Controller {
    public function index(){
		$userList['user'] = session('user');
		$userList['id'] = session('id');
		$Bbs = M('bbs');
		$count = $Bbs->count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count, 5); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('header','');
		$show = $Page->show(); // 分页显示输出
		$bbsList = $Bbs->order('bbs_id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
		$this->assign('bbsList',$bbsList);
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('userList',$userList);
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