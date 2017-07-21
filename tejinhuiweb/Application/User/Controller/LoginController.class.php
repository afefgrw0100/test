<?php
namespace User\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function test(){
        $res = array("aaa"=>1,"ac"=>2);
        $as = array("bc"=>1,"bb"=>3);

        print_r(array_merge_recursive($res,$as));
        echo sp_password("1234");
        echo $_SERVER['SERVER_NAME'];
        echo date("Y-m-d H:i:s");
        if(is_mobile()){
            if(is_weixin()){
                echo "wwwww";
            }
        }else{
            echo "ccccc";
        }

    }
    //登陆状态
    public function dologin(){
       //print_r($_POST);exit;

        if(!sp_check_verify_code()&&!is_mobile()){
            $this->ajaxReturn(ajax_josn_data("验证码错误","400"),"JSON",JSON_UNESCAPED_UNICODE);
        }
        $users_model=M("member");
        $rules = array(
            //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
            array('MemberName', '/^[_0-9a-z]{6,16}$/i', '用户名不能为空！', 1 ),
            array('Password','require','密码不能为空！',1),

        );
        if($users_model->validate($rules)->create()===false){
            $this->error($users_model->getError());
        }
        if(IS_POST){
            $this->_do_mobile_login();
        }

    }
    //用户注册
    public function doregion(){
        //手机验证
        //print_r(pregPN(I("post.phone_number")));exit;
        if(empty(pregPN(I("post.phone_number")))){
            $this->ajaxReturn(ajax_josn_data("请填写正确的手机","4033"),"JSON",JSON_UNESCAPED_UNICODE);
            exit;
        }
        $users_model=M("member");
        $users_pro =M("memberprofile");
        $data['MemberName'] = I("post.MemberName");
        $resname= $users_model->where($data)->find();
        $phone['CellPhone'] = I("post.phone_number");
        $CellPhone = $users_pro->where($phone)->find();
        if($resname||$CellPhone){
            $this->ajaxReturn(ajax_josn_data("用户名或手机已存在","401"),"JSON",JSON_UNESCAPED_UNICODE);
        }
        if(!func_compare_mobile(I('post.mobile_code'),I("post.phone_number"))){
            $this->ajaxReturn(ajax_josn_data("请填写正确的验证码","403"),"JSON",JSON_UNESCAPED_UNICODE);
            exit;
        }
        $users_model=M("member");
        if(I('post.Password')!=I('post.Password')){
            $this->ajaxReturn(ajax_josn_data("密码不一直","402"),"JSON",JSON_UNESCAPED_UNICODE);
        }
        $rules = array(
            //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
            array('MemberName', 'require', '用户名不能为空！', 1 ),
            array('Password','/^([\s\S]*){6,16}$/','密码不能少于6位！',1),
        );
        if($users_model->validate($rules)->create()===false){
            $this->error($users_model->getError());
        }
        if(IS_POST){
            $this->_do_mobile_region();
        }

    }
    public function getphone(){
        $phone['CellPhone'] = I("request.phone");
        $res = M("memberprofile")->where($phone)->find();
        if(empty($res)){
            $this->success("可以使用");

        }else{
            $this->error("手机已存在");
        }

    }
    //找回密码
    public function dopassword(){
        //手机验证
        //print_r(pregPN(I("post.phone_number")));exit;
        if(empty(pregPN(I("post.phone_number")))){
            $this->ajaxReturn(ajax_josn_data("请填写正确的手机","4033"),"JSON",JSON_UNESCAPED_UNICODE);
            exit;
        }
        if(!func_compare_mobile(I('post.mobile_code'),I("post.phone_number"))){
            $this->ajaxReturn(ajax_josn_data("请填写正确的验证码","403"),"JSON",JSON_UNESCAPED_UNICODE);
            exit;
        }
        $users_model=M("member");
        if(I('post.Password')!=I('post.Password')){
            $this->ajaxReturn(ajax_josn_data("密码不一直","402"),"JSON",JSON_UNESCAPED_UNICODE);
        }
        $rules = array(
            //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
            //array('MemberName', 'require', '用户名不能为空！', 1 ),
            array('Password','/^([\s\S]*){6,16}$/','密码不能少于6位！',1),
        );
        if($users_model->validate($rules)->create()===false){
            $this->error($users_model->getError());
        }
        if(IS_POST){
            $this->__do_get_password();
        }
    }
    //修改密码
    public function password(){
        if(sp_is_user_login()){
            if(IS_POST){
                $reuls = array();
                $data['Password']=I("post.wpass");
                $map['MemberId']=session("user.MemberId");
                $user_model = M("member");
                $user =$user_model->where($map)->find();
                if(I('post.Password')!=I('post.dpass')){
                    $this->error("密码不一致");
                }
                if(sp_compare_password($data['Password'],$user['Password'])){
                    $rules = array(
                        //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
                        //array('MemberName', 'require', '用户名不能为空！', 1 ),
                        array('Password','/^([\s\S]*){6,16}$/','密码不能少于6位！',1),
                    );
                    if($user_model->validate($rules)->create()===false){
                        $this->error($user_model->getError());
                    }else{
                        $user_model->Password = sp_password($user_model->Password);
                        $result = $user_model->where($map)->save();
                        if($result){
                            $this->success("修改成功",U("User/Common/memberindex"));
                        }else{
                            $this->error("修改失败");
                        }
                    }
                }else{
                    $this->error("原密码错误");
                }
            }

        }
    }
    //验证密码
    private function  __do_get_password(){
        $users_model=M("member");
        $users_pro =M("memberprofile");
        $prowhere['CellPhone'] = I('post.phone_number');
        $res_pro = $users_pro->where($prowhere)->find();
        if($res_pro){
            $where['MemberId']= $res_pro['MemberID'];
            $data['Password']=sp_password(I("post.Password"));
            $data['ModUser']=empty($res_pro['RealName']?null:$res_pro['RealName']);
            $data['ModTime']=date("Y-m-d H:i:s");
            $result=$users_model->where($where)->save($data);
            if($result){
                $this->ajaxReturn(ajax_josn_data("修改成功","200",U('Index/Index'),$result),"JSON",JSON_UNESCAPED_UNICODE);
            }else{
                $this->ajaxReturn(ajax_josn_data("修改失败","400"),"JSON",JSON_UNESCAPED_UNICODE);
            }

        }else{
            $this->ajaxReturn(ajax_josn_data("账号不存在","401"),"JSON",JSON_UNESCAPED_UNICODE);
        }
       // $datapro['CellPhone']

    }
    //注册验证
    private function _do_mobile_region(){
        $users_model=M("member");
        $users_pro =M("memberprofile");
        $data['MemberName'] = I("post.MemberName");
        $data['Password'] = sp_password(I("post.Password"));
        $data['RegTime']=date("Y-m-d H:i:s");
        $data['ReginIP']=get_client_ip(0,true);

        $data['RecommendMember']=empty(I("post.Recommend"))?null:I("post.Recommend");
        $map_user['MemberName'] = $data['RecommendMember'];
        $user_data = $users_model->field('MemberId,MemberName')->where($map_user)->find();
        $data['RecommendMember'] = $user_data['MemberId'];

        $phone['CellPhone'] = I("post.phone_number");
        if($users_model->create($data)){
            $users_model->startTrans();
            $result = $users_model->add(); // 写入数据到数据库
            if($result){
                // 如果主键是自动增长型 成功后返回值就是最新插入的值
                $insertId['MemberID']= $result;
                $insertId['CellPhone']= $phone['CellPhone'] ;
                $res=$users_pro->add($insertId);
                if($res){
                    $users_model->commit();
                    $ressss = posdata("regpos",$result);
                    $this->ajaxReturn(ajax_josn_data("注册成功","200",U('User/Index/index'),$result),"JSON",JSON_UNESCAPED_UNICODE);
                }else{
                    $users_model->rollback();
                    $this->ajaxReturn(ajax_josn_data("注册失败","400"),"JSON",JSON_UNESCAPED_UNICODE);
                }
            }
        }

    }
    //登陆验证
    private function _do_mobile_login(){

        $users_model=M('member');

        $where['MemberName']=I('post.MemberName');
        $password=I('post.Password');
        if(preg_match('/^1(3|4|5|7|8)\d{9}$/',  $where['MemberName'])){//手机号登录
            $mw['CellPhone']= $where['MemberName'];
            $mres =M("memberprofile")->where($mw)->find();
            if($mres){
                $where= null;
                $where["tb_member.MemberId"]=$mres['MemberID'];
            }
        }
       // print_r($mres);exit;
        $result = $users_model->join("LEFT JOIN tb_memberprofile ON tb_member.MemberId = tb_memberprofile.MemberID")->where($where)->find();
        if(!empty($result)){
            if(sp_compare_password($password, $result['Password'])){
                //写入此次登录信息
                $data = array(
                    'LastLoginTime' => date("Y-m-d H:i:s"),
                    'LastLoginIP' => get_client_ip(0,true),
                );
                $users_model->where(array('MemberId'=>$result["MemberId"]))->save($data);
                $session_login_http_referer=session('login_http_referer');
               // echo $session_login_http_referer;exit;

                //session('login_http_referer','');
//                $this->success("登录验证成功！", $redirect);
                unset($result['Password']);
                //       session(array('name'=>'user','expire'=>10));
                session("user",$result);
                $CodeID['CodeID']=$result['MemberType'];
                $info['MemberType']=M()->table("sys_code")->where($CodeID)->find();
                if($info['MemberType']['CodeValue']=="d-member"){
                    session('user.MemberType','4');
                    session('user.MemberType1','5');
                }

                if(is_weixin()){
                    $redirect = U("User/Login/wxcode");
                }else{
                    if(is_mobile()){
                        $redirect=empty($session_login_http_referer)?U("Home/Index/visitf",array("card"=> authcode($result['MemberId'],"ENCODE"))):$session_login_http_referer;
                        // $redirect =U("Home/Index/visitf",array("card"=> authcode($result['MemberId'],"ENCODE")));
                    }else{
                        session("login_http_member",U('User/Common/train'));
                        $redirect=empty($session_login_http_referer)?U('User/Member/index'):$session_login_http_referer;
                    }
                }



                //print_r(session("user"));exit;
                $users_model->where(array('MemberId'=>$result["MemberId"]))->setField('FailTimes',"0");
                $this->ajaxReturn(ajax_josn_data("登录验证成功","200",$redirect,$result),"JSON",JSON_UNESCAPED_UNICODE);

            }else{
                //$this->error("密码错误！");
                if($result['FailTimes']>=3){
                    $this->ajaxReturn(ajax_josn_data("密码错误","402",U('Index/index')),"JSON",JSON_UNESCAPED_UNICODE);
                }else{
                    $users_model->where(array('MemberId'=>$result["MemberId"]))->setInc('FailTimes');
                    $this->ajaxReturn(ajax_josn_data("密码错误","402",U('Index/index')),"JSON",JSON_UNESCAPED_UNICODE);
                }

            }
        }else{
            $this->ajaxReturn(ajax_josn_data("用户不存在","401",U('Index/index'),$result),"JSON",JSON_UNESCAPED_UNICODE);
        }
    }
    public function wxcode(){
        wxcode();
    }

    //微信登陆
    public function dowx(){
        $appid = C("wxappid");
        $secret =C("wxsecret");
        $code = $_GET["code"];

//第一步:取得openid
        $oauth2Url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
        $oauth2 =  getJson($oauth2Url);

//第二步:根据全局access_token和openid查询用户信息
        $access_token = $oauth2["access_token"];
        $openid = $oauth2['openid'];
        $get_user_info_url = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
        $userinfo =getJson($get_user_info_url);
        $map['tb_member.openid'] = $userinfo['openid'];
        $users_model=M('member');
        $result = $users_model->join("LEFT JOIN tb_memberprofile ON tb_member.MemberId = tb_memberprofile.MemberID")->where($map)->find();
        $session_login_http_referer=session('login_http_referer');
        if(!empty($result)){
            unset($result['Password']);
            //       session(array('name'=>'user','expire'=>10));
            session("user",$result);
            $redirect=empty($session_login_http_referer)?U("Home/Index/visitf",array("card"=> authcode($result['MemberId'],"ENCODE"))):$session_login_http_referer;
            redirect($redirect);

        }else{
            if(sp_is_user_login()){
                $oppid_map['MemberId'] =session('MemberId');
                $data['openid'] = $userinfo['openid'];
                $resful =$users_model->where($oppid_map)->save($data);
                $redirect=empty($session_login_http_referer)?U("Home/Index/visitf",array("card"=> authcode($oppid_map['MemberId'],"ENCODE"))):$session_login_http_referer;
                redirect($redirect);

            }else{
                $this->display("Index:loginmobile");
            }

        }
    }

}