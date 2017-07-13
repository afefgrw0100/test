<?php
namespace Home\Controller;
use Common\Controller\HomebaseController;
use Vendor\Weixinpay;
class IndexController extends HomebaseController {
    public function test(){
       // sendTemplateSMS_toadd("13142240057",array("aaaaaa"),145979);
    }
    public function index(){

        //
        session("keyword.title",C('logotitle')[0].session("keyword.title"));
        //轮播图
        if(is_mobile()){
            $imgmap['type']= 1;
        }else{
            $imgmap['type']= 2;
        }

        $listimg =  M()->table("sys_advert")->where($imgmap)->select();
        $this->assign("listimg",$listimg);

        //pc中间广告图
        $imgmap['type']= 3;
        $listimg_cen =  M()->table("sys_advert")->where($imgmap)->select();
        $this->assign("listimg_cen",$listimg_cen);
        //新闻列表
        $map_train['type'] = 11;
        $list =  M()->table("sys_articlescrap")->field("id,title,createtime")->where($map_train)->order(array( 'no' => 'asc','createtime' => 'desc'))->limit(7)->select();
        $this->assign('artlist',$list);// 赋值数据集

        //特金学院
        $map_train['type'] = 20;
        $list_tj =  M()->table("sys_articlescrap")->field("id,title,createtime")->where($map_train)->order(array( 'no' => 'asc','createtime' => 'desc'))->limit(7)->select();
        $this->assign('artlisttj',$list_tj);// 赋值数据集

        //热门城市
//        $cpro=  M()->table("sys_area_recommend")->select();
//        $this->assign("cpro",$cpro);

        //城市分站
        $substation_map['stat'] =1;

        if(is_mobile()){
            $substation=  M()->table("sys_area_photo")->field("area_code,titleImg,title")->where($substation_map)->limit(4)->select();
        }else{
            $substation=  M()->table("sys_area_photo")->field("area_code,titleImg,title")->where($substation_map)->limit(5)->select();
        }
        $this->assign("substation",$substation);
        //热门项目
        $assets = M("assets");
        $assetsrent = M("assets_rent");
        $debt = M("debt");
        $packs = M("package");

        $map['AssetsStatue'] =array('in','4,8');
        $map['Usestat'] = 1;

        $maps['AssetsStatue'] =array('in','4,8');
        $maps['Usestat'] = 1;
        $maps['Source'] = array('in','2,3,4');
        //转让
        $info_assets= $assets->where($maps)->order("AssetsID DESC")->order('AssetsID  desc')->limit(12)->select();
//        $info_debt =$debt->where($map)->order("CreateTime DESC")->limit(4)->select();
//        $info_packs =$packs->where($map)->order("CreateTime DESC")->limit(4)->select();

        //拍卖
//        $maps['AssetsStatue'] =array('in','4,8');
//        $maps['Usestat'] = 1;
//        $maps['Source'] = 1;
//        $info_assets_auc=$assets->where($maps)->order("AssetsID DESC")->order('AssetsID  desc')->limit(12)->select();
       // print_r($info_assets_auc);
        //出租
        $maps['Source'] = 6;
        $info_assets_Le=$assetsrent->where($maps)->order("AssetsID DESC")->order('AssetsID  desc')->limit(12)->select();
        //print_r($info_assets);

        $this->assign("assets",$info_assets);
       // $this->assign("assets_auc",$info_assets_auc);
        $this->assign("assets_le",$info_assets_Le);
//        $this->assign("debt",$info_debt);
//        $this->assign("pack",$info_packs);
        $map['AssetsStatue'] =4;
        $map['Source'] = array('in','2,3,4,5');
        $map['tb_project_recommend.type'] = 1;
        $info_assets_img  = $assets
            ->field("tb_assets.AssetsID,titimg,Title,AssetsType,AuctionStart,ViewCount,BuyCount,Address,ProPrice as ccint,Price as aaint,AssetsStatue,Source,AuctionEnd")
            ->join("LEFT JOIN tb_assetsdata ON tb_assets.AssetsID = tb_assetsdata.ID")
            ->join("tb_project_recommend ON tb_assets.AssetsID = tb_project_recommend.assetsid")
            ->where($map)->order(array( 'BuyCount' => 'desc','ViewCount' => 'asc'))->limit(12)->select();

        $map['Source'] = 6;
        $map['tb_project_recommend.type'] = 2;
        $info_debt_img  = $assetsrent
            ->field("tb_assets_rent.AssetsID,titimg,Title,AssetsType,ViewCount,BuyCount,Address,ProPrice as ccint,Price as aaint,AssetsStatue,Source")
            ->join("LEFT JOIN tb_assetsdata_rent ON tb_assets_rent.AssetsID = tb_assetsdata_rent.ID")
            ->join("tb_project_recommend ON tb_assets_rent.AssetsID = tb_project_recommend.assetsid")
            ->where($map)->order(array( 'BuyCount' => 'desc','ViewCount' => 'asc'))->limit(12)->select();

        //$map['AssetsStatue'] =8;

       // $info_assets_img_01  = $assets->field("AssetsID,titimg,Title,AssetsType,AuctionStart,ViewCount,BuyCount,Address,ProPrice as ccint,Price as aaint,AssetsStatue,Source,AuctionEnd")->join("LEFT JOIN tb_assetsdata ON tb_assets.AssetsID = tb_assetsdata.ID")->where($map)->order(array( 'BuyCount' => 'desc','ViewCount' => 'asc'))->limit(2)->select();
//        $info_debt_img =$debt->field("DebtID,titimg,Title,ViewCount,BuyCount,ProPrice as ccint,Total as aaint,AssetsStatue")->join("LEFT JOIN tb_debtdata ON tb_debt.DebtID = tb_debtdata.ID")->where($map)->order(array( 'BuyCount' => 'desc','ViewCount' => 'asc'))->limit(8)->select();
//        $info_packs_img =$packs->field("PackageID,titimg,Title,ViewCount,BuyCount,ProcessModle as ccint,Total as aaint,AssetsStatue")->join("LEFT JOIN tb_packagedata ON tb_package.PackageID = tb_packagedata.ID")->where($map)->order(array( 'BuyCount' => 'desc','ViewCount' => 'asc'))->limit(8)->select();
        //print_r($info_packs_img);
        $info_img=array();
      //  $info_img = array_merge_recursive($info_assets_img,$info_debt_img,$info_packs_img);
        $info_img = array_merge_recursive($info_assets_img,$info_debt_img);
        //print_r($info_img);
        $arrsort = null;
        foreach($info_img as $k =>$v){
            //使用$arrsort排序
            $arrsort[]= empty($v['ViewCount'])?0:$v['ViewCount'];
        }
        array_multisort($arrsort,SORT_DESC,SORT_NUMERIC ,$info_img);
        $info_img = array_slice($info_img,0,12);
       // print_r($info_img);
        $this->assign("infoimg",$info_img);

        //页面统计
        $sss['pronum'] = M("assets")->where(1)->count()+M("debt")->where(1)->count()+M("package")->where(1)->count();
        $mmap['Usestat'] =1;
        $sss['make'] = M("assetsduedili")->where($mmap)->count()+M("debtduedili")->where($mmap)->count()+M("packageduedili")->where($mmap)->count();

        $MemberType['MemberType'] = 4;
        $sss['ss1'] = M("member")->where($MemberType)->count();
        $this->assign('sss',$sss);

        //获取合作伙伴
        $adswhere['Catagrote'] = 51;
        $adsinfo = M('ads')->where($adswhere)->select();

        $this->assign('adsinfo',$adsinfo);
//        //视频
//        $mpwhere['type'] = 1;
//        $conmp =M()->table("sys_web_configure")->where($mpwhere)->find();
//        $conmp['content'] = json_decode($conmp['content'],true);
//        $this->assign('conmp',$conmp);

        //print_r($cpro);
        if(is_mobile()){
            $this->display("mobile@Index:index");
        }else{
            $this->display();
        }

    }
    //新闻列表
    public function artlist(){
        $type=I("request.type");
        $map_train['type'] = 11;
        switch($type){
            case 11:
                session("keyword.title",C('logotitle')[8].session("keyword.title"));
                $map_train['type'] = 11;
                break;
            case 20:
                session("keyword.title",C('logotitle')[31].session("keyword.title"));
                $map_train['type'] = 20;
                break;
        }

        $count      =  M()->table("sys_articlescrap")->where($map_train)->order(array('no' => 'asc','createtime' => 'desc'))->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list =  M()->table("sys_articlescrap")->field("id,title,createtime")->where($map_train)->order(array( 'no' => 'asc','createtime' => 'desc'))->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign("map_train",$map_train['type']);
        $this->display("news");
    }
    public function artcon(){
        $art_id['id'] = I("request.artid");
        $info      =  M()->table("sys_articlescrap")->where($art_id)->find();
        session("keyword.title",$info['title'].session("keyword.title"));
        $this->assign('art',$info);// 赋值分页输出
        $this->display("newsDetail");
    }

    //项目持有方
    public function hocr(){
        session("keyword.title",C('logotitle')[15].session("keyword.title"));
        $this->display("projectCreditor");
    }
    //关于资产经纪人
    public function aabs(){
        session("keyword.title",C('logotitle')[16].session("keyword.title"));
        $this->display("projectAgent");
    }
    //项目投资方
    public function piside(){
        session("keyword.title",C('logotitle')[17].session("keyword.title"));
        $this->display("projectInvestor");
    }

    //安全保证
    public function safe(){
        session("keyword.title",C('logotitle')[5].session("keyword.title"));
        $this->display("insurance");
    }

    public function about(){
        session("keyword.title",C('logotitle')[10].session("keyword.title"));
        $this->display("about");
    }
    public function lagel(){
        session("keyword.title",C('logotitle')[18].session("keyword.title"));
        $this->display("helpDetail");
    }


    //分享链接
    public function visitf(){
        session("keyword.title",C('logotitle')[14].session("keyword.title"));
        $card_id['tb_member.MemberId'] =authcode(I("request.card"));
        $card_id['MemberStatu'] =array("between","1,5");
        //print_r($card_id);exit;
        //用户基础信息
        // session("user")
        $info =M("member")->field("tb_member.MemberId,MemberName,MemberType,RealName,HeadImg")->join("tb_memberprofile ON tb_member.MemberId=tb_memberprofile.MemberID")->where($card_id)->find();
        if(empty($info)){
            $this->redirect("Home/Index/index");
        }
        $info['MemberType']=M()->table("sys_code")->where("CodeID= '".$info['MemberType']."'")->find();
        //print_r($info['MemberType']);
        $map['MemberId']=$info['MemberId'];
        $info['StarLevel']=M("memberaccount")->field("StarLevel as name")->where($map)->find();
        //print_r($info['StarLevel']);
        $smap['CreateMember']=$info['MemberName'];
        $info['pronum'] = M("assets")->where($smap)->count()+M("debt")->where($smap)->count()+M("package")->where($smap)->count();

        $mmap['DueCreateMember'] = $info['MemberId'];
        $info['make'] = M("assetsduedili")->where($mmap)->count()+M("debtduedili")->where($mmap)->count()+M("packageduedili")->where($mmap)->count();
        $info['host'] =$_SERVER['SERVER_NAME'].U("Home/Index/visitf",array("card"=> authcode($info['MemberId'],"ENCODE")));
        //print_r($info);
        //print_r($info);
        $this->assign("user",$info);
        //用户分享访问记录
        shfeng($card_id['tb_member.MemberId'],$card_id['tb_member.MemberId']);



        //项目列表
        $map['AssetsStatue'] =4;
            //array('between','0,4');
        $map["CreateMember"] = $info['MemberName'];
        $assetinfo = $packinfo = $debtinfo =array();
        $assetinfo = D('Web/Debt')->lists($map);
        $packinfo = D('Web/Assets')->lists($map);
        $debtinfo = D('Web/Packages')->lists($map);
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
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = array_slice($arr,$Page->firstRow,10);
        $this->assign('page',$show);// 赋值分页输出

        $this->assign('list',$list);// 赋值数据集


        //项目列表
        $mapp['AssetsStatue'] =4;
        $mapp["DueDiligenceMember"] =  $card_id['tb_member.MemberId'];
        $assetinfo = $packinfo = $debtinfo =array();
        $assetinfo = D('Web/Debt')->lists($mapp);
        $packinfo = D('Web/Assets')->lists($mapp);
        $debtinfo = D('Web/Packages')->lists($mapp);
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
        $Pages       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Pages->setConfig('prev','上一页');
        $Pages->setConfig('next','下一页');
        $show       = $Pages->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $lists = array_slice($arr,$Pages->firstRow,10);
        $this->assign('pages',$show);// 赋值分页输出

        $this->assign('lists',$lists);// 赋值数据集

        session('login_http_referer',get_url());

        //分享朋友圈签名
        Vendor('Jssdk.Jssweixin');
        //$jssdk = new jssdk(C("wxappid"), C("wxsecret"));
        $jssdk = new \Vendor\Jssdk\Jssweixin(C("wxappid"),C("wxsecret"));
        $signPackage = $jssdk->GetSignPackage();
        $this->assign("signPackage",$signPackage);
        //print_r($signPackage);
        if(is_mobile()){
            $this->display("agentmobile");
        }else{
            $this->display("User@Economic/agentRequest");
        }

    }
    public function introduce(){
        session("keyword.title",C('logotitle')[4].session("keyword.title"));
        //视频
        $mpwhere['type'] = 1;
        $conmp =M()->table("sys_web_configure")->where($mpwhere)->find();
        $conmp['content'] = json_decode($conmp['content'],true);
        $this->assign('conmp',$conmp);
        $this->display("introduce");
    }
    public function help(){
        session("keyword.title",C('logotitle')[9].session("keyword.title"));
        $this->display("help");
    }

    public function visf_user(){
        //
        session('login_http_member',null);
        $user_id = I("request.uic");
        //echo $user_id;
        $map['MemberId'] = authcode($user_id);
        $cc = I('request.code');
        $cc = authcode($cc);
        $user = M('member')->field('MemberId,MemberName,MemberType')->where($map)->find();
//        if(sp_is_user_login()){
//            //
//            if(session('user.MemberId')!=$map['MemberId']){
//                $this->error("自己不能成为自己推荐人");
//            }else{
//
//                $map['MemberId'] = session('user.MemberId');
//                $RecommendMember['RecommendMember'] = $user['MemberId'];
//                $res = M('member')->where($map)->save($RecommendMember);
//                //echo  M('member')->getLastSql();
//                if($res){
//                    $this->success("绑定推荐人成功",U('User/Member/index'));
//                }else{
//                    $this->success("你已经绑定过此人",U('User/Member/index'));
//                }
//            }
//
//        exit;
//        }

//        if($user['MemberType']!=4&&$cc!='cc'){
//            $this->error("此人还不是经纪人");
//        }
        session('uic',$user);
        $this->redirect("User/Index/region");
        //print_r($user);

    }
    public function pubpro(){
        session("keyword.title",C('logotitle')[19].session("keyword.title"));
        $this->display("agreenment2");
    }
    public function buypro(){
        session("keyword.title",C('logotitle')[20].session("keyword.title"));
        $this->display("agreenment1");
    }
    public function buypro1(){
        session("keyword.title",C('logotitle')[21].session("keyword.title"));
        $this->display("agreenment3");
    }
    public function buypro2(){
        session("keyword.title",C('logotitle')[22].session("keyword.title"));
        $this->display("agreenment4");
    }
    public function buypro3(){
        session("keyword.title",C('logotitle')[35].session("keyword.title"));
        $this->display("agreenment5");
    }
    public function baem(){
        session("keyword.title",C('logotitle')[3].session("keyword.title"));
        session('login_http_member',null);
        $user_id = I("request.uic");
        //echo $user_id;

        $map['MemberId'] = authcode($user_id);
        //echo  $map['MemberId'];
        //echo get_url();
        $user = M('member')->field('MemberId,MemberName,MemberType')->where($map)->find();
        $this->assign('user',$user);
        //print_r($user);
//        if(sp_is_user_login()){
//            //
//            if(session('user.MemberId')!=$map['MemberId']){
//                $this->error("自己不能成为自己推荐人");
//            }else{
//
//                $map['MemberId'] = session('user.MemberId');
//                $RecommendMember['RecommendMember'] = $user['MemberId'];
//                $res = M('member')->where($map)->save($RecommendMember);
//                //echo  M('member')->getLastSql();
//                if($res){
//                    $this->success("绑定推荐人成功",U('User/Member/index'));
//                }else{
//                    $this->success("你已经绑定过此人",U('User/Member/index'));
//                }
//            }
//
//        exit;
//        }

        session('uic',$user);
        if(is_mobile()){
            $this->display("mobileagents");
        }else{
            $this->display("agent");
        }


    }
    public function finan(){
        session("keyword.title",C('logotitle')[30].session("keyword.title"));
        $this->display();
    }
    public function report(){
        session("keyword.title","项目尽职调查报告");
        if(is_mobile()){
            $this->display("mobilereport");
        }else{
            $this->display();
        }

    }
    public function Aucview(){
        session("keyword.title",C('logotitle')[33].session("keyword.title"));
        $this->display("assetsAuction");
    }
    //城市合伙人详细页面
    public function Auction(){

        $city = I("request.city");
       // $city ="272";
        $city_map['b.code'] = $city;
        $cityname = M("area")->alias("b")->field("b.id,b.name,a.id as pid,a.name as pname")->where($city_map)->join("LEFT JOIN tb_area as a ON a.id= b.pid")->find();
        $city = $cityname['id'];

        $this->assign("cityname",$cityname);

        $areaMap['pid'] = $city;
        $areaInfo = M("area")->field("id,name")->where($areaMap)->select();
        $this->assign("areaInfo",$areaInfo);
        session("keyword.title",$cityname['name'].session("keyword.title"));
        //搜索条件/城市


        //获取广告图
        $img_logo_map['tb_area.id'] = $city;
        $img_logo_photo = M("area")->field("sys_area_photo.area_code,sys_area_photo.url")->join("sys_area_photo ON tb_area.code=sys_area_photo.area_code ")->where($img_logo_map)->find();

        $this->assign("img_logo_photo",$img_logo_photo);
        //print_r($img_logo_photo);exit;
        //合伙人项目
        $user_model = M("member");
        $user_map['sys_code.CodeValue'] =array("in","c-member,d-member");
        $user_map['tb_memberprofile.City'] = $city;
        //$sys_code_info = M()->table("sys_code")->field("CodeID,")->where($sys_code_map)->select();
       // $user_map['tb_member.MemberType'] = 63;

        //获取合伙人数量
        $Auc_user_a_count= $user_model
            ->join("sys_code ON sys_code.CodeID =tb_member.MemberType ")
            ->join("tb_memberprofile ON tb_memberprofile.MemberID =tb_member.MemberId ")

            ->where($user_map)->count();
        $this->assign("Auc_user_a_count",$Auc_user_a_count);
        //获取经纪人数量
        $user_map_b['sys_code.CodeValue'] ="b-member";
        $Auc_user_b_count= $user_model
            ->join("sys_code ON sys_code.CodeID =tb_member.MemberType ")
            ->join("tb_memberprofile ON tb_memberprofile.MemberID =tb_member.MemberId ")

            ->where($user_map)->count();
        $this->assign("Auc_user_b_count",$Auc_user_b_count);
        //print_r($Auc_user_count);exit;
        //获取合伙人详细资料
        $user_in = $user_model
            ->field("tb_member.MemberId,tb_member.MemberName,tb_memberprofile.RealName,tb_memberprofile.CellPhone,tb_memberprofile.Street,tb_memberprofile.intImg,tb_memberprofile.memo,a.name as pname,b.name as cname")
            ->join("sys_code ON sys_code.CodeID =tb_member.MemberType ")
            ->join("tb_memberprofile ON tb_memberprofile.MemberID =tb_member.MemberId ")
            ->join("LEFT JOIN tb_area as a ON tb_memberprofile.Province=a.id")
            ->join("LEFT JOIN tb_area as b ON tb_memberprofile.City=b.id")
            ->where($user_map)->select();
        //print_r($user_in);
        $user_in_array=null;
        $user_name = null;
        foreach($user_in as $key=>$value ){
            $user_in_array[] = $value['MemberId'];
            $user_name[$value['MemberId']] = $value['MemberName'];
        }

        $this->assign("user_in",$user_in);
        //当前地区转让、拍卖、出租项目
        $assets_model = M("assets");
        $assetsrent_model =M("assets_rent");
       // print_r($user_in);exit;
        if(!is_null($user_in_array)){
           // $info_map['memberid'] =array("in",$user_in_array);
            $info_map['AssetsStatue'] = array("in","4,8");

            $info_map['City'] = $city;
            //项目总数量
            $Auc_user_c_count = $assets_model->where($info_map)->count();
            $this->assign("Auc_user_c_count",$Auc_user_c_count);

            //拍卖
            $info_map['Source'] =1;
            $info_a = $assets_model->field("AssetsID,titimg,Title,Source,Price,ProPrice,AssetsStatue,AssetsType,memberid,CreateTime,City")->where($info_map)->order('AssetsID  desc')->limit(8)->select();
            //print_r($info_a);
            $this->assign("info_a",$info_a);
            //出租
            $info_map['Source'] =6;
            $info_b = $assetsrent_model->field("AssetsID,titimg,Title,Source,Price,ProPrice,AssetsStatue,AssetsType,memberid,CreateTime,City")->where($info_map)->order('AssetsID  desc')->limit(8)->select();
            $this->assign("info_b",$info_b);
            //print_r($info_b);
            //转让
            $info_map['Source'] =array('in','2,3,4');
            $info_c = $assets_model->field("AssetsID,titimg,Title,Source,Price,ProPrice,AssetsStatue,AssetsType,memberid,CreateTime,City")->where($info_map)->order('AssetsID  desc')->limit(8)->select();
            //print_r($info_c);
            $this->assign("info_c",$info_c);

            //$this->assign("name",$user_name);
            //$this->assign("list",$info_a);

        }

        if(is_mobile()){
            $this->display("mobile@Index/cityPartner");
        }else{
            $this->display("directStore");
        }

    }
    //项目委托申请
    public function adddirct(){
        //print_r(sendTemplateSMS_toadd("18608409053",null,184436));exit;
        $deputeModel = M("depute");
        $mid = I("request.mid");
        if(empty($mid)){
            $this->error("委托不存在");
        }

        $rules = array(
            array('province','require','省不能为空！',1), //
            array('city','require','城市不能为空！',1), //
            array('area','require','城市区不能为空！',1), //
            array('etype','require','项目类型不能为空！',1), //
            array('ptype','require','项目类型不能为空！',1), //
            array('manage','require','处置方式不能为空！',1), //
            array('name','require','联系人不能为空！',1), //
            array('phone','/^1(3|4|5|7|8)\d{9}$/','手机号不正确！',1), //

        );
        if(!func_compare_mobile(I('post.phonecode'),I("post.phone"))){
            $this->error("请填写正确的手机验证码");
            exit;
        }
        if(!sp_check_verify_code()&&!is_mobile()){
            $this->error("验证码错误");
        }

        //获取合伙手机
        $partMap['MemberID'] = $mid;
        $partPhone =M("memberprofile")->field("MemberID,CellPhone")->where($partMap)->find();
        //print_r($partPhone);exit;
        //
        $map['phone'] = I("request.phone");
        $map['state'] = 0 ;
        $map['memberid'] = $mid ;
        $info  = $deputeModel->where($map)->find();
        if(!empty($info)){
            $this->error("你已委托过，请等待联系");
        }

        if (!$deputeModel->validate($rules)->create()){
            // 如果创建失败 表示验证没有通过 输出错误提示信息
            exit($deputeModel->getError());
        }else {

            $deputeModel->memberid = $mid;
            $restul = $deputeModel->add();
            if($restul){
                sendTemplateSMS_toadd($partPhone['CellPhone'],null,184436);
                $this->success("委托成功");
            }else{
                $this->error("委托失败");
            }
        }

    }


    //城市合伙人
    public function citypart(){
        session("keyword.title",C('logotitle')[34].session("keyword.title"));
        if(is_mobile()){
            $this->display("mobileadvertisement");
        }else{
            $this->display("advertisement");
        }

    }
    //城市合伙人
    public function citypartweb(){
        session("keyword.title",C('logotitle')[34].session("keyword.title"));
        if(is_mobile()){
            $this->display("mobileadvertisement");
        }else{
            $this->display("advertisementweb");
        }

    }
    //城市合伙人申请
    public function addcpt(){
        $rules = array(
            array('name','require','姓名不能为空！',1), //
            array('city','require','城市不能为空！',1), //
            array('phone','/^1(3|4|5|7|8)\d{9}$/','手机号不正确！',1), //

        );
        $advisory = M("advisory"); // 实例化User对象

        $map['phone'] = I("request.phone");
        $map['status'] = 0 ;
        $info  = $advisory->where($map)->find();
        if(!empty($info)){
            $this->error("你已申请过，请误重复");
        }

        if (!$advisory->validate($rules)->create()){
            // 如果创建失败 表示验证没有通过 输出错误提示信息
            exit($advisory->getError());
        }else{
            $advisory->time=date("Y-m-d H:i:s");
            $restul = $advisory->add();
            if($restul){
                $this->success("申请成功");
            }else{
                $this->error("申请失败");
            }

            // 验证通过 可以进行其他数据操作
        }

    }
    public function auctionList(){
        session("keyword.title",C('logotitle')[36].session("keyword.title"));
        $mapStyem['c.CodeValue']= array('in',"c-member,d-member");
        //获取城市合伙人城市
        $cityInfo = M("member")->alias("a")->field("DISTINCT b.City,d.name as cname,e.name as pname,f.area_code,f.url,f.proType,f.title,f.titleImg,f.bizType")
            ->join("tb_memberprofile as b ON a.MemberId= b.MemberID")
            ->join("sys_code as c ON a.MemberType= c.CodeID")
            ->join("tb_area as d ON b.City= d.id")
            ->join("tb_area as e ON d.pid= e.id")
            ->join("sys_area_photo as f ON f.area_code= d.code")

            ->where($mapStyem)->select();

        $this->assign("cityInfo",$cityInfo);

        //print_r($cityInfo);
        if(is_mobile()){
            $this->display("mobile@Index/cityList");
        }else{
            $this->display("directStoreList");
        }

    }

}