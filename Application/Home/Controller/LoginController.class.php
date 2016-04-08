<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class LoginController extends Controller {
    public function sign(){
		if(!IS_POST){
			$flag = 0;
			$this->ajaxReturn($flag);
		}else{
			$User = M('User');
			$postName = I('post.account');
			$postPwd = I('post.pwd');
			$userRow = $User->where("account='$postName'")->find();
			if(!$userRow){
				$flag = 1;
				$this->ajaxReturn($flag);
			}else{
				if($userRow['pwd'] !== sha1($postPwd.$userRow['salt'])){
					$flag = 2;
					$this->ajaxReturn($flag);
				}else{
					$flag = 3;
					session('id',$userRow['id']);
					session('user',$userRow['user']);
					$this->ajaxReturn($flag);
				}
			}
		}
	}
	public function quit(){
		session('user',null);
		session('id',null);
	}
}