<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class ArticleController extends Controller {
    public function index(){
		$userList['user'] = session('user');
		$Nav = M('Nav');
		$navList = $Nav->where('nav_id>3')->order('nav_id')->select();
		$Article = D('Article');
		$count = $Article->count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$articleList = $Article->order('article_id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
		$this->assign('selectid',"0");
		if(IS_GET){
			$data['article_navid'] = I('get.list');
			if($data['article_navid']!=0){
				$count = $Article->where($data)->count(); // 查询满足要求的总记录数
				$Page = new \Think\Page($count, 10); // 实例化分页类 传入总记录数和每页显示的记录数(10)
				$articleList = $Article->where($data)->order('article_id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
				$this->assign('selectid',$data['article_navid']);
			}
		}
		$articleList = $Article->get_RUCL($articleList);
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('header','');
		$show = $Page->show(); // 分页显示输出
		$this->assign('articleList',$articleList);
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('navList',$navList);		
		$this->assign('userList',$userList);	
		$this->display();
	}
	public function theme(){
		$Article = D('Article');
		$articleList = $Article->get_list(I('get.id'));
		$count = $Article->get_RCLC(I('get.id'));
		$Comment = D('cmt');
		$commentList = $Comment->get_cmt(I('get.id'));
		$userList = session('user');
		$this->assign('userList',$userList);
		$this->assign($articleList);
		$this->assign('commentList',$commentList);
		$this->assign($count);
		$this->display();
	}
	public function publish(){
		$userList['user'] = session('user');
		$Nav = M('Nav');
		$navList = $Nav->where('nav_id>3')->order('nav_id')->select();
		$this->assign('navList',$navList);	
		$this->assign('userList',$userList);
		$this->display();
	}
	public function checkPublish(){
		$data['article_userid'] = session('id');
		if(!isset($data['article_userid'])){
			$flag = 0;
			$this->ajaxReturn($flag);
		}
		$data['article_title'] = I('post.title');
		if(!check_content($data['article_title'])){
			$flag = 1;
			$this->ajaxReturn($flag);
		}
		$data['article_navid'] = I ('post.selectList');
		if($data['article_navid']==0){
			$flag = 2;
			$this->ajaxReturn($flag);
		}
		$data['article_content'] = I('post.publishCnt');
		if(!check_content($data['article_content'])){
			$flag = 3;
			$this->ajaxReturn($flag);
		}
		$data['article_time'] = date("Y-m-d H:i:s ");
		$data['article_content'] = change_content(I('post.publish-cnt'));
		$Article = M('Article');
		$lastInsert = $Article->add($data);
		$Read = M('Read');
		$data['read_articleid'] = $lastInsert;
		$Read->add($data);	
		$flag = 4;
		$this->ajaxReturn($flag);
	}
	public function sendCmt(){
		$data['cmt_user'] = I('post.user');
		$data['cmt_pid'] = I('post.pid');
		$data['cmt_getter'] = I('post.getter');
		$data['cmt_articleid'] = I('post.articleid');
		$data['cmt_cnt'] = I('post.cnt');
		$data['cmt_time'] = date("Y-m-d H:i:s ");
		if(!check_content($data['cmt_cnt'])){
			$flag = 0;
			$this->ajaxReturn($flag);
		}
		if($data['cmt_user']==''){
			$flag = 1;
			$this->ajaxReturn($flag);
		}
		$Cmt = M('cmt');
		$Cmt->add($data);
		$flag = 2;
		$this->ajaxReturn($flag);
	}
}