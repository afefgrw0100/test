<?php
return array(

	//站点URL配置
	'URL_CASE_INSENSITIVE' 		=> true,
	'URL_MODEL'					=> 2,

	//日志配置
	'LOG_RECORD' 				=> true,
	'LOG_LEVEL' 				=> 'EMERG,ALERT,CRIT,ERR,WARN,NOTICE',
	//扩展配置
	'LOAD_EXT_CONFIG' => 'Languagepack',
	//数据库配置信息
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => '100.114.168.1', // 服务器地址
	'DB_NAME'   => 'tejinhui', // 数据库名
	'DB_USER'   => 'tjh', // 用户名
	'DB_PWD'    => '66bi#%16mRq84!', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'tb_', // 数据库表前缀
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_PARAMS'    =>    array(\PDO::ATTR_CASE => \PDO::CASE_NATURAL),
	'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增

	'DB_BIND_PARAM'    =>    true,

	//密钥
	"AUTHCODE" => '#AUTHCODE#',

	'ERROR_PAGE' =>'/Home/Erros/index',
	//js,cssurl版本配置配置
	'CSSJSURL'=>'',
	'CSSJSV'=>'0.3114172',
	//'SESSION_OPTIONS'=>array('name'=>'user','expire'=>3600),

	//
	//七牛开发者这key
	//$QINIU_ACCESS_KEY	= 'CT249vcaVUrhXRuscwy8iknAa3ijxv5RX2yfNAHy';
	//$QINIU_SECRET_KEY	= '527sfUA4b8xeEVfUJ7ajEULsdqyRgOPJouza7mq6';
	//	'QINIU_HOST'=>'//ofomkeim9.bkt.clouddn.com',
	//	'BUCKET'=>'afefgrw',
	//			'secretKey' => '527sfUA4b8xeEVfUJ7ajEULsdqyRgOPJouza7mq6',
	//'accessKey' => 'CT249vcaVUrhXRuscwy8iknAa3ijxv5RX2yfNAHy',
	//'domain' => 'ofomkeim9.bkt.clouddn.com',
	//'bucket' => 'afefgrw',
	//用户上传的图片
	'UPLOAD_SITEIMG_QINIU' => array (
		'maxSize' => 100 * 1024 * 1024,//文件大小
		'rootPath' => './',
		//'savePath'=>'',
		'autoSub'=>false,
		'saveName' => array ('uuid', ''),
		'driver' => 'Qiniu',
		'driverConfig' => array (
			'secretKey' => '346dOoedDfO7L8Stc_dju-IVp8tfz8n65YnAOwFQ',
			'accessKey' => 'iSHBEbT5biAU-A3VuAQ9BFDdlk_DJ4-vILfSdC7H',
			'domain' => 'img-project.resource.tejinhui.com',
			'bucket' => 'img-project',
		),
	),
	//用户上传的尽调报告   查看需要授权
	"ACHICES"=>array(
		'domain' => 'achives.resource.tejinhui.com',
		'bucket' => 'achives'
	),
	//用户头像、上传的证件照片等   查看需要授权
	"IMGPROFILE"=>array(
		'domain' => 'img-profile.resource.tejinhui.com',
		'bucket' => 'img-profile'
	),

	//网站静态文件js css img等
	"IMGPATH"=>"//static.resource.tejinhui.com",

	//头像图片为空时
	'IMGNULL'=>"/static/images/common/man_01.jpg",

	//公共目录
	'TMPL_PARSE_STRING'=> array(
		//'__PUBLIC__' =>"//www.3qqq.com".'/static',
		'__PUBLIC__' => '//static.resource.tejinhui.com/static',
		'__UPLOAD__' => __ROOT__.'/uploads'
	),
	//扫码支付
	'WEIXINPAY_CONFIG'       => array(
		'APPID'              => 'wx0e2646aa1a4467f5', // 微信支付APPID
		'MCHID'              => '1419354302', // 微信支付MCHID 商户收款账号
		'KEY'                => 'e83U7ru387h3uUYGf3du7Ujfhwywhfjf', // 微信支付KEY
		'APPSECRET'          => '425130b9769995d20b772465defbf31f',  //公众帐号secert
		'NOTIFY_URL'         => 'https://www.tejinhui.com/index.php/User/Apipay/notify', // 接收支付状态的连接
	),
	//jsapi
	'wxappid'=>'wx0e2646aa1a4467f5',
	'wxsecret'=>'425130b9769995d20b772465defbf31f',
);