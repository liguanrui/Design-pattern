<?php 
namespace system\core;
/**
 * @description 工厂模式
 * @author liguanrui
 * @date 2015/2/12
 */
class Factory{
	
     public static function createUser($name){
         return new  User($name);
     }

     public static function createSingleton(){
         return Singleton::getInstance();
     }
}