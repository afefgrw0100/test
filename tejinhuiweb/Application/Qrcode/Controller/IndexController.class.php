<?php
namespace Qrcode\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function qrcode(){
        $url = I("request.code");
        $url = urldecode($url);
        qrcode($url,2);
    }
}