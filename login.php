<?php
session_start();
include_once("autoload.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>系统登录</title>


	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<link rel="stylesheet" href="css/responsive-nav.css">
	<link href="css/login.css" rel="stylesheet" />
<!-- Google Fonts -->
	<!-- 	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
		<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet'>
 -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.js"></script>
<script type="text/javascript" src="js/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
 <script type="text/javascript" src="js/responsive-nav.min.js"></script>


</head>

<body onload="getfocus();">


 <div class="container">
    <div class="row ">
  	 <div class="col-md-3 col-sm-5">
   	<a title="美餐团" target="_blank" href="index.php"><span class="lg">美餐团</span></a>
     </div>
	<div class="navstyle">
            <ul class="nav nav-tabs nav-justified ">
                 <li class="active"><a href="#">登录</a></li>
                <li><a href="register.php">注册</a></li>
                <li><a href="index.php">主页</a></li>
                 <li><a href="addus.php">加入我们</a></li>
                 <li><a href="login.php?action=logout">注销</a></li>
            </ul>
         </div>
   </div>
	</div>

<?php
if (isset($_GET['action'] ) == "logout"){
	  unset($_SESSION['userid']);
      echo "<div class=\"alert alert-info\">\n";
      echo "  <strong>提示！</strong> 注销成功。请在下方重新登录。\n";
	  echo "</div>\n";
}
if(isset($_SESSION['userid'])){
	echo "<div class=\"alert alert-info\">\n";
	echo "<strong>提示！</strong>"."亲，您已登录系统了！<a href=\"index.php\">进入</a>\n";
	echo "</div>\n";
}else if(isset($_POST['btn-login'])){ 

	if(!empty($_POST['userid']) and !empty($_POST['pwd'])){
		
		$opter = new login($_POST['userid'],$_POST['pwd']);
		$result = $opter->getResult();	
		if(true == $result){
		$_SESSION[userid]=$_POST['userid'];
		if (isset($_POST['times'])){
		setcookie("userid",$_POST['userid'],time()+$_POST['times']);   //设置COOKIE的有效时间为1小时
        setcookie("pwd",$_POST['pwd'],time()+$_POST['times']);   //设置COOKIE的有效时间为1小时
		}
		echo "<script>window.location.href='index.php';</script>";
	}else{
		echo "<script>alert('用户名或密码输入错误!');window.location.href='login.php';</script>";
	}
}
}
?>

<div class="banner">
<div class="container">
	<img  id="qrcode" class="img-responsive img-rounded" src="images/login/erwei.jpg" alt="二维码" />
<div class="login-aside">
  <div id="o-box-up"></div>
  <div id="o-box-down"  style="table-layout:fixed;">
   <div class="error-box" id="error-box"></div>

   <form class="registerform" action="login.php" method="post" name="login_form">

	 <label for="userid" class="form-label" >登录用户：</label>
	<div class="row">
	<div class="col-xs-6 col-sm-8 col-md-10 ">
	<div class="input-group input-group-md input-group-xs " >
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-user"></span></span>
	<input  type="text" class="form-control " tabindex="1" maxlength="100" name="userid" id="userid" placeholder="Email/Tel"  datatype="e|m" nullmsg="请填写用户ID"  errormsg="*用户名是你的手机号或邮箱!" value="<?php echo $_COOKIE['userid'];?>" /> 
	</div>
  	</div>
  	</div>

   <label for="pwd" class="form-label">登陆密码：</label>
	<div class="row">
	<div class="col-xs-13 col-sm-8 col-md-10 ">
	<div class="input-group input-group-md input-group-xs " >
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-lock"></span></span>
	<input  type="password" class="form-control" tabindex="2" name="pwd" id="pwd" maxlength="100" datatype="*6-16" nullmsg="请填写密码!" errormsg="密码范围在6~16位之间!" placeholder="password" value="<?php echo $_COOKIE['pwd'];?>" /> 
	</div>
  	</div>
 	</div>
  
  <div class="pos-r">
	   <label for="yzm" class="form-label">验证码:(不区分大小写) </label>
	   <input type="text"  placeholder="输入验证码" tabindex="3"  onchange="checkyzm('error-box')" onclick="clean('yzm')" maxlength="100" id="yzm" name="yzm" class="i-text yzm" nullmsg="*请输入验证码！"  >    
       <img src="creatyzm.class.php"   alt="验证码" name="chkimg" id="chkimg" class="yzm-img" />
  </div>
  
  <div class="row">
    <input type="checkbox"  tabindex="4"  value="3600" name="times" id="checkbox" />下次自动登录
    <a   href="javascript:RefreshImage()" >看不清?</a>
  </div>

  <div class="row">
	<div class="col-xs-13 col-sm-8 col-md-10">
	<button  type="submit" id="btn-login" name="btn-login" tabindex="5"  class="btn btn-success btn-md btn-block "  >登&nbsp;&nbsp;&nbsp;录</button>
  </div>
  </div>
  </form>
 <div class="row">
 	<div id="href-heiht">
    <a href="findpwd.php">忘记密码?</a>
    <a   href="register.php">开始注册!</a>
    </div>
  </div>

  
  <!-- end o-box-down -->
  </div>
<!-- end login-aside -->
</div>


	<!-- end container -->
</div>

	<div class="bd">
		<ul>
			<li style="background:url(images/login/theme-pic1.jpg) #CCE1F3 ;"></li>
			<li style="background:url(images/login/theme-pic2.jpg) #BCE0FF ;"></li>
		</ul>
	</div>
<script type="text/javascript">jQuery(".banner").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true, trigger:"click" });</script>


<div class="banner-shadow"></div>

<div class="footer">
   <p>Copyright &copy; 2014.Company name All rights reserved.</p>
</div>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>

<!-- end banner -->
</div>


<script>
$(function(){
	//$(".registerform").Validform();  //就这一行代码！;
	$(".registerform").Validform(
	{
	tiptype:function(msg,o,cssctl){
		var objtip=$(".error-box");
		cssctl(objtip,o.type);
		objtip.text(msg);
		},
		postonce:true,	
});

});

</script>
</body>
</html>
