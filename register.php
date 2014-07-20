<?php
session_start();
include_once("autoload.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>用户注册</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
       <!--  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'> -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/responsive-nav.css">
        <link rel="stylesheet" href="css/register.css">

       
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body >
    
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="logo col-md-3 col-sm-5">
                        <h1><a href="index.php"><span class="red">美餐团</span></a></h1>
                    </div>
            <div class="navstyle">
            <ul class="nav nav-tabs nav-justified">
                 <li class="active"><a href="#">注册</a></li>
                <li><a href="login.php">登录</a></li>
                <li><a href="index.php">主页</a></li>
                 <li><a href="addus.php">加入我们</a></li>
            </ul>
             </div>
             </div>
            </div>
            </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">注册声明</h4>
                      </div>
                      <div class="modal-body">
                    <ol>
                    <li>信息的录入</li>
                    <ul><li>不得填报任何违反有关法律规定信息；</li> 
                    <li>不得填报任何不完整、虚假的信息；</li> 
                    <li>用户填报的内容和提供的证件完全真实有效，如有不实，用户承担由此产生的一切后果和相关责任</li>
</ul><li>信息的使用</li><ul> 
<li>本网站提供的其它信息，仅与其相应内容有关的目的而被使用；</li> 
<li>不得将任何本系统的信息用作任何商业目的.</li></ul>
<li>信息的公开</li><ul> <li>在本网站所登陆的任何信息，均有可能被任何本网站的访问者浏览，也可能被错误使用。本网站对此将不予承担任何责任。</li></ul>
<li>信息的准确性</li><ul> <li>任何在本网站发布的信息，均必须符合合法、准确、及时、完整的原则。但本网站将不能保证所有由第三方提供的信息，<p>或本网站自行采集的信息完全准确。使用者了解，对这些信息的使用，需要经过进一步核实。本网站对访问者未经自行核实误用本网站信息造成的任何损失不予承担任何责任。</p> </li>
</ul><li>信息更改与删除 </li><ul><li>除了信息的发布者外，任何访问者不得更改或删除他人发布的任何信息。本网站有权根据其判断保留修改或删除任何不适信息之权利。 </li>
</ul><li>版权、商标权 </li><ul><li>本网站的图形、图像、文字及其程序等均属广州市人力资源和社会保障局之版权，受商标法及相关知识产权法律保护，未经广州市人力资源和社会保障局用户书面许可，任何人不得下载、复制、再使用。在本网发布信息之商标，归其相应的商标所有权人，受商标法保护。 </li>
</ul><li>自责</li><ul> <li>所有使用本网站的用户，对使用本网站信息和在本网站发布信息的被使用，承担完全责任。本网站对任何因使用本网站而产生的第三方之间的纠纷，不负任何责任。 </li>
</ul><li>服务终止 本网站有权在预先通知或不予通知的情况下终止任何免费服务。</li><li>本网站因正常的系统维护、系统升级，或者因网络拥塞而导致网站不能访问，本网站不承担任何责任。 </li>
<li>特别声明本协议及其修改权、解释权属美餐团。</li>  </ol>
 </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
<?php
    if(isset($_POST['btn-login'])){
        // echo "hrekjdslf";
        if(isset($_POST['agree'])){
        $regist = new register($_POST['nickname'],$_POST['pwd'],$_POST['userid'],$_POST['email']);
          $result = $regist->getResult();
          echo $result;
        if($result == true){
            $_SESSION['userid'] = $_POST['userid'];
            setcookie("userid",$_POST['userid'],time()+7200);   //设置COOKIE的有效时间为2小时
            setcookie("pwd",$_POST['pwd'],time()+7200);   //设置COOKIE的有效时间为2小时
            echo "<script>window.location.href='index.php';</script>";
        }else{
            echo "<script>window.location.href = 'register.php';</script>";
        }
    }else{
        echo "<strong>对不起！你没有同意我们的注册服务要求，所以我们无法为您服务!</strong>";
    }
}
?>


        <div class="register-container container">
            <div class="row">
                <div class="col-ms-5 col-md-3">
                    <img src="images/regist/welcome.jpg" alt="">
                </div>
 
                <div class="register col-md-6 col-ms-8">
                    <form action="register.php" method="post" name="regist_form" class="registerform">
                        <h2><span class="red"><strong>注册帐号</strong></span></h2>
                        <label for="userid">用户帐号</label>
                             <div class="row alert alert-info">
                             <div class="input-group input-group-md input-group-xs " >
                            <span class="input-group-addon">
                             <span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control " tabindex="1" id="userid" name="userid" placeholder="手机号"  datatype="m" nullmsg="请填写您的帐号"  errormsg="*用户名是你的手机号!" onchange="checkuserid('error_userid')"/>
                            </div>
                            <div class="Validform_checktip" id="error_userid" name="error_userid"></div>
                            </div>

                        <label for="pwd">用户密码</label>
                         <div class="row alert alert-success">
                        <div class="input-group input-group-md input-group-xs " >
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-lock"></span></span>
                        <input  type="password" class="form-control" tabindex="2" name="pwd" id="pwd"  datatype="*6-16" nullmsg="请填写密码!" errormsg="密码范围在6~16位之间!" placeholder="账户密码" /> 
                        </div>
                        <div class="Validform_checktip"></div>
                        </div>

                        <label for="checkpwd">确认密码</label>
                        <div class="row alert alert-info">
                        <div class="input-group input-group-md input-group-xs " >
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" tabindex="3"  class="form-control" id="checkpwd" name="checkpwd" placeholder="确认密码" maxlength="100" datatype="*6-16" nullmsg="请填写密码!" errormsg="密码与上次输入的不一样!" recheck="pwd" />
                        </div>
                        <div class="Validform_checktip"></div>
                        </div>

                      <label for="email">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱</label>
                      <div class="row row alert alert-success">
                        <div class="input-group input-group-md input-group-xs " >
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-star"></span></span>
                       <input type="text" tabindex="4" class="form-control" id="email" name="email" placeholder="账户邮箱" datatype="e" nullmsg="请填写账户邮箱" errormsg="*邮箱格式有误,请重新填写！谢谢!"  />
                        </div>
                       <div class="Validform_checktip"></div>
                        </div>

                    <label for="nickname">昵&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称</label>
                      <div class="row row alert alert-success">
                        <div class="input-group input-group-md input-group-xs " >
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-star"></span></span>
                       <input type="text" tabindex="4" class="form-control" id="nickname" name="nickname" placeholder="账户昵称" datatype="s4-12" ignore="ignore" errormsg="*昵称为4-12个字符！"  />
                        </div>
                       <div class="Validform_checktip"></div>
                        </div>
                        
                        <label for="yzm">验证码</label>
                        <div class="row alert alert-danger">
                        <div class="col-xs-8 col-sm-7 col-md-7">
                        <div class="input-group input-group-md input-group-xs " >
                        <span class="input-group-addon ">
                        <span class="glyphicon glyphicon-info-sign"></span></span>
                         <input type="text"  placeholder="输入验证码" tabindex="5" onchange="checkyzm('error_yzm')" onclick="clean('yzm')"   id="yzm" name="yzm" class="form-control i-text" nullmsg="*请输入验证码！" />   
                        </div>
                         <div class="Validform_checktip" id="error_yzm" name="error_yzm"></div>
                        </div>
                        <img src="creatyzm.class.php"   alt="验证码" name="chkimg" id="chkimg" class="yzm-img" />
                        <a   href="javascript:RefreshImage()" >看不清?</a>
                        </div>

                        <div class="row">
                         <input type="checkbox" class="checked" checked name="agree" id="agree"  />我同意注册
                         <a  data-toggle="modal" href=""  data-target="#myModal">注册声明书</a>
                         </div>

                        <div class="row">
                        <div class="col-xs-13 col-sm-8 col-md-10 col-xs-offset-4 col-sm-offset-3 col-offset-2">
                        <button  type="submit" id="btn-login"  name="btn-login"  tabindex="6" class="btn btn-success btn-md btn-block " >登&nbsp;&nbsp;&nbsp;录</button>
                         </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
         <div class="botm_declare" align="center"> <p>Copyright &copy; 2014.Company name All rights reserved.</p><em><i> &copy;美餐团郑重声明: 感谢您的加入,您注册的信息我们将会严密管理,不会外泄,请您放心！<a href="aboutme.html">@关于我们</a> </i></em></div>
        


 <!-- Javascript -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.backstretch.min.js"></script>
        <script type="text/javascript" src="js/Validform_v5.3.2_min.js"></script>
        <script src="js/responsive-nav.min.js"></script>
        <script src="js/login.js"></script>
        <script src="js/register.js"></script>


    </body>

</html>

