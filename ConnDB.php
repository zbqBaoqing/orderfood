<?php
class ConnDB{
	private $hostname;   //mysql服务器主机名
	private $username;   //登录mysql数据库服务器的用户名
	private $password;   //Mysql服务器的用户密码
	private $conn;		//数据库链接符
	private $dbnaem;	//所要连接数据库名字


	public function __construct($hostname,$username,$password,$conn,$dbnaem) {
		$this->$hostname = $hostname;
		$this->$username = $username;
		$this->$password = $password;
		$this->$conn = $conn;
		$this->$dbnaem = $dbnaem;
		$this->connect();	
	}

	public function connect(){
		if ($this->$conn == "pconn") {
			
			$this->$conn=mysql_pconnect($this->$hostname,$this->$username,$this->$password) or die ("数据库链接失败!".mysql_error());
		}else {
			  
			$this->$conn=mysql_connect($this->$hostname,$this->$username,$this->$password) or die ("数据库链接失败!".mysql_error());
		}
		mysql_select_db($this->$dbnaem,$this->$conn) or die ("CONNECT DB FALSE！".mysql_error());
	}

	//获取数据库标识符
	public function getConn() {
		return $this->$conn;		
	}

	public function __call($method,$parameter){
		echo "方法名为: ".$method."不存在!<br/>";
		 return -1;
	}
}
?>
