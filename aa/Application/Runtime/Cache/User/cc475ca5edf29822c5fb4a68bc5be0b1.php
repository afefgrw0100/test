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
					<div class="recharge">
						<div class="title"><b>提现</b></div>
						<form action="<?php echo U('User/logic/dowith');?>" method="post" id="doform">
							<div class="con">
								<div class="payway">
									<div class="weixin"><input type="radio" checked="checked"><img src="//www.3qqq.com/static/images/user/user_11.png"></div>
									<div class="btn"><a href="<?php echo U('User/Common/weiuser');?>">修改</a></div>
								</div>
								<div class="money">
									<input type="hidden" value="<?php echo ($info["MemberId"]); ?>" name="memberid">
									<input type="hidden" value="<?php echo ($info["openid"]); ?>" name="drawaccount">
									<b>提现金额： </b>
									<span><input type="text" class="form-control" name="drawquantity">元</span>
								</div>

								<div class="btn btn-warning"><a href="javascript:void(0)" id="sub_mit">下一步</a></div>
							</div>
						</form>
						
						
					
					</div>

				</div>
			</div>
		</div>
		<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery-1.11.1.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/js/ZeroClipboard.js');?>"></script>
		<script type="text/javascript">
			$("#sub_mit").click(function(){
				$("#doform").submit();
			});
		</script>
	</body>

</html>