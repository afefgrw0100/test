<?php
/*
 *@description   文件上传方法
 *@author widuu  http://www.widuu.com
 *@mktime 08/01/2014
 */
	header("Content-type:text/html;charset=utf-8");
	require("conf.php");
	
	$accessKey = $QINIU_ACCESS_KEY;
	$secretKey = $QINIU_SECRET_KEY;
	
	$bucket = $BUCKET;

	$host  = $HOST;
	
	$time = time()+$TIMEOUT;
	$uuid = uuid();
	if(empty($_GET["key"])){
		exit('param error');
	}else{
		
		if($USEWATER && empty($_GET['type'])){
			$waterBase = urlsafe_base64_encode($WATERIMAGEURL);
			$returnBody = "{\"url\":\"{$host}/$(key)?watermark/1/image/{$waterBase}/dissolve/{$DISSOLVE}/gravity/{$GRAVITY}/dx/{$DX}/dy/{$DY}\", \"state\": \"SUCCESS\", \"name\": $(fname),\"size\": \"$(fsize)\",\"w\": \"$(imageInfo.width)\",\"h\": \"$(imageInfo.height)\"}";
		}else{
			$returnBody = "{\"url\":\"{$host}/$(key)\", \"state\": \"SUCCESS\", \"name\": $(fname),\"size\": \"$(fsize)\",\"w\": \"$(imageInfo.width)\",\"h\": \"$(imageInfo.height)\"}";
		}

		$data =  array(
				"scope"=>$bucket.":".$uuid.".".$_GET['key'],
				"deadline"=>$time,
				"returnBody"=> $returnBody
			);
	}

	$data = json_encode($data);
	//echo $data;exit;
	$dataSafe = urlsafe_base64_encode($data);
	$sign = hash_hmac('sha1',$dataSafe, $secretKey, true);
	$result = $accessKey . ':' . urlsafe_base64_encode($sign).':'.$dataSafe ;
	echo "{uuid:\"{$uuid}\",res:\"{$result}\"}";
	function uuid() {
	  if (function_exists ( 'com_create_guid' )) {
		return com_create_guid ();
	  } else {
		mt_srand ( ( double ) microtime () * 10000 ); //optional for php 4.2.0 and up.随便数播种，4.2.0以后不需要了。
		$charid = strtoupper ( md5 ( uniqid ( rand (), true ) ) ); //根据当前时间（微秒计）生成唯一id.
		$hyphen = chr ( 45 ); // "-"
		$uuid = '' . //chr(123)// "{"
	substr ( $charid, 0, 8 ) . $hyphen . substr ( $charid, 8, 4 ) . $hyphen . substr ( $charid, 12, 4 ) . $hyphen . substr ( $charid, 16, 4 ) . $hyphen . substr ( $charid, 20, 12 );
		//.chr(125);// "}"
		return $uuid;
	  }
	}