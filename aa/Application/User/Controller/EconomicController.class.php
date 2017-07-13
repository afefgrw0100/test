<?php
namespace User\Controller;
use Common\Controller\MemberbaseController;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/21
 * Time: 15:31
 */
class EconomicController extends MemberbaseController{
    public function __construct()
    {
        parent::__construct();
    }
    //成为经济人
    public function economic(){
        $user =session("user");
        //基本信息
        if($user['MemberType']==4){
            $this->error("你已经是经济人了");
        }
        $user_model_pro=M('memberprofile');
        $map = "tb_memberprofile.MemberID = '".$user['MemberId']."'";
        $info = $user_model_pro->join("LEFT JOIN tb_memberaccount ON tb_memberprofile.MemberID=tb_memberaccount.MemberId")->where($map)->find();



        $info=array_merge($user,$info);
        //验证基本资料
        $RealName = $info['RealName'];
        $City = $info['City'];
        $CellPhone = $info['CellPhone'];
        $openid = $info['openid'];
        if(empty($RealName)||empty($City)||empty($CellPhone)){
            $this->error("请完善基本资料");
        }
//        if(empty($openid)){
//            $this->error("请绑定微信号");
//        }
        $info['MemberType']=M()->table("sys_code")->where("CodeID= '".$info['MemberType']."'")->find();
        $info['Province'] = M('area')->field("name")->find($info['Province']);
        $info['City']= M('area')->field("name")->find($info['City']);
        $info['IdentityImg'] =empty( $info['IdentityImg'])?"":headimg($info['IdentityImg']);
        $this->assign("user",$info);


        //获取推荐人
        $dili['MemberId'] = session("user.RecommendMember");
        $info_dili = M("member")->field("MemberName,MemberId")->where($dili)->find();
        $this->assign("rec",$info_dili['MemberName']);
        //print_r($info);
        $this->display("economic");
    }
    //提交证件
    public function doecnomic(){
        if(IS_POST){
            $ec_model =D("Economic");
            if($ec_model->create()){
                $map['MemberID'] =session("user.MemberId");
                $path_with_query=$ec_model->IdentityImg;
                $path=explode("?",$path_with_query);
                $filename=basename($path[0]);
                //$query=$path[1];
                $ec_model->IdentityImg = $filename;

                //修改推荐人
                $MemberId['MemberName'] = I("request.RecommendMember");
                $rsss = M("member")->field("MemberId,MemberName")->where($MemberId)->find();

                $res_rec = session("user.RecommendMember");
                if(!empty($rsss)&&empty($res_rec)){
                    $RecommendMember['RecommendMember'] =$rsss['MemberId'] ;
                    $maps['MemberId']=$map['MemberID'];
                    //print_r($maps);
                    $result = M("member")->where($maps)->save($RecommendMember);
                }

                //exit;
                $ec_model->where($map)->save();
                $this->redirect("User/Logic/ecopay");
            }else{
                $this->error($ec_model->getError());
            }
        }
    }
    //经纪人在先考核
    public function trainning(){
//        session('login_http_referer',null);
//        session('login_http_member',null);
        //获取单选提
//        $map['TestType'] = 1;
//        $info_data1 = M("question")->where($map)->limit(2)->order("RAND()")->select();
//        print_r($info_data1);
//        //获取多选提
//        $map['TestType'] = 2;
//
//        //获取判断提
//        $map['TestType'] = 3;

        $user_model = M('member');
        $map['MemberType'] =3;
        $map['MemberStatu']=3;
        $res = $user_model->where($map)->find();
        if(empty($res)){
            $this->redirect("User/Member/index");
        }
        $this->display();
    }

    public function dotrai(){
        session('login_http_referer',null);
        session('login_http_member',null);
        $user_model = M('member');
        $map['MemberType'] =3;
        $map['MemberStatu']=3;
        //获取推荐人信息
        $tain = $user_model->field("MemberId,MemberName,RecommendMember,MemberType,MemberStatu")->where($map)->find();

        //获取经人回扣比例
        $CodeGroup['CodeGroup']=10126;
        $code_val = M()->table("sys_code")->field("CodeID,GroupName,CodeValue")->where($CodeGroup)->find();

        //获取订单交易金额
        $order_map['Type'] =3;
        $order_map['OrderStatue'] =2;
        $order_map['CreateUser'] =$tain['MemberId'];
        $order_map['ProductID'] =7;


        $order_val = M('order')->field('id,CreateUser,DealPrice')->where($order_map)->find();
        //print_r($order_val);exit;

        //用户成为经济人
        $data['MemberType'] =4;
        $data['MemberStatu']=1;
        $res = $user_model->where($map)->save($data);
        echo $res;
        if(empty($res)){
            $this->error('考核失败');
        }else{
            if(!empty($tain)){
                M()->startTrans();
                $account['MemberId'] = $tain['RecommendMember'];
                $res_ac = M("memberaccount")->field("MemberId,Balance")->where($account)->find();
                if(!empty($res_ac)){
                    $OffSetValue = $order_val['DealPrice']*$code_val['CodeValue'];
                    $res= M("memberaccount")->where($account)->setInc("Balance",$OffSetValue);

                    if($res){
                        $cdata['SN'] = date("YmdHis").func_getRandString(4);
                        $cdata['MemberId'] = $res_ac['MemberId'];
                        $cdata['PreIntegral'] = $res_ac['Balance'];

                        $cdata['NxtIntegral'] = $res_ac['Balance']+$OffSetValue;

                        $cdata['OffSetValue'] = $OffSetValue;
                        $cdata['Remark'] = "经济人推荐";
                        $cdata['CreateTime'] =date("Y-m-d H:i:s");
                        $cdata['CreateUser'] = "sytem";

                        $res = M("memberblancellog")->add($cdata);
                        if($res){
                            M()->commit();
                        }else{
                            M()->rollback();
                        }
                    }

                }
            }
            $this->success("考核通过",U("User/Member/index"));
        }


    }

}