<?php
namespace User\Controller;
use Common\Controller\UserbaseController;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/24
 * Time: 16:03
 */
class CommonController extends UserbaseController{
    public function __construct()
    {

        parent::__construct();
        session("keyword.title",C('logotitle')[7].session("keyword.title"));

    }
    //我的账户
    public function memberindex(){

        $user =session("user");
        //print_r($user);
        //基本信息
        $user_model_pro=M('memberaccount');
        $map['tb_memberaccount.MemberId'] = $user['MemberId'];
        $info = $user_model_pro->where($map)->join("RIGHT JOIN tb_member ON tb_memberaccount.MemberId=tb_member.MemberId")->find();
        //print_r($info);exit;
        $info=array_merge($user,$info);
        session("user",$info);

        $CodeID['CodeID']=$info['MemberType'];
        $info['MemberType']=M()->table("sys_code")->where($CodeID)->find();
        if($info['MemberType']['CodeValue']=="d-member"){
            session('user.MemberType','4');
            session('user.MemberType1','5');
        }else{
            session('user.MemberType1',null);
        }
        //print_r( session('user.MemberType1'));
        $CodeGroup['CodeGroup'] = 10109;
        $info['CodeGroup']=M()->table("sys_code")->where($CodeGroup)->find();
        $info['Province'] = M('area')->field("name")->find($info['Province']);
        $info['City']= M('area')->field("name")->find($info['City']);


        $this->assign("user",$info);


         //print_r($info);
        if(is_mobile()){
            $this->display("mobile@User:member");
        }else{
            $this->display("Member:member");
        }

    }
    //经济人个人名片
    public function card(){
        $info = session("user");
        $info['MemberType']=M()->table("sys_code")->where("CodeID= '".$info['MemberType']."'")->find();

        $maps['tb_memberaccount.MemberId']=$info['MemberId'];
        $info['StarLevel']=M("memberaccount")->field("StarLevel as name,MemberId")->where($maps)->find();
        $smap['CreateMember']=$info['MemberName'];
        $info['pronum'] = M("assets")->where($smap)->count()+M("debt")->where($smap)->count()+M("package")->where($smap)->count();

        $mmap['DueCreateMember'] = $info['MemberId'];
        $mmap['Usestat'] = 1;
        $info['make'] = M("assetsduedili")->where($mmap)->count()+M("debtduedili")->where($mmap)->count()+M("packageduedili")->where($mmap)->count();
        $info['host'] =$_SERVER['SERVER_NAME'].U("Home/Index/visitf",array("card"=> authcode($info['MemberId'],"ENCODE")));
        //print_r($info);
        $this->assign("user",$info);
        $this->display("Member:card");

    }
    //提现管理
    public function drawmgt(){
        $user =session("user");
        //print_r($user);
        //基本信息
        $user_model_pro=M('memberaccount');
        $map['MemberId'] = $user['MemberId'];
        $info = $user_model_pro->where($map)->find();
        $this->assign("user",$info);

        //提现列表
        $statrtime = I('get.starttime');
        $endtime = I('get.endtime');
        if(!empty($statrtime)&&!empty($endtime)){
            $map['tb_drawrequest.CreateTime'] =array('between',$statrtime.",".$endtime);
        }
        $map["tb_drawrequest.memberid"] = session("user.MemberId");

        $draw = M("drawrequest");
        $count = $draw->where($map)->count();
        $pagenum = 10;
        if(is_mobile()){
            $pagenum = 100;
        }
        $Page       = new \Think\Page($count,$pagenum);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $infolist = $draw->where($map)->order("createtime DESC")->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign("infolist",$infolist);
        $this->assign('page',$show);// 赋值分页输出

        //$this->display("index");
        if(is_mobile()){
            $this->display("mobile@User:orderMgt");
        }else{
            $this->display("Member:drawMgt");
        }

    }
    public function mobilecash(){
        $user =session("user");
        //print_r($user);
        //基本信息
        $user_model_pro=M('memberaccount');
        $map['MemberId'] = $user['MemberId'];
        $info = $user_model_pro->where($map)->find();
        $this->assign("user",$info);

        session('login_http_referer',null);
        session('login_http_member',null);
        $maps['tb_member.MemberId'] = $map['MemberId'];
        $info = M("member")->field("tb_member.openid as openid,tb_member.MemberId as MemberId")->join("tb_memberprofile ON tb_member.MemberId = tb_memberprofile.MemberID")->where($maps)->find();
        if(empty($info['openid'])){
            $this->error("请绑定微信");
        }
        $this->assign("info",$info);
        $this->display("mobile@User:orderWithdrawals");
    }
    //订单管理
    public function ordermgt(){

        //获取订单列表

        $statrtime = I('get.starttime');
        $endtime = I('get.endtime');
        if(!empty($statrtime)&&!empty($endtime)){
            $map['tb_order.CreateTime'] =array('between',$statrtime.",".$endtime);
        }
        $map["tb_order.CreateUser"] = session("user.MemberId");
        $messagetype = empty(I("get.type"))?0:I("get.type");
        switch($messagetype){
            case 1:
                $map['tb_order.Type'] =1;
                break;
            case 2:
                $map['tb_order.Type'] =array('in','2,5');
                break;
            case 3:
                $map['tb_order.Type'] =3;
                break;
            case 4:
                $map['tb_order.Type'] =4;
                break;
            default;

        }
        //$map['tb_order.OrderStatue'] =array("between", "1,4");
        $oder_model = M("order");
        $count      = $oder_model->join("tb_product ON tb_product.ProductId = tb_order.ProductID")->join("sys_code ON sys_code.CodeID= tb_product.ProductType")->where($map)->count();// 查询满足要求的总记录数

        //print_r($map);
        $pagenum = 10;
        if(is_mobile()){
            $pagenum = 100;
        }
        $Page       = new \Think\Page($count,$pagenum);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $oder_model
            ->field("id,sn,tb_order.Type as type,tb_order.ProductID,DealPrice,tb_order.ProductName as ProductName,tb_order.CreateTime as CreateTime,OrderStatue,Type,sys_code.CodeValue as CodeValue")
            ->join("tb_product ON tb_product.ProductId = tb_order.ProductID")
            ->join("sys_code ON sys_code.CodeID= tb_product.ProductType")
            ->where($map)->order("CreateTime DESC")
            ->limit($Page->firstRow.','.$Page->listRows)->select();

        //print_r($list);
        $this->assign('lists',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        //print_r($info);

        //类型选择
        $scode_mode = M();
        $messageType = $scode_mode->table("sys_code")->where("CodeGroup = '".C("message")."'")->select();
        //print_r($messageType);
        $this->assign("messageType",$messageType);
        if(is_mobile()){
            $this->display("mobile@User:orderList");
        }else{
            $this->display("Member:orderMgt");
        }

    }
    //代办事件
    public function todo(){

        $statrtime = I('get.starttime');

        $endtime = I('get.endtime');
        $map['AssetsStatue'] =array('between','1,4');
            //array('between','0,3');
        if(!empty($statrtime)&&!empty($endtime)){
            $map['CreateTime'] =array('between',$statrtime.",".$endtime);
        }
        $map["DueDiligenceMember"] = session("user.MemberId");
        $messagetype = empty(I("get.type"))?0:I("get.type");
        //echo  $messagetype;exit;
        $assetinfo = $packinfo = $debtinfo =array();
        $asset_model = M("assets");
        if(session("user.MemberType")==4){
            $assetinfo = $asset_model->field("
                tb_assets.AssetsID,
                Title as title,
                Price as total,
                ProcessModle as promodel,
                ProPrice as proprice,
                Address as adress,
                Contact as Contact,
                CellPhone as mobile,
                CreateTime,AssetsStatue,
                OptType")->join("LEFT JOIN tb_assetsacceptinfo ON tb_assetsacceptinfo.AssetsID = tb_assets.AssetsID")->where($map)->order("AssetsID desc")->select();
            $debt_model = M("debt");
            $debtinfo = $debt_model->field("
                tb_debt.DebtID,
                Title as title,
                Total as total,
                StartTime,EndTime,
                ProcessModle as promodel,
                ProPrice as proprice,
                DebtAdress as adress,
                Owner as Contact,
                CellPhone as mobile,
                CreateTime,AssetsStatue,
                OptType")->join("LEFT JOIN tb_debtacceptinfo ON tb_debtacceptinfo.DebtID = tb_debt.DebtID")->where($map)->order("DebtID desc")->select();
            $pack_model = M("package");
            $packinfo = $pack_model->field("
                tb_package.PackageID,
                Title as title,
                Total as total,
                ProcessModle as proprice,
                OwnerAdress as adress,
                Owner as Contact,
                CellPhone as mobile,
                CreateTime,AssetsStatue,
                OptType")->join("LEFT JOIN tb_packageacceptinfo ON tb_packageacceptinfo.PackageID = tb_package.PackageID")->where($map)->order("PackageID desc")->select();
        }elseif(session("user.MemberType")==3){
            $map['AssetsStatue'] =1;
            $map["DueDiligenceMember"] = 0;
            $map_a["tb_assets.memberid"] = session("user.MemberId");
            $map_b["tb_debt.memberid"] = session("user.MemberId");
            $map_c["tb_package.memberid"] = session("user.MemberId");
            $assetinfo = $asset_model->field("
                tb_assets.AssetsID,
                Title as title,
                Price as total,
                ProcessModle as promodel,
                ProPrice as proprice,
                Address as adress,
                Contact as Contact,
                CellPhone as mobile,
                CreateTime,AssetsStatue,
                OptType")->join("LEFT JOIN tb_assetsacceptinfo ON tb_assetsacceptinfo.AssetsID = tb_assets.AssetsID")->where($map)->where($map_a)->order("AssetsID desc")->select();
            $debt_model = M("debt");
            $debtinfo = $debt_model->field("
                tb_debt.DebtID,
                Title as title,
                Total as total,
                StartTime,EndTime,
                ProcessModle as promodel,
                ProPrice as proprice,
                DebtAdress as adress,
                Owner as Contact,
                CellPhone as mobile,
                CreateTime,AssetsStatue,
                OptType")->join("LEFT JOIN tb_debtacceptinfo ON tb_debtacceptinfo.DebtID = tb_debt.DebtID")->where($map)->where($map_b)->order("DebtID desc")->select();
            $pack_model = M("package");
            $packinfo = $pack_model->field("
                tb_package.PackageID,
                Title as title,
                Total as total,
                ProcessModle as proprice,
                OwnerAdress as adress,
                Owner as Contact,
                CellPhone as mobile,
                CreateTime,AssetsStatue,
                OptType")->join("LEFT JOIN tb_packageacceptinfo ON tb_packageacceptinfo.PackageID = tb_package.PackageID")->where($map)->where($map_c)->order("PackageID desc")->select();

        }

//        $assetinfo = D('Web/Debt')->lists($map);
//        print_r($assetinfo);
//            exit;
//        switch($messagetype){
//            case 0:
//                $assetinfo = D('Web/Debt')->lists($map);
//                $packinfo = D('Web/Assets')->lists($map);
//                $debtinfo = D('Web/Packages')->lists($map);
//                break;
//            case 13:
//                $debtinfo = D('Web/Packages')->lists($map);
//                break;
//            case 12:
//                $assetinfo = D('Web/Debt')->lists($map);
//                break;
//            case 11:
//                $packinfo = D('Web/Assets')->lists($map);
//                break;
//            default:
//        }


        $arr =array();
        $arrsort = array();
        $result= array_merge_recursive($debtinfo,$packinfo,$assetinfo);
        //print_r($assetinfo);
        //print_r($result);
        foreach($result as $k =>$v){
            //type 1实物资产 ,2资产包,3债权
            //$v['type']=1;
//            if($v['OptType']==2&&session("user.MemberType")==4){
//                continue ;
//            }
            $v['adress'] = adressjson($v['adress']).adressjson($v['adress'],1);
            $v['daytime']= nubtime($v['StartTime'],$v['EndTime']);

            $v['CreateTime'] = strtotime($v['CreateTime']);
            $v['Statue'] = $v['AssetsStatue'];
            $v['AssetsStatue']=setstatue($v['AssetsStatue']);

            //使用$arrsort排序
            $arrsort[]= $v['CreateTime'];
            $arr[]=$v;
        }

        array_multisort($arrsort,SORT_DESC,SORT_NUMERIC ,$arr);

        //分页
        $count= count($arr,0);
        $pagenum = 10;
        if(is_mobile()){
            $pagenum = 100;
        }
        $Page       = new \Think\Page($count,$pagenum);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = array_slice($arr,$Page->firstRow,$pagenum);
        $this->assign('page',$show);// 赋值分页输出

        //print_r($list);
        $this->assign('list',$list);// 赋值数据集

        //尽调模板
        $jdmodel_map['CodeGroup'] ="10122";
        $jdmodel = M()->table("sys_code")->field("CodeID,CodeValue")->where($jdmodel_map)->order("CodeID DESC")->select();

        //print_r($jdmodel);
        $this->assign("jdmodel",$jdmodel);

        $scode_mode = M();
        $messageType = $scode_mode->table("sys_code")->where("CodeGroup = '".C("message")."'")->select();
        //print_r($messageType);
        $this->assign("messageType",$messageType);
        if(is_mobile()){
            $this->display("mobile@User:todo");
        }else{
            $this->display("Member:todo");
        }

    }
    //我的发布
    public function mypublish(){
//        $debt_model = D("Debt");
//        $asset_model = D("Assets");
//        $pack_model = D("Package");
        $statrtime = I('get.starttime');
        $endtime = I('get.endtime');
        $map['AssetsStatue'] =array('between','0,4');
        if(!empty($statrtime)&&!empty($endtime)){
            $map['CreateTime'] =array('between',$statrtime.",".$endtime);
        }
        $map["memberid"] = session("user.MemberId");
        $messagetype = empty(I("get.type"))?0:I("get.type");
        //echo  $messagetype;exit;
        $assetinfo = $packinfo = $debtinfo =array();
//        $assetinfo = D('Web/Debt')->lists($map);
//        print_r($assetinfo);
//            exit;

        //print_r($messagetype);
        switch($messagetype){
            case 0:
                $map['Source'] =array("in","2,3,4,5,6");
                //$assetinfo = D('Web/Debt')->lists($map);
                $packinfo = D('Web/Assets')->lists($map);
                //$debtinfo = D('Web/Packages')->lists($map);

                break;
            case 1:
                $map['Source'] =1;
                $assetinfo = D('Web/Assets')->lists($map);
                print_r($assetinfo);exit;
                break;
            case 2:
                $map['Source'] =array('in','2,3,4');
                $assetinfo = D('Web/Assets')->lists($map);
                break;
            case 6:
                $map['Source'] =6;
                $assetinfo = D('Web/Assets')->lists($map);
                break;
//            case 13:
//                $debtinfo = D('Web/Packages')->lists($map);
//                break;
//            case 12:
//                $assetinfo = D('Web/Debt')->lists($map);
//                break;
//            case 11:
//                $packinfo = D('Web/Assets')->lists($map);
//                break;
            default:
                $this->error("!!");
        }


        //print_r($packinfo);
        $arr =array();
        $arrsort = array();
        $result= array_merge_recursive($debtinfo,$packinfo,$assetinfo);
        foreach($result as $k =>$v){
            //type 1实物资产 ,2资产包,3债权
            //$v['type']=1;
            $v['adress'] = adressjson($v['adress']).adressjson($v['adress'],1);
            $v['daytime']= nubtime($v['StartTime'],$v['EndTime']);

            $v['CreateTime'] = strtotime($v['CreateTime']);
            $v['AssetsStatue']=setstatue($v['AssetsStatue']);

            //使用$arrsort排序
            $arrsort[]= $v['CreateTime'];
            $arr[]=$v;
        }
        array_multisort($arrsort,SORT_DESC,SORT_NUMERIC ,$arr);

        //分页
        $count= count($arr,0);
        $pagenum = 10;
        if(is_mobile()){
            $pagenum = 100;
        }
        $Page       = new \Think\Page($count,$pagenum);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = array_slice($arr,$Page->firstRow,$pagenum);
        $this->assign('page',$show);// 赋值分页输出

        $this->assign('list',$list);// 赋值数据集
        //print_r($list);

        //类型选择
        $scode_mode = M();
        $messageType = $scode_mode->table("sys_code")->where("CodeGroup = '".C("message")."'")->select();
        //print_r($messageType);
        $this->assign("messageType",$messageType);
        if(is_mobile()){
            $this->display("mobile@User:myPublish");
        }else{
            $this->display("Member:myPublish");
        }

    }
    //投诉建议
    public function suggesstion(){
        //echo  "1) " . basename ( "../etc/sudoers.d../etc/sudoers.d../etc/sudoers.d" ,  ".d" ). PHP_EOL ;
        $model_suf=M("suggession");
        $star=I("request.starttime");
        $end = I("request.endtime");
        $map = null;
        if(!empty($star)&&!empty($end)){
            $map["CreateTime"] = array('between',$star.','.$end);
        }
        $map['SendMember'] = session("user.MemberId");
        $map['Status'] = array('between','0,1');;

        $count      = $model_suf->where($map)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $lists = $model_suf->where($map)->order("CreateTime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
       // print_r($lists);
        $this->assign('lists',$lists);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        $this->display("Member:suggesStion");
    }
    public function memberupdata(){
        $area =A("Portal/Area");
        $area->asgA();
        $info =session("user");
        $map['MemberID'] = $info['MemberId'];
        $userpro = M("memberprofile")->where($map)->find();
        $info=array_merge($info,$userpro);



        if($info['MemberType1']==5&&$info['MemberType']!=5&&$info['MemberType']!=3){
            $mapcode['CodeValue'] = "d-member";
        }else{
            $mapcode['CodeID'] = $info['MemberType'];
        }
        //print_r($info);
        $info['MemberType']=M()->table("sys_code")->where($mapcode)->find();
        $info['intImg'] =empty( $info['intImg'])?"":imgpublic($info['intImg']);

        $this->assign("user",$info);
        //print_r($info);
        $this->display("Member:profile");
    }

    //提现
    public function cashmis(){
        session('login_http_referer',null);
        session('login_http_member',null);
        $map['tb_member.MemberId'] = session("user.MemberId");
        $info = M("member")->field("tb_member.openid as openid,tb_member.MemberId as MemberId")->join("tb_memberprofile ON tb_member.MemberId = tb_memberprofile.MemberID")->where($map)->find();
        if(empty($info['openid'])){
            $this->error("请绑定微信");
        }
        $this->assign("info",$info);

        $this->display("Member:accountWithdrawals");

    }
    //充值
    public function rechager(){

        $yue = yue();
        $this->assign("yue",$yue);

        $this->display("Member:accountRecharge");

    }
    //修改微信绑定
    public function weiuser(){
        $yue = yue();
        $this->assign("yue",$yue);
        $this->display("Member:accountModify");
    }
    //微信二维码
    public function weicode(){
        session('login_http_referer',null);
        session('login_http_member',null);
        $appid=C('wxappid');
        $cid=session("user.MemberId");
        $cid=authcode($cid,"ENCODE");

        $redirect_uri =urlencode("http://".$_SERVER['HTTP_HOST'].U("User/Apipay/weiuser",array('cid'=>$cid)));
        if(is_HTTPS()){
            $redirect_uri =urlencode("https://".$_SERVER['HTTP_HOST'].U("User/Apipay/weiuser",array('cid'=>$cid)));
        }

        //echo $redirect_uri;
            //urlencode ( 'http://www.afefgrw.top/index.php/Home/Index/aass' );
            //urlencode ( "http://".$_SERVER['SERVER_NAME'].U("User/Apipay/weiuser",array('cid'=>$cid)) );
        $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
        //echo $url;
        qrcode($url);

    }

    //修改头像
    public function headimg(){
        session('login_http_referer',null);
        session('login_http_member',null);
        $setting=C('UPLOAD_SITEIMG_QINIU');
        $type = I("request.zzp");
        switch($type){
            case "imgfile":
                $set_achives = C("IMGPROFILE");
                $setting['driverConfig']['domain'] = $set_achives['domain'];
                $setting['driverConfig']['bucket'] = $set_achives['bucket'];
                break;

        }
        $Upload = new \Think\Upload($setting);
//        $aa=$_POST['fileInput'];
//        print_r($_GET);exit;
        $aa =$_FILES;
       // echo 111;exit;
        $info = $Upload->upload($aa);
        //print_r($info);
        if(!$info) {// 上传错误提示错误信息
            $this->error($Upload->getError());
        }else{// 上传成功 获取上传文件信息
            foreach($info as $file){
                //$this->success("上传成功",$file['url']);
                $HeadImg['HeadImg'] = basename($file['url']);
                $map['MemberID'] = session("user.MemberId");
                $res =M("memberprofile")->where($map)->save($HeadImg);


                $url['url']= empty($type)?$file['url']:Qiniu_Sign($file['url'],86400,"imgfile","imageView2/1/w/200/h/200/&");
                $user = session('user');
                $user['HeadImg'] =$HeadImg['HeadImg'];
                session("user",$user);
                $url['status']=1;
                echo json_encode($url,JSON_HEX_AMP);
            }
        }
    }

    //重新选择经济人
    public function zzr(){
        session('login_http_referer',null);
        session('login_http_member',null);
        $area =A("Portal/Area");
        $area->asgA();

        $zzr= null;
        if(!empty(I('get.AssetsID'))){
            $zzr['type'] = "assets";
            $zzr['id'] = I('request.AssetsID');

        }elseif(!empty(I('get.PackageID'))){
            $zzr['type'] = "package";
            $zzr['id'] = I('request.PackageID');

        }elseif(!empty(I('get.DebtID'))){
            $zzr['type'] = "debt";
            $zzr['id'] = I('request.DebtID');

        }

        $this->assign('zzr',$zzr);
        $this->display("Member:selectAgent");
    }

    //查看投诉
    public function dissug(){
        $SuggID = I("request.sugid");
        $map['SuggID'] = $SuggID;
        $map['SendMember'] = session("user.MemberId");

        $sug_model = M("suggession");
        $info = $sug_model->where($map)->find();
        if(empty($info)){
            $this->error("非法参数");
        }
        //print_r($info);
        $this->assign("info",$info);
        $this->display("Member:suggesstionReplay");
    }

    //查看买断信息
    public function dealview(){

        session('login_http_referer',null);
        session('login_http_member',null);

        $codeid = I("request.codekey");
        $codeid = authcode($codeid);

        $pid = I("request.pid");
        $pid = authcode($pid);

        //echo $pid;exit;
        $order_model = M("order");
        $map['tb_order.id'] = $codeid;

        $map_his['InfoType'] = $pid;
        $map_his['MemberId'] = session("user.MemberId");
        $map_his['endtime'] =array('gt',date("Y-m-d H:i:s"));
        $isget = null;
        $info = null;$info_his=null;
        switch($pid){
            case 9;

                $info = $order_model->field("id,AssetsID")->join("tb_assetsproject ON tb_order.InfoNo=tb_assetsproject.SubID")
                   // ->join("tb_memberbuyhistory ON tb_assetsproject.AssetsID = tb_memberbuyhistory.ProjectID")
                    ->where($map)->find();
                $map_his['ProjectID'] = $info['AssetsID'];
                $info_his = M("memberbuyhistory")->where($map_his)->find();
                $isget=array('AssetsID'=>$info_his['ProjectID']);

                break;
            case 10;

                $info = $order_model->field("id,DebtID")->join("tb_debtproject ON tb_order.InfoNo=tb_debtproject.SubID")
                    // ->join("tb_memberbuyhistory ON tb_assetsproject.AssetsID = tb_memberbuyhistory.ProjectID")
                    ->where($map)->find();
                $map_his['ProjectID'] = $info['DebtID'];
                $info_his = M("memberbuyhistory")->where($map_his)->find();
                $isget=array('DebtID'=>$info_his['ProjectID']);
                break;
            case 11;

                $info = $order_model->field("id,PackageID")->join("tb_packageproject ON tb_order.InfoNo=tb_packageproject.SubID")
                    // ->join("tb_memberbuyhistory ON tb_assetsproject.AssetsID = tb_memberbuyhistory.ProjectID")
                    ->where($map)->find();
                $map_his['ProjectID'] = $info['PackageID'];
                $info_his = M("memberbuyhistory")->where($map_his)->find();
                $isget=array('PackageID'=>$info_his['ProjectID']);
                break;

            case 5;

                $info = $order_model->field("id,AssetsID")->join("tb_assetsproject ON tb_order.InfoNo=tb_assetsproject.SubID")
                    // ->join("tb_memberbuyhistory ON tb_assetsproject.AssetsID = tb_memberbuyhistory.ProjectID")
                    ->where($map)->find();

                $isget=array('AssetsID'=>$info['AssetsID']);
                $this->redirect("Home/lists/content",$isget);

                break;
            case 6;

                $info = $order_model->field("id,DebtID")->join("tb_debtproject ON tb_order.InfoNo=tb_debtproject.SubID")
                    // ->join("tb_memberbuyhistory ON tb_assetsproject.AssetsID = tb_memberbuyhistory.ProjectID")
                    ->where($map)->find();

                $isget=array('DebtID'=>$info['DebtID']);
                $this->redirect("Home/lists/content",$isget);
                break;
            case 4;

                $info = $order_model->field("id,PackageID")->join("tb_packageproject ON tb_order.InfoNo=tb_packageproject.SubID")
                    // ->join("tb_memberbuyhistory ON tb_assetsproject.AssetsID = tb_memberbuyhistory.ProjectID")
                    ->where($map)->find();

                $isget=array('PackageID'=>$info['PackageID']);
                $this->redirect("Home/lists/content",$isget);
                break;

        }
        if(!empty($info_his)){
            $isget['cdos'] = authcode($info['id'],"EDCODE");
            $isget['his'] =  authcode($info_his['ID'],"EDCODE");
            $this->redirect("Home/lists/content",$isget);
        }else{
            $this->error("购买的产品已过期");
        }

    }
    //用户余额变动记录
    public function yuehis(){
        $User = M('memberblancellog'); // 实例化User对象

        $map['MemberId'] =session("user.MemberId");
        $count      = $User->where($map)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->where($map)->order('CreateTime DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        if(is_mobile()){
            $this->display("mobile@User:reChange");
        }else{
            $this->display("Member:yuehis");
        }


    }
    //用户冻结金额变动记录
    public function freehis(){
        $User = M('memberfreezelog'); // 实例化User对象
        $map['MemberId'] =session("user.MemberId");
        $count      = $User->where($map)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->where($map)->order('CreateTime DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display("Member:freehis");
    }
    //培训资料
    public function train(){
        $map['type'] = 19;
        $count      =  M()->table("sys_articlescrap")->where($map)->order(array('no' => 'asc','createtime' => 'desc'))->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list =  M()->table("sys_articlescrap")->where($map)->order(array( 'no' => 'asc','createtime' => 'desc'))->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign("list",$list);
        //print_r($list);
        $this->display("Member:train");
    }
    public function trainview(){
        if(session('user.MemberType') == 4||session('user.MemberStatu') > 1){
            $map['id'] = authcode(I("request.tid"));
            $info      =  M()->table("sys_articlescrap")->where($map)->find();
            $this->assign("info",$info);
            $this->display("Member:trainningdetail");
        }else{
            exit("非法参数访问");
        }


    }
    //买断尽调
    public function deal(){
        session('login_http_referer',null);
        session('login_http_member',null);
        $type = I('request.type');
        $buyid = I('request.buyid');
        $ismain = I('request.ismian');

        $day_p = I("request.day");

        $day_p = floatval($day_p);
        $ProductName = null;
        //preg_match('/^[0-9]+([.]{1}[0-9]+){0,1}$/',$day_p,$day_res);
        //print_r($day_res);exit;
        if(empty($day_p)||$day_p< 6 ){

            $this->error("买断天数最少一个星期");
        }

        $info = null;$ProductID=null;
        switch($type){
            case "debt":
                $asset_model = M('debtproject');
                $map['DebtID'] =$buyid;
                $ProductID =10;
                $info = $asset_model->where($map)->find();
                $ProductName = "债权买断";
                //echo "debt" ;exit;
                break;
            case "package";
                $asset_model = M('packageproject');
                $map['PackageID'] =$buyid;
                $map['Ismain'] =$ismain;
                if($map['Ismain'] == 0){
                    $map['SubID'] = I("request.SubID");
                }
                $ProductID =11;
                $ProductName = "资产包买断";
                $info = $asset_model->where($map)->find();
                //echo "package" ;exit;
                break;
            case "assets":
                $asset_model = M('assetsproject');
                $map['AssetsID'] =$buyid;
                $ProductID =9;
                $ProductName = "实物买断";
                $info = $asset_model->where($map)->find();
                break;
            default;
                $this->error("illegal parameter！！");
        }





        $CodeGroup['CodeGroup'] =10125;
        $codeval =    M()->table("sys_code")->where($CodeGroup)->find();

//        $CodeGroup['CodeGroup'] =10108;
//        $orging =    M()->table("sys_code")->where($CodeGroup)->find();

        if(!empty($info)){
            // print_r($info);exit;
            $ordermap['OrderStatue'] = array("between",'1,2');
            $ordermap['Type'] =5;
            $ordermap['ProductID'] =  $ProductID;
            $ordermap['InfoNo'] =  $info['SubID'];
            $ordermap['CreateUser'] =session("user.MemberId");
            $order = M("order");

            $res = $order->where($ordermap)->order("id DESC")->find();


            //业务宗号
            $data['sn'] = date("YmdHis").func_getRandString(4);
            //产品ID
            $data['ProductID'] = $ProductID;
            //产品名称
            $data['ProductName'] = $ProductName;
            //产品描述
            $data['ProductDesc'] =  $info['SubName'];
            //订单类型
            $data['Type'] =5;
            //成交价


            if($day_p>=30){
                $data['OrgPrice']=(($info['BuyPrice']*$codeval['CodeValue'])*$day_p);
                $data['DealPrice'] =(($info['BuyPrice']*$codeval['CodeValue'])*$day_p);

            }else{
                $data['OrgPrice']=$info['BuyPrice']*$day_p;
                $data['DealPrice'] = ($info['BuyPrice']*$day_p);
            }


//            $data['OrgInt']= $info['ViewPrice']*$orging['CodeValue'];
//            $data['DealInt']= $info['ViewPrice']*$orging['CodeValue']*$codeval['CodeValue'];
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

                        //天津购买记录
                        $memberbuyhistory = M("memberbuyhistory");
                        $datas['InfoType'] =$ProductID;
                        $datas['ProjectID'] =$buyid;
                        $datas['MemberId'] = session("user.MemberId");
                        $datas['ddstatus'] =1;
                        $res_his = $memberbuyhistory->where($datas)->find();
                        if(empty($res_his)){
                            $datas['CreateTime'] = date("Y-m-d H:i:s");
                            $res_day = I("request.day");
                            $datas['statrtime'] = date("Y-m-d H:i:s");
                            $datas['endtime'] = date("Y-m-d H:i:s",strtotime('+'.$res_day.' day'));
                            if($memberbuyhistory->create($datas)){
                                $memberbuyhistory->add();
                            }
                        }else{
                            $res_day = I("request.day");
                            $datas['statrtime'] = date("Y-m-d H:i:s");
                            $datas['endtime'] = date("Y-m-d H:i:s",strtotime('+'.$res_day.' day'));
                            if($memberbuyhistory->create($datas)){
                                $memberbuyhistory->where($res_his)->save();
                            }
                        }

                        $bas = authcode($result,"ENCODE");
                        $type = authcode($type,"ENCODE");
                        $codetype = authcode('5',"ENCODE");
                        $this->redirect("User/Payment/index",array('codekey'=>$bas,'type'=>$type,'codetype'=>$codetype));
                    }else{
                        $this->error($order->getError());
                    }
                }else{
                    if($res['OrderStatue']==1){
                        $result = $order->where($ordermap)->save();
                    }elseif($res['OrderStatue']==2){

                        $result = $order->add();
                        $res['id'] = $result;
                        //天津购买记录
                        $memberbuyhistory = M("memberbuyhistory");
                        $datas['InfoType'] =$ProductID;
                        $datas['ProjectID'] =$buyid;
                        $datas['MemberId'] = session("user.MemberId");
                        $datas_time['ddstatus'] = 1;
                        $res_his = $memberbuyhistory->where($datas)->where($datas_time)->find();
//                        print_r($res_his);
//                        echo 1111;exit;
                        if(strtotime($res_his['endtime'])<time()){
                            $his_data['ddstatus'] = 2;
                            $memberbuyhistory->where($res_his)->save($his_data);

                            $datas['CreateTime'] = date("Y-m-d H:i:s");
                            $res_day = I("request.day");
                            $datas['statrtime'] = date("Y-m-d H:i:s");
                            $datas['endtime'] = date("Y-m-d H:i:s",strtotime('+'.$res_day.' day'));
                            if($memberbuyhistory->create($datas)){
                                $memberbuyhistory->add();
                            }

                        }else{
                            $this->error("你已购买此商品，无需重复购买。");
                        }

//                        if(empty($res_his)){
//                            $datas['CreateTime'] = date("Y-m-d H:i:s");
//                            $res_day = I("request.day");
//                            $datas['statrtime'] = date("Y-m-d H:i:s");
//                            $datas['endtime'] = date("Y-m-d H:i:s",strtotime('+'.$res_day.' day'));
//                            if($memberbuyhistory->create($datas)){
//                                $memberbuyhistory->add();
//                            }
//                        }else{
//                            $res_day = I("request.day");
//                            $datas['statrtime'] = date("Y-m-d H:i:s");
//                            $datas['endtime'] = date("Y-m-d H:i:s",strtotime('+'.$res_day.' day'));
//                            if($memberbuyhistory->create($datas)){
//                                $memberbuyhistory->where($res_his)->save();
//                            }
//                        }

                        //$this->error("你已购买此商品，无需重复购买。");
                    }

                    if($result){
                        $bas = authcode($res['id'],"ENCODE");
                        $type = authcode($type,"ENCODE");
                        $codetype = authcode('5',"ENCODE");
                        $this->redirect("User/Payment/index",array('codekey'=>$bas,'type'=>$type,'codetype'=>$codetype));
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

    //合伙经济人
    public function  partner(){
        //$info = Qiniu_Sign("5d761271eb3e49058f23551d8b9e0ff2.pdf",$etime = 86400,$type="zip");

        session('login_http_referer',null);
        session('login_http_member',null);
        $username = I("request.name");
        $userphone = I("request.phone");
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

        !empty($username)?$user_map['tb_memberprofile.RealName'] =array("like","%".$username."%"):"";
        !empty($userphone)?$user_map['tb_memberprofile.CellPhone'] =array("like","%".$userphone."%"):"";
        $user_model = M("member");
        $user_map['tb_member.RecommendMember'] = session("user.MemberId");

        $count= $user_model->join("tb_memberprofile ON tb_memberprofile.MemberID =tb_member.MemberId ")->where($user_map)->count();

        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $show       = $Page->show();// 分页显示输出
        $info = $user_model
            ->field("tb_member.MemberId,tb_member.MemberName,tb_memberprofile.RealName,tb_memberprofile.CellPhone,tb_memberprofile.Street,a.name as pname,b.name as cname")
            ->join("tb_memberprofile ON tb_memberprofile.MemberID =tb_member.MemberId ")
            ->join("LEFT JOIN tb_area as a ON tb_memberprofile.Province=a.id")
            ->join("LEFT JOIN tb_area as b ON tb_memberprofile.City=b.id")
            ->where($user_map)->limit($Page->firstRow.','.$Page->listRows)->select();

       // print_r($info);
        $this->assign("list",$info);
        $this->assign('page',$show);// 赋值分页输出
        $this->display("Member:myAgent");
    }
    //合伙订单
    public function partnerorder(){
        session('login_http_referer',null);
        session('login_http_member',null);

        //搜索条件
        $statrtime = I('get.starttime');
        $endtime = I('get.endtime');
        if(!empty($statrtime)&&!empty($endtime)){
            $order_map['tb_order.CreateTime'] =array('between',$statrtime.",".$endtime);
        }

        $messagetype = empty(I("get.type"))?0:I("get.type");
        switch($messagetype){
            case 1:
                $order_map['tb_order.Type'] =1;
                break;
            case 2:
                $order_map['tb_order.Type'] =array('in','2,5');
                break;
            case 3:
                $order_map['tb_order.Type'] =3;
                break;
            case 4:
                $order_map['tb_order.Type'] =4;
                break;
            default;

        }

        //
        $user_model = M("member");
        $user_map['tb_member.RecommendMember'] = session("user.MemberId");

        $user_in= $user_model->field("MemberId,MemberName")->where($user_map)->select();
        $user_in_array=null;
        $user_name = null;
        foreach($user_in as $key=>$value ){
            $user_in_array[] = $value['MemberId'];
            $user_name[$value['MemberId']] = $value['MemberName'];
        }
        if(is_array($user_in_array)){
            $order_model = M("order");

            $order_map['CreateUser'] = array("in",$user_in_array);
            $order_map['OrderStatue'] =2;
            $count= $order_model->where($order_map)->count();
            $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $Page->setConfig('prev','上一页');
            $Page->setConfig('next','下一页');
            $show       = $Page->show();// 分页显示输出
            $order_info = $order_model->field("id,sn,ProductID,ProductName,DealPrice,Type,CreateUser,CreateTime")->where($order_map)->select();
            $this->assign("list",$order_info);

            $this->assign("name",$user_name);
            $this->assign('page',$show);// 赋值分页输出
        }

        $this->display("Member:partnerOrder");
    }
    //合伙人项目
    public function partnerproject(){
        session('login_http_referer',null);
        session('login_http_member',null);


        //搜索条件
        $title= I("request.title");
        $statrtime = I('get.starttime');
        $endtime = I('get.endtime');
        if(!empty($statrtime)&&!empty($endtime)){
            $info_map['CreateTime'] =array('between',$statrtime.",".$endtime);
        }
        !empty($title)?$info_map['Title'] =array("like","%".$title."%"):"";
        $messagetype = empty(I("get.type"))?0:I("get.type");
        switch($messagetype){
            case 0:
                $info_map['Source'] =array('in','2,3,4,5,6');
                break;
            case 1:
                $info_map['Source'] =1;
                break;
            case 2:
                $info_map['Source'] =array('in','2,3,4');
                break;
            case 6:
                $info_map['Source'] =6;
                break;

            default;

        }

        //

        //
        $user_model = M("member");
        $user_map['tb_member.RecommendMember'] = session("user.MemberId");

        $user_in= $user_model->field("MemberId,MemberName")->where($user_map)->select();
        $user_in_array=null;
        $user_name = null;
        foreach($user_in as $key=>$value ){
            $user_in_array[] = $value['MemberId'];
            $user_name[$value['MemberId']] = $value['MemberName'];
        }

        $assets_model = M("assets");
        if(is_array($user_in_array)){
            $info_map['memberid'] =array("in",$user_in_array);
            $count = $assets_model->where($info_map)->count();
            $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $Page->setConfig('prev','上一页');
            $Page->setConfig('next','下一页');
            $show       = $Page->show();// 分页显示输出

            $info = $assets_model->field("AssetsID,Title,Source,ProPrice,AssetsStatue,memberid,CreateTime")->where($info_map)->select();
            //print_r($info);

            $this->assign("name",$user_name);
            $this->assign("list",$info);
            $this->assign('page',$show);// 赋值分页输出
        }

        $this->display("Member:partnerProject");
    }

}