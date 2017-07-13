<?php
namespace Common\Controller;
use Common\Controller\HomebaseController;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/15
 * Time: 11:01
 */
class MemberbaseController extends HomebaseController{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
    }
}