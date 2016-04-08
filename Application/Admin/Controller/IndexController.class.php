<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		if(cookie('account')&&cookie('pwd')){
			session('account',cookie('account'));
			$this->display();
		}else if(session('account')&&session('pwd')){
			$this->display();
		}else{
			$this->redirect('Login/login');
		}
    }
	public function test(){
		$this->show('你好');
	}
}