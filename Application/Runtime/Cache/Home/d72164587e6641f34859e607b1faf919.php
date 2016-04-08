<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-CN">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/myblog/Public/images/midbrand.png">
	<?php if(empty($article_title)): ?><title>发布文章-博客</title>
	<?php else: ?>
		<title><?php echo ($article_title); ?></title><?php endif; ?>
    <link rel="stylesheet" href="/myblog/Public/css/base.css" />
	
    <!-- Bootstrap core CSS --> 
    <link rel="stylesheet" href="/myblog/Public/css/bootstrap.min.css" />
	
	<!-- Layer core CSS --> 
	<link rel="stylesheet" href="/myblog/Public/css/layer.css" />
	
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/myblog/Public/css/blog.css" />
	
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/myblog/Public/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top ">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="#">Lions</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav">
				<li id="index" class="active"><a href="<?php echo U('Index/index');?>">首页 <span class="sr-only">(current)</span></a></li>
				<li id="bbs"><a href="<?php echo U('Bbs/index');?>">留言 </a></li>
				<li id="article"><a href="<?php echo U('Article/index');?>">文章 </a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				<?php if(empty($userList["user"])): ?><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
						<span class="caret"></span>
					</a>
				    <ul class="dropdown-menu">
					    <li id="sign"><a>登录</a></li>
					    <li id="register"><a href="#">注册</a></li>
				    </ul>
				<?php else: ?>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<div class="avatar">
							<img src="/myblog/Public/images/touxiang.jpg" width="20px">
						<span class="caret"></span>
						</div> 
						
					</a>
					<ul class="dropdown-menu">
						<li><a>个人中心</a></li>
						<li id="quit"><a href="#">退出</a></li>
				    </ul><?php endif; ?>
				</li>
			</ul>
		    <form class="navbar-form navbar-right" role="search">
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="搜索" />
					  <span class="input-group-btn">
						  <button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						  </button>
					  </span>
				</div>
		    </form>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
	<div class="container mt50">
		<div class="row mt10">
			<div class="col-sm-8">
				<div class="publish-wrap">
					<form class="form-horizontal">
						<div class="form-group">
							<div class="avatar fl">
								<img class="img-responsive" alt="Responsive image" src="/myblog/Public/images/touxiang.jpg" width="54px">
							</div>
							<div class="publish-leave">
								<a href="<?php echo U('Home/Article/index');?>"><span class="glyphicon glyphicon-circle-arrow-left"></span></a>
							</div>
							<p class="text-primary ml100"><?php echo ($userList["user"]); ?></p>
							<p class="ml100">发布新文章</p>
						</div>
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">标题：</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="title" name="title" placeholder="请输入标题，不超于20字">
							</div>
						</div>
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">分类：</label>
							<div class="col-sm-10">
							<select id="select-list" name="select-list" class="select-list">
								<option value="0">请选择</option>
								<?php if(is_array($navList)): $i = 0; $__LIST__ = $navList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nList): $mod = ($i % 2 );++$i;?><option value="<?php echo ($nList["nav_id"]); ?>"><?php echo ($nList["nav_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>	
							</select>
							<input type="hidden" id="selValue" name="selValue" value="0"/>
							</div>
						</div>
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">内容：</label>
							<div class="col-sm-10">
								<div class="tools">
									<a id="bold" title="加粗"><span class="glyphicon glyphicon-bold" aria-hidden="true"></span></a>
									<a id="link" title="链接"><span class="glyphicon glyphicon-link" aria-hidden="true"></span></a>
									<a id="code" title="代码"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span></a>
									<a id="picture" title="图片"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></a>
								</div>
								<textarea id="publish-cnt" name="publish-cnt" class="form-control" rows="10"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-2"></div>
							<div class="col-sm-10">
								<button type="button" id="bbs-submit" class="btn btn-primary">发布</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-pencil"></span>
						温馨提示
					</div>
					<ul class="list-group">
						<li class="list-group-list"><a href="" class="text-muted">1.注意语言的完整性</a></li>
						<li class="list-group-list"><a href="" class="text-muted">2.选择恰当的分类</a></li>
						<li class="list-group-list"><a href="" class="text-muted">3.可直接使用xml标记</a></li>
						<li class="list-group-list"><a href="" class="text-muted">4.[b]加粗[/b]</a></li>
						<li class="list-group-list"><a href="" class="text-muted">5.[url]超链接[/url]</a></li>
						<li class="list-group-list"><a href="" class="text-muted">6.[code]代码[/code]</a></li>
						<li class="list-group-list"><a href="" class="text-muted">7.暂不支持图片上传</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<footer class="blog-footer">
    <p>Blog template built for Bootstrap by Johnson</p>
    <p>
        <a href="javascript:scroll(0,0)">返回顶部</a>
    </p>
</footer>
<script src="/myblog/Public/js/jquery.js"></script>
<script src="/myblog/Public/js/bootstrap.min.js"></script>
<script src="/myblog/Public/js/layer/layer.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/myblog/Public/js/ie10-viewport-bug-workaround.js"></script>
<script>
	$("#sign").click(function(){
		layer.open({
			type: 1, 
			title:'登录',
			skin: 'layui-layer-rim demo-class', //加上边框
			area: ['350px', '240px'], //宽高
			content: '<form class="m15"method="post"role="form"><label for="account"class="sr-only">用户名</label><div class="input-group m10"id="input-box"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span><input type="text"id="account"name="account"class="form-control"placeholder="账号"autofocus=""/></div><label for="pwd"class="sr-only">密码</label><div class="input-group input-box m10"><span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span><input type="password"id="pwd"name="pwd"class="form-control"placeholder="密码"/></div><label class="fr"><input type="checkbox"name="keep"id="keep"value="keep"/>记住密码</label></form>',
			btn: ['登录', '取消'],
			yes: function(){
				var account = $("#account").val();
				var pwd = $("#pwd").val();	
				$.post("<?php echo U('Login/sign');?>",{"account":account,"pwd":pwd},function(data){
					switch(data){
						case 0:alert('请不要做非法操作！');break;
						case 1:layer.msg('用户名不存在！');break;
						case 2:layer.msg('只细想想是账号不对还是密码不对！');break;
						case 3:location.reload();break;
					}	
				});
			}
		});	  
	})
	$("#register").click(function(){
		layer.open({
			type: 1, 
			title:'注册',
			skin: 'layui-layer-rim demo-class', //加上边框
			area: ['450px', '370px'], //宽高
			content:'<div class="regBox"><form id="regFrom"class="form-horizontal"method="post"class="m10"role="form"><div class="form-group"><label for="regAccount"class="col-sm-3 control-label">账号</label><div class="col-sm-9"><input type="text"class="form-control"id="regAccount"maxlength="8"placeholder="支持英文，下划线，数字组合"></div></div><div class="form-group"><label for="regUser"class="col-sm-3 control-label">昵称</label><div class="col-sm-9"><input type="text"class="form-control"id="regUser"maxlength="8"placeholder="请输入昵称"></div></div><div class="form-group"><label for="regPwd"class="col-sm-3 control-label">注册密码</label><div class="col-sm-9"><input type="password"class="form-control"id="regPwd"maxlength="10"placeholder="密码6-10位，不能是纯数字"></div></div><div class="form-group"><label for="confirmPwd"class="col-sm-3 control-label">确认密码</label><div class="col-sm-9"><input type="password"class="form-control"id="confirmPwd"maxlength="10"placeholder="输入密码"></div></div><div class="form-group"><label for="verify"class="col-sm-3 control-label">验证码</label><div class="col-sm-5"><input type="text"class="form-control"id="verify"placeholder="输入验证码"></div><div class="col-sm-4"><img id="verifyImg"src="/myblog/index.php/register/verify"title="点击刷新"height="34px"/></div></div></form></div>',
			btn: ['确认', '取消'],
			yes: function(){
				$.post("<?php echo U('register/checkForm');?>",
						{
							account:$("#regAccount").val(),
							user:$("#regUser").val(),
							pwd:$("#regPwd").val(),
							verify:$("#verify").val()
						},
					function(data){
						var str = '';
						for(var key in data){  
							str+= data[key];
						}
						if(str != ''){
							layer.alert(str);
						}
						if(data['status']==1)
						{	
							layer.closeAll();
							layer.msg('注册成功');
						}
					}
				)
			}
		});	 
		$("#regAccount").blur(function(){
			var account = $(this).val();
			$.post("<?php echo U('register/checkAccount');?>",{"account":account},function(flag){
				switch(flag){
					case 0:layer.tips('支持英文，数字，下划线_<br />且不少于4位', '#regAccount', {tips: 2});break;
					case 1:layer.tips('账号已存在', '#regAccount', {tips: 2});;break;
				}
			});
		});
		$("#regUser").blur(function(){
			var user = $(this).val();
			$.post("<?php echo U('register/checkUser');?>",{"user":user},function(flag){
				switch(flag){
					case 0:layer.tips('不能为空或有空格', '#regUser', {tips: 2});break;
					case 1:layer.tips('账号已存在', '#regUser', {tips: 2});;break;
				}
			});
		});
		
		$("#regPwd").blur(function(){
			var pwd = $(this).val();
			$.post("<?php echo U('register/checkPwd');?>",{"pwd":pwd},function(flag){
				if(!flag){
					layer.tips('密码6~10位<br />不能是纯数字<br />不能全部相同', '#regPwd', {tips: 2});
				}
			});
		});
		
		$("#confirmPwd").blur(function(){
			var regPwd = $("#regPwd").val();
			var confirmPwd =$(this).val();
			if(regPwd != confirmPwd)
				layer.tips('两次密码不一样', '#confirmPwd', {tips: 2});
		});
		
		$("#verify").blur(function(){
			var verify = $(this).val();
			$.post("<?php echo U('register/checkVerify');?>",{"verify":verify},function(flag){
				if(!flag){
					layer.tips('验证码错误', '#verify', {tips: 3});
				}
			});
		});
		$("#verifyImg").click(function(){
			this.src=this.src+'?'+Math.random();
		});
	})
	$("#quit").click(function(){
		$.post("<?php echo U('Login/quit');?>",function(data){
				location.reload();
		});
	})	
</script>

	<script>
	$(function(){
			$("#article").addClass("active");
			$("#article").siblings().removeClass("active");
	});
	$("#bold").click(function(){
		var text =  $("#publish-cnt").val();
		$("#publish-cnt").val(text+'[b][/b]');
	});
	$("#link").click(function(){
		var text =  $("#publish-cnt").val();
		$("#publish-cnt").val(text+"[url][/url]");
	});
	$("#code").click(function(){
		var text =  $("#publish-cnt").val();
		$("#publish-cnt").val(text+"[code][/code]");
	});
	$("#bbs-submit").click(function(){
		$.post("<?php echo U('Home/Article/checkPublish');?>",
			{
				title:$("#title").val(),
				selectList:$("#select-list").val(),
				publishCnt:$("#publish-cnt").val()
			},
			function(flag){
				switch(flag){
					case 0:layer.msg('请先登录！');break;
					case 1:layer.tips('标题不能为空！', '#title', {tips: 2});break;
					case 2:layer.tips('请选择分类！', '#select-list', {tips: 2});break;
					case 3:layer.tips('写点什么吧！', '#publish-cnt', {tips: 1});break;
					case 4:location.href = "<?php echo U('Home/Article/index');?>";break;
				}
			}
		
		);
	})
	</script>
</body>
</html>