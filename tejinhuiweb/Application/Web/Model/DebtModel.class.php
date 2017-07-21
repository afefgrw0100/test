<?php
namespace Web\Model;
use Think\Model;
class DebtModel extends Model{
    protected  $tableName ="debt";
    protected $_map = array(
        // 'admin'=>'users_name',
        'title'=>'Title', //标题
        'price'=>'Price',//债权本金
        'interest'=>'Interest',//未归还利息
        'total'=>'Total',//债权总金额
        'type'=>'Type',//债权类别
        'rate'=>'Rate',//约定利率
        'starttime'=>'StartTime',//债权产生时间
        'endtime'=>'EndTime',//债权到期时间
        'assureType'=>'AssureType',//担保方式
        'isorgpic'=>'IsOrgPic',//是否具备原始凭证
        'isioans'=>'IsIoans',//是否已经催收
        'islitigation'=>'Islitigation',//是否诉讼
        'isjudged'=>'IsJudged',//是否判决

        'owner'=>'Owner',//债权人姓名/名称
        'ownertype'=>'OwnerType',//债权人类别
        'cellphone'=>'CellPhone',//手机

        'debtor'=>'Debtor',//债务人姓名/名称
        'debtadress'=>'DebtAdress',//债务人所在地
        'debttype'=>'DebtType',//债务人类别
        'otherdebtor'=>'OtherDebtor',//其他债务人联系情况
        'debtoptstatue'=>'DebtOptStatue',//债务人经营情况

        'pledgevalue'=>'PledgeValue',//抵押物价值
        'pledgetype'=>'PledgeType',//抵押物类别
        'pledgeaddress'=>'PledgeAddress',//抵押物地址
        'isinissue'=>'IsInIssue',//是否存在权属纠纷
        'pledgestatue'=>'PledgeStatue',//抵押物状态
        'remark'=>'Remark',//补充说明
        'processmodle'=>'ProcessModle',//处置方式
        'proprice'=>'ProPrice',//转让价格

        'orginpic'=>'OrginPic',//原始凭证或合同文书
        'ownerpic'=>'OwnerPic',//权利证书及资料
        'judgedpic'=>'ProjectListPic',//法院有效判决及执行文书

        'agedili'=>'DueDiligenceMember',//尽职调查人员
        'titimgs'=>'titimg',


    );
    protected $_validate = array(
        //array('users_name','require','用户名不符合要求'),
        array('Title','require','标题不能为空',1),
        array('Price','/^[0-9]+([.]{1}[0-9]+){0,1}$/','请填写：正确的债权本金',1),
        array('Interest','/^[0-9]+([.]{1}[0-9]+){0,1}$/','请填写：正确的未归还利息',1),
        array('Total','/^[0-9]+([.]{1}[0-9]+){0,1}$/','请填写：正确的债权总金额',1),

        array('Type','require','请选择：债权类别',1),
        array('Rate','/^[0-9]+([.]{1}[0-9]+){0,1}$/','请填写：正确的利率',2),
        array('StartTime','require','请选择：债权产生时间',1),
        array('EndTime','require','请选择：债权到期',1),
        array('AssureType','require','请选择：担保方式',1),
        array('IsOrgPic','require','请选择：是否具备原始凭证',1),
        array('IsIoans','require','请选择：是否已经催收',1),
        array('Islitigation','require','请选择：是否诉讼',1),

        array('Owner','require','请填写：债权人姓名',1),
        array('OwnerType','require','请选择：债权人类别',1),
        array('CellPhone','/^1(3|4|5|7|8)\d{9}$/','请填写：债权人正确手机',1),

        array('Debtor','require','请填写：债务人姓名',1),
        //array('DebtAdress','require','债务人所在地DebtAdress',1),
        array('DebtType','require','请选择：债务人类别',1),
        array('OtherDebtor','require','请选择：债务人联系情况',1),
        array('DebtOptStatue','require','请选择：债务人经营情况',1),


        array('PledgeValue','/^[0-9]+([.]{1}[0-9]+){0,1}$/','请选择：抵押物价值',1),
        array('PledgeType','require','请选择：抵押物类别',1),
        //array('PledgeAddress','require','抵押物地址',1),
        array('IsInIssue','require','请选择是：否存在权属纠纷',1),
        array('PledgeStatue','require','请选择：抵押物状态',1),
        //array('ProcessModle','require','请选择：处置方式',1),
        array('ProPrice','/^[0-9]+([.]{1}[0-9]+){0,1}$/','请填写：处置价格',1),


        //array('OwnerType','require','用户名不符合要求111OwnerType',1),


    );
    public function lists($map){
        $debt_model = M("debt");
        $debtinfo = $debt_model->field("
                DebtID,
                titimg,
                Title as title,
                Total as total,
                StartTime,EndTime,
                ProcessModle as promodel,
                ProPrice as proprice,
                DebtAdress as adress,
                Owner as Contact,
                CellPhone as mobile,
                CreateTime,AssetsStatue,
                 Type as typeset")->where($map)->order("DebtID desc")->select();

        return $debtinfo;
    }

}