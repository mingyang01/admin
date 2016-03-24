<?php
return array(
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'crawler', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '123456', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => '', // 数据库表前缀

	'SESSION_TYPE' => 'Redis', 
	'SESSION_PREFIX' => 'sess_', 
	'REDIS_HOST' => '127.0.0.1', //REDIS服务器地址
	'REDIS_PORT' => 6379, //REDIS连接端口号
	'SESSION_EXPIRE' => 3600*7*24, //SESSION过期时间 
	'SESSION_OPTIONS' => array(
		'name' => 'session_name',
		'prefix' => 'think',
		'expire' => 3600*7*24,
	),
	'URL_MODEL'=>2
);
