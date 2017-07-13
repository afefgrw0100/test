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
			<div class="banner">
				<div class="banner-con">
						<div class="title">城市分站服务中心</div>
						<div class="item">
							<ul>
								<li><i class="iconfont" style=" font-size: 20px;">&#xe626;</i><b>一站式全流程体系</b></li>
								<li><i class="iconfont">&#xe614;</i><b>垂直培训体系</b></li>
								<li><i class="iconfont">&#xe671;</i><b>总部协助渠道拓展</b></li>
								<li><i class="iconfont">&#xe610;</i><b>数十万粉丝引爆市场</b></li>
								
							</ul>
						</div>
					</div>
			</div>
			
			<div class="list-title">
						<h2>城市中心列表</h2> 
					</div>
				<?php if(is_array($cityInfo)): $i = 0; $__LIST__ = $cityInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uvo): $mod = ($i % 2 );++$i;?><div class="box2">
							<div class="fl">
								<a href="auc/<?php echo ($uvo["area_code"]); ?>" >
									<?php if(empty($uvo['titleImg'])): ?><img src="http://placehold.it/108x80">
										<?php else: ?>
										<img src="<?php echo imgpublic($uvo['titleImg']);?>?imageView2/2/w/108/h/80"><?php endif; ?>
								</a>
							</div>
							<div class="fl">
								<span>
									<h2><a href="auc/<?php echo ($uvo["area_code"]); ?>" ><?php echo ($uvo["pname"]); echo ($uvo["cname"]); ?>服务中心</a></h2>
									<p><em>位&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;置：</em><b><?php echo ($uvo["pname"]); echo ($uvo["cname"]); ?></b></p>
									<p><em>项目类型：</em><b><?php echo ($uvo["proType"]); ?> </b></p>
									<p><em>业务类型：</em><b><?php echo ($uvo["bizType"]); ?></b></p>
								</span>
							</div>
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