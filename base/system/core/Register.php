<?php
namespace system\core;

class Register{
	
	protected static $objects;
	
	/**
	 * 注册对象到树上
	 * @param unknown $alias
	 * @param unknown $object
	 */
	static function set($alias, $object){
		self::$objects[$alias] = $object;
	}
	
	/**
	 * 注销对象
	 */
	static function _unset(){
		unset(self::$objects[$alias]);
	}
	
	/**
	 * 从注册树获取对象
	 * @param unknown $alias
	 */
	static function get($alias){
		return self::$objects[$alias];
	}
}