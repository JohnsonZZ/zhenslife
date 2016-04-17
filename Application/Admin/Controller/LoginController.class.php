<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
		$this->display();
    }
	public function checkLogin(){
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
				case 3:$this->success('登录成功', U('Index/index'));break;
			}
		}
	}
	public function loginOut(){
		session('account',null);
		session('pwd',null);
		cookie('account',null);
		cookie('pwd',null);
		$this->redirect('Login/login');
	}
}