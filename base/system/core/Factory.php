<?php 
namespace system\core;
/**
 * @description 工厂模式
 * @author liguanrui
 * @date 2015/2/12
 */
class Factory{
	
     public static function createUser($uid,$name,$account){
         return new my\User($uid,$name,$account);
     }

     public static function createSingleton(){
         return Singleton::getInstance();
     }
     
     public static function createRegister($uid,$name,$account){
     	$user = new my\User($uid,$name,$account);
     	Register::set("user",$user);
     	return $user;
     }
}
