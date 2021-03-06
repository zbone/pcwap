<?php if (!defined('THINK_PATH')) exit();?><html lang="en"><head>
	<meta charset="UTF-8">
	<title>登录</title>
	<link rel="stylesheet" href="__PUBLIC__/wapligao/css/reset.css">
	<link rel="stylesheet" href="__PUBLIC__/wapligao/css/base.css">
	<link rel="stylesheet" href="__PUBLIC__/wapligao/css/zhezhao.css">
	<script src="__PUBLIC__/wapligao/js/zepto.min.js"></script>
	<script src="__PUBLIC__/wapligao/js/jquery.js"></script>
	<script src="__PUBLIC__/wapligao/js/custom.js"></script>
<!-- 	<script src = "__PUBLIC__/wapligao/javascript/zhezhao.js"></script> -->
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,initial-scale=1.0">
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta content="black" name="apple-mobile-web-app-status-bar-style">
	<meta content="telephone=no" name="format-detection">
</head>
<body onLoad="startExcute()">
	<div> 
		<section class="login_bt">
			
			<form id="form" action="?act=login" method="post">
				<div class="divoi_odi">
					<div class="login_td" id="login_dt">
						<input type="text" name="username" placeholder="手机号、昵称或者邮箱" id="username" onBlur="validateSno()" />
					</div>
                    <!--
					<div class="login_od" id="login_do">
						<a href="#" id="getCaptcha" style="display:block" disabled="true">67秒后重新发送</a>
					</div>-->
				</div>
                
				<div class="divoi_odi">
					<div class="login_td" id="login_dt">
						<input type="password" name="pwd" placeholder="请输入密码"  >
					</div>					
				</div>
				
				<div class="divoi_odi" style="display:none">
					<div class="login_td" id="login_dt">
						<input type="text" placeholder="请输人图片中的文字" id="captcha2" onKeyDown="return handleEnter(this, event)">
					</div>
					<div class="login_od" id="login_do">
						<img alt="看不清楚，换一张" onClick="reloadVertifyCode(this)">
					</div>
				
				</div>
           	
			<span id="info"></span>
			
			<aside class="aised_w" id="dio">
				<div class="aised_w_od" id="p_1">
					<p>登录帮助</p>
				</div>
				<div class="aised_w_td">
					<img src="__PUBLIC__/wapligao/img/icon-up1.png" alt="" id="img_1">
				</div>
			</aside>
			<div class="div"></div>
			<aside class="aised_dis" style="display: block;">
				<ul>
					<li></li>
					<li>· 登录有效期8小时</li>
					<li>· 用户名区分大小写~</li>
					<li>· 忘记密码请提供相关信息给客服找回密码~</li>
				</ul>
				<p>*详情请咨询13732136280~</p>
			</aside>
			<div class="odi"></div>
			<aside>
				<input type="submit" value="登录"  class="login_btn" name="register" id="regButton" onClick="checkCaptcha()">
			</aside>	
		   </form>
		</section>
	</div>
	
	<section class="zhezhao" id="zhezhao"></section>
	<aside class="showDiv" id="showDiv">
		<div class="zhe" id="zhe">
			<h1>提示</h1>
			<p>您输入的短信验证码有误，请重新输入</p>
			<span id="bto">确定</span>
		</div>
	</aside>
	
	<section class="zhezhao" id="zhezhao2"></section>
	<aside class="showDiv" id="showDiv2">
		<div class="zhe" id="zhe2">
			<h1>提示</h1>
			<p>短信验证码超时，请重新发送验证码</p>
			<span id="bto2">确定</span>
		</div>
	</aside>
	
	
	<section class="zhezhao" id="zhezhao3"></section>
	<aside class="showDiv" id="showDiv3">
		<div class="zhe" id="zhe3">
			<h1>提示</h1>
			<p>密码格式不正确，请输入6-16个英文字母、数字组合</p>
			<span id="bto3">确定</span>
		</div>
	</aside>
	
    <section class="zhezhao" id="zhezhao4"></section>
	<aside class="showDiv" id="showDiv4">
		<div class="zhe" id="zhe4">
			<h1>提示</h1>
			<p>两次输入的密码不相同，请重新输入</p>
			<span id="bto4">确定</span>
		</div>
	</aside>
	
	<section class="zhezhao" id="zhezhao5"></section>
	<aside class="showDiv" id="showDiv5">
		<div class="zhe" id="zhe5">
			<h1>提示</h1>
			<p>请同意《用户协议》</p>
			<span id="bto5">确定</span>
		</div>
	</aside>
	
	
    <section class="zhezhao" id="zhezhao6"></section>
	<aside class="showDiv" id="showDiv6">
		<div class="zhe" id="zhe6">
			<h1>提示</h1>
			<p>您输入的邀请码有误，请重新输入</p>
			<span id="bto6">确定</span>
		</div>
	</aside>
	
	<section class="zhezhao" id="zhezhao7"></section>
	<aside class="showDiv" id="showDiv7">
		<div class="zhe" id="zhe7">
			<h1>提示</h1>
			<p>请输入邀请码</p>
			<span id="bto7">确定</span>
		</div>
	</aside>
	
	
	<section class="zhezhao" id="zhezhao8"></section>
	<aside class="showDiv" id="showDiv8">
		<div class="zhe" id="zhe8">
			<h1>提示</h1>
			<p>您输入的图形验证码有误，请重新输入</p>
			<span id="bto8">确定</span>
		</div>
	</aside>
	
		<section class="zhezhao" id="zhezhao9"></section>
	<aside class="showDiv" id="showDiv9">
		<div class="zhe" id="zhe9">
			<h1>提示</h1>
			<p>对不起，此VIP邀请码已经被使用！</p>
			<span id="bto9">确定</span>
		</div>
	</aside>
	
	 <div id="zhezho" class="zhezh">
		<div id="zh" class="zhc">
		<div>
			<img src="__PUBLIC__/wapligao/img/opdui.png" alt="">
		</div>
		<div>
			<p>注册成功</p>
		</div>
		</div>
	</div>
<script>
		var oVal = document.getElementById('captcha');
		var bto = document.getElementById('bto');
		var bto2 = document.getElementById('bto2');
		var bto3 = document.getElementById('bto3');
		var bto4 = document.getElementById('bto4');
		var bto5 = document.getElementById('bto5');
		var bto6 = document.getElementById('bto6');
		var bto7 = document.getElementById('bto7');
		var bto8 = document.getElementById('bto8');
		var bto9 = document.getElementById('bto9');
		
		var getCaptcha = document.getElementById('getCaptcha');
		var phoneNumber = document.getElementById("phoneNumber");
		
	    var form = document.getElementById("form");
	    var di = document.getElementById('di');
	    var login_do = document.getElementById('login_do');
	    $('.aised_w').on('click',function (){
	    	$('.aised_dis').toggle();
	    });
	    
	    
	    function reloadVertifyCode(obj){
	    	obj.src = "/servlet/ImageServlet.do?d=" + new Date();  
	    }
	    
	    
	    function checkPassword( obj ){
		var reg = /^[0-9a-zA-Z]{6,16}$/;
		var zhezhao = document.getElementById('zhezhao');
		var zhe = document.getElementById('zhe');
		var box = document.getElementById('showDiv');
		var pw=document.getElementById('val').value;
		if( !reg.test(pw)){
			showAlert("zhezhao3","showDiv3","zhe3");
    		return false; 
		}else{
			return true;							
		}
		};
		
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

	
		
		bto.onclick = function (){
			hideAlert("zhezhao","showDiv","zhe");
		}
		bto2.onclick = function (){
			hideAlert("zhezhao2","showDiv2","zhe2");
		}
		bto3.onclick = function (){
			hideAlert("zhezhao3","showDiv3","zhe3");
		}
		bto4.onclick = function (){
			hideAlert("zhezhao4","showDiv4","zhe4");
		}
		bto5.onclick = function (){
			hideAlert("zhezhao5","showDiv5","zhe5");
		}
		bto6.onclick = function (){
			hideAlert("zhezhao6","showDiv6","zhe6");
		}
		bto7.onclick = function (){
			hideAlert("zhezhao7","showDiv7","zhe7");
		}
		
		bto8.onclick = function (){
			hideAlert("zhezhao8","showDiv8","zhe8");
		}
		bto9.onclick = function (){
			hideAlert("zhezhao9","showDiv9","zhe9");
		}
		
		//检查验证码是否超时或匹配
				//检查验证码是否超时或匹配
		function checkCaptcha() {
						
						if(checkPassword()){
							if( $("#val").val() != $("#vlu").val()){
								showAlert("zhezhao4","showDiv4","zhe4"); //两次密码不一致
								return false; 
							}
							}
							else
							return false; 
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

	

</body></html>