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
					<div class="baseInfo floor">

						<div class="title"><b>基本信息</b><em><a href="<?php echo U('User/Common/memberupdata');?>" >修改</a></em> <span><a href="<?php echo U('User/Economic/economic');?>">成为经纪人</a></span></div>
						<div class="con">
							<ul>
								<li ><b>用户名称：</b>	<em><?php echo ($user["MemberName"]); ?></em></li>
								<li><b>用户类型：</b>	<em><?php echo ($user["MemberType"]["CodeName"]); ?></em></li>
								<li><b>真实姓名：</b>	<em><?php echo ($user["RealName"]); ?></em></li>
								<li><b>微信号码：</b>	<em><?php echo empty($user['MicroMsg'])?"你还没有添加微信":$user['MicroMsg'];?></em></li>
								<li><b>手机号码：</b>	<em><?php echo ($user["CellPhone"]); ?></em></li>
								<li><b>详细地址：</b>	<em><?php echo ($user["Province"]["name"]); echo ($user["City"]["name"]); echo ($user["Street"]); ?></em></li>
							</ul>
							<div class="xing">
								<span>
									<img src="/static/images/user/xing_04.jpg">
								</span>
								<b class="g-star<?php echo ($user["StarLevel"]); ?>"></b></div>
						</div>
					</div>
					<div class="accoutInfo floor">
						<div class="title"><b>账户信息</b></div>
						<div class="con">
							<ul>
								<li>
									<span class="info1">可用余额</span>
									<span class="info2"><b>¥<em class="info_num"><?php echo empty($user['Balance'])?"0":$user['Balance'];?></em></b><i>元</i></span>
									<span class="info3"><a href="">查看资金交易记录</a></span>
								</li>
								<li>
									<span class="info1">可提金额</span>
									<span class="info2"><b>¥<em class="info_num"><?php echo empty($user['FreezeAmount'])?"0":($user['Balance']-$user['FreezeAmount'])*$user['CodeGroup']['CodeValue'];?></em></b><i>元</i></span>
									<span class="info3"><a href="">查看可兑换物品</a></span>
								</li>
								<li>
									<span class="info1">用户积分</span>
									<span class="info2"><b>¥<em class="info_num"><?php echo empty($user['Integration'])?"0":$user['Integration'];?></em></b><i>分</i></span>
									<span class="info3"><a href="">提现</a></span>
								</li>

							</ul>
						</div>
					</div>
					<div class="accoutsafe floor">
						<div class="title"><b>账户安全</b></div>
						<div class="con">
							<!--<ul>
                                <li><a href="">登录密码</a></li>
                                <li><a href="">支付密码</a></li>
                                <li><a href="">修改密码</a></li>
                            </ul>-->

							<table class="table" border="" cellspacing="" cellpadding="">
								<tbody>
								<tr><td>登录密码</td><td>用于可登录的密码</td><td><a href="<?php echo U('Member/getPassword');?>">修改密码</a></td></tr>
								</tbody>

							</table>
						</div>
					</div>
				</div>
				
		</div>
		</div>
		
		
		
	</body>
</html>