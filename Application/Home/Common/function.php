<?php
// register function
function check_account($account){
	$pattern1 = '/^.{4,8}$/';
	if(!preg_match($pattern1,$account)){
		return false;
	}
	$pattern2 = '/^[a-zA-Z0-9_]{4,8}$/';
	if(!preg_match($pattern2,$account)){
		return false;
	}
}
function check_user($user){
	if($user=='') return false;
	if(strpos($user," ")===0||strpos($user," ")) return false;
}
function check_pwd($pwd){
	//长度为6到10个字符
	$pattern1 = '/^.{6,10}$/';
	if(!preg_match($pattern1,$pwd)){
		return false;
	}
	// 纯数字
	$pattern2 = '/^\d+$/';
	if(preg_match($pattern2,$pwd)){
		return false;
	}
	// 全部重复
    $repeat = true;
    // 连续字符
    $series = true;
	$len = strlen($pwd);
	$first = substr($pwd,0,1); 
	for($i = 1;$i < $len;$i++){
		$repeat = $repeat && substr($pwd,$i,1)==$first;
	}
	return !$repeat;
}
function check_verify($code, $id = ''){
	$config = array(
				'reset' => false // 验证成功后是否重置，这里才是有效的。
				);
	$verify = new \Think\Verify($config);
	return $verify->check($code, $id);
}
//End register function

//comment function
function check_content($cnt){
	if($cnt=='') return false;
	if(strpos($cnt," ")===0) return false;
	// 全部重复
    $repeat = true;
	$len = strlen($cnt);
	$first = substr($cnt,0,1); 
	for($i = 1;$i < $len;$i++){
		$repeat = $repeat && substr($cnt,$i,1)==$first;
	}
	return !$repeat;
}
//Change the publish content
function change_content($cnt){
	$cnt=str_replace(" ","&nbsp",$cnt); 
	$cnt=str_replace("\n","<br />",$cnt); 
	$cnt=str_replace("http://","",$cnt); 
	$cnt=preg_replace("/\[b\](.*?)\[\/b\]/i","<b>\${1}</b>",$cnt);
	$cnt=preg_replace("/\[code\](.*?)\[\/code\]/i","<pre>\${1}</pre>",$cnt);
	$cnt=preg_replace("/\[url\](.*?)\[\/url\]/i","<a href='http://\${1}' target='_blank'>\${1}</a>",$cnt);
	return $cnt;
}
// Change the emoji 
function change_emoji($cnt){
	$cnt=preg_replace("/\[em_(.*?)\]/i","<img src='/think/myblog/public/images/face/\${1}.gif'/>",$cnt);
	return $cnt;
}
?>