<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>输入个人邮箱</title>
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
			<form action="?act=remail" onSubmit="return emailCheck()" method = "POST">
				<div class = "login">
					<div class = "login_od">
						<a href="/rphone.html" target="_self"><p>邮箱</p></a>
					</div>
					<div class = "login_td">
						<input type="email" placeholder="输入个人邮箱"  id = "val" name="email"/>
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
					<p>*力高不会在任何地方泄漏您的信息</p>
				</aside>
				<input type="hidden" name="captcha_token"  value="c156a8c42b114ad9a6c1166284fa1dcf"/>
			</form>
		</section>
	</div>
	
	
	<section id = "zhezhao" class = "zhezhao"></section>
	<aside id = "showDiv" class = "showDiv">
		<div id = "zhe" class = "zhe">
			<h1>提示</h1>
			<p>您输入的邮箱有误，请重新输入</p>
			<span id = "bto">确定</span>
		</div>
	</aside>
	<script>
		var oVal = document.getElementById('val');
		var bt = document.getElementById('bt');
		var bto = document.getElementById('bto')
		
		function emailCheck( obj ){
			var reg = /^([\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
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