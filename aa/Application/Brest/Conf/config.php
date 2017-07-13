<?php
return array(
	//'配置项'=>'配置值'
    // 开启路由
    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES'=>array(
        'news/:year' => array('acttype/actlist'),

    ),
);