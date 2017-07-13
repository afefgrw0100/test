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
				<div class="title" style="border: none;">资讯中心</div>
				<div class="table">
					<table class="table" border="" cellspacing="" cellpadding="">

						<tr>
							<th>标题</th>
							<th width="30%">时间</th>

						</tr>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td style="text-align: left;"><a href="<?php echo U('User/Common/trainview',array('tid'=>authcode($vo['id'],'ENCODE')));?>"><?php echo ($vo["title"]); ?></a></td>
								<td><?php echo ($vo["createtime"]); ?></td>

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