<?php
namespace Brest\Controller;
use Think\Controller\RestController;
class IndexController extends RestController {
    protected $allowMethod    = array('get','post','put'); // REST允许的请求类型列表
    protected $allowType      = array('html','xml','json'); // REST允许请求的资源类型列表
    protected $defaultType = array('json');
    private $data = array('msg'=>'Without the data you need!');//

    //
    // 输出Info的html页面
    Public function read_get_html(){
        $this->data = $this->returndata();
        $this->response( $this->data,'xml');


    }
    // 输出Info的XML数据
    Public function read_get_xml(){
        $this->data = $this->returndata();
        $this->response( $this->data,'xml');

    }
    // 输出Info的XML数据
    Public function read_xml(){
        $this->data = $this->returndata();
        $this->response( $this->data,'xml');

    }
    // 输出Info的json数据
    Public function read_json(){
        $this->data = $this->returndata();
        $this->response( $this->data,'json');

    }


    private function returndata(){
        $act_type = I("request.acttype");
        switch($act_type){
            case "actlist";
                $this->data = $this->artic();
                break;
            case "actlistcontent";
                $this->data = $this->artcontent();
                break;
            case "assetlist";
                $this->data = $this->assetlist();
                break;
            case "assetcontent";
                $this->data=$this->assetcontent();
                break;
            case "debtlist":
                $this->data = $this->debtlist();
                break;
            case "debtcontent":
                $this->data = $this->debtcontent();
                break;
            case "packlist":
                $this->data = $this->packlist();
                break;
            case "packcontent":
                $this->data = $this->packcontent();
                break;
        }
        return $this->data;
    }
    //新闻列表
    private function artic(){
        $map_train['type'] = 11;
        $count      =  M()->table("sys_articlescrap")->where($map_train)->order(array('no' => 'asc','createtime' => 'desc'))->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list =  M()->table("sys_articlescrap")->field("id,title,createtime")->where($map_train)->order(array( 'no' => 'asc','createtime' => 'desc'))->limit($Page->firstRow.','.$Page->listRows)->select();
        return $list;
    }
    //新闻详细
    private function artcontent(){
        $art_id['id'] = I("request.actid");
        $info      =  M()->table("sys_articlescrap")->where($art_id)->find();
        return $info;

    }
    //实物资产列表
    private  function assetlist(){
        $assets = M("assets");
        $map['tb_assets.AssetsStatue'] =4;
        $info_assets_img  = $assets
            ->field("AssetsID,titimg,Title,ProPrice as ccint,Price as aaint,ProcessModle as protype,ViewCount,BuyCount")
            ->join("LEFT JOIN tb_assetsdata ON tb_assets.AssetsID = tb_assetsdata.ID")
            ->where($map)
            ->order(array( 'BuyCount' => 'desc','ViewCount' => 'asc'))->limit(8)->select();

        foreach($info_assets_img as $k=>$v){
            $info_assets_img[$k]['titimg'] =imgpublic($v['titimg']).'?imageView/2/w/120/h/120';
            $info_assets_img[$k]['discount'] =round($v['ccint']/$v['aaint'],1)*10;
            $info_assets_img[$k]['type'] ="assets";
        }
        return $info_assets_img;

    }
    //实物资产信息详细
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
            $shfe = shfeng( $map["tb_assets.AssetsID"],$card['MemberId'],3,"资产包分享");
            //echo $shfe;
        }
        $rescard = M("member")->field("MemberId")->where($card)->find();


        $info = $asset_model->join("LEFT JOIN tb_assetsdata ON tb_assets.AssetsID=tb_assetsdata.ID")->where($map)->find();
        $info = $asset_model->parseFieldsMap($info);

        if($info['AssetsStatue']!=4&&$info['AssetsStatue']!=7){
            if($info['agedili'] !=session('user.MemberId')){
                if($info['memberid'] !=session('user.MemberId')){
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
                echo '参数错误';exit;
            }else{
                $his_map['endtime'] =array('gt',date("Y-m-d H:i:s"));
                $his_map['MemberId'] = session('user.MemberId');
                $his_map['ID'] = authcode(I('request.his'));
                $his_map['ddstatus'] =1;
                $memberbuyhistory = M("memberbuyhistory")->where($his_map)->order("id DESC")->find();
                if(empty($memberbuyhistory)){
                    echo '参数错误';exit;
                }
                //echo  11221;exit;
            }
        }

        $wheremap["tb_assetsduedili.Usestat"]=1;
        $wheremap['tb_assetsduedili.AssetsID']  =  $map['tb_assets.AssetsID'];
        $infodili = M("assetsduedili")->where($wheremap)->find();
        if(empty($infodili)){
            $info = $info;
        }else{
            $info = array_merge($info,$infodili);
        }
        // print_r($info);exit;
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

        $info['processmodle']=C('processmodle')[$info['processmodle']];
        $info['address']=json_decode($info['address'],true);
        $info['source']=C('source')[$info['source']];
        $info['isinissue']=C('isorginpic')[$info['isinissue']];
        $info['assetstype']=C('assetstype')[$info['assetstype']];
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
//        $project_map['AssetsID'] = $map["tb_assets.AssetsID"];
//        $proinfo = M("assetsproject")->where($project_map)->field("SubID,ViewPrice,BuyPrice")->find();
//        $this->assign("proinfo",$proinfo);


        //print_r($dissinfo);
//        $this->assign('diss',$dissinfo);// 赋值数据集
//        //print_r($info);
//        $this->assign("asset",$info);


        $info['address'][0] = explode("|",$info['address'][0]);
        $info['address'][1] = explode("|",$info['address'][1]);
        $info['authpic'] = imgpublic($info['authpic'])."?imageView2/2/w/900";
        $info['realpic'] = imgpublic($info['realpic'])."?imageView2/2/w/900";
        $info['titimgs'] = imgpublic($info['titimgs'])."?imageView2/2/w/900";
        foreach($info['Images'] as $k=>$v){
            $info['Images'][$k] = imgpublic($v)."?imageView2/2/w/900";
        }
        $datainfo['diss'] = $dissinfo;
        $datainfo['content'] = $info;
        //print_r($datainfo);exit;
        return $datainfo;

    }
    //债权列表
    private function debtlist(){
        $debt = M("debt");
        $map['tb_debt.AssetsStatue'] =4;
        $info_debt_img =$debt
            ->field("DebtID,titimg,Title,ProPrice as ccint,Total as aaint,ProcessModle as protype,ViewCount,BuyCount")
            ->join("LEFT JOIN tb_debtdata ON tb_debt.DebtID = tb_debtdata.ID")
            ->where($map)->order(array( 'BuyCount' => 'desc','ViewCount' => 'asc'))->limit(8)->select();
        foreach($info_debt_img as $k=>$v){
            $info_debt_img[$k]['titimg'] =imgpublic($v['titimg']).'?imageView/2/w/120/h/120';
            $info_debt_img[$k]['discount'] =round($v['ccint']/$v['aaint'],1)*10;
            $info_debt_img[$k]['type'] ="debt";
        }
       return $info_debt_img;

    }
    //债权详细
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
            $shfe = shfeng( $map['tb_debt.DebtID'],$card['MemberId'],3,"资产包分享");
        }
        $rescard = M("member")->field("MemberId")->where($card)->find();
        $info = $debt_model->join("LEFT JOIN tb_debtdata ON tb_debt.DebtID=tb_debtdata.ID")->where($map)->find();
        $info = $debt_model->parseFieldsMap($info);

        if($info['AssetsStatue']!=4&&$info['AssetsStatue']!=7){
            if($info['agedili'] !=session('user.MemberId')){
                if($info['memberid'] !=session('user.MemberId')){
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
                echo '参数错误';exit;
            }else{
                $his_map['endtime'] =array('gt',date("Y-m-d H:i:s"));
                $his_map['MemberId'] = session('user.MemberId');
                $his_map['ID'] = authcode(I('request.his'));
                $his_map['ddstatus'] =1;
                $memberbuyhistory = M("memberbuyhistory")->where($his_map)->order("id DESC")->find();
                if(empty($memberbuyhistory)){
                    echo '参数错误';exit;
                }
                //echo  11221;exit;
            }
        }

        $wheremap["tb_debtduedili.Usestat"]=1;
        $wheremap['tb_debtduedili.DebtID']  =  $map['tb_debt.DebtID'];
        $infodili = M("debtduedili")->where($wheremap)->find();
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

        $info['debtadress']=json_decode($info['debtadress'],true);

        $info['debttype']=C('debttype')[$info['debttype']];
        $info['debtoptstatue']=C('debtoptstatue')[$info['debtoptstatue']];

        $info['isinissue']=C("isorginpic")[$info['isinissue']];
        $info['pledgetype']=C("pledgetype")[$info['pledgetype']];
        $info['pledgestatue']=C('pledgestatue')[$info['pledgestatue']];
        $info['pledgeaddress']=json_decode($info['pledgeaddress'],true);

        $info['Images']=array_filter(explode("@",$info['Images']));

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
//        $project_map['DebtID'] = $map['tb_debt.DebtID'];
//        $proinfo = M("debtproject")->where($project_map)->field("SubID,ViewPrice,BuyPrice")->find();
//        $this->assign("proinfo",$proinfo);

        //print_r($info);exit;

        $info['debtadress'] = explode("|",$info['debtadress'][0])[1].explode("|",$info['debtadress'][1])[1].$info['debtadress'][2];

        $info['pledgeaddress'] =explode("|",$info['pledgeaddress'][0])[1].explode("|",$info['pledgeaddress'][1])[1].$info['pledgeaddress'][2];

        $info['orginpic'] = imgpublic($info['orginpic'])."?imageView2/2/w/900";
        $info['ownerpic'] = imgpublic($info['ownerpic'])."?imageView2/2/w/900";
        $info['judgedpic'] = imgpublic($info['judgedpic'])."?imageView2/2/w/900";
        $info['titimgs'] = imgpublic($info['titimgs'])."?imageView2/2/w/900";
        $info['JudgedPic'] = imgpublic($info['JudgedPic'])."?imageView2/2/w/900";
        foreach($info['Images'] as $k=>$v){
            $info['Images'][$k] = imgpublic($v)."?imageView2/2/w/900";
        }
        $datainfo['diss'] = $dissinfo;
        $datainfo['content'] = $info;
        //print_r($datainfo);exit;
        return $datainfo;
        // print_r($proinfo);exit;
//        $this->assign('diss',$dissinfo);// 赋值数据集
//
//        $this->assign("debt",$info);

    }
    //资产包列表
    private function packlist(){
        $packs = M("package");
        $map['tb_package.AssetsStatue'] =4;
        $info_packs_img =$packs
            ->field("PackageID,titimg,Title,ViewCount,BuyCount ,ProcessModle as ccint,Total as aaint")
            ->join("LEFT JOIN tb_packagedata ON tb_package.PackageID = tb_packagedata.ID")
            ->where($map)->order(array( 'BuyCount' => 'desc','ViewCount' => 'asc'))->limit(8)->select();
        foreach($info_packs_img as $k=>$v){
            $info_packs_img[$k]['titimg'] =imgpublic($v['titimg']).'?imageView/2/w/120/h/120';
            $info_packs_img[$k]['discount'] =round($v['ccint']/$v['aaint'],1)*10;
            $info_packs_img[$k]['type'] ="pack";
            $info_packs_img[$k]['protype'] =1;
        }
        return $info_packs_img;

    }
    //资产包详细
    private function packcontent(){
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

        if($info['AssetsStatue']!=4&&$info['AssetsStatue']!=7){
            if($info['agedili'] !=session('user.MemberId')){
                if($info['memberid'] !=session('user.MemberId')){
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
                echo '参数错误';exit;
            }else{
                $his_map['endtime'] =array('gt',date("Y-m-d H:i:s"));
                $his_map['MemberId'] = session('user.MemberId');
                $his_map['ID'] = authcode(I('request.his'));
                $his_map['ddstatus'] =1;
                $memberbuyhistory = M("memberbuyhistory")->where($his_map)->order("id DESC")->find();
                if(empty($memberbuyhistory)){
                    echo '参数错误';exit;
                }
                //echo  11221;exit;
            }
        }

        $wheremap["tb_packageduedili.Usestat"]=1;
        $wheremap['tb_packageduedili.PackageID']  = $map['tb_package.PackageID'];
        $infodili = M("packageduedili")->where($wheremap)->find();
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
        $info['owneradress']=json_decode($info['owneradress'],true);


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
        //子项目列表
        //$this->assign("packlist",$packlist);

        $info['owneradress'] =  explode("|",$info['owneradress'][0])[1].explode("|",$info['owneradress'][1])[1].$info['owneradress'][2];
        $info['orginpic'] = imgpublic($info['orginpic'])."?imageView2/2/w/900";
        $info['ownerpic'] = imgpublic($info['JudgedPic'])."?imageView2/2/w/900";
        $info['projectlistpic'] = imgpublic($info['projectlistpic'])."?imageView2/2/w/900";
        $info['titimgs'] = imgpublic($info['titimgs'])."?imageView2/2/w/900";
        foreach($info['Images'] as $k=>$v){
            $info['Images'][$k] = imgpublic($v)."?imageView2/2/w/900";
        }
        foreach($info['AssetsDesc'] as $k=>$v){
            $info['AssetsDesc'][$k] = imgpublic($v)."?imageView2/2/w/900";
        }
       // print_r($info);exit;
        $datainfo['diss'] = $dissinfo;
        $datainfo['content'] = $info;
        $datainfo['item'] = $packlist;
        //print_r($datainfo);exit;
        return $datainfo;
//        //获取尽调购买金额，和买断单价
//        $project_map['PackageID'] = $map['tb_package.PackageID'];
//        $project_map['Ismain'] = 1;
//        $proinfo = M("packageproject")->where($project_map)->field("SubID,ViewPrice,BuyPrice")->find();
//        $this->assign("proinfo",$proinfo);
//
//
//        $this->assign('diss',$dissinfo);// 赋值数据集
//
//        //print_r($info);
//        $this->assign("pack",$info);

    }
}