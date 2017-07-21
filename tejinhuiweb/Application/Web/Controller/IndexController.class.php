<?php
namespace Web\Controller;
use Common\Controller\MemberbaseController;
class IndexController extends MemberbaseController {
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        //phpinfo();
        if(is_HTTPS()){
            echo 1111;
        }else{
            echo 222;
        }
        print_r($_SERVER) ;
     }
    public function publish(){
        session("keyword.title",C('logotitle')[2].session("keyword.title"));
        $this->display();

    }
    //实物发布
    public function assets(){
        session("keyword.title",C('logotitle')[23].session("keyword.title"));
        $area =A("Portal/Area");
        $area->asgA();
//        echo $user->getLastSql();
//        print_r($info);
        $this->agelist();
        $this->display();

    }
    //实物拍卖
    public function assetsauc(){
        session("keyword.title",C('logotitle')[32].session("keyword.title"));
        $area =A("Portal/Area");
        $area->asgA();
//        echo $user->getLastSql();
//        print_r($info);
        $this->agelist();
        $this->display("assetsAuc");

    }
    //实物出租
    public function assetsLease(){
        session("keyword.title",C('logotitle')[32].session("keyword.title"));
        $area =A("Portal/Area");
        $area->asgA();
//        echo $user->getLastSql();
//        print_r($info);
        $this->agelist();
        $this->display("assetsLease");

    }

    public function mic(){

        $CodeGroup['CodeGroup'] = 10127;
        $ggtv = M()->table("sys_code")->field("CodeID,CodeGroup,CodeName,CodeValue")->where($CodeGroup)->find();
        $this->assign("ggtv",$ggtv);
        $CodeGroup['CodeGroup'] = 10128;
        $ggtc = M()->table("sys_code")->field("CodeID,CodeGroup,CodeName,CodeValue")->where($CodeGroup)->find();
        $this->assign("ggtc",$ggtc);
        if(!empty(I('get.AssetsID'))){
            $this->assetsmic();

        }elseif(!empty(I('get.PackageID'))){
            $this->packagesmic();
        }elseif(!empty(I('get.DebtID'))){
            $this->debtmic();
        }elseif(!empty(I('get.AssetsIDrent'))){
            $this->assetsmicrent();
        }
    }
    //经济人发布实物转让
    private function assetsmic(){
     // echo   date("Y-m-d H:i:s",mktime(23,59,59,date("m"),date("d"),date("y")));exit;
        session("keyword.title",C('logotitle')[26].session("keyword.title"));
        $sta['AssetsID'] = I("request.AssetsID");
        $sta['DueDiligenceMember'] = session("user.MemberId");
        $asset_model = M("assets");
        $info = $asset_model->field("AssetsID,Title,Source")->where($sta)->find();
        if($info){
            $this->assign("tit",$info);
            $this->display("assetsmic");
        }else{
            $this->redirect("Web/Index/publish");
        }

    }
    //经济人发布实物出租
    private function assetsmicrent(){
        // echo   date("Y-m-d H:i:s",mktime(23,59,59,date("m"),date("d"),date("y")));exit;
        session("keyword.title",C('logotitle')[26].session("keyword.title"));
        $sta['AssetsID'] = I("request.AssetsIDrent");
        $sta['DueDiligenceMember'] = session("user.MemberId");
        $asset_model = M("assets_rent");
        $info = $asset_model->field("AssetsID,Title,Source")->where($sta)->find();
        if($info){
            $this->assign("tit",$info);
            $this->display("assetsrentmic");
        }else{
            $this->redirect("Web/Index/publish");
        }

    }
    //经济人债权发布
    private function debtmic(){

        session("keyword.title",C('logotitle')[27].session("keyword.title"));
        $sta['DebtID'] = I("request.DebtID");
        $sta['DueDiligenceMember'] = session("user.MemberId");
        $asset_model = M("debt");
        $info = $asset_model->field("DebtID,Title")->where($sta)->find();
        if($info){
            $this->assign("tit",$info);
            $this->display("debtmic");
        }else{
            $this->redirect("Web/Index/publish");
        }
    }
    //经济人资产包发布
    private function packagesmic(){
        session("keyword.title",C('logotitle')[28].session("keyword.title"));
        $sta['PackageID'] = I("request.PackageID");
        $sta['DueDiligenceMember'] = session("user.MemberId");
        $asset_model = M("package");
        $info = $asset_model->field("PackageID,Title,Projectnum")->where($sta)->find();
        if($info){
            $this->assign("tit",$info);
            $this->display("packagesmic");
        }else{
            $this->redirect("Web/Index/publish");
        }
    }
    //债权发布
    public function debt(){
        session("keyword.title",C('logotitle')[24].session("keyword.title"));
       // $this->redirect("Web/Index/index");
        $area =A("Portal/Area");
        $area->asgA();
        $this->agelist();
        $this->display();

    }

    //资产包发布
    public function packages(){
        session("keyword.title",C('logotitle')[25].session("keyword.title"));
        $area =A("Portal/Area");
        $area->asgA();
        $this->agelist();
        $this->display();

    }

    //选择经济人
    public function ajaxage(){
        $city  = explode("|",I("request.city"));
        $name = I("request.name");
        if(!empty($city)){
            $user= M("member");
            $map['tb_member.MemberStatu']=1;
            $map['sys_code.CodeValue'] = array("in","b-member,d-member");
            if(!empty($city[0])){
                $map['tb_memberprofile.City'] =$city[0];
            }


            $map['tb_member.MemberName'] =array('like','%'.$name.'%');
//            $where['_logic'] = 'or';
//            $map['_complex'] = $where;

            $info = $user->field("tb_member.MemberId,tb_member.MemberName as RealName,tb_memberprofile.RealName as dc,tb_memberprofile.HeadImg,tb_memberaccount.StarLevel")
                ->join(array("tb_memberprofile ON tb_member.MemberId = tb_memberprofile.MemberID",
                    "tb_memberaccount ON tb_member.MemberId = tb_memberaccount.MemberId",
                    "sys_code ON sys_code.CodeID = tb_member.MemberType"))
                ->where($map)->order("tb_memberaccount.Ranking Desc")->select();

           // print_r($info);
            foreach($info as $k=>$v){
                if(empty($v['HeadImg'])){
                    $info[$k]['HeadImg'] = C("IMGNULL");
                }else{
                    $info[$k]['HeadImg'] = headimg($v['HeadImg']);
                }
            }
            $this->ajaxReturn($info);
        }

    }
    private function agelist(){
        $user= M("member");
        $map['MemberStatu']=1;
        $map['MemberType'] = 4;
        $map['tb_memberprofile.City'] =session("user.City");
        $info = $user->field("tb_member.MemberId,tb_member.MemberName as RealName,tb_memberprofile.RealName as dc,tb_memberprofile.HeadImg,tb_memberaccount.StarLevel")
            ->join(array("tb_memberprofile ON tb_member.MemberId = tb_memberprofile.MemberID","tb_memberaccount ON tb_member.MemberId = tb_memberaccount.MemberId"))
            ->where($map)->order("tb_memberaccount.Ranking Desc")->select();
        $this->assign("age",$info);

    }
    public function qrcode(){
        $url = I("request.code");
        $url = urldecode($url);
        qrcode($url,2);
    }
}