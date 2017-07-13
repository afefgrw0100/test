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
					<div class="baseInfo floor">

						<div class="title">
							<b>基本信息</b>
							<em><a href="<?php echo U('User/Common/memberupdata');?>" >修改</a></em>
							<?php if($user['MemberStatu'] == 2): ?><span class="status3">
										<a href="javascript:void (0)">经纪人审核中</a>
										<div class="text" id="text"><i id="close">X</i><b>请耐心等待平台审核，并保持电话畅通！</b></div>
									</span>
								<?php elseif($user['MemberStatu'] == 3): ?>
									<span class="status2">
										<a href="<?php echo U('User/Economic/trainning');?>" target="_parent">经纪人考核</a>
										<div class="text" id="text"><i id="close">X</i><b>只差一步，点击完成考核即可开启赚钱模式！</b></div>
									</span>
								<?php elseif(($user['MemberType']['CodeID'] == 3) and ($user['MemberStatu'] == 1)): ?>
									<span class="status1">
										<a href="<?php echo U('User/Economic/economic');?>">成为经纪人</a>
										<div class="text" id="text"><i id="close">X</i><b>成为特资经纪人，开启你的第二职业！</b></div>
									</span><?php endif; ?>
							<span><a href="<?php echo U('User/Common/weiuser');?>"><?php echo empty($user['openid'])?'绑定微信号':'修改微信绑定';?></a></span>
							<?php if($user['MemberType']['CodeID'] == 4): ?><span><a href="<?php echo U('User/Common/card');?>">邀请好友成为特资经纪人</a></span><?php endif; ?>
						</div>
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
									<img src="//www.3qqq.com/static/images/user/xing_04.jpg">
								</span>
								<b class="g-star<?php echo ($user["StarLevel"]); ?>"></b></div>
						</div>
					</div>
					<div class="accoutInfo floor">
						<div class="title"><b>账户信息</b></div>
						<div class="con">
							<ul>
								<li>
									<span class="info1">账户余额</span>
									<span class="info2"><b>¥ <em class="info_num"><?php echo empty($user['Balance'])?"0":$user['Balance'];?></em></b><i>元</i></span>
									<span class="info3"><a href="<?php echo U('User/Common/yuehis');?>">查看余额变动记录</a></span>
								</li>
								<li>
									<span class="info1">冻结金额</span>
									<span class="info2"><b>¥ <em class="info_num"><?php echo ($user["FreezeAmount"]); ?></em></b><i>元</i></span>
									<span class="info3"><a href="<?php echo U('User/Common/freehis');?>">查看冻结记录</a></span>
								</li>
								<li>
									<span class="info1">可提金额</span>
									<span class="info2"><b>¥ <em class="info_num"><?php echo yue();?></em></b><i>元</i></span>
									<?php if((session('user.MemberType') == 4) and (session('user.MemberStatu') == 1)): ?><span class="info3"><a href="<?php echo U('User/Common/cashmis');?>">提现</a></span><?php endif; ?>

								</li>
								<li>
									<span class="info1">剩余次数</span>
									<span class="info2"><b><em class="info_num"><?php echo ($user["freeCount"]); ?></em></b><i>次</i></span>
									<span class="info3"><a href="">免费阅读尽调报告</a></span>
								</li>

							</ul>
						</div>
					</div>
					<?php if(($user['MemberType']['CodeID'] == 5) OR (session('user.MemberType1') == 5) ): ?><div class="accoutInfo floor">
						<div class="title"><b>合伙人信息</b></div>
						<div class="con partner">
							<ul>
								<li>
									<span class="info1">我的经纪人</span>
									<span class="info2"><b><em class="info_num"><?php echo user_partner();?></em></b><i>个</i></span>
									<span class="info3"><a href="<?php echo U('User/Common/partner');?>">查看我的经纪人</a></span>
								</li>
								<li>
									<span class="info1">合伙项目</span>
									<span class="info2"><b><em class="info_num"><?php echo user_partnerproject();?></em></b><i>个</i></span>
									<span class="info3"><a href="<?php echo U('User/Common/partnerproject');?>">查看合伙项目</a></span>
								</li>
								<li>
									<span class="info1">总金额</span>
									<span class="info2"><b>¥<em class="info_num"><?php echo user_partnerorder();?></em></b><i>元</i></span>
									<span class="info3"><a href="<?php echo U('User/Common/partnerorder');?>">查看合伙订单</a></span>
								</li>


							</ul>
						</div>
					</div><?php endif; ?>
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
		<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery-1.11.1.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/js/main.js');?>"></script>
		<script>
			$(function(){
				$('#close').click(function(){
					$('#text').hide();
				})

				$('.status2 a').html('经纪人考核') ;
				$('.status2 .text b').html('只差一步，点击完成考核即可开启赚钱模式！') ;

				$('.status3 a').html('经纪人审核中') ;
				$('.status3 .text b').html('请耐心等待平台审核，并保持电话畅通！') ;



			})
		</script>

	</body>
</html>