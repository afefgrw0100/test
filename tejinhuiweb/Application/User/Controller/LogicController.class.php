<?php
namespace User\Controller;
use Common\Controller\LogicbaseController;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/25
 * Time: 16:12
 * 处理所有的业务逻辑
 */
class LogicController extends LogicbaseController{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
       // sendTemplateSMS_toadd("18608409053",array("11111"),153892);
        echo 111;
    }
    //修改用户基本信息
    public function savemember(){
        if(IF_POST){
            if(I("post.CellPhone")!= session("user.CellPhone")){
                if(!func_compare_mobile(I('post.verifi'),I("post.CellPhone"))){
                    $this->error("验证码错误");
                }
            }

            $rult = array(
                array("RealName",'require','请填写：姓名',1),
                array("CellPhone",'/^1(3|4|5|7|8)\d{9}$/','请填写：手机',1),
                array("Province",'require','请填写：省份',1),
                array("City",'require','请填写：城市',1),
                array("Street",'require','请填写：街道',1),
                array("memo",'require','请填写：状态描述',0),
                array("intImg",'require','请上传形象图片',0),
            );
            $user_model = M("memberprofile");
            M()->startTrans();
            $info = session('user');
            $map['MemberID']=$info['MemberId'];

            //第一次完善资料免费赠送
            $free_one = $user_model->field("MemberID,RealName")->where($map)->find();
            if($free_one['RealName']==null){
                //免费赠送阅读次数
//                 $free_map['CodeGroup'] =10130;
//                 $free_count = M()->table("sys_code")->field("CodeID,CodeGroup,CodeName,CodeValue")->where($free_map)->find();
//                 $posint['freeCount'] = $free_count['CodeValue'];
//                $free_where['MemberId'] = $info['MemberId'];
//                M("memberaccount")->where($free_where)->save($posint);
                //赠送余额
                 $free_map['CodeName'] ="freeUserCount";
                 $free_count = M()->table("sys_code")->field("CodeID,CodeGroup,CodeName,CodeValue")->where($free_map)->find();

                 $free_where['MemberId'] = $info['MemberId'];
                M()->startTrans();
                 M("memberaccount")->where($free_where)->setInc("Balance",$free_count['CodeValue']);

                $cdata['SN'] = date("YmdHis").func_getRandString(4);
                $cdata['MemberId'] = $info['MemberId'];
                $cdata['PreIntegral'] = 0;
                $cdata['NxtIntegral'] = $free_count['CodeValue'];
                $cdata['OffSetValue'] = $free_count['CodeValue'];
                $cdata['Remark'] = "赠送余额";
                $cdata['CreateTime'] = date("Y-m-d H:i:s",strtotime(date("Y-m-d").' -8 day'));
                $cdata['CreateUser'] = $info['MemberId'];
                M("memberblancellog")->add($cdata);
                M()->commit();
            }

            if($user_model->validate($rult)->create()){
                $user_model->intImg = basename( $user_model->intImg);

//                //修改推荐人
//                $MemberId['MemberName'] = I("request.RecommendMember");
//                $rsss = M("member")->field("MemberId,MemberName")->where($MemberId)->find();
//                if(!empty($rsss)){
//                    $RecommendMember['RecommendMember'] =$rsss['MemberId'] ;
//                    $maps['MemberId']=$info['MemberId'];
//                    $result = M("member")->where($maps)->save($RecommendMember);
//                }
                $result = $user_model->where($map)->save();
                if($result){
                    M()->commit();
                    $data = $user_model->where($map)->find();
                    $info = array_merge($info,$data);
                    session("user",$info);
                    $this->success("修改成功",U("User/Common/memberindex"));
                }else{
                    M()->rollback();
                    $this->error("修改失败");

                }
                //print_r($user_model->create());
            }else{
                $this->error($user_model->getError());
            }
        }
    }

    //提交投诉建议
    public function dosuggesstion(){
        if(IS_POST){
            $rult = array(
                array("Title",'require','请填写：标题',1),
                array("Content",'require','请填写：内容',1),
            );
            $model_suf = M("suggession");
            if($model_suf->validate($rult)->create()){
                $model_suf->SendMember = session("user.MemberId");
                $model_suf->CreateTime = date("Y-m-d H:i:s");
                $result= $model_suf->add();
                if($result){
                    $this->success("投诉成功",U("User/Common/suggesstion"));
                }else{
                    $this->error("投诉失败");

                }
            }else{
                $this->error($model_suf->getError());
            }
        }
    }
    //public撤回投诉
    public function revoke(){
        $model_suf = M("suggession");
        $map['SuggID'] = I("get.sugid");
        $res = $model_suf->where($map)->find();
        //print_r($res);
        if($res['SendMember'] ==session("user.MemberId")){
            $data['Status']= 2;
            $result = $model_suf->where($map)->setField($data);
            if($result){
                $this->success("撤回成功",U("User/Common/suggesstion"));
            }else{
                $this->error("撤回失败");

            }
        }
    }
    //经济人接单
    public function todocomit(){
        $AssetsID = I('get.AssetsID');
        $AssetsIDrent = I('get.AssetsIDrent');
        $PackageID = I('get.PackageID');
        $DebtID = I('get.DebtID');
        $type = I("get.type");
        //经济人电话
        $mobile =null;
        //发布信息
        $InfoNo = null;
        //产品id
        $ProductID = null;
        $map['DueDiligenceMember']=session("user.MemberId");
        $map['Usestat']=1;
        $res=null;$result=null;$data=null;$table=null;$inforesmap=null;
        $data['OptType'] = 1;
        $msg="接收成功";
        if(!empty($type)&&$type =="cancel"){
           $data['OptType'] = 2;
            $msg="取消订单";
        }
        if(!empty($AssetsID)){
            $map['AssetsID']=$AssetsID;
            $data['AssetsID'] = $AssetsID;
            $table ="assetsacceptinfo";
            $res= M("assets")
                ->field("AssetsID,tb_memberprofile.CellPhone,tb_memberprofile.MemberID")
                ->join("tb_memberprofile ON tb_memberprofile.MemberID = tb_assets.memberid")->where($map)->find();

            $mobile =   M("assets")
                ->field("tb_memberprofile.CellPhone,tb_memberprofile.MemberID")
                ->join("tb_memberprofile ON tb_memberprofile.MemberID = tb_assets.DueDiligenceMember")
                ->where($map)->find();
            $inforesmap['AssetsID'] =$AssetsID;

            //发布信息
            $InfoNo = $AssetsID;
            //产品id
            $ProductID = 1;
            //sendTemplateSMS_toadd("13142240057",array("123456","13111111111"),145983);
            //exit;

        }elseif(!empty($AssetsIDrent)){
            $map['AssetsID']=$AssetsIDrent;
            $data['AssetsID'] = $AssetsIDrent;
            $table ="assetsacceptinfo_rent";
            $res= M("assets_rent")
                ->field("AssetsID,tb_memberprofile.CellPhone,tb_memberprofile.MemberID")
                ->join("tb_memberprofile ON tb_memberprofile.MemberID = tb_assets_rent.memberid")->where($map)->find();

            $mobile =   M("assets_rent")
                ->field("tb_memberprofile.CellPhone,tb_memberprofile.MemberID")
                ->join("tb_memberprofile ON tb_memberprofile.MemberID = tb_assets_rent.DueDiligenceMember")
                ->where($map)->find();
            $inforesmap['AssetsID'] =$AssetsIDrent;

            //发布信息
            $InfoNo = $AssetsIDrent;
            //产品id
            $ProductID = 1;
            //sendTemplateSMS_toadd("13142240057",array("123456","13111111111"),145983);
            //exit;

        }elseif(!empty($PackageID)){
            $map['PackageID']=$PackageID;
            $data['PackageID'] = $PackageID;
            $table ="packageacceptinfo";
            $res= M("package")
                ->field("PackageID,tb_memberprofile.CellPhone,tb_memberprofile.MemberID")
                ->join("tb_memberprofile ON tb_memberprofile.MemberID = tb_package.memberid")->where($map)->find();

            $mobile =   M("package")
                ->field("tb_memberprofile.CellPhone,tb_memberprofile.MemberID")
                ->join("tb_memberprofile ON tb_memberprofile.MemberID = tb_package.DueDiligenceMember")
                ->where($map)->find();
            $inforesmap['PackageID'] =$PackageID;

            //发布信息
            $InfoNo = $PackageID;
            //产品id
            $ProductID = 3;

        }elseif(!empty($DebtID)){
            $map['DebtID']=$DebtID;
            $data['DebtID'] = $DebtID;
            $table ="debtacceptinfo";
            $res= M("debt")
                ->field("DebtID,tb_memberprofile.CellPhone,tb_memberprofile.MemberID")
                ->join("tb_memberprofile ON tb_memberprofile.MemberID = tb_debt.memberid")->where($map)->find();

            $mobile =   M("debt")
                ->field("tb_memberprofile.CellPhone,tb_memberprofile.MemberID")
                ->join("tb_memberprofile ON tb_memberprofile.MemberID = tb_debt.DueDiligenceMember")
                ->where($map)->find();
            $inforesmap['DebtID'] =$DebtID;
            //发布信息
            $InfoNo = $DebtID;
            //产品id
            $ProductID = 2;

        }

        $infores =M($table)->where($inforesmap)->find();


        //查询订单
        $map_order['OrderStatue'] =2;
        $map_order['CreateUser'] = $res['MemberID'];
        $map_order['InfoNo'] = $InfoNo;
        $map_order['ProductID'] = $ProductID;
        $map_order['Type'] =1;
        $order = M("order")->field("id,sn")->where($map_order)->find();
//        $r=sendTemplateSMS_toadd("18274965665",array($order['sn'],$mobile['CellPhone']),145982);
//        print_r($r);exit;
        if($res){

            $data['MemberID'] = session("user.MemberId");
            $data['OptTime'] = date("Y-m-d H:i:s");
            M()->startTrans();
            if(M($table)->create($data)){
                if($infores){
                    $ss['ID'] = $infores['ID'];
                    $result= M($table)->where($ss)->save();
                    //DueDiligenceMember撤销订单经济人
                    if(!empty($type)&&$type =="cancel"){
                        $DueDiligenceMember['DueDiligenceMember'] = 0;

                    }else{
                        $DueDiligenceMember['AssetsStatue'] = 2;
                    }
                    if(!empty($AssetsID)){
                        $DueDiligenceMember['AssetsID'] = $AssetsID;
                        $result= M("assets")->where($map)->save($DueDiligenceMember);
                    }elseif(!empty($AssetsIDrent)){
                        $DueDiligenceMember['AssetsID'] = $AssetsIDrent;
                        $result= M("assets_rent")->where($map)->save($DueDiligenceMember);
                    }elseif(!empty($PackageID)){
                        $DueDiligenceMember['PackageID']=$PackageID;
                        $result=M("package")->where($map)->save($DueDiligenceMember);
                    }elseif(!empty($DebtID)){
                        $DueDiligenceMember['DebtID']=$DebtID;
                        $result=M("debt")->where($map)->save($DueDiligenceMember);
                    }

                }else{
                    $result= M($table)->add();
                    if(!empty($type)&&$type =="cancel"){
                        $DueDiligenceMember['DueDiligenceMember'] = 0;

                    }else{
                        $DueDiligenceMember['AssetsStatue'] = 2;
                    }
                    //DueDiligenceMember撤销订单经济人
                   // $DueDiligenceMember['AssetsStatue'] = 2;

                    if(!empty($AssetsID)){
                        $DueDiligenceMember['AssetsID'] = $AssetsID;
                        $result= M("assets")->where($map)->save($DueDiligenceMember);
                    }elseif(!empty($AssetsIDrent)){
                        $DueDiligenceMember['AssetsID'] = $AssetsIDrent;
                        $result= M("assets_rent")->where($map)->save($DueDiligenceMember);
                    }elseif(!empty($PackageID)){
                        $DueDiligenceMember['PackageID']=$PackageID;
                        $result=M("package")->where($map)->save($DueDiligenceMember);
                    }elseif(!empty($DebtID)){
                        $DueDiligenceMember['DebtID']=$DebtID;
                        $result=M("debt")->where($map)->save($DueDiligenceMember);
                    }

                }
                if($result){

                    if(!empty($type)&&$type =="cancel"){
                        sendTemplateSMS_toadd($res['CellPhone'],array($order['sn']),145983);
                    }else{
                        sendTemplateSMS_toadd($res['CellPhone'],array($order['sn'],$mobile['CellPhone']),145982);
                    }
                    M()->commit();
                    $this->success($msg);
                }else{
                    M()->rollback();
                    $this->error("illegal parameter！！");
                }

            }else{
                $this->error(M($table)->getError());
            }
        }else{
            $this->error("illegal parameter！！");
        }

    }
    //购买尽掉报告付款
    public function buymic(){
//        session('login_http_referer',null);
//        session('login_http_member',null);
        $type = I('request.type');
        $buyid = I('request.buyid');
        $ismain = I('request.ismian');
        $info = null;$ProductID=null;
        $ProductName = "";
        switch($type){
            case "debt":
                $asset_model = M('debtproject');
                $map['DebtID'] =$buyid;
                $ProductID =6;
                $ProductName = "债权购买";
                $info = $asset_model->where($map)->find();

                //echo "debt" ;exit;
                break;
            case "package";
                $asset_model = M('packageproject');
                $map['PackageID'] =$buyid;
                $map['Ismain'] =$ismain;
                if($map['Ismain'] == 0){
                    $map['SubID'] = I("request.SubID");
                    $downurl = down_url("package", $buyid,session("user.MemberId"));
                    if($downurl!=88){
                        $this->error("请购买主包后在购买");
                    }
                }
                $ProductID =4;
                $ProductName = "资产包购买";
                $info = $asset_model->where($map)->find();
                //echo "package" ;exit;
                break;
            case "assets":
                $asset_model = M('assetsproject');
                $map['tb_assetsproject.AssetsID'] =$buyid;
                $ProductID =5;
                $ProductName = "实物资产购买";
                $info = $asset_model->field("SubID,tb_assetsproject.AssetsID,SubName,SubDesc,ViewPrice,BuyPrice,Source")
                    ->join("tb_assets ON tb_assetsproject.AssetsID=tb_assets.AssetsID")->where($map)->find();
                if($info['Source']==1){
                    $ProductName = "拍卖";
                }elseif($info['Source']==6){
                    $ProductName = "出租";
                }else{
                    $ProductName = "转让";
                }

                break;
            case "assetsrent":
                $asset_model = M('assetsproject_rent');
                $map['tb_assetsproject_rent.AssetsID'] =$buyid;
                $ProductID =5;
                $ProductName = "实物资产购买";
                $info = $asset_model->field("SubID,tb_assetsproject_rent.AssetsID,SubName,SubDesc,ViewPrice,BuyPrice,Source")
                    ->join("tb_assets_rent ON tb_assetsproject_rent.AssetsID=tb_assets_rent.AssetsID")->where($map)->find();
                if($info['Source']==1){
                    $ProductName = "拍卖";
                }elseif($info['Source']==6){
                    $ProductName = "出租";
                }else{
                    $ProductName = "转让";
                }

                break;
            case "assetsrent":
                $asset_model = M('assetsproject_rent');
                $map['tb_assetsproject_rent.AssetsID'] =$buyid;
                $ProductID =13;
                $ProductName = "实物资产购买";
                $info = $asset_model->field("SubID,tb_assetsproject_rent.AssetsID,SubName,SubDesc,ViewPrice,BuyPrice,Source")
                    ->join("tb_assets ON tb_assetsproject_rent.AssetsID=tb_assets_rent.AssetsID")->where($map)->find();
                if($info['Source']==1){
                    $ProductName = "拍卖";
                }elseif($info['Source']==6){
                    $ProductName = "出租";
                }else{
                    $ProductName = "转让";
                }

                break;
            default;
                $this->error("illegal parameter！！");
        }
        $CodeGroup['CodeGroup'] =10110;
         $codeval =    M()->table("sys_code")->where($CodeGroup)->find();
        $CodeGroup['CodeGroup'] =10108;
        $orging =    M()->table("sys_code")->where($CodeGroup)->find();

        if(!empty($info)){
          // print_r($info);exit;
            $ordermap['OrderStatue'] = array("between",'1,2');
            $ordermap['Type'] =2;
            $ordermap['ProductID'] =  $ProductID;
            $ordermap['InfoNo'] =  $info['SubID'];
            $ordermap['CreateUser'] =session("user.MemberId");
            $order = M("order");

            $res = $order->where($ordermap)->find();


            //业务宗号
            $data['sn'] = date("YmdHis").func_getRandString(4);
            //产品ID
            $data['ProductID'] = $ProductID;
            //产品名称
            $data['ProductName'] = $ProductName;
            //产品描述
            $data['ProductDesc'] =  $info['SubName'];
            //订单类型
            $data['Type'] =2;
            //成交价
            $data['OrgPrice']=$info['ViewPrice'];
            $data['DealPrice'] = $info['ViewPrice']*$codeval['CodeValue'];
            $data['OrgInt']= $info['ViewPrice']*$orging['CodeValue'];
            $data['DealInt']= $info['ViewPrice']*$orging['CodeValue']*$codeval['CodeValue'];
            //对应发布信息编号
            $data['InfoNo']= $info['SubID'];
            //创建人
            $data['CreateUser'] = session("user.MemberId");
            $data['CreateTime'] = date("Y-m-d H:i:s");
           // print_r($res); echo 111;exit;
            if($order->create($data)){
                if(empty($res)){

                    $result = $order->add();
                    if($result){
                        $bas = authcode($result,"ENCODE");
                        $type = authcode($type,"ENCODE");
                        $codetype = authcode('2',"ENCODE");
                        $this->redirect("/User/Payment/index",array('codekey'=>$bas,'type'=>$type,'codetype'=>$codetype));
                    }else{
                        $this->error($order->getError());
                    }
                }else{
                    if($res['OrderStatue']==1){
                        $result = $order->where($ordermap)->save();
                    }elseif($res['OrderStatue']==2){
                        $this->error("你已购买此商品，无需重复购买。");
                    }

                    if($result){
                        $bas = authcode($res['id'],"ENCODE");
                        $type = authcode($type,"ENCODE");
                        $codetype = authcode('2',"ENCODE");
                        $this->redirect("/User/Payment/index",array('codekey'=>$bas,'type'=>$type,'codetype'=>$codetype));
                    }else{
                        $this->error($order->getError());
                    }
                }

            }else{
                $this->error($order->getError());
            }

        }else{

            $this->error("没找到你需要的商品");
        }
    }
    //经纪人付款
    public function ecopay(){
        $memberprofile = M("memberprofile");
        $map['MemberID'] = session("user.MemberId");
        $info = $memberprofile->where($map)->find();
        $IdentityType = $info['IdentityType'];
        $IdentityImg = $info['IdentityImg'];
        $result = null;$res=null;
        if(!empty($IdentityType)&&!empty($IdentityImg)){
            $order = M('order');

            $product = M("product");
            $productmap['ProductId'] = 7;
            $productmap['syatus'] = 1;
            $res_product= $product ->where($productmap)->find();
            $CodeGroup['CodeGroup'] = 10108;
            $sys_code = M()->table("sys_code")->field("CodeID,CodeValue")->where($CodeGroup)->find();
            if($res_product){
                $ordermap['ProductID'] =  $res_product['ProductId'];
                $ordermap['Type'] = 3;
                $ordermap['OrderStatue'] = 1;
                $ordermap['CreateUser']=session("user.MemberId");
                $ordermap_res = $order->where($ordermap)->find();

                //业务宗号
                $data['sn'] = date("YmdHis").func_getRandString(4);
                //产品ID
                $data['ProductID'] = $res_product['ProductId'];
                //产品名称
                $data['ProductName'] = $res_product['ProductName'];
                //产品描述
                $data['ProductDesc'] = $res_product['Desc'];
                //订单类型
                $data['Type'] =3;
                //成交价
                $data['OrgPrice']=$res_product['Price'];
                $data['DealPrice'] =empty($res_product['SalePrice'])?$res_product['Price']:$res_product['SalePrice'];
                $data['OrgInt']=$res_product['Price']*$sys_code['CodeValue'];
                $data['DealInt']=empty($res_product['SalePrice'])?$res_product['Price']*$sys_code['CodeValue']:$res_product['SalePrice']*$sys_code['CodeValue'];
                //对应发布信息编号
                $data['InfoNo']= session("user.MemberId");
                //创建人
                $data['CreateUser'] = session("user.MemberId");
                $data['CreateTime'] = date("Y-m-d H:i:s");

                if($order->create($data)){
                    if(empty($ordermap_res)){
                        $result= $order->add();
                        $res['id'] = $result;
                    }else{
                        $result=$order->where($ordermap)->save();
                        $res['id'] =$ordermap_res['id'];
                    }
                    if($result){
                        $bas = authcode($res['id'],"ENCODE");
                        $type = authcode("ecopay","ENCODE");
                        $codetype = authcode('3',"ENCODE");
                        $this->redirect("User/Payment/index",array('codekey'=>$bas,'type'=>$type,'codetype'=>$codetype));
                    }
                }else{
                    $this->error($order->getError());
                }


            }

        }else{
            $this->error();
        }
    }
    //订单取消
    public function offorder(){
        $oreder = I('request.codekey');
        $map['id'] = authcode($oreder);
        $map['OrderStatue'] = 1;
        $map['CreateUser'] = session("user.MemberId");
        $order = M("order");
        $info = $order->where($map)->find();
        //print_r($map);
        if(!empty($info)){
            $data['OrderStatue'] =11;
            $result = $order->where($map)->setField($data);
            if($result){
                $this->success("订单已取消");
            }
        }
    }
    //充值
    public function dorech(){
        if(IS_POST){
            $Balance = I('request.Balance');
            //业务宗号
            $data['sn'] = date("YmdHis").func_getRandString(4);
            //产品ID
            $data['ProductID'] = 0;
            //产品名称
            $data['ProductName'] ="充值";
            //产品描述
            $data['ProductDesc'] ="充值";
            //订单类型
            $data['Type'] =4;
            //成交价
            $data['OrgPrice']=$Balance;
            $data['DealPrice'] =$Balance;

            //对应发布信息编号
            $data['InfoNo']= session("user.MemberId");
            //创建人
            $data['CreateUser'] = session("user.MemberId");
            $data['CreateTime'] = date("Y-m-d H:i:s");

            $map['Type'] =4;
            $map['CreateUser'] =session("user.MemberId");
            $map['OrderStatue'] = 1;
            $order_model = M("order");
            $res = $order_model->where($map)->find();
            $result = null;
            if($order_model->create($data)){
                if(empty($res)){
                    $result = $order_model->add();
                    $res['id'] = $result;
                }else{
                    $result = $order_model->where($map)->save();
                }
               if($result){
                   $bas = authcode($res['id'],"ENCODE");
                   $type = authcode("rech","ENCODE");
                   $codetype = authcode('4',"ENCODE");
                   $this->redirect("User/Payment/index",array('codekey'=>$bas,'type'=>$type,'codetype'=>$codetype));
               }
            }else{
                $this->error($order_model->getError());
            }
        }
    }
    //提现
    public function dowith(){
        if(IS_POST){
            $drawrequest = M("drawrequest");
            $drawquantity = I("request.drawquantity");
           $ruts = array(
               array('drawquantity','/^[0-9]+([.]{1}[0-9]+){0,1}$/','请填写：金额',1),
           );
            $map['memberid'] = session("user.MemberId");
            $map['status'] =1;
            $res = $drawrequest->where($map)->find();

            //获取用户账户信息
            $user['MemberId'] =  $map['memberid'];
            $freez_res = M("memberaccount")->field("MemberId,FreezeAmount,IsFreeZe")->where($user)->find();
            if($freez_res['IsFreeZe']==0){
                $this->error("提现功能被禁用，请联系客服。");
            }
            if($drawrequest->validate($ruts)->create()){
                $result = null;
                $CodeGroup['CodeGroup'] = 10120;
                $code = M()->table("sys_code")->where($CodeGroup)->find();

                if($drawrequest->drawquantity<$code['CodeValue']||$drawrequest->drawquantity>yue()){
                    $this->error("提现金额未达标准");
                }
                //开始事件
                M()->startTrans();
                //写入提现记录
                $drawrequest->memberid = $map['memberid'];
                $drawrequest->createtime = date("Y-m-d H:i:s");
                $drawrequest->drawplatform = 2;
                $drawrequest->SN = date("YmdHis").func_getRandString(4);
                $drawrequest->status = 1;
                if(empty($res)){
                    $result= $drawrequest->add();
                }else{
                    $this->error("你已经提交申请");
                }
                //写入冻结记录

                //流水号,系统生成，格式年月日时分秒+4位随机数',
                $freeze_data['SN'] = date("YmdHis").func_getRandString(4);
                //用户ID
                $freeze_data['MemberId'] =  $map['memberid'];
                //变动前
                $freeze_data['PreIntegral'] = $freez_res['FreezeAmount'];
                //变动后
                $freeze_data['NxtIntegral'] = $freez_res['FreezeAmount']+$drawquantity;
                //变动值
                $freeze_data['OffSetValue'] =$drawquantity ;
                //备注
                $freeze_data['Remark'] = '提现冻结金额';
                //添加时间
                $freeze_data['CreateTime'] = date("Y-m-d H:i:s");
                //添加人
                $freeze_data['CreateUser'] =$map['memberid'] ;

                if($result){
                    $result = M("memberfreezelog")->add($freeze_data);
                    if($result){
                        $user['MemberId'] =  $map['memberid'];
                        M("memberaccount")->where($user)->setInc('FreezeAmount',$drawquantity);
                        M()->commit();
                        $this->success("提交申请成功",U('Common/drawmgt'));
                    }else{
                        M()->rollback();
                        $this->error("写入日志错误");
                    }
                }else{
                    $this->error("提现失败");
                }

            }else{
                $this->error($drawrequest->getError());
            }
        }
    }

    public function outwith(){
        $map['ID'] =authcode(I("request.withid")) ;
        $map['memberid'] = session("user.MemberId");
        $map['status'] =1;
        $data['status'] = 4;
        $res = M("drawrequest")->where($map)->find();
        if(!empty($res)){
            M()->startTrans();
            $result = M("drawrequest")->where($map)->save($data);
            if(!empty($result)){
                $FreezeAmount = $res['drawquantity'];
                $map_count['MemberId'] = $map['memberid'];
                $result =  M("memberaccount")->where($map_count)->setDec("FreezeAmount",$FreezeAmount);
                if($result){
                    M()->commit();
                    if(is_mobile()){
                      $this->redirect("Common/drawmgt");
                        exit;
                    }
                    $this->success("撤销申请成功",U('Common/drawmgt'));

                }else{
                    M()->rollback();
                    $this->error("撤销失败");
                }
            }

        }else{
            $this->error("撤销失败");
        }
    }

    //下载尽调
    public function downFile(){
        session('login_http_referer',null);
        session('login_http_member',null);
        $type = I("request.type");
        $buyid=I("request.buyid");
        $path = "";
        $DueDiligenceMember = session("user.MemberId");
        switch($type){
            case 'assets':

                $due_map['tb_assets.AssetsID'] =$buyid;
                $due_map['tb_assets.DueDiligenceMember'] = $DueDiligenceMember;
              //  $due_map['tb_assets.Usestat'] = 1;

                $info = M("assets")
                    ->field("tb_assets.AssetsID,tb_assets.DueDiligenceMember,tb_assetsproject.SubID,tb_assetsproject.JDUrl")
                    ->join("tb_assetsproject ON tb_assets.AssetsID = tb_assetsproject.AssetsID")
                    ->order("tb_assetsproject.SubID DESC")
                    ->where($due_map)->find();
                //echo M()->getLastSql();exit;
                $info_duedili = $info;
                //print_r($due_map);exit;
                if(empty($info)){

                    $map['tb_order.Type'] =2;
                    $map['tb_order.ProductID'] =5;
                    $map['tb_order.OrderStatue'] = array('in','2,12');

                    $map['tb_assetsproject.AssetsID'] =$buyid;
                    $map['tb_order.CreateUser'] =session("user.MemberId");

                    $info = M("assetsproject")
                        ->field("tb_assetsproject.SubID,tb_assetsproject.JDUrl,tb_order.id,tb_order.OrderStatue,tb_order.CreateTime")
                        ->join("tb_order ON tb_assetsproject.SubID=tb_order.InfoNo")
                        ->where($map)->find();

                }
                $path = Qiniu_Sign($info['JDUrl'],$etime = 86400,$type="zip");
                //print_r($info);exit;

                break;
            case 'assetsrent':

                $due_map['tb_assets_rent.AssetsID'] =$buyid;
                $due_map['tb_assets_rent.DueDiligenceMember'] = $DueDiligenceMember;
                //  $due_map['tb_assets.Usestat'] = 1;

                $info = M("assets_rent")
                    ->field("tb_assets_rent.AssetsID,tb_assets_rent.DueDiligenceMember,tb_assetsproject_rent.SubID,tb_assetsproject_rent.JDUrl")
                    ->join("tb_assetsproject_rent ON tb_assets_rent.AssetsID = tb_assetsproject_rent.AssetsID")
                    ->order("tb_assetsproject_rent.SubID DESC")
                    ->where($due_map)->find();
                //echo M()->getLastSql();exit;
                $info_duedili = $info;
                //print_r($due_map);exit;
                if(empty($info)){

                    $map['tb_order.Type'] =2;
                    $map['tb_order.ProductID'] =5;
                    $map['tb_order.OrderStatue'] = array('in','2,12');

                    $map['tb_assetsproject_rent.AssetsID'] =$buyid;
                    $map['tb_order.CreateUser'] =session("user.MemberId");

                    $info = M("assetsproject_rent")
                        ->field("tb_assetsproject_rent.SubID,tb_assetsproject_rent.JDUrl,tb_order.id,tb_order.OrderStatue,tb_order.CreateTime")
                        ->join("tb_order ON tb_assetsproject_rent.SubID=tb_order.InfoNo")
                        ->where($map)->find();

                }
                $path = Qiniu_Sign($info['JDUrl'],$etime = 86400,$type="zip");
                //print_r($info);exit;

                break;
            case 'debt':

                $due_map['tb_debt.DebtID'] =$buyid;
                $due_map['tb_debt.DueDiligenceMember'] = $DueDiligenceMember;
                $due_map['tb_debt.Usestat'] = 1;

                $info = M("debt")
                    ->field("tb_debt.DebtID,tb_debt.DueDiligenceMember,tb_debtproject.SubID,tb_debtproject.JDUrl")
                    ->join("tb_debtproject ON tb_debt.DebtID = tb_debtproject.DebtID")
                    ->order("tb_debtproject.SubID DESC")
                    ->where($due_map)->find();
                $info_duedili = $info;
               if(empty($info)){
                   $map['tb_order.Type'] =2;
                   $map['tb_order.ProductID'] =5;
                   $map['tb_order.OrderStatue'] =array('in','2,12');;
                   $map['tb_order.CreateUser'] =session("user.MemberId");

                   $map['tb_debtproject.DebtID'] =$buyid;
                   $info = M("debtproject")
                       ->field("tb_debtproject.SubID,tb_debtproject.JDUrl,tb_order.id,tb_order.OrderStatue,tb_order.CreateTime")
                       ->join("tb_order ON tb_debtproject.SubID=tb_order.InfoNo")

                       ->where($map)->find();
               }

                $path = Qiniu_Sign($info['JDUrl'],$etime = 86400,$type="zip");
                break;
            case 'package':

                $due_map['tb_package.PackageID'] =$buyid;
                $due_map['tb_package.DueDiligenceMember'] = $DueDiligenceMember;
                $due_map['tb_package.Usestat'] = 1;

                $info = M("package")
                    ->field("tb_package.PackageID,tb_package.DueDiligenceMember,tb_packageproject.SubID,tb_packageproject.JDUrl")
                    ->join("tb_packageproject ON tb_package.PackageID = tb_packageproject.PackageID")
                    ->order("tb_packageproject.SubID DESC")
                    ->where($due_map)->find();
                $info_duedili = $info;
                //print_r($info);exit;
                if(empty($info)){
                    $map['tb_order.Type'] =2;
                    $map['tb_order.ProductID'] =4;
                    $map['tb_order.OrderStatue'] =array('in','2,12');;
                    $map['tb_order.CreateUser'] =session("user.MemberId");

                    $map['tb_packageproject.PackageID'] =$buyid;
                    $map['tb_packageproject.Ismain'] =1;
                    $info = M("packageproject")
                        ->field("tb_packageproject.SubID,tb_packageproject.JDUrl,tb_order.id,tb_order.OrderStatue,tb_order.CreateTime")
                        ->join("tb_order ON tb_packageproject.SubID=tb_order.InfoNo")
                        ->where($map)->find();
                }

                $path = Qiniu_Sign($info['JDUrl'],$etime = 86400,$type="zip");
                break;
            case 'Ismain':


                $due_map['tb_package.DueDiligenceMember'] = $DueDiligenceMember;
                $due_map['tb_package.Usestat'] = 1;
                $due_map['tb_packageproject.SubID'] =$buyid;
                $due_map['tb_packageproject.Ismain'] =0;

                $info = M("packageproject")
                    ->field("tb_package.PackageID,tb_package.DueDiligenceMember,tb_packageproject.SubID,tb_packageproject.JDUrl")
                    ->join("tb_package ON tb_packageproject.PackageID = tb_package.PackageID")
                    ->order("tb_packageproject.SubID DESC")
                    ->where($due_map)->find();
                $info_duedili = $info;
               if(empty($info)){
                   $map['tb_order.Type'] =2;
                   $map['tb_order.ProductID'] =4;
                   $map['tb_order.OrderStatue'] =array('in','2,12');;
                   $map['tb_order.CreateUser'] =session("user.MemberId");

                   $map['tb_packageproject.SubID'] =$buyid;
                   $map['tb_packageproject.Ismain'] =0;
                   $info = M("packageproject")
                       ->field("tb_packageproject.SubID,tb_packageproject.JDUrl,tb_order.id,tb_order.OrderStatue,tb_order.CreateTime")
                       ->join("tb_order ON tb_packageproject.SubID=tb_order.InfoNo")
                       ->where($map)->find();
               }

                $path = Qiniu_Sign($info['JDUrl'],$etime = 86400,$type="zip");
                break;
        }


        if($info['OrderStatue']==12&&empty($info_duedili)){

            if(strtotime($info['CreateTime'])+3600>time()){
                return $path;
            }else{
                echo "没有你需要的资源1";
                //print_r($map);
                exit;
            }

        }

        if(empty($info)&&empty($info_duedili)){
            echo "没有你需要的资源";
            //print_r($map);
            exit;
        }

        if(!$path) header("Location: /");
        $viewfile = I("request.viewfile");
        if($viewfile == "viewfile"){
            //echo $path;exit;
            $path= urlencode($path);
            redirect(U("Home/Lists/pdfview",array('fileurl'=>$path)));
        }else{
            //echo $path;exit;
           // $path="http://ofomkeim9.bkt.clouddn.com/%E5%B0%86CAD%E5%9B%BE%E7%BA%B8%E8%BD%AC%E6%8D%A2%E6%88%90PDF%E6%96%87%E4%BB%B6%E7%9A%84%E7%AE%80%E6%98%93%E6%96%B9%E6%B3%95.pdf";
            $this->download($path);

        }

    }
    private  function download($file,$new_name=''){
        header('Location:'.$file);
        exit;
        //echo $file;exit;
//        header("Content-Type:application/x-msdownload");
//       // header('Content-type: application/pdf');
//        header('Content-Length:'.filesize($file));
//       // header('Location:'.$file);
//        header("Content-Disposition:attachment;filename=".explode("?",basename($file))[0]);
//        readfile($file);exit;
        //header("Content-Type:application/x-msdownload");
        header('Content-type: application/pdf');

// It will be called downloaded.pdf
        header('Content-Disposition: attachment; filename="downloaded.pdf"');
        readfile($file);
       //header('Location:'.$file);
        exit;

//        response.addHeader("Content-Disposition",
//            "attachment;filename=" + new String(fileName.getBytes("utf-8"), "ISO8859_1"));
//
//        // 设置返回的文件类型
//        response.addHeader("Content-Length", "" + file.length());
//
//        // 得到向客户端输出二进制数据的对象
//        OutputStream toClient = new BufferedOutputStream(response.getOutputStream());
//
//			response.setContentType("application/x-msdownload");


//        if(is_file($file)) {
//            header("Content-Type: application/force-download");
//            header("Content-Disposition: attachment; filename=".explode("?",basename($file))[0]);
//           // echo $file;exit;
//            readfile($file);
//            exit;
//        }else{
//            echo "文件不存在！";
//            exit;
//        }

        header("Content-Type:application/force-download");
        header("Content-Disposition:attachment;filename=".explode("?",basename($file))[0]);
        readfile($file);

    }
    //重新选择经济人
    public function dozzr(){
        session('login_http_referer',null);
        session('login_http_member',null);


        $dili_id['DueDiligenceMember']= I("request.agedili");
        $x_id = I("request.id");
        $type = I("request.type");

        $map['memberid'] = session("user.MemberId");
        $map['DueDiligenceMember'] = 0;
        $map['AssetsStatue'] =1;

        $res =null;
        switch($type){
            case "assets":
                $map['AssetsID'] = $x_id;
                $res = M("assets")->where($map)->save($dili_id);
                break;
            case "assetsrent":
                $map['AssetsID'] = $x_id;
                $res = M("assets_rent")->where($map)->save($dili_id);
                break;
            case "debt":
                $map['DebtID'] = $x_id;
                $res = M("debt")->where($map)->save($dili_id);
                break;
            case "package":
                $map['PackageID'] = $x_id;
                $res = M("package")->where($map)->save($dili_id);
                break;

        }


        if(empty($res)){
            $this->error("修改经纪人失败");
        }else{
            $this->success("修改成功",U("User/Member/index"));
        }

    }
    public function orderout(){
        session('login_http_referer',null);
        session('login_http_member',null);
        $oreder_code  = I("request.codekey");
        $oreder_code = authcode($oreder_code);

        $oreder_pid = I('request.pid');
        $oreder_pid = authcode($oreder_pid);

        $map['tb_order.id'] = $oreder_code;
        $map['tb_order.Type'] = 1;
        $map['tb_order.CreateUser'] = session("user.MemberId");
        $result = null;
        $order = M('order');
        switch($oreder_pid){
            //实物资产
            case 1:
                $map['tb_assets.AssetsStatue'] =array('between','0,1');

                $result=$order->field("tb_assets.AssetsID as oid,tb_order.id as pid")->join("tb_assets ON tb_order.InfoNo = tb_assets.AssetsID")->where($map)->find();
                if($result){

                    M()->startTrans();
                    $map01['id'] = $result['pid'];
                    $data01['OrderStatue'] = 3;


                    $res = M('order')->where($map01)->save($data01);
                   // echo $order->getLastSql();
                   // echo $res.'zz11111';
                    if($res){
                        $map01['AssetsID'] = $result['oid'];
                        $data02['AssetsStatue'] = 12;
                        $res = M("assets")->where($map01)->save($data02);
                        //echo $res.'zz2222';
                        if($res){
                           M()->commit();
                            $this->success("申请成功，请等待审核");
                        }else{
                           M()->rollback();
                            $this->error("申请失败");
                        }
                    }

                }else{
                    $this->error("已经开始尽调不能申请退款");
                }

               // var_dump($result);
                break;
            //实物资产
            case 13:
                $map['tb_assets_rent.AssetsStatue'] =array('between','0,1');

                $result=$order->field("tb_assets_rent.AssetsID as oid,tb_order.id as pid")->join("tb_assets_rent ON tb_order.InfoNo = tb_assets_rent.AssetsID")->where($map)->find();
                if($result){

                    M()->startTrans();
                    $map01['id'] = $result['pid'];
                    $data01['OrderStatue'] = 3;


                    $res = M('order')->where($map01)->save($data01);
                    // echo $order->getLastSql();
                    // echo $res.'zz11111';
                    if($res){
                        $map01['AssetsID'] = $result['oid'];
                        $data02['AssetsStatue'] = 12;
                        $res = M("assets")->where($map01)->save($data02);
                        //echo $res.'zz2222';
                        if($res){
                            M()->commit();
                            $this->success("申请成功，请等待审核");
                        }else{
                            M()->rollback();
                            $this->error("申请失败");
                        }
                    }

                }else{
                    $this->error("已经开始尽调不能申请退款");
                }

                // var_dump($result);
                break;
            //债权
            case 2;
                $map['tb_debt.AssetsStatue'] =array('between','0,1');

                $result=$order->field("tb_debt.DebtID as oid,tb_order.id as pid")->join("tb_debt ON tb_order.InfoNo = tb_debt.DebtID")->where($map)->find();
                if($result){

                    M()->startTrans();
                    $map01['id'] = $result['pid'];
                    $data01['OrderStatue'] = 3;


                    $res = M('order')->where($map01)->save($data01);
                    // echo $order->getLastSql();
                    // echo $res.'zz11111';
                    if($res){
                        $map01['DebtID'] = $result['oid'];
                        $data02['AssetsStatue'] = 12;
                        $res = M("debt")->where($map01)->save($data02);
                        //echo $res.'zz2222';
                        if($res){
                            M()->commit();
                            $this->success("申请成功，请等待审核");
                        }else{
                            M()->rollback();
                            $this->error("申请失败");
                        }
                    }

                }else{
                    $this->error("已经开始尽调不能申请退款");
                }
                break;

            //资产包
            case 3:
                $map['tb_package.AssetsStatue'] =array('between','0,1');

                $result=$order->field("tb_package.PackageID as oid,tb_order.id as pid")->join("tb_package ON tb_order.InfoNo = tb_package.PackageID")->where($map)->find();
                if($result){

                    M()->startTrans();
                    $map01['id'] = $result['pid'];
                    $data01['OrderStatue'] = 3;


                    $res = M('order')->where($map01)->save($data01);
                    // echo $order->getLastSql();
                    // echo $res.'zz11111';
                    if($res){
                        $map01['PackageID'] = $result['oid'];
                        $data02['AssetsStatue'] = 12;
                        $res = M("package")->where($map01)->save($data02);
                        //echo $res.'zz2222';
                        if($res){
                            M()->commit();
                            $this->success("申请成功，请等待审核");
                        }else{
                            M()->rollback();
                            $this->error("申请失败");
                        }
                    }

                }else{
                    $this->error("已经开始尽调不能申请退款");
                }
                break;
            default;
                $this->error("非法参数");
        }


//        echo $oreder_code;
//        echo $oreder_pid;
    }

    //经纪人考核提交
    public function dotar(){
        $arr = I('request.');
    }

}