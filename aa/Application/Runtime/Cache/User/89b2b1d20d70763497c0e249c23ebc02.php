<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery-1.11.1.js');?>"></script>
	<script src="<?php echo tempurl('//www.3qqq.com/static/js/main.js');?>"></script>
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

						<div class="table">
							<h2><?php echo ($info["title"]); ?></h2>
							<div class="time">发布时间：<?php echo ($info["createtime"]); ?></div>
							<div class="training-con">
								<?php echo ($info["content"]); ?>
								
							</div>
							
						</div>
					</div>

				</div>
			</div>
		</div>

	</body>

</html>