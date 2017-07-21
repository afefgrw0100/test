<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="ui-page-login">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="keywords" content="<?php echo ($_SESSION['keyword']['keyword']); ?>" />
		<meta name="description" content="<?php echo ($_SESSION['keyword']['desc']); ?>" />
		<link rel="icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
		<title><?php echo ($_SESSION['keyword']['title']); ?></title>
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/mui.min.css');?>">
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/style.css');?>" />

		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/iconfont.css');?>" />
		<meta name="viewport" id="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<script src="<?php echo tempurl('//www.3qqq.com/static/mobile/js/jquery-1.7.2.min.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/mobile/js/mui.min.js');?>"></script>
		<style>
			body {
				background: #f8f8f8;
			}
		</style>

	</head>

	<body>
		<div class="publish">
		<div class="logo"><img src="//www.3qqq.com/static/mobile/images/common/logo_03.jpg"></div>
		</div>
		<div class="main">
			<div class="cityList">
			<div class="p-banner">
				<img src="<?php echo imgpublic($img_logo_photo['url']);?>">
			</div>

			<div class="list-title">
						<h2>城市合伙人</h2>
					</div>
				<?php if(is_array($user_in)): $i = 0; $__LIST__ = $user_in;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uvo): $mod = ($i % 2 );++$i;?><div class="box2">
					<div class="fl">
						<a href="#" target="_blank">
							<?php if(empty($uvo['intImg'])): ?><img src="http://placehold.it/108x80">
								<?php else: ?>
								<img src="<?php echo imgpublic($uvo['intImg']);?>?imageView2/2/w/108/h/80"><?php endif; ?>
						</a>
					</div>
					<div class="fl info">
						<span>
						<p><em>联&nbsp;&nbsp;系&nbsp;&nbsp;人：</em><b><?php echo ($uvo["RealName"]); ?></b></p>
						<p><em>电 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：</em><b><?php echo ($uvo["CellPhone"]); ?></b></p>
						<p><em>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：</em><b><?php echo ($uvo["pname"]); echo ($uvo["cname"]); echo ($uvo["Street"]); ?></b></p>
						<p><em>业务类型：</em><b><?php echo ($uvo["memo"]); ?></b></p>
						</span>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>




		<!-- 選項卡 -->
		<div class="nTab">
		<div id="segmentedControl" class="mui-segmented-control mui-segmented-control-inverted">
				<a class="mui-control-item mui-active" href="#item1">
					转让
				</a>
				<a class="mui-control-item" href="#item2">
					 出租
				</a>

			</div>

			<div id="item1" class="mui-control-content mui-active">
				<?php if(is_array($info_c)): $i = 0; $__LIST__ = $info_c;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_c): $mod = ($i % 2 );++$i;?><div class="box2">
								<div class="fl">
									<a href="<?php echo U('Home/lists/content/',array('AssetsID'=>$vo_c['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_blank">
									<img src="<?php echo imgpublic($vo_c['titimg']);?>?imageView2/2/w/108/h/80">
									</a>
								</div>
								<div class="fl info">
									<span>
										<h2><a href="<?php echo U('Home/lists/content/',array('AssetsID'=>$vo_c['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>"> <?php echo ($vo_c["Title"]); ?></a></h2>
										<p  class="price"><em>转让金额：</em><b class="numtenhousand"><?php echo ($vo_c["ProPrice"]); ?></b>元</p>
										<p class="oldPrice"><em>资产金额：</em><b class="numtenhousand"><?php echo ($vo_c["Price"]); ?></b>元</p>
										<p><em>资产类型：</em><b><?php echo C('asset_type')[$vo_c['AssetsType']];?></b></p>
									</span>
								</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>

			</div>
			<div id="item2" class="mui-control-content">
				<?php if(is_array($info_b)): $i = 0; $__LIST__ = $info_b;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_b): $mod = ($i % 2 );++$i;?><div class="box2">
						<div class="fl">
							<a href="<?php echo U('Home/lists/content/',array('AssetsIDrent'=>$vo_b['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_blank">
							<img src="//img-project.resource.tejinhui.com/FD32B35F-AAB1-9869-B0BC-2D1F2D350759.png?imageView2/2/w/250/h/180">
							</a>
						</div>
						<div class="fl info"><span>
							<h2><a href="<?php echo U('Home/lists/content/',array('AssetsIDrent'=>$vo_b['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>"> <?php echo ($vo_b["Title"]); ?></a></h2>
							<p  class="price"><em>出租金额：</em><b class="numtenhousand"><?php echo ($vo_b["ProPrice"]); ?></b>元</p>
							<p class="oldPrice"><em>资产金额：</em><b class="numtenhousand"><?php echo ($vo_b["Price"]); ?></b>元</p>
							<p><em>资产类型：</em><b><?php echo C('asset_type')[$vo_b['AssetsType']];?></b></p>
							</span>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>

			</div>
			</div>
			<!-- 選項卡 end-->
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




<script type="text/javascript">
	var numi = $(".numtenhousand").size();
	var pagenum = 0;

	for(var i=0;i<numi;i++){
		var numtenthousand = parseInt($(".numtenhousand:eq("+i+")").html());

		if(numtenthousand>10000){
			numtenthousand = Math.round((numtenthousand /10000) * 100) / 100;
			numtenthousand = numtenthousand + "万";
			$(".numtenhousand:eq("+i+")").html(numtenthousand);
		}
	}
</script>
	</body>

</html>