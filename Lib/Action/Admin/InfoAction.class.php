<?php

class InfoAction extends CommAction {

	
	public function index(){
		
	
		if($this->ispost()){
			
			if($_POST['del']==2){
				$i=0;
				while($i<=count($_POST['id'])){
					$arr=M('info')->where(array('id'=>$_POST['id'][$i]))->setField('isshow',1);					
					$i++;
				}
				$this->success('修改成功');
			}
			if($_POST['del']==9){
				$i=0;
				while($i<=count($_POST['id'])){
					$arr=M('info')->where(array('id'=>$_POST['id'][$i]))->setField('isshow',0);					
					$i++;
				}
				$this->success('修改成功');
			}
			if($_POST['del']==3){
				$i=0;
				while($i<=count($_POST['id'])){
					$arr=M('info')->where(array('id'=>$_POST['id'][$i]))->setField('istop',1);					
					$i++;
				}
				$this->success('修改成功');
			}
			if($_POST['del']==7){
				$i=0;
				while($i<=count($_POST['id'])){
					$arr=M('info')->where(array('id'=>$_POST['id'][$i]))->setField('istop',0);					
					$i++;
				}
				$this->success('修改成功');
			}
			if($_POST['del']==4){
				$i=0;
				while($i<=count($_POST['id'])){
					$arr=M('info')->where(array('id'=>$_POST['id'][$i]))->setField('isrec',1);					
					$i++;
				}
				$this->success('修改成功');
			}
			if($_POST['del']==8){
				$i=0;
				while($i<=count($_POST['id'])){
					$arr=M('info')->where(array('id'=>$_POST['id'][$i]))->setField('isrec',0);					
					$i++;
				}
				$this->success('修改成功');
			}
			if($_POST['del']==5){
				$i=0;
				while($i<=count($_POST['id'])){
					$arr=M('info')->where(array('id'=>$_POST['id'][$i]))->setField('isrev',1);					
					$i++;
				}
				$this->success('修改成功');
			}
			if($_POST['del']==6){
				$i=0;
				while($i<=count($_POST['id'])){
					$arr=M('info')->where(array('id'=>$_POST['id'][$i]))->setField('isrev',0);					
					$i++;
				}
				$this->success('修改成功');
			}
			if($_POST['del']==1){
				$i=0;
				while($i<=count($_POST['id'])){
					M('info')->where(array('id'=>$_POST['id'][$i]))->delete();	
					M('diy')->where(array('pid'=>$_POST['id'][$i]))->delete();								
					M('tags')->where(array('pid'=>$_POST['id'][$i]))->delete();								
					$i++;
				}
				$this->success('删除成功');
			}
		
		
		}else{
		
		function catename($info) {									
			foreach ($info as $k => $v){						
				$cate=M('cate')->where(array('id'=>$v['cid']))->find();	
	
				$infolist[]= array(				
				'name'=>$v['name'],
				'catename'=>$cate['catename'],
				'catetype'=>$cate['catetype'],
				'pic'=>$v['pic'],
				'isshow'=>$v['isshow'],	
				'revs'=>$v['revs'],	
				'time'=>$v['time'],			
				'id'=>$v['id'],			
				'istop'=>$v['istop'],		
				'isrec'=>$v['isrec'],		
				'isrev'=>$v['isrev'],		
				'price'=>$v['price'],		
				'hits'=>$v['hits'],	
				'cid'=>$v['cid'],	
				);					
			}		
			return $infolist;		
			}
		import('Class.Page',LIB_PATH);
		$count= M('info')->count();
		$Page= new Page($count,25);
		$Page->url =GROUP_NAME.'/Info/index/p/';
		$this->page = $Page->show();
		if($_GET['cid']){
		$info =M('info')->order('id DESC')->where(array('cid'=>$_GET['cid']))->limit($Page->firstRow.','.$Page->listRows)->select();
		}else{		
		$info =M('info')->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		}
		$this->info=catename($info);
		$this->catelist=M('cate')->select();
		$this->display();
		}
			
	}
	public function addinfo(){
		if($this->ispost()){			
			if($_POST['content']==false || $_POST['name']==false || $_POST['cid']==false){
				$this->error('标题不能为空，内容不能为空，请选择分类');
			}	
			$_POST['content']=stripslashes($_POST['content']);
			if(!$_POST['desc']){
				$_POST['desc']=substr(strip_tags($_POST['content']),0,200);
			}
			$cate=M('cate')->find($_POST['cid']);
			if($cate['catetype']==1){
				$_POST['ispic']=0;
			}else{
				$_POST['ispic']=1;
			}
			$cate=M('cate')->find($_POST['cid']);
			$_POST['temp']=$cate['infotemp'];
		
			$info=M('info')->add($_POST);						
			if($_POST['tags']){
			$tags=get_keywords($_POST['tags']);
			$tagscount=count($tags);
			for($i=0;$i<$tagscount;$i++){				if($tags[$i]){
				$tagurl=get_pinyin($tags[$i]);
				M('tags')->data(array('pid'=>$info,'url'=>$tagurl[0],'tags'=>$tags[$i]))->add();				}
			}
			
			}
			if(!empty($_POST['diykey'])){
				$condiy=count($_POST['value']);
				for($i=0;$i<$condiy;$i++){
					$data = array('value'=>$_POST['value'][$i],'diykey'=>$_POST['diykey'][$i],'cid'=>$_POST['cid'],'pid'=>$info);
					M('diy')->add($data);
				}
			}
			if($info>0){			
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		
		}else{
		$cate = M('cate')->where("pid='0'")->order('sort ASC')->select();
		
		foreach($cate as $k=>$v){
			$cate[$k]['sub']=M('cate')->where(array('pid'=>$v['id']))->order('sort ASC')->select();
		}		$tagall=M("tags")->getField("url,tags",true);			foreach($tagall as $key => $value){		$taglist[$key]=Array('url'=>$key,'tag'=>$value);					}		$this->taglist=$taglist;			
		$this->cate=$cate;
		$this->cid=$cid;
		
		
		$this->display();
		}
	}
	
	public function edit(){
		
		if($this->ispost()){
			// print_r($_POST);exit;
			if($_POST['content']==false || $_POST['name']==false || $_POST['cid']==false){
				$this->error('标题不能为空，内容不能为空，请选择分类');
			}		
			$_POST['content']=stripslashes($_POST['content']);
			if(!$_POST['isshow']){
				$_POST['isshow']=0;
			}
			if(!$_POST['istop']){
				$_POST['istop']=0;
			}
			if(!$_POST['isrec']){
				$_POST['isrec']=0;
			}
			if(!$_POST['isrev']){
				$_POST['isrev']=0;
			}
			$cate=M('cate')->find($_POST['cid']);
			if($cate['catetype']==1){
				$_POST['ispic']=0;
			}else{
				$_POST['ispic']=1;
			}			if($_POST['tags']){					
			$tags=get_keywords($_POST['tags']);
			$tagscount=count($tags);
			M('tags')->where(array('pid'=>$_POST['id']))->delete();			
						
			for($i=0;$i<$tagscount;$i++){				if($tags[$i]){
				$tagurl=get_pinyin($tags[$i]);
				$ti=M('tags')->data(array('pid'=>$_POST['id'],'url'=>$tagurl[0],'tags'=>$tags[$i]))->add();				}
			}			}			M('diy')->where(array('pid'=>$_POST['id']))->delete();
			$condiy=count($_POST['value']);
			for($k=0;$k<$condiy;$k++){
				$data['diykey']=$_POST['diykey'][$k];
				$data['value']=$_POST['value'][$k];
				$data['pid']=$_POST['id'];
				$data['cid']=$_POST['cid'];
				M('diy')->add($data);
			}
			
			$info=M('info')->save($_POST);
			if($info>0 || $ti || $diyid){
				$this->success('修改成功',U('/Admin/Info/index'));
			}else{
				$this->error('修改失败');
			}
		}else{
	
	
		$icate = M('cate')->where("pid='0'")->order('sort ASC')->select();
		
		foreach($icate as $k=>$v){	
			$icate[$k]['sub']=M('cate')->where(array('pid'=>$v['id']))->order('sort ASC')->select();
		}		
		$info=M('info')->find($_GET['id']);		$down=M('down')->where(array('infoid'=>$_GET['id']))->find();		$this->download=$down['download'];
		$tag=M('tags')->where(array('pid'=>$_GET['id']))->getField('tags',true);
		$tags=implode(',',$tag);
		$diy=M('diy')->where(array('pid'=>$_GET['id']))->select();		$tagall=M("tags")->getField("url,tags",true);			foreach($tagall as $key => $value){		$taglist[$key]=Array('url'=>$key,'tag'=>$value);					}		$this->taglist=$taglist;
		$this->cate=M('cate')->find($info['cid']);
		$this->diy=$diy;
		$this->tags=$tags;
		$this->info=$info;
		$this->assign('icate',$icate);	
		$this->display();
		}
	}
	public function delete(){
		
		if(M('diy')->delete($_GET['id'])){
			$this->success('删除成功');		
		}else{
			$this->error('删除失败');
		}
	
	}

}