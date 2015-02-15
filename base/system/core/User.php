<?php
namespace system\core;
/**
 * @description 用户
 * @author liguanrui
 * @date 2015/02/15
 *
 */
class User{
	
	protected $name;
	
	public function __construct($uid,$account,$name){
		$this->uid = $uid;
		$this->account = $account;
		$this->name = $name;
	}
	
	public function index(){
		echo "hi,I'm {$this->name}<br/>";
	}
}