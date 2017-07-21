<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/4
 * Time: 14:13
 */


/**
 * 全局获取验证码图片
 * 生成的是个HTML的img标签
 * @param string $imgparam <br>
 * 生成图片样式，可以设置<br>
 * length=4&font_size=20&width=238&height=50&use_curve=1&use_noise=1<br>
 * length:字符长度<br>
 * font_size:字体大小<br>
 * width:生成图片宽度<br>
 * heigh:生成图片高度<br>
 * use_curve:是否画混淆曲线  1:画，0:不画<br>
 * use_noise:是否添加杂点 1:添加，0:不添加<br>
 * @param string $imgattrs<br>
 * img标签原生属性，除src,onclick之外都可以设置<br>
 * 默认值：style="cursor: pointer;" title="点击获取"<br>
 * @return string<br>
 * 原生html的img标签<br>
 * 注，此函数仅生成img标签，应该配合在表单加入name=verify的input标签<br>
 * 如：&lt;input type="text" name="verify"/&gt;<br>
 */
function sp_verifycode_img($imgparam='length=4&font_size=20&width=238&height=50&use_curve=1&use_noise=1',$imgattrs='style="cursor: pointer;" title="点击获取"'){
    $src=__ROOT__."/index.php?m=Web&c=Checkcode&a=index&".$imgparam;
    $img=<<<hello
<img class="verify_img" src="$src" onclick="this.src='$src&time='+Math.random();" $imgattrs/>
hello;
    return $img;
}

/**
 * 验证码检查，验证完后销毁验证码增加安全性 ,<br>返回true验证码正确，false验证码错误
 * @return boolean <br>true：验证码正确，false：验证码错误
 */
function sp_check_verify_code($verifycode=''){
    //print_r( I('request.'));exit;
    $verifycode= empty($verifycode)?I('request.verify'):$verifycode;
    $verify = new \Think\Verify();
    return $verify->check($verifycode, "");
}

/*
 * ajax返回值
 *
 * */
function ajax_josn_data($info="你的输入有误",$code_josn="400",$url ="",$data=array()){
    $infojosn = array();
    $infojosn['info'] = $info;
    $infojosn['code_josn'] = $code_josn;
    $infojosn['url'] = $url;
    $infojosn['data'] = $data;
    return $infojosn;
}

/**
 * 密码加密方法
 * @param string $pw 要加密的字符串
 * @return string
 */
function sp_password($pw,$authcode=''){
    if(empty($authcode)){
        $authcode=C("AUTHCODE");
    }
    $result="###".md5(md5($authcode.$pw));
    return $result;
}
/**
 * 密码比较方法,所有涉及密码比较的地方都用这个方法
 * @param string $password 要比较的密码
 * @param string $password_in_db 数据库保存的已经加密过的密码
 * @return boolean 密码相同，返回true
 */
function sp_compare_password($password,$password_in_db){
    if(strpos($password_in_db, "###")===0){
        return sp_password($password)==$password_in_db;
    }else{
        return false;
    }
}
/*
 * 模板样式路径
 * */
function tempurl($url=''){
    if(!empty($url)){
//        if(!empty(C('CSSJSURL'))){
//            $url=C('CSSJSURL').$url.'?v='.C('CSSJSV');
//        }else{
//            $url =$url.'?v='.randFloat();
//        }
        $url=C('CSSJSURL').$url.'?v='.C('CSSJSV');
        return  $url;
    }
}
/**
 * 生成0~1随机小数
 * @param  Int   $min
 * @param  Int   $max
 * @return Float
 */
function randFloat($min=0, $max=1){
    return $min + mt_rand()/mt_getrandmax() * ($max-$min);
}

//短信验证
function func_compare_mobile($moblile_code="",$mobile){
    if(!empty($moblile_code)){
        $emptycode=session("mobile_code");
        if($moblile_code==$emptycode['code']&&$mobile==$emptycode['mobile']){
            session("mobile_code",null);
            return true;
        }else{
            return false;
        }
    }

}

//发送短信验证码
function func_send_mobilemsg_whtz($mobile = ''){
    $code = '';
    $code = func_getRandString(6,array(0,1,2,3,4,5,6,7,8,9));
    //73916

    //Demo调用
    //**************************************举例说明***********************************************************************
    //*假设您用测试Demo的APP ID，则需使用默认模板ID 1，发送手机号是13800000000，传入参数为6532和5，则调用方式为           *
    //*result = sendTemplateSMS("13800000000" ,array('6532','5'),"1");																		  *
    //*则13800000000手机号收到的短信内容是：【云通讯】您使用的是云通讯短信模板，您的验证码是6532，请于5分钟内正确输入     *
    //*********************************************************************************************************************
    //91537 73916
    $rr = sendTemplateSMS($mobile,array($code),91537);//手机号码，替换内容数组，模板ID

    if($rr == 1){
        return $code;//or fail
    }elseif($rr == -1){
        return "fail";
    }else{
        return "error:" . $rr;
    }

}

/**
 * 发送模板短信——短信通知
 * @param to 手机号码集合,用英文逗号分开
 * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
 * @param $tempId 模板Id,测试应用和未上线应用使用测试模板请填写1，正式应用上线后填写已申请审核通过的模板ID
 */
function sendTemplateSMS_toadd($to,$datas,$tempId)
{

    //include_once(__API_PATH__ . "sdk/smsmsg/CCPRestSmsSDK.php");

    //主帐号,对应开官网发者主账号下的 ACCOUNT SID
    $accountSid= 'aaf98f8952305ced0152398d506818e2';

    //主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
    $accountToken= '7386ba006a0242c9a07bf83aa6c5985b';

    //应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
    //在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
    $appId='8aaf070858cd982e0158d754682206a7';

    //请求地址
    //沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
    //生产环境（用户应用上线使用）：app.cloopen.com
    $serverIP='app.cloopen.com';


    //请求端口，生产环境和沙盒环境一致
    $serverPort='8883';

    //REST版本号，在官网文档REST介绍中获得。
    $softVersion='2013-12-26';

    // 初始化REST SDK
    //global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
    //echo 11;exit;
    //$aa = new \Org\Util\test();$aa->test();exit;
    $rest = new \Org\Util\CCPRestSmsSDK($serverIP,$serverPort,$softVersion);
    $rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);

    // 发送模板短信
    //echo "Sending TemplateSMS to $to <br/>";
    $result = $rest->sendTemplateSMS($to,$datas,$tempId);
    if($result == NULL ) {
        //echo "result error!";
        return -1;
        //break;
    }
    if($result->statusCode!=0) {
        return $result->statusMsg;
        //echo "error code :" . $result->statusCode . "<br>";
        //echo "error msg :" . $result->statusMsg . "<br>";
        //TODO 添加错误处理逻辑
    }else{
        return 1;
        //echo "Sendind TemplateSMS success!<br/>";
        // 获取返回信息
        //$smsmessage = $result->TemplateSMS;
        //echo "dateCreated:".$smsmessage->dateCreated."<br/>";
        //echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
        //TODO 添加成功处理逻辑
    }
}

/**
 * 发送模板短信——验证码
 * @param to 手机号码集合,用英文逗号分开
 * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
 * @param $tempId 模板Id,测试应用和未上线应用使用测试模板请填写1，正式应用上线后填写已申请审核通过的模板ID
 */
function sendTemplateSMS($to,$datas,$tempId)
{

    //include_once(__API_PATH__ . "sdk/smsmsg/CCPRestSmsSDK.php");

    //主帐号,对应开官网发者主账号下的 ACCOUNT SID
    $accountSid= 'aaf98f8952305ced0152398d506818e2';

    //主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
    $accountToken= '7386ba006a0242c9a07bf83aa6c5985b';

    //应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
    //在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
    $appId='8a48b55152825d7b01528b7107611879';

    //请求地址
    //沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
    //生产环境（用户应用上线使用）：app.cloopen.com
    $serverIP='app.cloopen.com';


    //请求端口，生产环境和沙盒环境一致
    $serverPort='8883';

    //REST版本号，在官网文档REST介绍中获得。
    $softVersion='2013-12-26';

    // 初始化REST SDK
    //global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
    //echo 11;exit;
    //$aa = new \Org\Util\test();$aa->test();exit;
    $rest = new \Org\Util\CCPRestSmsSDK($serverIP,$serverPort,$softVersion);
    $rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);

    // 发送模板短信
    //echo "Sending TemplateSMS to $to <br/>";
    $result = $rest->sendTemplateSMS($to,$datas,$tempId);
    if($result == NULL ) {
        //echo "result error!";
        return -1;
        //break;
    }
    if($result->statusCode!=0) {
        return $result->statusMsg;
        //echo "error code :" . $result->statusCode . "<br>";
        //echo "error msg :" . $result->statusMsg . "<br>";
        //TODO 添加错误处理逻辑
    }else{
        return 1;
        //echo "Sendind TemplateSMS success!<br/>";
        // 获取返回信息
        //$smsmessage = $result->TemplateSMS;
        //echo "dateCreated:".$smsmessage->dateCreated."<br/>";
        //echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
        //TODO 添加成功处理逻辑
    }
}

/*
*
* 随机生成指定长度的字符串
*
*/
function func_getRandString($len,$arr = false) {
    if(is_array($arr) && count($arr)){
        $chars = $arr;
    }else{
        $chars = array(
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
            "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
            "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
            "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
            "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
            "3", "4", "5", "6", "7", "8", "9"
        );
    }
    $charsLen = count($chars) - 1;
    shuffle($chars);    // 将数组打乱
    $output = "";
    for ($i=0; $i<$len; $i++){
        $output .= $chars[mt_rand(0, $charsLen)];
    }
    return $output;
}
/**
匹配手机号码
规则：
手机号码基本格式：
前面三位为：
移动：134-139 147 150-152 157-159 182 187 188
联通：130-132 155-156 185 186
电信：133 153 180 189
后面八位为：
0-9位的数字
 */
function pregPN($test){
    $rule  = "/^((13[0-9])|17[0-9]|14[0-9]|(15[0-35-9])|180|182|(18[0-9]))[0-9]{8}$/A";
    preg_match($rule,$test,$result);
    return $result;
}
/*
 *
 *array(array(),array(),array())
 *判断二维数组值是不事多为空
 */
function is_null_arr($arr){
    if (trim(preg_replace("/(\w+\s*=>\s*)?array\s*\(|\),\s+|\)$/i","",var_export($arr,true)))){
        echo 'true';
    }
    else{
        echo "false";
    }
}


/*
 * url base64 特殊字符处理
 * */
function Qiniu_Encode($str) // URLSafeBase64Encode
{
    $find = array('+', '/');
    $replace = array('-', '_');
    return str_replace($find, $replace, base64_encode($str));
}
/*
 *$url
 *$etime设置有效时间
 * zip上传空间类别
 *
 *
 * */
function Qiniu_Sign($url,$etime = 86400,$type="zip",$www="") {//$info里面的url
    $setting = C ( 'UPLOAD_SITEIMG_QINIU' );
    $type=$type;
    switch($type){
        case "zip":
            $set_achives = C("ACHICES");
            $setting['maxSize'] = 500 * 1024 * 1024;//文件大小
            $setting['driverConfig']['domain'] = $set_achives['domain'];
            $url = "https://".$setting['driverConfig']['domain']."/".$url;
            $setting['driverConfig']['bucket'] = $set_achives['bucket'];
            break;
        case "imgfile":
            $set_achives = C("IMGPROFILE");
            $setting['driverConfig']['domain'] = $set_achives['domain'];
            $setting['driverConfig']['bucket'] = $set_achives['bucket'];
            break;
    }

    $duetime = NOW_TIME + $etime;//下载凭证有效时间

    if(empty($www)){
        $DownloadUrl = $url . '?e='.$duetime;
    }else{
        $DownloadUrl = $url . '?'.$www.'e='.$duetime;
    }
    $Sign = hash_hmac ( 'sha1', $DownloadUrl, $setting ["driverConfig"] ["secretKey"], true );
    $EncodedSign = Qiniu_Encode ( $Sign );
    $Token = $setting ["driverConfig"] ["accessKey"] . ':' . $EncodedSign;
    $RealDownloadUrl = $DownloadUrl . '&token=' . $Token;
    return $RealDownloadUrl;
}

function headimg($img,$ww = 200,$hh=200){
    $url =Qiniu_Sign("https://". C("IMGPROFILE")['domain']."/".$img,86400,"imgfile","imageView2/2/w/".$ww."/h/".$hh."/&");

    return $url;
}

function imgpublic($img){
    $img=$img;
    $url  = "//".C("UPLOAD_SITEIMG_QINIU")['driverConfig']['domain']."/".$img;
    return $url;
}
//生产uuid
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

/**
 * 判断前台用户是否登录
 * @return boolean
 */
function sp_is_user_login(){
    $session_user=session('user');
    return !empty($session_user);
}

/**
 *计算俩个时间戳的天数
 *$statr起始时间，$end结束时间
 */
function nubtime($statr,$end){
    if(!empty($statr)&&!empty($end)){
        $day = ceil((strtotime($statr)-strtotime($end))/86400);
        if(preg_match("/^[1-9][0-9]*$/",$day)){
            $day = $day;
        }else{
            $day = null;
        }
    }else{
        $day = null;
    }

    return $day;
}

/**
 * 处理地区json数据
 *$str需要处理的字符串
 * 返回的处理内容 0省，1市
 *
 * */
function adressjson($str,$t=0){
    $arr = json_decode($str,true);
    $res = null;
    if($t<2){
        $arr=explode("|",$arr[$t]);
        $res = $arr[1];
    }
    return $res;
}

/**
 *获取进度状态
 *
 *
 * */
function setstatue($i){
    $res = C("ASSET_STATUE");
    return $res[$i];
}
/**
 * 判断上午，中午，下午，晚上
 *
 *
 *
 * */
function dataG(){
    $h=date('G');
    if ($h<11) echo '早上好，';
    else if ($h<13) echo '中午好，';
    else if ($h<17) echo '下午好，';
    else echo '晚上好，';
}

/**
 * 获取当前页面完整URL地址
 */
function get_url() {
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
    return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
}
/**
 *
 *
 *
 *
 * */
function getsql($list,$num){

}
/**
 * 微信扫码支付
 * @param  array $order 订单 必须包含支付所需要的参数 body(产品描述)、total_fee(订单金额)、out_trade_no(订单号)、product_id(产品id)
 */
function weixinpay($order){
    $order['trade_type']='NATIVE';
    Vendor('Weixinpay.Weixinpay');
    $weixinpay=new \Weixinpay();
    $weixinpay->pay($order);
}

/**
 * 使用curl获取远程数据
 * @param  string $url url连接
 * @return string      获取到的数据
 */
function curl_get_contents($url){
    $ch=curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);                //设置访问的url地址
    // curl_setopt($ch,CURLOPT_HEADER,1);               //是否显示头部信息
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);               //设置超时
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);   //用户访问代理 User-Agent
    curl_setopt($ch, CURLOPT_REFERER,$_SERVER['HTTP_HOST']);        //设置 referer
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);          //跟踪301
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        //返回结果
    $r=curl_exec($ch);
    curl_close($ch);
    return $r;
}
/**
 * 生成二维码
 * @param  string  $url  url连接
 * @param  integer $size 尺寸 纯数字
 */
function qrcode($url,$size=4){
    Vendor('Phpqrcode.phpqrcode');
    if(is_mobile()){
        $size=8;
    }
    QRcode::png($url,false,QR_ECLEVEL_L,$size,2,false,0xFFFFFF,0x000000);
}
/*
 *
 * $string：字符串，
 * $operation:明文或密文；：
 * DECODE表示解密，其它表示加密；
 * $key：密匙；
 * $expiry：密文有效期。
 * */
function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
    // 动态密匙长度，相同的明文会生成不同密文就是依靠动态密匙
    $ckey_length = 4;

    // 密匙
    $key = md5($key ? $key : $GLOBALS['discuz_auth_key']);

    // 密匙a会参与加解密
    $keya = md5(substr($key, 0, 16));
    // 密匙b会用来做数据完整性验证
    $keyb = md5(substr($key, 16, 16));
    // 密匙c用于变化生成的密文
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length):
        substr(md5(microtime()), -$ckey_length)) : '';
    // 参与运算的密匙
    $cryptkey = $keya.md5($keya.$keyc);
    $key_length = strlen($cryptkey);
    // 明文，前10位用来保存时间戳，解密时验证数据有效性，10到26位用来保存$keyb(密匙b)，
//解密时会通过这个密匙验证数据完整性
    // 如果是解码的话，会从第$ckey_length位开始，因为密文前$ckey_length位保存 动态密匙，以保证解密正确
    $string = $operation == 'DECODE' ? base64_decode(substr(str_replace(array('','-','_'),array('=','+','/'),$string), $ckey_length)) :
        sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
    $string_length = strlen($string);
    $result = '';
    $box = range(0, 255);
    $rndkey = array();
    // 产生密匙簿
    for($i = 0; $i <= 255; $i++) {
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }
    // 用固定的算法，打乱密匙簿，增加随机性，好像很复杂，实际上对并不会增加密文的强度
    for($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }
    // 核心加解密部分
    for($a = $j = $i = 0; $i < $string_length; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        // 从密匙簿得出密匙进行异或，再转成字符
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }
    if($operation == 'DECODE') {
        // 验证数据有效性，请看未加密明文的格式
        if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) &&
            substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
            return substr($result, 26);
        } else {
            return '';
        }
    } else {
        // 把动态密匙保存在密文里，这也是为什么同样的明文，生产不同密文后能解密的原因
        // 因为加密后的密文可能是一些特殊字符，复制过程可能会丢失，所以用base64编码


        return  $keyc.str_replace(array('=','+','/'), array('','-','_'), base64_encode($result));
    }
}



/**
 * 检测是否是手机访问
 */
function is_mobile(){
    $useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    $useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:'';

    $mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');
    $mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod');

    $found_mobile=_is_mobile($mobile_os_list,$useragent_commentsblock) ||
        _is_mobile($mobile_token_list,$useragent);
    if ($found_mobile){
        return true;
    }else{
        return false;
    }
}
function _is_mobile($substrs,$text){
    foreach($substrs as $substr)
        if(false!==strpos($text,$substr)){
            return true;
        }
    return false;
}
/**
 *用户积分变动
 *$type 积分变动的类型
 *$money 变动金额数量
 *$userid 积分变动的用户id
 *
 */
function posdata($type,$userid,$money=null){
    $type=$type;
    $posint=null;
    $money = $money;
    $memberaccount =M("memberaccount");
    $sys_code = M()->table("sys_code");
    $memberintegrallog = M("memberintegrallog");
    $code_map['CodeStatu'] =1;

    $user_id['MemberId'] = $userid;
    switch($type){
        case "regpos":
            $code_map['CodeGroup']  = 10113;
            $code_val = $sys_code->field("CodeID,CodeGroup,CodeName,CodeValue")->where($code_map)->find();
            //系统设置积分
            $posint['Integration']= $code_val['CodeValue'];
            //备注
            $Remark = "注册积分";
            break;
        case "delpos":
            $code_map['CodeGroup']  = 10114;
            $code_val = $sys_code->field("CodeID,CodeGroup,CodeName,CodeValue")->where($code_map)->find();
            //系统设置积分
            $posint['Integration']= empty($money)?0:($money*$code_val['CodeValue']);
            //备注
            $Remark = "消费送积分";
            break;
        case "becpos":
            $code_map['CodeGroup']  = 10115;
            $code_val = $sys_code->field("CodeID,CodeGroup,CodeName,CodeValue")->where($code_map)->find();
            //系统设置积分
            $posint['Integration']= $code_val['CodeValue'];
            //备注
            $Remark = "成为经济人积分";
            break;
        case "extpos":
            $code_map['CodeGroup']  = 10116;
            $code_val = $sys_code->field("CodeID,CodeGroup,CodeName,CodeValue")->where($code_map)->find();
            //系统设置积分
            $posint['Integration']= $code_val['CodeValue'];
            //备注
            $Remark = "推广经济人积分";
            break;
        case "propos":
            $code_map['CodeGroup']  = 10116;
            $code_val = $sys_code->field("CodeID,CodeGroup,CodeName,CodeValue")->where($code_map)->find();
            //系统设置积分
            $posint['Integration']= $code_val['CodeValue'];
            //备注
            $Remark = "推广项目积分";
            break;
    }
    //查询余额积分
    $res_count = $memberaccount->where($user_id)->find();
    //print_r($res_count);


    $res = null;
    if(empty($res_count)){
        //赠送免费阅读次数
       // $free_map['CodeGroup'] =10130;
       // $free_count = M()->table("sys_code")->field("CodeID,CodeGroup,CodeName,CodeValue")->where($free_map)->find();

        $posint['MemberId']=$user_id['MemberId'];
        $posint['ModTime'] = date("Y-m-d H:i:s");
        $posint['ModUser'] = $user_id['MemberId'];
      //  $posint['freeCount'] = $free_count['CodeValue'];
        $res = $memberaccount->add($posint);
      //  print_r($res);
        if($res){
            $res_count = $memberaccount->where($user_id)->find();
            $res_count['Integration'] =  $res_count['Integration'] -  $posint['Integration'];
        }
    }else{
        $res  =  $memberaccount->where($user_id)->setInc("Integration", $posint['Integration']);
    }
    //流水号
    $data['SN']= date("Ymdhis").func_getRandString(4);
    //MemberId
    $data['MemberId']= $user_id['MemberId'];
    //变动前
    $data['PreIntegral'] =  $res_count['Integration'];
    //变动后
    $data['NxtIntegral'] = $res_count['Integration']+$posint['Integration'];
    //变动值
    $data['OffSetValue'] = $posint['Integration'];
    //备注
    $data['Remark'] = $Remark;
    //添加时间
    $data['CreateTime']  = date("Y-m-d H:i:s");
    $data['CreateUser']  = "stytem";
    $result = $memberintegrallog->add($data);

    return $result;
}

//用户可用余额
function yue(){
    $map['MemberId'] = session("user.MemberId");
    $yue = null;
    if(!empty($map['MemberId'])){
        $stime = date("Y-m-d H:i:s");
        $etime = date("Y-m-d H:i:s",strtotime($stime.' -7 day'));
        $maplog['CreateTime'] = array("between",$etime.','.$stime);
        $maplog['MemberId']  =  session("user.MemberId");
        $infolog = M('memberblancellog')->field("ROUND(sum(OffSetValue),2) as OffSetValue")->where($maplog)->find();
        $info = M("memberaccount")->where($map)->find();
        //print_r($infolog);exit;
        $yue =round(($info['Balance']-$info['FreezeAmount'])-$infolog['OffSetValue'] ,2);


    }
    if(!gt0($yue)){
        $yue = 0;
    }
    return $yue;
}
//正整数
function gt0($int){
    if(preg_match("/^[1-9]\d*\.\d*|0\.\d*[1-9]\d*|0?\.0+|0$/",$int)||preg_match("/^[1-9]\d*|0$/",$int))
    {
        return $int;
    }
    else{
        return false;
    }

}
//分享记录
function shfeng($proid,$userid,$type=4,$name="用户分享"){

    $map_sh['userip'] = get_client_ip(0,true);
    $map_sh['ShareID'] = $proid;

    $visitfromshare = M("visitfromshare");

    $sh_res = $visitfromshare->where($map_sh)->find();
    if(empty($sh_res)){
        $share_data['ShareType'] = $type;
        $share_data['FromDesc'] = $name;
        $share_data['ShareMember'] = $userid;
        $share_data['ShareID'] =$proid;
        $share_data['userip'] =get_client_ip(0,true);
        $share_data['FromUrl'] = get_url();
        $share_data['CreateTime'] = date("Y-m-d H:i:s");
        $sh_res = M("visitfromshare")->add($share_data);
    }else{
        $sh_res = null;
    }
    return $sh_res;

}
//是否购买尽调
function down_url($type,$buyid,$id){
    $downurl = 99;
    if(sp_is_user_login()){

        $type = $type;
        $buyid=$buyid;
        $path = "";
        switch($type){
            case 'assets':
                $map['tb_order.Type'] =2;
                $map['tb_order.ProductID'] =5;
                $map['tb_order.OrderStatue'] =2;

                $map['tb_assetsproject.AssetsID'] =$buyid;
                $map['tb_order.CreateUser'] =$id;

                $info = M("assetsproject")
                    ->field("tb_assetsproject.SubID,tb_assetsproject.JDUrl,tb_order.id,tb_order.OrderStatue")
                    ->join("tb_order ON tb_assetsproject.SubID=tb_order.InfoNo")
                    ->where($map)->find();
                //print_r($info);exit;

                break;
            case 'assets_rent':
                $map['tb_order.Type'] =2;
                $map['tb_order.ProductID'] =13;
                $map['tb_order.OrderStatue'] =2;

                $map['tb_assetsproject_rent.AssetsID'] =$buyid;
                $map['tb_order.CreateUser'] =$id;

                $info = M("assetsproject_rent")
                    ->field("tb_assetsproject_rent.SubID,tb_assetsproject_rent.JDUrl,tb_order.id,tb_order.OrderStatue")
                    ->join("tb_order ON tb_assetsproject_rent.SubID=tb_order.InfoNo")
                    ->where($map)->find();
                //print_r($info);exit;

                break;
            case 'debt':
                $map['tb_order.Type'] =2;
                $map['tb_order.ProductID'] =6;
                $map['tb_order.OrderStatue'] =2;
                $map['tb_order.CreateUser'] =session("user.MemberId");

                $map['tb_debtproject.DebtID'] =$buyid;
                $info = M("debtproject")
                    ->field("tb_debtproject.SubID,tb_debtproject.JDUrl,tb_order.id,tb_order.OrderStatue")
                    ->join("tb_order ON tb_debtproject.SubID=tb_order.InfoNo")
                    ->where($map)->find();
                break;
            case 'package':
                $map['tb_order.Type'] =2;
                $map['tb_order.ProductID'] =4;
                $map['tb_order.OrderStatue'] =2;
                $map['tb_order.CreateUser'] =$id;

                $map['tb_packageproject.PackageID'] =$buyid;
                $map['tb_packageproject.Ismain'] =1;
                $info = M("packageproject")
                    ->field("tb_packageproject.SubID,tb_packageproject.JDUrl,tb_order.id,tb_order.OrderStatue")
                    ->join("tb_order ON tb_packageproject.SubID=tb_order.InfoNo")
                    ->where($map)->find();
                break;
            case 'Ismain':

                $map['tb_order.Type'] =2;
                $map['tb_order.ProductID'] =6;
                $map['tb_order.OrderStatue'] =2;
                $map['tb_order.CreateUser'] =$id;

                $map['tb_packageproject.SubID'] =$buyid;
                $map['tb_packageproject.Ismain'] =0;
                $info = M("packageproject")
                    ->field("tb_packageproject.SubID,tb_packageproject.JDUrl,tb_order.id,tb_order.OrderStatue")
                    ->join("tb_order ON tb_packageproject.SubID=tb_order.InfoNo")
                    ->where($map)->find();
                break;
        }
        if($info){
            $downurl = 88;
        }
    }
    return $downurl;
}
//检测https
function is_HTTPS(){
    if(!isset($_SERVER['HTTPS']))  return FALSE;
    if($_SERVER['HTTPS'] === 1){  //Apache
        return TRUE;
    }elseif($_SERVER['HTTPS'] === 'on'){ //IIS
        return TRUE;
    }elseif($_SERVER['SERVER_PORT'] == 443){ //其他
        return TRUE;
    }
    return FALSE;
}
//是否是微信浏览器
function is_weixin(){
    if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
        return true;
    }
    return false;
}


function getJson($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
}
//微信用户授权
function wxcode(){
    $appid=C('wxappid');

    $redirect_uri =urlencode("http://".$_SERVER['HTTP_HOST'].U("User/Login/dowx"));
    if(is_HTTPS()){
        $redirect_uri =urlencode("https://".$_SERVER['HTTP_HOST'].U("User/Login/dowx"));
    }

    //echo $redirect_uri;
    //urlencode ( 'http://www.afefgrw.top/index.php/Home/Index/aass' );
    //urlencode ( "http://".$_SERVER['SERVER_NAME'].U("User/Apipay/weiuser",array('cid'=>$cid)) );
    $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
    redirect($url);

}

//获取微信oppid
function user_oppid(){

}
//合伙经济人数量
function user_partner(){
    $user_model = M("member");
    $user_map['tb_member.RecommendMember'] = session("user.MemberId");

    $count= $user_model->join("tb_memberprofile ON tb_memberprofile.MemberID =tb_member.MemberId ")->where($user_map)->count();

    return $count;
}
//合伙订单
function user_partnerorder(){
    $user_model = M("member");
    $user_map['tb_member.RecommendMember'] = session("user.MemberId");

    $user_in= $user_model->field("MemberId,MemberName")->where($user_map)->select();
    $user_in_array=null;
    $user_name = null;
    foreach($user_in as $key=>$value ){
        $user_in_array[] = $value['MemberId'];
        $user_name[$value['MemberId']] = $value['MemberName'];
    }
    if(is_array($user_in_array))   {
        $order_model = M("order");

        $order_map['CreateUser'] = array("in",$user_in_array);
        $order_map['OrderStatue'] =2;
        $count= $order_model->field("SUM(DealPrice) as price")->where($order_map)->find();
    }else{
        $count['price'] = 0;
    }

    return $count['price'];

}
//合伙人项目
function user_partnerproject(){
    $user_model = M("member");
    $user_map['tb_member.RecommendMember'] = session("user.MemberId");

    $user_in= $user_model->field("MemberId,MemberName")->where($user_map)->select();
    $user_in_array=null;
    $user_name = null;
    foreach($user_in as $key=>$value ){
        $user_in_array[] = $value['MemberId'];
        $user_name[$value['MemberId']] = $value['MemberName'];
    }
    if(is_array($user_in_array)){
        $assets_model = M("assets");
        $info_map['memberid'] =array("in",$user_in_array);
        $count = $assets_model->where($info_map)->count();
    }else{
        $count=0;
    }

    return $count;

}

//查看时间是否已经超出当天规定
function comper_time($time,$comvar=86400){
    $time_int = strtotime($time);
    $time_int1 = $time_int+$comvar;
    if($time_int<time()){
        return true;
    }else{
        return false;
    }
}
function auclistsum($code){
    $map['City'] = $code;
    return M("assets")->where($map)->count();
}