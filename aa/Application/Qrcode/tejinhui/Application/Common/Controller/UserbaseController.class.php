<?php
namespace Common\Controller;
use Common\Controller\MemberbaseController;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/24
 * Time: 15:53
 */
class UserbaseController extends MemberbaseController{
    public function __construct()
    {
        parent::__construct();
        $login_http_referer=session('login_http_referer');
        if(!empty($login_http_referer)||isset($login_http_referer)){
            session('login_http_referer',U("User/Member/index"));
            session('login_http_member',get_url());
        }else{
            session('login_http_referer',null);
        }
    }

}