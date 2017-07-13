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
						<div class="title">合伙项目</div>
						<form action="<?php echo U('User/Common/partnerproject');?>" method="get"  id="dosearch">
						 <div class="project-title"><em>标题：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em><input name="title" class="form-control" />	</div>
						<div class="mypublish">
							<div class="fl category"><em>信息类别：</em>
								<span>
									<select name="type">
										<option value="0">所有信息</option>
										<!--<option value="1">拍卖</option>-->
										<option value="2">转让</option>
										<option value="6">出租</option>

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
									<th>项目名称</th>
									<th>类别</th>

									<th>价格</th>
									<th>发布人</th>
									<th>当前状态</th>
									<th>发布时间</th>
									<th>操作</th>
								</tr>
								<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td><?php echo ($vo["Title"]); ?></td>
									<td>
										<?php if(($vo['Source'] == 1)): ?>司法拍卖

											<?php elseif($vo['Source'] == 6): ?> 出租
											<?php else: ?>转让<?php endif; ?>
									</td>

									<td>¥<em class="info_num"><?php echo ($vo["ProPrice"]); ?></em></td>
									<td><?php echo ($name[$vo['memberid']]);?></td>
									<td><?php echo C('ASSET_STATUE')[$vo['AssetsStatue']];?></td>
									<td><?php echo ($vo["CreateTime"]); ?></td>
									<td>
										<?php if(($vo['Source'] == 1)): elseif($vo['Source'] == 6): ?>
											<a href="<?php echo U('Home/lists/content',array('AssetsIDrent'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE' )));?>" target="_parent">查看</a>
											<?php else: ?>
											<a href="<?php echo U('Home/lists/content',array('AssetsID'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_parent">查看</a><?php endif; ?>

										
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

		<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery-1.11.1.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/js/main.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/js/datetime.js');?>"></script>
	</body>

</html>