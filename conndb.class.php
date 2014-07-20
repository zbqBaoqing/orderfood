<?php

class conndb{
	private  $dbms = "mysql";   	//数据库类型
	private  $username = "root";   //登录mysql数据库服务器的用户名
	private  $password = "zbqacer";   //Mysql服务器的用户密码
	private  $dbname = "orderfood";	//所要连接数据库名字
	private  $host = "localhost";		//使用的主机名称
	private  $dsn ;		//数据源名，
	private static $conn;		

	public  function __construct() {
		$this->dsn ="$this->dbms:host=$this->host;dbname=$this->dbname";
		// echo $this->dsn;
		$this->connect();	
	}

	public  function connect(){	

		try {
			self::$conn = new PDO($this->dsn,$this->username,$this->password);
			self::$conn->query("set names utf8");
			self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			// print_r(self::$conn);
		} catch (PDOException $e) {
			 die ("CONNECT DB FALSE！".$e->getMessage()."</br>");
			 return false;
	}
	return true;
}
	//获取数据库标识符
	public  function getConn() {
		return  self::$conn;		
	}

	public function __call($method,$parameter){
		echo "方法名为: ".$method."不存在!<br/>";
		 return false;
	}

}

?>
