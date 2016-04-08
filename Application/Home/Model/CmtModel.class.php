<?php
namespace Home\Model;
use Think\Model;

class CmtModel extends Model {
	public function get_cmt($id){
		$cmtList = $this->where("cmt_articleid=$id and cmt_pid=0")->select();
		foreach($cmtList as &$cmt){
			$cmt['cmt_time']=substr($cmt['cmt_time'],5,5);
			if($secList = $this->where("cmt_pid=$cmt[cmt_id]")->select())
				foreach($secList as &$scmt){
					$scmt['cmt_time']=substr($scmt['cmt_time'],5,5);
				}
				$cmt['cmt_child'] = $secList;
		}
		return $cmtList;
	}
}