<?php

include_once("autoload.php");

##用户注册
class register{
	private $userid = "20140700";	//用户id
	private $userpwd;	//用户密码
	private $telnum;	//手机号
	private $email;		//邮箱号
	private $username;  //用户昵称
	private $result;	//结果

	public function __construct($username,$usepwd,$telnum,$email) {
		$this -> userpwd = $usepwd;
		$this->username = $username;
		$this -> telnum = $telnum;
		$this -> email  = $email;
		$this->userRegister();
	}

	public function userRegister() {
		$operet = new operatedb();

		$sql = "select uid from registerinfo_tb";
		$resu = $operet->executeSQL($sql);
	
		if (($resu != false) && (is_array($resu)))
			$this->userid = $resu[count($resu)-1][0]+1;

		$sql = "insert into registerinfo_tb (uid,uname,upwd,uemail,utel,active) values ('".$this->userid."','".$this->username."','".$this->userpwd."','".$this->email."','".$this->telnum."','f')";
		echo $this->userid;
		$this->result = $operet->executeSQL($sql);
		echo $sql;
	}

	public function getResult(){
		return $this->result;
	}
}	
// new register("yexingkog","11111","12345678910","sfasdfas@qq.com");
?>
