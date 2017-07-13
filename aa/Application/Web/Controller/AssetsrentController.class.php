<?php
namespace Web\Controller;
use Common\Controller\MemberbaseController;
use Think\Model;

class AssetsrentController extends MemberbaseController {
    public function index(){
        phpinfo();
        // echo sp_verifycode_img('length=4&font_size=14&width=100&height=34&charset=1234567890&use_noise=1&use_curve=0');
       // print_r($Verify);
       // echo "Controller:Assts";

    }
    public function verifycode(){
//        if(sp_check_verify_code()){
//            echo 111;
//        };
    }
    public function add_edit(){
        if(IS_POST){
            $assets_model =D("Assetsrent");
            $result=null;
            //$area = I('post.address');
            //print_r();
            if($assets_model->create()){
              // print_r($assets_model->create());exit;
                if($assets_model->Address[1]==0){
                    $this->error("请选择：正确的地址");
                }
                if(empty($assets_model->ProcessModle)){
                    $this->error("请选择：处置方式");
                }
                $assets_model->Province = explode("|",$assets_model->Address[0])[0];
                $assets_model->City =explode("|",$assets_model->Address[1])[0];
                $assets_model->ProcessModle = $assets_model->ProcessModle[0]+$assets_model->ProcessModle[1];
                $assets_model->Address=json_encode($assets_model->Address,JSON_UNESCAPED_UNICODE);
                $assets_model->AuthPic = basename($assets_model->AuthPic);
                $assets_model->RealPic= basename($assets_model->RealPic);
                if($assets_model->Source==1){
                    $assets_model->AuctionEnd=  date("Y-m-d H:i:s",strtotime($assets_model->AuctionStart)+86400);
                }
                //echo basename($assets_model->AuthPic)."1111122". $assets_model->AuthPic;
                if(empty(I('post.cid'))){
                    $assets_model->CreateMember= session("user.MemberName");
                    $assets_model->memberid= session("user.MemberId");
                    $assets_model->CreateTime=date("Y-m-d H:i:s");
                    if(session("user.MemberType")==4){
                        $assets_model->AssetsStatue =2;
                    }
                    $result=$assets_model->add();
                    if($result){

                        if(session("user.MemberType")==4){
                            $this->redirect("Web/Index/mic",array('AssetsIDrent'=>$result));
                        }else{
                            $this->userorder($result,"assetsrent");
                        }

                    }

                }else{
                    $assets_model->ModUser=session("user.MemberName");
                    $assets_model->memberid= session("user.MemberId");
                    $assets_model->ModTime=date("Y-m-d H:i:s");
                    $result=$assets_model->save();
                }
                if($result){
                    $this->redirect("User/index/index");
                    //$this->success("提交成功",U('Web/Index/debt'));
                }else{
                    $this->error($assets_model->getError());
                }

                //echo $assets_model->getLastSql();
            }else{
                $this->error($assets_model->getError());
            }
        }

    }
    public function domic(){
        if(IF_POST){
            $model = new Model();
            $model->startTrans();
            $result = null;
            $ultdili  = array(
                array('AssetsID','require','请填写：资产id',1),
                array('AssetsDesc','require','请填写：资产情况介绍',1),
                array('ReportDesc','require','请填写：尽调报告介绍',1),
            );
            $ultpro   =array(
                array('AssetsID','require','请填写：资产ID',1),
                array('SubName','require','请填写：项目名称',1),
                array('SubDesc','require','请填写：项目描述',1),
                array('JDUrl','require','请填写：下载地址',1),
                array('ViewPrice','require','请填写：查看尽调报告费用',1),
                array('BuyPrice','require','请填写：买断尽调报告费用',1),
            );
            $map['AssetsID']=I("request.AssetsID");
            $map['Usestat'] =1;
            $res = $model->table("tb_assetsduedili_rent")->where($map)->find();
            if($model->table("tb_assetsduedili_rent")->validate($ultdili)->create()){
                $model->table("tb_assetsduedili_rent")->Images = basename($model->Images[0])."@".basename($model->Images[1])."@".basename($model->Images[2]);
                $model->table("tb_assetsduedili_rent")->DueCreateMember = session("user.MemberId");
                $model->table("tb_assetsduedili_rent")->DueCreateTime =date("Y-m-d H:i:s");
                $model->table("tb_assetsduedili_rent")->DescPdf =explode("?",basename($model->table("tb_assetsduedili_rent")->DescPdf))[0];
                if(!empty($res)){
                    $result =  $model->table("tb_assetsduedili_rent")->where($map)->save();
                }else{
                    $result =  $model->table("tb_assetsduedili_rent")->add();
                }


                if($result){
                    if($model->table("tb_assetsproject_rent")->validate($ultpro)->create()){
                        $model->table("tb_assetsproject_rent")->KXUrl= explode("?",basename($model->table("tb_assetsproject_rent")->JDUrl))[0];
                        $model->table("tb_assetsproject_rent")->JDUrl= "JDUrl";
                        if(!empty($res)){
                            unset($map['Usestat']);
                            $result= $model->table("tb_assetsproject_rent")->where($map)->save();
                        }else{
                            $result= $model->table("tb_assetsproject_rent")->add();
                        }

                        if($result){
                            $AssetsID['AssetsID'] = $map['AssetsID'];
                            $AssetsStatue['AssetsStatue'] = 3;
                            $AssetsStatue['titimg'] = basename(I("request.titimg"));
                            M("assets_rent")->where($AssetsID)->setField($AssetsStatue);
                            $model->commit();
                           $this->success("发布成功",U("User/Member/index"));
                        }else{
                            $model->rollback();
                            $this->error("跟新失败");
                        }
                      //  print_r($model->table("tb_assetsproject")->create());
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