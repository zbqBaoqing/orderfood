<?php
include_once("autoload.php");

 #用户登录
class login {
	private $userid;	//用户登录标识符
	private $userpwd;	//用户密码
	private $sqlid;		//数据库库链接标识符
	private $logflag;	//用户登录成功与否的标识符,成功为true,否则为false

	public function __construct($userid,$userpwd) {
		$this->userid = addslashes(trim($userid));
		$this->userpwd = addslashes(trim($userpwd));
		$this->logflag = false;
		$this->checkLogIn();
	}

	public function checkLogIn() {
		$oper = new operatedb();
		$regemail=	"/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
		$regtel="/^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|18[0-9]{9}$/";

		$countsemail = preg_match($regemail, $this->userid);
		$countstel = preg_match($regtel, $this->userid);


		if ($countsemail == 1){
			$sql = "select uemail,upwd from registerinfo_tb where uemail = '$this->userid' and upwd = '$this->userpwd'";
		}else if($countstel == 1){
			$sql = "select utel,upwd from registerinfo_tb where utel = '$this->userid' and upwd = '$this->userpwd'";
		}else{
			$this->logflag = false;
			return ;
		}
	
		$result = $oper->executeSQL($sql);

		if ( false == $result){
			$this->logflag =  false;
		}
		else if (is_array($result) && !empty($result)){
			$this->logflag = true;
		}else
			$this->logflag = false;
	}

	function getResult(){
		return $this->logflag;
	}
}

// $tt = new login("18291421903","zbqacer");
// $re = $tt->getResult();
// echo "fsadlf".$re;
?>
