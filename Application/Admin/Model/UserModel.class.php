<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends Model {
	  protected $_validate = array (
		array('account','require','用户名不能为空'),
		array('pwd','require','密码不能为空')
      );
	  public function login($data){
		  $logged['account'] = $data['account'];
		  $list = $this->where($logged)->find();
		  if(!$list){
			  return 1;	  
		  }else{
			  if($list['pwd'] != sha1($data['pwd'].$list['salt'])){
				  return 2;
			  }else{
				  if('keep' == $data['keep']){
					  cookie('account',$data['account'],60);
					  cookie('pwd',$data['pwd'],60);
				  }
				  session('account',$data['account']);
				  session('pwd',$data['pwd']);
				  return 3;
			}
		  } 
	  }
}
?>