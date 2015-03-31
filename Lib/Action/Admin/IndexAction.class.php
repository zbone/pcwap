<?php
class IndexAction extends CommAction {

	public function left(){
		$this->display();
	}
	public function header(){
		$this->display();
	}
    public function index(){
		$this->display();
    }
	public function home(){
		$this->assign('tongzhi',$tongzhi);
		$this->display();
	}
	public function mysqlset(){
		if(session('adminuser')!=C('webuser')){
		
			$this->error('你没有权限',U('/Admin/Index/home'));
		}
		if($this->ispost()){
			if(F('pcwap',$_POST,CONF_PATH)){
				$this->success('修改成功',U('/Admin/Delcahe/del_cache'));
			}else{
				$this->error('修改失败');

			}	
		}else{
		$this->display();
		}
	}


	public function webset(){
		if(session('adminuser')!=C('webuser')){
		
			$this->error('你没有权限',U('/Admin/Index/home'));
		}
		if($this->ispost()){
			if(F('webset',$_POST,CONF_PATH)){
				$this->success('修改成功',U('/Admin/Delcahe/del_cache'));
			}else{
				$this->error('修改失败',U('/Admin/Delcahe/del_cache'));
			}			


		}else{
		

		$this->display();

		}


	}
	public function tplset(){
	if(session('adminuser')!=C('webuser')){
		
			$this->error('你没有权限',U('/Admin/Index/home'));
		}
		if($_GET['homename']){
			$data=array('DEFAULT_THEME'  => I('get.homename'));
			$db=F('tpl',$data,CONF_PATH.'Home/');
			if($db>0){
				$this->success('设置成功',U('/Admin/Delcahe/del_cache'));
			}else{
				$this->error('设置失败，检查Conf/Home目录是否可写！');
			}
		}
		elseif($_GET['wapname']){
			$data=array('DEFAULT_THEME'  => I('get.wapname'));
			$db=F('tpl',$data,CONF_PATH.'Wap/');
			if($db>0){
				$this->success('设置成功',U('/Admin/Delcahe/del_cache'));
			}else{
				$this->error('设置失败，检查Conf/Wap目录是否可写！');
			}
		}
		else{	
			$mu=APP_PATH."Tpl/Home/";
			$wap=APP_PATH."Tpl/Wap/";
			$home=openmulu1($mu);
			$wapt=openmulu1($wap);
			$all=array_unique(array_merge($home,$wapt));
			$at=implode(',',$all);
			$tlist=array('TMPL_DETECT_THEME' => true,'THEME_LIST' =>$at);			
			F('Conf/tpllist',$tlist,APP_PATH);
			$config_home = include_once APP_PATH.'Conf/Home/tpl.php';
			$config_wap = include_once APP_PATH.'Conf/Wap/tpl.php';
			$wapqian=array_keys(C('APP_SUB_DOMAIN_RULES'));						
			$this->wapurl='http://'.$wapqian[0];
			$this->hmoren=$config_home['DEFAULT_THEME'];
			$this->wapmoren=$config_wap['DEFAULT_THEME'];
			$this->homepath=$mu;
			$this->wappath=$wap;
			$this->home=openmulu($mu);
			$this->wap=openmulu($wap);		
			$this->display();
		  }
	}

	public function setphone(){
	if(session('adminuser')!=C('webuser')){
		
			$this->error('你没有权限',U('/Admin/Index/home'));
		}
		if($this->ispost()){
			$url=I('post.url');
			$isphone=$_POST['IS_phone'];
			$peizhi="<?php 
				return array(
				'IS_phone'=>$isphone,
				'APP_SUB_DOMAIN_DEPLOY'=>true,  
				'APP_SUB_DOMAIN_RULES'=>array(   
				'$url'=>array('Wap/'), 			
				),				
				);";
		$confpath = CONF_PATH.'phone.php';
		$webconfig = fopen($confpath,w);
		if($webconfig){
			$fwrite=fwrite($webconfig,$peizhi );
			
			if($fwrite > 0){
				$this->success('修改成功',U('/Admin/Delcahe/del_cache'));
			}else{
				$this->error('修改失败');
			}
			}
		}else{
		
		$this->phoneurl=array_keys(C('APP_SUB_DOMAIN_RULES'));
		$this->isphone=C('IS_phone');
		$this->display();
		}
	}
	
	
	public function opentpl(){
		if(session('adminuser')!=C('webuser')){
		
			$this->error('你没有权限',U('/Admin/Index/home'));
		}
		if($_GET['homename']){		
			$name=APP_PATH."Tpl/Home/".$_GET['homename']."/";
			$this->tem=$_GET['homename'];
		}elseif($_GET['wapname']){
			$name=APP_PATH."Tpl/Wap/".$_GET['wapname']."/";
			$this->tem=$_GET['wapname'];
		}
		
		
		
		$this->keys=array_keys($_GET);
		$this->home=openmulu($name);		
		$this->display();
	
	}
	public function edittpl(){
		if(session('adminuser')!=C('webuser')){
		
			$this->error('你没有权限',U('/Admin/Index/home'));
		}
		if($this->ispost()){
		
		$tplurl=$_POST['path'];		
		$webconfig = fopen($tplurl,w);
		if($webconfig){
			$fwite=fwrite($webconfig,str_replace('&#95;','_',trim(stripslashes($_POST['temp']))));
			if($fwite!=false){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}		
		}else{
		
			
		
		if($_GET['url']=='wapname'){
			$path=APP_PATH.'Tpl/Wap/'.$_GET['tem'].'/'.$_GET['file'].'.html';
			$cssjs=APP_PATH.'Tpl/Wap/'.$_GET['tem'].'/'.$_GET['file'];
		}
		if($_GET['url']=='homename'){
			$path=APP_PATH.'Tpl/Home/'.$_GET['tem'].'/'.$_GET['file'].'.html';		
			$cssjs=APP_PATH.'Tpl/Home/'.$_GET['tem'].'/'.$_GET['file'];
		}
		
		if(openmulu($cssjs)){		
			$this->cssjs=$cssjs;
			$this->css=openmulu($cssjs);
		}
		
		$this->path=$path;
		$this->back=$_GET;
		$this->temp=str_replace('_','&#95;',htmlspecialchars(file_get_contents($path)));
		$this->display();
		}
		
	}
	public function editcss(){
		if(session('adminuser')!=C('webuser')){
		
			$this->error('你没有权限',U('/Admin/Index/home'));
		}
	
		$path=APP_PATH.$_GET[_URL_][4].'/'.$_GET[_URL_][5].'/'.$_GET[_URL_][6].'/'.$_GET[_URL_][7].'/'.$_GET[_URL_][8];
	
		$this->path=$path;
	
		$this->temp=str_replace('_','&#95;',htmlspecialchars(file_get_contents($path)));
		$this->display();
	}
	
	

	public function sendmeail(){	
		if(session('adminuser')!=C('webuser')){
				
					$this->error('你没有权限',U('/Admin/Index/home'));
				}

		send_mail('962503677@qq.com','PCWAP','预感发过来的','你今天有空吗?我想请你吃饭');
		
		echo "发了一封测试邮件到系统设置内的邮箱中！";


	


	}


	


}