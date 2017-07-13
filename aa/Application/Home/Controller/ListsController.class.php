<?php
namespace Home\Controller;
use Common\Controller\HomebaseController;
use Vendor\Weixinpay;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/15
 * Time: 16:54
 */
class ListsController extends HomebaseController{
    public function __construct()
    {
        parent::__construct();
        redirect();
       // session("login_http_referer",get_url());
    }


    public function lists(){
        session("keyword.title",C('logotitle')[1].session("keyword.title"));
        //获取城市
        $provinceMap['Source'] =array("in","2,3,4,5,6");
        $provinceMap['AssetsStatue'] =array("in","4,8");
        $ProvinceIdInfo =M("assets")->field("DISTINCT Province")->where($provinceMap) ->select();
        $CityIdInfo =M("assets")->field("DISTINCT City")->where($provinceMap) ->select();
        $provinceMap['Source'] =6;
        $ProvinceRentIdInfo =M("assets")->field("DISTINCT Province")->where($provinceMap) ->select();
        $CityRentIdInfo =M("assets")->field("DISTINCT City")->where($provinceMap) ->select();
        $pid = null;
        $cid = null;
        foreach($ProvinceIdInfo as $key =>$val){
            $pid[] = $val['Province'];
        }
        foreach($CityIdInfo as $key =>$val){
            $cid[] = $val['City'];
        }
        foreach($ProvinceRentIdInfo as $key =>$val){
            $pid[] = $val['Province'];
        }
        foreach($CityRentIdInfo as $key =>$val){
            $cid[] = $val['City'];
        }
      //  print_r($ProvinceIdInfo);exit;
        $area = M("area");
        if(is_array($pid)){
            $areamap['id'] =array("in",$pid);
            $areainfo =  $area->field("id,name,pid")->where($areamap)->select();
        }
        if(is_array($cid)){
            $areacity['id'] = array("in",$cid);
            $areainfoc =  $area->field("id,name,pid")->where($areacity)->order('id ASC')->select();
        }

        //echo $area->getLastSql();
        // print_r($areainfoc);
        $areapc=array();
        foreach($areainfo as $k=>$v){
            foreach($areainfoc as $kv=>$vc){
                if($v['id'] == $vc['pid']){
                    $v['city'][] = $vc;
                }
            }
            $areapc[]=$v;
        }
        $this->assign("area",$areapc);
        //获取类型
        $FCodeGroup['CodeGroup'] = '10105';
        $messagetype =  M()->table("sys_code")->field("CodeID,CodeGroup,CodeName,CodeValue")->where($FCodeGroup)->select();
        $this->assign("messagetype",$messagetype);
        //热门城市

        $cpro=  M()->table("sys_area_recommend")->select();
        $this->assign("cpro",$cpro);

        $province =empty(I("request.province"))?"":I("request.province");
        $this->assign("provinec",$province);
        $City =empty(I("request.City"))?"":I("request.City");
        $this->assign("City",$City);

        //echo $Page->firstRow;
        //$list = $User->where('status=1')->order('create_time')->limit($Page->firstRow.','.$Page->listRows)->select();

        //$info = array_map_recursive($debtinfo,$assetinfo);
        //print_r($list);

        //

        if(is_mobile()){
            $typev = I("request.typev");
            $this->assign("typevs",$typev);
            $this->display("mobile@Index/search");
        }else{
            $this->display("Lists:lists");
        }


    }
    //获取免费阅读尽调

    public function freeread(){
        if(sp_is_user_login()){
            $user_map['MemberId']=session("user.MemberId");

            $freenum = M("memberaccount")->field("MemberId,freeCount")->where($user_map)->find();

                M()->startTrans();
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
                        $map['AssetsID'] =$buyid;
                        $ProductID =5;
                        $ProductName = "实物资产购买";
                        $info = $asset_model->where($map)->find();
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
                    $ordermap['OrderStatue'] =array('in','2,12');
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
                    //产品状态
                    $data['OrderStatue'] = 12;
                    //产品名称
                    $data['ProductName'] = $ProductName;
                    //产品描述
                    $data['ProductDesc'] =  $info['SubName'];
                    //订单类型
                    $data['Type'] =2;
                    //成交价
//                    $data['OrgPrice']=$info['ViewPrice'];
//                    $data['DealPrice'] = $info['ViewPrice']*$codeval['CodeValue'];
//                    $data['OrgInt']= $info['ViewPrice']*$orging['CodeValue'];
//                    $data['DealInt']= $info['ViewPrice']*$orging['CodeValue']*$codeval['CodeValue'];
                    $data['OrgPrice']=$info['ViewPrice'];
                    $data['DealPrice'] = 0;
                    $data['OrgInt']= $info['ViewPrice']*$orging['CodeValue'];
                    $data['DealInt']= 0;
                    //对应发布信息编号
                    $data['InfoNo']= $info['SubID'];
                    //创建人
                    $data['CreateUser'] = session("user.MemberId");
                    $data['CreateTime'] = date("Y-m-d H:i:s");
                    // print_r($res); echo 111;exit;
                    if(empty($freenum)||($freenum['freeCount']==0&&empty($res)||($freenum['freeCount']==0&&strtotime($res['CreateTime'])+3600<time()))){
                        $this->error("没有次数了");
                    }
                    if($order->create($data)){
                        if(empty($res)){

                            $result = $order->add();
                            if($result){
                                $bas = authcode($result,"ENCODE");
                                $type = authcode($type,"ENCODE");
                                $codetype = authcode('2',"ENCODE");

                                M("memberaccount")->where($user_map)->setDec("freeCount");
                                M()->commit();
                                $downurl = R("User/Logic/downFile");
                                if(is_mobile()){
                                    redirect(U('Home/Lists/readview',array('fileurl'=>urlencode($downurl))));
                                }
                                $freenum['freeCount'] = $freenum['freeCount'] -1;
                                $this->success($freenum,U('Home/Lists/readview',array('fileurl'=>urlencode($downurl))));
                                //$this->redirect("/User/Payment/index",array('codekey'=>$bas,'type'=>$type,'codetype'=>$codetype));
                            }else{
                                $this->error($order->getError());
                            }
                        }else{
                            if($res['OrderStatue']==12&&strtotime($res['CreateTime'])+3600<time()){
                                M("memberaccount")->where($user_map)->setDec("freeCount");
                                $result = $order->where($ordermap)->save();

                            }elseif($res['OrderStatue']==2){
                                $this->error("你已购买此商品，无需重复购买。");
                            }elseif($res['OrderStatue']==12&&strtotime($res['CreateTime'])+3600>time()){
                                $result=true;
                            }

                            if($result){
                                $bas = authcode($res['id'],"ENCODE");
                                $type = authcode($type,"ENCODE");
                                $codetype = authcode('2',"ENCODE");
                                M()->commit();
                                $downurl = R("User/Logic/downFile");
                                if(is_mobile()){
                                    redirect(U('Home/Lists/readview',array('fileurl'=>urlencode($downurl))));
                                }
                                $this->success($freenum,U('Home/Lists/readview',array('fileurl'=>urlencode($downurl))));
                               // $this->redirect("/User/Payment/index",array('codekey'=>$bas,'type'=>$type,'codetype'=>$codetype));
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


        }else{
            $this->error("请先登陆");
        }
    }
    public function mobilecity(){
        session("keyword.title",C('logotitle')[1].session("keyword.title"));
        //获取城市
        $provinceMap['Source'] =array("in","2,3,4,5,6");
        $provinceMap['AssetsStatue'] =array("in","4,8");
        $ProvinceIdInfo =M("assets")->field("DISTINCT Province")->where($provinceMap) ->select();
        $CityIdInfo =M("assets")->field("DISTINCT City")->where($provinceMap) ->select();
        $pid = null;
        $cid = null;
        foreach($ProvinceIdInfo as $key =>$val){
            $pid[] = $val['Province'];
        }
        foreach($CityIdInfo as $key =>$val){
            $cid[] = $val['City'];
        }
        //  print_r($ProvinceIdInfo);exit;
        $area = M("area");
        if(is_array($pid)){
            $areamap['id'] =array("in",$pid);
            $areainfo =  $area->field("id,name,pid")->where($areamap)->select();
        }
        if(is_array($cid)){
            $areacity['id'] = array("in",$cid);
            $areainfoc =  $area->field("id,name,pid")->where($areacity)->order('id ASC')->select();
        }
        // echo $area->getLastSql();
        // print_r($areainfoc);
        $areapc=array();
        foreach($areainfo as $k=>$v){
            foreach($areainfoc as $kv=>$vc){
                if($v['id'] == $vc['pid']){
                    $v['city'][] = $vc;
                }
            }
            $areapc[]=$v;
        }
        $this->assign("area",$areapc);


        //热门城市
        $cpro=  M()->table("sys_area_recommend")->select();
        $this->assign("cpro",$cpro);
        $this->display("mobile@Index/changeCity");
    }
    public function content(){
        session("login_http_referer",get_url());
        //$this->display("assetscontent");
        //$this->display("debtcontent");
        $tpl = null;

        //分享朋友圈签名
        Vendor('Jssdk.Jssweixin');
        //$jssdk = new jssdk(C("wxappid"), C("wxsecret"));
        $jssdk = new \Vendor\Jssdk\Jssweixin(C("wxappid"),C("wxsecret"));
        $signPackage = $jssdk->GetSignPackage();

        //print_r($signPackage);
        $this->assign("signPackage",$signPackage);
        $typepay = I("request.typepay");
        if(!empty(I('get.AssetsID'))){
            if(is_mobile()){
                $tpl= "mobileassets";
            }else{
                if($typepay=="ccc"){
                    $tpl= "publishAssetBuy";
                }else{
                    $tpl= "assetscontent";
                }

            }

            $this->assetcontent();

        }elseif(!empty(I('get.AssetsIDrent'))){
            if(is_mobile()){
                $tpl= "mobileassetsRent";
            }else{
                if($typepay=="ccc"){
                    $tpl= "publishAssetRentBuy";
                }else{
                    $tpl= "assetsRentcontent";
                }

            }

            $this->assetrentcontent();

        }elseif(!empty(I('get.PackageID'))){
            if(is_mobile()){
                $tpl= "mobilepack";
            }else{

                if($typepay=="ccc"){
                    $tpl= "publishPackBuy";
                }else{
                    $tpl= "packagescontent";
                }

            }

            $this->packconteng();
        }elseif(!empty(I('get.DebtID'))){
            if(is_mobile()){
                $tpl= "mobiledebt";
            }else{
                if($typepay=="ccc"){
                    $tpl= "publishDebtBuy";
                }else{
                    $tpl= "debtcontent";
                }

            }

            $this->debtcontent();
        }
        $user_map['MemberId']=session("user.MemberId");
        $freenum = M("memberaccount")->field("MemberId,freeCount")->where($user_map)->find();
        if(!sp_is_user_login()){
            $freenum['freeCountzz'] = -1;
        }
//        if(empty($freenum)){
//            $freenum['freeCount'] = 0;
//            $freenum['freeCountzz'] = -1;
//        }
        $this->assign('freenum',$freenum);
        $this->display($tpl);

    }
    //查看实物
    private function assetcontent(){
        $asset_model = D("Web/Assets");
        $map["tb_assets.AssetsID"]=I('get.AssetsID');
//        $wheremap['tb_assetsduedili.Usestat']  = 1;
//        $wheremap['tb_assets.AssetsStatue']  = array('between','1,3');
//        $wheremap['_logic'] = 'or';
//        $map['_complex'] = $wheremap;
        //$map["tb_assetsduedili.Usestat"]=1;
        $card['MemberId'] = authcode(I("get.card"));
        //分享访问记录
        $shfe = null;
        if(!empty($card['MemberId'])){
            $shfe = shfeng( $map["tb_assets.AssetsID"],$card['MemberId'],1,"实物转让");
            //echo $shfe;
        }
        $rescard = M("member")->field("MemberId")->where($card)->find();


        $info = $asset_model->join("LEFT JOIN tb_assetsdata ON tb_assets.AssetsID=tb_assetsdata.ID")->where($map)->find();
        $info = $asset_model->parseFieldsMap($info);

        if($info['AssetsStatue']!=4&&$info['AssetsStatue']!=7&&$info['AssetsStatue']!=8){
            if($info['agedili'] !=session('user.MemberId')){
                if($info['memberid'] !=session('user.MemberId')){
                    redirect("/Home/Erros/error4");
                    exit("无效参数");
                }
            }
        }

        //买断验证
        if($info['AssetsStatue']==7){
            $cdos = I("request.cdos");
            $cdos = authcode($cdos);

            $cdos_map['id'] = $cdos;
            $cdos_map['OrderStatue']  = 2;
            $cdos_map['CreateUser']  = session('user.MemberId');
            $cdos_res = M("order")->where($cdos_map)->order("id DESC")->find();
            if(empty($cdos_res)){
                redirect("/Home/Erros/error4");
                echo '参数错误';exit;
            }else{
                $his_map['endtime'] =array('gt',date("Y-m-d H:i:s"));
                $his_map['MemberId'] = session('user.MemberId');
                $his_map['ID'] = authcode(I('request.his'));
                $his_map['ddstatus'] =1;
                $memberbuyhistory = M("memberbuyhistory")->where($his_map)->order("id DESC")->find();
                if(empty($memberbuyhistory)){
                    redirect("/Home/Erros/error4");
                    echo '参数错误';exit;
                }
                //echo  11221;exit;
            }
        }

        $wheremap["tb_assetsduedili.Usestat"]=1;
        $wheremap['tb_assetsduedili.AssetsID']  =  $map['tb_assets.AssetsID'];
        $infodili = M("assetsduedili")->where($wheremap)->find();

        if($info['AssetsStatue']==4&&empty($infodili)){
            if($info['agedili'] !=session('user.MemberId')){
                if($info['memberid'] !=session('user.MemberId')){
                    redirect("/Home/Erros/error4");
                    exit("无效参数");
                }
            }

        }
        if(empty($infodili)){
            $info = $info;
        }else{
            $info = array_merge($info,$infodili);
        }
       //print_r($infodili);exit;
        if(empty($info['ID'])){
            $data['ID']= $map["tb_assets.AssetsID"];
            $data['ViewCount']=1;
            $id = M('assetsdata')->add($data);

            if(!empty($rescard)&&$card['MemberId']!=session("user.MemberId")&&!empty($shfe)){
                unset( $data['ViewCount']);
                M('assetsdata')->where($data)->setInc("ShareCount");
            }
        }else{
            if(session("assetip")!=get_client_ip(0,true)."&".$info['AssetsID']){
                $data['ID']= $map["tb_assets.AssetsID"];
                M('assetsdata')->where($data)->setInc("ViewCount");
                if(!empty($rescard)&&$card['MemberId']!=session("user.MemberId")&&!empty($shfe)){
                    M('assetsdata')->where($data)->setInc("ShareCount");
                }
            }

        }

        session("assetip",get_client_ip(0,true)."&".$info['AssetsID']);

        $source=  $info['source'];
        $this->assign("source",$source);
        $info['address']=json_decode($info['address']);
        $info['source']=C('source')[$info['source']];
        if($source==1){
            $info['processmodle']=C('processmodle')[5];
            $info['statue']=C('Aucstatue')[$info['statue']];
            $info['assetstype']=C('Aucassetstype')[$info['assetstype']];
        }elseif($source==6){
            $info['processmodle']=C('processmodle')[4];
            $info['statue']=C('statue')[$info['statue']];
            $info['assetstype']=C('assetstype')[$info['assetstype']];
        }else{
            $info['statue']=C('statue')[$info['statue']];
            $info['assetstype']=C('asset_type')[$info['assetstype']];
            $info['processmodle']=C('processmodle')[$info['processmodle']];
        }

        $info['isinissue']=C('isorginpic')[$info['isinissue']];

        $info['Usestat']=C('Usestat')[$info['Usestat']];
        $info['Images']=array_filter(explode("@",$info['Images']));


        //用户评论
//        $diss_model = M("assetsdiss");
//        $mapdiss['Status'] = 1;
//        $mapdiss['BelongTO'] =  $map['tb_assets.AssetsID'];
//
//// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
//        $dissinfo =  $diss_model->field("StarLevel,HeadImg,RealName,DisID,BelongTO,Content,StarNum,CreateTime,CreateMember")->where($mapdiss)->join(array("LEFT JOIN tb_memberprofile ON tb_memberprofile.MemberID=tb_assetsdiss.CreateMember","LEFT JOIN tb_memberaccount ON tb_memberaccount.MemberId=tb_assetsdiss.CreateMember"))->select();

        //用户评论
        $diss_model = M("assetsdiss");
        $mapdiss['w.Status'] = 1;
        $mapdiss['w.BelongTO'] =   $map['tb_assets.AssetsID'];
        $mapdiss['w.FID'] =  0;

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $dissinfo =  $diss_model
            ->alias('w')
            ->field("tb_memberaccount.StarLevel as StarLevel,tb_memberprofile.HeadImg as HeadImg,tb_member.MemberName as RealName,w.DisID as DisID,w.BelongTO as BelongTO,w.Content as Content,w.StarNum as StarNum, w.CreateTime as CreateTime,w.CreateMember as CreateMember,b.Content AS bContent")
            ->where($mapdiss)
            ->join(array(
                "LEFT JOIN tb_memberprofile ON tb_memberprofile.MemberID=w.CreateMember",
                "LEFT JOIN tb_member ON tb_member.MemberId=w.CreateMember",
                "LEFT JOIN tb_assetsdiss b ON b.FID=w.DisID",
                "LEFT JOIN tb_memberaccount ON tb_memberaccount.MemberId=w.CreateMember"))->select();

        //是否已购买
        if(sp_is_user_login()){
            $downurl = down_url("assets", $map["tb_assets.AssetsID"],session("user.MemberId"));
            //print_r($downurl);
            $this->assign("downurl",$downurl);
        }


        //获取尽调购买金额，和买断单价
        $project_map['AssetsID'] = $map["tb_assets.AssetsID"];
        $proinfo = M("assetsproject")->where($project_map)->field("SubID,ViewPrice,BuyPrice")->find();
        $this->assign("proinfo",$proinfo);


        //print_r($dissinfo);
        $this->assign('diss',$dissinfo);// 赋值数据集
        session("keyword.title",$info['title'].session("keyword.title"));

        //mobile其他项目列表
        if(is_mobile()){
            //$model_list_where['memberid'] =$info['memberid'];
            $model_list_where['Province'] = $info['Province'];
            $model_list_where['City'] =$info['City'];
            $model_list_where['AssetsStatue'] =array('in','4,8');
            $model_list =array();
            $assetinfo = D('Web/Debt')->lists($model_list_where);

            $packinfo = D('Web/Assets')->lists($model_list_where);

            $debtinfo = D('Web/Packages')->lists($model_list_where);
            $model_list= array_merge_recursive($debtinfo,$packinfo,$assetinfo);
            $this->assign("model_list",$model_list);

        }

       // print_r($info);exit;
        empty($info['DueCreateMember'])?$info['DueCreateMember']=-1:$info['DueCreateMember'];


        $this->assign("asset",$info);
        //print_r($info);

    }

    //查看实物
    private function assetrentcontent(){
        $asset_model = D("Web/Assetsrent");
        $map["tb_assets_rent.AssetsID"]=I('get.AssetsIDrent');
//        $wheremap['tb_assetsduedili.Usestat']  = 1;
//        $wheremap['tb_assets.AssetsStatue']  = array('between','1,3');
//        $wheremap['_logic'] = 'or';
//        $map['_complex'] = $wheremap;
        //$map["tb_assetsduedili.Usestat"]=1;
        $card['MemberId'] = authcode(I("get.card"));
        //分享访问记录
        $shfe = null;
        if(!empty($card['MemberId'])){
            $shfe = shfeng( $map["tb_assets_rent.AssetsID"],$card['MemberId'],1,"实物出租");
            //echo $shfe;
        }
        $rescard = M("member")->field("MemberId")->where($card)->find();


        $info = $asset_model->join("LEFT JOIN tb_assetsdata_rent ON tb_assets_rent.AssetsID=tb_assetsdata_rent.ID")->where($map)->find();
        $info = $asset_model->parseFieldsMap($info);

        if($info['AssetsStatue']!=4&&$info['AssetsStatue']!=7&&$info['AssetsStatue']!=8){
            if($info['agedili'] !=session('user.MemberId')){
                if($info['memberid'] !=session('user.MemberId')){
                    redirect("/Home/Erros/error4");
                    exit("无效参数");
                }
            }
        }

        //买断验证
        if($info['AssetsStatue']==7){
            $cdos = I("request.cdos");
            $cdos = authcode($cdos);

            $cdos_map['id'] = $cdos;
            $cdos_map['OrderStatue']  = 2;
            $cdos_map['CreateUser']  = session('user.MemberId');
            $cdos_res = M("order")->where($cdos_map)->order("id DESC")->find();
            if(empty($cdos_res)){
                redirect("/Home/Erros/error4");
                echo '参数错误';exit;
            }else{
                $his_map['endtime'] =array('gt',date("Y-m-d H:i:s"));
                $his_map['MemberId'] = session('user.MemberId');
                $his_map['ID'] = authcode(I('request.his'));
                $his_map['ddstatus'] =1;
                $memberbuyhistory = M("memberbuyhistory")->where($his_map)->order("id DESC")->find();
                if(empty($memberbuyhistory)){
                    redirect("/Home/Erros/error4");
                    echo '参数错误';exit;
                }
                //echo  11221;exit;
            }
        }

        $wheremap["tb_assetsduedili_rent.Usestat"]=1;
        $wheremap['tb_assetsduedili_rent.AssetsID']  =  $map['tb_assets_rent.AssetsID'];
        $infodili = M("assetsduedili_rent")->where($wheremap)->find();

        if($info['AssetsStatue']==4&&empty($infodili)){
            if($info['agedili'] !=session('user.MemberId')){
                if($info['memberid'] !=session('user.MemberId')){
                    redirect("/Home/Erros/error4");
                    exit("无效参数");
                }
            }

        }
        if(empty($infodili)){
            $info = $info;
        }else{
            $info = array_merge($info,$infodili);
        }
        //print_r($infodili);exit;
        if(empty($info['ID'])){
            $data['ID']= $map["tb_assets_rent.AssetsID"];
            $data['ViewCount']=1;
            $id = M('assetsdata_rent')->add($data);

            if(!empty($rescard)&&$card['MemberId']!=session("user.MemberId")&&!empty($shfe)){
                unset( $data['ViewCount']);
                M('assetsdata_rent')->where($data)->setInc("ShareCount");
            }
        }else{
            if(session("assetip")!=get_client_ip(0,true)."&".$info['AssetsID']){
                $data['ID']= $map["tb_assets.AssetsID"];
                M('assetsdata_rent')->where($data)->setInc("ViewCount");
                if(!empty($rescard)&&$card['MemberId']!=session("user.MemberId")&&!empty($shfe)){
                    M('assetsdata_rent')->where($data)->setInc("ShareCount");
                }
            }

        }

        session("assetip",get_client_ip(0,true)."&".$info['AssetsID']);

        $source=  $info['source'];
        $this->assign("source",$source);
        $info['address']=json_decode($info['address']);
        $info['source']=C('source')[$info['source']];
        if($source==1){
            $info['processmodle']=C('processmodle')[5];
            $info['statue']=C('Aucstatue')[$info['statue']];
            $info['assetstype']=C('Aucassetstype')[$info['assetstype']];
        }elseif($source==6){
            $info['processmodle']=C('processmodle')[4];
            $info['statue']=C('statue')[$info['statue']];
            $info['assetstype']=C('assetstype')[$info['assetstype']];
        }else{
            $info['statue']=C('statue')[$info['statue']];
            $info['assetstype']=C('asset_type')[$info['assetstype']];
            $info['processmodle']=C('processmodle')[$info['processmodle']];
        }

        $info['isinissue']=C('isorginpic')[$info['isinissue']];

        $info['Usestat']=C('Usestat')[$info['Usestat']];
        $info['Images']=array_filter(explode("@",$info['Images']));


        //用户评论
//        $diss_model = M("assetsdiss");
//        $mapdiss['Status'] = 1;
//        $mapdiss['BelongTO'] =  $map['tb_assets.AssetsID'];
//
//// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
//        $dissinfo =  $diss_model->field("StarLevel,HeadImg,RealName,DisID,BelongTO,Content,StarNum,CreateTime,CreateMember")->where($mapdiss)->join(array("LEFT JOIN tb_memberprofile ON tb_memberprofile.MemberID=tb_assetsdiss.CreateMember","LEFT JOIN tb_memberaccount ON tb_memberaccount.MemberId=tb_assetsdiss.CreateMember"))->select();

        //用户评论
        $diss_model = M("assetsdiss_rent");
        $mapdiss['w.Status'] = 1;
        $mapdiss['w.BelongTO'] =   $map['tb_assets_rent.AssetsID'];
        $mapdiss['w.FID'] =  0;

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $dissinfo =  $diss_model
            ->alias('w')
            ->field("tb_memberaccount.StarLevel as StarLevel,tb_memberprofile.HeadImg as HeadImg,tb_member.MemberName as RealName,w.DisID as DisID,w.BelongTO as BelongTO,w.Content as Content,w.StarNum as StarNum, w.CreateTime as CreateTime,w.CreateMember as CreateMember,b.Content AS bContent")
            ->where($mapdiss)
            ->join(array(
                "LEFT JOIN tb_memberprofile ON tb_memberprofile.MemberID=w.CreateMember",
                "LEFT JOIN tb_member ON tb_member.MemberId=w.CreateMember",
                "LEFT JOIN tb_assetsdiss_rent b ON b.FID=w.DisID",
                "LEFT JOIN tb_memberaccount ON tb_memberaccount.MemberId=w.CreateMember"))->select();

        //是否已购买
        if(sp_is_user_login()){
            $downurl = down_url("assets_rent", $map["tb_assets_rent.AssetsID"],session("user.MemberId"));
            //print_r($downurl);
            $this->assign("downurl",$downurl);
        }


        //获取尽调购买金额，和买断单价
        $project_map['AssetsID'] = $map["tb_assets_rent.AssetsID"];
        $proinfo = M("assetsproject_rent")->where($project_map)->field("SubID,ViewPrice,BuyPrice")->find();
        $this->assign("proinfo",$proinfo);


        //print_r($dissinfo);
        $this->assign('diss',$dissinfo);// 赋值数据集
        session("keyword.title",$info['title'].session("keyword.title"));

        //mobile其他项目列表
        if(is_mobile()){
            //$model_list_where['memberid'] =$info['memberid'];
            $model_list_where['Province'] = $info['Province'];
            $model_list_where['City'] =$info['City'];
            $model_list_where['AssetsStatue'] =array('in','4,8');
            $model_list =array();
            $assetinfo = D('Web/Assets')->lists($model_list_where);

            $packinfo = D('Web/Assetsrent')->lists($model_list_where);

            $debtinfo = D('Web/Packages')->lists($model_list_where);
            $model_list= array_merge_recursive($debtinfo,$packinfo,$assetinfo);
            $this->assign("model_list",$model_list);

        }

        // print_r($info);exit;
        empty($info['DueCreateMember'])?$info['DueCreateMember']=-1:$info['DueCreateMember'];


        $this->assign("asset",$info);
        //print_r($info);

    }
    //查看债权访问数据表
    private function debtcontent(){
        $debt_model= D("Web/Debt");
        $map['tb_debt.DebtID']=I('get.DebtID');

//        $wheremap["tb_debtduedili.Usestat"]=1;
//        $wheremap['tb_debt.AssetsStatue']  = array('between','1,3');
//        $wheremap['_logic'] = 'or';
//        $map['_complex'] = $wheremap;

        //$map["tb_debtduedili.Usestat"]=1;
        $card['MemberId'] = authcode(I("get.card"));

        //分享访问记录
        $shfe = null;
        if(!empty($card['MemberId'])){
            $shfe = shfeng( $map['tb_debt.DebtID'],$card['MemberId'],2,"债权分享");
        }
        $rescard = M("member")->field("MemberId")->where($card)->find();
        $info = $debt_model->join("LEFT JOIN tb_debtdata ON tb_debt.DebtID=tb_debtdata.ID")->where($map)->find();
        $info = $debt_model->parseFieldsMap($info);

        if($info['AssetsStatue']!=4&&$info['AssetsStatue']!=7&&$info['AssetsStatue']!=8){
            if($info['agedili'] !=session('user.MemberId')){
                if($info['memberid'] !=session('user.MemberId')){
                    redirect("/Home/Erros/error4");
                    exit("无效参数");
                }

            }
        }

        //买断验证
        if($info['AssetsStatue']==7){
            $cdos = I("request.cdos");
            $cdos = authcode($cdos);

            $cdos_map['id'] = $cdos;
            $cdos_map['OrderStatue']  = 2;
            $cdos_map['CreateUser']  = session('user.MemberId');
            $cdos_res = M("order")->where($cdos_map)->order("id DESC")->find();
            if(empty($cdos_res)){
                redirect("/Home/Erros/error4");
                echo '参数错误';exit;
            }else{
                $his_map['endtime'] =array('gt',date("Y-m-d H:i:s"));
                $his_map['MemberId'] = session('user.MemberId');
                $his_map['ID'] = authcode(I('request.his'));
                $his_map['ddstatus'] =1;
                $memberbuyhistory = M("memberbuyhistory")->where($his_map)->order("id DESC")->find();
                if(empty($memberbuyhistory)){
                    redirect("/Home/Erros/error4");
                    echo '参数错误';exit;
                }
                //echo  11221;exit;
            }
        }

        $wheremap["tb_debtduedili.Usestat"]=1;
        $wheremap['tb_debtduedili.DebtID']  =  $map['tb_debt.DebtID'];
        $infodili = M("debtduedili")->where($wheremap)->find();

        if($info['AssetsStatue']==4&&empty($infodili)){
            if($info['agedili'] !=session('user.MemberId')){
                if($info['memberid'] !=session('user.MemberId')){
                    redirect("/Home/Erros/error4");
                    exit("无效参数");
                }
            }

        }
        if(empty($infodili)){
            $info = $info;
        }else{
            $info = array_merge($info,$infodili);
        }
        if(empty($info['ID'])){
            $data['ID']= $map['tb_debt.DebtID'];
            $data['ViewCount']=1;
            M('debtdata')->add($data);
            if(!empty($rescard)&&$card['MemberId']!=session("user.MemberId")&&!empty($shfe)){
                unset( $data['ViewCount']);
                M('debtdata')->where($data)->setInc("ShareCount");
            }
        }else{
            if(session("debtip")!=get_client_ip(0,true)."&".$info['DebtID']){
                $data['ID']=$map['tb_debt.DebtID'];
                M('debtdata')->where($data)->setInc("ViewCount");
                if(!empty($rescard)&&$card['MemberId']!=session("user.MemberId")&&!empty($shfe)){
                    unset( $data['ViewCount']);
                    M('debtdata')->where($data)->setInc("ShareCount");
                }
            }
        }
        session("debtip",get_client_ip(0,true)."&".$info['DebtID']);

        $info['assureType']= C('assureType')[$info['assureType']];
        $info['isorgpic']=C('isorginpic')[$info['isorgpic']];
        $info['isioans']=C('isorginpic')[$info['isioans']];
        $info['islitigation']=C('isorginpic')[$info['islitigation']];
        $info['isjudged']=C('isorginpic')[$info['isjudged']];
        $info['ownertype']=C('ownertype')[$info['ownertype']];
        $info['otherdebtor']=C('otherdebtor')[$info['otherdebtor']];
       // $info['otherdebtor']=C('otherdebtor')[$info['otherdebtor']];

        $info['debtadress']=json_decode($info['debtadress']);
        $info['debttype']=C('debttype')[$info['debttype']];
        $info['debtoptstatue']=C('debtoptstatue')[$info['debtoptstatue']];

        $info['isinissue']=C("isorginpic")[$info['isinissue']];
        $info['pledgetype']=C("pledgetype")[$info['pledgetype']];
        $info['pledgestatue']=C('pledgestatue')[$info['pledgestatue']];
        $info['pledgeaddress']=json_decode($info['pledgeaddress']);

        $info['Images']=array_filter(explode("@",$info['Images']));
        $info['processmodle']=C('processmodle')[$info['processmodle']];

        //用户评论
        $diss_model = M("debtdiss");
        $mapdiss['w.Status'] = 1;
        $mapdiss['w.BelongTO'] =  $map['tb_debt.DebtID'];
        $mapdiss['w.FID'] =  0;

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $dissinfo =  $diss_model
            ->alias('w')
            ->field("tb_memberaccount.StarLevel as StarLevel,tb_memberprofile.HeadImg as HeadImg,tb_member.MemberName as RealName,w.DisID as DisID,w.BelongTO as BelongTO,w.Content as Content,w.StarNum as StarNum, w.CreateTime as CreateTime,w.CreateMember as CreateMember,b.Content AS bContent")
            ->where($mapdiss)
            ->join(array(
                "LEFT JOIN tb_memberprofile ON tb_memberprofile.MemberID=w.CreateMember",
                "LEFT JOIN tb_member ON tb_member.MemberId=w.CreateMember",
                "LEFT JOIN tb_debtdiss b ON b.FID=w.DisID",
                "LEFT JOIN tb_memberaccount ON tb_memberaccount.MemberId=w.CreateMember"))->select();
        //echo $diss_model->getLastSql();exit;
        //print_r($dissinfo);

        //是否已购买
        if(sp_is_user_login()){
            $downurl = down_url("debt", $map['tb_debt.DebtID'],session("user.MemberId"));
            $this->assign("downurl",$downurl);
        }

        //获取尽调购买金额，和买断单价
        $project_map['DebtID'] = $map['tb_debt.DebtID'];
        $proinfo = M("debtproject")->where($project_map)->field("SubID,ViewPrice,BuyPrice")->find();
        $this->assign("proinfo",$proinfo);

       // print_r($proinfo);exit;
        $this->assign('diss',$dissinfo);// 赋值数据集

        //mobile其他项目列表
        if(is_mobile()){
            //$model_list_where['memberid'] =$info['memberid'];
            $model_list_where['Province'] = $info['Province'];
            $model_list_where['City'] =$info['City'];
            $model_list_where['AssetsStatue'] =array('in','4,8');
            $model_list =array();
            $assetinfo = D('Web/Debt')->lists($model_list_where);

            $packinfo = D('Web/Assets')->lists($model_list_where);

            $debtinfo = D('Web/Packages')->lists($model_list_where);
            $model_list= array_merge_recursive($debtinfo,$packinfo,$assetinfo);
            $this->assign("model_list",$model_list);

        }
        empty($info['DueCreateMember'])?$info['DueCreateMember']=-1:$info['DueCreateMember'];
        $this->assign("debt",$info);
        session("keyword.title",$info['title'].session("keyword.title"));
        //print_r($info);


    }

    //查看资产包内容
    private function packconteng(){
        $pack_mode=D("Web/Packages");
        $map['tb_package.PackageID']=I('get.PackageID');



        $card['MemberId'] = authcode(I("get.card"));
        //分享访问记录
        $shfe = null;
        if(!empty($card['MemberId'])){
            $shfe = shfeng(  $map['tb_package.PackageID'],$card['MemberId'],3,"资产包分享");
        }

        $rescard = M("member")->field("MemberId")->where($card)->find();
        $info = $pack_mode->join("LEFT JOIN tb_packagedata ON tb_package.PackageID=tb_packagedata.ID")->where($map)->find();
        $info = $pack_mode->parseFieldsMap($info);

        if($info['AssetsStatue']!=4&&$info['AssetsStatue']!=7&&$info['AssetsStatue']!=8){
            if($info['agedili'] !=session('user.MemberId')){
                if($info['memberid'] !=session('user.MemberId')){
                    redirect("/Home/Erros/error4");
                    exit("无效参数");
                }

            }
        }

        //买断验证
        if($info['AssetsStatue']==7){
            $cdos = I("request.cdos");
            $cdos = authcode($cdos);

            $cdos_map['id'] = $cdos;
            $cdos_map['OrderStatue']  = 2;
            $cdos_map['CreateUser']  = session('user.MemberId');
            $cdos_res = M("order")->where($cdos_map)->order("id DESC")->find();
            if(empty($cdos_res)){
                redirect("/Home/Erros/error4");
                echo '参数错误';exit;
            }else{
                $his_map['endtime'] =array('gt',date("Y-m-d H:i:s"));
                $his_map['MemberId'] = session('user.MemberId');
                $his_map['ID'] = authcode(I('request.his'));
                $his_map['ddstatus'] =1;
                $memberbuyhistory = M("memberbuyhistory")->where($his_map)->order("id DESC")->find();
                if(empty($memberbuyhistory)){
                    redirect("/Home/Erros/error4");
                    echo '参数错误';exit;
                }
                //echo  11221;exit;
            }
        }

        $wheremap["tb_packageduedili.Usestat"]=1;
        $wheremap['tb_packageduedili.PackageID']  = $map['tb_package.PackageID'];
        $infodili = M("packageduedili")->where($wheremap)->find();
        if($info['AssetsStatue']==4&&empty($infodili)){
            if($info['agedili'] !=session('user.MemberId')){
                if($info['memberid'] !=session('user.MemberId')){
                    redirect("/Home/Erros/error4");
                    exit("无效参数");
                }
            }

        }
        if(empty($infodili)){
            $info = $info;
        }else{
            $info = array_merge($info,$infodili);
        }

        //print_r($info);exit;
        if(empty($info['ID'])){
            $data['ID']= $map['tb_package.PackageID'];
            $data['ViewCount']=1;
            M('packagedata')->add($data);
            if(!empty($rescard)&&$card['MemberId']!=session("user.MemberId")&&!empty($shfe)){
                unset( $data['ViewCount']);
                M('packagedata')->where($data)->setInc("ShareCount");
            }
        }else{
            if(session("packip")!=get_client_ip(0,true)."&".$info['PackageID']){
                $data['ID']= $map['tb_package.PackageID'];
                M('packagedata')->where($data)->setInc("ViewCount");
                if(!empty($rescard)&&$card['MemberId']!=session("user.MemberId")&&!empty($shfe)){
                    unset( $data['ViewCount']);
                    M('packagedata')->where($data)->setInc("ShareCount");
                }
            }
        }
        session("packip",get_client_ip(0,true)."&".$info['PackageID']);
        //echo session("packip");
        $info['isorginpic']=C('isorginpic')[ $info['isorginpic']];
        $info['ownertype']=C('ownertype')[ $info['ownertype']];


        $info['Images']=array_filter(explode("@",$info['Images']));
        $info['AssetsDesc']=array_filter(explode("@",$info['AssetsDesc']));
        $info['owneradress']=json_decode($info['owneradress']);


//        //用户评论
//        $diss_model = M("packagediss");
//        $mapdiss['Status'] = 1;
//        $mapdiss['BelongTO'] =  $map['tb_package.PackageID'];
//
//// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
//        $dissinfo =  $diss_model->field("StarLevel,HeadImg,RealName,DisID,BelongTO,Content,StarNum,CreateTime,CreateMember")->where($mapdiss)->join(array("LEFT JOIN tb_memberprofile ON tb_memberprofile.MemberID=tb_packagediss.CreateMember","LEFT JOIN tb_memberaccount ON tb_memberaccount.MemberId=tb_packagediss.CreateMember"))->select();

        //用户评论
        $diss_model = M("packagediss");
        $mapdiss['w.Status'] = 1;
        $mapdiss['w.BelongTO'] =  $map['tb_package.PackageID'];
        $mapdiss['w.FID'] =  0;

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $dissinfo =  $diss_model
            ->alias('w')
            ->field("tb_memberaccount.StarLevel as StarLevel,tb_memberprofile.HeadImg as HeadImg,tb_member.MemberName as RealName,w.DisID as DisID,w.BelongTO as BelongTO,w.Content as Content,w.StarNum as StarNum, w.CreateTime as CreateTime,w.CreateMember as CreateMember,b.Content AS bContent")
            ->where($mapdiss)
            ->join(array(
                "LEFT JOIN tb_memberprofile ON tb_memberprofile.MemberID=w.CreateMember",
                "LEFT JOIN tb_member ON tb_member.MemberId=w.CreateMember",
                "LEFT JOIN tb_packagediss b ON b.FID=w.DisID",
                "LEFT JOIN tb_memberaccount ON tb_memberaccount.MemberId=w.CreateMember"))->select();
        //是否已购买
        if(sp_is_user_login()){
            $downurl = down_url("package", $map['tb_package.PackageID'],session("user.MemberId"));
            $this->assign("downurl",$downurl);
        }
        //资产包项目列表
        $PackageID['PackageID'] =$map['tb_package.PackageID'];
        $PackageID['Ismain'] = 0;
        $packlist =M("packageproject")->field("SubID,Ismain,SubName")->where($PackageID)->select();

        $CreateUser =session("user.MemberId");
        $odr_model =M("order");
        foreach($packlist as $k=>$v){
            $resss = null;
            $ord_map['tb_order.Type'] =2;
            $ord_map['tb_order.ProductID'] =4;
            $ord_map['tb_order.OrderStatue'] =2;
            $ord_map['tb_order.CreateUser'] =$CreateUser;
            $ord_map['tb_order.InfoNo'] =$v['SubID'];

            $resss =$odr_model->where($ord_map)->find();
            if(!empty($resss)){
                $packlist[$k]['pay'] = 1;
            }
        }
        $this->assign("packlist",$packlist);

        //获取尽调购买金额，和买断单价
        $project_map['PackageID'] = $map['tb_package.PackageID'];
        $project_map['Ismain'] = 1;
        $proinfo = M("packageproject")->where($project_map)->field("SubID,ViewPrice,BuyPrice")->find();
        $this->assign("proinfo",$proinfo);


            $this->assign('diss',$dissinfo);// 赋值数据集


        //mobile其他项目列表
        if(is_mobile()){
            //$model_list_where['memberid'] =$info['memberid'];
            //$model_list_where['memberid'] =$info['memberid'];
            $model_list_where['Province'] = $info['Province'];
            $model_list_where['City'] =$info['City'];
            $model_list_where['AssetsStatue'] =array('in','4,8');
            $model_list =array();
            $assetinfo = D('Web/Debt')->lists($model_list_where);

            $packinfo = D('Web/Assets')->lists($model_list_where);

            $debtinfo = D('Web/Packages')->lists($model_list_where);
            $model_list= array_merge_recursive($debtinfo,$packinfo,$assetinfo);
            $this->assign("model_list",$model_list);

        }
        //print_r($info);
        empty($info['DueCreateMember'])?$info['DueCreateMember']=-1:$info['DueCreateMember'];
        $this->assign("pack",$info);
        session("keyword.title",$info['title'].session("keyword.title"));
        //print_r($info);


    }
    //用户发布评论
    public function  gediss(){
        if(sp_is_user_login()){
            session("login_http_referer",null);
            if(IS_POST){
                $type= I("request.type");
                $diss_model=null;
                $ProductID = null;
                $ass = null;
                $BelongTO = I("request.BelongTO");
                switch($type){
                    case "pp":
                        $diss_model = M("packagediss");
                        $ProductID = 4;

                        $subid['PackageID']=$BelongTO;
                        $ass =M('packageproject')->field("SubID")->where($subid)->find();
                        break;
                    case "aset";
                        $diss_model = M("assetsdiss");
                        $ProductID = 5;
                        $subid['AssetsID']=$BelongTO;
                        $ass =M('assetsproject')->field("SubID")->where($subid)->find();
                        break;
                    case "asetrent";
                        $diss_model = M("assetsdiss_rent");
                        $ProductID = 5;
                        $subid['AssetsID']=$BelongTO;
                        $ass =M('assetsproject_rent')->field("SubID")->where($subid)->find();
                        break;
                    case "debt":
                        $diss_model = M("debtdiss");
                        $ProductID = 6;

                        $subid['DebtID']=$BelongTO;
                        $ass =M('debtproject')->field("SubID")->where($subid)->find();
                        break;
                    default:
                        $this->error("非法访问！");
                }
                $order['Type'] =2;
                $order['InfoNo'] = $ass['SubID'];
                $order['ProductID'] = $ProductID;
                $order['OrderStatue'] = 2;
                $order['CreateUser']=session("user.MemberId");

                $order_res = M("order")->where($order)->find();
                if(empty($order_res)){
                    $this->error("你还没购买产品");
                }
                $vali = array(
                    array('BelongTO','/^[0-9]+([.]{1}[0-9]+){0,1}$/','非法参数！',1),
                    array('Content','require','内容必须！',1),
                    array('StarNum','/^[0-9]+([.]{1}[0-9]+){0,1}$/','请选择评价！',1),
                );

                if($diss_model->validate($vali)->create()){
                    $map['BelongTO'] =$BelongTO;
                    $map['CreateMember'] =  session("user.MemberId");
                    $map['Status']=array("between",'0,1');
                    $res = $diss_model->where($map)->find();
                    if($res){
                        $this->error("你已评论过了");
                    }else{
                        $diss_model->CreateMember= session("user.MemberId");
                        $diss_model->CreateTime=date("Y-m-d H:i:s");
                        $result = $diss_model->add();
                        $result =$diss_model->find($result);
                        if($result){
//                            $data = "
//                                <div class=\"rated\">
//                                    <div class=\"man\"><img src=\"http://placehold.it/60x60\"></div>
//                                    <div class=\"fl\">
//                                        <div class=\"name\"><b>夏灵灵". $result['DisID']."</b><em><img src=\"".C("CSSJSURL")."/static/images/common/start1.jpg\"></em></div>
//                                        <div class=\"con\">{$result['Content']}</div>
//                                        <div class=\"time\"><b>{$result['CreateTime']}</b><span><i>评价等级:</i><em><img src=\"".C("CSSJSURL")."/static/images/common/start.jpg\"></em></span></div>
//                                    </div>
//                                </div>
//                                ";
                            $this->success("发布成功，请等待审核","");
                        }
                    }

                }else{
                    $this->error($diss_model->getError());
                }
            }
        }else{
            $this->success("login",U('User/Index/index'));
        }
    }
    //提交用户配资申请
    public function dofinan(){
        session('login_http_referer',null);
        session('login_http_member',null);
        if(sp_is_user_login()){
            $type=I('get.type');
            $buyid=I('get.buyid');
            $MemberId = session("user.MemberId");
            $info =null;
            $request_type = null;

            $finan_model = M("financingrequest");
            $vali = array(
                array('request_quanlity','/^\d+$/','非法参数！',1),
                array('contact_phone','/^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|18[0-9]{9}$/','moblie！',1),
                array('contact_name','require','name',1),
            );

            switch($type){
                case "assets":
                    $map['tb_assetsproject.AssetsID'] =$buyid;
                    $map['tb_assets.Usestat'] =1;
                    $map['tb_order.OrderStatue'] =2;
                    $map['tb_order.CreateUser'] =$MemberId;
                    $info = M("assetsproject")->field("tb_assetsproject.SubID,tb_assets.AssetsID as project_id,tb_order.id,tb_order.sn,tb_order.CreateUser")
                        ->join('tb_assets ON tb_assetsproject.AssetsID = tb_assets.AssetsID')
                        ->join('tb_order ON tb_assetsproject.SubID = tb_order.InfoNo')
                        ->where($map)->find();

                    $request_type =2;
                    break;
                case "assetsrent":
                    $map['tb_assetsproject_rent.AssetsID'] =$buyid;
                    $map['tb_assets_rent.Usestat'] =1;
                    $map['tb_order.OrderStatue'] =2;
                    $map['tb_order.CreateUser'] =$MemberId;
                    $info = M("assetsproject_rent")->field("tb_assetsproject_rent.SubID,tb_assets_rent.AssetsID as project_id,tb_order.id,tb_order.sn,tb_order.CreateUser")
                        ->join('tb_assets_rent ON tb_assetsproject_rent.AssetsID = tb_assets_rent.AssetsID')
                        ->join('tb_order ON tb_assetsproject_rent.SubID = tb_order.InfoNo')
                        ->where($map)->find();

                    $request_type = 4;
                    break;
                case "debt":
                    $map['tb_debtproject.DebtID'] =$buyid;
                    $map['tb_debt.Usestat'] =1;
                    $map['tb_order.OrderStatue'] =2;
                    $map['tb_order.CreateUser'] =$MemberId;
                    $info = M("debtproject")->field("tb_debtproject.SubID,tb_debt.DebtID as project_id,tb_order.id,tb_order.sn,tb_order.CreateUser")
                        ->join('tb_debt ON tb_debtproject.DebtID = tb_debt.DebtID')
                        ->join('tb_order ON tb_debtproject.SubID = tb_order.InfoNo')
                        ->where($map)->find();

                    $request_type = 1;
                    break;
                case "package":
                    $map['tb_packageproject.PackageID'] =$buyid;
                    $map['tb_packageproject.Ismain'] =1;

                    $map['tb_package.Usestat'] =1;

                    $map['tb_order.OrderStatue'] =2;
                    $map['tb_order.CreateUser'] =$MemberId;
                    $info = M("packageproject")->field("tb_packageproject.SubID,tb_package.PackageID as project_id,tb_order.id,tb_order.sn,tb_order.CreateUser")
                        ->join('tb_package ON tb_packageproject.PackageID = tb_package.PackageID')
                        ->join('tb_order ON tb_packageproject.SubID = tb_order.InfoNo')
                        ->where($map)->find();

                    $request_type = 3;
                    break;

            }

            //查询是否已申请过
            $finan_map['request_type']=$request_type;
            $finan_map['project_id']=$info['project_id'];
            $finan_map['member_id']=$MemberId;
            $finan_map['status']=0;

            $offinfo = $finan_model->where($finan_map)->find();

            if(!empty($offinfo)){
                $this->error("你已申请过！！请不要重复申请");
            }
            if(!empty($info)){
                if($finan_model->validate($vali)->create()){
                    //写入申请记录
                    $finan_model->request_type = $request_type;
                    $finan_model->project_id = $info['project_id'];
                    $finan_model->member_id = $MemberId;
                    $finan_model->create_time = date("Y-m-d H:i:s");
                    $resful=$finan_model->add();

                    if($resful){
                        $this->success("发布成功，请等待审核","");
                    }

                }else{
                    $this->error($finan_model->getError());
                }

            }else{
                $this->error("无效参数!!");
            }

        }else{
            $this->redirect('User/Index/index');
        }

    }
    public function pdfview(){
        session('login_http_referer',null);
        session('login_http_member',null);

        $fileurl = I("request.fileurl");

        $title =I("request.title");
        $title =empty($title)?null:$title;
        $this->assign("title",$title);
       // echo urldecode($fileurl);exit;
       // $pdfurl=U("Home/Lists/pdfurl",array('fileurl'=>$fileurl));
        $this->assign("pdfurl",urldecode($fileurl));
        $this->display("pdf:viewer");

    }
    public function readview(){
        session('login_http_referer',null);
        session('login_http_member',null);

        $fileurl = I("request.fileurl");

        $title =I("request.title");
        $title =empty($title)?null:$title;
        $this->assign("title",$title);
        // echo urldecode($fileurl);exit;
        // $pdfurl=U("Home/Lists/pdfurl",array('fileurl'=>$fileurl));
        $this->assign("pdfurl",urldecode($fileurl));
        $this->display("pdf:viewread");

    }
    public function pdfurl(){
        session('login_http_referer',null);
        session('login_http_member',null);
        $fileurl =  I("request.fileurl");



       // echo$fileurl;exit;
        //$fileurl = urlencode("http://ofomkeim9.bkt.clouddn.com/%E5%B0%86CAD%E5%9B%BE%E7%BA%B8%E8%BD%AC%E6%8D%A2%E6%88%90PDF%E6%96%87%E4%BB%B6%E7%9A%84%E7%AE%80%E6%98%93%E6%96%B9%E6%B3%95.pdf");
       // var_dump(file_get_contents($fileurl)) ;
       echo $this->vita_get_url_content("https://achives.resource.tejinhui.com/c8a30462-e559-4347-aa5a-6e7b3fad8987.pdf?e=1488597863&token=iSHBEbT5biAU-A3VuAQ9BFDdlk_DJ4-vILfSdC7H:GfL42SNE2MFqIrOurVZ1D25Q16A=");

    }
    public function vita_get_url_content($url) {
        if(function_exists('file_get_contents')) {
            $file_contents = file_get_contents($url);
        } else {
            $ch = curl_init();
            $timeout = 0;
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727;'.$url.')');
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,$timeout);
            curl_setopt ($ch, CURLOPT_URL, $url);
            $file_contents = curl_exec($ch);
            curl_close($ch);
        }
        var_dump($file_contents);exit;
        return $file_contents;
    }
}