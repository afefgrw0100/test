<?php
namespace Portal\Controller;
use Think\Controller;
use Smsmsg;
class IndexController extends Controller {
    public function index(){
        //$r = func_send_mobilemsg_whtz("13142240057");
        //var_dump($r);
    }
    public function mcode(){
        $m_code = session("?mobile_code")? session("mobile_code"):null;
        $r =$info=null;
        $mobile= I("request.mobile");
        //var_dump(time());exit;
        $mobile_where['Mip'] = get_client_ip(0,true);
        $mobile_model = M("mobile_region");
        $mobile_where['time']  =array('between',array((time()-86400),time()));
        $info = $mobile_model->where($mobile_where)->find();
        if(!empty($info)){
            if($info['num']>50){
                $this->ajaxReturn(ajax_josn_data("发送已超过每日次数","400"),"JSON",JSON_UNESCAPED_UNICODE);
                exit;
            }
        }
        if(empty($m_code)){
            $r = func_send_mobilemsg_whtz($mobile);
        }else{
            if($mobile==$m_code['mobile']){
                $mt= ($m_code['time']+120)<time()?true:false;
                $mnub =$m_code['mn']<3?true:false;
                //echo  $mnub;exit;
                if($mt&&$mnub){
                    $r = func_send_mobilemsg_whtz($mobile);
                }else{
                    $this->ajaxReturn(ajax_josn_data("发送失败请稍后在试","400"),"JSON",JSON_UNESCAPED_UNICODE);
                }
            }else{
                session("mobile_code",null);
                $r = func_send_mobilemsg_whtz($mobile);
            }

        }
        $rdata =null;$mn= $m_code['mn']?$m_code['mn']:0;
        if($r == 'fail'){
            $rdata = array(
                'status' => 'fail',
                'msg' => '发送验证码失败',
            );
        }elseif(strpos("__" . $r,"error:")){
            $rdata = array(
                'status' => 'fail',
                'msg' => $r,
            );
        }else{
            $mobile_code['mobile_code']=time();
            $mobile_code['code']=$r;
            $mobile_code['mn']=$mn+1;
            $mobile_code['mobile']= $mobile;
            session("mobile_code",$mobile_code);

            if($info){
                $mobile_model->where($mobile_where)->setInc("num");
            }else{
                $mobile_where['time']= time();
                $mobile_model->add($mobile_where);
            }
            $rdata = array(
                'status' => 'ok',
                'msg' => '发送验证码成功',
            );
        }
        $this->ajaxReturn(ajax_josn_data("已发送请","200",'',$rdata),"JSON",JSON_UNESCAPED_UNICODE);

    }
}