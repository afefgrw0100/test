<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="<?php echo ($_SESSION['keyword']['keyword']); ?>" />
		<meta name="description" content="<?php echo ($_SESSION['keyword']['desc']); ?>" />
		<link rel="icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
		<title>订单管理</title>
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

				<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="order-list">
					<ul>
						<li><span class="num">订单编号：<?php echo ($vo["sn"]); ?></span>
							<em class="i-info">
							<?php if($vo['OrderStatue'] == 1): ?>待支付
								<?php elseif($vo['OrderStatue'] == 2): ?>支付完成
								<?php elseif($vo['OrderStatue'] == 3): ?> 退款申请中
								<?php elseif($vo['OrderStatue'] == 4): ?> 已退款
								<?php elseif($vo['OrderStatue'] == 11): ?> 已取消<?php endif; ?>
						</em>
						</li>
						<li><span>产品：<?php echo ($vo["ProductName"]); ?></span> <em >¥<?php echo ($vo["DealPrice"]); ?></em></li>
						<li>
							<span>订单类别：
						<?php if(($vo['Type'] == 1)): ?>发布信息
							<?php elseif($vo['Type'] == 2): ?>购买信息
							<?php elseif($vo['Type'] == 3): ?> 经济人费用
							<?php elseif($vo['Type'] == 4): ?> 充值
							<?php elseif($vo['Type'] == 5): ?> 买断信息<?php endif; ?>
						</span>
							<em ><?php echo ($vo["CreateTime"]); ?></em>
						</li>
						<li class="btn">
							<?php if($vo['OrderStatue'] == 1): ?><a href="<?php echo U('user/payment/index',array( 'codekey'=>authcode($vo['id'],'ENCODE'), 'type'=>authcode($vo['CodeValue'],'ENCODE'), 'codetype'=>authcode($vo['type'],'ENCODE') ));?>" target="_parent">去支付</a>
								<a href="<?php echo U('User/Logic/offorder',array('codekey'=>authcode($vo['id'],'ENCODE')));?>">取消</a>
								<?php elseif(($vo['OrderStatue'] == 2) AND ($vo['Type'] == 1)): ?>
								<a href="<?php echo U('User/Logic/orderout',array('codekey'=>authcode($vo['id'],'ENCODE'),'pid'=>authcode($vo['ProductID'],'ENCODE')));?>">申请退款</a>
								<?php elseif(($vo['OrderStatue'] == 2) AND ($vo['Type'] == 5)): ?>
								<a href="<?php echo U('User/Common/dealview',array('codekey'=>authcode($vo['id'],'ENCODE'),'pid'=>authcode($vo['ProductID'],'ENCODE')));?>" target="_parent">查看买断信息</a>
								<?php elseif(($vo['OrderStatue'] == 3)): ?>
								等待退款
								<?php elseif(($vo['OrderStatue'] == 4)): ?>
								退款成功
								<?php elseif(($vo['OrderStatue'] == 11)): ?>
								已取消
								<?php elseif(($vo['OrderStatue'] == 2)): ?>
								付款成功<?php endif; ?>
							<?php if((($vo['Type'] == 2) AND ($vo['OrderStatue'] != 11)) OR (($vo['Type'] == 5) AND ($vo['OrderStatue'] != 11))AND ($vo['OrderStatue'] != 2)): ?><a href="<?php echo U('User/Common/dealview',array('codekey'=>authcode($vo['id'],'ENCODE'),'pid'=>authcode($vo['ProductID'],'ENCODE')));?>" target="_parent">查看信息</a><?php endif; ?>
						</li>
					</ul>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
				
				
				
				
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