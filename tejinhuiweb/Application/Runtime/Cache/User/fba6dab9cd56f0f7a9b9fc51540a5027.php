<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="<?php echo ($_SESSION['keyword']['keyword']); ?>" />
		<meta name="description" content="<?php echo ($_SESSION['keyword']['desc']); ?>" />
		<link rel="icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
		<title>会员中心</title>
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
				<div class="man_bg">
					<div class="pic"><img src="//www.3qqq.com/static/mobile/images/common/man_bg_02.jpg"></div>
					<div class="man"><span><img src="<?php echo empty(session('user.HeadImg'))?'//www.3qqq.com/static/mobile/images/common/man.png':headimg(session('user.HeadImg'));?>"></span></div>
					<div class="name"><em><?php echo ($user["MemberName"]); ?></em><em class="line"></em> <em><?php echo ($user["MemberType"]["CodeName"]); ?></em></div>
				</div>
				
				<div class="money">
					<ul>
						<li><span class="num"><em><?php echo empty($user['Balance'])?"0":$user['Balance'];?></em>元</span><span class="icon"><i class="iconfont">&#xe7f7;</i><a href="<?php echo U('User/Common/yuehis');?>"><b>账户余额</b></a></span></li>
						<li><span class="num"><em><?php echo yue();?></em>元</span><span class="icon"><i class="iconfont">&#xe6c1;</i><a href="<?php echo U('User/Common/mobilecash');?>"><b>可提现金额</b></a></span></li>
						<li><span class="num"><em><?php echo ($user["FreezeAmount"]); ?></em>元</span><span class="icon"><i class="iconfont">&#xe616;</i><b>冻结金额</b></span></li>
					</ul>
				</div>
				
				<div class="item-list">
					<ul>
						<li><a href="<?php echo U('User/Common/ordermgt');?>"><span><i class="iconfont">&#xe603;</i><em>我的订单</em></span></a></li>
						<li><a href="<?php echo U('User/Common/todo');?>"><span><i class="iconfont">&#xe631;</i><em>待办事项</em></span></a></li>
						<li><a href="<?php echo U('User/Common/mypublish');?>"><span><i class="iconfont">&#xe673;</i><em>我的发布</em></span></a></li>
					</ul>
				</div>
				
				<div class="item-list">
					<ul>
						<?php if((session('user.MemberType') == 4) and (session('user.MemberStatu') == 1)): ?><li><a href="<?php echo U('User/Common/drawmgt');?>"><span><i class="iconfont">&#xe601;</i><em>提现管理</em></span></a></li><?php endif; ?>

						<li><a href="<?php echo U('Home/Index/visitf',array('card'=>authcode($user['MemberId'],'ENCODE')));?>"><span><i class="iconfont">&#xe62b;</i><em>个人名片</em></span></a></li>
					</ul>
				</div>
				

				
				<div class="item-list">
					<ul>
						<li><a  href="<?php echo U('User/Member/logout');?>" onclick="if(!confirm('确认退出')){return false;}"><span><i class="iconfont">&#xe660;</i><em>退出登录</em></span></a></li>
					</ul>
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
    function search_text(){
        var rcc = $(".search_text").val();
        console.log(111);
        if(rcc==""){
            return false;
        }else {
            return true;
        }

    }
</script>
<!-- 站长统计开始  -->
<div style="display:none">
    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259609671'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1259609671' type='text/javascript'%3E%3C/script%3E"));</script>
</div>
<!-- 站长统计结束  -->


	</body>

</html>