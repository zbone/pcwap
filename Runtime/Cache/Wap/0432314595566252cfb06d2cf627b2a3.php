<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>密码重置</title>
	<link rel="stylesheet" href="__PUBLIC__/wapligao/css/reset.css" />
	<link rel="stylesheet" href="__PUBLIC__/wapligao/css/base.css" />
	<link rel="stylesheet" href="__PUBLIC__/wapligao/css/zhezhao.css" />
	<script src="__PUBLIC__/wapligao/javascript/sha1.js" type="text/javascript"></script>
	<script src="__PUBLIC__/wapligao/javascript/zepto.min.js" type="text/javascript"></script>
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,initial-scale=1.0" />
	<meta content="yes" name="apple-mobile-web-app-capable" />
	<meta content="black" name="apple-mobile-web-app-status-bar-style" />
	<meta content="telephone=no" name="format-detection" />
</head>
<body>
	<div class = "box">
		<section class = "xiugai">
			<form id="form" action="?act=setpwd" method="post">
				<div class = "asied">
					<div class = "aisde_odi">
						<input type="password" placeholder="原密码"  id = "oldPassword" name="oldPassword" onKeyPress="return handleEnter(this, event)"/>
					</div>
				</div>
				<aside class = "aisde">
					<div>
						<div class = "aisde_od">
							<input type="password" placeholder="设置密码"  id = "val" name="password" onKeyPress="return handleEnter(this, event)"/>
						</div>
					</div>
					<div>
						<div class = "aisde_od">
							<input type="password" placeholder="重复密码"  id = "vlu" name="passwordCheck" onkeydown='if(event.keyCode==13){checkSubmitPassword();}'/>
							<input type="hidden" value = "15088416107" id = "phoneNumber"  name="phoneNumber"/>
						</div>
					</div>
				</aside>
				<aside class = "xiugai_div">
					<input type="submit" value = "确认" class = "login_btn" onClick="return checkSubmitPassword();" />
				</aside>
			</form>
			
		</section>
	</div>
	
	<section class = "zhezhao" id = "zhezhao" ></section>
	<aside class = "showDiv" id = "showDiv">
		<div class = "zhe" id = "zhe">
			<h1>提示</h1>
			<p>密码格式不正确，请输入6-16个英文字母、数字组合</p>
			<span id = "bto">确定</span>
		</div>
	</aside>
	
    <section class = "zhezhao" id = "zhezhao2" ></section>
	<aside class = "showDiv" id = "showDiv2">
		<div class = "zhe" id = "zhe2">
			<h1>提示</h1>
			<p>两次输入的登录密码不相同，请重新输入</p>
			<span id = "bto2">确定</span>
		</div>
	</aside>
	
	
	<section class = "zhezhao" id = "zhezhao3" ></section>
	<aside class = "showDiv" id = "showDiv3">
		<div class = "zhe" id = "zhe3">
		    <h1>提示</h1>
			<p>登录密码重置成功</p>
			<span><span id="second">3</span>秒后跳转到登录页面</span>
		</div>
	</aside>
	
	
	<section class = "zhezhao" id = "zhezhao4" ></section>
	<aside class = "showDiv" id = "showDiv4">
		<div class = "zhe" id = "zhe4">
		    <h1>提示</h1>
			<p>原密码输入错误</p>
			<span id = "bto4">确定</span>
		</div>
	</aside>
	
	<section class = "zhezhao" id = "zhezhao5" ></section>
	<aside class = "showDiv" id = "showDiv5">
		<div class = "zhe" id = "zhe5">
		    <h1>提示</h1>
			<p>登录密码不能与支付密码相同，请重新输入</p>
			<span id = "bto5">确定</span>
		</div>
	</aside>
	
	<div id = "zhezho" class = "zhezh">
		<div id = "zh" class = "zhc">
		<div>
			<img src="__PUBLIC__/wapligao/img/opdui.png" alt="">
		</div>
		<div>
			<p>密码修改成功</p>
		</div>
		</div>
	</div>
	
	<script>
	    var oldPassword = document.getElementById('oldPassword');
		var oVal = document.getElementById('val');
		var vlu = document.getElementById('vlu');
		
		var bt = document.getElementById('bt');
		var bto = document.getElementById('bto');
		var bto2 = document.getElementById('bto2');
		var bto4 = document.getElementById('bto4');
		var bto5 = document.getElementById('bto5');
		

		var zhezhao = document.getElementById('zhezhao');
		var zhezhao2 = document.getElementById('zhezhao2');
		var zhezhao3 = document.getElementById('zhezhao3');
		var zhezhao4 = document.getElementById('zhezhao4');
		var zhezhao5 = document.getElementById('zhezhao5');
		function handleEnter (field, event) {
			var keyCode = event.keyCode ? event.keyCode : event.which ?
			event.which : event.charCode;
			if (keyCode == 13) {
			var i;
			for (i = 0; i < field.form.elements.length; i++)
			if (field == field.form.elements[i])
			break;
			i = (i + 1) % field.form.elements.length;
			field.form.elements[i].focus();
			return false;
			}
			else
			return true;
			}
		
		
		function check(){
			return true;
		};
		function checkPassword( obj ){
			var reg = /^[0-9a-zA-Z]{6,16}$/;
			var zhezhao = document.getElementById('zhezhao');
			var zhe = document.getElementById('zhe');
			var box = document.getElementById('showDiv');
			var phone=document.getElementById('val').value;
			if( !reg.test(phone)){
				showAlert("zhezhao","showDiv","zhe");
        		return false; 
			}else{
				return true;							
			}
		};
		
		
        //alert弹出
		bto.onclick = function (){
			hideAlert("zhezhao","showDiv","zhe");
		};
		bto2.onclick = function (){
			hideAlert("zhezhao2","showDiv2","zhe2");
		};
		
		bto4.onclick = function (){
			hideAlert("zhezhao4","showDiv4","zhe4");
		};
		
		bto5.onclick = function (){
			hideAlert("zhezhao5","showDiv5","zhe5");
		};

		zhezhao.onclick = function (){
			hideAlert("zhezhao","showDiv","zhe");
		};
		zhezhao2.onclick = function (){
			hideAlert("zhezhao2","showDiv2","zhe2");
		};
		
		zhezhao4.onclick = function (){
			hideAlert("zhezhao4","showDiv4","zhe4");
		};
		
		zhezhao5.onclick = function (){
			hideAlert("zhezhao5","showDiv5","zhe5");
		};
		
			
		//检查验证码是否超时或匹配
		//检查验证码是否超时或匹配
		function checkSubmitPassword() {
							if(checkPassword()){
								if( oVal.value != vlu.value ){
									showAlert("zhezhao2","showDiv2","zhe2");
									return false; 
								}
								}
								else
								return false; 

								
		}
		
		
		function createXMLHttpRequest() {
			if(window.XMLHttpRequest) {
				return new XMLHttpRequest();
			} else if(window.ActiveXObject) {
				return new ActiveXObject("Microsoft.XMLHTTP");
			} else {
				alert("你使用的浏览器不支持XMLHttpRequest，请换一个浏览器再试！");
				return null;
			}
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