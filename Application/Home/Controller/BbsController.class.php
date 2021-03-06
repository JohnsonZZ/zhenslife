<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class BbsController extends Controller {
	 public function index(){
		$Article = D('Article');
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
		$Nav = D('Nav');
		$navList = $Nav->get_nav();	
		$Bbs = M('bbs');
		$count = $Bbs->count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count, 10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('header','');
		$show = $Page->show(); // 分页显示输出
		$bbsList = $Bbs->order('bbs_id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
		$this->assign('navList',$navList);
		$this->assign('userList',$userList);
		$this->assign('bbsList',$bbsList);
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('infoList',$infoList);
		$this->assign('hotList',$hotList);
		$this->display();
	 }
	 public function checkBBS(){
		 $data['bbs_userid'] = I('post.bbsUserid');
		 $data['bbs_sender'] = I('post.bbsSender');
		 $data['bbs_cnt'] = I('post.bbsCnt');
		 $data['bbs_time'] = date("Y-m-d H:i:s ");
		 $Bbs = M('Bbs');
		 $Bbs->add($data);
		 $this->ajaxReturn($data);
	 }
}