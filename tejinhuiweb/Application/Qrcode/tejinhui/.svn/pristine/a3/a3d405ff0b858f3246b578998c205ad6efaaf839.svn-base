<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<script src="<?php echo tempurl('/static/js/jquery-1.7.2.min.js');?>"></script>
<script src="<?php echo tempurl('/static/js/main.js');?>"></script>
<link rel="stylesheet" href="<?php echo tempurl('/static/style/bootstrap.min.css');?>" />
<link rel="stylesheet" href="<?php echo tempurl('/static/style/iframe.css');?>" />
<body>
<div class="mainhtml">
	<div class="mainhtml_c">
		<div class="fr">
			<div class="top_right">
    <span class="hello">Hi , <i><?php echo dataG(); echo ($_SESSION['user']['RealName']); ?></i></span>
    <span class="time">上次登录时间：<i><?php echo empty(session('user.LastLoginTime'))?"当前是第一次登录":session('user.LastLoginTime');?></i></span>
						<span class="btn"><a href="<?php echo U('User/Economic/visitf');?>" class="btn1">充值</a><a href="<?php echo U('User/Economic/trainning');?>"  class="btn2">提现</a>
						</span>
</div>
			<div class="floor mgt mt70">
				<ul>
					<li><b>当前账户余额（元）</b><em class="info_num">¥10000</em></li>
					<li class="tixian"><b>可提现额度（元）</b><em class="info_num">¥8000</em></li>
					<li><a href="" class="btn">提现</a></li>
				</ul>
			</div>

			<div class="todo floor">
				<div class="title">提现记录</div>
				<div class="time">时间：<input name="starttime" class="sang_Calender" type="text">
					到:&nbsp;<input name="endtime" class="sang_Calender" type="text">
					<input type="button"  value="查询" class="btn"></div>
				<div class="table">
					<table class="table" border="" cellspacing="" cellpadding="">
						<tr>
							<th>订单号</th>
							<th>提现金额</th>
							<th>当前状态</th>
							<th>交易时间</th>
							<th>操作</th>

						</tr>

						<tr>
							<td>2016323212838</td>
							<td>¥5000</td>
							<td>申请中</td>
							<td>2016-11-12</td>
							<td><a href="">撤回</a></td>

						</tr>

						<tr>
							<td>2016323212838</td>
							<td>¥5000</td>
							<td>申请中</td>
							<td>2016-11-12</td>
							<td><a href="">撤回</a></td>

						</tr>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>

</div>
<script src="<?php echo tempurl('/static/js/datetime.js');?>"></script>
</body>

</html>