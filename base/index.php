<?php 
$Root =  dirname ( __FILE__ );
include $Root.'/app/config/config.php';

//单例模式
system\core\Singleton::getInstance()->index();

//工厂模式
$user = system\core\Factory::createUser("lee");
$user->index();

//单例+工厂模式
$Singleton = system\core\Factory::createSingleton();
$Singleton->index();



?>