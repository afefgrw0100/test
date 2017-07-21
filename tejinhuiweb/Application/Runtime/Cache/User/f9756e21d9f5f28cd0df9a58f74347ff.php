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
			<h1 class="mui-title">注册</h1>
		</header>
		
		<section class="loginPage">
			<form id="registerForm" method="post" action="<?php echo U('Login/doregion');?>">
			<div class="input-container">
				<input class="username" type="text" placeholder="用户名" autocomplete="off" name="MemberName" id="MemberName" />
			</div>
			
			<div class="input-container">
				<input class="username" type="text" placeholder="已验证手机" autocomplete="off" name="phone_number" id="phone_number" />
			</div>
			<div class="input-container">
				<input class="code" type="text" placeholder="请输入验证码"  name="mobile_code" id="mobile_code"/>
				<div class="Verifi"><input class="btn1" type="button" value="获取验证码" id="Verifi"></div>
			</div>
			
			
			
			<div class="input-container">
				<input class="password" type="password" placeholder="请输入新密码" autocomplete="off" name="Password" id="password" />
			</div>
			
			<div class="input-container">
				<input class="password" type="password" placeholder="确认密码" autocomplete="off" name="confirm_password" id="confirm_password" />
			</div>
			
			<div class="input-container">
				<input class="password" type="text" name="Recommend" autocomplete="off" value="<?php echo ($_SESSION['uic']['MemberName']); ?>" <?php echo empty(session('uic'))?'':"disabled='disabled'" ;?>  placeholder="推荐人" />
			</div>
			
			<div class="notice"></div>
			<div class="btn"  id="sub_mit" data_status="1"><a  href="javascript:void(0)">注册</a></div>
			</form>
			<div class="info"><a href="<?php echo U('User/Index/index');?>">登陆</a></div>
		</section>

		<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery-1.11.1.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/mobile/js/mui.min.js');?>"></script>
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
</script>
<!-- 站长统计开始  -->
<div style="display:none">
    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259609671'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1259609671' type='text/javascript'%3E%3C/script%3E"));</script>
</div>
<!-- 站长统计结束  -->


		<script type="text/javascript">
			$(function(){
//			$('#protocol').click(function() {
//				$('#mask').show();
//			})
//
//			$('#close').click(function() {
//				$('#mask').hide();
//			})
//			$('#sub_btn').click(function() {
//				$('#mask').hide();
//			})

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
							noticediv("请求服务器失败");
						},
						beforeSend:function(){
							//表单js验证


							//用户名
							if($("#MemberName").val()==""||!(/^[_0-9a-z]{6,16}$/i.test($("#MemberName").val()))){
								noticediv("用户名为6-16位字符");
								return false;
							}else {
								noticediv("");
							}
							var phone = $("#phone_number").val(),pword=$("#password").val();
							if(!( /^0{0,1}(13[0-9]|14[0-9]|17[0-9]|15[0-9]|153|156|18[0-9])[0-9]{8}$/.test(phone))){
								noticediv("账号为手机号");
								return false;
							}else{
								noticediv("");
							}
							if(pword.length<6){
								noticediv("密码不能少于6位");
								return false;
							}else {
								noticediv("");
							}
							if($("#confirm_password").val==""||$("#confirm_password").val()!=pword){
								noticediv("密码不一致");
								return false;
							}else {
								noticediv("");
							}

//						var checkbox =document.getElementById('agreen');;
//						if(checkbox.checked){
//							//选中了
//						}else{
//							filterWarn("你必须同意 《特金汇用户注册协议》");
//							return false;
//							//没选中
//						}

							$("#sub_mit").attr("data_status","2");
						},
						success:function(data){
							if(data.code_josn=="200") {
								alert("注册成功");
								setTimeout(function(){
									window.location.href=data.url;
								},3000);

							}else if(data.code_josn=="4033") {
								noticediv(data.info);
								$("#sub_mit").attr("data_status","1");
							}else if(data.code_josn=="403") {
								noticediv(data.info);
								$("#sub_mit").attr("data_status","1");
							}else if(data.code_josn=="402") {
								noticediv(data.info);
								$("#sub_mit").attr("data_status","1");
							}else if(data.code_josn=="401") {
								noticediv(data.info);
								$("#sub_mit").attr("data_status","1");
							}


						},

					});

				});
				var murl ="<?php echo U('Portal/Index/mcode');?>";
				$("#Verifi").click(function(){
					//var ccc = $("#sub_mit").trigger("click");
					//return false;
					var phoneNumber = $("#phone_number").val();
					if(!( /^0{0,1}(13[0-9]|14[0-9]|17[0-9]|15[0-9]|153|156|18[0-9])[0-9]{8}$/.test(phoneNumber))){
						noticediv("请填写正确手机号");
						return false;
					}else{
						noticediv("");
					};


					$.ajax({
						cache: false,
						type: "POST",
						url:murl,
						data:{mobile:phoneNumber},// 你的formid
						async: true,
						beforeSend:function(){
							var ccccc = true;
							$.ajax({
								cache: false,
								type: "POST",
								url:"/index.php/User/Login/getphone",
								data:{	phone:phoneNumber,},// 你的formid
								async: false,
								beforeSend:function(){

								},
								error:function(request){
								},
								success:function(data){
									if(data.status==1){
										return true;
									}else {
										noticediv("用户已存在");
										ccccc = false;
									}
								}
							});
							return ccccc;
						},
						error:function(request){
						},
						success:function(data){
							if(data.code_josn=='200'&&data.data.status=="ok"){
								noticediv("");
								alert("验证码发送成功");

								//filterWarn("验证码发送成功");
								//csserror("#mobile_code","验证码发送成功",true);
							}else {
								noticediv("发送失败");
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
				function noticediv(data){
					$(".notice").html(data);
				}

			});
		</script>
	</body>

</html>