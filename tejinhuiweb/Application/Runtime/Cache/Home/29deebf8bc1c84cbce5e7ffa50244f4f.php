<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="ui-page-login">

	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="<?php echo ($_SESSION['keyword']['keyword']); ?>" />
		<meta name="description" content="<?php echo ($_SESSION['keyword']['desc']); ?>" />
		<title><?php echo ($_SESSION['keyword']['title']); ?></title>
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/mui.min.css');?>">
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/style.css');?>" />
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/iconfont.css');?>" />

		<meta name="viewport" id="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
	</head>

	<body>
		<div class="agents">
			<div class="main">
			<!--<div class="nav">
				<div class="navbar-l">
					<a href=""><i class="icon-back"> </i></a>
				</div>
				<div class="navbar-m">资产经纪人</div>

			</div>-->
			<div class="banner"><img src="//www.3qqq.com/static/mobile/images/common/report_01.jpg"></div>
			
			<div class="box1">
				<div class="info1">
					<div class="title repotr"><b><img src="//www.3qqq.com/static/mobile/images/common/report_04.jpg"></b><h1>尽调报告</h1></div>
					<div class="con">	
						<span>不良资产(实物)的尽职调查报告，是指投资者委托专业人员运用专业技能通过阅档、现场查看、到相关部门查询、网搜等途径和手段，获取相关信
							息，综合判断主从资产的合法性、有效性及法律瑕疵，查明资产的诉讼或执行情况，了解资产方的背景、经营现状和财产状况，总结资产转让的可
							能性及可实现程度，为投资者确定拟购买资产的合理价值、预计购买后采取何种处置措施提供参考依据的一系列调查行为。</span>
					</div>
				</div>
				
			</div>
			
			<div class="box1 bg-color2">
				<div class="info1">
					<div class="title repotr"><b><img src="//www.3qqq.com/static/mobile/images/common/report_07.jpg"></b><h1>为什么要购买</h1></div>
					<div class="con">
						<ul>
									<li><em>1</em><span>自己做尽职调查费时、费力、费钱还不一定有结果；</span></li>
									<li><em>2</em><span>公司尽调团队通过专业地方式获取信息，有可靠保证；</span></li>
									<li><em>3</em><span>全方位地了解项目情况，让你足不出户就可以参与；</span></li>
									<li><em>4</em><span>买断尽调报告，拥有你专属的权利全面了解；</span></li>
								</ul>
					</div>
				</div>
				
			</div>
			
			<div class="box1 bg-color">
				<div class="info1">
					<div class="title repotr"><b><img src="//www.3qqq.com/static/mobile/images/common/report_09.jpg"></b><h1>报告的特点</h1></div>
					<div class="con">
						<ul>
									<li><em>1</em><span>全面性：全方位信息一手掌握</span></li>
									<li><em>2</em><span>精准性：报告内容准确详细</span></li>
									<li><em>3</em><span>及时性：平台调用最接近项目地址的负债经纪人进行调查，及时有效</span></li>
									<li><em>4</em><span>规范性：专业的团队，规范的尽调流程，出具规范的尽调报告</span></li>
								</ul>
					</div>
				</div>
				
			</div>
			
			
			<div class="box2 bg-color4">
				<h1>如何购买</h1>
				<div class="title">
					<ul>
						<li><em>1</em><span>登录官网<br>注册会员</span></li>
						<li><em>2</em><span>选择你要购买<br>的项目报告</span></li>
						<li><em>3</em><span>点击购买<br>微信支付</span></li>
						<li><em>4</em><span>完成下载</span></li>
					</ul>
				</div>
				<div class="pic"><img src="//www.3qqq.com/static/mobile/images/common/report_11.jpg"></div>
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
<!-- 站长统计开始  -->
<div style="display:none">
    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259609671'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1259609671' type='text/javascript'%3E%3C/script%3E"));</script>
</div>
<!-- 站长统计结束  -->



		<script type="text/javascript">
			$('.nav li').click(function() {
				$('.dropdown ul li.li1 ul').slideUp(400);
				var type = $(this).attr('data-type');
				//console.log(type); 
				if($(this).hasClass('active')) {
					$('.nav li').removeClass('active');
					$('.pro-maks').hide();
					$('.dropdown ul li.li1').eq(type).find('ul').slideUp(400);
				} else {
					//$('.nav li').removeClass('active');
					$(this).addClass('active').siblings().removeClass('active');
					$('.pro-maks').show();
					$('.dropdown ul li.li1').eq(type).find('ul').slideDown(400);
				}
			})
			$('.pro-maks').click(function(){
				$('.dropdown ul li.li1 ul').slideUp(400);
				$('.pro-maks').hide();

			})
		</script>
	</body>

</html>