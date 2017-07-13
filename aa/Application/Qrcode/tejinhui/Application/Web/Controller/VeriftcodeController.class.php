<?php
namespace Web\Controller;
use Think\Controller;
class VeriftcodeController extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        echo sp_verifycode_img('length=4&font_size=14&width=100&height=34&charset=1234567890&use_noise=1&use_curve=0');
    }
    public function vercode(){
        if(sp_check_verify_code()){
            echo 111;
        };

    }
}