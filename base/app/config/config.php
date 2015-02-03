<?php 
namespace app\config;
/**
*	@label 定义各个目录常量
*/
define ( 'SYSDIR_ROOT', realpath ( dirname ( __FILE__ ) . '/../../' ) );
define ( 'SYSDIR_APP', SYSDIR_ROOT.'/app');
define ( 'SYSDIR_SYSTEM', SYSDIR_ROOT.'/system');
define ( 'SYSDIR_CONTROLLER', SYSDIR_APP.'/controller');
define ( 'SYSDIR_MODAL', SYSDIR_APP.'/model');
define ( 'SYSDIR_VIEW', SYSDIR_APP.'/view');
define ( 'SYSDIR_CORE', SYSDIR_SYSTEM.'/core');
define ( 'SYSDIR_DATABASE', SYSDIR_SYSTEM.'/database');


spl_autoload_register(autoload);

function autoload($class){
	$file = SYSDIR_ROOT.'/'.str_replace('\\','/',$class).'.php';
	include $file;
	
}