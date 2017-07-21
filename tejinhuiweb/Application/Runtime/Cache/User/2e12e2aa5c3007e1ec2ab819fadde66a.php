<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="ui-page-login">

	<head>
		<meta charset="UTF-8">
		<title></title>

		<meta charset="UTF-8">
		<meta name="keywords" content="<?php echo ($_SESSION['keyword']['keyword']); ?>" />
		<meta name="description" content="<?php echo ($_SESSION['keyword']['desc']); ?>" />
		<title><?php echo ($_SESSION['keyword']['title']); ?></title>
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/mui.min.css');?>">
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/style.css');?>" />
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/iconfont.css');?>" />

		<meta name="viewport" id="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">



	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<h1 class="mui-title">登录</h1>
		</header>
		
		<section class="loginPage">
			<form method="post" action="<?php echo U('Login/dologin');?>" id="loginForm">
				<div class="input-container">
					<input class="username" type="text" placeholder="用户名/已验证手机" name="MemberName" id="mname" autocomplete="off" />
				</div>

				<div class="input-container">
					<input class="password" type="password" placeholder="请输入密码" autocomplete="off"  id="pword" name="Password" />
				</div>

				<!--<div class="input-container">-->
					<!--<input class="password" type="text" placeholder="请输入验证码" autocomplete="off" name="verify" id="verify" />-->
					<!--<span class="code-box"><img class="verify_img" src="/index.php?m=Web&amp;c=Checkcode&amp;a=index&amp;length=4&amp;font_size=8&amp;width=65&amp;height=30&amp;charset=1234567890&amp;use_noise=1&amp;use_curve=0&amp;time=0.5246274670379651" onclick="this.src='/index.php?m=Web&amp;c=Checkcode&amp;a=index&amp;length=4&amp;font_size=8&amp;width=65&amp;height=30&amp;charset=1234567890&amp;use_noise=1&amp;use_curve=0&amp;time='+Math.random();" style="cursor: pointer;" title="点击获取"></span>-->
				<!--</div>-->
				<div class="notice"></div>
				<div class="btn" id="sub_mit" data_status="1"><a href="javascript:void(0)" >登录</a></div>
			</form>
			<div class="info"><a href="<?php echo U('User/Index/region');?>">免费注册</a></div>
		</section>
		<div class="bottom">
    <ul>
        <li><a href="<?php echo U('Home/Index/Index');?>" class="active"><i class="iconfont">&#xe629;</i><b>平台首页</b></a></li>
        <li><a href="<?php echo U('Home/Lists/Lists');?>"><i class="iconfont">&#xe63f;</i><b>资产大厅</b></a></li>
        <li><a href="<?php echo U('User/Common/memberindex');?>"><i class="iconfont">&#xe60f;</i><b>个人中心</b></a></li>
    </ul>
</div>
<script type="text/javascript">
    var urlstr = window.location.href ;
    $(".bottom ul li a").removeClass("active");
    if(urlstr.indexOf("Lists")>=0){
        $(".bottom ul li a:eq(1)").addClass("active");
    }else if(urlstr.indexOf("Common")>=0){
        $(".bottom ul li a:eq(2)").addClass("active");
    }else {
        $(".bottom ul li a:eq(0)").addClass("active");
    }
    function search_text(){
        var rcc = $(".search_text").val();
        console.log(111);
        if(rcc==""){
            return false;
        }else {
            return true;
        }

    }
</script>
<!-- 站长统计开始  -->
<div style="display:none">
    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259609671'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1259609671' type='text/javascript'%3E%3C/script%3E"));</script>
</div>
<!-- 站长统计结束  -->


		<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery-1.11.1.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/mobile/js/mui.min.js');?>"></script>
		<script type="text/javascript">
			$(function(){
				$(document).keyup(function(event){
					if(event.keyCode ==13){
						$("#sub_mit").trigger("click");
					}
				});
				$("#sub_mit").click(function(){
					var sub_status= $("#sub_mit").attr("data_status");
					if(sub_status==2){
						return false;
					}
					var formurl = $("#loginForm").attr("action");
					$.ajax({
						cache: false,
						type: "POST",
						url:formurl,
						data:$('#loginForm').serialize(),// 你的formid
						async: true,
						error:function(request){
							noticediv("请求服务器失败");
						},
						beforeSend:function(){
							//表单js验证
							var phone = $("#mname").val(),pword=$("#pword").val();
							//!(/^1(3|4|5|7|8)\d{9}$/.test(phone))
							if(!(/^[_0-9a-z]{6,16}$/i.test(phone))){
								noticediv("请输入6位以上字符或手机号码");
								return false;
							}else{
								csserror("#mname","",false);
							}
							if(pword==""){
								noticediv("密码不能为空");
								return false;
							}else {
								noticediv("");
							}
							$("#sub_mit").attr("data_status","2");
						},
						success:function(data){
							if(data.code_josn=="200") {
								//alert(data.info);
								window.location.href=data.url;
							}else if(data.code_josn=="400") {
								//alert(1111);
								noticediv(data.info);
								$(".verify_img").attr("src",verify());
								$("#sub_mit").attr("data_status","1");
							}else if(data.code_josn=="401") {
								noticediv(data.info);
								$(".verify_img").attr("src",verify());
								$("#sub_mit").attr("data_status","1");
							}else if(data.code_josn=="402") {
								noticediv(data.info);
								$(".verify_img").attr("src",verify());
								$("#sub_mit").attr("data_status","1");
							}

						},

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
				function noticediv(data){
					$(".notice").html(data);
				}
				$("#clickVer").click(function(){
					$(".verify_img").attr("src",verify());
				});
				function verify(){
					return '/index.php?m=Web&c=Checkcode&a=index&length=4&font_size=8&width=65&height=30&charset=1234567890&use_noise=1&use_curve=0&time='+Math.random();
				}
			});
		</script>
	</body>

</html>