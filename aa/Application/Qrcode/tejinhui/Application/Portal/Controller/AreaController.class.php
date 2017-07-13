<?php
namespace Portal\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/10
 * Time: 10:00
 */
class AreaController extends Controller {
    protected $area_model  =  null;
    public function __construct()
    {
        parent::__construct();
        $this->area_model= M("area");

    }

    public function codeA(){
        $map['pid']='0';
        $result = $this->area_model->field("id,name,pid,code")->where($map)->select();
        $this->ajaxReturn($result,"JSON",JSON_UNESCAPED_UNICODE);
    }
    public function codeB(){
        $map['pid']=I("request.codeid");
        $result = $this->area_model->field("id,name,pid,code")->where($map)->select();
        $this->ajaxReturn($result,"JSON",JSON_UNESCAPED_UNICODE);
    }
    public function codeC(){
        $map['pid']=I("request.codeid");
        $result = $this->area_model->field("id,name,pid,code")->where($map)->select();
        $this->ajaxReturn($result,"JSON",JSON_UNESCAPED_UNICODE);
    }
    public function asgA(){
        $map['pid']='0';
        $result = $this->area_model->field("id,name,pid,code")->where($map)->select();
        $this->assign("codeA",$result);
    }

}