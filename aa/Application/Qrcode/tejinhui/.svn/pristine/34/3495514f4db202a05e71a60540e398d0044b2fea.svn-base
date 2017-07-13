<?php

/*
 * @description   文件上传方法
 * @author widuu  http://www.widuu.com
 * @mktime 08/01/2014
 */
 
global $QINIU_ACCESS_KEY;
global $QINIU_SECRET_KEY;

$QINIU_UP_HOST	= 'http://up.qiniu.com';
$QINIU_RS_HOST	= 'http://rs.qbox.me';
$QINIU_RSF_HOST	= 'http://rsf.qbox.me';

//配置$QINIU_ACCESS_KEY和$QINIU_SECRET_KEY 为你自己的key
$QINIU_ACCESS_KEY	= 'CT249vcaVUrhXRuscwy8iknAa3ijxv5RX2yfNAHy';
$QINIU_SECRET_KEY	= '527sfUA4b8xeEVfUJ7ajEULsdqyRgOPJouza7mq6';

//配置bucket为你的bucket
$BUCKET = "afefgrw";

//配置你的域名访问地址
$HOST  = "//ofomkeim9.bkt.clouddn.com";

//上传超时时间
$TIMEOUT = "3600";

//保存规则
$SAVETYPE = "";

//开启水印
$USEWATER = false;
$WATERIMAGEURL = "//ofomkeim9.bkt.clouddn.com"; //七牛上的图片地址
//水印透明度
$DISSOLVE = 50;
//水印位置
$GRAVITY = "SouthEast";
//边距横向位置
$DX  = 10;
//边距纵向位置
$DY  = 10;

function urlsafe_base64_encode($data){
	$find = array('+', '/');
	$replace = array('-', '_');
	return str_replace($find, $replace, base64_encode($data));
}


