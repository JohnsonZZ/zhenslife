<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台</title>
<link rel="stylesheet" href="/think/myblog/Public/css/base.css" />
<link rel="stylesheet" href="/think/myblog/Public/css/bootstrap.min.css" />
<link rel="stylesheet" href="/think/myblog/Application/Admin/Common/css/login.css" />
</head>
<body>
	<div class="webbg"> 
		<img style="position:fixed;" src="/think/myblog/Application/Admin/Common/images/11.jpg" height="100%" width="100%" /> 
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4 mt100">
				<div class="loginbox">
					<div class="title">
						<h3 class="logo">
							<span class="glyphicon glyphicon-fire" aria-hidden="true"></span>
							攻城狮
						</h3>
						<div class="info">
							——攻城狮.即将爆炸的程序员
						</div>
					</div>
					<form action="/think/myblog/index.php/Admin/Login/checklogin" method="post" class="login-form" role="form">
						<label for="account" class="sr-only">用户名</label>
						<div class="input-group input-box">
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>	
							<input type="text" id="account" name="account" class="form-control" placeholder="用户名" autofocus="" />
						</div>
						<label for="pwd" class="sr-only">密码</label>
						<div class="input-group input-box">
							<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
							<input type="password" id="pwd" name="pwd" class="form-control" placeholder="密码"  />
						</div>
						<div class="row pb10">
							<div class="col-md-2"></div>	
							<div class="col-md-4">	
								<input class="btn btn-md btn-primary btn-block mt10" type="submit" value="登 录"/>
							</div>
							<div class="col-md-4 mt5">				
								<div class="checkbox text-right">
									<label>
									  <input type="checkbox" name="keep" id="keep" value="keep" /> 记住密码
									</label>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/think/myblog/Public/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/think/myblog/Public/js/bootstrap.min.js"></script>
</body>
</html>