<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE' => 'sqlite',
    'DB_PREFIX' => '',
    'DB_NAME'    => DATA_PATH.'easynote.db',
    'TMPL_PARSE_STRING'  =>array(
        '_JS_'     => '/Public/static/js', // 增加新的JS类库路径替换规则
        '_CSS_'     => '/Public/static/css',
        '_IMG_'     => '/Public/images',
        '_PUBLIC_' => '/Public/static'
    )
);