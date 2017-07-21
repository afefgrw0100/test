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
					<div class="title">订单管理</div>
					<form action="<?php echo U('User/Common/ordermgt');?>" method="get"  id="dosearch">
						<div class="mypublish">
							<div class="fl category"><em>信息类别：</em>
									<span>
										<select name="type">
											<option value="0">所有信息</option>
											<option value="1">发布信息</option>
											<option value="2">购买买断信息</option>
											<option value="3">经济人认证</option>
											<option value="4">其他</option>
										</select>
									</span>
							</div>
							<div class="fl time">时间：<input name="starttime" class="sang_Calender" type="text">
								到:&nbsp;<input name="endtime" class="sang_Calender" type="text">
								<input type="submit"  value="查询" class="btn"></div>
						</div>
					</form>
				<div class="table">
					<table class="table" border="" cellspacing="" cellpadding="">
						<tr>
							<th>订单号</th>
							<th>订单类别</th>
							<th>应付</th>
							<th>产品</th>
							<th>订单时间</th>
							<th>订单状态</th>
							<th>操作</th>
						</tr>
					<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($vo["sn"]); ?></td>
							<td>
								<?php if(($vo['Type'] == 1)): ?>发布信息
									<?php elseif($vo['Type'] == 2): ?>购买信息
									<?php elseif($vo['Type'] == 3): ?> 经济人费用
									<?php elseif($vo['Type'] == 4): ?> 充值
									<?php elseif($vo['Type'] == 5): ?> 买断信息<?php endif; ?>
							</td>
							<td><em class="info_num"><?php echo ($vo["DealPrice"]); ?></em></td>
							<td><?php echo ($vo["ProductName"]); ?></td>
							<td><?php echo ($vo["CreateTime"]); ?></td>
							<td>
								<?php if($vo['OrderStatue'] == 1): ?>待支付
									<?php elseif($vo['OrderStatue'] == 2): ?>支付完成
									<?php elseif($vo['OrderStatue'] == 3): ?> 退款申请中
									<?php elseif($vo['OrderStatue'] == 4): ?> 已退款
									<?php elseif($vo['OrderStatue'] == 11): ?> 已取消
									<?php elseif($vo['OrderStatue'] == 12): ?> 免费阅读<?php endif; ?>
							</td>
							<td>
								<?php if($vo['OrderStatue'] == 1): ?><a href="<?php echo U('user/payment/index',array( 'codekey'=>authcode($vo['id'],'ENCODE'), 'type'=>authcode($vo['CodeValue'],'ENCODE'), 'codetype'=>authcode($vo['type'],'ENCODE') ));?>" target="_parent">去支付</a>
								<a href="<?php echo U('User/Logic/offorder',array('codekey'=>authcode($vo['id'],'ENCODE')));?>">取消</a>
								<?php elseif(($vo['OrderStatue'] == 2) AND ($vo['Type'] == 1)): ?>
								<a href="<?php echo U('User/Logic/orderout',array('codekey'=>authcode($vo['id'],'ENCODE'),'pid'=>authcode($vo['ProductID'],'ENCODE')));?>">申请退款</a>
								<?php elseif(($vo['OrderStatue'] == 2) AND ($vo['Type'] == 5)): ?>
								<a href="<?php echo U('User/Common/dealview',array('codekey'=>authcode($vo['id'],'ENCODE'),'pid'=>authcode($vo['ProductID'],'ENCODE')));?>" target="_parent">查看买断信息</a>
								<?php elseif(($vo['OrderStatue'] == 3)): ?>
								等待退款
								<?php elseif(($vo['OrderStatue'] == 4)): ?>
								退款成功
								<?php elseif(($vo['OrderStatue'] == 11)): ?>
								已取消
								<?php elseif(($vo['OrderStatue'] == 2)): ?>
								付款成功<?php endif; ?>
								<?php if((($vo['Type'] == 2) AND ($vo['OrderStatue'] != 11)) OR (($vo['Type'] == 5) AND ($vo['OrderStatue'] != 11))AND ($vo['OrderStatue'] != 2)): ?><a href="<?php echo U('User/Common/dealview',array('codekey'=>authcode($vo['id'],'ENCODE'),'pid'=>authcode($vo['ProductID'],'ENCODE')));?>" target="_parent">查看信息</a><?php endif; ?>
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