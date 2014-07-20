<?php
session_start();
include_once("autoload.php");


class checkuseyzm{

	public function checkUserId($userid){
		$oper = new operatedb();

		$regemail=	"/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
		$regtel="/^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|18[0-9]{9}$/";

		$countsemail = preg_match($regemail, $userid);
		$countstel = preg_match($regtel, $userid);
		echo $userid;
		echo $countstel;
		echo $countsemail;

		if (countsemail == 1){
			$sql = "select uemail from registerinfo where uemail = '$userid'";
		 }
		 else if(countstel == 1){

			$sql = "select utel from registerinfo where utel = '$userid'";
			echo $sql;
		}
		$result = $oper->executeSQL($sql);
		if (false == $result){
			echo "*此用户名可以使用";
		}else if (is_array($result) && !empty($result)){
			echo "*此用户名已存在!请换一个!";
		}

	}

	public function checkyzm($yzm){

			if ($_SESSION[check_yzm] == strtoupper(trim($yzm)))
				echo "<span style=\"color:#00FF33\">!-验证码正确-!</span>";
			else
				echo "<span style=\"color:red;\">!*验证码错误*!</span>";
	}
}


$type = $_GET['type'];
$check = new checkuseyzm();

if($type == "userid"){

	$check->checkUserId($_GET['username']);
		
}else if ($type == "yzm"){

	$check->checkyzm($_GET['yzmnum']);
}

?>
