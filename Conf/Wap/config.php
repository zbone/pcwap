<?php
$config_arr = include_once CONF_PATH.'Wap/tpl.php';
$config_arr4 = include_once(CONF_PATH.'tpllist.php');
$config_arr1= array(	

		'TMPL_PARSE_STRING'=>array(
			'__PUBLIC__'=>__ROOT__.'/Tpl/'.GROUP_NAME,			
		),
		'URL_CASE_INSENSITIVE' =>true,
		'HTML_CACHE_ON'=>true,
		'HTML_CACHE_RULES'=>array(
			'List:index'=>array('{:group}/{url}-{p}',C(HUNCUNTIME)),		
			'Show:index'=>array('{:group}/{id}-{p}',C(HUNCUNTIME)),		
			'Tags:index'=>array('{:group}/{:module}-{url}-{p}',C(HUNCUNTIME)),		
			'Search:index'=>array('{:group}/{:module}-{url}-{p}',C(HUNCUNTIME)),		
			'Index:index'=>array('{:group}/{:action}',C(HUNCUNTIME)),		
		 ),
);
return array_merge($config_arr,$config_arr1,$config_arr4);
?>