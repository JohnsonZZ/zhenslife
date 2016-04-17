<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class AccountController extends Controller {
	public function index(){
		$userList['user'] = session('user');
		$userList['id'] = session('id');
		if(!isset($userList['id'])){
			$this->redirect('Index/index');
		}
		$Info = M('Info');
		$infoList = $Info->where("info_userid=$userList[id]")->find();
		$Bbs = D('Bbs');
		$bbsCount = $Bbs->where("bbs_userid=$userList[id]")->count();
		$userList['bbs'] = $bbsCount;
		$Article = D('Article');
		$count = $Article->where("article_userid=$userList[id]")->count(); // 查询满足要求的总记录数
		$userList['article'] = $count;
		$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$articleList = $Article->where("article_userid=$userList[id]")->order('article_id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
		$articleList = $Article->get_RUCL($articleList);
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('header','');
		$show = $Page->show(); // 分页显示输出
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('userList',$userList);
		$this->assign('articleList',$articleList);
		$this->assign('infoList',$infoList);
		$this->display();
	}
	public function getInfo(){
		$userList['id'] = session('id');
		$Info = M('Info');
		$infoList = $Info->where("info_userid=$userList[id]")->find();
		if($infoList){
			$data=$infoList;
			$this->ajaxReturn($data);
		}else{
			$data=0;
			$this->ajaxReturn($data);
		}
	}
	public function saveInfo(){
		$info_userid = session('id');
		$data['info_name'] = I('post.infoName');
		$data['info_work'] = I('post.infoWork');
		$data['info_email'] = I('post.infoEmail');
		$data['info_intro'] = I('post.infoIntro');
		$Info = M('Info');
		$flag = $Info->where("info_userid=$info_userid")->save($data);
		if($flag === false){
			$flag = false;
			$this->ajaxReturn($flag);
		}else{
			$flag = true;
			$this->ajaxReturn($flag);
		}
		
	}
}