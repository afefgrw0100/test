<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="<?php echo ($_SESSION['keyword']['keyword']); ?>" />
		<meta name="description" content="<?php echo ($_SESSION['keyword']['desc']); ?>" />
		<link rel="icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
		<title>我的发布</title>
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

				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="order-list">
					<ul>
						<li><span class="num">项目名称：<?php echo ($vo["title"]); ?></span> <em class="i-info"><?php echo ($vo["AssetsStatue"]); ?></em></li>
						<li><span>类别：<?php if(($vo['source'] == 1)): ?>司法拍卖

							<?php elseif($vo['source'] == 6): ?> 出租
							<?php else: ?>转让<?php endif; ?></span> <em >¥<?php echo ($vo["total"]); ?></em></li>
						<li>
							<span>处置方式：
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
						</span> <em ><?php echo (date("Y-m-d",$vo["CreateTime"])); ?></em>
						</li>
						<li class="btn">
							<?php if(($vo['source'] == 1)): elseif($vo['source'] == 6): ?>
								<a href="<?php echo U('Home/lists/content',array('AssetsIDrent'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" >查看</a>
								<?php else: ?>
								<a href="<?php echo U('Home/lists/content',array('AssetsID'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" >查看</a><?php endif; ?>
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