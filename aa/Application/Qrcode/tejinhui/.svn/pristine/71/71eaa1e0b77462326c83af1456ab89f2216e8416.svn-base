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
			<div class="todo floor mt70">
				<div class="title" style="border: none;">我的待办</div>
				<div class="table">
					<table class="table" border="" cellspacing="" cellpadding="">

						<tr>
							<th>项目名称</th>
							<th>类别</th>
							<th>处置方式</th>
							<th>联系人</th>
							<th>联系电话</th>
							<th>当前状态</th>
							<th>操作</th>
						</tr>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($vo["title"]); ?></td>
								<td><?php echo empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?"":"资产包"):"实物资产"):"债权";?></td>
								<td><?php echo ($vo['promodel']=="2"?"质押金额":"转让金额"); ?></td>
								<td><?php echo ($vo["Contact"]); ?></td>
								<td><?php echo ($vo["mobile"]); ?></td>
								<td><?php echo ($vo["AssetsStatue"]); ?></td>
								<td>
									<a href="<?php echo U('Home/lists/content',empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?'':array('PackageID'=>$vo['PackageID'],'card'=>authcode(session('user.MemberId'),'ENCODE'))):array('AssetsID'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE'))):array('DebtID'=>$vo['DebtID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_parent">查看</a>
									<?php if($vo['OptType'] == 1): ?><a href="<?php echo U('Web/Index/mic',empty($vo['DebtID'])? (empty($vo['AssetsID'])? (empty($vo['PackageID'])? '':array('PackageID'=>$vo['PackageID'])) :array('AssetsID'=>$vo['AssetsID'])) :array('DebtID'=>$vo['DebtID']));?>" target="_parent">上传尽调</a>
										<?php else: ?>
										<a href="<?php echo U('User/logic/todocomit',empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?'':array('PackageID'=>$vo['PackageID'])):array('AssetsID'=>$vo['AssetsID'])):array('DebtID'=>$vo['DebtID']));?>" >接单</a>
										<a href="<?php echo U('User/logic/todocomit',empty($vo['DebtID'])? (empty($vo['AssetsID'])? (empty($vo['PackageID'])? '':array('PackageID'=>$vo['PackageID'],'type'=>'cancel')) :array('AssetsID'=>$vo['AssetsID'],'type'=>'cancel')) :array('DebtID'=>$vo['DebtID'],'type'=>'cancel'));?>">拒绝</a><?php endif; ?>

								</td>
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