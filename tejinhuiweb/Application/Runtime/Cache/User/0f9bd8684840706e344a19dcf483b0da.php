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
								<td>
									<?php if(($vo['source'] == 1)): ?>司法拍卖

									<?php elseif($vo['source'] == 6): ?> 出租
									<?php else: ?>转让<?php endif; ?>
								</td>
								<td>
									<?php if(($vo['source'] == 1)): elseif($vo['source'] == 6): ?>
										<?php if(($vo['promodel'] == 1)): ?>整租
											<?php elseif($vo['promodel'] == 2): ?>
											分租<?php endif; ?>
										<?php else: ?>
										<?php if(($vo['promodel'] == 1)): ?>转让
											<?php elseif($vo['promodel'] == 2): ?>
											质押
											<?php else: ?>
											转让/质押<?php endif; endif; ?>
								</td>
								<td><?php echo ($vo["Contact"]); ?></td>
								<td><?php echo ($vo["mobile"]); ?></td>
								<td><?php echo ($vo["AssetsStatue"]); ?></td>
								<td>

									<?php if(session('user.MemberType') == 4): if(($vo['source'] == 1)): elseif($vo['source'] == 6): ?>
											<a href="<?php echo U('Home/lists/content',array('AssetsIDrent'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_parent">查看</a>
											<?php else: ?>
											<a href="<?php echo U('Home/lists/content',array('AssetsID'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_parent">查看</a><?php endif; ?>
										<?php if( ($vo['Statue'] < 3)): if(($vo['OptType'] == 1) OR ($vo['Statue'] == 2)): if(($vo['source'] == 1)): elseif($vo['source'] == 6): ?>
													<a href="<?php echo U('Web/Index/mic',array('AssetsIDrent'=>$vo['AssetsID']));?>" target="_parent">上传尽调</a>
													<?php else: ?>
													<a href="<?php echo U('Web/Index/mic',array('AssetsID'=>$vo['AssetsID']));?>" target="_parent">上传尽调</a><?php endif; ?>

												<a href="<?php echo empty($vo['AssetsID'])?(empty($vo['PackageID'])?Qiniu_Sign($jdmodel[2]['CodeValue']):Qiniu_Sign($jdmodel[0]['CodeValue'])):Qiniu_Sign($jdmodel[1]['CodeValue']);?>" target="_parent">下载模板</a>
												<?php elseif($vo['Statue'] == 1): ?>
												<?php if(($vo['source'] == 1)): elseif($vo['source'] == 6): ?>
													<a href="<?php echo U('User/logic/todocomit',array('AssetsIDrent'=>$vo['AssetsID']));?>" >接单</a>
													<a href="<?php echo U('User/logic/todocomit',array('AssetsIDrent'=>$vo['AssetsID'],'type'=>'cancel'));?>">拒绝</a>
													<?php else: ?>
													<a href="<?php echo U('User/logic/todocomit',array('AssetsID'=>$vo['AssetsID']));?>" >接单</a>
													<a href="<?php echo U('User/logic/todocomit',array('AssetsID'=>$vo['AssetsID'],'type'=>'cancel'));?>">拒绝</a><?php endif; endif; endif; ?>
										<?php elseif(session('user.MemberType') == 3): ?>
										<?php if(($vo['source'] == 1)): elseif($vo['source'] == 6): ?>
											<a href="<?php echo U('User/Common/zzr',array('AssetsIDrent'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_parent">选择经济人</a>
											<?php else: ?>
											<a href="<?php echo U('User/Common/zzr',array('AssetsID'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_parent">选择经济人</a><?php endif; endif; ?>
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