<?php
return array(
	//'配置项'=>'配置值'
    /* 数据库设置 */
    'DB_TYPE'               => 'mongo',     // 数据库类型
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'blog',          // 数据库名
    'DB_USER'               => '',      // 用户名
    'DB_PWD'                => '',          // 密码
    'DB_PORT'               => '27017',        // 端口
    'DB_PREFIX'             => '',    // 数据库表前缀
	'WEB_NAME'				=> '社区论坛',
	'WEB_HEADER_DESC'				=> '社区论坛',
	/* 自定义 跳转模板的 路径*/
	'TMPL_ACTION_ERROR'     => 'Public:error', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   => 'Public:success', // 默认成功跳转对应的模板文件
);
?>