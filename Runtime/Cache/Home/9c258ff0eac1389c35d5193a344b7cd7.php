<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title><?php echo ($webtitle); ?>-<?php echo ($webname); ?></title>
<meta name="keywords" content="<?php echo ($webkey); ?>" />
<meta name="description" content="<?php echo ($webdesc); ?>" />
<link rel="stylesheet" type="text/css" media="screen and (min-width: 1140px)" href="__PUBLIC__/blog/style/style.css" />
<link rel="stylesheet" type="text/css" media="screen and (min-width: 768px) and (max-width:1140px)" href="__PUBLIC__/blog/style/style.css" />
<link rel="stylesheet" type="text/css" media="screen and (max-width:768px)" href="__PUBLIC__/blog/style/style-phone.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--[if lt IE 9]>
　　　<link rel="stylesheet" type="text/css" href="__PUBLIC__/blog/style/style.css" />
<![endif]-->
<script type="text/javascript" src="__PUBLIC__/blog/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/blog/js/swipe.js"></script>
</head>
<body>
	<div class="header">
		<div class="web">
			<div class="logo">
			<?php if($title): ?><h2><a href="<?php echo ($domain); ?>"><?php echo ($webname); ?></a></h2><?php else: ?><h1><a href="<?php echo ($domain); ?>"><?php echo ($webname); ?></a></h1><?php endif; ?>
			<p class="topdesc"><?php echo ($webdesc); ?></p>
			</div>
		</div>
	</div>
	<div class="menu">
		<span class="nav"></span>
		<div class="web">
			<ul>
				<li><a href="__ROOT__">网站首页</a></li>
				<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a  href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catename"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					
			</ul>
			<div class="search">
				<form action="__GROUP__/search.php" method="get" >
					<input type="text" name="key" class="input" />
					<button>搜索</button>
				</form>
			</div>
		</div>
	</div>

	<div class="web">
		<div class="ann">
			<?php $pcwap=M("info")->where(array('isshow'=>1,'istop'=>1,))->order("id desc")->limit(2)->select();foreach ($pcwap as $s=>$pcwap):$cate=M('cate')->find($pcwap["cid"]);$pcwap["catename"]=$cate['catename'];$pcwap["cateurl"]=U('/'.$cate['url']);$pcwap['url']=U("/".$pcwap["id"]);$tags=M('tags')->where(array("pid"=>$pcwap['id']))->select(); foreach($tags as $va){ $pcwap['tags'].="<a href=".U('tag/'.$va[url]).">".$va[tags]."</a>"; } ?><a href="<?php echo ($pcwap["url"]); ?>"><?php echo ($pcwap["name"]); ?></a><?php endforeach ?>

		</div>
		<div class="left">
			<div class="ads" id="pcwap">
				<div class="swipe-wrap">
				<?php $adlists=M("ads")->where(array('cate'=>home))->where('isshow=1')->order("id desc")->select();foreach ($adlists as $adlist):?><div><a href="<?php echo ($adlist["adurl"]); ?>"><img src="<?php echo ($adlist["adpic"]); ?>" alt="<?php echo ($adlist["adremak"]); ?>" /></a></div><?php endforeach ?>
				</div>
			</div>
				<script>
						window.mySwipe = new Swipe(document.getElementById('pcwap'), {
						  startSlide: 2,
						  speed: 500,
						  auto: 3000,
						  continuous: true,
						  disableScroll: false,
						  stopPropagation: false,
						  callback: function(index, elem) {},
						  transitionEnd: function(index, elem) {}
						});
						</script>
			<?php $pcwap=M("info")->where(array('isshow'=>1,))->order("id desc")->limit(10)->select();foreach ($pcwap as $s=>$pcwap):$cate=M('cate')->find($pcwap["cid"]);$pcwap["catename"]=$cate['catename'];$pcwap["cateurl"]=U('/'.$cate['url']);$pcwap['url']=U("/".$pcwap["id"]);$tags=M('tags')->where(array("pid"=>$pcwap['id']))->select(); foreach($tags as $va){ $pcwap['tags'].="<a href=".U('tag/'.$va[url]).">".$va[tags]."</a>"; } ?><div class="postlist">
					<h2><a href="<?php echo ($pcwap["url"]); ?>"><?php echo ($pcwap["name"]); ?></a></h2>
					<div class="postimg">
						<a href="<?php echo ($pcwap["url"]); ?>" rel="nofollow"><img src="<?php echo ($pcwap["pic"]); ?>" alt="<?php echo ($pcwap["name"]); ?>" /></a>
					</div>
					<div class="desc">
						<p><?php echo ($pcwap["desc"]); ?></p>
						<div class="time">
							<a href="<?php echo ($pcwap["url"]); ?>">查看详情</a>
								<span>发布时间:<?php echo (msubstr($pcwap["time"],0,10)); ?></span>												
						</div>
					</div>
				</div><?php endforeach ?>
			

		</div>
		<div class="right">
			<div class="down">
			
			<P>联系人：<?php echo ($lianxi); ?></P>
			<P>电话：<?php echo ($tel); ?></P>
			<P>邮箱：<?php echo ($email); ?></P>
			<P>地址：<?php echo ($address); ?></P>
		
			</div>
			<div class="new">
			<h3>最新评论</h3>	
			<?php $newrevs=M("book")->where('status=1')->order("id desc")->limit(10)->select();foreach ($newrevs as $newpost):$info=M('info')->find($newpost['infoid']);$newpost['title']=$info['name'];$newpost['pic']=$info['pic'];$newpost['desc']=$info['desc'];$newpost['url']=U('/'.$info['id']);?><div class="noewpost">
				<a href="<?php echo ($newpost["url"]); ?>"><img src="<?php echo ($newpost["pic"]); ?>" class="newpostimg" /></a>
				<h4><a href="<?php echo ($newpost["url"]); ?>"><?php echo ($newpost["title"]); ?></a></h4>
				<p><?php echo date('m-d',$newpost[time]);?></p>
			</div><?php endforeach ?> 
			
			</div>
			<div class="d_tags">
				<h3>标签云</h3>
				<?php $tagall=M("tags")->order("id desc")->limit(20)->getField("url,tags",true);foreach($tagall as $key => $value): $taglist=Array('url'=>$key,'tag'=>$value); $taglist["url"]=U("/tag/".$taglist["url"]);?><a href="<?php echo ($taglist["url"]); ?>"><?php echo ($taglist["tag"]); ?></a><?php endforeach ?> 
			</div>
			<div class="leftad">
				<?php $adlists=M("ads")->where(array('cate'=>cate))->where('isshow=1')->order("id desc")->select();foreach ($adlists as $adlist):?><ul>
						<li><a href="<?php echo ($adlist["adurl"]); ?>" rel="nofollow"><img src="<?php echo ($adlist["adpic"]); ?>" alt="<?php echo ($adlist["adremak"]); ?>" /></a></li>
					</ul><?php endforeach ?>
			</div>
		</div>
</div>
<div class="footer">
	<div class="web">
		<p><?php echo ($copyright); ?> 技术支持：<a href="http://www.nbpailang.com/">派浪网络</a></p>	
	</div>
</div>
<p id="back-to-top"><a href="#top"><span></span></a></p>
 <script>

$(function(){

        $(function () {

            $(window).scroll(function(){

                if ($(window).scrollTop()>100){

                    $("#back-to-top").fadeIn(1500);

                }

                else

                {

                    $("#back-to-top").fadeOut(1500);

                }

            });
            $("#back-to-top").click(function(){
                $('body,html').animate({scrollTop:0},1000);
                return false;
            });

        });

    });
	
 </script>
<script>
	$(".nav").click(function(){
		$(".menu ul").toggle();
	})
</script>
</body>
</html>