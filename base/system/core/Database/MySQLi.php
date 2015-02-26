<?php
namespace system\core\Database;

use system\core\IDatabase;
class MySQLi implements IDatabase{
	
	protected $conn;
	function connect($host, $user, $password, $dbname){
		$conn = mysqli_connect($host, $user, $password, $dbname);
		$this->conn = $conn;
	}
	
	function query($sql){
		$res = mysqli_query($this->conn,$sql);
		return $res;
	}
	
	function close(){
		mysqli_close($this->conn);
	} 
}