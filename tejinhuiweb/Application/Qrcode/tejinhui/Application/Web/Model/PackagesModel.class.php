<?php
namespace Web\Model;
use Think\Model;
class PackagesModel extends Model{
    protected  $tableName ="package";
    protected $_map = array(
       // 'admin'=>'users_name',
        'title'=>'Title',//标题
        'total'=>'Total',//资产包总金额
       // 'interest'=>'Interest',//出售金额
        'source'=>'Source',//资产包来源
        'type'=>'Type',//1-逾期贷款;2-企业商账;3-其他债权',
        'isorginpic'=>'IsOrginPic',//是否具备原始凭证

        'owner'=>'Owner',//债权人姓名/名称
        'ownertype'=>'OwnerType',//债权人类别
        'owneradress'=>'OwnerAdress',//所在地
        'cellphone'=>'CellPhone',//手机

        'remark'=>'Remark',//补充说明

        'processmodle'=>'ProcessModle',//处置方式
        'orginpic'=>'OrginPic',//原始凭证或合同文书
        'ownerpic'=>'OwnerPic',//权利证书及资料
        'projectlistpic'=>'ProjectListPic',//资产包项目列表
        'projectnum'=>'Projectnum',//项目数量

        'agedili'=>'DueDiligenceMember',//尽职调查人员
        'titimgs'=>'titimg',

    );
    protected $_validate = array(
        //array('users_name','require','用户名不符合要求'),
        array('Title','require','请填写：标题',1),
        array('Total','/^[0-9]+([.]{1}[0-9]+){0,1}$/','请填写：资产包总金额',1),
      //  array('Interest','/^[0-9]+([.]{1}[0-9]+){0,1}$/','请填写：出售金额',1),
        array('Source','require','请填写：资产包来源',1),
        array('Type','require','请选择：资产类型',1),
        array('IsOrginPic','require','请选择：是否具备原始凭证',1),

        array('Owner','require','请填写：债权人姓名',1),
        array('OwnerType','require','请选择：债权人类别',1),
        array('CellPhone','/^1(3|4|5|7|8)\d{9}$/','请填写：手机',1),

        array('ProcessModle','require','请填写：转让金额',1),
        array('Projectnum','/^[0-9]+([.]{1}[0-9]+){0,1}$/','请填写：项目数量',1)

    );
    public function lists($map){
        $pack_model = M("package");
        $packinfo = $pack_model->field("
                PackageID,
                titimg,
                Title as title,
                Total as total,
                ProcessModle as proprice,
                OwnerAdress as adress,
                Owner as Contact,
                CellPhone as mobile,
                CreateTime,AssetsStatue,
                Type as typeset")->where($map)->order("PackageID desc")->select();
        return $packinfo;
    }
}