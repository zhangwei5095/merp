<?php
return array(
    'TMPL_ACTION_ERROR'     =>  THINK_PATH.'Tpl/erp_error_dispatch_jump.tpl', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>  THINK_PATH.'Tpl/erp_success_dispatch_jump.tpl', // 默认成功跳转对应的模板文件
    'TMPL_EXCEPTION_FILE'   =>  THINK_PATH.'Tpl/erp_think_exception.tpl',// 异常页面的模板文件
    'DEFAULT_MODULE'        => 'Erp',//默认的模块
    //邮件配置
    'SMTP_HOST'   => 'smtp.163.com',
    'SMTP_PORT'   => '25',
    'SMTP_USER'   => 'acmxFpzhbp25tb2tlQDE2My5jb20O0O0O',
    'SMTP_PASS'   => 'acmxlpthbpzU5MjQx',
    'FROM_EMAIL'  => 'acmxFpzhbp25tb2tlQDE2My5jb20O0O0O',
    'FROM_NAME'   => 'Jason',
    'TO_EMAIL'  => 'YcmxVp5hbp25kX2dnY0Bmb3htYWlsLmNvbQO0O0OO0O0O',
    'TO_NAME'   => 'Jason',
    'REPLY_EMAIL' => '', //回复EMAIL（留空则为发件人EMAIL）
    'REPLY_NAME'  => '', //回复名称（留空则为发件人名称）
    'ADMIN' => '1',//是否屏蔽管理员修改功能;1 不屏蔽  0 屏蔽
    'DB_TYPE'=>'mysql',
    'DB_HOST'=>'127.0.0.1',
    'DB_PORT'=>'3306',
    'DB_NAME'=>'moke',
    'DB_USER'=>'root',
    'DB_PWD'=>'root',
    'DB_PREFIX'=>'t_',
);