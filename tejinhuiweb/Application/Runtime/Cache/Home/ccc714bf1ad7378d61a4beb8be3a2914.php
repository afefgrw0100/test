<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="<?php echo ($_SESSION['keyword']['keyword']); ?>" />
    <meta name="description" content="<?php echo ($_SESSION['keyword']['desc']); ?>" />
    <title><?php echo ($_SESSION['keyword']['title']); ?></title>
    <link rel="icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/style/bootstrap.min.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/style/style.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/style/iconfont.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/style/valifrom.css');?>" />


</head>



<body>
<!-- header -->
<div class="header">

    <div class="top2">
        <div class="top2_c">
            <div class="fl logo"><b><a href="<?php echo U('Home/Index/index');?>"><img src="//www.3qqq.com/static/images/common/tejinh.jpg"></a></b>
            </div>
            <div class="fr search">
                <form action="<?php echo U('Home/Search/lists');?>" method="get" onsubmit="return search_text()">
                    <i class="iconfont">&#xe631;</i>
                <input type="text" class="search_text" name="search" placeholder="请输入您要搜索的内容"  value="<?php echo ($search); ?>">
                <input type="submit" class="search_bth"  value="搜 索">
                </form>
            </div>

        </div>

    </div>
    <div class="nav">
        <div class="nav_c">
            <div class="fl">
                <ul>
                    <li class="">
                        <a href="<?php echo U('/');?>">首页</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Lists/lists');?>" class="hot">找项目<i class="iconfont">&#xe618;</i> </a>
                    </li>

                    <li>
                        <a href="<?php echo U('Web/Index/publish');?>">发布项目</a>
                    </li>
                    <li>
                        <a href="/apt-web">城市合伙人</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Index/introduce');?>">平台介绍</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Index/finan');?>">配资服务</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/index/help');?>">新手指南</a>
                    </li>
                </ul>
            </div>
            <div class="fr member_center">
                <?php if(empty(session('user.MemberId'))): ?><a href="<?php echo U('User/Member/index');?>">登录</a>|
                    <a href="<?php echo U('User/Index/region');?>" class="region">注册</a>
                    <?php else: ?>
                    <a href="<?php echo U('User/Member/index');?>">会员中心</a><?php endif; ?>

            </div>
            <!--<div class="fr member_center">-->
                <!--<a href="<?php echo U('User/Member/index');?>" id="cselect"><?php echo empty(session('user.MemberId'))?"登录/注册":"会员中心";?></a>-->
            <!--</div>-->
        </div>

    </div>
</div>
<!-- header end -->
<style>
	body{ background: #f5f5f5;}
	.picScroll-left .bd {
		padding-top: 20px;
		margin-left: 45px;
		overflow: hidden;
		width: 970px;
		height: 350px;}
</style>

		<!-- main -->
		<div class="main">
			<div class="banner">
				<div class="flexslider">
					<ul class="slides">
						<?php if(is_array($listimg)): $i = 0; $__LIST__ = $listimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imgvo): $mod = ($i % 2 );++$i;?><li style="background:url(<?php echo C('IMGPATH').'/'.$imgvo['path'];?>) 50% 0 no-repeat;"><a href="<?php echo ($imgvo["url"]); ?>" target="_blank"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>

			</div>
			<div class="info-1">

				<div class="notice">
					<i class="iconfont">&#xe717;</i>
					<div class="bd">
						<ul>

							<?php if(is_array($artlist)): $i = 0; $__LIST__ = $artlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$artvo): $mod = ($i % 2 );++$i;?><li>
									<a href="<?php echo U('index/artcon',array('artid'=>$artvo['id']));?>" target="_blank"><?php echo ($artvo["title"]); ?></a>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>

				</div>

			</div>

			<div class="tjh">

				<div class="tjh_con">
					<ul>
						<li>
							<a href="<?php echo U('Home/index/hocr');?>"><i class="icon icon1"></i><span><b>项目持有方</b><em>Project owner</em></span></a>
						</li>
						<li>
							<a href="<?php echo U('Home/index/aabs');?>"><i class="icon icon2"></i><span><b>特资经纪人</b><em>Special agen</em></span></a>
						</li>
						<li class="last">
							<a href="<?php echo U('Home/index/piside');?>"><i class="icon icon3"></i><span><b>项目投资方</b><em>Project investor</em></span></a>
						</li>
						<!--<li class="last">-->
							<!--<a href="<?php echo U('Home/index/Aucview');?>"><i class="icon icon4"></i><span><b>资产拍卖</b><em>Asset auction</em></span></a>-->
						<!--</li>-->

					</ul>
				</div>
			</div>

			<!-- 热门项目 -->
			<div class="xm_list">

				<div class="xm_list_title"><i class="iconfont">&#xe64c;</i>
					<h2 class="mt18">热点资产推荐</h2></div>
				<div class="more">
					<a href="<?php echo U('Home/Lists/lists');?>">更多》</a>
				</div>
				<div class="line"></div>

				<div class="xm_hot">

					<div class="picScroll-left">

						<div class="bd">
							<ul>
								<?php if(is_array($infoimg)): $i = 0; $__LIST__ = $infoimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$infoimgv): $mod = ($i % 2 );++$i;?><li>
										<div class="pic"><img src="<?php echo empty($infoimgv['titimg'])?'http://placehold.it/390x293':imgpublic($infoimgv['titimg']).'?imageView/2/w/390/h/293';?>"></div>
										<div class="con">
											<div class="title"><?php echo ($infoimgv["Title"]); ?></div>
											<div class="price">
												<em>	<?php if($infoimgv['Source'] == 1): ?>起拍价<?php elseif($infoimgv['Source'] == 6): ?>月租金<?php else: ?>转让金额<?php endif; ?>：</em>
												<span><b class="numtenhousand"><?php echo ($infoimgv["ccint"]); ?></b>元</span></div>
											<div class="oldPrice"><em>资产金额：</em> <span><b class="numtenhousand"><?php echo ($infoimgv["aaint"]); ?></b>元</span></div>
											<div class="info">
												<span>
													<em>资产类型：</em>
													<b>
														<?php if($infoimgv['Source'] == 1): echo C('Aucassetstype')[$infoimgv['AssetsType']];?>
															<?php else: ?>
															<?php echo C('asset_type')[$infoimgv['AssetsType']]; endif; ?>
													</b>
												</span>
												<span><em>所在地：</em><b><?php echo explode("|",json_decode($infoimgv['Address'],true)[0])[1]; echo explode("|",json_decode($infoimgv['Address'],true)[1])[1];?></b></span>
												<span><em>折扣率：</em><b><?php echo round(($infoimgv['ccint']/$infoimgv['aaint']),2)*100;?>%</b></span>

											</div>
											<div class="speed">
												<span>
													<em>目前进度：</em>
													<b>
														<?php if($infoimgv['Source'] == 1): if(strtotime($infoimgv['AuctionStart']) > time()): ?><em class="label label-primary">拍卖未开始 </em>
																<?php elseif((strtotime($infoimgv['AuctionStart']) < time()) AND (strtotime($infoimgv['AuctionEnd']) > time())): ?>
																<em class="label label-primary">拍卖中</em>
																<?php else: ?>
																<em class="label label-primary">拍卖结束</em><?php endif; ?>
															<?php else: ?>
															<?php if($infoimgv['AssetsStatue'] == 4): ?><em class="label label-primary">已完成尽调</em>
																<?php elseif($infoimgv['AssetsStatue'] == 8): ?>
																<em class="label label-info">已成交</em><?php endif; endif; ?>
													</b>
												</span>
											</div>
											<div class="btn">
												<?php if($infoimgv['Source'] == 6): ?><a href="<?php echo U('Home/lists/content/',array('AssetsIDrent'=>$infoimgv['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_blank">查看尽调项目</a>
													<a class="share" >
														微信分享
														<div class="weixin"><img src="<?php echo U('Qrcode/Index/qrcode',array('code'=>urlencode(U('Home/lists/content/',array('AssetsIDrent'=>$infoimgv['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')),true,true))),true,true);?>"></div>
													</a>
													<?php else: ?>
													<a href="<?php echo U('Home/lists/content/',array('AssetsID'=>$infoimgv['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_blank">查看尽调项目</a>
													<a class="share" >
														微信分享
														<div class="weixin"><img src="<?php echo U('Qrcode/Index/qrcode',array('code'=>urlencode(U('Home/lists/content/',array('AssetsID'=>$infoimgv['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')),true,true))),true,true);?>"></div>
													</a><?php endif; ?>

											</div>

										</div>

									</li><?php endforeach; endif; else: echo "" ;endif; ?>

							</ul>
						</div>

						<div class="hd">
							<a class="next" href="javascript:void(0)"><img src="//www.3qqq.com/static/images/common/right.png" /></a>
							<a class="prev" href="javascript:void(0)"><img src="//www.3qqq.com/static/images/common/left.png" /></a>

							<ul>
							</ul>
						</div>

					</div>

				</div>
			</div>
			<!-- 热门项目 end-->

			<div class="hot-city">
				<div class="title"><i class="iconfont">&#xe619;</i>
					<h2>城市分站</h2><em><a href="/auclist">更多城市>></a></em></div>
				<div class="con">
					<ul>
						<?php if(is_array($substation)): $i = 0; $__LIST__ = $substation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$stvo): $mod = ($i % 2 );++$i;?><li>
								<div class="mask"></div>
								<div class="pic"><img src="<?php echo imgpublic($stvo['titleImg']).'?imageView/2/w/260/h/180';?>"></div>
								<div class="text">
									<h3><?php echo ($stvo["title"]); ?></h3>
									<p>城市分站</p>
									<a href="/auc/<?php echo ($stvo["area_code"]); ?>">点击进入</a>
								</div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>

					</ul>
				</div>
			</div>

			<!--  项目列表 -->
			<div class="xm_list">
				<div class="xm_list_title"><i class="iconfont">&#xe60d;</i>
					<h2>热门分类</h2></div>
				<div class="more">
					<a href="<?php echo U('Home/Lists/lists');?>">更多项目》</a>
				</div>
				<div class="xm_list_con">
					<div class="nTab">
						<div class="TabTitle">
							<ul id="myTab">
								<li class="active" onmouseover="nTabs(this,0);">资产转让</li>
								<li class="normal" onmouseover="nTabs(this,1);">资产出租</li>
								<!--<li class="normal" onmouseover="nTabs(this,2);">资产拍卖</li>-->
							</ul>
						</div>
						<div class="TabContent">
							<div id="myTab_Content0">
								<ul>
									<?php if(is_array($assets)): $i = 0; $__LIST__ = $assets;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$assetsv): $mod = ($i % 2 );++$i;?><li>
											<a href="<?php echo U('Home/lists/content/',array('AssetsID'=>$assetsv['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_blank">
												<div class="pic"><img src="<?php echo empty($assetsv['titimg'])?'http://placehold.it/260x180':imgpublic($assetsv['titimg']).'?imageView/2/w/260/h/180';?>"></div>
												<div class="price"><em>转让金额：</em> <span><b class="numtenhousand"><?php echo ($assetsv['ProPrice']); ?></b>元</span></div>
												<div class="oldPrice"><em>资产金额：</em> <span><b class="numtenhousand"><?php echo ($assetsv['Price']); ?></b>元</span></div>
												<div class="info">
													<span><em>资产类型：</em><b><?php if($assetsv['Source'] == 1): echo C('Aucassetstype')[$assetsv['AssetsType']];?> <?php else: echo C('asset_type')[$assetsv['AssetsType']]; endif; ?></b></span>
													<span class="fr"><i class="iconfont">&#xe639;</i><b><?php echo explode("|",json_decode($assetsv['Address'],true)[1])[1];?></b></span></div>
											</a>
										</li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div>
							<div id="myTab_Content1" class="none">
								<ul>
									<?php if(is_array($assets_le)): $i = 0; $__LIST__ = $assets_le;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$assetsv_auc): $mod = ($i % 2 );++$i;?><li>
											<a href="<?php echo U('Home/lists/content/',array('AssetsIDrent'=>$assetsv_auc['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_blank">
												<div class="pic"><img src="<?php echo empty($assetsv_auc['titimg'])?'http://placehold.it/260x180':imgpublic($assetsv_auc['titimg']).'?imageView/2/w/260/h/180';?>"></div>
												<div class="price"><em>月租金额：</em> <span><b class="numtenhousand"><?php echo ($assetsv_auc['ProPrice']); ?></b>元</span></div>
												<div class="oldPrice"><em>资产金额：</em> <span><b class="numtenhousand"><?php echo ($assetsv_auc['price']); ?></b>元</span></div>
												<div class="info">
													<span><em>资产类型：</em><b><?php if($assetsv_auc['Source'] == 1): echo C('Aucassetstype')[$assetsv_auc['AssetsType']];?> <?php else: echo C('asset_type')[$assetsv_auc['AssetsType']]; endif; ?></b></span>
													<span class="fr"><i class="iconfont">&#xe639;</i><b><?php echo explode("|",json_decode($assetsv_auc['Address'],true)[1])[1];?></b></span>
												</div>
											</a>
										</li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div>
							<!--<div id="myTab_Content2" class="none">-->
								<!--<ul>-->
									<!--<?php if(is_array($assets_auc)): $i = 0; $__LIST__ = $assets_auc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$assetsv_auc): $mod = ($i % 2 );++$i;?>-->
										<!--<li>-->
											<!--<a href="<?php echo U('Home/lists/content/',array('AssetsID'=>$assetsv_auc['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_blank">-->
												<!--<div class="pic"><img src="<?php echo empty($assetsv_auc['titimg'])?'http://placehold.it/260x180':imgpublic($assetsv_auc['titimg']).'?imageView/2/w/260/h/180';?>"></div>-->
												<!--<div class="price"><em>起拍金额：</em> <span><b class="numtenhousand"><?php echo ($assetsv_auc['ProPrice']); ?></b>元</span></div>-->
												<!--<div class="oldPrice"><em>市场价值：</em> <span><b class="numtenhousand"><?php echo ($assetsv_auc['Price']); ?></b>元</span></div>-->
												<!--<div class="info">-->
													<!--<span><em>资产类型：</em><b><?php if($assetsv_auc['Source'] == 1): echo C('Aucassetstype')[$assetsv_auc['AssetsType']];?> <?php else: echo C('asset_type')[$assetsv_auc['AssetsType']]; endif; ?></b></span>-->
													<!--<span class="fr"><i class="iconfont">&#xe639;</i><b><?php echo explode("|",json_decode($assetsv_auc['Address'],true)[1])[1];?></b></span>-->
												<!--</div>-->
											<!--</a>-->
										<!--</li>-->
									<!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
								<!--</ul>-->
							<!--</div>-->
						</div>
					</div>
				</div>
			</div>

			<!--  项目列表 end  -->

			<!-- 资讯 -->
			<div class="xm_list zixun">
				<div class="fl">
					<div class="title"><i class="iconfont font-32">&#xe724;</i>
						<h2>专题</h2></div>

					<div class="news">
						<a href="/Home/Index/baem"><img src="//www.3qqq.com/static/images/temp/index-ad.jpg">		</a>
					</div>

				</div>

				<div class="fl last">
					<div class="title"><i class="iconfont font-32">&#xe682;</i>
						<h2>特金学院</h2><a href="/Home/Index/artlist.html">更多》
						</a>
					</div>

					<div class="news">
						<?php if(is_array($artlisttj)): $i = 0; $__LIST__ = $artlisttj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$artvotj): $mod = ($i % 2 );++$i;?><span><b><a href="<?php echo U('index/artcon',array('artid'=>$artvotj['id']));?>" target="_blank"><?php echo ($artvotj["title"]); ?></a></b><em><?php echo date('Y-m-d',strtotime($artvotj['createtime']));?></em></span><?php endforeach; endif; else: echo "" ;endif; ?>

					</div>

				</div>
			</div>
			<!-- 资讯 end -->


			<!--合作伙伴-->
			<div class="xm_list friend_link_con">
				<div class="xm_list_title"><i class="iconfont">&#xe628;</i>
					<h2>合作伙伴</h2></div>
				<div class="line"></div>

				<div class="friend_link">
					<span>
						<?php if(is_array($adsinfo)): $i = 0; $__LIST__ = $adsinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adsval): $mod = ($i % 2 );++$i;?><a href="<?php echo ($adsval["JumpUrl"]); ?>" target="_blank"><img src="//static.resource.tejinhui.com/<?php echo ($adsval["ImageUrl"]); ?>?imageView/2/h/64"></a><?php endforeach; endif; else: echo "" ;endif; ?>
					</span>

				</div>
			</div>
			<!--合作伙伴 end-->

		</div>
		<!--main end -->
<!--footer -->
<div class="footer">
    <div class="footer_c">
        <div class="info1">
            <div class="fl">
                <div class="help">
                    <a href="<?php echo U('Home/Index/about');?>">关于特金汇 </a>
                    <a href="<?php echo U('Home/Index/safe');?>">安全保障</a>
                    <a href="<?php echo U('Home/Index/lagel');?>">法律政策 </a>
                    <!--<a href="<?php echo U('Home/Index/baem',empty(session('user.MemberId'))?'':array('uic'=>authcode(session('user.MemberId'),'ENCODE')));?>">成为经纪人</a>-->
                    <a href="<?php echo U('Home/Index/buypro1');?>">特资经纪人申请协议</a>
                    <a href="<?php echo U('Home/Index/buypro2');?>">特资经纪人管理办法</a>
                    <a href="//www.3qqq.com/static/images/application.pdf"  target="_blank">全国城市划分</a>
                    <a href="//www.3qqq.com/static/images/City.pdf"  target="_blank">城市合伙人申请协议</a>
                    <a href="<?php echo U('Home/Index/buypro3');?>">城市合伙人管理办法</a>

                </div>
                <div class="link">
                    <span class="tel"><b><?php echo ($_SESSION['keywords']['tel']); ?></b><em>（周一至周五：9:00-17:30）</em></span>
                    <span class="email"><?php echo ($_SESSION['keywords']['email']); ?></span>
                    <span class="qq"><?php echo ($_SESSION['keywords']['qq']); ?></span>
                </div>
            </div>
            <div class="fr"><img src="//www.3qqq.com/static/images/common/erweima.png"></div>
        </div>
        <div class="info2">
            <div class="pic">
                <!-- GeoTrust Siteseal [Start] -->
                <script type="text/javascript"
                        src="https://seal.geotrust.com/getgeotrustsslseal?host_name=tejinhui.com&amp;size=S&amp;lang=en"></script>
                <!--  GeoTrust Siteseal [End] -->

            </div>
            <div class="con"><?php echo ($_SESSION['keywords']['copyright']); ?></div>
        </div>

    </div>
    <?php if(!empty($footAdImg)): ?><div class="footer-ad">

            <i id="a-close">X</i>
            <div class="footer-ad-c"><a href="<?php echo ($footAdImg["JumpUrl"]); ?>"><img src="//static.resource.tejinhui.com/<?php echo ($footAdImg["ImageUrl"]); ?>"></a></div>


        </div><?php endif; ?>
</div>

<div class="left_side">
    <div class="left_man"><img src="//www.3qqq.com/static/images/common/left_man.png"></div>
    <ul>

        <li><a href="<?php echo U('Home/index/help');?>"><i class="iconfont">&#xe630;</i>新手指南</a></li>
        <li><a href="<?php echo U('User/Member/index');?>"><i class="iconfont">&#xe714;</i><?php echo empty(session('user.MemberId'))?"登录/注册":"会员中心";?></a></li>
        <li><a href="<?php echo U('Web/Index/publish');?>"><i class="iconfont">&#xe625;</i>一键发布</a></li>
        <li>
							<span>
								<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo ($_SESSION['keywords']['qq']); ?>&amp;site=qq&amp;menu=yes" target="_blank">
                                    <b><img src="//www.3qqq.com/static/images/common/left_03.jpg"></b>
                                    <em>在线客服</em></a>
							</span>

            <span class="top" id="top"><em>Top</em></span>
        </li>

    </ul>
</div>
<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery-1.11.1.js');?>"></script>
<script src="<?php echo tempurl('//www.3qqq.com/static/js/bootstrap.min.js');?>"></script>
<script src="<?php echo tempurl('//www.3qqq.com/static/js/main.js');?>"></script>


<!-- 站长统计开始  -->
<div style="display:none">
				<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259609671'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1259609671' type='text/javascript'%3E%3C/script%3E"));</script>
</div>
<!-- 站长统计结束  -->


<script>
    //首页banner


        //回到顶部
        $("#top").click(function(){
            $('body,html').animate({scrollTop:0},800);

        })

    var numi = $(".numtenhousand").size();
    for(var i=0;i<numi;i++){
                var numtenthousand = parseInt($(".numtenhousand:eq("+i+")").html());

        if(numtenthousand>10000){
            numtenthousand = Math.round((numtenthousand /10000) * 100) / 100;
            numtenthousand ="¥"+numtenthousand + "万";
            $(".numtenhousand:eq("+i+")").html(numtenthousand);
        }
    }

    function search_text(){
        var rcc = $(".search_text").val();
        if(rcc==""){
            return false;
        }else {
            return true;
        }

    }
    //关闭注册广告
    $('#a-close').click(function(){
        $('.footer-ad').hide();
    })
    //alert(numi);
//    $(".numtenhousand").ready(function(e){
//        var numtenthousand = parseInt($(this).html());
//
//        if(numtenthousand>10000){
//            numtenthousand = Math.round((numtenthousand /10000) * 100) / 100;
//            numtenthousand = numtenthousand + "万";
//            $(this).html(numtenthousand);
//        }
//    });



</script>

<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery.SuperSlide.2.1.1.js');?>"></script>
<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery.flexslider-min.js');?>"></script>

		<script>
			//首页banner
			$(function() {
				$('.flexslider').flexslider({
					directionNav: true,
					pauseOnAction: false
				});


			});
		</script>

		<script>
			//首页轮播
			$(function() {
				$(".picScroll-left").slide({
					titCell: ".hd ul",
					mainCell: ".bd ul",
					autoPage: true,
					effect: "left",
					autoPlay: false,
					vis: 1,
					scroll: 1,
					trigger: "click"
				});
			})
		</script>

		<!--// 公告滚动-->

		<script>
			jQuery(".notice").slide({
				mainCell: ".bd ul",
				autoPlay: true,
				effect: "leftMarquee",
				vis: 4,
				interTime: 100,
				trigger: "click"
			});
		</script>

	</body>

</html>