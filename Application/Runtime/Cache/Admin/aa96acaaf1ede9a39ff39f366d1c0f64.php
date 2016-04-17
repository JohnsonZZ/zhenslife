<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文章分类-后台</title>
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
		<div class="bg-log mt20">
			<table class="table table-striped table-bordered bg-white table-hover">
				<thead>
					<tr>
						<th>分类</th>
						<th>Level</th>
						<th class="center">修改</th>
						<th class="center">删除</th>		
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($tree)): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
					<?php if(($val["Count"]) == "1"): ?><td><?php echo ($val['nav_name']); ?></td>
					<?php else: ?>
						<td>┗<?php echo ($val['nav_name']); ?></td><?php endif; ?>
						<td><?php echo ($val['Count']); ?></td>
						<td class="center">
							<a edit="<?php echo ($val['nav_id']); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
						</td>
						<td class="center">
							<a delete="<?php echo ($val['nav_id']); ?>"><span class="glyphicon glyphicon-remove"></span></a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<tr>
						<td class="center" colspan="4">
							<a add="add"><span class="glyphicon glyphicon-plus-sign"></span></a>
						</td>
					</tr>
				</tbody>	
			</table>
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
	<script>
		$("a").click(function(){
			if(edit=$(this).attr("edit")){
				layer.open({
				title: '修改分类名',
				type: 0, 
				content: '<div class="form-group"><label class="sr-only" for="navName">编辑分类名</label><input type="text" class="form-control" id="navName" name="navName" placeholder="新的分类名"></div>',
				btn: ['确认', '取消'],
				yes: function(){
						$.post("<?php echo U('Admin/Article/editClassify');?>",
								{
									nav_name:$("#navName").val(),
									nav_id:edit,
								},
								function(){
									location.reload();
								}
						)
					}
				});	
			}
			if(del=$(this).attr("delete")){
				layer.open({
				icon:0,
				title: '删除分类',
				type: 0, 
				content: '是否删除该分类',
				btn: ['确认', '取消'],
				yes: function(){
					$.post("<?php echo U('Admin/Article/delClassify');?>",
								{
									del:del,
								},
								function(){
									location.reload();
								}
							)
					}
				});	
			}
			if($(this).attr("add")){
				layer.open({
				title: '添加分类',
				type: 0, 
				content: '<form class="form-horizontal"><div class="form-group"><label class="col-sm-4 control-label">归属分类</label><div class="col-sm-6"><select id="parentId" class="form-control"><option value="3">顶级分类</option><?php if(is_array($parentList)): $i = 0; $__LIST__ = $parentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val[nav_id]); ?>">┗<?php echo ($val[nav_name]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></div></div><div class="form-group"><label for="inputName"class="col-sm-4 control-label">新分类名</label><div class="col-sm-6"><input type="text"class="form-control"id="inputName"placeholder="新的分类名"></div></div></form>',
				btn: ['确认', '取消'],
				yes: function(){
						$.post("<?php echo U('Admin/Article/addClassify');?>",
								{
									nav_parentId:$("#parentId").val(),
									nav_name:$("#inputName").val(),
								},
								function(){
									location.reload();
								}
						)
					}
				});	
			}
		})
	</script>
</body>
</html>