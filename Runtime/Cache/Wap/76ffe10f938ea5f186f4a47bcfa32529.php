<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的设置</title>
	<link rel="stylesheet" href="__PUBLIC__/wapligao/css/reset.css" />
	<link rel="stylesheet" href="__PUBLIC__/wapligao/css/base.css" />
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,initial-scale=1.0" />
	<meta content="yes" name="apple-mobile-web-app-capable" />
	<meta content="black" name="apple-mobile-web-app-status-bar-style" />
	<meta content="telephone=no" name="format-detection" />
	<meta http-equiv="pragma" content="no-cache"> 
	<meta http-equiv="cache-control" content="no-cache"> 
	<meta http-equiv="expires" content="0">   
	<script type="text/javascript">
	/*禁用backspace键的后退功能，但是可以删除文本内容*/
	document.onkeydown = check;
	function check(e) {
	    var code;
	    if (!e) var e = window.event;
	    if (e.keyCode) code = e.keyCode;
	    else if (e.which) code = e.which;
	    if (((event.keyCode == 4 || event.keyCode == 8 ) &&                                                  //BackSpace 
	         ((event.srcElement.type != "text" && 
	         event.srcElement.type != "textarea" && 
	         event.srcElement.type != "password") || 
	         event.srcElement.readOnly == true)) || 
	        ((event.ctrlKey) && ((event.keyCode == 78) || (event.keyCode == 82)) ) ||    //CtrlN,CtrlR 
	        (event.keyCode == 116) ) {                                                   //F5 
	        event.keyCode = 0; 
	        event.returnValue = false; 
	    }
		return true;
	}
	</script> 
</head>
<body>
	<div class = "box">
		<section>
			<aside class = "shezhi_od">
				<img src="__PUBLIC__/wapligao/img/face.png" alt="">
			</aside>
			<aside class = "shezhi_td">
				<p><?php echo ($username); ?></p>
			</aside>
			<aside class = "shezhi_aside">
				<div class = "shezhi_div">
					<div class = "shezhi_td_od">
						<img src="__PUBLIC__/wapligao/img/to.png" alt="">
					</div>
					
					
					<div class = "shezhi_td_d">
						<p>身份认证</p>
					</div>
					<div class = "shezhi_td_th">
						<a href="<?php echo ($rzurl); ?>" target="_self"><p><?php echo ($rz); ?></p></a>
					</div>
				</div>
			</aside>
			<aside class = "shezhi_div_td">
				<div class = "shezhi_div_tdv">
					<a href = "__URL__/message" class = "shezhi_div_tddv">
						<div class = "shezhi_div_tddvo">
							<img src="__PUBLIC__/wapligao/img/invite.png" alt="">
						</div>
						<div class = "shezhi_div_tddvt">
							<p>每日签到</p>
						</div>
						<div  class = "shezhi_div_tddvf" style = "width:102px;text-align: right;padding-right: 25px">
							<p>88416107</p>
						</div>
					</a>
					<a href = "/weixin/setting/toPrivilege.do" class = "shezhi_div_tddv">
						<div class = "shezhi_div_tddvo">
							<img src="__PUBLIC__/wapligao/img/to2.png" alt="">
						</div>
						<div class = "shezhi_div_tddvt">
							<p>我的积分</p>
						</div>
						<div class = "shezhi_div_tddvh">
							<p>+0.5%</p>
						</div>
						<div  class = "shezhi_div_tddvf">
							<img src="__PUBLIC__/wapligao/img/yu.png" alt="">
						</div>
					</a>
					<a href = "/weixin/setting/informationsetting.htm" class = "shezhi_div_tddv">
						<div class = "shezhi_div_tddvo">
							<img src="__PUBLIC__/wapligao/img/to3.png" alt="">
						</div>
						<div class = "shezhi_div_tddvt">
							<p>我要抽奖</p>
						</div>
						<div class = "shezhi_div_tddvx">
												 	<img src="__PUBLIC__/wapligao/img/tu1.png" alt="">
												</div>
						<div  class = "shezhi_div_tddvf">
							<img src="__PUBLIC__/wapligao/img/yu.png" alt="">
						</div>
					</a>
					<!-- 
					<a href = "/weixin/setting/banksetting.htm" class = "shezhi_div_tddv" style = "border-bottom:none">
						<div class = "shezhi_div_tddvo">
							<img src="__PUBLIC__/wapligao/img/ct.png" alt="">
						</div>
						<div class = "shezhi_div_tddvt">
							<p>我的银行卡</p>
						</div>
						<div class = "shezhi_div_tddvx">
							<p>2张</p>
						</div>
						<div  class = "shezhi_div_tddvf">
							<img src="__PUBLIC__/wapligao/img/yu.png" alt="">
						</div>
					</a>
					 -->
				</div>
			</aside>
			<aside class = "shezhi_div_th">
				<div class = "shezhi_div_thd">

					<a href = "/setpwd.html" class = "shezhi_divth">

					<!-- <a href = "/weixin/setting/originalsetting.htm" class = "shezhi_divth"> -->

						<div class = "shezhi_td_od">
							<img src="__PUBLIC__/wapligao/img/to4.png" alt="">
						</div>
						<div class = "shezhi_td_d">
							<p>修改登录密码</p>
						</div>
						<div class = "shezhi_td_thd">
							<img src="__PUBLIC__/wapligao/img/yu.png" alt="">
						</div>
					</a>

					

					
											<!--<a href = "__PUBLIC__/wapligao/registerLogin/resetpayPassword.html" class = "shezhi_divth"> -->
						 <a href = "/protect.html" class = "shezhi_divth">
	
							<div class = "shezhi_td_od">
								<img src="__PUBLIC__/wapligao/img/to5.png" alt="">
							</div>
							<div class = "shezhi_td_d">
								<p><?php echo ($mb); ?></p>
							</div>
							<div class = "shezhi_td_thd">
								<img src="__PUBLIC__/wapligao/img/yu.png" alt="">
							</div>
						</a>
				    				</div>
				
			</aside>
			<div class = "shezhi_dif">
				<a href = "?act=outlogin" class = "shezhi_dfi">
					<p>退出登录</p>
				</a>
			</div>
		</section>
	</div>
	
</body>
</html>