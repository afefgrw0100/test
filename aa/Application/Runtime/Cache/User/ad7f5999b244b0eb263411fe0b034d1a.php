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
				<form  action="<?php echo U('user/Logic/dosuggesstion');?>" method="post">
					<div class="title">投诉建议</div>
					<div class="suggesstion">
						<div><em>标题：</em><b><input type="text" class="form-control" name="Title"></b></div>
						<div><em>内容：</em><b><textarea class="form-control" name="Content"></textarea></b></div>
						<div><input type="submit" class="btn"></div>
					</div>
				</form>
			</div>

			<div class="todo floor">
				<div class="title">我提交的信息</div>
				<form action="<?php echo U('User/Common/suggesstion');?>" method="get">
					<div class="time">
						时间：<input name="starttime" class="sang_Calender" type="text">
						到:&nbsp;<input name="endtime" class="sang_Calender" type="text">
						<input type="submit"  value="查询" class="btn">
					</div>
				</form>
				<div class="table">
					<table class="table" border="" cellspacing="" cellpadding="">
						<tr>
							<th>标题</th>
							<th>当前状态</th>
							<th>提交时间</th>
							<th>操作</th>

						</tr>
					<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($vo["Title"]); ?></td>
							<td><?php echo ($vo['Status']==1?"已回复":"未处理"); ?></td>
							<td><?php echo ($vo["CreateTime"]); ?></td>
							<td>
								<a href="<?php echo U('User/Common/dissug',array('sugid'=>$vo['SuggID']));?>">查看</a>
								<?php if($vo['Status'] == 1 ): else: ?>
									<a href="<?php echo U('User/Logic/revoke',array('sugid'=>$vo['SuggID']));?>" onclick="confirm('确定撤回')">撤回</a><?php endif; ?>

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
<script src="<?php echo tempurl('//www.3qqq.com/static/js/datetime.js');?>"></script>
</body>

</html>