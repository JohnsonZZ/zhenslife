<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页-后台</title>
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
		<div class="row">
            <div class="col-md-12 no-padding">
                <div class="wrapper wrapper-content">
					<div class="row">
						<div class="col-md-3">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<span class="label label-success pull-right">会员总数</span>
									<h5>会员数量</h5>
								</div>
								<div class="ibox-content">
									<h1 class=" "><?php echo ($count["user"]); ?></h1>
									<div class="stat-percent f13 font-bold text-success">User<i class="fa fa-bolt"></i></div>
									<small class="f13">本站会员总数</small>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<span class="label label-info pull-right">文章数量</span>
									<h5>文章数量</h5>
								</div>
								<div class="ibox-content">
									<h1 class=" "><?php echo ($count["article"]); ?></h1>
									<div class="stat-percent f13 font-bold text-info">Article<i class="fa fa-level-up"></i></div>
									<small class="f13">本站文章总数</small>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<span class="label label-primary pull-right">留言数量</span>
									<h5>留言数量</h5>
								</div>
								<div class="ibox-content">
									<h1 class=" "><?php echo ($count["bbs"]); ?></h1>
									<div class="stat-percent f13 font-bold text-navy">Message<i class="fa fa-level-up"></i></div>
									<small class="f13">本站留言总数</small>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<span class="label label-danger pull-right">评论数量</span>
									<h5>评论数量</h5>
								</div>
								<div class="ibox-content">
									<h1 class=" "><?php echo ($count["cmt"]); ?></h1>
									<div class="stat-percent f13 font-bold text-danger">Comment<i class="fa fa-level-down"></i></div>
									<small class="f13">本站评论总数</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="bg-log">
				<table class="table table-striped table-bordered bg-white">
					<thead>
						<tr>
							<th class="center">#</th>
							<th>用户</th>
							<th>时间</th>
							<th>IP</th>
							<th class="col-xs-7">日志内容</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($logList)): $i = 0; $__LIST__ = $logList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($val['id']); ?></td>
								<td><?php echo ($val['name']); ?></td>
								<td><?php echo (date("Y-m-d H:i:s",$val['t'])); ?></td>
								<td><?php echo ($val['ip']); ?></td>
								<td><?php echo ($val['log']); ?></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
					
				</table>
				<nav class="text-center">
					<ul class="pagination">
						<?php echo ($page); ?>
					</ul>
				</nav>
			</div>
		</div>  
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