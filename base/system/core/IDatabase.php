<?php
namespace system\core;

interface IDatabase{
	//连接操作
	function connect($host,$user,$password,$dbname);
	//查询操作
	function query($sql);
	//关闭
	function close();
}