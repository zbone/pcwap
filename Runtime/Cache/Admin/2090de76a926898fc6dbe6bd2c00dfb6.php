<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>派浪智能跨平台网站管理系统</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="__PUBLIC__css/bootcss.css">
    <link rel="stylesheet" href="__PUBLIC__css/style.css">
	<script src="__PUBLIC__js/jquery.min.js"></script>
    <script src="__PUBLIC__js/ajaxfileupload.js"></script>
  
  </head>
  <body>
<script type="text/javascript">
	function ajaxFileUpload()
	{
	

		$.ajaxFileUpload
		(
			{
				url:'__GROUP__/Upload/',
				secureuri:false,				
				fileElementId:'uplogo',
				dataType: 'post',			
				success: function (data)
				{
					parent.document.getElementById('logo').value=data;
				}
			}
		)
		
		return false;

	}
	</script>	

		
<form name="form"  method="POST" enctype="multipart/form-data">
							<div class="input-group">	
								 	
									<input type="file" class="form-control"  id="uplogo"  size="45" name="uplogo" />
								  <span class="input-group-btn">
									<button class="btn btn-default" type="button" id="buttonUpload" onclick="ajaxFileUpload();" >上传</button>
								  </span>
							
								 </div>
 </form>
	
  </body>
 </html>