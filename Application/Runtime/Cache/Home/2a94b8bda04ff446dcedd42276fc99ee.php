<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<!-- saved from url=(0036)http://v3.bootcss.com/examples/blog/ -->
<html lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/myblog/Public/images/midbrand.png">
	<?php if(empty($article_title)): ?><title>首页-博客</title>
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
		    <ul class="nav navbar-nav" id="navlist">
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
						<li><a href="<?php echo U('Home/Account/index');?>">个人中心</a></li>
						<li id="quit"><a href="javascript:;">退出</a></li>
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
	  <img src="/myblog/Public/images/header.jpg" class="img-responsive mt10" alt="Responsive image">
      <div class="row mt10">
        <div class="col-sm-8">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="" data-toggle='tab'>热门</a>
			</li>			
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="hot">
				<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="<?php echo U('Home/Article/theme/id/12');?>">IT痴汉的工作现状</a><span class="fr">2016-03-19</span></p>
				<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="#">编程之法：面试和算法心得</a><span class="fr">2016-03-19</span></p>
				<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="#">APP快速开发：用这些工具更给力</a><span class="fr">2016-03-19</span></p>
				<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="#">基于thinkphp3.2开发的程序员博客</a><span class="fr">2016-03-19</span></p>
			</div>
		</div>
		<ul class="nav nav-tabs">
			<li id="branch4" class="active"><a href="" data-toggle='tab'>技术</a></li>
			<li id="branch7"><a href="" data-toggle='tab'>HTML</a></li>
			<li id="branch8"><a href="" data-toggle='tab'>CSS</a></li>
			<li id="branch9"><a href="" data-toggle='tab'>JS</a></li>
			<li id="branch10"><a href="" data-toggle='tab'>PHP</a></li>
		</ul>
		<div class="tab-content">
			<?php if(is_array($articleList)): $i = 0; $__LIST__ = array_slice($articleList,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i == 1): ?><div class="tab-pane active" id="article<?php echo ($vo[0]["article_navid"]); ?>">
					<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="<?php echo U('Home/Article/theme/id/'.$vo[0][article_id]);?>"><?php echo ($vo[0]["article_title"]); ?></a><span class="fr"><?php echo ($vo[0]["article_time"]); ?></span></p>
					<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="<?php echo U('Home/Article/theme/id/'.$vo[1][article_id]);?>"><?php echo ($vo[1]["article_title"]); ?></a><span class="fr"><?php echo ($vo[1]["article_time"]); ?></span></p>
					<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="<?php echo U('Home/Article/theme/id/'.$vo[2][article_id]);?>"><?php echo ($vo[2]["article_title"]); ?></a><span class="fr"><?php echo ($vo[2]["article_time"]); ?></span></p>
					<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="<?php echo U('Home/Article/theme/id/'.$vo[3][article_id]);?>"><?php echo ($vo[3]["article_title"]); ?></a><span class="fr"><?php echo ($vo[3]["article_time"]); ?></span></p>				
				</div>
				<?php else: ?>
				<div class="tab-pane" id="article<?php echo ($vo[0]["article_navid"]); ?>">
					<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="<?php echo U('Home/Article/theme/id/'.$vo[0][article_id]);?>"><?php echo ($vo[0]["article_title"]); ?></a><span class="fr"><?php echo ($vo[0]["article_time"]); ?></span></p>
					<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="<?php echo U('Home/Article/theme/id/'.$vo[1][article_id]);?>"><?php echo ($vo[1]["article_title"]); ?></a><span class="fr"><?php echo ($vo[1]["article_time"]); ?></span></p>
					<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="<?php echo U('Home/Article/theme/id/'.$vo[2][article_id]);?>"><?php echo ($vo[2]["article_title"]); ?></a><span class="fr"><?php echo ($vo[2]["article_time"]); ?></span></p>
					<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="<?php echo U('Home/Article/theme/id/'.$vo[3][article_id]);?>"><?php echo ($vo[3]["article_title"]); ?></a><span class="fr"><?php echo ($vo[3]["article_time"]); ?></span></p>				
				</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<ul class="nav nav-tabs">
			<li id="branch5" class="active"><a href="" data-toggle='tab'>电竞</a></li>
			<li id="branch11"><a href="" data-toggle='tab'>趣事</a></li>
			<li id="branch12"><a href="" data-toggle='tab'>攻略</a></li>
			<li id="branch13"><a href="" data-toggle='tab'>八卦</a></li>			
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="hot">
				<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="<?php echo U('Home/Article/theme/id/12');?>">IT痴汉的工作现状</a><span class="fr">2016-03-19</span></p>
				<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="#">编程之法：面试和算法心得</a><span class="fr">2016-03-19</span></p>
				<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="#">APP快速开发：用这些工具更给力</a><span class="fr">2016-03-19</span></p>
				<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="#">基于thinkphp3.2开发的程序员博客</a><span class="fr">2016-03-19</span></p>
			</div>
		</div>
		<ul class="nav nav-tabs">
			<li id="branch6" class="active"><a href="" data-toggle='tab'>闲聊</a></li>
		</ul>
		<div class="tab-content">
			<?php if(is_array($articleList)): $i = 0; $__LIST__ = array_slice($articleList,9,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="tab-pane active" id="article<?php echo ($vo[0]["article_navid"]); ?>">
					<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="<?php echo U('Home/Article/theme/id/'.$vo[0][article_id]);?>"><?php echo ($vo[0]["article_title"]); ?></a><span class="fr"><?php echo ($vo[0]["article_time"]); ?></span></p>
					<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="<?php echo U('Home/Article/theme/id/'.$vo[0][article_id]);?>"><?php echo ($vo[1]["article_title"]); ?></a><span class="fr"><?php echo ($vo[1]["article_time"]); ?></span></p>
					<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="<?php echo U('Home/Article/theme/id/'.$vo[0][article_id]);?>"><?php echo ($vo[2]["article_title"]); ?></a><span class="fr"><?php echo ($vo[2]["article_time"]); ?></span></p>
					<p><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span><a href="<?php echo U('Home/Article/theme/id/'.$vo[0][article_id]);?>"><?php echo ($vo[3]["article_title"]); ?></a><span class="fr"><?php echo ($vo[3]["article_time"]); ?></span></p>				
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
        </div><!-- /.blog-main -->
		<div class="col-sm-4">
	<div class="vcard">
		<div class="vcard-hd text-center">
			 <h5 class="font-bold text-info pt5 no-margin"><?php echo ($userList["user"]); ?></h4>
			 <h6 class="pt5">一条即将翻身的咸鱼</h6>
		</div>	
		<div class="vcard-bd">
			<div class="avatar fl">
				<img src="/myblog/Public/images/touxiang.jpg" alt="头像" class="img-thumbnail" width="70px" height="50px" />  	
			</div>

			<div class="message">
				<div class="abstract">
					<?php echo ($infoList["info_intro"]); ?>
				</div>
				<div class="contact">
					<span class="glyphicon glyphicon-envelope"></span>
					<?php echo ($infoList["info_email"]); ?>
				</div>
			</div>
		</div>
		<div class="vcard-ft">
			<div class="vcard-icon text-center">
				<a><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span></a>
			</div>
			<div class="vcard-icon text-center">
				<a><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></a>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<span class="glyphicon glyphicon-fire"></span>
			热门推荐<a href="#" class="text-muted fr">>></a>
		</div>
		<ul class="list-group">
		<?php if(is_array($hotList)): $i = 0; $__LIST__ = $hotList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hList): $mod = ($i % 2 );++$i;?><li class="list-group-list"><a href="<?php echo U('Home/Article/theme/id/'.$hList[read_articleid]);?>" class="text-muted"><?php echo ($hList["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
    <div class="panel panel-default">
		<div class="panel-heading">
			<span class="glyphicon glyphicon-pencil"></span>
			公告栏<a href="#" class="text-muted fr">>></a>
		</div>
		<ul class="list-group">
			<li class="list-group-list"><a href="" class="text-muted">基于ThinkPHP的博客系统</a></li>
			<li class="list-group-list"><a href="" class="text-muted">17款最佳的代码审查工具</a></li>
			<li class="list-group-list"><a href="" class="text-muted">Swift2.0编程中文版</a></li>
			<li class="list-group-list"><a href="" class="text-muted">前端页面加载jquery</a></li>
			<li class="list-group-list"><a href="" class="text-muted">August 2013</a></li>
		</ul>
	</div>
</div><!-- /.blog-sidebar -->
        
      </div><!-- /.row -->
    </div><!-- /.container -->

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
			content:'<div class="regBox"><form id="regFrom"class="form-horizontal"method="post"class="m10"role="form"><div class="form-group"><label for="regAccount"class="col-sm-3 control-label">账号</label><div class="col-sm-9"><input type="text"class="form-control"id="regAccount"maxlength="8"placeholder="支持英文，下划线，数字组合"></div></div><div class="form-group"><label for="regUser"class="col-sm-3 control-label">昵称</label><div class="col-sm-9"><input type="text"class="form-control"id="regUser"maxlength="8"placeholder="请输入昵称"></div></div><div class="form-group"><label for="regPwd"class="col-sm-3 control-label">注册密码</label><div class="col-sm-9"><input type="password"class="form-control"id="regPwd"maxlength="10"placeholder="密码6-10位，不能是纯数字"></div></div><div class="form-group"><label for="confirmPwd"class="col-sm-3 control-label">确认密码</label><div class="col-sm-9"><input type="password"class="form-control"id="confirmPwd"maxlength="10"placeholder="输入密码"></div></div><div class="form-group"><label for="verify"class="col-sm-3 control-label">验证码</label><div class="col-sm-5"><input type="text"class="form-control"id="verify"placeholder="输入验证码"></div><div class="col-sm-4"><img id="verifyImg"src="/myblog/index.php/Home/Register/verify"title="点击刷新"height="34px"/></div></div></form></div>',
			btn: ['确认', '取消'],
			yes: function(){
				$.post("<?php echo U('Register/checkForm');?>",
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
			$.post("<?php echo U('Register/checkAccount');?>",{"account":account},function(flag){
				switch(flag){
					case 0:layer.tips('支持英文，数字，下划线_<br />且不少于4位', '#regAccount', {tips: 2});break;
					case 1:layer.tips('账号已存在', '#regAccount', {tips: 2});;break;
				}
			});
		});
		$("#regUser").blur(function(){
			var user = $(this).val();
			$.post("<?php echo U('Register/checkUser');?>",{"user":user},function(flag){
				switch(flag){
					case 0:layer.tips('不能为空或有空格', '#regUser', {tips: 2});break;
					case 1:layer.tips('账号已存在', '#regUser', {tips: 2});;break;
				}
			});
		});
		
		$("#regPwd").blur(function(){
			var pwd = $(this).val();
			$.post("<?php echo U('Register/checkPwd');?>",{"pwd":pwd},function(flag){
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
			$.post("<?php echo U('Register/checkVerify');?>",{"verify":verify},function(flag){
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
		<?php if(is_array($articleList)): $i = 0; $__LIST__ = array_slice($articleList,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>$("#branch<?php echo ($vo[0]["article_navid"]); ?>").click(function(){
				$("#article<?php echo ($vo[0]["article_navid"]); ?>").addClass("active");
				$("#article<?php echo ($vo[0]["article_navid"]); ?>").siblings().removeClass("active");
			});<?php endforeach; endif; else: echo "" ;endif; ?>
	</script>

</body>
</html>