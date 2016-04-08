<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台</title>
<link rel="stylesheet" href="/think/myblog/Public/css/base.css" />
<link rel="stylesheet" href="/think/myblog/Public/css/bootstrap.min.css" />
<link rel="stylesheet" href="/think/myblog/Public/css/layer.css" />
<link rel="stylesheet" href="/think/myblog/Application/Admin/Common/css/public.css" />
<link rel="stylesheet" href="/think/myblog/Application/Admin/Common/css/default.css" />
<link rel="stylesheet" href="/think/myblog/Application/Admin/Common/css/app.css" />
<link rel="stylesheet" href="/think/myblog/Application/Admin/Common/css/home.css" />
</head>
<body>
	<div id="nav-left" class="nav-left">
		<div class="text-center">
			<img src="/think/myblog/Public/images/touxiang.jpg" alt="头像" class="img-circle mb5" width="80px" height="80px" />
			<div class="username">攻城狮</div>
			<div class="usercolor">admin <span id="log-out" class="glyphicon glyphicon-log-out" aria-hidden="true"></span></div>
		</div>
		<div id="contentLeft">
			<ul id="leftNavigation">
				<li>
					<a><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> 后台首页</a>
				</li>
				<li>
					<a><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> 网站设置</a>
					<ul>
						<li>
							<a href="#"><span class="glyphicon glyphicon-menu-right"></span> 网站管理</a>
						</li>
					</ul>
				</li>
				<li>
					<a><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> 网站分类</a>
					<ul>
						<li>
							<a href="#"><span class="glyphicon glyphicon-menu-right"></span> 查看分类</a>
						</li>
						<li>
							<a href="#"><span class="glyphicon glyphicon-menu-right"></span> 添加分类</a>
						</li>
					</ul>
				</li>
				<li>
					<a><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> 网站信息</a>
					<ul>
						<li>
							<a href="#"><span class="glyphicon glyphicon-menu-right"></span> 信息查看</a>
						</li>
						<li>
							<a href="#"><span class="glyphicon glyphicon-menu-right"></span> 信息添加</a>
						</li>
					</ul>
				</li>
				<li>
					<a><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> 会员管理</a>
					<ul>
						<li>
							<a href="#"><span class="glyphicon glyphicon-menu-right"></span> 会员查看</a>
						</li>
						<li>
							<a href="#"><span class="glyphicon glyphicon-menu-right"></span> 会员添加</a>
						</li>
					</ul>
				</li>
				<li class="clickable">
					<a href="#"><span class="glyphicon glyphicon glyphicon-envelope" aria-hidden="true"></span> 联系我们</a>
				</li>

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
                                <h1 class=" ">22</h1>
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
                                <h1 class=" ">11</h1>
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
                                <h1 class=" ">21</h1>
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
                                <h1 class=" ">25</h1>
                                <div class="stat-percent f13 font-bold text-danger">Comment<i class="fa fa-level-down"></i></div>
                                <small class="f13">本站评论总数</small>
                            </div>
                        </div>
					</div>
				  </div>
               </div>
           </div>
	   </div>
	   <div class="row">
			<div class="col-md-6">		
				<canvas id="canvas" height="450" width="800"></canvas>
			</div>
			<div class="col-md-6">		
				<div class="alert alert-info" role="alert">
					<strong>攻城狮v1.0</strong> 
					后台首页已经完成！
				</div>
				<div class="alert alert-danger" role="alert">
					<strong>Bug1</strong> 
					折线图没有自适应！
				</div>
			</div>
		</div>
	</div>
    <script src="/think/myblog/Public/js/jquery.js"></script>
	<script src="/think/myblog/Public/js/bootstrap.min.js"></script>
	<script src="/think/myblog/Public/js/layer/layer.js"></script>
	<script src="/think/myblog/Public/js/Chart.min.js"></script>
	<script src="/think/myblog/Application/Admin/Common/js/jquery.ssd-vertical-navigation.min.js"></script>
	<script src="/think/myblog/Application/Admin/Common/js/app.js"></script>
	<script>
	$(function(){
		if($(window).width()<767){
			$("#nav-left").hide();
			$("#test-right").css("marginLeft","0px");
			$("#collapse").addClass("active");	
		}
	});
	$(window).resize(
		function(){
			if($(window).width()>767){
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
	$("#log-out").click(function(){
		layer.open({
			icon : 0,
			title: '提示',
			type: 0, 
			content: '确认退出',
			btn: ['确认', '取消']
		});	
	});
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
	
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
	var lineChartData = {
			labels : ["January","February","March","April","May","June","July","August"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				}
			]

		}

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}		
</script>
</body>
</html>