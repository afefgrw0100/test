<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>

	<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/style/bootstrap.min.css');?>" />
	<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/style/iframe.css');?>" />

	<body>

		<div class="mainhtml">
			<div class="mainhtml_c">
				<div class="fr">
					<div class="top_right">
    <span class="hello">Hi , <i><?php echo dataG(); echo ($_SESSION['user']['RealName']); ?></i></span>
    <span class="time">上次登录时间：<i><?php echo empty(session('user.LastLoginTime'))?"当前是第一次登录":session('user.LastLoginTime');?></i></span>
						<span class="btn">
                            <?php if(session('user.MemberTypesss') == 400): ?><a href="<?php echo U('User/Common/rechager');?>" class="btn1">充值</a><?php endif; ?>
                             <?php if(session('user.MemberType') == 4): ?><a href="<?php echo U('User/Common/cashmis');?>"  class="btn2">提现</a><?php endif; ?>

						</span>
</div>
					<div class="todo floor mt70">
						<div class="title">找回密码</div>
						<form action="<?php echo U('User/Login/password');?>" method="post" id ="doform">
						<div class="getpassword">
							<div class="con">
								<ul>
									<li><b>原密码：</b><em><input type="password" name = "wpass" class="form-control"></em></li>
									<li><b>新密码：</b><em><input type="password" name="Password" class="form-control" placeholder="6-16位密码"></em></li>
									<li><b>确认新密码：</b><em><input type="password" name="dpass" class="form-control" placeholder="请再次输入新密码"></em></li>

								</ul>

							</div>
							<div class="submit_btn">
								<a id="sub_mit" >提交</a>
							</div>
						</div>
						</form>
					</div>

				</div>
			</div>
		</div>
		<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery-1.11.1.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/js/main.js');?>"></script>
	<script type="text/javascript">
		$("#sub_mit").click(function(){
			var formurl =$("#doform").attr("action");
			$.ajax({
				cache: false,
				type: "POST",
				url:formurl,
				data:$('#doform').serialize(),// 你的formid
				async: true,
				error:function(request){
				},
				beforeSend:function(){},
				success:function(data){
					if(data.status==1){
						filterWarn(data.info);
						window.location.href=data.url;
					}else {
						filterWarn(data.info);
					}
				},

			});
		});
	</script>
	</body>

</html>