<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="<?php echo ($_SESSION['keyword']['keyword']); ?>" />
    <meta name="description" content="<?php echo ($_SESSION['keyword']['desc']); ?>" />
    <title><?php echo ($_SESSION['keyword']['title']); ?></title>
    <link rel="icon" href="//static.resource.tejinhui.com/static/images/bitbug_favicon.ico" mce_href="//static.resource.tejinhui.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="//static.resource.tejinhui.com/static/images/bitbug_favicon.ico" mce_href="//static.resource.tejinhui.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo tempurl('//static.resource.tejinhui.com/static/style/bootstrap.min.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('//static.resource.tejinhui.com/static/style/style.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('//static.resource.tejinhui.com/static/style/iconfont.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('//static.resource.tejinhui.com/static/style/valifrom.css');?>" />


</head>



<body>
<!-- header -->
<div class="header">
    <div class="top_line"></div>
    <div class="top2">
        <div class="top2_c">
            <div class="fl logo"><b><a href="<?php echo U('Home/Index/index');?>"><img src="//static.resource.tejinhui.com/static/images/common/tejinh.jpg"></a></b><em><img src="//static.resource.tejinhui.com/static/images/common/index_06.jpg?tccc="></em>
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
                        <a href="<?php echo U('Home/Lists/lists');?>">找项目 </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Web/Index/publish');?>">发布项目</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Index/baem',empty(session('user.MemberId'))?'':array('uic'=>authcode(session('user.MemberId'),'ENCODE')));?>">成为经纪人</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Index/introduce');?>">平台介绍</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Index/safe');?>">安全保障</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/index/help');?>">新手指南</a>
                    </li>
                </ul>
            </div>
            <div class="fr member_center">
                <a href="<?php echo U('User/Member/index');?>" id="cselect"><?php echo empty(session('user.MemberId'))?"登录/注册":"会员中心";?></a>
            </div>
        </div>

    </div>
</div>
<!-- header end -->
<style>
	.main{ background: #f5f5f5; margin-top: 8px; overflow: hidden;}
</style>
		<!-- header end -->
		<div class="main">

			<div class="pub_detail">
				<?php if($debt['AssetsStatue'] == 8): ?><div class="mask-buy" id="mask-buy"><span><img src="//static.resource.tejinhui.com/static/images/common/chengjiao.png"></span></div><?php endif; ?>
				<div class="box1">
					<div class="name"><?php echo ($debt["title"]); ?></div>
					<div class="time">发布时间：<?php echo ($debt["CreateTime"]); ?></div>
					<div class="line">
						<ul>
							<li><i class="iconfont">&#xe6ed;</i><em><?php echo empty($debt['ViewCount'])?"0":$debt['ViewCount'];?></em>人看过</li>
							<li class="share"><i class="iconfont">&#xe67e;</i><em><?php echo empty($debt['ShareCount'])?"0":$debt['ShareCount'];?></em>次分享</li>
							<li  class="last"><i class="iconfont">&#xe604;</i><em><?php echo empty($debt['BuyCount'])?"0":$debt['BuyCount'];?></em>人付款</li>
						</ul>
					</div>
					<div class="btn1 active">
						<?php if(($debt['AssetsStatue'] != 8) ): if(($debt['AssetsStatue'] == 4) AND ($downurl != 88) AND ($debt['DueCreateMember'] != session('user.MemberId'))): ?><em class="price">¥<?php echo ($proinfo["ViewPrice"]); ?></em><a href="<?php echo U('User/Logic/buymic',array('type'=>'debt',buyid =>$debt['DebtID']));?>" class="buy">购买尽调报告</a><?php endif; ?>
							<?php if(($downurl == 88) OR ($debt['DueCreateMember'] == session('user.MemberId')) AND ($debt['AssetsStatue'] == 4)): ?><a href="<?php echo U('User/Logic/downFile',array('type'=>'debt',buyid =>$debt['DebtID']));?>" class="buy">下载尽调报告</a>
								<if condition="($debt['AssetsStatue'] neq 7) AND ($debt['DueCreateMember'] neq session('user.MemberId'))">
									<span class="sale">
									<form method="get" action="<?php echo U('User/Logic/deal',array('type'=>'debt',buyid =>$debt['DebtID']));?>" id="deal">
										<em class="price">¥<?php echo ($proinfo["BuyPrice"]); ?>/天</em><a href="javascript:void(0);" class="buy">买断尽调报告</a>
										<div class="down">
											<span>
												<input type="text" class="form-control"  placeholder="买断天数" name="day" id ="day"/>
												<button  id="sut">购买</button>
											</span>
											<em>七天起买</em>
											<em>30天以上打八折</em>
										</div>
									</form>
									</span><?php endif; endif; ?>
						</if>
						<span class="share"><a href="javascript:void(0);" class="share-btn" >分享</a>
								<div class="bdsharebuttonbox">
									<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
									<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
									<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
								</div>
						</span>
					</div>
					<div class="agreen"><input type="checkbox" name="agreen" checked="" id="che">我已阅读并同意
						<a href="<?php echo U('Home/Index/buypro');?>">《尽调报告购买协议》</a>
					</div>
				</div>
				
				
				
				<div class="box2">
					<div class="fl pt60"><img src="//static.resource.tejinhui.com/static/images/common/zhaiquan_03.jpg"></div>
					<div class="con">
						<ul>
							<li><b>债权本金：</b><em class="info_num"><?php echo ($debt["price"]); ?>  元</em></li>
							<li><b>债权产生时间： </b><em><?php echo date('Y-m-d',strtotime($debt['starttime']));?></em></li>
							<li><b>未归还利息：</b><em class="info_num"><?php echo ($debt["interest"]); ?>  元</em></li>
							<li><b>债权到期时间： </b><em><?php echo date('Y-m-d',strtotime($debt['endtime']));?></em></li>
							<li><b>债权总金额：</b><em class="info_num"><?php echo ($debt["total"]); ?>  元</em></li>
							<li><b>债权逾期时间：</b><em><?php echo empty(nubtime(date("Y-m-d"),$debt['endtime']))?"未逾期":nubtime(date("Y-m-d"),$debt['endtime']);?>天</em></li>
							<li><b>处置方式：</b><em><?php echo ($debt["processmodle"]); ?></em></li>
							<li><b>担保方式：</b><em><?php echo ($debt["assureType"]); ?></em></li>
							<li><b>转让价格：</b><em class="info_num"><?php echo ($debt["proprice"]); ?>  元</em></li>
							<li><b>是否具备原始凭证：</b><em><?php echo ($debt["isorgpic"]); ?></em></li>
							<li><b>折        扣：</b><em><?php echo round(($debt['proprice']/$debt['total']),4)*100;?>%</em></li>
							<li><b>是否已经催收：</b><em><?php echo ($debt["isioans"]); ?></em></li>
							<li><b>债权类别：</b><em><?php echo ($debt["ownertype"]); ?></em></li>
							<li><b>是否诉讼：</b><em><?php echo ($debt["islitigation"]); ?></em></li>
							<li><b>约定利率：</b><em>月息<?php echo empty($debt['rate'])?"0":$debt['rate'];?>%</em></li>
							<li><b>是否判决：</b><em><?php echo empty($debt['isjudged'])?"无":$debt['isjudged'];?></em></li>
						</ul>
					</div>
				</div>
				
						<div class="box2">
					<div class="fl"><img src="//static.resource.tejinhui.com/static/images/common/zhaiquan_06.jpg"></div>
					<div class="con">
						<ul>
							<li><b>债务人姓名：</b><em class="info_num"><?php echo ($debt["debtor"]); ?></em></li>
							<li><b>其他债务人联系情况： </b><em><?php echo ($debt["otherdebtor"]); ?></em></li>
							<li><b>债务人所在地：</b><em ><?php echo explode("|",$debt['debtadress'][0])[1]; echo explode("|",$debt['debtadress'][1])[1]; echo ($debt["debtadress"]["2"]); ?></em></li>
							<li><b>债务人类别： </b><em><?php echo ($debt["debttype"]); ?></em></li>
							<li><b>债务人经营情况：</b><em ><?php echo ($debt["debtoptstatue"]); ?></em></li>

						</ul>
					</div>
				</div>
				
					<div class="box2">
					<div class="fl"><img src="//static.resource.tejinhui.com/static/images/common/zhaiquan_10.jpg"></div>
					<div class="con">
						<ul>
							<li><b>抵押物价值：</b><em class="info_num"><?php echo ($debt["pledgevalue"]); ?>  元</em></li>
							<li><b>是否存在权属纠纷： </b><em><?php echo ($debt["isinissue"]); ?></em></li>
							<li><b>抵押物类别：</b><em class="info_num"><?php echo ($debt["pledgetype"]); ?></em></li>
							<li><b>抵押物状态： </b><em><?php echo ($debt["pledgestatue"]); ?></em></li>
							<li><b>抵押物地址：</b><em class="info_num"><?php echo explode("|",$debt['pledgeaddress'][0])[1]; echo explode("|",$debt['pledgeaddress'][1])[1]; echo ($debt["pledgeaddress"]["2"]); ?></em></li>
						
							
						</ul>
					</div>
				</div>
				
				
				<div class="box2">
					<div class="fl introduce div_scroll">
						<?php echo ($debt["AssetsDesc"]); ?>
					</div>
					<div class="fr"><img src="//static.resource.tejinhui.com/static/images/common/zhaiquan_13.jpg"></div>
				</div>
				<div class="box3">
					<div class="title"><img src="//static.resource.tejinhui.com/static/images/common/zhaiquan_17.jpg"></div>
					<div class="con div_scroll">
						<p><?php echo ($debt["ReportDesc"]); ?></p>
					</div>
				</div>
				<div class="box4">
					<div class="title"><img src="//static.resource.tejinhui.com/static/images/common/zhaiquan_20.jpg"></div>
					<div class="con">
						<?php if(is_array($debt["Images"])): $i = 0; $__LIST__ = $debt["Images"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imgs): $mod = ($i % 2 );++$i;?><img src="<?php echo imgpublic($imgs);?>?imageView2/2/w/900"><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>

				<div class="star">
					<form action="<?php echo U('Home/Lists/gediss');?>" method="post" id="doForm">
						<div class="content">

							<div class="goods-comm"><b>评价等级：</b>
								<em>
									<div id="targetText-demo" class="target-demo"></div>
									<div id="targetText-hint" class="hint"></div>
								</em></div>

							<div class="l_text"><b>评价内容：</b><em><textarea name="Content" rows="" cols="" placeholder="说说你的看法"></textarea></em></div>
							<div class="btn"  id="sub_mit">
								<input type="hidden" name="type" value="debt">
								<input type="hidden" name="BelongTO" value="<?php echo ($debt["DebtID"]); ?>">
								<a>发布</a>
							</div>

						</div>
					</form>

					<div id="Searchresult"></div>
<div id="hiddenresult" style="display:none;">
    <?php if(is_array($diss)): $i = 0; $__LIST__ = $diss;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dvo): $mod = ($i % 2 );++$i;?><div class="rated">
            <div class="man"><img src="<?php echo empty($dvo['HeadImg'])?'http://placehold.it/60x60':headimg($dvo['HeadImg'],60,60);?>"></div>
            <div class="fl">
                <div class="name"><b><?php echo ($dvo["RealName"]); ?></b><em class="g-star<?php echo ($dvo["StarLevel"]); ?>"></em></div>
                <div class="con"><?php echo ($dvo["Content"]); ?></div>
                <div class="time">
                    <b><?php echo ($dvo["CreateTime"]); ?></b><span><i>评价等级:</i><em class="g-star<?php echo ($dvo["StarNum"]); ?>"></em></span>

                </div>
                <div class="replay"><em>平台回复：</em><b><?php echo ($dvo["bContent"]); ?></b></div>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<div class="page">
    <?php if(!empty($diss)): ?><div id="Pagination" class="pagination"><!-- 这里显示分页 --></div><?php endif; ?>

</div>


				</div>

			</div>
			
			
		</div>
		<!--footer -->
<div class="footer">
    <div class="footer_c">
        <div class="info1">
            <div class="fl">
                <div class="help">
                    <a href="<?php echo U('Home/Index/about');?>">关于特金汇 </a>
                    <a href="<?php echo U('Home/Index/safe');?>">安全保障</a>
                    <a href="<?php echo U('Home/Index/lagel');?>">法律政策 </a>
                    <a href="<?php echo U('Home/Index/buypro1');?>">特资经纪人申请协议</a>
                    <a href="<?php echo U('Home/Index/buypro2');?>">特资经纪人管理办法</a>

                </div>
                <div class="link">
                    <span class="tel"><b><?php echo ($_SESSION['keywords']['tel']); ?></b><em>（周一至周五：9:00-17:30）</em></span>
                    <span class="email"><?php echo ($_SESSION['keywords']['email']); ?></span>
                    <span class="qq"><?php echo ($_SESSION['keywords']['qq']); ?></span>
                </div>
            </div>
            <div class="fr"><img src="//static.resource.tejinhui.com/static/images/common/erweima.png"></div>
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
</div>

<div class="left_side">
    <div class="left_man"><img src="//static.resource.tejinhui.com/static/images/common/left_man.png"></div>
    <ul>

        <li><a href="<?php echo U('Home/index/help');?>"><i class="iconfont">&#xe630;</i>新手指南</a></li>
        <li><a href="<?php echo U('User/Member/index');?>"><i class="iconfont">&#xe714;</i><?php echo empty(session('user.MemberId'))?"登录/注册":"会员中心";?></a></li>
        <li><a href="<?php echo U('Web/Index/publish');?>"><i class="iconfont">&#xe625;</i>一键发布</a></li>
        <li>
							<span>
								<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo ($_SESSION['keywords']['qq']); ?>&amp;site=qq&amp;menu=yes" target="_blank">
                                    <b><img src="//static.resource.tejinhui.com/static/images/common/left_03.jpg"></b>
                                    <em>在线客服</em></a>
							</span>

            <span class="top" id="top"><em>Top</em></span>
        </li>

    </ul>
</div>
<script src="<?php echo tempurl('//static.resource.tejinhui.com/static/js/jquery-1.11.1.js');?>"></script>
<script src="<?php echo tempurl('//static.resource.tejinhui.com/static/js/bootstrap.min.js');?>"></script>
<script src="<?php echo tempurl('//static.resource.tejinhui.com/static/js/jquery.SuperSlide.2.1.1.js');?>"></script>
<script src="<?php echo tempurl('//static.resource.tejinhui.com/static/js/main.js');?>"></script>
<script src="<?php echo tempurl('//static.resource.tejinhui.com/static/js/jquery.flexslider-min.js');?>"></script>
<script src="<?php echo tempurl('//static.resource.tejinhui.com/static/js/easyscroll.js');?>"></script>
<script src="<?php echo tempurl('//static.resource.tejinhui.com/static/js/mousewheel.js');?>"></script>
<!-- 站长统计开始  -->
<div style="display:none">
				<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259609671'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1259609671' type='text/javascript'%3E%3C/script%3E"));</script>
</div>
<!-- 站长统计结束  -->

<script type="text/javascript">
    $(function() {
        $('.div_scroll').scroll_absolute({
            arrows: true
        })
    });
</script>
<script>
    //首页banner


        //回到顶部
        $("#top").click(function(){
            $('body,html').animate({scrollTop:0},800);

        })

</script>
<script type="text/javascript" src="<?php echo tempurl('//static.resource.tejinhui.com/static/js/jquery.raty.js');?>"></script>
<script type="text/javascript" src="<?php echo tempurl('//static.resource.tejinhui.com/static/js/jquery.pagination.js');?>"></script>
<script type="text/javascript">
	$(function() {
		$('.div_scroll').scroll_absolute({
			arrows: true
		});
		$('#targetText-demo').raty({
			target: '#targetText-hint',
			targetText: ''

		});
		var initPagination = function() {
			var num_entries = $("#hiddenresult div.rated").length;
			// 创建分页
			$("#Pagination").pagination(num_entries, {
				num_edge_entries: 1, //边缘页数
				num_display_entries: 4, //主体页数
				callback: pageselectCallback,
				prev_text:'上一页',
				next_text:'下一页',
				items_per_page:2, //每页显示1项
			});
		}();

		function pageselectCallback(page_index, jq){
			// 从表单获取每页的显示的列表项数目
			var items_per_page = 2;
			var pp = page_index+1;
			var max_elem = pp* items_per_page;
			$("#Searchresult").html("");
			// 获取加载元素
			for(var i=page_index*items_per_page;i<max_elem;i++){
				var new_content = $("#hiddenresult div.rated:eq("+i+")").clone();
				$("#Searchresult").append(new_content); //装载对应分页的内容
			}
			//阻止单击事件
			return false;

		}
	});
</script>
<script  type="text/javascript">
	$(function() {
		$("#sub_mit").click(function(){
			var formurl = $('#doForm').attr("action");
			$.ajax({
				cache: false,
				type: "POST",
				url:formurl,
				data:$('#doForm').serialize(),// 你的formid
				async: true,
				error:function(request){
				},
				beforeSend:function(){},
				success:function(data){
					if(data.info== ""||data.info==undefined){
						filterWarn("请登陆后在来评论");
						return false;
					}
					if(data.info=="login"){
						top.location=data.url;
					}

					filterWarn(data.info);


				},

			});
		});
		return false;
	})
</script>
<script>
	window._bd_share_config = {
		"common": {
			"bdSnsKey": {},
			"bdText": "特金汇—"+"<?php echo ($debt["title"]); ?>",
			"bdMini": "2",
			"bdPic": "",
			"bdStyle": "0",
			"bdSize": "16"
		},
		"share": {}
	};
	with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
</script>
<script type="text/javascript">
	$("#sut").click(function(){
		var cc= $("#day").val();
		if(/^[0-9]+([.]{1}[0-9]+){0,1}$/.test(cc)&&cc>6){
		}else {
			filterWarn("请填写买断天数");
			return false;
		}

		if($('#che').is(':checked')) {
			$("#deal").submit();
			// do something
		}else {
			filterWarn("你没有同意协议");
		}
	});
</script>
	</body>
</html>