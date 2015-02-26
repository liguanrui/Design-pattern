<?php
namespace system\core\Database;

use system\core\IDatabase;
class MySQL implements IDatabase{
	
	protected $conn;
	function connect($host, $user, $password, $dbname){
		$conn = mysql_connect($host,$user,$password);
		mysql_select_db($dbname,$conn);
		$this->conn = $conn;
	}
	
	function query($sql){
		$res = mysql_query($sql,$this->conn);
		return $res;
	}
	
	function close(){
		mysql_close($this->conn);
	}
}