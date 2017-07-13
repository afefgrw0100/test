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
						<li><span class="num"><em><?php echo empty($user['Balance'])?"0":$user['Balance'];?></em>元</span><span class="icon"><i class="iconfont"></i><a href="<?php echo U('User/Common/yuehis');?>"><b>当前账户余额</b></a></span></li>
						<li><span class="num"><em><?php echo yue();?></em>元</span><span class="icon"><i class="iconfont"></i><a href="<?php echo U('User/Common/mobilecash');?>"><b>可提现额度</b></a></span></li>
					</ul>
				</div>
				
			
				<div class="item-list">
					<ul>
						<li><a href=""><span><i class="iconfont">&#xe652;</i><em>提现记录</em></span></a></li>
					</ul>
				</div>
					<?php if(is_array($infolist)): $i = 0; $__LIST__ = $infolist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="order-list">
							<ul>
								<li>
									<span class="num">订单号：<?php echo ($vo["SN"]); ?></span>
									<em>
									<?php if(($vo['status'] == 1) ): ?>提交中
										<?php elseif(($vo['status'] == 2)): ?>审批完成
										<?php elseif(($vo['status'] == 3)): ?>支付完成
										<?php elseif(($vo['status'] == 4)): ?>交易取消
										<?php elseif(($vo['status'] == 5)): ?>转账失败<?php endif; ?>
									</em>
								</li>
								<li><span>交易时间：<?php echo ($vo["createtime"]); ?></span> <em class="i-info">提现金额：￥<?php echo ($vo["drawquantity"]); ?></em></li>
								<li class="btn">
									<?php if(($vo['status'] == 1) ): ?><a href="<?php echo U('User/Logic/outwith',array('withid'=>authcode($vo['ID'],'ENCODE')));?>">撤回</a>
										<?php else: endif; ?>
								</li>
							</ul>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>

				
				
				
				
				
				
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