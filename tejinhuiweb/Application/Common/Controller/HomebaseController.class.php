<?php
namespace Common\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/15
 * Time: 10:53
 */
class HomebaseController extends Controller{
    public function __construct()
    {
        //设置模板主题
        parent::__construct();
        $this->keyword();
    }

    /*
     * 网页标题、关键字、描述
     * */
    protected function keyword(){
        $sys_web_configure = M()->table("sys_web_configure");
        $map['type'] = 4;

        $keyword = $sys_web_configure->where($map)->find();

        $keyword = json_decode($keyword['content'],true);
        session("keyword",$keyword);


        $sys_web_configure = M()->table("sys_web_configure");
        $map['type'] = 3;

        $keywords = $sys_web_configure->where($map)->find();

        $keywords = json_decode($keywords['content'],true);
        session("keywords",$keywords);

        //底部广告图
        $footAdImg_map['sys_code.CodeValue'] = "footAdImg";
        $footAdImg = M()->table("sys_code")->join("tb_ads ON sys_code.CodeID=tb_ads.Catagrote")->where($footAdImg_map)->find();
        $this->assign("footAdImg",$footAdImg);


    }
    /**
     * 检查用户登录
     */
    protected function check_login(){
        $session_user=session('user');
        if(empty($session_user)||!isset($session_user)){
            session("login_http_referer",get_url());
            echo "<html><script>window.open('".U('User/Index/index')."','_top');</script></html>";
            exit;

            //$this->redirect('user/Index/index');
           // $this->error('您还没有登录！',U('user/Index/index',array('redirect'=>base64_encode($_SERVER['HTTP_REFERER']))));
        }

    }
    /**
     * 检查用户登录
     */
    protected function check_logins(){
        $session_user=session('user');
        if(empty($session_user)||!isset($session_user)){
            //session("login_http_referer",get_url());
            echo "<html><script>window.open('".U('User/Index/index')."','_top');</script></html>";
            exit;
            //$this->redirect('user/Index/index');
            // $this->error('您还没有登录！',U('user/Index/index',array('redirect'=>base64_encode($_SERVER['HTTP_REFERER']))));
        }

    }
    protected function listpage($arr,$count){
        $Page       = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = array_slice($arr,$Page->firstRow,3);
        $this->assign('page',$show);// 赋值分页输出

    }
    //用户订单生产
    /*
     *$信息id
     *$type信息类别  债权实物
     * $codetype信息类型  发布、购买等
     * */
    protected function userorder($id,$type,$codetype=1){
        $codel_model = M("");
        $rescode= null;$cont=null;
        $type = $type;
        $codetype = $codetype;
        //获取产品类型
        $code['sys_code.CodeValue'] =  $type;
        //I("request.codevalue");

        //InfoNo 获取发布信息的编号
        $map_order['InfoNo']=$id;
        //I("request.codevalue");
        //发布的数量
        $sumint = 1;

        //购买支付类型$a
//        $a= null;
//        switch($a){
//            case "":
//                break;
//            default;
//        }

        //发布信息支付类型；

        switch($code['sys_code.CodeValue']){
            case "debt":
                $map['DebtID']= $map_order['InfoNo'];
                $map['Usestat']=1;
                $cont = M("debt")->where($map)->find();
                break;
            case "package":
                $map['PackageID']= $map_order['InfoNo'];
                $map['Usestat']=1;
                $cont = M("package")->where($map)->find();
                $sumint = $cont['Projectnum'];
                break;
            case "assets":
                $map['AssetsID']= $map_order['InfoNo'];
                $map['Usestat']=1;
                $cont = M("assets")->where($map)->find();
                break;
            case "assetsrent":
                $map['AssetsID']= $map_order['InfoNo'];
                $map['Usestat']=1;
                $cont = M("assets_rent")->where($map)->find();
                break;
            default;
                $this->error("你的产品发布失败1");
        }
        if(empty($cont)){
            $this->error("你的产品发布失败");
        }

        $rescode=$codel_model->table("sys_code")->join("tb_product ON sys_code.CodeID=tb_product.ProductType")->where($code)->find();
        if(is_array($rescode)&&!empty($rescode)){
            $order_model = M("order");
            //业务号
            $data["sn"] = date("YmdHis").func_getRandString(4);
            $sn = $order_model->where($data)->find();
            $orgmap['FCodeID']= 10108;
            $orgint = $codel_model->table("sys_code")->field("CodeID,CodeValue")->where($orgmap)->find();
            if(empty($sn)){
                //产品id
                $data['ProductID']=$rescode['ProductId'];
                //产品名称
                $data['ProductName']=$rescode['ProductName'];
                //产品描述
                $data['ProductDesc']=$rescode['Desc'];
                //原价
                $data['OrgPrice']=$rescode['Price'];
                //成交价
                $data['DealPrice']=empty($rescode['SalePrice'])?$rescode['Price']*$sumint:$rescode['SalePrice']*$sumint;
                //原价（积分）
                $data['OrgInt']=($rescode['Price']*$orgint['CodeValue']);
                //成交价（积分）
                $data['DealInt']=empty($rescode['SalePrice'])?($rescode['Price']*$orgint['CodeValue']):($rescode['SalePrice']*$orgint['CodeValue']);
                //对应发布信息编号
                $data['InfoNo']=$map_order['InfoNo'];
                //最后修改时间
                $data['CreateUser']=session("user.MemberId");
                $data['CreateTime']=date("Y-m-d H:i:s");
                if($order_model->create($data)){
                    $result = $order_model->add();
                    if($result){
                        $id=authcode($result,"ENCODE");
                        $type = authcode($type,"ENCODE");
                        $codetype = authcode($codetype,"ENCODE");
                        $this->redirect("User/Payment/index",array('codekey'=>$id,'type'=>$type,'codetype'=>$codetype));
                    }else{
                        $this->error("系统错误");
                    }
                }else{
                    $this->error($order_model->getError());
                }
            }
        }else{
            $this->error("你购买的产品未上架");
        }

    }
}