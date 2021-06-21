<?php
class DbUtil{
	public static $loginUser = "bjk3yf"; 
	public static $loginPass = "BoysWithLuv2022!";
	public static $host = "usersrv01.cs.virginia.edu"; // DB Host
	public static $schema = "bjk3yf_"; // DB Schema
	
	public static function loginConnection(){
		$db = new mysqli(DbUtil::$host, DbUtil::$loginUser, DbUtil::$loginPass, DbUtil::$schema);
	
		if($db->connect_errno){
			echo("Could not connect to db");
			$db->close();
			exit();
		}
		
		return $db;
	}
	
}
?>