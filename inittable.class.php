<?php
include_once("autoload.php");

class createdata{

	private $oper = new operatedb();	

	public function create(){

		$cretable = "create table registerinfo_tb if not exists (uid varchar(10) not null primary key,uname varchar(13), upwd varchar(17) not null, uemail varchar(60) not null, utel char(11) not null,active char(1) not null)";

		$oper->executeSQL($cretable);
	}


}

new createdata();
?>