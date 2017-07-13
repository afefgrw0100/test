<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

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
		<script src="<?php echo tempurl('//www.3qqq.com/static/mobile/js/jquery-1.7.2.min.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/mobile/js/mui.min.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/mobile/js/jquery.nav.js');?>"></script>

	</head>
	<style>
		.main{ margin-bottom: 0;}
		/*==========以下部分是Validform必须的===========*/
		.Validform_checktip{
			line-height:20px;
			height:20px;
			overflow:hidden;
			color:#999;
			font-size:12px;
		}
		.Validform_right{
			color:#71b83d;
			padding-left:20px;
			background:url(//www.3qqq.com/static/images/valifrom/right.png) no-repeat left center;
		}
		.Validform_wrong{
			color:red;
			padding-left:20px;
			white-space:nowrap;
			background:url(//www.3qqq.com/static/images/valifrom/error.png) no-repeat left center;
		}
		.Validform_loading{
			padding-left:20px;
			background:url(//www.3qqq.com/static/images/valifrom/onLoad.gif) no-repeat left center;
		}
		.Validform_error{
			background-color:#ffe7e7;
		}
		#Validform_msg{color:#7d8289; font: 12px/1.5 tahoma, arial, \5b8b\4f53, sans-serif; width:280px; -webkit-box-shadow:2px 2px 3px #aaa; -moz-box-shadow:2px 2px 3px #aaa; background:#fff; position:absolute; top:0px; right:50px; z-index:99999; display:none;filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#999999'); box-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);}
		#Validform_msg .iframe{position:absolute; left:0px; top:-1px; z-index:-1;}
		#Validform_msg .Validform_title{line-height:25px; height:25px; text-align:left; font-weight:bold; padding:0 8px; color:#fff; position:relative; background-color:#999;
			background: -moz-linear-gradient(top, #999, #666 100%); background: -webkit-gradient(linear, 0 0, 0 100%, from(#999), to(#666)); filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#999999', endColorstr='#666666');}
		#Validform_msg a.Validform_close:link,#Validform_msg a.Validform_close:visited{line-height:22px; position:absolute; right:8px; top:0px; color:#fff; text-decoration:none;}
		#Validform_msg a.Validform_close:hover{color:#ccc;}
		#Validform_msg .Validform_info{padding:8px;border:1px solid #bbb; border-top:none; text-align:left;}
	</style>
		<script>
		$(document).ready(function() {
			$('#nav').onePageNav();
			var Height=$('#nav').offset().top;
//			console.log(Height);
			$(window).scroll(function() {
				// 滚动条距离顶部的距离 大于 Height时
				if($(window).scrollTop() >= Height) {
					$("#nav").css({ 'position' : 'fixed', 'top' : '0'}); // 改变position：fixed
				} else {
					$("#nav").stop(true, true).css({ 'position' : 'static'}); // 改变position：static
				}
			});
		});
	</script>

	<body>
		<div class="hhr-banner"><img src="//www.3qqq.com/static/mobile/images/common/hhr-banner.jpg"></div>
		<div class="main">
			<div id="nav">
			<ul>
				<li class="current">
					<a href="#section-1">合作介绍</a>
				</li>
				<li>
					<a href="#section-2">加盟优势</a>
				</li>
				<li>
					<a href="#section-3">关于我们</a>
				</li>
			</ul>
			</div>

			<div id="container">
				<div class="section-wrapper" id="section-1">
					<div class="section">
						<h1>为什么要成为特金汇城市合伙人？</h1>
						<div class="con">
							<div class="part1">
								<ul>
									<li>为什么要成为特金汇城市合伙人？</li>
									<li>为什么资深房产中介声称：“有时候正确的选择比努力更重要”？</li>
									<li>为什么大宗实物资产的对接可以如此轻松？</li>
									<li>为什么只有四个人的新晋城市合伙人团队月营业额可达70万？</li>
									<li>为什么外企技术帝会放弃高额年薪与我们共同创业？</li>
									<li>为什么各路资方都愿与我们签订战略合作协议？</li>
								</ul>
							</div>
							<div class="part2">
								<b>因为他们相信</b>
								<b><img src="//www.3qqq.com/static/mobile/images/common/hhr_04.jpg"></b>
								<b>相信互联网时代大数据共享的力量</b>
								<p>成为城市合伙人，共享万亿蓝海</p>
								<p>您还在等什么？</p>
							</div>
						</div>
					</div>
				</div>

				<div class="section-wrapper" id="section-2">
						<div class="section">
						<h1>城市合伙人优势</h1>
						<div class="con">
							<div class="part4">
								<ul>
									<li class="li1">
										<div class="pic"><img src="//www.3qqq.com/static/mobile/images/common/hhricon_03.png"></div>
										<h2>一站式全流程体系</h2>	
									</li>
									
									<li class="li2">
										<div class="pic"><img src="//www.3qqq.com/static/mobile/images/common/hhricon_06.png"></div>
										<h2>十数万粉丝共享</h2>
									</li>
									
									<li class="li3">
										<div class="pic"><img src="//www.3qqq.com/static/mobile/images/common/hhricon_11.png"></div>
										<h2>垂直培训体系</h2>
									</li>
									
									<li class="li4">
										<div class="pic"><img src="//www.3qqq.com/static/mobile/images/common/hhricon_14.png"></div>
										<h2>总部协助渠道拓展</h2>
									</li>
								</ul>
							</div>
							
						</div>
					</div>
				
				</div>

				<div class="section-wrapper" id="section-3">
						<div class="section" style=" padding-bottom: 0;">
						<h1>关于我们</h1>
						<div class="con">
							<div class="part3">
								<div class="pic"><img src="//www.3qqq.com/static/mobile/images/common/hhr_08.jpg"></div>
								<div class="info">
									<h2>特金汇</h2>
									<div class="item">
										线上收集特殊资产行业各方资源，通过数据云中心精准匹配共享。我们致力于成为全国首家专业流转大宗资产、拍卖资产等特殊资产的共享合伙平台。
									</div>
								</div>
								
							</div>
							
							<div class="part3">
								<div class="pic"><img src="//www.3qqq.com/static/mobile/images/common/hhr_11.jpg"></div>
								<div class="info">
									<h2>城市合伙人</h2>
									<div class="item">
									借助“特金汇”，建立城市独立运营分站，共享平台大数据，共创市场。
									</div>
								</div>
								
							</div>
						
						
						</div>
						<h1 class="pt20">合作申请</h1>
						<div class="con">
							<form action="<?php echo U('Home/Index/addcpt');?>" method="post" id="registerform">
								<div class="part5">
									<div class="fl">
										<label><input placeholder="姓名" class="form-control" name="name" datatype="s2-18" nullmsg="请输入昵称！" errormsg="昵称至少2个字符,最多18个字符！" /></label>
										<label><input placeholder="城市" class="form-control" name="city" datatype="s2-18" nullmsg="请输入城市！" errormsg="昵称至少2个字符,最多18个字符！" /></label>
										<label><input placeholder="手机号码" class="form-control" name="phone"  datatype="m" nullmsg="请输入手机号！" errormsg="请输入正确手机号" /></label>
									</div>
									<div class="textarea">
										<textarea placeholder="备注" class="form-control" name="content" datatype="*" nullmsg="请填写备注！" errormsg="请填写备注" ></textarea>
									</div>
								</div>

								<div class="part6">
									<input class=" btn btn-primary" type="submit" value="提交" />
								</div>
							</form>
						</div>
						</div>
				
				</div>
			</div>
		</div>

				
				<!--选项卡  end-->

	
			

			
		</div>

		<script  type="text/javascript" charset="utf-8" src="<?php echo tempurl('//www.3qqq.com/static/js/Validform_v5.3.2_min.js');?>"></script>
		<script  type="text/javascript">
			$("#registerform").Validform({
				tiptype:3,
				ajaxPost:true,
				callback:function(data){
					if(data.status==1){
						setTimeout(function(){
							$.Showmsg("message goes here.");
							//$.Hidemsg(); //公用方法关闭信息提示框;显示方法是$.Showmsg("message goes here.");
							window.location.reload();
						},2000);
					}
				}
			});
		</script>
	</body>

</html>