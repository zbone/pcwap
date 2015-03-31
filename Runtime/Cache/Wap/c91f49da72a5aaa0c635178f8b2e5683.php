<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>输入手机号码</title>
	<link rel="stylesheet" href="__PUBLIC__/wapligao/css/reset.css" />
	<link rel="stylesheet" href="__PUBLIC__/wapligao/css/base.css" />
	<link rel="stylesheet" href="__PUBLIC__/wapligao/css/zhezhao.css" />
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,initial-scale=1.0" />
	<meta content="yes" name="apple-mobile-web-app-capable" />
	<meta content="black" name="apple-mobile-web-app-status-bar-style" />
	<meta content="telephone=no" name="format-detection" />
</head>
<body>


	<div class = "box">
		<section>
			<form action="?act=rphone" onSubmit="return checkTelephone()" method = "POST">
				<div class = "login">
					<div class = "login_od">
						<a href="/remail.html" target="_self"><p>手机</p></a>
					</div>
					<div class = "login_td">
						<input type="number" placeholder="请输入手机号码" name="phone"  id = "val"/>
					</div>
				</div>
				<div class = "login_div">
					<a href="/login.html">已经有账号，我要登录</a>
				</div>
				
				<aside class = "login_bt">
					<div>
						<input type="submit" value = "下一步" class = "login_btn"/>
					</div>
				</aside>
				<aside class="login_fo">
					<p>*力高不会在任何地方泄漏您的号码</p>
				</aside>
			</form>
		</section>
	</div>
	
	
	<section id = "zhezhao" class = "zhezhao"></section>
	<aside id = "showDiv" class = "showDiv">
		<div id = "zhe" class = "zhe">
			<h1>提示</h1>
			<p>您输入的手机号有误，请重新输入</p>
			<span id = "bto">确定</span>
		</div>
	</aside>
	<script>
		var oVal = document.getElementById('val');
		var bt = document.getElementById('bt');
		var bto = document.getElementById('bto')
		
		function checkTelephone( obj ){
			var reg = /^1[3-9]\d{9}$/;
			var phone=document.getElementById('val').value;
			if( !reg.test(phone)){
				showAlert("zhezhao","showDiv","zhe");
        		return false; 
			}else{
				return true;							
			}
		};
		bto.onclick = function (){
			hideAlert("zhezhao","showDiv","zhe");
		}
		
		
		//显示弹窗
		function showAlert(zhezhao,show,zhe){
			var zhezhao = document.getElementById(zhezhao);
			var zhe = document.getElementById(zhe);
			var box = document.getElementById(show);

			zhezhao.style.display = "block";
			zhe.style.display = "block";
			box.style.display = "block";  
		}
		//隐藏弹窗
		function hideAlert(zhezhao,show,zhe){
			var zhezhao = document.getElementById(zhezhao);
			var zhe = document.getElementById(zhe);
			var box = document.getElementById(show);
			
			zhezhao.style.display = "none";
			zhe.style.display = "none";
			box.style.display = "none";  
			
		}
	</script>
</body>
</html>