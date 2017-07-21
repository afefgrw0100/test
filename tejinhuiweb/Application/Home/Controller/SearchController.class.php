<?php
namespace Home\Controller;
use Common\Controller\HomebaseController;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/19
 * Time: 11:05
 */
class SearchController extends HomebaseController{
    public function __construct()
    {
        parent::__construct();
    }
    public function test(){
        echo 111;
    }
    public function lists(){
        session("keyword.title",C('logotitle')[1].session("keyword.title"));
        //获取城市
        $provinceMap['Source'] =array("in","2,3,4,5");
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
       // print_r($areapc);

        //获取类型
        $FCodeGroup['CodeGroup'] = '10105';
        $messagetype =  M()->table("sys_code")->field("CodeID,CodeGroup,CodeName,CodeValue")->where($FCodeGroup)->select();
        $this->assign("messagetype",$messagetype);
        //热门城市

        $cpro=  M()->table("sys_area_recommend")->select();
        $this->assign("cpro",$cpro);

        $where= empty(I('request.search'))?null:I('request.search');
        $this->assign("search",$where);
        //echo $Page->firstRow;
        //$list = $User->where('status=1')->order('create_time')->limit($Page->firstRow.','.$Page->listRows)->select();

        //$info = array_map_recursive($debtinfo,$assetinfo);
        //print_r($list);
        if(is_mobile()){
            $typev = I("request.typev");
            $this->assign("typevs",$typev);
            $this->display("mobile@Index/search");
        }else{
            $this->display("Lists:lists");
        }

    }
    public function orders(){
//        $debt_model = M("debt");
//        $asset_model = M("assets");
//        $pack_model = M("package");

       // print_r(I('get.'));
        $search = I('request.search');
        $where= empty($search)?null:$search;
        $map['AssetsStatue'] = array('in','4,8');
        //array('between','0,4');
        //echo $where;exit;
        $map['Title'] =array('like','%'.$where.'%');
        //地区
        $province = I('get.province');
        $City=I('get.City');
        empty($province)?null:$map['Province']=$province;
        empty($City)?null:$map['City']=$City;
        //类别
        $messagetype = empty(I("get.type"))?0:I("get.type");
        $AssetsType = I("get.AssetsType");
        if($messagetype==11&&!empty($AssetsType)){
            $map['AssetsType'] = $AssetsType;
        }
       // echo $messagetype;exit;
        //金额差价
        $psta = I('request.psta');
        $pend = I('request.pend');
        if(!empty($psta)||!empty($pend)){
            $psta = $psta*10000;
            $pend= $pend*10000;
            $map['ProPrice']=array('between',$psta.','.$pend);
        }
        //print_r($map);exit;
        //排序
        $ord = empty(I("request.ord"))?"CreateTime":"proprice";
        $ordarg =I("request.ord");
        //echo  $messagetype;exit;
        $assetinfo = $packinfo = $debtinfo =array();
//        $assetinfo = D('Web/Debt')->lists($map);
//        print_r($assetinfo);
//            exit;
        switch($messagetype){
            case 0:
                //$assetinfo = D('Web/Debt')->lists($map);
                $map['Source']=array("in","2,3,4,5");
                $packinfo = D('Web/Assets')->lists($map);
                $map['Source']=6;
                $assetinfo = D('Web/Assetsrent')->lists($map);
              //  $map['ProPrice']?$map['ProcessModle']=$map['ProPrice']:"";
                //unset($map['ProPrice']);
              //  $debtinfo = D('Web/Packages')->lists($map);
                break;
            case 13:
                $map['ProPrice']?$map['ProcessModle']=$map['ProPrice']:"";
                unset($map['ProPrice']);
                $debtinfo = D('Web/Packages')->lists($map);
                break;
            case 12:
                $assetinfo = D('Web/Debt')->lists($map);
                break;
            case 11:
                $map['Source']=array("in","2,3,4");
                $packinfo = D('Web/Assets')->lists($map);
                //print_r($map);exit;
                break;
            case 14:
                $map['Source']=1;
                $packinfo = D('Web/Assets')->lists($map);
                //print_r($map);exit;
                break;
            case 15:
                $map['Source']=6;
                $packinfo = D('Web/Assetsrent')->lists($map);
                //print_r($map);exit;
                break;
            default:
                $this->error("!!");
        }


        $arr =array();
        $arrsort = array();
        $result= array_merge_recursive($debtinfo,$packinfo,$assetinfo);
       // print_r($result);
        foreach($result as $k =>$v){
            //type 1实物资产 ,2资产包,3债权
            //$v['type']=1;
            //print_r(explode("|",json_decode($v['adress'])[0]));
            $v['adr']['ppd'] =explode("|",json_decode($v['adress'])[0]);
            $v['adr']['ckk'] =explode("|",json_decode($v['adress'])[1]);
            $v['daytime']= nubtime(date("Y-m-d"),$v['EndTime']);

            $v['CreateTime'] = strtotime($v['CreateTime']);
            //$v['AssetsStatue']=setstatue($v['AssetsStatue']);

            //使用$arrsort排序
            $arrsort[]= $v[$ord];
            $arr[]=$v;
        }
        if($ordarg==2){
            array_multisort($arrsort,SORT_ASC,SORT_NUMERIC ,$arr);
        }else{
            array_multisort($arrsort,SORT_DESC,SORT_NUMERIC ,$arr);
        }


        //分页
        $count= count($arr,0);
        $pagenum = 10;
        if(is_mobile()){
            $pagenum = 10;
        }
        $Page       = new \Think\PageAjax($count,$pagenum);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('header', '<span class="rows">共 %TOTAL_ROW% 条信息</span>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');

        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $Page->lastSuffix = false;//最后一页不显示为总页数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = array_slice($arr,$Page->firstRow,$pagenum);
        $this->assign('page',$show);// 赋值分页输出

        $this->assign('list',$list);// 赋值数据集

        $search['tit']=$where;
        $search['sum']=$count;
        $this->assign("eqtc",$search);
        //print_r($list);
        if(is_mobile()){
            $this->display("mobile@Index/listcont");
        }else{
            $this->display("Lists/listcont");
        }


    }
}