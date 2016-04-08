<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<!-- saved from url=(0036)http://v3.bootcss.com/examples/blog/ -->
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
	<?php if(empty($article_title)): ?><title>[title]</title>
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
				<div class="col-sm-9">
					<div class="box detail-box">
						<div class="article-head">
							<div class="title-head">
								<h2><?php echo ($article_title); ?></h2>
							</div>
							<div class="title-foot">
								<span>浏览：<?php echo ($read); ?></span>
								<span> 发布日期：<?php echo ($article_time); ?></span> 
								<span> 分类：<?php echo ($article_nav); ?></span>
							</div>
						</div>
						<div class="article-text">
							<?php echo ($article_content); ?>
						</div>
						<div class="da_word"></div>
					</div>
					<div class="box cmt-box">
						<ul class="nav nav-tabs">
							<li class="active">
								<a class="cmt-border" href="" data-toggle='tab'>评论</a>
							</li>			
						</ul>
						<div class="cmt-wrap" id="cmt-wrap">
						<?php if(is_array($commentList)): $i = 0; $__LIST__ = $commentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fCmt): $mod = ($i % 2 );++$i;?><div class="cmt-item review-item">
								<div class="fl avatar">
									<img class="img-responsive" alt="Responsive image" src="/myblog/Public/images/touxiang.jpg" width="44px">
								</div>
								<div class="cmt-cnt" id="cnt<?php echo ($fCmt["cmt_id"]); ?>">
									<div class="cmt-hd">
										<span class="text-primary"><?php echo ($fCmt["cmt_user"]); ?></span>
										<span class="pl10"><?php echo ($fCmt["cmt_time"]); ?></span>
										<a class="fr" href="javascript:;" user="<?php echo ($fCmt["cmt_user"]); ?>" reply="<?php echo ($fCmt["cmt_id"]); ?>">回复<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a>
									</div>
									<div class="cmt-txt">
										<p><?php echo ($fCmt["cmt_cnt"]); ?></p>
									</div>
								
								<?php if(is_array($fCmt["cmt_child"])): $i = 0; $__LIST__ = $fCmt["cmt_child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sCmt): $mod = ($i % 2 );++$i;?><div class="cmt-item reply-item">
										<div class="fl avatar">
											<img class="img-responsive" alt="Responsive image" src="/myblog/Public/images/touxiang.jpg" width="44px">
										</div>
										<div class="cmt-cnt" id="cnt<?php echo ($sCmt["cmt_id"]); ?>">
											<div class="cmt-hd">
												<span class="text-primary"><?php echo ($sCmt["cmt_user"]); ?></span>
												<span>回复</span>
												<span class="text-primary"><?php echo ($sCmt["cmt_getter"]); ?></span>
												<span class="pl10"><?php echo ($sCmt["cmt_time"]); ?></span>
												<a class="fr" href="javascript:;" user="<?php echo ($sCmt["cmt_user"]); ?>" reply="<?php echo ($fCmt["cmt_id"]); ?>">回复<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a>
											</div>
											<div class="cmt-txt">
												<p><?php echo ($sCmt["cmt_cnt"]); ?></p>
											</div>
										</div>
									</div><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
							<div id="reply-form" class="cmt-form">
								<div class="fl avatar">
									<img class="img-responsive" alt="Responsive image" src="/myblog/Public/images/touxiang.jpg" width="44px">
								</div>
								<div class="mt5 pl50">
									<div class="form-group">
										<label class="sr-only" for="comment">comment</label>
										<input type="text" class="form-control cmt-width" id="comment" user="<?php echo ($article_user); ?>" pid="0" placeholder="我也来说两句..">
									</div>
									<button id="cmt-btn" class="btn btn-primary ml10">评论</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="sidebar">
						<div class="sn-wrap">
							<div class="count-box">
								<dl class="count-item fl">
									<dt>
										<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
										收藏
									</dt>
									<dd class="cib"><?php echo ($collect); ?></dd>
								</dl>
								<dl class="count-item fl">
									<dt>
										<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
										点赞
									</dt>
									<dd class="cib"><?php echo ($like); ?></dd>
								</dl>
								<dl class="count-item fr">
									<dt>
										<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
										评论
									</dt>
									<dd class="cib"><?php echo ($cmt); ?></dd>
								</dl>
							</div>
						</div>
						<div class="box promulgator">
							<div class="avatar">
								<img class="img-responsive" alt="Responsive image" src="/myblog/Public/images/touxiang.jpg" width="44px">
							</div>
							<div class="pro-name black">
								<?php echo ($article_user); ?>
							</div>
							<span> 等级：LV1</span>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">								
								热点推荐<a href="#" class="text-muted fr">>></a>
							</div>
							<ul class="list-group">
								<li class="list-group-list"><a href="" class="text-muted">基于ThinkPHP的博客系统</a></li>
								<li class="list-group-list"><a href="" class="text-muted">17款最佳的代码审查工具</a></li>
								<li class="list-group-list"><a href="" class="text-muted">Swift2.0编程中文版</a></li>
								<li class="list-group-list"><a href="" class="text-muted">前端页面加载jquery</a></li>
								<li class="list-group-list"><a href="" class="text-muted">August 2013</a></li>
				  			</ul>
				        </div>
						<div class="panel panel-default">
							<div class="panel-heading">
								公告栏<a href="#" class="text-muted fr">>></a>
							</div>
							<ul class="list-group">
								<li class="list-group-list"><a href="" class="text-muted">TP官网讨论区按 版本筛选.</a></li>
								<li class="list-group-list"><a href="" class="text-muted">错误类型是否可以指定</a></li>
								<li class="list-group-list"><a href="" class="text-muted">加入BUG修复更新功能</a></li>
								<li class="list-group-list"><a href="" class="text-muted">显示年份信息</a></li>
								<li class="list-group-list"><a href="" class="text-muted">简单引用js二维码生成案例</a></li>
							</ul>
					    </div>
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
	$(function(){
			$("#article").addClass("active");
			$("#article").siblings().removeClass("active");
	});
	$("a").click(function(event){
		if($(this).attr("reply")!==undefined){
		    var reply = $(this).attr("reply");
			var user = $(this).attr("user");
			var att = "#cnt" + reply;
			$(att).append($("#reply-form"));
			$("#comment").focus();
			$("#comment").attr("user",user);
			$("#comment").attr("pid",reply);
			event.stopPropagation();
		}
	})
	$("#reply-form").click(function(event){
		event.stopPropagation();
	});
	$(document).click(function(){
		$("#cmt-wrap").append($("#reply-form"));
		$("#comment").attr("user","<?php echo ($article_user); ?>");
		$("#comment").attr("pid","0");
	});
	$("#cmt-btn").click(function(){
		$("#comment").text("提交中..");
		$.post("<?php echo U('article/sendCmt');?>",
			{
			user: "<?php echo ($userList); ?>",
			getter:$("#comment").attr("user"),
			pid : $("#comment").attr("pid"),
			cnt : $("#comment").val(),
			articleid : <?php echo ($article_id); ?>
			},
			function(data){
				switch(data){
					case 0:layer.msg('请用正确的语言进行回复！'); break;
					case 1:layer.msg('请先登录！'); break;
					case 2: 
						layer.msg('回复成功');
						location.reload();
						break;
				}
				
			}
		)
	})
	</script>
</body>
</html>