<?php
namespace Admin\Model;
use Think\Model;

class LeftnavModel extends Model {
	public function get_nav(){
		$nav = $this->where('pid = 0')->order('ol')->select();
		foreach($nav as &$cNav){
			$sNav = $this->where("pid = $cNav[id]")->order('ol')->select();
			$cNav['child'] = $sNav;
		}
	return $nav;
	}
}