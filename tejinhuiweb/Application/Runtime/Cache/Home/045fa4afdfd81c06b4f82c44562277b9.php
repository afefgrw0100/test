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

		<!-- header end -->
		<div class="main">
			<div class="pub_detail">
				<?php if(($asset['AssetsStatue'] == 8) OR (($source == 1) AND comper_time($asset['AuctionEnds']))): ?><div class="mask-buy" id="mask-buy"><span><img src="//www.3qqq.com/static/images/common/chengjiao.png"></span></div><?php endif; ?>

				<div class="box1">
					<div class="name"><?php echo ($asset["title"]); ?></div>
					<div class="time">发布时间：<?php echo ($asset["CreateTime"]); ?></div>
					<div class="line">
						<ul>
							<li><i class="iconfont">&#xe6ed;</i><em><?php echo empty($asset['ViewCount'])?"0":$asset['ViewCount'];?></em>人看过</li>
							<li class="share"><i class="iconfont">&#xe67e;</i><em><?php echo empty($asset['ShareCount'])?"0":$asset['ShareCount'];?></em>次分享</li>
							<li class="last"><i class="iconfont">&#xe604;</i><em><?php echo empty($asset['BuyCount'])?"0":$asset['BuyCount'];?></em>人付款</li>
						</ul>
					</div>
					<div class="btn1 active">
						<span class="sale">
						<a href="<?php echo U('Home/lists/content',array('AssetsIDrent'=>$asset['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE'),'typepay'=>'ccc'));?>" class="buy2" ><?php if($source == 1): ?>查看评估报告<?php else: ?>查看尽调报告<?php endif; ?></a>
							</span>
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
					<div class="fl"><img src="//www.3qqq.com/static/images/common/detail_07.jpg"></div>
					<div class="con">
						<?php if($asset['PayModes'] == 0): ?><ul>
								<li><b>资产评估：</b><em class="info_num numtenhousand"><?php echo ($asset["Price"]); ?> 元</em></li>
								<li><b>资产状态：</b><em><?php echo ($asset["statue"]); ?></em></li>
								<li><b>资产处置方式：</b><em><?php echo ($asset["processmodle"]); ?></em></li>
								<li><b>资产地址： </b><em><?php echo explode("|",$asset['address'][0])[1]; echo explode("|",$asset['address'][1])[1]; echo ($asset["address"]["2"]); ?></em></li>
								<li>
									<b>
									<?php if($source == 6): ?>月租价格<?php echo C("CentMode")[$asset['CentMode']]; else: ?>资产出售价格<?php endif; ?>：

									</b>
									<em class="info_num numtenhousand"><?php echo ($asset["proprice"]); ?>  元</em>
								</li>
								<li><b>使用现状：</b><em><?php echo ($asset["Usestat"]); ?></em></li>
								<li><b>折      扣：</b><em><?php echo round(($asset['proprice']/$asset['price']),4)*100;?>%</em></li>
								<li><b>押金：</b><em class="numtenhousand"><?php echo ($asset["Deposit"]); ?>元</em></li>
								<li><b>资产类别：</b><em><?php echo ($asset["assetstype"]); ?></em></li>
								<li><b>是否存在权属纠纷：</b><em><?php echo ($asset["isinissue"]); ?></em></li>

							</ul>
							<?php else: ?>
							<ul>
								<li><b>市场价值：</b><em class="info_num numtenhousand"><?php echo ($asset["price"]); ?> 元</em></li>
								<li><b>资产来源： </b><em><?php echo ($asset["source"]); ?></em></li>
								<li><b>资产处置方式：</b><em><?php echo ($asset["processmodle"]); ?></em></li>
								<li><b>资产地址： </b><em><?php echo explode("|",$asset['address'][0])[1]; echo explode("|",$asset['address'][1])[1]; echo ($asset["address"]["2"]); ?></em></li>
								<li><b>起拍价格：</b><em class="info_num numtenhousand"><?php echo ($asset["proprice"]); ?>  元</em></li>
								<li><b>使用现状：</b><em><?php echo ($asset["Usestat"]); ?></em></li>
								<li><b>折      扣：</b><em><?php echo round(($asset['proprice']/$asset['price']),4)*100;?>%</em></li>
								<li><b>资产状态：</b><em><?php echo ($asset["statue"]); ?></em></li>
								<li><b>资产类别：</b><em><?php echo ($asset["assetstype"]); ?></em></li>
								<li><b>是否存在权属纠纷：</b><em><?php echo ($asset["isinissue"]); ?></em></li>

								<li><b>保留价格：</b><em class="info_num numtenhousand"><?php echo ($asset["ReservePrices"]); ?>元</em></li>
								<li><b>保  证  金：</b><em class="info_num numtenhousand"><?php echo ($asset["Bonds"]); ?>元</em></li>
								<li><b>拍卖起始时间：</b><em><?php echo date('Y-m-d',strtotime($asset['AuctionStarts']));?></em></li>

								<li><b>付款方式：</b><em><?php if($asset['PayModes'] == 1): ?>全款<?php else: ?>按揭<?php endif; ?></em></li>

							</ul><?php endif; ?>
					</div>
				</div>
				<div class="box2">
					<pre class="fl introduce div_scroll"><p><?php echo ($asset["AssetsDesc"]); ?></p></pre>
					<div class="fr"><img src="//www.3qqq.com/static/images/common/detail_11.jpg"></div>
				</div>
				<div class="box3">
					<div class="title"><img src="//www.3qqq.com/static/images/common/detail_15.jpg"></div>
					<pre class="con div_scroll"><p><?php echo ($asset["ReportDesc"]); ?></p></pre>
				</div>
				<div class="box4">
					<div class="title"><img src="//www.3qqq.com/static/images/common/detail_18.jpg"></div>
					<div class="con">
						<?php if(is_array($asset["Images"])): $i = 0; $__LIST__ = $asset["Images"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imgs): $mod = ($i % 2 );++$i;?><img src="<?php echo imgpublic($imgs);?>?imageView2/2/w/900"><?php endforeach; endif; else: echo "" ;endif; ?>
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
								<input type="hidden" name="type" value="asetrent">
								<input type="hidden" name="BelongTO" value="<?php echo ($asset["AssetsID"]); ?>">
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
<div class="mask" id="mask">
	<div class="apply_content">
		<div class="agent-tan">
			<form action="<?php echo U('Home/Lists/dofinan',array('type'=>'assets',buyid =>$asset['AssetsID']));?>" method="post" id="dddd">
				<div class="title"><h2>申请配资</h2> <em id="close">X</em></div>
				<ul>
					<li><em>项目名称：</em><b><?php echo ($asset["title"]); ?></b></li>
					<li><em>项目所在地区：</em><b><?php echo explode("|",$asset['address'][0])[1]; echo explode("|",$asset['address'][1])[1];?></b></li>
					<li><em>项目整体购买金额：</em><b class="numtenhousand"><?php echo ($asset["proprice"]); ?>  元</b></li>
					<li><em>拟配资金额：</em><b><input type="text" class="form-control" id="request_quanlity" name="request_quanlity" nullmsg="请填写拟配资金额" /></b></li>
					<li><em>申请主体名称：</em><b><input type="text" class="form-control" id="contact_name" name="contact_name" nullmsg="请填申请主体名称"  /></b></li>
					<li><em>联系电话：</em><b><input type="text" class="form-control" id="contact_phone" name="contact_phone" nullmsg="请填写联系电话"  /></b></li>
				</ul>
				<div  class="submit">
					<input class="btn" type="submit" id="sub_mitfinan" value="提交"/>
				</div>
			</form>
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
                    <a href="<?php echo U('Home/Index/baem',empty(session('user.MemberId'))?'':array('uic'=>authcode(session('user.MemberId'),'ENCODE')));?>">成为经纪人</a>
                    <a href="<?php echo U('Home/Index/buypro1');?>">特资经纪人申请协议</a>
                    <a href="<?php echo U('Home/Index/buypro2');?>">特资经纪人管理办法</a>
                    <a href="//www.3qqq.com/static/images/application.pdf" download ="application.pdf" target="_blank">全国城市划分</a>
                    <a href="//www.3qqq.com/static/images/City.pdf" download ="City.pdf" target="_blank">城市合伙人申请协议</a>
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

<script src="<?php echo tempurl('//www.3qqq.com/static/js/easyscroll.js');?>"></script>
<script src="<?php echo tempurl('//www.3qqq.com/static/js/mousewheel.js');?>"></script>
<script type="text/javascript" src="<?php echo tempurl('//www.3qqq.com/static/js/jquery.raty.js');?>"></script>
<script type="text/javascript" src="<?php echo tempurl('//www.3qqq.com/static/js/jquery.pagination.js');?>"></script>
<script type="text/javascript">

	$(function() {
		$('.div_scroll').scroll_absolute({
			arrows: true
		})
	});
</script>
<script>
	$(function(){
		$("#apply").click(function(){
			$("#mask").show();
		});
		$("#close").click(function(){
			$("#mask").hide();
		})

	})
</script>
<script type="text/javascript" charset="utf-8" src="<?php echo tempurl('//www.3qqq.com/static/js/Validform_v5.3.2_min.js');?>"></script>
<script type="text/javascript">
	$(function(){
		//$(".registerform").Validform();  //就这一行代码！;

		var demo=$("#dddd").Validform({
			tiptype:3,
			label:".label",
			btnSubmit:'#sub_mitfinan',
			showAllError:true,
			datatype:{
				"zh1-6":/^[\u4E00-\u9FA5\uf900-\ufa2d]{1,6}$/
			},
			//默认为false，使用ajax方式提交表单数据，将会把数据POST到config方法或表单action属性里设定的地址；
			ajaxPost:false,
			postonce:true,
		});

		//通过$.Tipmsg扩展默认提示信息;
		//$.Tipmsg.w["zh1-6"]="请输入1到6个中文字符！";
		demo.tipmsg.w["zh1-6"]="请输入1到6个中文字符！";
		demo.tipmsg.r=" ";
		demo.addRule([
			{
				ele:"#request_quanlity",
				datatype:"n"
			},
			{
				ele:"#contact_phone",
				datatype:"m"
			},
			{
				ele:"#contact_name",
				datatype:"*"
			}
		]);

	})
</script>
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
			"bdText": "特金汇—"+"<?php echo ($asset["title"]); ?>",
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
		if(/^[0-9]+([.]{1}[0-9]+){0,1}$/.test(cc)&&cc>=7){
		}else {
			filterWarn("买断天数最少一个星期");
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