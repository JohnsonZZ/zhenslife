<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文章添加-后台</title>
<link rel="icon" href="/myblog/Public/images/midbrand.png">
<link rel="stylesheet" href="/myblog/Public/css/base.css" />
<link rel="stylesheet" href="/myblog/Public/css/bootstrap.min.css" />
<link rel="stylesheet" href="/myblog/Public/css/layer.css" />
<link rel="stylesheet" href="/myblog/Public/css/default.css" />
<link rel="stylesheet" href="/myblog/Public/css/app.css" />
<link rel="stylesheet" href="/myblog/Public/css/admin.css" />
</head>
<body>
		<div id="nav-left" class="nav-left">
		<div class="text-center">
			<img src="/myblog/Public/images/touxiang.jpg" alt="头像" class="img-circle mb5" width="80px" height="80px" />
			<div class="username">攻城狮</div>
			<div class="usercolor">admin <span id="log-out" class="glyphicon glyphicon-log-out" aria-hidden="true"></span></div>
		</div>
		<div id="contentLeft">
			<ul id="leftNavigation">
				<li id="admin">
					<a><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> 控制台</a>
				</li>
				<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cnav): $mod = ($i % 2 );++$i;?><li>
					<a href="<?php echo U('Admin/Index/index');?>"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> <?php echo ($cnav["nav"]); ?></a>
				    <ul>
						<?php if(is_array($cnav["child"])): $i = 0; $__LIST__ = $cnav["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$snav): $mod = ($i % 2 );++$i;?><li>
							<a href="<?php echo U('Admin/'.$snav[href]);?>"><span class="glyphicon glyphicon-menu-right"></span> <?php echo ($snav["nav"]); ?></a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>
	<div id="test-right" class="test-right">
				<nav class="navbar navbar-default">	
			<ul class="nav navbar-nav">
				<li id="collapse" class="pl10"><a><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a></li>
			</ul>
			<form class="navbar-form navbar-right" role="search">
				<div class="input-group">
				    <input type="text" class="form-control" placeholder="Search for...">
				    <span class="input-group-btn">
					   <button class="btn btn-default" type="submit">
						  <span class="glyphicon glyphicon-search " aria-hidden="true"></span>
					   </button>
				    </span>
				</div>
			</form>
		</nav>
	</div>
	<script src="/myblog/Public/js/jquery.js"></script>
<script src="/myblog/Public/js/bootstrap.min.js"></script>
<script src="/myblog/Public/js/layer/layer.js"></script>
<script src="/myblog/Public/js/jquery.ssd-vertical-navigation.min.js"></script>
<script src="/myblog/Public/js/admin.js"></script>
<script>
$("#collapse").click(
	function(){
		if($(this).hasClass("active")){
			$("#nav-left").show();
			$("#test-right").css("marginLeft","220px");
			$("#collapse").removeClass("active");
		}else{
			$("#nav-left").hide();
			$("#test-right").css("marginLeft","0px");
			$("#collapse").addClass("active");				
		}
	}
);
$("#admin").click(function(){
	location.href="<?php echo U('Admin/Index/index');?>";
})
$("#log-out").click(function(){
		layer.open({
			icon : 0,
			title: '提示',
			type: 0, 
			content: '确认退出',
			btn: ['确认', '取消'],
			yes: function(){
				location.href="<?php echo U('Admin/Login/loginOut');?>";
			}
		});	
	});	
</script>
</body>
</html>