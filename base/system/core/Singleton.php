<?php 
namespace system\core;
/**
 * @description 单例模式
 * @author liguanrui
 * @date 2015/2/12
 */
class Singleton{
	
    protected static $_instance;
    public static function getInstance(){
        if(!self::$_instance){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function index(){
        echo "here is Singleton<br/>";
    }
}
?>
