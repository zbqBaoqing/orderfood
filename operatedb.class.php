<?php
include_once("autoload.php");
 #对数据库的操作
 
class operatedb{
	private $connID;	//数据库链接标识符
	private $result;  //执行sql语句后所得的结果

	public function __construct() {
		$this -> result = false;
		$sqlid = new conndb();
		$this -> connID = $sqlid -> getConn();
	}

	public function executeSQL($sql) {

		$sqlTyep = strtolower(substr(trim($sql),0,6));
			try {
				$this->connID->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$this->connID->beginTransaction(); //开启事物

				if ('select' == $sqlTyep){
					$rs = $this->connID->prepare($sql);
					$rs->execute();
					$this->result = $rs->fetchAll();//获取结果集中的所有数据	
					if (count($this->result) == 0 )
						$this->result = false;
				}else if ('insert' == $sqlTyep || 'update' == $sqlTyep || 'delete' == $sqlTyep){
					$rs = $this->connID->exec($sql);
					if ($rs > 0)
						$this -> result = true;
					else
						$this->result = false;
				}else {
					$this -> result = false;
				}
				$this->connID->commit();
			} catch (PDOException $e) {
				$this->result=false;
				$this->connID->rollBack();
				die("Error!: ".$e->getMessage()."</br>"."Line!: ".$e->getLine()."</br>");
			}

		return $this -> result;
	}

}
// $test = new operatedb();
// $sql = "insert into registerinfo_tb (uid,uname,upwd,uemail,utel,active) values ('20140102','asdffa','zbasdf','qwerwqe@qq.com','12345678901','f')";
// $result = $test->executeSQL($sql);
// print_r($result);
?>

