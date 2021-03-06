<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>派浪智能跨平台网站管理系统</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="__PUBLIC__/css/bootcss.css">
    <link rel="stylesheet" href="__PUBLIC__/css/style.css">
	<script src="__PUBLIC__/js/jquery.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="__PUBLIC__/js/html5shiv.min.js"></script>
        <script src="__PUBLIC__/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

	<div class="panel-group" id="accordion">
	<?php if($webuser == $adminuser): ?><div class="panel panel-info">
		  <!-- Default panel contents -->
		  <div class="panel-heading" data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">网站基本信息设置</div>
		  <div class="panel-body panel-collapse collapse" id="collapseOne">
			
			  <ul class="list-group">
				<li class="list-group-item"><a href="__GROUP__/Index/webset" target="right">系统设置</a></li>
				<li class="list-group-item"><a href="__GROUP__/Index/setphone" target="right">手机域名设置</a></li>
				<li class="list-group-item"><a href="__GROUP__/Admin/index" target="right">后台管理员</a></li>
                <li class="list-group-item"><a href="__GROUP__/Vip" target="right">会员管理</a></li>		
					
			  </ul>
		  </div>		 
		</div><?php endif; ?>
		<div class="panel panel-info">
		  <!-- Default panel contents -->
		  <div class="panel-heading" data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#info">网站信息管理</div>
		  <div class="panel-body panel-collapse collapse " id="info">
		
			  <ul class="list-group">			 
				<li class="list-group-item"><a href="__GROUP__/Cate" target="right">分类管理</a><a class="pull-right" href="__GROUP__/Cate/addcate" target="right">添加分类</a></li>
				<li class="list-group-item"><a href="__GROUP__/Info" target="right">内容管理</a><a class="pull-right" href="__GROUP__/Info/addinfo" target="right">添加内容</a></li>			
				<li class="list-group-item"><a href="__GROUP__/Tags/index" target="right">Tags管理</a></li>		
		
			  </ul>
		  </div>		 
		</div>
		
				<div class="panel panel-info">
		  <!-- Default panel contents -->
		  <div class="panel-heading" data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#seo">SEO专用功能</div>
		  <div class="panel-body panel-collapse collapse " id="seo">		
			  <ul class="list-group">			 
					<li class="list-group-item"><a href="__GROUP__/Sitemap/index" target="right">Sitemap生成</a></li>			
			  </ul>
		  </div>		 
		</div>
		
		<div class="panel panel-info">
		  <!-- Default panel contents -->
		  <div class="panel-heading" data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#weixin">微信管理</div>
		  <div class="panel-body panel-collapse collapse " id="weixin">
		
			  <ul class="list-group">			 
				<li class="list-group-item"><a href="__GROUP__/Weixin/index" target="right">关注回复</a><a class="pull-right" href="__GROUP__/Weixin/keyhf" target="right">关键词回复</a></li>
				<li class="list-group-item"><a href="__GROUP__/Weixin/menu" target="right">自定义菜单</a>
				</li>			
							
		
			  </ul>
		  </div>		 
		</div>
		<div class="panel panel-info">
		  <!-- Default panel contents -->
		  <div class="panel-heading" data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#fujia">扩展功能</div>
		  <div class="panel-body panel-collapse collapse " id="fujia">
			  <ul class="list-group">
			  	<li class="list-group-item"><a href="__GROUP__/Index/tplset" target="right">模板管理</a></li>
			  	<li class="list-group-item"><a href="__GROUP__/Index/mysqlset" target="right">数据库设置</a></li>
				<li class="list-group-item"><a href="__GROUP__/Sqlback/tablist" target="right">数据库备份</a></li>
				<li class="list-group-item"><a href="__GROUP__/Sqlback/index" target="right">数据库还原</a></li>
				<li class="list-group-item"><a href="__GROUP__/Ads/index" target="right">广告管理</a></li>					
				<li class="list-group-item"><a href="__GROUP__/Comment/index" target="right">评论管理</a></li>				
				<li class="list-group-item"><a href="__GROUP__/Links/index" target="right">友情链接管理</a></li>				
				<li class="list-group-item"><a href="__GROUP__/Search/index" target="right">关键词搜索管理</a></li>			
			  </ul>
		  </div>		 
		</div>
	</div>
  </body>
  </html>