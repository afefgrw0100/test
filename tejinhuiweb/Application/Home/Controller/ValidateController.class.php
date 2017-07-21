<?php
/**
 * time: 2015-08-10;
 * 
 * author: Gamelife;
 * 
 * description: 用于服务器接入验证和请求转发;
 * 
 */
namespace Home\Controller;

use Think\Controller;
use LaneWeChat\Core\WeChatOAuth;
use LaneWeChat\Core\UserManage;

class ValidateController extends Controller 
{
	public function validate() {

		// echo WECHAT_TOKEN;

		//$wechat 	= new WeChat(WECHAT_TOKEN, true);

		//$wechat->checkSignature();
		
		//$wechat->run();	
		 //第一步，获取CODE

            WeChatOAuth::getCode('http://www.tejinhui.com', 1, 'snsapi_base');

            //此时页面跳转到了http://www.lanecn.com/index.php，code和state在GET参数中。

            $code = $_GET['code'];

			echo $code;
            //第二步，获取access_token网页版

            $openId = WeChatOAuth::getAccessTokenAndOpenId($code);

            //第三步，获取用户信息

            $userInfo = UserManage::getUserInfo($openId['openid']);
			echo $userInfo;
	}
}