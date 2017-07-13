<?php
namespace Web\Controller;
use Common\Controller\MemberbaseController;
use Think\Model;
class DebtController extends MemberbaseController {
    public function __construct()
    {
        parent::__construct();
        header("Content-type:text/html; charset=utf-8");
    }
    public function add_edit(){
        if(IS_POST){
            $debtm = D("Debt");
            $infodata = $result=null;
            if($debtm->create()){
                if(strtotime($debtm->StartTime)>strtotime($debtm->EndTime)){
                    $this->error("起始时间不能大于结束时间");
                }

                //判断地址是不是空
               // echo $debtm->DebtAdress[1];exit;
                if( $debtm->DebtAdress[1]=='0'){
                    $this->error("请填写债务人所在地");
                }else{
                    $debtm->Province = explode("|",  $debtm->DebtAdress[0])[0];
                    $debtm->City =explode("|",   $debtm->DebtAdress[1])[0];
                    $debtm->DebtAdress = json_encode( $debtm->DebtAdress,JSON_UNESCAPED_UNICODE);
                }
                if($debtm->PledgeAddress[1]=='0'){
                    $this->error("请填写抵押物地址");
                }else{
                    $debtm->PledgeAddress = json_encode($debtm->PledgeAddress,JSON_UNESCAPED_UNICODE);
                }
                if(empty($debtm->ProcessModle)){
                    $this->error("请选择：处置方式");
                }
                $debtm->ProcessModle = $debtm->ProcessModle[0]+$debtm->ProcessModle[1];
                $debtm->OrginPic = basename($debtm->OrginPic);
                $debtm->OwnerPic = basename($debtm->OwnerPic);
                $debtm->ProjectListPic = basename($debtm->ProjectListPic);
                //print_r($debtm->create());eixt;
                //echo $debtm->Title;exit;
                if(empty(I('post.cid'))){
                    //新增
                    $debtm->CreateMember=session("user.MemberName");
                    $debtm->memberid= session("user.MemberId");
                    $debtm->CreateTime= date("Y-m-d H:i:s");
                    if(session("user.MemberType")==4){
                        $debtm->AssetsStatue =2;
                    }
                    $result= $debtm->add();
                    if($result){
                        if(session("user.MemberType")==4){
                            $this->redirect("Web/Index/mic",array('DebtID'=>$result));
                        }else{
                            $this->userorder($result,"debt");
                        }

                    }
                }else{
                    //修改
                    $map['DebtID']=I('post.cid');
                    $debtm->ModUser=session("user.MemberName");
                    $debtm->memberid= session("user.MemberId");
                    $debtm->ModTime= date("Y-m-d H:i:s");
                    $result=$debtm->where($map)->save();
                }
                if($result){
                    $this->redirect("User/index/index");
                }else{
                    $this->error($debtm->getError());
                }
                //print_r($debtm);

            }else{
                //$this->success("密码重置成功，请登录！",U("user/login/index"));
                $this->error($debtm->getError());
                //$this->ajaxReturn(ajax_josn_data(),"JSON",JSON_UNESCAPED_UNICODE);
            }
        }
    }
    public function domic(){
        if(IF_POST){
            $model = new Model();
            $model->startTrans();
            $result = null;
            $ultdili  = array(
                array('DebtID','require','请填写：资产id',1),
                array('AssetsDesc','require','请填写：资产情况介绍',1),
                array('ReportDesc','require','请填写：尽调报告介绍',1),
            );
            $ultpro   =array(
                array('DebtID','require','请填写：资产ID',1),
                array('SubName','require','请填写：项目名称',1),
                array('SubDesc','require','请填写：项目描述',1),
                array('JDUrl','require','请填写：下载地址',1),
                array('ViewPrice','require','请填写：查看尽调报告费用',1),
                array('BuyPrice','require','请填写：买断尽调报告费用',1),
            );
            $map['DebtID']=I("request.DebtID");
            $map['Usestat'] =1;
            $res = $model->table("tb_debtduedili")->where($map)->find();
            if($model->table("tb_debtduedili")->validate($ultdili)->create()){
                $model->table("tb_debtduedili")->Images = basename($model->Images[0])."@".basename($model->Images[1])."@".basename($model->Images[2]);
                $model->table("tb_debtduedili")->JudgedPic = basename( $model->table("tb_debtduedili")->JudgedPic);
                $model->table("tb_debtduedili")->DueCreateMember = session("user.MemberId");
                $model->table("tb_debtduedili")->DueCreateTime =date("Y-m-d H:i:s");
                $model->table("tb_debtduedili")->DescPdf =explode("?",basename($model->table("tb_debtduedili")->DescPdf))[0];
                if(!empty($res)){
                    $result =  $model->table("tb_debtduedili")->where($map)->save();
                }else{
                    $result =  $model->table("tb_debtduedili")->add();
                }


                if($result){
                    if($model->table("tb_debtproject")->validate($ultpro)->create()){
                        $model->table("tb_debtproject")->KXUrl= explode("?",basename($model->table("tb_debtproject")->JDUrl))[0];;
                        $model->table("tb_debtproject")->JDUrl = "JDUrl";
                        if(!empty($res)){
                            unset($map['Usestat']);
                            $result= $model->table("tb_debtproject")->where($map)->save();
                        }else{
                            $result= $model->table("tb_debtproject")->add();
                        }

                        if($result){
                            $DebtID['DebtID'] = $map['DebtID'];
                            $AssetsStatue['AssetsStatue'] = 3;
                            $AssetsStatue['titimg'] = basename(I("request.titimg"));
                            M("debt")->where($DebtID)->setField($AssetsStatue);
                            $model->commit();
                            $this->success("发布成功",U("User/Member/index"));
                        }else{
                            $model->rollback();
                            $this->error("跟新失败");
                        }
                    }else{
                        $this->error($model->getError());
                    }
                }else{
                    $model->rollback();
                    $this->error("跟新失败");
                }
            }else{
                $this->error($model->getError());
            }


        }

    }
}