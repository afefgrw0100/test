<?php
namespace User\Controller;
use Common\Controller\MemberbaseController;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/2
 * Time: 9:50
 */
class PaymentController extends  MemberbaseController{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * notify_url接收页面
     */
    public function test(){
        $a  = 111;
        $ac= authcode($a,"ENCODE");
        echo $ac;
        $bc = authcode($ac);
        echo $bc;
    }


    public function index(){
        session('login_http_referer',null);
        session('login_http_member',null);
        //订单id
        $bas = I("request.codekey");
        $this->assign("bas",$bas);
        $bas = authcode($bas);

        $map['id'] = $bas;
        $map['OrderStatue'] =1;

        $type=I("request.type");
        $this->assign("type",$type);
        $type = authcode($type);

        $codetype=I("request.codetype");
        $this->assign("codetype",$codetype);
        $codetype = authcode($codetype);

        $result = null;
        $order_model =  M("order");
        switch($codetype){
            //发布信息
            case 1:
                if($type=="assets"){

                    $result =$order_model->field("id,sn,DealPrice,Title")->join("tb_assets ON tb_order.InfoNo=tb_assets.AssetsID")->where($map)->find();
                }
                if($type=="package"){
                    $result =$order_model->field("id,sn,DealPrice,Title,Projectnum")->join("tb_package ON tb_order.InfoNo=tb_package.PackageID")->where($map)->find();
                }
                if($type=="debt"){
                    $result =$order_model->field("id,sn,DealPrice,Title")->join("tb_debt ON tb_order.InfoNo=tb_debt.DebtID")->where($map)->find();
                }
                break;
            //购买信息
            case 2;

                if($type=="assets"){
                    $result =$order_model->field("id,sn,DealPrice,tb_assetsproject.SubName as Title")->join("tb_assetsproject ON tb_order.InfoNo=tb_assetsproject.SubID")->where($map)->find();
                }
                if($type=="package"){
                    $result =$order_model->field("id,sn,DealPrice,tb_packageproject.SubName as Title")->join("tb_packageproject ON tb_order.InfoNo=tb_packageproject.SubID")->where($map)->find();
                }
                if($type=="debt"){
                    $result =$order_model->field("id,sn,DealPrice,tb_debtproject.SubName as Title")->join("tb_debtproject ON tb_order.InfoNo=tb_debtproject.SubID")->where($map)->find();
                }
                break;
            //经济人费用
            case 3;
                $result =$order_model->field("id,sn,DealPrice,ProductName as Title")->where($map)->find();
                break;
            //充值
            case 4:
                $result =$order_model->field("id,sn,DealPrice,ProductName as Title")->where($map)->find();
                //print_r($result);exit;
                break;
            case 5:
                if($type=="assets"){

                    $result =$order_model->field("id,sn,DealPrice,ProductID,tb_assetsproject.SubName as Title,tb_assetsproject.AssetsID as pid")->join("tb_assetsproject ON tb_order.InfoNo=tb_assetsproject.SubID")->where($map)->find();

                }
                if($type=="package"){
                    $result =$order_model->field("id,sn,DealPrice,ProductID,tb_packageproject.SubName as Title,tb_packageproject.PackageID as pid")->join("tb_packageproject ON tb_order.InfoNo=tb_packageproject.SubID")->where($map)->find();
                }
                if($type=="debt"){
                    $result =$order_model->field("id,sn,DealPrice,ProductID,tb_debtproject.SubName as Title,tb_debtproject.DebtID as pid")->join("tb_debtproject ON tb_order.InfoNo=tb_debtproject.SubID")->where($map)->find();
                }





                break;
            default;
                $this->error("illegal parameter！！");
        }



        if(empty($result)){

            $this->error("illegal parameter！！");
        }
        if($result['DealPrice']<=0){
            $this->error("订单有误:金额不可为空");
        }
        if(is_weixin()){
            $out_trade_no=$result['sn'];
            // 组合url
            $url=U('User/Apipay/pay',array('out_trade_no'=>$out_trade_no));
            // 前往支付
            redirect($url);
        }else{
            $this->assign('info',$result);
            if(is_mobile()){
                $this->display("mobile@User/pay");
            }else{
                $this->display("pay");
            }

        }

    }

    /**
     * 微信 扫描支付二维码
     */
    public function weixinpay_qrcode(){
        session("login_http_referer",null);
        // 此处根据实际业务情况生成订单 然后拿着订单去支付

        // 虚拟的订单 请根据实际业务更改
        $result = $this->comres();
        if(empty($result)){
            $this->error("illegal parameter！！");
        }

        $time['sn']= $result['sn'];
        $UpdateTime = empty($result['UpdateTime'])?strtotime($result['CreateTime']):strtotime($result['UpdateTime']);
        if(empty($UpdateTime)||($UpdateTime+3600)<time()){
            $time['sn']= date("YmdHis").func_getRandString(4);
            $time['UpdateTime']= date("Y-m-d H:i:s");
            if(M('order')->create($time)){
                $map['id'] = $result['id'];
                $res = M('order')->where($map)->save();
                if(!$res){
                    $this->error("illegal parameter！！");
                }
            }else{
                $this->error("illegal parameter！！");
            }

        }

        $tit =$result['Title'];
        //echo $result['DealPrice'];exit;
        $order=array(
            'body'=>$tit,
            'total_fee'=>$result['DealPrice']*100,
            //$result['DealPrice']*100,//$result['DealPrice'],
            'out_trade_no'=>strval($time['sn']),
            'product_id'=>$result['id'],
        );
        weixinpay($order);
    }
    /*
     *$bas-----订单id
     *
     *$type ----信息子类别
     *
     *$codetype - -- 信息父类别
     *
     * */
    private function comres(){
        //订单id
        $bas = I("request.codekey");
        $this->assign("bas",$bas);
        $bas = authcode($bas);
        $map['id'] = $bas;
        $map['OrderStatue'] =1;

        $type=I("request.type");
        $this->assign("type",$type);
        $type = authcode($type);

        $codetype=I("request.codetype");
        $this->assign("codetype",$codetype);
        $codetype = authcode($codetype);
        $result = null;
        $order_model =  M("order");
        switch($codetype){
            //发布信息
            case 1:
                if($type=="assets"){
                    $result =$order_model->field("id,sn,DealPrice,Title,UpdateTime")->join("tb_assets ON tb_order.InfoNo=tb_assets.AssetsID")->where($map)->find();
                }
                if($type=="package"){
                    $result =$order_model->field("id,sn,DealPrice,Title,UpdateTime")->join("tb_package ON tb_order.InfoNo=tb_package.PackageID")->where($map)->find();
                }
                if($type=="debt"){
                    $result =$order_model->field("id,sn,DealPrice,Title,UpdateTime")->join("tb_debt ON tb_order.InfoNo=tb_debt.DebtID")->where($map)->find();
                }
                break;
            //购买信息
            case 2;
                if($type=="assets"){
                    $result =$order_model->field("id,sn,DealPrice,tb_assetsproject.SubName as Title,tb_order.UpdateTime")->join("tb_assetsproject ON tb_order.InfoNo=tb_assetsproject.SubID")->where($map)->find();
                }
                if($type=="package"){
                    $result =$order_model->field("id,sn,DealPrice,tb_packageproject.SubName as Title,tb_order.UpdateTime")->join("tb_packageproject ON tb_order.InfoNo=tb_packageproject.SubID")->where($map)->find();
                }
                if($type=="debt"){
                    $result =$order_model->field("id,sn,DealPrice,tb_debtproject.SubName as Title,tb_order.UpdateTime")->join("tb_debtproject ON tb_order.InfoNo=tb_debtproject.SubID")->where($map)->find();
                   // echo $order_model->getLastSql();exit;
                }
                break;
            //经济人费用
            case 3;
                $result =$order_model->field("id,sn,DealPrice,ProductName as Title,UpdateTime")->where($map)->find();
                break;
            //充值
            case 4:
                $result =$order_model->field("id,sn,DealPrice,ProductName as Title,UpdateTime")->where($map)->find();
                break;
            case 5:
                if($type=="assets"){
                    $result =$order_model->field("id,sn,DealPrice,tb_assetsproject.SubName as Title,tb_order.UpdateTime")->join("tb_assetsproject ON tb_order.InfoNo=tb_assetsproject.SubID")->where($map)->find();
                }
                if($type=="package"){
                    $result =$order_model->field("id,sn,DealPrice,tb_packageproject.SubName as Title,tb_order.UpdateTime")->join("tb_packageproject ON tb_order.InfoNo=tb_packageproject.SubID")->where($map)->find();
                }
                if($type=="debt"){
                    $result =$order_model->field("id,sn,DealPrice,tb_debtproject.SubName as Title,tb_order.UpdateTime")->join("tb_debtproject ON tb_order.InfoNo=tb_debtproject.SubID")->where($map)->find();
                    // echo $order_model->getLastSql();exit;
                }
                break;
            default;
                $this->error("illegal parameter！！");
        }
        return $result;

    }

}