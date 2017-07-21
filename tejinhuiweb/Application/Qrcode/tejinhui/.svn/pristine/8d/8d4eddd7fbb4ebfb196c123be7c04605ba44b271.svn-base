<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<script src="<?php echo tempurl('/static/js/jquery-1.7.2.min.js');?>"></script>
	<script src="<?php echo tempurl('/static/js/ZeroClipboard.js');?>"></script>
	<link rel="stylesheet" href="<?php echo tempurl('/static/style/bootstrap.min.css');?>" />
	<link rel="stylesheet" href="<?php echo tempurl('/static/style/iframe.css');?>" />
	<body onLoad="init()">

		<div class="mainhtml">
			<div class="mainhtml_c">
				<div class="fr">
					<div class="top_right">
    <span class="hello">Hi , <i><?php echo dataG(); echo ($_SESSION['user']['RealName']); ?></i></span>
    <span class="time">上次登录时间：<i><?php echo empty(session('user.LastLoginTime'))?"当前是第一次登录":session('user.LastLoginTime');?></i></span>
						<span class="btn"><a href="<?php echo U('User/Economic/visitf');?>" class="btn1">充值</a><a href="<?php echo U('User/Economic/trainning');?>"  class="btn2">提现</a>
						</span>
</div>
					<div class="card">
						<div class="title">
							<h2>个人名片</h2><b><img src="/static/images/common/agent.png"></b></div>
						<div class="con">
							<ul>
								<li class="blue"><b>A</b><em><?php echo ($user["MemberType"]["CodeName"]); ?></em></li>
								<li><b><?php echo ($user["RealName"]); ?></b><em>用户名称</em></li>
								<li><b class="g-star<?php echo ($user["StarLevel"]["name"]); ?>"></b><em>评价等级</em></li>
								<li><b><?php echo ($user["pronum"]); ?></b><em>已上传项目数量</em></li>
								<li><b><?php echo ($user["make"]); ?></b><em>发布尽调报告数量</em></li>
							</ul>
						</div>
						<div class="share">
							<span  type="text" class="form-control" name="urlName" id="fe_text"/>
							<?php echo ($user["host"]); ?>
							</span>
						<span id="clip_container">
							<button id="clip_button" class="btn">分享地址</button>
							</span>

						</div>
					</div>
				</div>
			</div>
		</div>
		<script language="JavaScript">
			var clip = null;
			function $(id) {
				return document.getElementById(id);
			}

			function init() {
				clip = new ZeroClipboard.Client();
				clip.setHandCursor(true);
				clip.addEventListener('mouseOver', function(client) {
					clip.setText(document.getElementById('fe_text').innerText);
				});
				var text=document.getElementById('fe_text').innerText;

				clip.addEventListener('complete', function(client, text) {
					alert("成功复制到剪切板："+ text)
				});
				clip.glue('clip_button', 'clip_container');
			}
		</script>

	</body>

</html>