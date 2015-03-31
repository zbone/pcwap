function validateSno()
{  
$.post("?act=loginajax",    
{
	username:$("#username").val()},     
	function(returnedData,status)
	{     
	var result=returnedData;
	if(result!=null)
	{      
	$("#info").html("<font color=red>"+result+"</font>");     
	}
	else{
		$("#info").html(""); 
		}   
	 }
); 
}