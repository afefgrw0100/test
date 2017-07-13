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
			<div class="banner"><img src="//www.3qqq.com/static/mobile/images/common/agent_01.jpg"></div>
			
			<div class="box1">
				<div class="info1">
					<div class="title"><b><img src="//www.3qqq.com/static/mobile/images/common/agent_04.jpg"></b><h1>特资经纪人</h1></div>
					<div class="con">						
						<span>特资经纪人将手中持有的特殊资产（含金融机构资产包、单项目债权、大宗实物资产）信息，按平台统一标准的尽调报告格式发布，并自行设定查看报告的费用。投资方通过在线阅读尽调报告后，单独联系特资经纪人对接后续工作。直接锁定交易上下游、确保佣金不流失。</span>
					</div>
				</div>
				<div class="info2">
					<div class="item">
						<em>1</em>
						<span>发布特殊资产</span>
						<span>项目信息</span>
					</div>
					<div class="icon"><img src="//www.3qqq.com/static/mobile/images/common/agent1_10.gif" ></div>
					<div class="item">
						<em>2</em>
						<span>上传项目尽职调查报告</span>
						<span>设定查看报告的费用</span>
					</div>
					<div class="icon"><img src="//www.3qqq.com/static/mobile/images/common/agent1_10.gif" ></div>
					<div class="item">
						<em>3</em>
						<span>投资方阅读</span>
						<span>尽调报告</span>
					</div>
					<div class="icon"><img src="//www.3qqq.com/static/mobile/images/common/agent1_10.gif" ></div>
					<div class="item">
						<em>4</em>
						<span>联系对接</span>
						<span>锁定交易</span>
					</div>
					<div class="icon"><img src="//www.3qqq.com/static/mobile/images/common/agent1_10.gif" ></div><div class="item">
						<em>5</em>
						<span>协助完成交易</span>
						<span>收取佣金</span>
					</div>
					
				</div>
			
			</div>
			
			<div class="box1 bg-color2">
				<div class="info1">
					<div class="title"><b><img src="//www.3qqq.com/static/mobile/images/common/agent_07.jpg"></b><h1>盈利空间丰厚</h1></div>
					<div class="con">
						<span>项目尽调报告阅读费、协助项目成交的佣金、协助融资的佣金、平台优秀经纪人分红等等，盈利模式不在单一，多劳多得。</span>
					</div>
				</div>
				
			</div>
			
			<div class="box2">
				<div class="title">
					<ul>
						<li><em>1</em><span>登录官网<br>注册会员</span></li>
						<li><em>2</em><span>申请成为特金<br>汇资产经纪人</span></li>
						<li><em>3</em><span>参加资产经纪<br>人培训、考核</span></li>
						<li><em>4</em><span>成功认证</span></li>
					</ul>
				</div>
				<div class="pic"><img src="//www.3qqq.com/static/mobile/images/common/agent_ad_03.jpg"></div>
			</div>
			<div class="box1 bg-color2">
				<div class="info1">
					<div class="title"><b><img src="//www.3qqq.com/static/mobile/images/common/agent_09.jpg"></b><h1>多维度培训</h1></div>
					<div class="con">	
					<span>特金汇创始团队积累了多年的实操经验，沉淀了丰富的理论知识，专门针对特殊资产尽职调查环节推出的培训课程，轻松易懂，实用性强。多维度培训方案，一次培训，终身复训。</span>                      
						</div>
				</div>
				
			</div>
			
			
			<div class="box1 bg-color">
				<div class="info1">
					<div class="title"><b><img src="//www.3qqq.com/static/mobile/images/common/agent_11.jpg"></b><h1>独家对接渠道</h1></div>
					<div class="con">
					<span>所有项目上传的资料，只会在特金汇平台展示，不会外流（平台只负责项目展示及项目定向推介的渠道，不会介入中介及处置环节，如遇到合适项目平台会通过资产管理公司自行收购）独家对接渠道，消除您的顾虑。</span>                                                                              
						</div>
				</div>
				
			</div>
			<div class="box4">
				<div class="pic"><img src="//www.3qqq.com/static/mobile/images/common/agent_ad_06.jpg"></div>
				<div class="btn"><a href="<?php echo U('Home/Index/visf_user',array('uic'=>authcode($user['MemberId'],'ENCODE'),'code'=>authcode('cc',ENCODE)));?>">立即成为特资经纪人</a></div>
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