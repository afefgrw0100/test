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
			<div class="floor mgt mt70">
				<ul>
					<li><b>当前账户余额（元）</b><em class="info_num">¥<?php echo empty($user['Balance'])?"0":$user['Balance'];?></em></li>
					<li class="tixian"><b>可提现额度（元）</b><em class="info_num">¥<?php echo yue();?></em></li>
					<li><a href="<?php echo U('User/Common/cashmis');?>" class="btn">提现</a></li>
				</ul>
			</div>

			<div class="todo floor">
				<div class="title">提现记录</div>
				<form action="<?php echo U('User/Common/drawmgt');?>" method="get"  id="dosearch">
					<div class="time">
						时间：<input name="starttime" class="sang_Calender" type="text">
						到:&nbsp;<input name="endtime" class="sang_Calender" type="text">
						<input type="submit"  value="查询" class="btn">
					</div>
				</form>
				<div class="table">
					<table class="table" border="" cellspacing="" cellpadding="">
						<tr>
							<th>订单号</th>
							<th>提现金额</th>
							<th>当前状态</th>
							<th>交易时间</th>
							<th>操作</th>

						</tr>
					<?php if(is_array($infolist)): $i = 0; $__LIST__ = $infolist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($vo["SN"]); ?></td>
								<td>¥<?php echo ($vo["drawquantity"]); ?></td>
								<td>
									<?php if(($vo['status'] == 1) ): ?>提交中
										<?php elseif(($vo['status'] == 2)): ?>审批完成
										<?php elseif(($vo['status'] == 3)): ?>支付完成
										<?php elseif(($vo['status'] == 4)): ?>交易取消
										<?php elseif(($vo['status'] == 5)): ?>转账失败<?php endif; ?>
								</td>
								<td><?php echo ($vo["createtime"]); ?></td>
								<td>
									<?php if(($vo['status'] == 1) ): ?><a href="<?php echo U('User/Logic/outwith',array('withid'=>authcode($vo['ID'],'ENCODE')));?>">撤回</a>
										<?php else: ?>
										无<?php endif; ?>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table>
					<div class="page">
						<?php echo ($page); ?>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

</div>
<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery-1.11.1.js');?>"></script>
<script src="<?php echo tempurl('//www.3qqq.com/static/js/main.js');?>"></script>
<script src="<?php echo tempurl('//www.3qqq.com/static/js/datetime.js');?>"></script>
</body>

</html>