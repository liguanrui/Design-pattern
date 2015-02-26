<?php
namespace system\core\Database;

use system\core\IDatabase;
class PDO implements IDatabase{

	protected $conn;
	function connect($host, $user, $password, $dbname){
		$conn = new \PDO("mysql://host=$host;dbname=$dbname", $user, $password);
		$this->conn = $conn;
	}

	function query($sql){
		$res = $this->conn->query($sql);
		return $res;
	}

	function close(){
		unset($this->conn);
	}
}