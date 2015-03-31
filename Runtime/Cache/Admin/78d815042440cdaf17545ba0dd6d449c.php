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
	<div class="panel panel-info">
	  <div class="panel-heading">程序版本信息</div>
	  <div class="panel-body">
		
	    <div class="alert alert-warning alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong>欢迎登录：</strong><?php echo session('adminuser'); ?>
		</div>
		
		 <div class="row">
		
		   <div class="col-md-12">
				<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading">服务器信息</div>
				 

				  <!-- List group -->
				<table class="table table-bordered table-hover">
				<tr class="active">
					<td>PHP版本:</td>
					<td><?php echo phpversion(); ?></td>
				</tr>
				<tr class="warning">
					<td>操作系统:</td>
					<td><?php echo PHP_OS; ?></td>
				</tr>
				<tr class="success">
					<td>程序目录:</td>
					<td><?php echo $_SERVER['DOCUMENT_ROOT']; ?></td>
				</tr>
				<tr class="warning">
					<td>端口号:</td>
					<td><?php echo $_SERVER['SERVER_PORT'] ; ?></td>
				</tr>
				<tr class="active">
					<td>服务器IP:</td>
					<td><?php echo $_SERVER['SERVER_ADDR'] ; ?></td>
				</tr>
					<tr class="active">
					<td>程序名称:</td>
					<td>派浪智能跨平台网站管理系统</td>
				</tr>
				<tr class="warning">
					<td>程序版本:</td>
					<td>经济型</td>
				</tr>
				<tr class="success">
					<td>程序开发者:</td>
					<td>派浪网络</td>
				</tr>
				
				<tr class="active">
					<td>官方网站:</td>
					<td><a href="http://www.nbpailang.com/">www.nbpailang.com</a></td>
				</tr>
			</table>
			 <div class="panel-footer">派浪网络 版权所有 盗版必究</div>
				</div>
		  </div>
		  
	</div>

  </body>
  </html>