<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
		$this->display();
    }
	public function checklogin(){
		$User = D('User');
		if (!$User->create()){
			 $this->error($User->getError());
		}else{
			$data['account'] = I('post.account');
			$data['pwd'] = I('post.pwd');
			$data['keep'] = I('post.keep');
			$list = $User->login($data);
			switch($list){
				case 1:$this->error('账号不正确');break;
				case 2:$this->error('密码不正确');break;
				case 3:$this->success('登录成功', U('index/Index'));break;
			}
		}
	}
}