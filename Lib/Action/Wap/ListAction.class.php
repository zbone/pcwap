<?php
class ListAction extends CommAction {

	
    public function index(){	
	
			$url=$_SERVER['PATH_INFO'];
			$condition['id']=session('uid');
			$my=M('vip')->find($condition['id']);
			if($my['mb']=='1')
			$this->mb='修改密码保护';
			else
			$this->mb='设置密码保护';
			
		    $this->phone=session('uphone');
			
		if($condition['id']!="NULL" || isset($condition['id']))
		{
			$myhome=M('vip')->where($condition)->find();
			if($myhome['rz']=='1'){
			$this->rz='已认证';
			$this->rzurl='#';}
			else
			{
			$this->rz='未认证';
			$this->rzurl='/setrz.html';
			}
			$this->username=$myhome['username'];
		}
		else if($url!="/login" || $url!="remail" || $url!="rphone" || $url!="emailzc" || $url!="phonezc")
		{
		$this->error('登录超时','/login');
		}				



	if($_GET['act']=="loginajax")
	{
	 $condition['username'] = $_POST['username'];
	 $condition['email'] = $_POST['username'];
	 $condition['phone']=$_POST['username'];
	 $condition['_logic'] = 'OR';
	 $mbajax=M('vip')->where($condition)->find();
	 if(isset($mbajax))
	 {
        if($mbajax['mb']=='0')
        {
        echo '无需密保';die;
         }
        else{
        echo '<div class="divoi_odi">
					<div class="login_td" id="login_dt">
                    <select name="problem"> 
                   	   <option value="0">请选择你的密保问题</option>
                       <option value="1">你的生日是？</option>
                       <option value="2">你母亲的名字是？</option>
                       <option value="3">你父亲的名字是？</option>         
                       <option value="4">你的大学名字是？</option>
                       <option value="5">你最爱吃的水果是？</option>         
                       <option value="6">你最喜爱的人是？</option>
                    </select>
					</div>					
				</div>
				
				<aside class="aisde_l">
					<div>
						<div class="aisde_od">
							<input type="text" placeholder="答案验证"  name="key" >
						</div>
					</div>
				</aside>';die;
         }
	 }
	 else
	 {
			echo '用户名不存在';die; 
	 }
	}









	
	if($_GET['act']=="login")
	{	

		$condition['username'] = $_POST['username'];
		$condition['email'] = $_POST['username'];
		$condition['phone']=$_POST['username'];
		$condition['_logic'] = 'OR';
		$vipsub=M('vip')->where($condition)->find();	
		if(isset($vipsub))
		{	
		
			if($vipsub['mb']=='1')
			{	
				switch ($_POST['problem'])
					{
					case 1: $map['problem']='你的生日是？';break; 
					case 2: $map['problem']='你母亲的名字是？';break; 
					case 3: $map['problem']='你父亲的名字是？';break; 
					case 4: $map['problem']='你大学的校名是？';break; 
					case 5: $map['problem']='你最爱吃的水果是？';break; 
					case 6: $map['problem']='你最喜爱的人是？';break;  
					}	
				$map['uid'] =$vipsub['id'];
				$problem=M('problem')->where($map)->find();
				if($problem['key']==$_POST['key'])
				{	
					if($vipsub['pwd']==encrypt($_POST['pwd']))
					{
						session('uid',$vipsub['id'],'28800');	
						$this->success('登录成功',U('/myhome'));
					}
					else{
						$this->error('密码错误');
					}
				}
				else
				{
					$this->error('密保验证失败');
				}
			}
			else
			{
				if($vipsub['pwd']==encrypt($_POST['pwd']))
					{
						session('uid',$vipsub['id'],'28800');	
						$this->success('登录成功',U('/myhome'));
					}
					else{
						$this->error('密码错误');
					}
			}
		}
		else{
			$this->error('用户名不存在');
		}

		
	}
	
	if($_GET['act']=="outlogin")
	{
		session('uid',null);
		$this->success('退出成功',U('/login'));
	}
	
	if($_GET['act']=="remail")
	{
		$map['email'] = array('eq',$_POST['email']);
		$yz=M('vip')->where($map)->count();
		if(empty($yz))
		{
		
		$data['email']=htmlspecialchars(addslashes($_POST['email']),ENT_QUOTES);
		session('yzm',rand(100000,999999),3600);
		session('uemail',$data['email']);
		
		$body='您的验证码是：'.$_SESSION['yzm'].'，有效时间一分钟';
		send_mail($data['email'],'yzm','ligao',$body);
		$this->success('成功',U('/emailzc'));
		}
		else
		{
			$this->error('此邮箱已注册');
		}
	}
	
	if ($_GET['act']=='rphone')
	{
		$map['phone'] = array('eq',$_POST['phone']);
		$yz=M('vip')->where($map)->count();
		if(empty($yz))
		{
		$data['phone']=htmlspecialchars(addslashes($_POST['phone']),ENT_QUOTES);
		session('yzm',rand(100000,999999),3600);
		session('uphone',$data['phone']);
		$body='您的验证码是：'.$_SESSION['yzm'].'，有效时间一分钟';
		send_phone($data['phone'],$body);

		$this->success('成功',U('/phonezc'));
		}	
		else
		{
			$this->error('此号码已注册');
		}
	}
	
	if ($_GET['act']=='sphone')
	{
		$map['phone'] = array('eq',$_GET['phone']);
		$yz=M('vip')->where($map)->count();
		if(empty($yz))
		{
		$data['phone']=htmlspecialchars(addslashes($_GET['phone']),ENT_QUOTES);
		session('yzm',rand(100000,999999),3600);
		session('uphone',$data['phone']);
		
		$body='您的验证码是：'.$_SESSION['yzm'].'，有效时间一分钟';
		send_phone($data['phone'],$body);

		$this->success('成功',U('/phonezc'));
		}	
		else
		{
			$this->error('此号码已注册');
		}
	}
	
	
	if($_GET['act']=="emailzc")
	{
		$map['username'] = array('eq',$_POST['username']);
		$yz=M('vip')->where($map)->count();
		if(empty($yz))
		{
			$data['pwd']=encrypt(htmlspecialchars(addslashes($_POST['password']),ENT_QUOTES));
			$data['username']=htmlspecialchars(addslashes($_POST['username']),ENT_QUOTES);
			$data['class']="email";
			$data['email']=session('uemail');
			$data['time']=date('Y-m-d');
			$data['ip']=get_client_ip();
			if($_POST['qryzm']==session('yzm')&& $_POST['password']==$_POST['passwordCheck'])
			{
				$con =M('vip')->add($data);
				if($con>0){	
						$this->success('添加成功',U('/login'));
					}else{
						$this->error('添加失败');
					}
			}
			else{
				
				$this->error('验证码错误或失效');
			}
		}	
		else
		{
			$this->error('昵称已存在');
		}
	}
	
	if($_GET['act']=="phonezc")
	{
		$map['username'] = array('eq',$_POST['username']);
		$yz=M('vip')->where($map)->count();
		if(isset($yz))
		{
			$data['pwd']=encrypt(htmlspecialchars(addslashes($_POST['password']),ENT_QUOTES));
			$data['username']=htmlspecialchars(addslashes($_POST['username']),ENT_QUOTES);
			$data['class']="phone";
			$data['phone']=session('uphone');
			$data['time']=date('Y-m-d');
			$data['ip']=get_client_ip();
			if($_POST['qryzm']==session('yzm'))
			{
				$con =M('vip')->add($data);
				if($con>0){	
						$this->success('添加成功',U('/login'));
					}else{
						$this->error('添加失败');
					}
			}
			else{
				
				$this->error('验证码错误或失效');
			}
		}	
		else
		{
			$this->error('昵称已存在');
		}
	}
	
	
	if($_GET['act']=="setrz")
	{
		$data['relname']=htmlspecialchars(addslashes($_POST['relname']),ENT_QUOTES);
		$data['idcard']=htmlspecialchars(addslashes($_POST['idcard']),ENT_QUOTES);
		$data['qq']=htmlspecialchars(addslashes($_POST['qq']),ENT_QUOTES);
		$data['birthday']=htmlspecialchars(addslashes($_POST['birthday']),ENT_QUOTES);
		$data['site']=htmlspecialchars(addslashes($_POST['site']),ENT_QUOTES);
		$data['rz']='1';
			$map['id'] = array('eq',$condition['id']);
			M('vip')->where($map)->save($data);
			$this->success('认证成功',U('/myhome'));
	}
	
	if($_GET['act']=='setpwd')
	{
		
		$data['oldpwd']=encrypt(htmlspecialchars(addslashes($_POST['oldPassword']),ENT_QUOTES));
		$data['pwd']=encrypt(htmlspecialchars(addslashes($_POST['password']),ENT_QUOTES));
		if($my['pwd']==$data['oldpwd'])
		{
		$map['id'] = array('eq',$condition['id']);
		$setpwd=M('vip')->where($map)->save($data);
		session('uid',null);
		$this->success('密码已修改成功，请重新登录',U('/login'));
		}
		else{
			$this->error('密码错误');
		}
	}
	
	
	
	if($_GET['act']=='propwd')
	{
			$map['id'] = array('eq',$condition['id']);
			$mykey=M('vip')->where($map)->find();
			if($mykey['pwd']==encrypt($_POST['password']))
			{
			
			$change['mb']='1';
			M('vip')->where($map)->save($change);
			
				switch ($_POST['problem'])
				{
				case 1: $data['problem']='你的生日是？';break; 
				case 2: $data['problem']='你母亲的名字是？';break; 
				case 3: $data['problem']='你父亲的名字是？';break; 
				case 4: $data['problem']='你大学的校名是？';break; 
				case 5: $data['problem']='你最爱吃的水果是？';break; 
				case 6: $data['problem']='你最喜爱的人是？';break;  
				}
				$data['key']=htmlspecialchars(addslashes($_POST['key']),ENT_QUOTES);
				$data['username']=$mykey['username'];
				$data['uid']=$condition['id'];
				if($mykey['mb']!='1')
				{
					$con =M('problem')->add($data);
					if($con>0){	
							$this->success('添加成功',U('/myhome'));
						}else{
							$this->error('添加失败');
						}
				}
				else
				{
					$goid['uid'] = array('eq',$condition['id']);
					M('problem')->where($goid)->save($data);
					$this->success('密保修改成功',U('/myhome'));
				}
				
			}
			else
			{
				$this->error('密码错误');
			}
			
	}
		
			$url=htmlspecialchars(addslashes(I('get.url')),ENT_QUOTES);
			
			if(inject_check($id)){
				$this->error('非法操作');
			}			
									
			$tem=M('cate')->where(array('url'=>$url))->find();
			
			if($tem['outurl']){
				Header("HTTP/1.1 301 Moved Permanently");
				Header("Location: ". $tem['outurl']);
			}
			$id=$tem['id'];
			
			if($tem['pid']=='0'){
				
				$daohan='<a href="'.U('/'.$tem['url']).'" >'.$tem['catename'].'</a>';				
			}else{
				$Upcate=M('cate')->find($tem['pid']);
				$daohan='<a href="'.U('/'.$Upcate['url']).'" >'.$Upcate['catename'].'</a> > <a href="'.U('/'.$tem['url']).'" >'.$tem['catename'].'</a>';
				
			}
		
			import("Class.Page",LIB_PATH);			
			
			
				
				$cids=M('cate')->where("pid=$tem[id]")->getField('id',true);
				if($cids){
				$allid=implode(',',$cids).','.$id;
				}else{
					$allid=$id;
				}
				
			
			$count=M('info')->where("cid IN ($allid)")->where(array('isshow'=>1))->order('id desc')->count();
		
			$Page= new Page($count,$tem['catepage']);				
			$list=M('info')->where(array('isshow'=>1))->where("cid IN ($allid)")->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();	
			foreach($list as $ke=>$cname){							
				$ccate=M('cate')->find($cname['cid']);				
				$list[$ke]['catename']=$ccate['catename'];		
				$list[$ke]['cateurl']=U('/'.$ccate['url']);	
				$list[$ke]['url']=U('/'.$cname['id']);	
				$tags=M('tags')->where(array('pid'=>$cname['id']))->field('tags,url')->select();			
				foreach($tags as $v){					
					$list[$ke]['tag'].="<a href=".U('/tag/'.$v['url']).">".$v['tags']."</a>";
				}
				$list[$ke]['diy']=M('diy')->where(array('pid'=>$cname['id']))->select();
				
			}	
			$Page->rollPage = 1;
			$Page->setConfig('theme',"<li>%upPage% </li><li>%downPage%</li>");			
			$Page->url =$url;					
			$show= $Page->show();			
			$this->assign('page',$show);		
			
			
				$catesub=M('cate')->where("pid=$tem[id]")->order('sort DESC')->select();				
			if(empty($catesub)){			
				$catesub=M('cate')->where(array('catetype'=>$tem['catetype'],'pid'=>0))->order('sort DESC')->select();
			}	
				foreach ($catesub as $key=>$dd){
					$catesub[$key]['url']=U('/'.$dd['url']);
				}
			$this->daohan=$daohan;
			$this->catesub=$catesub;		
			$this->list=$list;		
			$this->title=$tem['catename'];		
			$this->p=$_GET['p'];		
			$this->seotitle=$tem['catetitle'];		
			$this->key=$tem['catekey'];		
			$this->desc=$tem['catedesc'];		
			$this->catelogo=$tem['catelogo'];	
			$this->url=U('/'.$tem['url']);
			$this->content=$tem['content'];	
		
			$this->cate=$tem;
			unset($list);
			if($tem['catetemp']){
				$this->display(':'.$tem['catetemp']);	
					exit;
			}
			if($tem['catetype']=='2'){
				$this->display(':pic_list');
			}			
			if($tem['catetype']=='1'){
				$this->display(':text_list');
			}
			if($tem['catetype']=='3'){
				$this->display(':page');
			}
			

			
	}		

}
