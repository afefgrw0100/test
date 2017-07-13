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
	.main{ background: #f5f5f5; margin-top: 20px; overflow: hidden;}
</style>
		<div class="main">
			<div class="pub_detail">
				<div class="box1">
					<div class="name"><?php echo ($pack["title"]); ?></div>
					<div class="time">发布时间：<?php echo ($pack["CreateTime"]); ?></div>
					<div class="line">
						<ul>
							<li><i class="iconfont">&#xe6ed;</i><em><?php echo empty($pack['ViewCount'])?"0":$pack['ViewCount'];?></em>人看过</li>
							<li class="share"><i class="iconfont">&#xe67e;</i><em><?php echo empty($pack['ShareCount'])?"0":$pack['ShareCount'];?></em>次分享</li>
							<li><i class="iconfont">&#xe604;</i><em><?php echo empty($pack['BuyCount'])?"0":$pack['BuyCount'];?></em>人付款</li>
						</ul>
					</div>
					<div class="btn1">
						<a href="<?php echo U('User/Logic/buymic',array('type'=>'package',buyid =>$pack['PackageID'],'ismian'=>1));?>" class="buy">购买尽调报告</a>
						<a href="javascript:void(0);" class="share">分享</a></div>
				</div>

				<div class="xm_list1">
					<div class="xm_list1_c">
						<div class="title">项目列表</div>
						<div class="con div_scroll">
							<ul>
								<li><em><i>1</i>不良资产某商帐处置尽调内容良资产某商帐处</em><b><a href="<?php echo U('User/Logic/buymic',array('type'=>'package',buyid =>$pack['PackageID'],'ismian'=>2));?>">购买</a></b></li>
							</ul>
						</div>

					</div>

				</div>
				
				<div class="box2">
					<div class="fl"><img src="/static/images/common/zcb_03.jpg"></div>
					<div class="con pt60">
						<ul>
							<li><b>资产包总金额：</b><em class="info_num"><?php echo ($pack["total"]); ?>  元</em></li>
							<li><b>资产来源： </b><em><?php echo ($pack["source"]); ?></em></li>
							<li><b>出售金额：</b><em class="info_num"><?php echo ($pack["interest"]); ?>  元</em></li>
							<li><b>项目数量： </b><em><?php echo ($pack["projectnum"]); ?></em></li>
							<li><b>折       扣：</b><em class="info_num">0.8</em></li>
							<li><b>是否具备原始凭证：</b><em><?php echo ($pack["isorginpic"]); ?></em></li>
							
						</ul>
					</div>
				</div>
				
					<div class="box2">
					<div class="fl"><img src="/static/images/common/zcb_07.jpg"></div>
					<div class="con pt80">
						<ul>
							<li><b>债权人类别：</b><em><?php echo ($pack["ownertype"]); ?></em></li>
							
							
						</ul>
					</div>
				</div>
				<div class="box2">
					<div class="fl introduce div_scroll">
						<?php echo ($pack["PackageDesc"]); ?>
					</div>
					<div class="fr"><img src="/static/images/common/zcb_11.jpg"></div>
				</div>
				<div class="box3">
					<div class="title"><img src="/static/images/common/zcb_15.jpg"></div>
					<div class="con div_scroll">
						<?php echo ($pack["ReportDesc"]); ?>

					</div>
				</div>
				<div class="box4">
					<div class="title"><img src="/static/images/common/zcb_17.jpg"></div>
					<div class="con">
						<?php if(is_array($pack["Images"])): $i = 0; $__LIST__ = $pack["Images"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imgs): $mod = ($i % 2 );++$i;?><img src="<?php echo ($imgs); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
						<?php if(is_array($pack["AssetsDesc"])): $i = 0; $__LIST__ = $pack["AssetsDesc"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imgdesc): $mod = ($i % 2 );++$i;?><img src="<?php echo ($imgdesc); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>

				<div class="star">
					<form action="<?php echo U('Web/Packages/gediss');?>" method="post" id="doForm">
						<div class="content">

								<div class="goods-comm"><b>评价等级：</b>
									<em>
										<div id="targetText-demo" class="target-demo"></div>
										<div id="targetText-hint" class="hint"></div>
									</em></div>

								<div class="l_text"><b>评价内容：</b><em><textarea name="Content" rows="" cols="" placeholder="说说你的看法"></textarea></em></div>
								<div class="btn"  id="sub_mit">
									<input type="hidden" name="type" value="pp">
									<input type="hidden" name="BelongTO" value="<?php echo ($pack["PackageID"]); ?>">
									<a>发布</a>
								</div>

						</div>
					</form>

				<div id="Searchresult"></div>
<div id="hiddenresult" style="display:none;">
    <?php if(is_array($diss)): $i = 0; $__LIST__ = $diss;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dvo): $mod = ($i % 2 );++$i;?><div class="rated">
            <div class="man"><img src="<?php echo empty($dvo['HeadImg'])?'http://placehold.it/60x60':$dvo['HeadImg'];?>"></div>
            <div class="fl">
                <div class="name"><b><?php echo ($dvo["RealName"]); ?></b><em><img src="/static/images/common/start1.jpg"></em></div>
                <div class="con"><?php echo ($dvo["Content"]); ?></div>
                <div class="time"><b><?php echo ($dvo["CreateTime"]); ?></b><span><i>评价等级:</i><em><img src="/static/images/common/start.jpg"></em></span></div>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<div class="page">
    <?php if(!empty($diss)): ?><div id="Pagination" class="pagination"><!-- 这里显示分页 --></div><?php endif; ?>

</div>
<script  type="text/javascript" src="<?php echo tempurl('/static/js/easyscroll.js');?>"></script>
<script type="text/javascript" src="<?php echo tempurl('/static/js/jquery.raty.js');?>"></script>
<script type="text/javascript" src="<?php echo tempurl('/static/js/jquery.pagination.js');?>"></script>
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
				</div>


			</div>
			
			
		</div>
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



<div class="mask">
	<div class="popups clearfix">
		<h2>分享到：</h2>
		<!--<div class="shares">
            <b><img src="images/common/share_07.jpg"></b>
            <em>微信扫描二维码分享至微信</em></div>

        <div class="shares">
            <b><a href=""><img src="images/common/share_09.jpg"></a></b>
            <em>点击上方微博图标分享至新浪微博</em></div>-->

		<div class="shares">
			<!-- JiaThis Button BEGIN -->
			<div class="jiathis_style_32x32">
				<a class="jiathis_button_qzone"></a>
				<a class="jiathis_button_tsina"></a>
				<a class="jiathis_button_weixin"></a>

			</div>
			<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
			<!-- JiaThis Button END -->
		</div>

		<div class="close">关闭</div>
	</div>
</div>

	</body>
</html>