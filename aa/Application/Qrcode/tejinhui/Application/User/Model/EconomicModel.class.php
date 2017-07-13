<?php
namespace User\Model;
use Think\Model;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/8
 * Time: 15:27
 */
class EconomicModel extends Model{
    protected  $tableName = "memberprofile";
    protected $_map = array(
        // 'admin'=>'users_name',
        'type'=>'IdentityType',//标题
        'imgname'=>'IdentityImg',//资产包总金额

    );
    protected $_validate = array(
        //array('users_name','require','用户名不符合要求'),
        array('IdentityType',array(1,2,3),'请选择类型',2,"in"),
        array('IdentityImg','require','请上传证件',2),

    );
}

