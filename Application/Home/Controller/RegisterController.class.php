<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class RegisterController extends Controller {
	public function checkAccount(){
		$account = I('post.account');
		$flag = check_account($account);
		if($flag===false){
			$flag = 0;
			$this->ajaxReturn($flag);
		}else{
			$User = M('User');
			if($User->where("account = '$account'")->find()){
				$flag = 1;
				$this->ajaxReturn($flag);
			}else{
				$flag = 2;
				$this->ajaxReturn($flag);
			}
		}
	}
	public function checkPwd(){
		$pwd = I('post.pwd');
		$flag = check_pwd($pwd);
		$this->ajaxReturn($flag);
	}
	public function checkUser(){
		$regUser = I('post.user');
		$flag = check_user($regUser);
		if($flag===false){
			$flag = 0;
			$this->ajaxReturn($flag);
		}else{
			$User = M('User');
			if($User->where("user = '$regUser'")->find()){
				$flag = 1;
				$this->ajaxReturn($flag);
			}else{
				$flag = 2;
				$this->ajaxReturn($flag);
			}
		}
	}
	public function verify(){
		$config = array(
						'fontSize'=>100,
						'length' => 4, 
						); 
		$verify = new \Think\Verify($config);
		$verify->entry();
	}
	public function checkVerify(){
		$verify = I('post.verify');
		$flag = check_verify($verify);
		$this->ajaxReturn($flag);
	}
	public function checkForm(){
		$data['account'] = I('post.account');
		$data['user'] = I('post.user');
		$data['pwd'] = I('post.pwd');
		$data['verify'] = I('post.verify');
		if(check_account($data['account'])===false){
			$ajax['account']='账号支持英文，数字，下划线_且不少于4位';
			$this->ajaxReturn($ajax);
		}
		if(check_user($data['user'])===false){
			$ajax['user']='昵称不能为空或有空格';
			$this->ajaxReturn($ajax);
		}
		if(check_pwd($data['pwd'])===false){
			$ajax['user']='密码6~10位，不能是纯数字，不能全部相同';
			$this->ajaxReturn($ajax);
		}
		if(check_verify($data['verify'])===false){
			$ajax['verify']='验证码错误';
			$this->ajaxReturn($ajax);
		}
		$User = D("User"); // 实例化User对象
		if (!$User->create($data)){
			 $this->ajaxReturn($User->getError());
		}else{
			$data['salt']=base64_encode(mcrypt_create_iv(32,MCRYPT_DEV_RANDOM));
			$data['pwd']=sha1($data['pwd'].$data['salt']);
			$User->add($data);
			$ajax['status']=1;
			$this->ajaxReturn($ajax);
		}	
	}
}