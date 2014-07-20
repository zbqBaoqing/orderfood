
function getfocus(){
	document.getElementById("userid").focus();
}

function RefreshImage(){

	var yzm = document.getElementById("chkimg");
	yzm.setAttribute("src","creatyzm.class.php?t="+Math.random());
}

function loadXmlHttpObject(url,error_userid){
	// alert("loadXmlHttpObject");
	var xmlHttpRequest; //定义一个全局对象
	if(window.ActiveXObject){ //IE的低版本系类
		xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
	}else{
		xmlHttpRequest = new XMLHttpRequest(); //非IE系列的浏览器，但包括IE7 IE8
	}	

		xmlHttpRequest.open("get",url,true);
	
		xmlHttpRequest.onreadystatechange=function(){
		if(xmlHttpRequest.readyState == 4){
			if(xmlHttpRequest.status == 200){
			var textHTML=xmlHttpRequest.responseText;
			document.getElementById(error_userid).innerHTML=textHTML;
		} 
		}
	};
		xmlHttpRequest.send(null);
}


//检验用户ID
function checkuserid(error_userid){
	var url = "orderfood/checkuseyzm.class.php?type=userid&username="+id("userid").value;
	// alert("lsjdfasldf");
	// onchange="checkuserid('error_userid')"
	 loadXmlHttpObject(url,error_userid);
}

//检验验证码
function checkyzm(error_yzm){
		var url="checkuseyzm.class.php?type=yzm&yzmnum="+id("yzm").value;
	 loadXmlHttpObject(url,error_yzm);

}



function id(id){
	return document.getElementById(id);
}

function clean(obj){
	id(obj).value="";
}
