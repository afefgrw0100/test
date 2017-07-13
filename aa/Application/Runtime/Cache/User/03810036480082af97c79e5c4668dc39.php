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
				<div class="title" style="border: none;">项目委托</div>
				<div class="table">
					<table class="table" border="" cellspacing="" cellpadding="">

						<tr>
							<th>项目位置</th>
							<th>项目类型</th>
							<th>处置方式</th>
							<th>联系人</th>
							<th>联系电话</th>

						</tr>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($vo["province"]); echo ($vo["city"]); echo ($vo["area"]); ?></td>
								<td>
									<?php if($vo['etype'] == 1): ?>土地-->
										<?php if($vo['ptype'] == 1): ?>工业用地
											<?php elseif($vo['ptype'] == 2): ?>
											商业用地
											<?php elseif($vo['ptype'] == 3): ?>
											住宅用地
											<?php elseif($vo['ptype'] == 4): ?>
											商住两用地<?php endif; ?>
										<?php elseif($vo['etype'] == 2): ?>
										写字楼
										<?php elseif($vo['etype'] == 3): ?>
										商业
										<?php elseif($vo['etype'] == 4): ?>
										<?php if($vo['ptype'] == 1): ?>别墅
											<?php elseif($vo['ptype'] == 2): ?>
											洋房
											<?php elseif($vo['ptype'] == 3): ?>
											普通住宅<?php endif; ?>
										住宅<?php endif; ?>
								</td>
								<td>
									<?php if($vo['manage'] == 1): ?>转让
										<?php elseif($vo['manage'] == 2): ?>
										出租<?php endif; ?>
								</td>
								<td><?php echo ($vo["name"]); ?></td>
								<td><?php echo ($vo["phone"]); ?></td>

							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table>
				</div>
				<div class="page">
					<?php echo ($page); ?>
				</div>
			</div>

		</div>
	</div>
</div>

</div>

</body>

</html>