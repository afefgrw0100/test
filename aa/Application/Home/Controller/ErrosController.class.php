<?php
namespace Home\Controller;
use Think\Controller;
class ErrosController extends Controller {
    public function index(){
        echo "<html><script>window.open('".U('Home/Erros/error')."','_top');</script></html>";

     }
    public function error(){
        $this->display("Index:error50x");
    }
    public function error4(){
        $this->display("Index:error404");
    }
}