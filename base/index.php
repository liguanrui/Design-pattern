<?php 
$Root =  dirname ( __FILE__ );
include $Root.'/app/config/config.php';

//单例模式
system\core\Singleton::getInstance()->index();

//工厂模式
$user = system\core\Factory::createUser(10052020,"李","lee");
$user->index();   

//单例+工厂模式
$Singleton = system\core\Factory::createSingleton();
$Singleton->index();

//工厂+注册树模式
system\core\Factory::createRegister(10052021,"陈","tim");
system\core\Register::get("user")->index();

//适配者模式
$db = new system\core\Database\PDO();
//$db = new system\core\Database\Mysql();
$db->connect("localhost", "root", "", "test");
$db->query("show databases");
$db->close();

//策略模式




?>