<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class ArticleController extends Controller {
	public function classify(){
		$Leftnav = D('Leftnav');
		$leftnav = $Leftnav->get_nav();
		$Nav = D('Nav');
		$parentList = $Nav->where('nav_parentid = 3')->select();
		$classify = $Nav->order("nav_parentId desc,nav_id asc")->select();
		$treeList = \Org\Util\Tree ::tree($classify,3);
		$this->assign('tree',$treeList);
		$this->assign('parentList',$parentList);
		$this->assign('nav',$leftnav);
		$this->display();
	}
	public function editClassify(){
		$Nav = M('Nav');
		$Nav->create();
		$Nav->save();
		addlog("修改分类名");
	}
	public function delClassify(){
		$data['nav_id'] = I('post.del');
		$Nav = M('Nav');
		$Nav->where($data)->delete();
		addlog("删除分类名");
	}
	public function addClassify(){
		$Nav = M('Nav');
		$Nav->create();
		$Nav->add();
		addlog("添加分类名");
	}
	public function article(){
		$Leftnav = D('Leftnav');
		$nav = $Leftnav->get_nav();
		$Article = M('Article');
		$count = $Article->count();
		$Page = new \Think\Page($count,9); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('header','');
		$articleList = $Article->order('article_id')->limit($Page->firstRow . ',' . $Page->listRows)->select();
		$show = $Page->show(); // 分页显示输出
		$this->assign('page',$show);
		$this->assign('nav',$nav);
		$this->assign('articleList',$articleList);
		$this->display();
	}
	public function addArticle(){
		$Leftnav = D('Leftnav');
		$nav = $Leftnav->get_nav();
		$this->assign('nav',$nav);
		$this->display();
	}
}