<?php

class CommAction extends Action {
   	public function _initialize(){		 
		$this->webname=C('webname');
		$this->domain=C('domain');
		$this->webtitle=C('webtitle');
		$this->webkey=C('webkey');
		$this->webdesc=C('webdesc');
		$this->icp=C('icp');
		$this->tel=C('tel');
		$this->fax=C('fax');
		$this->email=C('email');
		$this->qq=get_keywords(C('qq'));		
		$this->address=C('address');
		$this->copyright=C('copyright');
		$this->logo=C('logo');
		$this->lianxi=C('lianxi');
		
		if(!$menu=S('menu')){
		$menu=M('cate')->where("menu='1' and pid='0'")->order('sort ASC')->select();		
		 foreach($menu as $k=>$v){
			$menu[$k]['url']=U('/'.$v['url']);
			$sub=M('cate')->where(array('menu'=>1,'pid'=>$v['id']))->select();				
			foreach ($sub as $c=>$b){			
				$sub[$c]['url']=U('/'.$sub[$c]['url']);			
			}	$menu[$k]['sub']=$sub;	
		}
		S('menu',$menu,C('huangcun'));	
		}	
		
		$this->menu=$menu;
			if(session('uid')!=false){
				$userinfo=M('user')->where(array('id'=>session('uid')))->find();
				$this->uid=$userinfo['id'];
				$this->username=$userinfo['user'];	
			}
		
	}
		public function _empty(){

	echo '当前操作不存在';

	}

}