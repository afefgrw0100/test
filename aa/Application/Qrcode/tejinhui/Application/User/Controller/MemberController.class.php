<?php
namespace User\Controller;
use Common\Controller\MemberbaseController;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/15
 * Time: 11:22
 */
class MemberController extends MemberbaseController{
    public function __construct()
    {
        parent::__construct();
//        $login_http_referer=session('login_http_referer');
//        if(!empty($login_http_referer)||isset($login_http_referer)){
//            session('login_http_referer',U("User/Member/index"));
//            session('login_http_member',get_url());
//            print_r(session("login_http_member"));
//        }
    }
    public function index(){
        session("keyword.title",C('logotitle')[7].session("keyword.title"));
        $this->display("index");
    }
    //退出
    public function logout(){
        session("user",null);//只有前台用户退出
        redirect(__ROOT__."/");
    }
    //修改密码
    public function getPassword(){
        $this->display("Index/password");
    }
}