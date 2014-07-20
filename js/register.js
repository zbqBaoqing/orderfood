
jQuery(document).ready(function() {
    /*
        Background slideshow
    */
    $.backstretch([
      "images/regist/backgrounds/1.jpg"
    , "images/regist/backgrounds/2.jpg"
    , "images/regist/backgrounds/3.jpg"
    ], {duration: 3000, fade: 750});

});


//如果不同意注册声明，则无法提交
function checkregist(){
	var check = document.getElementById("agree");

	if (check.checked == false){
		document.getElementById("btn-login").disabled=true;
	}else{
		document.getElementById("btn-login").disabled=false;
	}
}

jQuery(document).ready(function(){
	//$(".registerform").Validform();  //就这一行代码！;
		
	$(".registerform").Validform({
		tiptype:function(msg,o,cssctl){
			//msg：提示信息;
			//o:{obj:*,type:*,curform:*}, obj指向的是当前验证的表单元素（或表单对象），type指示提示的状态，值为1、2、3、4， 1：正在检测/提交数据，2：通过验证，3：验证失败，4：提示ignore状态, curform为当前form对象;
			//cssctl:内置的提示信息样式控制函数，该函数需传入两个参数：显示提示信息的对象 和 当前提示的状态（既形参o中的type）;
			if(!o.obj.is("form")){//验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
				var objtip=o.obj.parent().siblings(".Validform_checktip");
				cssctl(objtip,o.type);
				objtip.text(msg);
			}else{
				var objtip=o.obj.find("#msgdemo");
				cssctl(objtip,o.type);
				objtip.text(msg);
			}
		},
		// ajaxPost:true,
	});
});