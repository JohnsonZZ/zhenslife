<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model {
	protected $patchValidate = true;
	protected $_validate = array(
		array('account','','帐号已经存在！',0,'unique',1), // 在新增的时候验证account字段是否唯一
		array('user','','昵称已经存在！',0,'unique',1), // 在新增的时候验证user字段是否唯一
		array('verify','require','验证码必须！'), //默认情况下用正则进行验证
    );
	public function get_BAF($id){
		$Bbs = M('Bbs');
		$userList['bbs'] = $Bbs->where("bbs_userid = '$id'")->count();
		$Article = M('Article');
		$userList['article'] = $Article->where("article_userid = '$id'")->count();
		
		return $userList;
	}
}