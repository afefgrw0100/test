<?php
namespace User\Controller;
use Think\Controller;
class ApipayController extends Controller
{
    public function __construct()
    {
//        if (sp_is_user_login()) {
//            $this->redirect("User/Member/index");
//        }
        parent::__construct();
    }
    public function weiuser(){
        $appid = C("wxappid");
        $secret =C("wxsecret");
        $code = $_GET["code"];

//第一步:取得openid
        $oauth2Url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
        $oauth2 =  $this->getJson($oauth2Url);

//第二步:根据全局access_token和openid查询用户信息
        $access_token = $oauth2["access_token"];
        $openid = $oauth2['openid'];
        $get_user_info_url = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
        $userinfo = $this->getJson($get_user_info_url);
        $this->assign("openid",$userinfo['openid']);

        $cid = I("request.cid");
        $this->assign("cid",$cid);
        $map['MemberId']= authcode($cid);
        $info = M('member')->field("MemberName")->where($map)->find();
        $this->assign("info",$info);


        $this->display("Member:weiuser");
    }
    public function dooppid(){
        $MemberId = authcode(I("request.MemberId"));
        $oppid = I("request.openid");
        $Password = I("request.Password");


        $wherr['MemberId'] =$MemberId;
        $wherr['Password'] = sp_password($Password);
        //echo $wherr['Password'];exit;
        $data['openid'] = $oppid;
        $user = M('member') ;
        $res = $user->where($wherr)->save($data);
        //echo $user->getLastSql();exit;
        if($res){
            $map['MemberID'] =$MemberId;
           // M('memberprofile')->where($map)->save($data);
            $this->success("绑定成功");
        }else{
            $this->error("验证错误,请不要重复绑定相同微信");
        }
    }
    public function ccsa(){
        //scope=snsapi_userinfo实例
        $appid='wx0e2646aa1a4467f5';
        $redirect_uri = urlencode ( 'http://www.afefgrw.top/index.php/Home/Index/aass' );
        $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
        header("Location:".$url);


    }
    public function aass(){
        $appid = C("wxappid");
        $secret =C("wxsecret");
        $code = $_GET["code"];

//第一步:取得openid
        $oauth2Url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
        $oauth2 = getJson($oauth2Url);

//第二步:根据全局access_token和openid查询用户信息
        $access_token = $oauth2["access_token"];
        $openid = $oauth2['openid'];
        $get_user_info_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid&lang=zh_CN";
        $userinfo = $this->getJson($get_user_info_url);

//打印用户信息

        print_r($userinfo);


    }
    public function getJson($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output, true);
    }
    //支付回调
    public function notify(){
        // 导入微信支付sdk
        Vendor('Weixinpay.Weixinpay');
        $wxpay=new \Weixinpay();
        $result=$wxpay->notify();
        //$result['out_trade_no']="20170531152013Fihr";
        if ($result) {
            $test['txt']=json_encode($result);
            M("test")->add($test);
            // 验证成功 修改数据库的订单状态等 $result['out_trade_no']为订单号out_trade_no
            $ProductName['sn'] = $result['out_trade_no'];
            $ProductName['OrderStatue'] =1;
            $data['OrderStatue']=2;
            $data['UpdateTime']=date("Y-m-d H:i:s");
            $data['CheckoutTime']= date("Y-m-d H:i:s");
            $order = M('order');
            if($order->create($data)){
                //跟新订单状态

                $ores = $order->where($ProductName)->save();
                if($ores){
                    $ProductName['OrderStatue'] =2;
                    $info = $order->where($ProductName)->find();
                    $this->balancepayment($info);
                }
                //print_r($order->getLastSql());exit;


                //CreateUser记录oppid;
                $oppid_map['MemberId'] = $info['CreateUser'];
                $oppid['openid'] = $result['openid'];
                M("member")->where($oppid_map)->save($oppid);

                $Type = $info['Type'];
                $ProductID['ProductID'] = $info['ProductID'];
                $InfoNo = $info['InfoNo'];
                //echo $Type;
                switch($Type){
                    case 1;
                        $this->pub($ProductID,$info);
                        break;
                    case 2;
                        $this->buy($info);
                        break;
                    case 3:
                        $this->eco($info);
                        break;
                    case 4:
                        $count['MemberId'] =$info['InfoNo'];
                        $cdata['Balance'] = $info['DealPrice'];
                        $cres = M("memberaccount")->where($count['MemberId'])->find();
                        if(empty($cres)){
                            $cdata['MemberId'] =$info['InfoNo'];
                            M("memberaccount")->add($cdata);
                        }else{
                            M("memberaccount")->where($count)->setInc("Balance",$cdata['Balance']);
                        }

                        break;
                    case 5:
                        //买断回调

                        $this->dealdili($info);
                        break;
                }
            }
        }
    }

    //修改用户余额
    private function balancepayment($result){
        if(!empty($result)){
            $balance = $result['balance'];
            $memberid =  $result['CreateUser'];
            M()->startTrans();

            //修改余额
            $free_where['MemberId'] =$memberid;
            $balanceinfo =  M("memberaccount")->where($free_where)->find();
            M("memberaccount")->where($free_where)->setDec("Balance",$result['DealPrice']);

            //修改变动记录
            $cdata['SN'] = date("YmdHis").func_getRandString(4);
            $cdata['MemberId'] = $memberid;
            $cdata['PreIntegral'] = $balanceinfo['Balance'];
            $cdata['NxtIntegral'] = $balanceinfo['Balance']-$balance;
            $cdata['OffSetValue'] = -$balance;
            $cdata['Remark'] = "余额支付";
            $cdata['CreateTime'] = date("Y-m-d H:i:s");
            $cdata['CreateUser'] = $memberid;
            M("memberblancellog")->add($cdata);
            M()->commit();

        }

    }
    public function getAllMsgCount(){
        $order =M("order");
        $id['id']= authcode(I("post.msg"));
        $id['OrderStatue'] =2;
        $count = $order->where($id)->find();
        return $count;
    }

    public function getAllMsgTradeCode(){
       // $oldCount = $this->getAllMsgCount();
        //echo 111;exit;
        $time_count=1;
        while(true){
            set_time_limit(0);
            ob_flush();
            flush();
            $time_count++;
            $newCount = $this->getAllMsgCount();
            if(!empty($newCount)){
                $type = $newCount['Type'];
                $ProductID = $newCount ['ProductID'];
                if($type==2){
                    switch($ProductID){
                        //资产包购买
                        case 4:
                            $info_map['SubID'] = $newCount['InfoNo'];
                            $info_id = M("packageproject")->where($info_map)->find();
                            $this->success("支付成功",U('Home/lists/content',array('PackageID'=>$info_id['PackageID'],'card'=>authcode(session('user.MemberId'),'ENCODE'))));
                            break;
                        //实物资产购买
                        case 5:
                            $info_map['SubID'] = $newCount['InfoNo'];
                            $info_id = M("assetsproject")->where($info_map)->find();
                            $this->success("支付成功",U('Home/lists/content',array('AssetsID'=>$info_id['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE'))));
                            break;
                        //实物资产购买
                        case 13:
                            $info_map['SubID'] = $newCount['InfoNo'];
                            $info_id = M("assetsproject_rent")->where($info_map)->find();
                            $this->success("支付成功",U('Home/lists/content',array('AssetsIDrent'=>$info_id['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE'))));
                            break;
                        //债权购买
                        case 6:
                            $info_map['SubID'] = $newCount['InfoNo'];
                            $info_id = M("debtproject")->where($info_map)->find();
                            $this->success("支付成功",U('Home/lists/content',array('DebtID'=>$info_id['DebtID'],'card'=>authcode(session('user.MemberId'),'ENCODE'))));
                            break;


                    }
                }else{
                    $this->success("支付成功",U('User/Member/index'));
                }
               // $data = M()->query($sql);
               // $this->success("{info: \"支付ok\", status: 0, url: \"\"}");

               // $this->ajaxReturn($newCount);
                break;
            }
            sleep(1);
            //一定的时间后没有数据变化也跳出
            if($time_count >= 5){
                $data = "支付超时重新请求";
                $this->error($data);
                break;
            }
        }
    }
    //发布信息
    private function pub($ProductID,$info){
        //echo $ProductID."zzz".$InfoNo;
        $ProductID = $ProductID;
//        echo $ProductID['ProductId'];
//        print_r( $ProductID['ProductId']);
        $InfoNo = $info['InfoNo'];
        $product = M("product")->field("ProductId,ProductType,CodeValue")->where($ProductID)->join("sys_code ON sys_code.CodeID=tb_product.ProductType")->find();

        //echo M("product")->getLastSql();exit;
        $type = $product['CodeValue'];
        switch($type){
            case "assets":
                $map['AssetsID'] = $InfoNo;
                $data['AssetsStatue'] = 1;
                M("assets")->where($map)->setField($data);

                $mobile =   M("assets")
                            ->field("tb_memberprofile.CellPhone,tb_memberprofile.MemberID")
                            ->join("tb_memberprofile ON tb_memberprofile.MemberID = tb_assets.DueDiligenceMember")
                            ->where($map)->find();
                sendTemplateSMS_toadd($mobile['CellPhone'],array($info['sn']),145979);
               // echo  M("assets")->getLastSql();
                break;
            case "assetsrent":
                $map['AssetsID'] = $InfoNo;
                $data['AssetsStatue'] = 1;
                M("assets_rent")->where($map)->setField($data);

                $mobile =   M("assets_rent")
                    ->field("tb_memberprofile.CellPhone,tb_memberprofile.MemberID")
                    ->join("tb_memberprofile ON tb_memberprofile.MemberID = tb_assets_rent.DueDiligenceMember")
                    ->where($map)->find();
                sendTemplateSMS_toadd($mobile['CellPhone'],array($info['sn']),145979);
                // echo  M("assets")->getLastSql();
                break;
            case "debt":
                $map['DebtID'] = $InfoNo;
                $data['AssetsStatue'] = 1;
                M("debt")->where($map)->setField($data);

                $mobile =   M("debt")
                    ->field("tb_memberprofile.CellPhone,tb_memberprofile.MemberID")
                    ->join("tb_memberprofile ON tb_memberprofile.MemberID = tb_debt.DueDiligenceMember")
                    ->where($map)->find();
                sendTemplateSMS_toadd($mobile['CellPhone'],array($info['sn']),145979);
                break;
            case "package":
                $map['PackageID'] = $InfoNo;
                $data['AssetsStatue'] = 1;
                M("package")->where($map)->setField($data);

                $mobile =   M("package")
                    ->field("tb_memberprofile.CellPhone,tb_memberprofile.MemberID")
                    ->join("tb_memberprofile ON tb_memberprofile.MemberID = tb_package.DueDiligenceMember")
                    ->where($map)->find();
                sendTemplateSMS_toadd($mobile['CellPhone'],array($info['sn']),145979);
                break;
        }
    }
    //购买禁掉
    private  function buy($info){
        $info = $info;
        $memberbuyhistory = M("memberbuyhistory");

        $datas['InfoType'] =$info['ProductID'];
        $datas['ProjectID'] =$info['InfoNo'];
        $datas['CreateTime'] = date("Y-m-d H:i:s");
        $datas['MemberId'] = $info['CreateUser'];

        if($memberbuyhistory->create($datas)){
            $memberbuyhistory->add();
        }

        $put_type = $info['ProductID'];

        //跟新经济人信息
       // $dili_map['DueDiligenceMember'] =1;
        $data_map = null;
        switch($put_type){
            //资产包购买
            case 4:
                //获取经济人id

                $data_map['tb_packageproject.SubID'] = $info['InfoNo'];
                $data_map['tb_package.AssetsStatue'] =4;
                $pid = M("package")->field("tb_package.PackageID as infoid,tb_package.DueDiligenceMember")->join("tb_packageproject ON tb_package.PackageID = tb_packageproject.PackageID")->where($data_map)->find();
                $MemberId = $pid['DueDiligenceMember'];
                $this->couyue($info,$MemberId);
                $assetsdata_id['ID']=$pid['infoid'];
                M('packagedata')->where($assetsdata_id)->setInc("BuyCount");
                break;
            //实物资产购买
            case 5:
                $data_map['tb_assetsproject.SubID'] = $info['InfoNo'];
                $data_map['tb_assets.AssetsStatue'] =4;
                $pid = M("assets")->field("tb_assets.AssetsID as infoid,tb_assets.DueDiligenceMember")->join("tb_assetsproject ON tb_assets.AssetsID = tb_assetsproject.AssetsID")->where($data_map)->find();
                $MemberId = $pid['DueDiligenceMember'];
                $this->couyue($info,$MemberId);
                $assetsdata_id['ID']=$pid['infoid'];
                //print_r($assetsdata_id);
                M('assetsdata')->where($assetsdata_id)->setInc("BuyCount");
                //echo  M('assetsdata')->getLastSql();
                break;
            //实物资产购买
            case 13:
                $data_map['tb_assetsproject_rent.SubID'] = $info['InfoNo'];
                $data_map['tb_assets_rent.AssetsStatue'] =4;
                $pid = M("assets_rent")->field("tb_assets_rent.AssetsID as infoid,tb_assets_rent.DueDiligenceMember")->join("tb_assetsproject_rent ON tb_assets_rent.AssetsID = tb_assetsproject_rent.AssetsID")->where($data_map)->find();
                $MemberId = $pid['DueDiligenceMember'];
                $this->couyue($info,$MemberId);
                $assetsdata_id['ID']=$pid['infoid'];
                //print_r($assetsdata_id);
                M('assetsdata_rent')->where($assetsdata_id)->setInc("BuyCount");
                //echo  M('assetsdata')->getLastSql();
                break;
            //债权购买
            case 6:
                $data_map['tb_debtproject.SubID'] = $info['InfoNo'];
                $data_map['tb_debt.AssetsStatue'] =4;
                $pid = M("debt")->field("tb_debt.DebtID as infoid,tb_debt.DueDiligenceMember")->join("tb_debtproject ON tb_debt.DebtID = tb_debtproject.DebtID")->where($data_map)->find();
                $MemberId = $pid['DueDiligenceMember'];
                $this->couyue($info,$MemberId);
                $assetsdata_id['ID']=$pid['infoid'];
                M('debtdata')->where($assetsdata_id)->setInc("BuyCount");
                break;

        }


    }
    //买断禁掉
    private function dealdili($info){
        $info = $info;
        //print_r($info);exit;
//        $memberbuyhistory = M("memberbuyhistory");
//
//        $datas['InfoType'] =$info['ProductID'];
//        $datas['ProjectID'] =$info['InfoNo'];
//        $datas['CreateTime'] = date("Y-m-d H:i:s");
//        $datas['MemberId'] = $info['CreateUser'];
//
//        if($memberbuyhistory->create($datas)){
//            $memberbuyhistory->add();
//        }




        $put_type = $info['ProductID'];

        //跟新经济人信息
        // $dili_map['DueDiligenceMember'] =1;
        $data_map = null;
        $pid = null;
        switch($put_type){
            //资产包购买
            case 11:
                //获取经济人id

                $data_map['tb_packageproject.SubID'] = $info['InfoNo'];
                $data_map['tb_package.AssetsStatue'] =4;
                $pid = M("package")->field("tb_package.PackageID as infoid,tb_package.DueDiligenceMember")->join("tb_packageproject ON tb_package.PackageID = tb_packageproject.PackageID")->where($data_map)->find();
                $MemberId = $pid['DueDiligenceMember'];
                $this->couyue($info,$MemberId);

                //改变信息状态
                $deal_data['AssetsStatue'] =  7;

                $deal_map['PackageID'] =$pid['infoid'];

                $deal  =M("package")->where($deal_map)->save($deal_data);

                //写入买断时间


                $assetsdata_id['ID']=$pid['infoid'];
                M('packagedata')->where($assetsdata_id)->setInc("BuyCount");
                break;
            //实物资产购买
            case 9:
                $data_map['tb_assetsproject.SubID'] = $info['InfoNo'];
                $data_map['tb_assets.AssetsStatue'] =4;
                $pid = M("assets")->field("tb_assets.AssetsID as infoid,tb_assets.DueDiligenceMember")->join("tb_assetsproject ON tb_assets.AssetsID = tb_assetsproject.AssetsID")->where($data_map)->find();
                $MemberId = $pid['DueDiligenceMember'];
                $this->couyue($info,$MemberId);

                //改变信息状态
                $deal_data['AssetsStatue'] =  7;
                $deal_map['AssetsID'] =$pid['infoid'];
                $deal  =M("assets")->where($deal_map)->save($deal_data);

                $assetsdata_id['ID']=$pid['infoid'];
                M('assetsdata')->where($assetsdata_id)->setInc("BuyCount");
                break;
            //实物资产购买
            case 14:
                $data_map['tb_assetsproject_rent.SubID'] = $info['InfoNo'];
                $data_map['tb_assets_rent.AssetsStatue'] =4;
                $pid = M("assets_rent")->field("tb_assets_rent.AssetsID as infoid,tb_assets_rent.DueDiligenceMember")->join("tb_assetsproject_rent ON tb_assets_rent.AssetsID = tb_assetsproject_rent.AssetsID")->where($data_map)->find();
                $MemberId = $pid['DueDiligenceMember'];
                $this->couyue($info,$MemberId);

                //改变信息状态
                $deal_data['AssetsStatue'] =  7;
                $deal_map['AssetsID'] =$pid['infoid'];
                $deal  =M("assets_rent")->where($deal_map)->save($deal_data);

                $assetsdata_id['ID']=$pid['infoid'];
                M('assetsdata_rent')->where($assetsdata_id)->setInc("BuyCount");
                break;
            //债权购买
            case 10:
                $data_map['tb_debtproject.SubID'] = $info['InfoNo'];
                $data_map['tb_debt.AssetsStatue'] =4;
                $pid = M("debt")->field("tb_debt.DebtID as infoid,tb_debt.DueDiligenceMember")->join("tb_debtproject ON tb_debt.DebtID = tb_debtproject.DebtID")->where($data_map)->find();
                $MemberId = $pid['DueDiligenceMember'];
                $this->couyue($info,$MemberId);

                //改变信息状态
                $deal_data['AssetsStatue'] =  7;
                $deal_map['DebtID'] =$pid['infoid'];

                $deal  =M("debt")->where($deal_map)->save($deal_data);

                $assetsdata_id['ID']=$pid['infoid'];
                M('debtdata')->where($assetsdata_id)->setInc("BuyCount");
                break;
        }

        //天津购买记录
        $memberbuyhistory = M("memberbuyhistory");
        $datas['InfoType'] =$info['ProductID'];
        $datas['ProjectID'] =$pid['infoid'];
        $datas['MemberId'] = $info['CreateUser'];
        $datas['ddstatus'] =1;

        $res_his = $memberbuyhistory->where($datas)->order("ID DESC")->find();

        $res_day =strtotime($res_his['endtime'])-strtotime($res_his['statrtime']);
        $datas['statrtime'] = date("Y-m-d H:i:s");
        $datas['endtime'] = date("Y-m-d H:i:s",time()+$res_day);
        if($memberbuyhistory->create($datas)){
            $memberbuyhistory->where($res_his)->save();
        }
    }
    //跟新账户余额
    private function couyue($info,$MemberId){
        //获取经济人账户信息
        $info =$info;
        $MemberId = $MemberId;
        M()->startTrans();
        $res = null;
        $count_map['MemberId'] = $MemberId;
        $count = M("memberaccount")->where($count_map)->find();

        $CodeID['CodeID'] = 34;
        $codeval = M()->table("sys_code")->field("CodeID,CodeValue")->where($CodeID)->find();
        if(!empty($count)){

            $Balance['Balance'] = round($info['DealPrice']*$codeval['CodeValue'],2);
            $res= M("memberaccount")->where($count_map)->setInc("Balance",$Balance['Balance']);
        }

        $cdata['SN'] = date("YmdHis").func_getRandString(4);
        $cdata['MemberId'] = $MemberId;
        $cdata['PreIntegral'] = $count['Balance'];
        $cdata['NxtIntegral'] = $count['Balance']+  round($info['DealPrice']*$codeval['CodeValue'],2);
        $cdata['OffSetValue'] = round($info['DealPrice']*$codeval['CodeValue'],2);

        $sms_map['SubID'] = $info['InfoNo'];
        switch($info['ProductType']){
            case 4:
                $smsinfo = M('packageproject')->field("SubID,SubName")->where($sms_map)->find();

                $cdata['Remark'] = "资产包尽调购买";
                break;
            case 5:
                $smsinfo = M('assetsproject')->field("SubID,SubName")->where($sms_map)->find();
                $cdata['Remark'] = "实物资产尽调购买";
                break;
            case 6:
                $smsinfo = M('debtproject')->field("SubID,SubName")->where($sms_map)->find();
                $cdata['Remark'] = "债权尽调购买";
                break;
            case 9:
                $smsinfo = M('assetsproject')->field("SubID,SubName")->where($sms_map)->find();
                $cdata['Remark'] = "实物资产买断";
                break;
            case 10:
                $smsinfo = M('debtproject')->field("SubID,SubName")->where($sms_map)->find();
                $cdata['Remark'] = "债权买断";
                break;
            case 11:
                $smsinfo = M('packageproject')->field("SubID,SubName")->where($sms_map)->find();
                $cdata['Remark'] = "资产包买断";
                break;
            case 13:
                $smsinfo = M('assetsproject_rent')->field("SubID,SubName")->where($sms_map)->find();
                $cdata['Remark'] = "实物出租尽调购买";
                break;
            case 14:
                $smsinfo = M('assetsproject_rent')->field("SubID,SubName")->where($sms_map)->find();
                $cdata['Remark'] = "实物出租买断";
                break;
            default;
                $cdata['Remark'] = "购买尽调";
        }
        //$cdata['Remark'] = "购买尽调";
        $cdata['CreateTime'] =date("Y-m-d H:i:s");
        $cdata['CreateUser'] = "sytem";

        $res = M("memberblancellog")->add($cdata);
        if($res){
            M()->commit();
            $smsphone_map['MemberID'] = $MemberId;
            $smsphone = M('memberprofile')->field("MemberID,CellPhone")->where($smsphone_map)->find();
            sendTemplateSMS_toadd($smsphone['CellPhone'],array($smsinfo['SubName']),153892);
        }
    }
    //成为经济人
    private function eco($info){
        $info = $info;
        $member = M("member");
        $map['MemberId'] = $info['CreateUser'];
        $datas['MemberStatu'] = 2;
        $member->where($map)->save($datas);
    }

    /**
     * 公众号支付 必须以get形式传递 out_trade_no 参数
     * 示例请看 /Application/Home/Controller/IndexController.class.php
     * 中的weixinpay_js方法
     */
    public function pay(){
        // 导入微信支付sdk
        Vendor('Weixinpay.Weixinpay');
        $wxpay=new \Weixinpay();
        // 获取jssdk需要用到的数据
        $data=$wxpay->getParameters();
        //支付后通知返回页面
//       $data['out_trade_no'] = "20170531152013Fihr";
        $map['sn'] = $data['out_trade_no'];
        $orderinfo = M('order')->field("id,sn,ProductID")->where($map)->find();
        switch($orderinfo['ProductID']){
            case 1:
                $info = M('order')->field("id,sn,AssetsID")->join("tb_assetsproject ON tb_assetsproject.SubID = tb_order.InfoNo")->where($map)->find();
                $url =U('Home/lists/content',array('AssetsID'=>$info['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));
                break;
            case 13:
                $info = M('order')->field("id,sn,AssetsID")->join("tb_assetsproject_rent ON tb_assetsproject_rent.SubID = tb_order.InfoNo")->where($map)->find();
                $url =U('Home/lists/content',array('AssetsIDrent'=>$info['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));
                break;

        }


        $this->assign("url",$url);

        // 将数据分配到前台页面
        $assign=array(
            'data'=>json_encode($data)
        );
        $this->assign($assign);
        $this->display();
    }


}