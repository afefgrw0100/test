<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>

	<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/style/bootstrap.min.css');?>" />
	<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/style/iframe.css');?>" />
	<body onLoad="init()">

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
					<div class="card">
						<div class="title">
							<h2>个人名片</h2><b><img src=" <?php echo empty(session('user.HeadImg'))?'//www.3qqq.com/static/images/common/agent.png':headimg(session('user.HeadImg'),116,116);?>"></b></div>
						<div class="con">
							<ul>
								<li class="blue"><b>A</b><em><?php echo ($user["MemberType"]["CodeName"]); ?></em></li>
								<li><b><a href="<?php echo U('Home/Index/visitf',array('card'=>authcode($user['MemberId'],'ENCODE')));?>" target="_blank"><?php echo ($user["MemberName"]); ?></a></b><em>用户名称</em></li>
								<li><b class="g-star<?php echo ($user["StarLevel"]["name"]); ?>"></b><em>评价等级</em></li>
								<li><b><?php echo ($user["pronum"]); ?></b><em>已上传项目数量</em></li>
								<li><b><?php echo ($user["make"]); ?></b><em>发布尽调报告数量</em></li>
							</ul>
						</div>
						<div class="share">

							<div>
								<input type="text" class="form-control" id="fe_text" value="<?php echo ($user["host"]); ?>" onfocus="selectText()">
								<span id="clip_container">
								<button id="clip_button" class="btn" >分享地址</button>
								</span>
							</div>
							<span class="item">复制以上您的专属推广链接发送给好友</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery-1.11.1.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/js/ZeroClipboard.js');?>"></script>
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
		<script type="text/javascript">
			function selectText() {
				var user = document.getElementById("fe_text");
				user.select();

			}
		</script>
	</body>

</html>