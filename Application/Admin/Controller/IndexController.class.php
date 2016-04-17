<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		if((cookie('account')&&cookie('pwd'))||(session('account')&&session('pwd'))){
			$Leftnav = D('Leftnav');
			$nav = $Leftnav->get_nav();
			$Article = M('Article');
			$count['article'] = $Article->count();
			$Cmt = M('Cmt');
			$count['cmt'] = $Cmt->count();
			$Bbs = M('Bbs');
			$count['bbs'] = $Bbs->count();
			$User = M('User');
			$count['user'] = $User->count();
			$t = time()-3600*24*60;
			$log = M('log');
			$log->where("t < $t")->delete();//删除60天前的日志
			$countLog = $log->count();
			$Page = new \Think\Page($countLog,5); // 实例化分页类 传入总记录数和每页显示的记录数(10)
			$Page->setConfig('prev', '上一页');
			$Page->setConfig('next', '下一页');
			$Page->setConfig('header','');
			$logList = $log->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
			$show = $Page->show(); // 分页显示输出
			$this->assign('logList',$logList);	
			$this->assign('page',$show);	
			$this->assign('count',$count);
			$this->assign('nav',$nav);
			$this->display();
		}else{
			$this->redirect('Login/login');
		}
    }
	public function test(){
		$this->show('你好');
	}
}