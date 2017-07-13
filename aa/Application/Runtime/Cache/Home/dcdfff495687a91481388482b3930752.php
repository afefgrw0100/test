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


	</head>

	<body>
		<div class="publish">
			<div class="main">
			<div class="logo"><img src="//www.3qqq.com/static/mobile/images/common/logo_03.jpg"></div>
			<div class="agent">
				<div class="banner"><img src="//www.3qqq.com/static/mobile/images/common/agent_02.png"></div>
				<div class="con">

					<div class="info1">
						<div class="man"><img src="<?php echo empty($user['HeadImg'])?'//www.3qqq.com/static/mobile/images/common/agent_05.png':headimg($user['HeadImg'],45,45);?>"></div>
						<div class="item"><?php echo ($user["MemberType"]["CodeName"]); ?></div>
						<div class="title">
							<h2>经纪人基本信息</h2>
							<div class="line"></div>
						</div>
						
						<div class="base_agent">
							<span><b>用户名称 </b><em><?php echo ($user["MemberName"]); ?></em></span>
							<span><b>评价等级</b><em class="g-star<?php echo ($user["StarLevel"]["name"]); ?>"></em></span>
							<span><b>已上传项目数量</b><em><?php echo ($user["pronum"]); ?>条</em></span>
							<span><b>发布尽调报告数量</b><em><?php echo ($user["make"]); ?>条</em></span>
						</div>
						
						<div class="share">
							<em><a href="<?php echo U('Home/Index/visf_user',array('uic'=>authcode($user['MemberId'],'ENCODE')));?>">成为经纪人</a></em>
					<em id="share"><a>分享</a></em>
				</div>
					</div>

					<div class="info1">

						<div class="title">
							<h2>用户发布信息</h2>
							<div class="line"></div>
						</div>
						<div class="news">
							<div class="fl">
								<h2>已上传的项目</h2>
								<ul>
									<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Home/lists/content',empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?'':array('PackageID'=>$vo['PackageID'])):array('AssetsID'=>$vo['AssetsID'])):array('DebtID'=>$vo['DebtID']));?>" target="_parent"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div>
							<div class="fl">
								<h2>尽调报告项目</h2>
								<ul>
									<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lvo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Home/lists/content',empty($lvo['DebtID'])?(empty($lvo['AssetsID'])?(empty($lvo['PackageID'])?'':array('PackageID'=>$lvo['PackageID'])):array('AssetsID'=>$lvo['AssetsID'])):array('DebtID'=>$lvo['DebtID']));?>" target="_parent"><?php echo ($lvo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div>
						</div>
					</div>
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
<!-- 站长统计开始  -->
<div style="display:none">
    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259609671'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1259609671' type='text/javascript'%3E%3C/script%3E"));</script>
</div>
<!-- 站长统计结束  -->


		<div class="mask" id="mask">
			<div class="close" id="close"><img src="//www.3qqq.com/static/mobile/images/common/jiantou_02.png"></div>
		</div>
		<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery-1.11.1.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/mobile/js/mui.min.js');?>"></script>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<script>
			// 注意：所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
			// 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
			// 完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
			wx.config({

				debug: false,
				appId: '<?php echo ($signPackage["appId"]); ?>',
				timestamp: '<?php echo ($signPackage["timestamp"]); ?>',
				nonceStr: '<?php echo ($signPackage["nonceStr"]); ?>',
				signature: '<?php echo ($signPackage["signature"]); ?>',
				jsApiList: [
					'onMenuShareTimeline',
					'onMenuShareAppMessage',
					// 所有要调用的 API 都要加到这个列表中
				]
			});
			wx.ready(function () {
				wx.onMenuShareTimeline({
					title: '特金汇-<?php echo ($user["MemberName"]); ?>-个人主页',
					link: '<?php echo ($signPackage["url"]); ?>',
					imgUrl:  "<?php echo empty($user['HeadImg'])?'//www.3qqq.com/static/mobile/images/common/agent_05.png':headimg($user['HeadImg'],45,45);?>",
					trigger: function (res) {
						//<?php echo empty($asset['titimgs'])?'http://placehold.it/180x140':imgpublic($asset['titimgs']).'?imageView/1/w/180/h/140';?>
						// 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
						//alert('用户点击分享到朋友圈');
					},
					success: function (res) {
						//alert('已分享');
					},
					cancel: function (res) {
						//alert('已取消');
					},
					fail: function (res) {
						//alert(JSON.stringify(res));
					}
				});


				wx.onMenuShareAppMessage({
					title: '特金汇-特资经纪人-个人主页',
					desc: "特殊资产投资机会平台-<?php echo ($user["MemberName"]); ?>",
					link: '<?php echo ($signPackage["url"]); ?>',
					imgUrl: "<?php echo empty($user['HeadImg'])?'//www.3qqq.com/static/mobile/images/common/agent_05.png':headimg($user['HeadImg'],45,45);?>",
					trigger: function (res) {
						// 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
						//alert('用户点击发送给朋友');
					},
					success: function (res) {
						//alert('已分享');
					},
					cancel: function (res) {
						//alert('已取消');
					},
					fail: function (res) {
						//alert(JSON.stringify(res));
					}

				});

				function writeObj(obj){
					var description = "";
					for(var i in obj){
						var property=obj[i];
						description+=i+" = "+property+"\n";
					}
					alert(description);
				}
//				wx.onMenuShareAppMessage({
//					title: '<?php echo ($asset["title"]); ?>', // 分享标题
//					desc: "<?php echo explode("|",$asset['address'][0])[1]; echo explode("|",$asset['address'][1])[1]; echo ($asset["address"]["2"]); echo ($asset["processmodle"]); ?>", // 分享描述
//					link: '<?php echo ($signPackage["url"]); ?>', // 分享链接
//					imgUrl: "<?php echo empty($asset['titimgs'])?'http://placehold.it/60x60':headimg($asset['titimgs']);?>", // 分享图标
//					//type: '', // 分享类型,music、video或link，不填默认为link
//					dataUrl: '<?php echo ($signPackage["url"]); ?>', // 如果type是music或video，则要提供数据链接，默认为空
//					success: function () {
//						// 用户确认分享后执行的回调函数
//					},
//					cancel: function () {
//						// 用户取消分享后执行的回调函数
//					}
//				});
				// 在这里调用 API
				// 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口

			});


		</script>
		<script>
			$(function() {
				$('#share').click(function() {
					$('#mask').show();
				})

				$('#close').click(function() {
					$('#mask').hide();
				})
			})
		</script>

	</body>

</html>