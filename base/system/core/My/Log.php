<?php 
namespace system\core\My;


class Log{
	
	public $id;
	public $type;
	public $content;
	public $updateTime;
	public $operator;
	protected $db;
	
	function __construct($id){
		
		$this->db = new \PDO("mysql://host=localhost;dbname=test", "root", "");
		$this->db->query("SET NAMES utf8");
		$res = $this->db->query("SELECT * FROM Log WHERE id = {$id}");
		$data = $res->fetch();
		
		$this->id = $data['id'];
		$this->type = $data['type'];
		$this->content = $data['content'];
		$this->updateTime = $data['updateTime'];
		$this->operator = $data['operator'];
	}
	
	function __destruct(){
		$sql="UPDATE Log set type = '{$this->type}',
		content = '{$this->content}',
		updateTIme = '{$this->updateTime}',
		operator = '{$this->operator}' 
		WHERE id = '{$this->id}'";
		$this->db->query($sql);
		print_r($sql);
	}
	
}
?>