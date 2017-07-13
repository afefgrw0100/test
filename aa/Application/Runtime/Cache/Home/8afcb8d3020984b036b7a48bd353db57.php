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
				<?php if($pack['AssetsStatue'] == 8): ?><div class="saled"><img src="//www.3qqq.com/static/mobile/images/common/chengjiao.png"></div><?php endif; ?>
				<div class="title"><span><?php echo ($pack["title"]); ?></span></div>
				<div class="time">发布时间：<?php echo ($pack["CreateTime"]); ?></div>
				<div class="line1">
					<div class="icon">
						<div class="litter_icon"></div>
					</div>
				</div>
				<div class="line">
					<ul>
						<li class="fl"><i class="iconfont"></i><em><?php echo empty($pack['ViewCount'])?"0":$pack['ViewCount'];?></em>人看过</li>
						<li><i class="iconfont"></i><em><?php echo empty($pack['ShareCount'])?"0":$pack['ShareCount'];?></em>次分享</li>
						<li class="fr"><i class="iconfont"></i><em><?php echo empty($pack['BuyCount'])?"0":$pack['BuyCount'];?></em>人付款</li>
					</ul>
				</div>

				<div class="share">
					<span>您可以在PC登录www.tejinhui.com搜索本项目，即可获取更棒的服务。</span>
					<div>
						<em class="btn"><a id="oBtnActive">查看尽调详情</a></em>
						<em id="share"><a>分享</a></em>
					</div>


				</div>

			</div>

			<div class="xm_list1">
				<div class="xm_list1_c">
					<div class="title">项目列表</div>
					<div class="con">
						<ul class="div_scroll">
							<?php if(is_array($packlist)): $i = 0; $__LIST__ = $packlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vls): $mod = ($i % 2 );++$i;?><li><em><i></i><?php echo ($vls["SubName"]); ?></em></li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>

				</div>

			</div>
			
			
			<div class="info1">
				<div class="title">
					<h2>资产包基本信息</h2>
					<div class="line"></div>

				</div>
				<div class="con">
					<ul>
						<li>
							<span><b>总金额： </b><em><i class="numtenhousand"><?php echo ($pack["total"]); ?></i>元</em></span>
							<span><b>来源： </b><em><?php echo ($pack["source"]); ?></em></span>
						</li>
						<li>
							<span><b>转让金额： </b><em><i class="numtenhousand"><?php echo ($pack["processmodle"]); ?></i>元</em></span>
							<span><b>项目数量： </b><em><?php echo ($pack["projectnum"]); ?></em></span>
						</li>
						<li>
							<span><b>是否具备原始凭证： </b><em><?php echo ($pack["isorginpic"]); ?></em></span>
							<span><b>折扣： </b><em><?php echo round(($pack['processmodle']/$pack['total']),4)*100;?>%</em></span>
						</li>
					</ul>
				</div>

				<div class="title">
					<h2>债权人信息</h2>
					<div class="line"></div>

				</div>
				<div class="con">
					<ul>
						<li>
							<span><b>债权人类别： </b><em><?php echo ($pack["ownertype"]); ?></em></span>
						</li>

					</ul>
				</div>

			</div>

				<div class="info1">
					<div class="title no_line">
						<h2>资产包亮点介绍</h2>
						<div class="line"></div>
					</div>

					<div class="content">
						<?php echo ($pack["PackageDesc"]); ?>

					</div>
				</div>

				<div class="info1">
					<div class="title no_line">
						<h2>尽调报告介绍</h2>
						<div class="line"></div>
					</div>

					<div class="content">
						<?php echo ($pack["ReportDesc"]); ?>

					</div>
				</div>

				<div class="info1">
					<div class="title no_line">
						<h2>项目展示</h2>
						<div class="line"></div>
					</div>

					<div class="pic">
						<?php if(is_array($pack["Images"])): $i = 0; $__LIST__ = $pack["Images"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imgs): $mod = ($i % 2 );++$i;?><a href=""><img src="<?php echo imgpublic($imgs);?>?imageView2/2/w/600"></a><?php endforeach; endif; else: echo "" ;endif; ?>
						<?php if(is_array($pack["AssetsDesc"])): $i = 0; $__LIST__ = $pack["AssetsDesc"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imgdesc): $mod = ($i % 2 );++$i;?><a href=""><img src="<?php echo imgpublic($imgdesc);?>?imageView2/2/w/600"></a><?php endforeach; endif; else: echo "" ;endif; ?>

					</div>
				</div>
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
			
			<div id="item2" class="mui-control-content">
				<div class="base">
					<div class="share">
						<?php if(($pack['AssetsStatue'] != 8) ): if(($pack['AssetsStatue'] == 4) AND ($downurl != 88) AND ($pack['DueCreateMember'] != session('user.MemberId'))): ?><em class="buy_btn"><a href="<?php echo U('Home/Lists/pdfview',array('fileurl'=>urlencode(imgpublic($pack['DescPdf']))));?>" >查看尽调展品</a></em>
								<em class="price">¥<?php echo ($proinfo["ViewPrice"]); ?></em>
								<em class="buy_btn"><a href="<?php echo U('User/Logic/buymic',array('type'=>'package',buyid =>$pack['PackageID'],'ismian'=>1));?>">购买尽调</a></em><?php endif; ?>
							<?php if((($downurl == 88) OR ($pack['DueCreateMember'] == session('user.MemberId'))) AND ($pack['AssetsStatue'] == 4)): ?><em class="buy_btn"><a href="<?php echo U('User/Logic/downFile',array('type'=>'package',buyid =>$pack['PackageID'],'ismian'=>1,'viewfile'=>'viewfile'));?>">查看尽调</a></em><?php endif; endif; ?>
					</div>
				</div>
				<div class="base">
					<h5 style="text-align:center">购买提示</h5><br>
					1、尽职调查报告为特资经纪人经过对交易标的线下实地走访、相关部门查询档案后等十余项程序，按照标准格式上传并经平台复核后出具的资料。报告能向意向受让方全面、真实、且具备时效性的介绍交易标的。<br>
					2、平台通过将尽调报告上架展示，批量售卖，来减低意向投资者尽调成本且快速对交易标的进行了解。<br>
					3、尽管平台己全面核查尽调报告，仍不能保障对尽调报告出具者起到完整的监督作用。因此，平台不就尽调报告内容给意向受让方未来带来的交易风险承担任何赔偿责任。<br>
					4、对交易标的有意向的投资人或机构，在购买尽调报告之后，可按尽调报告上记载的联系方式，直接与项目所有方或所有方指定的特资经纪人联系。<br>
					5、请在购买尽调报告后对该报告做出评价，平台将根据您的评价做出及时反馈。</div>

				</div>
				
				
				<div id="item3" class="mui-control-content">
					<div class="search-list">
						<div class="pro-maks"></div>
						<ul class="mui-table-view">
							<?php if(is_array($model_list)): $i = 0; $__LIST__ = $model_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media">
									<a href="<?php echo U('Home/lists/content',empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?'':array('PackageID'=>$vo['PackageID'],'card'=>authcode(session('user.MemberId'),'ENCODE'))):array('AssetsID'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE'))):array('DebtID'=>$vo['DebtID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>">
										<img class="mui-media-object mui-pull-left" src="<?php echo empty($vo['titimg'])?'http://placehold.it/100x80':imgpublic($vo['titimg']).'?imageView/2/w/100/h/80';?>">
										<div class="mui-media-body">
											<div class="name"><?php echo ($vo["title"]); ?></div>
											<div class='mui-ellipsis'>
												<span><b>项目类型</b><em><?php echo empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?"":"资产包"):"实物资产"):"债权";?></em></span>
												<span><b><?php echo ($vo['promodel']=="2"?"质押金额":"转让金额"); ?></b><em class="info_num numtenhousand"><?php echo ($vo["proprice"]); ?></em></span>
												<span><b>折扣率</b><em class="discount"><?php echo round(($vo['proprice']/$vo['total']),4)*100;?>%</em></span>
											</div>
										</div>
									</a>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>

						</ul>

					</div>

				</div>
				
				<!--选项卡  end-->
</div>
	
			

			
		</div>

		<div class="mask" id="mask">
			<div class="close" id="close"><img src="//www.3qqq.com/static/mobile/images/common/jiantou_02.png"></div>
		</div>
		<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery-1.11.1.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/mobile/js/mui.min.js');?>"></script>
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


		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<script type="text/javascript">
			var numi = $(".numtenhousand").size();
			for(var i=0;i<numi;i++){
				var numtenthousand = parseInt($(".numtenhousand:eq("+i+")").html());

				if(numtenthousand>10000){
					numtenthousand = Math.round((numtenthousand /10000) * 100) / 100;

					numtenthousand = numtenthousand + "万";
					$(".numtenhousand:eq("+i+")").html(numtenthousand);
				}
			}
		</script>
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
					title: '<?php echo ($pack["title"]); ?>',
					link: '<?php echo ($signPackage["url"]); ?>',
					imgUrl:  "<?php echo empty($pack['titimgs'])?'http://placehold.it/180x140':'https:'.imgpublic($pack['titimgs']).'?imageView/2/w/180/h/140';?>",
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
					title: '<?php echo ($pack["title"]); ?>',
					desc: "[特金汇]"+"<?php echo explode('|',$pack['owneradress'][0])[1]; echo explode('|',$pack['owneradress'][1])[1]; echo ($pack["owneradress"]["2"]); ?>"+"资产包转让",
					link: '<?php echo ($signPackage["url"]); ?>',
					imgUrl: "<?php echo empty($pack['titimgs'])?'http://placehold.it/180x140':'https:'.imgpublic($pack['titimgs']).'?imageView/2/w/180/h/140';?>",
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
				$('#oBtnActive').click(function(){
					$('.mui-control-content').eq(1).addClass("mui-active").siblings().removeClass("mui-active");
					$('#segmentedControl a').eq(1).addClass("mui-active").siblings().removeClass("mui-active");
				});
			})
		</script>


	</body>

</html>