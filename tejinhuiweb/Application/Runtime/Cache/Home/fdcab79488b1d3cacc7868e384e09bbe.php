<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="<?php echo ($_SESSION['keyword']['keyword']); ?>" />
		<meta name="description" content="<?php echo ($_SESSION['keyword']['desc']); ?>" />
		<title><?php echo ($_SESSION['keyword']['title']); ?></title>
		<link rel="stylesheet" href="<?php echo tempurl('//static.resource.tejinhui.com/static/mobile/style/mui.min.css');?>">
		<link rel="stylesheet" href="<?php echo tempurl('//static.resource.tejinhui.com/static/mobile/style/style.css');?>" />
		<link rel="stylesheet" href="<?php echo tempurl('//static.resource.tejinhui.com/static/mobile/style/iconfont.css');?>" />

		<meta name="viewport" id="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">


	</head>

	<body>
		<div class="publish">
			<div class="logo"><img src="//static.resource.tejinhui.com/static/mobile/images/common/logo_03.jpg"></div>
			
			<!--选项卡-->
			<div id="segmentedControl" class="mui-segmented-control mui-segmented-control-inverted">
				<a class="mui-control-item mui-active" href="#item1">
					基本信息
				</a>
				<a class="mui-control-item" href="#item2">
					尽调报告
				</a>
				<a class="mui-control-item" href="#item3">
					评价
				</a>
			</div>
			
			<div id="item1" class="mui-control-content mui-active">
				
			<div class="base">
				<?php if($debt['AssetsStatue'] == 8): ?><div class="saled"><img src="//static.resource.tejinhui.com/static/mobile/images/common/chengjiao.png"></div><?php endif; ?>
				<div class="title"><span><?php echo ($debt["title"]); ?></span></div>
				<div class="time">发布时间：<?php echo ($debt["CreateTime"]); ?></div>
				<div class="line1">
					<div class="icon">
						<div class="litter_icon"></div>
					</div>
				</div>
				<div class="line">
					<ul>
						<li class="fl"><i class="iconfont"></i><em><?php echo empty($debt['ViewCount'])?"0":$debt['ViewCount'];?></em>人看过</li>
						<li><i class="iconfont"></i><em><?php echo empty($debt['ShareCount'])?"0":$debt['ShareCount'];?></em>次分享</li>
						<li class="fr"><i class="iconfont"></i><em><?php echo empty($debt['BuyCount'])?"0":$debt['BuyCount'];?></em>人付款</li>
					</ul>
				</div>

				<div class="share">
					<span>您可以在PC登录www.tejinhui.com搜索本项目，即可获取更棒的服务。</span>
					<em id="share"><a>分享</a></em>
				</div>

			</div>

			
			<div class="info1">
				<div class="title">
					<h2>债权基本信息</h2>
					<div class="line"></div>

				</div>
				<div class="con">
					<ul>
						<li>
							<span><b>债权本金： </b><em><i><?php echo ($debt["price"]); ?></i>元</em></span>
							<span><b>产生时间： </b><em><?php echo date("Y-m-d",strtotime($debt['starttime']));?></em></span>
						</li>
						<li>
							<span><b>未归还利息： </b><em><i><?php echo ($debt["interest"]); ?></i>元</em></span>
							<span><b>到期时间： </b><em><?php echo date("Y-m-d",strtotime($debt['endtime']));?></em></span>
						</li>
						<li>
							<span><b>债权总金额： </b><em><i><?php echo ($debt["total"]); ?> </i>元</em></span>
							<span><b>债权逾期时间： </b><em><i><?php echo empty(nubtime(date("Y-m-d"),$debt['endtime']))?"未逾期":nubtime(date("Y-m-d"),$debt['endtime']);?></i>天</em></span>
						</li>
						
						<li>
							<span><b>处置方式： </b><em><?php echo ($debt["processmodle"]); ?></em></span>
							<span><b>担保方式： </b><em><?php echo ($debt["assureType"]); ?></em></span>
						</li>
						
						<li>
							<span><b>转让价格： </b><em><i><?php echo ($debt["proprice"]); ?></i>元</em></span>
							<span><b>债权类别： </b><em><?php echo ($debt["ownertype"]); ?></em></span>
						</li>
						
						<li>
							<span><b>约定利率： </b><em><?php echo empty($debt['rate'])?"0":$debt['rate'];?>%</em></span>
							<span><b>折扣： </b><em><?php echo round(($debt['proprice']/$debt['total']),4)*100;?>%</em></span>
						</li>
						<li>
							<span><b>是否诉讼： </b><em><?php echo ($debt["islitigation"]); ?></em></span>
							<span><b>是否判决： </b><em><?php echo empty($debt['isjudged'])?"无":$debt['isjudged'];?></em></span>
						</li>
						<li>
							<span><b>是否具备原始凭证： </b><em><?php echo ($debt["isorgpic"]); ?></em></span>
							<span><b>是否已催收： </b><em><?php echo ($debt["isioans"]); ?></em></span>
						</li>
						
						
					</ul>
				</div>

			</div>

			<div class="info1">
				<div class="title">
					<h2>债务人信息</h2>
					<div class="line"></div>

				</div>
				<div class="con">
					<ul>
						<li>
							<span><b>姓名： </b><em><?php echo ($debt["debtor"]); ?></em></span>
							<span><b>其他联系情况：</b><em><?php echo ($debt["otherdebtor"]); ?></em></span>
						</li>
						<li>
							<span><b>类别： </b><em><?php echo ($debt["debttype"]); ?></em></span>
							<span><b>经营情况： </b><em><?php echo ($debt["debtoptstatue"]); ?></em></span>
						</li>
						<li>
							<span class="line"><b>所在地： </b><em><?php echo explode("|",$debt['debtadress'][0])[1]; echo explode("|",$debt['debtadress'][1])[1]; echo ($debt["debtadress"]["2"]); ?></em></span>
							
						</li>
					</ul>
				</div>

			</div>
			
			
			<div class="info1">
				<div class="title">
					<h2>抵押物情况</h2>
					<div class="line"></div>

				</div>
				<div class="con">
					<ul>
						<li>
							<span><b>价值： </b><em><i><?php echo ($debt["pledgevalue"]); ?></i> 元</em></span>
							<span><b>类别：</b><em><?php echo ($debt["pledgetype"]); ?></em></span>
						</li>
						<li>
							<span><b>状态： </b><em><?php echo ($debt["pledgestatue"]); ?></em></span>
							<span><b>是否存在权属纠纷： </b><em><?php echo ($debt["isinissue"]); ?></em></span>
						</li>
						<li>
							<span class="line"><b>所在地： </b><em><?php echo explode("|",$debt['pledgeaddress'][0])[1]; echo explode("|",$debt['pledgeaddress'][1])[1]; echo ($debt["pledgeaddress"]["2"]); ?></em></span>
							
						</li>
					</ul>
				</div>

			</div>
				<div class="info1">
					<div class="title no_line">
						<h2>项目情况介绍</h2>
						<div class="line"></div>
					</div>

					<div class="content">
						<?php echo ($debt["AssetsDesc"]); ?>

					</div>
				</div>

				<div class="info1">
					<div class="title no_line">
						<h2>尽调报告介绍</h2>
						<div class="line"></div>
					</div>

					<div class="content">
						<?php echo ($debt["ReportDesc"]); ?>

					</div>
				</div>

				<div class="info1">
					<div class="title no_line">
						<h2>项目展示</h2>
						<div class="line"></div>
					</div>

					<div class="pic">
						<?php if(is_array($debt["Images"])): $i = 0; $__LIST__ = $debt["Images"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imgs): $mod = ($i % 2 );++$i;?><a href=""><img src="<?php echo imgpublic($imgs);?>?imageView2/2/w/900"></a><?php endforeach; endif; else: echo "" ;endif; ?>

					</div>
				</div>
			</div>
			
			<div id="item2" class="mui-control-content">
				<div class="base">特金汇特资经纪人通过网络搜索，实地走访，工商部门、房产部门、抵押银行查询等途径，针对项目总体情况介绍、资产方企业情况、产权证审查、资产状况、通过有关部门对资产的核查、权属状况、权利纠纷、规划建设情况、目前使用情况、债务情况、过户时的税费负担、市场价值、对资产进行各项信息综合判断的核查、现场对资产的查看、项目盈利分析、项目风险分析等十六项内容进行详细的尽职调查，撰写成完整的尽调报告，为有兴趣投资该项目的投资人提供重要的参考依据。</div>
				<div class="base">如果您对本项目感兴趣，请在电脑端登录特金汇网站（<b>www.tejinhui.com</b>）搜索项目“<b><?php echo ($debt["title"]); ?></b>”付费并下载尽调报告！</div>
				</div>
				
				
				<div id="item3" class="mui-control-content">
					<div class="start">
						<?php if(is_array($diss)): $i = 0; $__LIST__ = $diss;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dvo): $mod = ($i % 2 );++$i;?><div class="rate">
								<div class="name"><b><?php echo ($dvo["RealName"]); ?></b><em class="g-star<?php echo ($dvo["StarLevel"]); ?>"></em></div>
								<div class="con"><?php echo ($dvo["Content"]); ?></div>
								<div class="time"><b><?php echo ($dvo["CreateTime"]); ?></b><span><i>评价等级:</i>
										<em class="g-star<?php echo ($dvo["StarNum"]); ?>"></em></span>
								</div>
								<div class="replay"><b>平台回复：</b><em><?php echo ($dvo["bContent"]); ?></em></div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>

				</div>
				
				<!--选项卡  end-->

	
			

			
		</div>
		<div class="mask" id="mask">
			<div class="close" id="close"><img src="//static.resource.tejinhui.com/static/mobile/images/common/jiantou_02.png"></div>
		</div>
		<script src="<?php echo tempurl('//static.resource.tejinhui.com/static/js/jquery-1.11.1.js');?>"></script>
		<script src="<?php echo tempurl('//static.resource.tejinhui.com/static/mobile/js/mui.min.js');?>"></script>
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
					title: '<?php echo ($debt["title"]); ?>',
					link: '<?php echo ($signPackage["url"]); ?>',
					imgUrl:  "<?php echo empty($debt['titimgs'])?'http://placehold.it/180x140':'https:'.imgpublic($debt['titimgs']).'?imageView/2/w/180/h/140';?>",
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
					title: '<?php echo ($debt["title"]); ?>',
					desc: "[特金汇]"+"<?php echo explode('|',$debt['debtadress'][0])[1]; echo explode('|',$debt['debtadress'][1])[1]; echo ($debt["debtadress"]["2"]); ?>"+"债权"+"<?php echo ($debt["processmodle"]); ?>",
					link: '<?php echo ($signPackage["url"]); ?>',
					imgUrl: "<?php echo empty($debt['titimgs'])?'http://placehold.it/180x140':'https:'.imgpublic($debt['titimgs']).'?imageView/2/w/180/h/140';?>",
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
			$(function(){
				$('#share').click(function(){
					$('#mask').show();


				});

				$('#close').click(function(){
					$('#mask').hide();
				});
			})
		</script>


	</body>

</html>