<?php
// 本类由系统自动生成，仅供测试用途
class UploadAction extends CommAction {
	

	public function index(){	
		 if($this->ispost()){
		
			import('Class.UploadFile',LIB_PATH);	
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = C('MAX_SIZE');// 设置附件上传大小
			$upload->allowExts  = explode(',',C('FIEL_NAME'));// 设置附件上传类型
			//$upload->autoSub = true;
			//$upload->subType = 'date';
			//$upload->dateFormat = 'Ymd';
			$upload->savePath = APP_PATH.'Uploads/mid/';// 设置附件上传目录						   $upload->thumb = C('IS_thumb'); 				// 设置引用图片类库包路径 				$upload->imageClassPath ='@.Class.Image'; 				//设置需要生成缩略图的文件后缀 				$upload->thumbPrefix = 'm_';  //生产2张缩略图 				//设置缩略图最大宽度 				$upload->thumbMaxWidth = C('thumbMaxWidth'); 				//设置缩略图最大高度 				$upload->thumbMaxHeight = C('thumbMaxHeight');				$upload->saveRule = uniqid;				$upload->thumbRemoveOrigin = true;
			 if(!$upload->upload()) {// 上传错误提示错误信息
				echo $upload->getErrorMsg();
			 }else{// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();				if(C('IS_thumb')){					$m='m_';				}
				$picurl=__ROOT__.str_replace('.','',$info[0]['savepath']).$m.$info[0]['savename'];								//$picurl=$info[0]['savepath'].'m_'.$info[0]['savename'];								
				//echo "<script type='text/javascript'>parent.document.getElementById('logo').value='".$picurl."';</script>";
				echo $picurl;
				//$this->success('上传成功');
		 }
		}else{		
			
			$this->display();
			}
	
}

public function ueditor(){
			import('Class.UploadFile',LIB_PATH);				
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = C('MAX_SIZE');// 设置附件上传大小
			$upload->allowExts  =explode(',',C('FIEL_NAME'));// 设置附件上传类型
			$upload->autoSub = true;
			$upload->subType = 'date';
			$upload->dateFormat = 'Ymd';			
			$upload->saveRule = uniqid;
			$upload->savePath =  APP_PATH.'Uploads/';// 设置附件上传目录
			 if(!$upload->upload()) {// 上传错误提示错误信息
				echo json_encode(array('error'=>1,'message'=>$upload->getErrorMsg()));
			 }else{// 上传成功 获取上传文件信息
				$data =  $upload->getUploadFileInfo();		
				for ($i=0;$i<count($data);$i++){						
						//$picurl=str_replace('.','',$data[$i]['savepath']).$data[$i]['savename'];						$picurl=__ROOT__.str_replace('.','',$data[$i]['savepath']).$data[$i]['savename'];	
						echo json_encode(array(								'error' => 0,
								'url'=>$picurl,
								'title'=>htmlspecialchars($_POST['pictitle'], ENT_QUOTES),
								'original'=>$data[$i]['name'],
								'state'=>'SUCCESS'
						));
					}				
		 }
		}

	
    
	public function imageManager(){

    header("Content-Type: text/html; charset=utf-8");
    error_reporting( E_ERROR | E_WARNING );

    //需要遍历的目录列表，最好使用缩略图地址，否则当网速慢时可能会造成严重的延时
    $paths = array(APP_PATH.'Uploads');	
	  function getfiles( $path , &$files = array() )
		{
			if ( !is_dir( $path ) ) return null;
			$handle = opendir( $path );
			while ( false !== ( $file = readdir( $handle ) ) ) {
				if ( $file != '.' && $file != '..' ) {
					$path2 = $path . '/' . $file;
					if ( is_dir( $path2 ) ) {
						getfiles( $path2 , $files );
					} else {
						if ( preg_match( "/\.(gif|jpeg|jpg|png|bmp)$/i" , $file ) ) {
							$files[] = $path2;
						}
					}
				}
			}
			return $files;
		}
    $action = htmlspecialchars( $_POST[ "action" ] );
    if ( $action == "get" ) {
	
	
        $files = array();
        foreach ( $paths as $path){
            $tmp = getfiles( $path );
            if($tmp){
                $files = array_merge($files,$tmp);
            }
        }
        if ( !count($files) ) return;
        rsort($files,SORT_STRING);
        $str = "";
        foreach ( $files as $file ) {
            $str .= $file . "ue_separate_ue";
        }
             echo $str;
    }

  
	
	}
	
	
	public function getMovie(){
	   /**
     * Created by JetBrains PhpStorm.
     * User: taoqili
     * Date: 12-2-19
     * Time: 下午10:44
     * To change this template use File | Settings | File Templates.
     */
    error_reporting(E_ERROR|E_WARNING);
    $key =htmlspecialchars($_POST["searchKey"]);
    $type = htmlspecialchars($_POST["videoType"]);
    $html = file_get_contents('http://api.tudou.com/v3/gw?method=item.search&appKey=myKey&format=json&kw='.$key.'&pageNo=1&pageSize=20&channelId='.$type.'&inDays=7&media=v&sort=s');
    echo $html;
	
	}
}