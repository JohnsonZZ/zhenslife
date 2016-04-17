<?php
namespace Admin\Model;
use Think\Model;

class NavModel extends Model {
	public function get_nav(){
		$arr=array();
		$list = $this->where('nav_parentID=0')->order('nav_id')->select();
		foreach($list as $key => $value){
			if($second = $this->where("nav_parentID=$value[nav_id]")->order('nav_id')->select()){
				$value['child']=$second;
			}
			$arr[] = $value;
		}
		return $arr;
	}
	public function get_list(){
		$arr=array();
		$list = $this->where('nav_parentID=3')->order('nav_id')->select();
		foreach($list as $key => $value){
			if($second = $this->where("nav_parentID=$value[nav_id]")->order('nav_id')->select()){
				$value['child']=$second;	
			}
			$arr[] = $value;
		}
		return $arr;
	}
}
?>