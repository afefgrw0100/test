<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="<?php echo ($_SESSION['keyword']['keyword']); ?>" />
		<meta name="description" content="<?php echo ($_SESSION['keyword']['desc']); ?>" />
		<link rel="icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
		<title>提现管理</title>
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/mui.min.css');?>">
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/user.css');?>" />
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/iconfont.css');?>" />
		<meta name="viewport" id="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<script src="<?php echo tempurl('//www.3qqq.com/static/mobile/js/jquery-1.7.2.min.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/mobile/js/mui.min.js');?>"></script>
	</head>

	<body>
		<div class="user">

			<div class="main">
				<div class="ordermgt">
					<div class="money">
					<ul>
						<li><span class="num"><em><?php echo empty($user['Balance'])?"0":$user['Balance'];?></em>元</span><span class="icon"><i class="iconfont"></i><b>当前账户余额</b></span></li>
						<li><span class="num"><em><?php echo yue();?></em>元</span><span class="icon"><i class="iconfont"></i><b>可提现额度</b></span></li>
					</ul>
				</div>
				
			
				<div class="item-list">
					<ul>
						<li><a href=""><span class="apply"><i class="iconfont">&#xe607;</i><em>申请提现</em></span></a></li>
					</ul>
				</div>
				<div class="recharge">
					<form action="<?php echo U('User/logic/dowith');?>" method="post" id="doform">
					<div class="num">
						<b>提现金额：</b>
						<span class="input-container">
							<input type="hidden" value="<?php echo ($info["MemberId"]); ?>" name="memberid">
							<input type="hidden" value="<?php echo ($info["openid"]); ?>" name="drawaccount">
							<input type="text" placeholder="提现到微信" name="drawquantity">
						</span>元
					</div>
					<div class="btn btn-warning"><a href="javascript:void(0)" id="sub_mit">下一步</a></div>
					</form>
				</div>
			
				
				
				
				
			</div>
			</div>
				
		</div>

		<div class="bottom">
    <ul>
        <li><a href="<?php echo U('Home/Index/Index');?>" class="active"><i class="iconfont">&#xe629;</i><b>平台首页</b></a></li>
        <li><a href="<?php echo U('Home/Lists/Lists');?>"><i class="iconfont">&#xe63f;</i><b>资产大厅</b></a></li>
        <li><a href="<?php echo U('User/Common/memberindex');?>"><i class="iconfont">&#xe60f;</i><b>个人中心</b></a></li>
    </ul>
</div>
<script type="text/javascript">
    var urlstr = window.location.href ;
    $(".bottom ul li a").removeClass("active");
    if(urlstr.indexOf("Lists")>=0){
        $(".bottom ul li a:eq(1)").addClass("active");
    }else if(urlstr.indexOf("Common")>=0){
        $(".bottom ul li a:eq(2)").addClass("active");
    }else {
        $(".bottom ul li a:eq(0)").addClass("active");
    }
</script>
		<script type="text/javascript" charset="utf-8" src="<?php echo tempurl('//www.3qqq.com/static/js/Validform_v5.3.2_min.js');?>"></script>
		<script type="text/javascript">
			$(function(){
				//$(".registerform").Validform();  //就这一行代码！;


				$("#sub_mit").click(function(){
					var urlstr = $("#doform").attr("action")
					$.ajax({
						type:'post',
						url:urlstr,
						data:$("#doform").serialize(),
						cache:false,
						dataType:'json',
						success:function(data){
							if(data.status == 1){
								location.href=document.referrer;
							}else {
								alert(data.info);
							}
						}
					});
				});


			})
		</script>

	</body>

</html>