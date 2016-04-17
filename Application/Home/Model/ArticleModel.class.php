<?php
namespace Home\Model;
use Think\Model;
// R(read) U(user) C(comment) L(like) C(collect)
class ArticleModel extends Model {
    public function get_article(){
		$arr = array();
		$nav = M('Nav');
		$navList= $nav->where('nav_parentID=3')->order('nav_id')->select();
		foreach($navList as $key => $value){
			$articleList = $this->where("article_navid = $value[nav_id]")->select();
			$arr[] = $articleList;
			if($second = $nav->where("nav_parentID=$value[nav_id]")->order('nav_id')->select()){
				foreach($second as $key => $secValue){	
					$tarticleList = $this->where("article_navid = $secValue[nav_id]")->select();
					$arr[] = $tarticleList;
				}	
			}
		}
		return $arr;		
	}
	public function get_list($id){
		$User = M('User');
		$Nav = M('Nav');
		$articleList = $this->where("article_id=$id")->find();
		$username = $User->field('user')->where("id=$articleList[article_userid]")->find();
		$navname =  $Nav->field('nav_name')->where("nav_id=$articleList[article_navid]")->find();
		$articleList['article_user'] = $username['user'];
		$articleList['article_nav'] = $navname['nav_name'];
		unset($username,$navname,$articleList['article_userid'],$articleList['article_navid']);
		return $articleList;
	}
	public function get_RCLC($id){
		$Cmt = M('Cmt');
		$Collect = M('Collect');
		$Like = M('Like');
		$Read = M('Read');
		$article = "article".$id;
		$readCount = $Read->where("read_articleid=$id")->find();
		$count['read'] =  $readCount['read_count'];
		if(session("$article")!=$id){
			session("$article",$id);
			$count['read'] =  $readCount['read_count'] + 1;
			$data['read_count'] = $count['read'];
			$Read->where("read_articleid=$id")->save($data);
		}
		$count['like'] = $Like->where("like_articleid=$id")->count();
		$count['collect'] = $Collect->where("collect_articleid=$id")->count();
		$count['cmt'] = $Cmt->where("cmt_articleid=$id")->count();
		return $count;
	}
	public function get_RUCL($list){
		foreach($list as &$sList){
			$User = M('User'); 
			$sUser = $User->field('user')->where("id=$sList[article_userid]")->find();
			$Cmt = M('Cmt');
			$sCmt = $Cmt->where("cmt_articleid=$sList[article_id]")->count();
			$Like = M('Like');
			$sLike = $Like->where("like_articleid=$sList[article_id]")->count();
			$Read = M('Read');
			$sRead = $Read->field('read_count')->where("read_articleid=$sList[article_id]")->find();

			$sList['article_user'] = $sUser['user'];
			$sList['article_cmt'] = $sCmt;
			$sList['article_like'] = $sLike;
			$sList['article_read'] = $sRead['read_count'];
			}
		return $list;
	}
	public function get_hot(){
		$Read = M('Read');
		$hotList = $Read->order('read_count desc')->limit(5)->select();
		foreach($hotList as &$hList){
			$Article = M('Article');
			$title = $Article->field('article_title')->where("article_id=$hList[read_articleid]")->find();
			$hList['title'] = $title['article_title'];
		}
		return $hotList;
	}
}