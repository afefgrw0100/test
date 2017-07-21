<?php
namespace Web\Model;
use Think\Model;
class AssetsModel extends Model{
    protected $tableName = "assets";
    protected $_map = array(
        // 'admin'=>'users_name',
        'title'=>'Title',//标题
        'price'=>'Price',//资产价值
        'assetstype'=>'AssetsType',//资产类别
        'source'=>'Source',//资产来源
        'address'=>'Address',//资产地址
        'isinissue'=>'IsInIssue',//是否存在权属纠纷
        'statue'=>'Statue',//资产状态

        'contact'=>'Contact',//处置联系人名称
        //'owner'=>'Owner',//产权所有人名称
        'cellphone'=>'CellPhone',//手机

        'remark'=>'Remark',//补充说明
        'processmodle'=>'ProcessModle',//处置方式
        'proprice'=>'ProPrice',//转让价格//质押融资
        'authpic'=>'AuthPic',//权利证书
        'realpic'=>'RealPic',//实物照片
        'agedili'=>'DueDiligenceMember',//尽职调查人员

        'ReservePrices'=>'ReservePrice',//保留价格
        'Bonds'=>'Bond',//保证金
        'AuctionStarts'=>'AuctionStart',//拍卖起始时间
        'AuctionEnds'=>'AuctionEnd',//拍卖结束时间
        'PayModes'=>'PayMode',//付款方式:0-无付款、1-全款、2-按揭
        'titimgs'=>'titimg',//样品图片

    );
    protected $_validate = array(
        //array('users_name','require','用户名不符合要求',1),
        array('Title','require','请填写：标题',1),
        array('Price','/^[0-9]+([.]{1}[0-9]+){0,1}$/','请填写：资产价值',1),
        array('AssetsType','require','请选择：资产类别',1),
        array('Source','require','请选择：资产来源',1),
        array('IsInIssue','require','请选择：是否存在权属纠纷',1),
        array('Statue','require','请选择：资产状态',1),

       //array('Statue','require','处置联系人名称',1),
        array('Contact','require','请填写：处置联系人名称',1),
        array('CellPhone','/^1(3|4|5|7|8)\d{9}$/','请填写：手机',1),

        //array('ProcessModle','require','请选择：处置方式',1),
        array('ProPrice','/^[0-9]+([.]{1}[0-9]+){0,1}$/','请填写：处置价格',1),


    );
    public function lists($map){
        $asset_model = M("assets");
        $assetinfo = $asset_model->field("
                AssetsID,
                titimg,
                Title as title,
                Price as total,
                ProcessModle as promodel,
                ProPrice as proprice,
                Address as adress,
                Contact as Contact,
                CellPhone as mobile,
                CreateTime,AssetsStatue,
                AssetsType as typeset,
                Source as source,
                AuctionStart as AucStart,
                AuctionEnd as AucEnd")->where($map)->order("AssetsID desc")->select();
      //echo  $asset_model->getLastSql();exit;
        return $assetinfo;
    }

}