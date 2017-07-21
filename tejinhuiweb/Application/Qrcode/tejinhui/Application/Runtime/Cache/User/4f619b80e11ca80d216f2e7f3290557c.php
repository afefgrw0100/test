<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo tempurl('/static/style/bootstrap.min.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('/static/style/style.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('/static/style/iconfont.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('/static/style/valifrom.css');?>" />
    <script src="<?php echo tempurl('/static/js/jquery-1.7.2.min.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/jquery.SuperSlide.2.1.1.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/main.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/jquery.flexslider-min.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/easyscroll.js');?>"></script>
    <script type="text/javascript">
        $(function() {
            $('.div_scroll').scroll_absolute({
                arrows: true
            })
        });
    </script>

</head>



<body>
<!-- header -->
<div class="header">
    <div class="top_line"></div>
    <div class="top2">
        <div class="top2_c">
            <div class="fl logo"><b><img src="/static/images/common/index_03.jpg"></b><em><img src="/static/images/common/index_06.jpg"></em>
            </div>
            <div class="fr search">
                <form action="<?php echo U('Home/Search/lists');?>" method="get">
                <input type="text" class="search_text" name="search" placeholder="找项目"  value="<?php echo ($search); ?>">
                <input type="submit" class="search_bth" value="">
                </form>
            </div>

        </div>

    </div>
    <div class="nav">
        <div class="nav_c">
            <div class="fl">
                <ul>
                    <li class="">
                        <a href="<?php echo U('Home/Index/index');?>">首页</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Lists/lists');?>">优质项目 </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Web/Index/publish');?>">发布项目</a>
                    </li>
                    <li>
                        <a href="#">赚钱模式</a>
                    </li>
                    <li>
                        <a href="#">安全保障</a>
                    </li>
                    <li>
                        <a href="#">新手指南</a>
                    </li>
                </ul>
            </div>
            <div class="fr member_center">
                <a href="<?php echo U('User/Index/index');?>">会员中心</a>
            </div>
        </div>

    </div>
</div>
<!-- header end -->
		<div class="login-form">
			<div class="main">
				<div class="fl region_bg">
					<div class="login-tab">
						<a class="login-tab_l" href="<?php echo U('User/Index/index');?>">登录</a>
						<a class="login-tab_r select" href="<?php echo U('User/Index/region');?>">注册</a>
					</div>
					<div class="login_con region">
						<form id="registerForm" method="post" action="<?php echo U('Login/doregion');?>">
		
						<!--<div class="msg-error">验证码不正确或验证码已过期</div>-->
						<div class="loginname">
							<input class="form-control" type="text" name="MemberName" id="MemberName" placeholder="姓名" autocomplete="off">
							</div>
						<div class="password">
							<input class="form-control" name="phone_number" id="phone_number" type="text" autocomplete="off"
								placeholder="手机号码（注册后不能修改）">
							<!--<span class="account-error valid_message"></span>-->
						</div>
						<div class="imgCode">
							<div class="code_input">
								<input type="text" class="form-control" name="mobile_code" id="mobile_code" placeholder="验证码" autocomplete="off" >
							</div>
						<div class="Verifi"><input class="btn" type="button" value="获取验证码" id="Verifi"></div>
							
						
						</div>
						<div class="password">
							<input class="form-control password1" type="password" name="Password" id="password" placeholder="密码" autocomplete="off" oncontextmenu="return false" onpaste="return false">
							
						</div>
						<div class="password">
							<input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="确认密码" autocomplete="off" oncontextmenu="return false" onpaste="return false" >
							
						</div>
						<div class="forget-pw">
							<a class="optional" id="optional">邀请码</a>
							<p class="code-holder hidden"><input type="text" class="form-control" name="Recommend" autocomplete="off" placeholder="邀请码"></p>
						</div>
						<div class="submit"><input type="button" value="注册" class="btn" id="sub_mit" data_status="1"></div>
						</form>	
					</div>
					
					
				</div>
				<div class="fr"><img src="/static/images/temp/login_06.jpg"></div>
			</div>
			
		</div>

<!--footer -->
<div class="footer">
    <div class="footer_c">
        <div class="info1">
            <div class="fl">
                <div class="help">
                    <a href="">关于特金汇 </a>
                    <a href="">安全保障</a>
                    <a href="">常见问题</a>
                    <a href="">法律政策 </a>
                    <a href=""> 资费说明</a>
                    <a href="">媒体报道</a>
                </div>
                <div class="link">
                    <span class="tel"><b>4000-000-000</b><em>（工作时间：9:00-22:00）</em></span>
                    <span class="email">tejinhui@.com</span>
                    <span class="qq">在线客服</span>
                </div>
            </div>
            <div class="fr"><img src="/static/images/common/erweima.png"></div>
        </div>
        <div class="info2">
            <div class="pic">
                <img src="/static/images/temp/footer_pic.png">
                <img src="/static/images/temp/footer_pic2.png">
                <img src="/static/images/temp/footer_pic2.png">
                <img src="/static/images/temp/footer_pic2.png">
                <img src="/static/images/temp/footer_pic2.png">

            </div>
            <div class="con">湘ICP备12023672号-5  |  湘公网安备 11010502025073 号
                © 2016 tejinhui.com  | 特金汇有限公司 版权所有</div>
        </div>

    </div>
</div>

<script type="text/javascript">
	$(function(){
		$('#optional').click(function() {
			$(this).addClass('active');
			$(this).next().removeClass('hidden');
		});
		//提交表单
		$("#sub_mit").click(function(){
			var sub_status= $("#sub_mit").attr("data_status");
			if(sub_status==2){
				return false;
			}
			var formurl = $("#registerForm").attr("action");
			$.ajax({
				cache: false,
				type: "POST",
				url:formurl,
				data:$('#registerForm').serialize(),// 你的formid
				async: true,
				error:function(request){
					aler(1111);
					$(".msg-error").html("请求服务器失败");
				},
				beforeSend:function(){
					//表单js验证
					//用户名
					if($("#MemberName").val()==""||!(/^[_0-9a-z]{6,16}$/i.test($("#MemberName").val()))){
						csserror("#MemberName","用户名为6-16位字符",true);
						return false;
					}else {
						csserror("#MemberName","",false);
					}
					var phone = $("#phone_number").val(),pword=$("#password").val();
					if(!(/^1(3|4|5|7|8)\d{9}$/.test(phone))){
						csserror("#phone_number","账号为手机号",true);
						return false;
					}else{
						csserror("#phone_number","",false);
					}
					if(pword.length<6){
						csserror("#password","密码不能少于6位",true);
						return false;
					}else {
						csserror("#password","",false);
					}
					if($("#confirm_password").val==""||$("#confirm_password").val()!=pword){
						csserror("#confirm_password","密码不一致",true);
						return false;
					}else {
						csserror("#confirm_password","",false);
					}
					$("#sub_mit").attr("data_status","2");
				},
				success:function(data){
					if(data.code_josn=="200") {
						window.location.href=data.url;
					}else if(data.code_josn=="4033") {
						csserror("#phone_number",data.info,true);
						$("#sub_mit").attr("data_status","1");
					}else if(data.code_josn=="403") {
						csserror("#mobile_code",data.info,true);
						$("#sub_mit").attr("data_status","1");
					}else if(data.code_josn=="402") {
						csserror("#confirm_password",data.info,true);
						$("#sub_mit").attr("data_status","1");
					}else if(data.code_josn=="401") {
						csserror("#MemberName",data.info,true);
						$("#sub_mit").attr("data_status","1");
					}


				},

			});

		});
		var murl ="<?php echo U('Portal/Index/mcode');?>";
		$("#Verifi").click(function(){
			var phoneNumber = $("#phone_number").val();
			if(!(/^1(3|4|5|7|8)\d{9}$/.test(phoneNumber))){
				csserror("#phone_number","请填写正确手机号",true);
				return false;
			}else{
				csserror("#phone_number","",false);
			}
			$.ajax({
				cache: false,
				type: "POST",
				url:murl,
				data:{mobile:phoneNumber},// 你的formid
				async: true,
				error:function(request){
				},
				success:function(data){
					if(data.code_josn=='200'&&data.data.status=="ok"){
							csserror("#mobile_code","验证码发送成功",true);
					}else {
						csserror("#mobile_code","发送失败",true);
					}
				}
			});

		});
		function csserror(id,cont,sta){
			if(sta==true){
				$(id).addClass("error");
				$(id).nextAll().remove();
				$(id).after('<label id="Password-error" class="error" for="Password">'+cont+'</label>');
			}else {
				$(id).removeClass("error")
				$(id).nextAll().remove();
			}

		}
		function verify(){
			return '/index.php?m=Web&c=Checkcode&a=index&length=4&font_size=14&width=100&height=55&charset=1234567890&use_noise=1&use_curve=0&time='+Math.random();
		}
	});
</script>
		
	</body>
</html>