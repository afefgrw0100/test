<?php
namespace Web\Controller;
use Common\Controller\MemberbaseController;
use Think\Model;
class PackagesController extends MemberbaseController {
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        echo "Cotroller:Packages";
        }
    //发布信息
    public function add_edit(){
        if(IS_POST){
            $result =$id = null;
            $pack_model = D('Packages');
            if($pack_model->create()){
                //取得文件上传名
                if( $pack_model->OwnerAdress[1]=='0'){
                    $this->error("请填写债务人所在地");
                }else{
                    $pack_model->Province = explode("|", $pack_model->OwnerAdress[0])[0];
                    $pack_model->City =explode("|", $pack_model->OwnerAdress[1])[0];
                    $pack_model->OwnerAdress = json_encode( $pack_model->OwnerAdress,JSON_UNESCAPED_UNICODE);
                }
                $pack_model->OrginPic= basename($pack_model->OrginPic);
                $pack_model->OwnerPic= basename($pack_model->OwnerPic);
                $pack_model->ProjectListPic= basename($pack_model->ProjectListPic);
                if(empty(I('post.cid'))){
                    $pack_model->CreateMember=session("user.MemberName");
                    $pack_model->memberid= session("user.MemberId");
                    $pack_model->CreateTime=date("Y-m-d H:i:s");
                    if(session("user.MemberType")==4){
                        $pack_model->AssetsStatue =2;
                    }
                    $result=$pack_model->add();
                    $id = $result;
                    if($result){
                        if(session("user.MemberType")==4){
                            $this->redirect("Web/Index/mic",array('PackageID'=>$result));
                        }else{
                            $this->userorder($result,"package");
                        }

                    }

                }else{
                    $pack_model->ModUser=session("user.MemberName");
                    $pack_model->memberid= session("user.MemberId");
                    $pack_model->ModTime=date("Y-m-d H:i:s");
                    $result = $pack_model->save();
                }
                if($result){
                    $this->redirect("User/Payment/index");
                }else{
                    $this->error($pack_model->getError());
                }
                //print_r($pack_model->create());
            }else{
                $this->error($pack_model->getError());
            }

        }
    }



    public function domic(){
        if(IF_POST){
            $model = new Model();
            $model->startTrans();
            $result = null;
            $ultdili  = array(
                array('PackageID','require','请填写：资产id',1),
                array('PackageDesc','require','请填写：资产情况介绍',1),
                array('ReportDesc','require','请填写：尽调报告介绍',1),
            );
            $ultpro   =array(
                array('PackageID','require','请填写：资产ID',1),
                array('SubName','require','请填写：项目名称',1),
                array('SubDesc','require','请填写：项目描述',1),
                array('JDUrl','require','请填写：下载地址',1),
                array('ViewPrice','require','请填写：查看尽调报告费用',1),
                array('BuyPrice','require','请填写：买断尽调报告费用',1),
               // array('Ismain','require','请填写：是否为主包的信息',1),
            );
            $map['PackageID']=I("request.PackageID");
            $map['Usestat'] =1;

            $SubName = I("request.SubName");
            $JDUrl = I("request.JDUrl");
            $ViewPrice = I("request.ViewPrice");
            $BuyPrice = I("request.BuyPrice");
            $SubDesc = I("request.SubDesc");

            if(in_array(null,$SubName)||in_array(null,$JDUrl)||in_array(null,$ViewPrice)||in_array(null,$BuyPrice)){
                $this->error("类容填写不完整");
            }

            $data_pro = array();
            $c_int = count($SubName);
            for($i=0;$i<$c_int;$i++){
                $data_pro[$i]['PackageID']=$map['PackageID'];
                $data_pro[$i]['SubName']=$SubName[$i];
                $data_pro[$i]['SubDesc']=$SubDesc;
                $data_pro[$i]['KXUrl']=explode("?",basename($JDUrl[$i]))[0];
                $data_pro[$i]['JDUrl']="JDUrl";
                $data_pro[$i]['ViewPrice']=$ViewPrice[$i];
                $data_pro[$i]['BuyPrice']=$BuyPrice[$i];
                $data_pro[$i]['Ismain'] = 0;
            }
            $data_pro[0]['Ismain'] = 1;
           // print_r($data_pro);exit;

            $res = $model->table("tb_packageduedili")->where($map)->find();
            if($model->table("tb_packageduedili")->validate($ultdili)->create()){
              //  print_r(I("post."));exit;
                $model->table("tb_packageduedili")->Images = basename($model->Images[0])."@".basename($model->Images[1])."@".basename($model->Images[2]);
                $model->table("tb_packageduedili")->AssetsDesc = basename($model->AssetsDesc[0])."@".basename($model->AssetsDesc[1])."@".basename($model->AssetsDesc[2]);
                $model->table("tb_packageduedili")->DueCreateMember = session("user.MemberId");
                $model->table("tb_packageduedili")->DueCreateTime =date("Y-m-d H:i:s");
                $model->table("tb_packageduedili")->DescPdf =explode("?",basename($model->table("tb_packageduedili")->DescPdf))[0];
                if(!empty($res)){
                    $result =  $model->table("tb_packageduedili")->where($map)->save();
                }else{
                    $result =  $model->table("tb_packageduedili")->add();
                }


                if($result){

//                    if($model->table("tb_packageproject")->validate($ultpro)->create()){
//                        $aa =$model->table("tb_packageproject")->JDUrl;
//                        $model->table("tb_packageproject")->JDUrl= explode("?",basename($aa))[0];

                        if(!empty($res)){
                            $this->error("你已经提交，不可更改");
//                            unset($map['Usestat']);
//                            $result= $model->table("tb_packageproject")->where($map)->save();
                        }else{
                            $result= $model->table("tb_packageproject")->addAll($data_pro);
                        }

                        if($result){
                            $PackageID['PackageID'] = $map['PackageID'];
                            $AssetsStatue['AssetsStatue'] = 3;
                            $AssetsStatue['titimg'] = basename(I("request.titimg"));
                            M("package")->where($PackageID)->setField($AssetsStatue);
                            $model->commit();
                            $this->success("发布成功",U("User/Member/index"));
                        }else{
                            $model->rollback();
                            $this->error("跟新失败");
                        }
                        //  print_r($model->table("tb_assetsproject")->create());
//                    }else{
//                        $this->error($model->getError());
//                    }
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