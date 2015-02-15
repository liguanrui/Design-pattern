<?php
namespace system\core;
/**
 * @label 单例模式
 * @author xhysu@126.com
 *
 */
class Singleton{

	static protected $obj;
	function __construct(){
		
	}

	//创建单例函数
	static function getInstance(){
		if(self::$obj){
			return self::$obj;
		}else{
			self::$obj = new self();
			return self::$obj;
		}
	}
	
	function index(){
		echo "here is Singleton<br/>";
	}
}

?>