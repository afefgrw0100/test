<?php
namespace User\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function __construct()
    {

       // session('login_http_referer',null);
        session('login_http_member',null);
        if(sp_is_user_login()){

            if(is_mobile()){
                $this->redirect("User/Common/memberindex");
            }else{
                $this->redirect("User/Member/index");
            }


        }

        session("keyword.title",C('logotitle')[6]);
        parent::__construct();
    }

    public function index(){

        //print_r( session('login_http_member'));exit;
        if(is_mobile()){
            if(is_weixin()){

                wxcode();
            }
            $this->display("loginmobile");
        }else{
            $this->display('login');
        }

      }
    public function region(){

        if(is_mobile()){
            $this->display("registermobile");
        }else{
            $this->display();
        }

    }
    public function getpassword(){
        $this->display("getPassword");
    }

}