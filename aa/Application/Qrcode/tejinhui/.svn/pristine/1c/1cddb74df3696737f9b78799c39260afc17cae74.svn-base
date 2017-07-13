<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo tempurl('/static/style/bootstrap.min.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('/static/style/style.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('/static/style/iconfont.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('/static/style/valifrom.css');?>" />
    <script src="<?php echo tempurl('/static/js/jquery-1.7.2.min.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/jquery.SuperSlide.2.1.1.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/main.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/jquery.flexslider-min.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/easyscroll.js');?>"></script>
    <script type="text/javascript">
        $(function() {
            $('.div_scroll').scroll_absolute({
                arrows: true
            })
        });
    </script>

</head>



<body>
<!-- header -->
<div class="header">
    <div class="top_line"></div>
    <div class="top2">
        <div class="top2_c">
            <div class="fl logo"><b><img src="/static/images/common/index_03.jpg"></b><em><img src="/static/images/common/index_06.jpg"></em>
            </div>
            <div class="fr search">
                <form action="<?php echo U('Home/Search/lists');?>" method="get">
                <input type="text" class="search_text" name="search" placeholder="找项目"  value="<?php echo ($search); ?>">
                <input type="submit" class="search_bth" value="">
                </form>
            </div>

        </div>

    </div>
    <div class="nav">
        <div class="nav_c">
            <div class="fl">
                <ul>
                    <li class="">
                        <a href="<?php echo U('Home/Index/index');?>">首页</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Lists/lists');?>">优质项目 </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Web/Index/publish');?>">发布项目</a>
                    </li>
                    <li>
                        <a href="#">赚钱模式</a>
                    </li>
                    <li>
                        <a href="#">安全保障</a>
                    </li>
                    <li>
                        <a href="#">新手指南</a>
                    </li>
                </ul>
            </div>
            <div class="fr member_center">
                <a href="<?php echo U('User/Index/index');?>">会员中心</a>
            </div>
        </div>

    </div>
</div>
<!-- header end -->
<style>
	body{ background: #f5f5f5;}
</style>
		<!-- main -->
		<div class="main">
			<div class="banner">
				<div class="flexslider">
	<ul class="slides">
		<?php if(is_array($listimg)): $i = 0; $__LIST__ = $listimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imgvo): $mod = ($i % 2 );++$i;?><li style="background:url(<?php echo C('IMGPATH').'/'.$imgvo['path'];?>) 50% 0 no-repeat;"></li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>
				
			</div>
			<div class="info">
				<div class="info_c" id="num">
					<ul>
						<li><b class="info_num">18137</b><em>发布项目</em></li>
						<li><b class="info_num">2137</b><em>完成尽调</em></li>
						<li><b class="info_num">9037</b><em>活跃经纪人</em></li>
					</ul>
				</div>
			</div>

			<div class="hot_city">
				<div class="city_c">
					<div class="fl"><b>热门城市</b><em>按热度</em><i></i></div>
					<div class="con"><span>
						<?php if(is_array($cpro)): $i = 0; $__LIST__ = $cpro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cprovo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Lists/lists',array('province'=>$cprovo['pid'],City=>$cprovo['area_id']));?>"><?php echo ($cprovo["area_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
						</span><em><a href="<?php echo U('Home/Lists/lists');?>">更多》</a></em></div>
				</div>
			</div>

			<div class="tjh">
				<div class="tjh_title">
					<div class="line"></div>
					<div class="tjh_title_c">
						<b><img src="/static/images/common/index1_07.jpg"></b>
					</div>

				</div>
				<div class="tjh_con">
					<ul>
						<li>
							<a href=""><b><img src="/static/images/common/icon.png"></b><span>债权持有人</span></a>
						</li>
						<li>
							<a href=""><b><img src="/static/images/common/icon2.png"></b><span>经纪人</span></a>
						</li>
						<li>
							<a href=""><b><img src="/static/images/common/icon3.png"></b><span>投资方</span></a>
						</li>
					</ul>
				</div>
			</div>
			
				<!--  项目列表 -->
			<div class="xm_list">
				<div class="xm_list_title">项目列表</div>
				<div class="more"><a href="#">更多》</a></div>
				<div class="xm_list_con">
					<div class="nTab">
						<div class="TabTitle">
							<ul id="myTab">
								<li class="active" onmouseover="nTabs(this,0);">债权</li>
								<li class="normal" onmouseover="nTabs(this,1);">资产包</li>
								<li class="normal" onmouseover="nTabs(this,2);">实物</li>
							</ul>
						</div>
						<div class="TabContent">
							<div id="myTab_Content0">
								<table class="table">
									<thead>
										<tr>
											<th>&nbsp;</th>
											<th>项目名称</th>
											<th>项目类型</th>
											<th>逾期时间</th>
											<th>是否诉讼</th>
											<th>所在地</th>
											<th>债权金额</th>
											<th>转让金额</th>
											<th>折扣率</th>
											<th>目前进度</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<img src="http://placehold.it/60x60">
											</td>
											<td>企业商帐</td>
											<td>债权</td>
											<td>215天</td>
											<td><em class="state">已诉</em></td>
											<td>长沙</td>
											<td><b class="info_num">11110</b>元</td>
											<td><b class="info_num">11110</b>元</td>
											<td>50%</td>
											<td><em class="label label-primary">已完成尽调</em></td>
										</tr>
										<tr>
											<td><img src="http://placehold.it/60x60"></td>
											<td>企业商帐</td>
											<td>债权</td>
											<td>215天</td>
											<td><em class="state">未诉</em></td>
											<td>长沙</td>
											<td><b class="info_num">11110</b>元</td>
											<td><b class="info_num">11110</b>元</td>
											<td>50%</td>
											<td><em class="label label-warning">等待尽调</em></td>
										</tr>

									</tbody>
								</table>

							</div>
							<div id="myTab_Content1" class="none">333</div>
							<div id="myTab_Content2" class="none">323</div>
						</div>
					</div>
				</div>
			</div>
			
			<!--  项目列表 end  -->
			
			<!-- 热门项目 -->
			<div class="xm_list">
				
				<div class="xm_list_title">热门项目</div>
				<div class="tip">自主选择，灵活投资</div>
				<div class="more"><a href="">更多》</a></div>
				<div class="line"></div>
				
				<div class="xm_hot">
					
							<div class="picScroll-left">
		
			<div class="bd">
				<ul class="picList">
					<li>
						<div class="pic"><img src="http://placehold.it/120x120"></div>
						<div class="name"><i>企</i><b>湖南某企业商帐</b></div>
						<div class="time">浏览次数：<em>35678 次</em></div>
						<div class="money">付款人数：<em>2256  人</em></div>
					</li>
					<li>
						<div class="pic"><img src="http://placehold.it/120x120"></div>
						<div class="name"><i>企</i><b>湖南某企业商帐</b></div>
						<div class="time">浏览次数：<em>35678 次</em></div>
						<div class="money">付款人数：<em>2256  人</em></div>
					</li>
					<li>
						<div class="pic"><img src="http://placehold.it/120x120"></div>
						<div class="name"><i>企</i><b>湖南某企业商帐</b></div>
						<div class="time">浏览次数：<em>35678 次</em></div>
						<div class="money">付款人数：<em>2256  人</em></div>
					</li>
					<li>
						<div class="pic"><img src="http://placehold.it/120x120"></div>
						<div class="name"><i>企</i><b>湖南某企业商帐</b></div>
						<div class="time">浏览次数：<em>35678 次</em></div>
						<div class="money">付款人数：<em>2256  人</em></div>
					</li>
					<li>
						<div class="pic"><img src="http://placehold.it/120x120"></div>
						<div class="name"><i>企</i><b>湖南某企业商帐</b></div>
						<div class="time">浏览次数：<em>35678 次</em></div>
						<div class="money">付款人数：<em>2256  人</em></div>
					</li>
					<li>
						<div class="pic"><img src="http://placehold.it/120x120"></div>
						<div class="name"><i>企</i><b>湖南某企业商帐</b></div>
						<div class="time">浏览次数：<em>35678 次</em></div>
						<div class="money">付款人数：<em>2256  人</em></div>
					</li>
					
				</ul>
			</div>
			
				<div class="hd">
				<a class="prev" href="javascript:void(0)"><img src="/static/images/common/left.png" /></a>
        		<a class="next" href="javascript:void(0)"><img src="/static/images/common/right.png"/></a>
        		<ul>
        			<li>1</li>
        			<li>2</li>
        			<li>3</li>
        		</ul>
			</div>
			
		</div>
			
				</div>
			</div>
			<!-- 热门项目 end-->
			
			<!-- 资讯 -->
			<div class="xm_list zixun">
				<div class="fl">
					<div class="xm_list_title">资讯</div>
					<div class="tip">自主选择，灵活投资</div>
					<div class="more"><a href="<?php echo U('Index/artlist');?>">更多》</a></div>
					<div class="line"></div>
					
					<div class="news">
						<?php if(is_array($artlist)): $i = 0; $__LIST__ = $artlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$artvo): $mod = ($i % 2 );++$i;?><span><b><a href="<?php echo U('index/artcon',array('artid'=>$artvo['id']));?>"><?php echo ($artvo["title"]); ?></a></b><em><?php echo date('Y-m-d',strtotime($artvo['createtime']));?></em></span><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
				<div class="fr"><img src="/static/images/temp/pic_03.jpg"></div>
			</div>
				<!-- 资讯 end -->
				
				<!--合作伙伴-->
			<div class="xm_list friend_link_con">
				<div class="xm_list_title">合作伙伴</div>
				<div class="tip">自主选择，灵活投资</div>
				<div class="line"></div>
				
				<div class="friend_link">
					<span>
						<a href=""><img src="/static/images/temp/pic_11.jpg"></a>
						<a href=""><img src="/static/images/temp/pic_11.jpg"></a>
						<a href=""><img src="/static/images/temp/pic_11.jpg"></a>
						<a href=""><img src="/static/images/temp/pic_11.jpg"></a>
						<a href=""><img src="/static/images/temp/pic_11.jpg"></a>
						<a href=""><img src="/static/images/temp/pic_11.jpg"></a>
						<a href=""><img src="/static/images/temp/pic_11.jpg"></a>
						<a href=""><img src="/static/images/temp/pic_11.jpg"></a>
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
                    <a href="">关于特金汇 </a>
                    <a href="">安全保障</a>
                    <a href="">常见问题</a>
                    <a href="">法律政策 </a>
                    <a href=""> 资费说明</a>
                    <a href="">媒体报道</a>
                </div>
                <div class="link">
                    <span class="tel"><b>4000-000-000</b><em>（工作时间：9:00-22:00）</em></span>
                    <span class="email">tejinhui@.com</span>
                    <span class="qq">在线客服</span>
                </div>
            </div>
            <div class="fr"><img src="/static/images/common/erweima.png"></div>
        </div>
        <div class="info2">
            <div class="pic">
                <img src="/static/images/temp/footer_pic.png">
                <img src="/static/images/temp/footer_pic2.png">
                <img src="/static/images/temp/footer_pic2.png">
                <img src="/static/images/temp/footer_pic2.png">
                <img src="/static/images/temp/footer_pic2.png">

            </div>
            <div class="con">湘ICP备12023672号-5  |  湘公网安备 11010502025073 号
                © 2016 tejinhui.com  | 特金汇有限公司 版权所有</div>
        </div>

    </div>
</div>
<!-- GeoTrust Siteseal [Start] -->
<script language="javascript" type="text/javascript" src="//smarticon.geotrust.com/si.js"></script>
<!--  GeoTrust Siteseal [End] -->



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
			vis: 4,
			scroll: 4,
			trigger: "click"
		});
	})
</script>

	</body>

</html>