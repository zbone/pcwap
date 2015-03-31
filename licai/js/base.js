/**
 * 自定义样式名查找元素
 */
document.getElementsByClassName = function(){
		var tTagName ="*";
		if(arguments.length > 1){
		   tTagName = arguments[1];
		}
		if(arguments.length > 2){
		   var pObj = arguments[2]
		}
		else{
		   var pObj = document;
		}
		var objArr = pObj.getElementsByTagName(tTagName);
		var tRObj = new Array();
		for(var i=0; i<objArr.length; i++){
		   if(objArr[i].className == arguments[0]){
		    tRObj.push(objArr[i]);
		   }
		}
		return tRObj;
		};
	
	function removeNode(node){
	 if(node && node.parentNode){
		     node.parentNode.removeChild(node);
		 }
	}
	
	function nameFormart(name){
		var data=document.getElementsByName(name);
		for(var i = 0; i< data.length; i++){
			var da=data[i].innerText;
			if(da.indexOf(".")>0){
				if ((da.length-da.indexOf(".")-1)<2) {
					data[i].innerText=da+"0";
				}else{
					data[i].innerText=da.substring(0,da.indexOf(".")+3);
				}
			}else{
				if(isNumber(da)){
					data[i].innerText=da+".00";
				}
			}
		}
	}
	
	function classNameFormart(className){
		var data=document.getElementsByClassName(className);
		for(var i = 0; i< data.length; i++){
			var da=data[i].innerText;
			if(da.indexOf(".")>0){
				if ((da.length-da.indexOf(".")-1)<2) {
					data[i].innerText=da+"0";
				}else{
					data[i].innerText=da.substring(0,da.indexOf(".")+3);
				}
			}else{
				if(isNumber(da)){
					data[i].innerText=da+".00";
				}
			}
		}
	}
	
	function idFormart(id){
		var allMoney=document.getElementById(id);
		var temp=allMoney.innerText;
		if(temp.indexOf(".")>0){
			if ((temp.length-temp.indexOf(".")-1)<2) {
				allMoney.innerText=temp+"0";
			}else{
				allMoney.innerText=temp.substring(0,temp.indexOf(".")+3);
			}
		}else{
			if(isNumber(temp)){
				allMoney.innerText=temp+".00";
			}
		}
	}
	
	function strFormart(str){
		var temp=str;
		if(temp.indexOf(".")>0){
			if ((temp.length-temp.indexOf(".")-1)<2) {
				temp=temp+"0";
			}else{
				temp=temp.substring(0,temp.indexOf(".")+3);
			}
		}else{
			temp=temp+".00";
		}
		return temp;
	}
	
	/** 
	 * 验证是否为数字 
	 * @param oNum 
	 * @return 
	 */  
	function isNumber(oNum) {  
	    if (!oNum)  
	        return false;  
	    var strP = /^\d+(\.\d+)?$/;  
	    if (!strP.test(oNum))  
	        return false;  
	    try {  
	        if (parseFloat(oNum) != oNum)  
	            return false;  
	    } catch (ex) {  
	        return false;  
	    }  
	    return true;  
	}
	/*
		去空
	*/
	String.prototype.trim = function()  
    {  
        return this.replace(/(^\s*)|(\s*$)/g, "").replaceAll(" ","");  
    }; 
	
	function trim(str){
	     return str.replace(/(^\s*)|(\s*$)/g,'').replaceAll(" ","");
	}
	
	/*
		重写replaceAll
	*/
	String.prototype.replaceAll = function(s1,s2) { 
	    return this.replace(new RegExp(s1,"gm"),s2); 
	};
	
	function onlyNum(e) {
		if(!isNumber(e.value)){
			if((e.value+'').lastIndexOf('.')==((e.value+'').length-1)&&((e.value+'').length-(e.value+'').replace('.','').length)==1){
				return false;
			}
			e.value='';
		    return false;
		}
	    if((e.value+'').length>10){
	    	e.value=(e.value+'').substring(0,10);
	    	return false; 
	    }
	    if((e.value+'').indexOf('.')>0&&((e.value+'').length-1-(e.value+'').indexOf('.'))>2){
	    	e.value=(e.value+'').substring(0,(e.value+'').indexOf('.')+3);
	    	return false; 
	    }
	} 
	
	function getQueryString(name) {
	    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	    var r = window.location.search.substr(1).match(reg);
	    if (r != null) return unescape(r[2]); return null;
	 }
	
	 //获取上个周期的初始时间  
	function getLastBeginMonth(beginYearMonth,endYearMonth){ 
	    var beginYear = parseInt(beginYearMonth.substr(0,4),10);                
	    var beginMonth = parseInt(beginYearMonth.substr(4,6),10);   
	    var endYear = parseInt(endYearMonth.substr(0,4),10);                
	    var endMonth = parseInt(endYearMonth.substr(4,6),10);   
	     var Month1,Month2,iMonths;   
	     Month1=beginYear*12+beginMonth;  
	     Month2=endYear*12+endMonth;  
	     iMonths = Month2-Month1+1;    
	    //create the date   
	    var myDate = new Date(beginYear,beginMonth,0);   
	    //add a month   
	    myDate.setMonth(myDate.getMonth() - iMonths);   
	    var firstMonth=date2str(myDate,"yyyyMM")  
	    alert("开始日期："+beginYearMonth+"，间隔月份数："+iMonths+"，前推N月后的日期："+firstMonth);  
	    return firstMonth;       
	}

	//获取上个周期的结束时间  
	function getLastEndMonth(beginYearMonth){             
	    var strYear = parseInt(beginYearMonth.substr(0,4),10);                
	    var strMonth = parseInt(beginYearMonth.substr(4,6),10);        
	    if(strMonth - 1 == 0){        
	       strYear -= 1;        
	       strMonth = 12;        
	    } else {        
	       strMonth -= 1;        
	    }            
	    if(strMonth<10){          
	       strMonth="0"+strMonth;          
	    }        
	      
	    var monthstr = strYear+""+strMonth;    
	    //alert("当前月份："+beginYearMonth+",上一个月："+monthstr);  
	    return monthstr;        
	}     
	  
	function date2str(x,y) {  
	    var z = {M:x.getMonth()+1,d:x.getDate(),h:x.getHours(),m:x.getMinutes(),s:x.getSeconds()};  
	    y = y.replace(/(M+|d+|h+|m+|s+)/g,function(v) {return ((v.length>1?"0":"")+eval('z.'+v.slice(-1))).slice(-2);});  
	    return y.replace(/(y+)/g,function(v) {return x.getFullYear().toString().slice(-v.length);});  
	}
	
	function getQueryParmeter(name){
		if(location.href.indexOf("?")==-1 || location.href.indexOf(name+'=')==-1)
			{
				return '';
			}
		var queryString = location.href.substring(location.href.indexOf("?")+1); 
		var parameters = queryString.split("&"); 
		var pos, paraName, paraValue;
		for(var i=0; i<parameters.length; i++){
			pos = parameters[i].indexOf('=');
			if(pos == -1) { continue; }
			paraName = parameters[i].substring(0, pos);
			paraValue = parameters[i].substring(pos + 1);
			if(paraName == name) {
				return unescape(paraValue.replace(/\+/g, " ")); 
			};
		}
		return ''; 
	}
	
	//+---------------------------------------------------  
	//| 字符串转成日期类型   
	//| 格式 MM/dd/YYYY MM-dd-YYYY YYYY/MM/dd YYYY-MM-dd  
	//+---------------------------------------------------  
	function StringToDate(DateStr)  
	{   
	  
	    var converted = Date.parse(DateStr);  
	    var myDate = new Date(converted);  
	    if (isNaN(myDate))  
	    {   
	        //var delimCahar = DateStr.indexOf('/')!=-1?'/':'-';  
	        var arys= DateStr.split('-');  
	        myDate = new Date(arys[0],--arys[1],arys[2]);  
	    }  
	    return myDate;  
	}
	//比较日期大小传字符日期2015-02-15
	function dateCompare(startdate,enddate)   
	{   
	var arr=startdate.split("-");    
	var starttime=new Date(arr[0],arr[1],arr[2]);    
	var starttimes=starttime.getTime();   
	  
	var arrs=enddate.split("-");    
	var lktime=new Date(arrs[0],arrs[1],arrs[2]);    
	var lktimes=lktime.getTime();   
	  
	if(starttimes>=lktimes)    
	{   
	return false;   
	}   
	else  
	return true;   
	  
	}  
	