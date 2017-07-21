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
	.main{ background: #f5f5f5; margin-top: 8px; overflow: hidden;}
</style>
		<div class="main">
			
			<div class="search_main">


				<div class="hot">
					<dl>
						<dt class="address">地区：</dt>
						<dd>
							<div class="h_chooselist" >
								<div class="info1" id="province1"><a href="javascript:void(0)"  class="select_all" province="">全国</a> <em id="cprovince">热门城市</em> <i></i></div>
								<div class="info2" id="province" >
									<ul id="js_provList">
									<?php if(is_array($area)): $i = 0; $__LIST__ = $area;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arvo): $mod = ($i % 2 );++$i;?><li>
											<span><a href="javascript:void(0)" target="art" province="<?php echo ($arvo["id"]); ?>"><?php echo ($arvo["name"]); ?></a></span>
											<ul>
												<?php if(is_array($arvo["city"])): $i = 0; $__LIST__ = $arvo["city"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ctiyvo): $mod = ($i % 2 );++$i;?><li><a href="javascript:void(0)" city="<?php echo ($ctiyvo["id"]); ?>"><?php echo ($ctiyvo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
											</ul>
										</li><?php endforeach; endif; else: echo "" ;endif; ?>
									</ul>
								</div>
								<div  class="info3" id="province2">
									<?php if(is_array($cpro)): $i = 0; $__LIST__ = $cpro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$acvo): $mod = ($i % 2 );++$i;?><a href="javascript:void(0)" target="art" province="<?php echo ($acvo["pid"]); ?>" city="<?php echo ($acvo["area_id"]); ?>"><?php echo ($acvo["area_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>

							</div>
						</dd>
					</dl>

					<dl>
						<dt>类别：</dt>
						<dd>
							<div class="h_chooselist" id="typev">
								<a href="javascript:void(0)"  class="select_all" msgtype="">全部</a>
								<?php if(is_array($messagetype)): $i = 0; $__LIST__ = $messagetype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$typev): $mod = ($i % 2 );++$i;?><a href="javascript:void(0)"  msgtype="<?php echo ($typev["CodeID"]); ?>"><?php echo ($typev["CodeName"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
						</dd>
					</dl>

					<dl>
						<dt>转让价格：</dt>
						<dd>
							<div class="h_chooselist" id="price">
								<a href="javascript:void(0)" starpro="0" endpro="50">50万以下</a>
								<a href="javascript:void(0)"  starpro="50" endpro="200">50万-200万</a>
								<a href="javascript:void(0)"  starpro="200" endpro="1000">200万-1000万</a>
								<a href="javascript:void(0)"  starpro="1000" endpro="30000">1000万以上</a>
							</div>
						</dd>
					</dl>
				</div>
				<div class="sort">

					<em>排序:</em>
					<span id="ord">
						<a href="javascript:;" class="curr up" ord ="">默认</a>
						<a href="javascript:;"  ord="1">转让价格<i></i></a>
					</span>
				</div>
				<div class="crumbs-nav">
					<a href="javascript:void(0)" class="dn" id="ptext">
						<b>地区：</b>
						<em>长沙</em>
						<i class="iconfont">&#xe60e;</i>
					</a>
					<a href="javascript:void(0)" class="dn" id="typetext">
						<b>类别：</b>
						<em>债权</em>
						<i class="iconfont">&#xe60e;</i>
					</a>

					<a href="javascript:void(0)" class="dn" id="mtext">
						<b>转让价格：</b>
						<em>50万以下</em>
						<i class="iconfont">&#xe60e;</i>
					</a>
				</div>
				<article id="ajax_lists">

				</article>
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


		<script type="text/javascript">
			var url_ajax = "/index.php/Home/Search/orders",pricestar,priceend,typev,province=<?php echo empty($provinec)?"''":$provinec;?>,provincetxt,ord,city=<?php echo empty($City)?"''":$City;?>;
			var ptext,typetext,mtext;
			$(function() {
				//城市
				$('#js_provList li ').mouseover(function(){
					$(this).children('ul').css('display','block')
					provincetxt = $(this).children('span').children('a').attr("province");
					ptext =  $(this).children('span').children('a').html();
				})


				$('#js_provList li').mouseout(function(){
					$(this).children('ul').css('display','none')
				})

				//提示
				$('.crumbs-nav a i ').click(function(){
					var ptxtid = $(this).parent().attr("id");
					switch(ptxtid){
						case "ptext":
							province="";
							city="";
							break;
						case "ptext":
							typev="";
							break;
						case "mtext":
							pricestar="";
							priceend="";
							break;

					}
					$(this).parent().css('display','none');
					getPage(1);
				})
				//分页
				$("#ajax_lists").delegate(".page div a", "click", function() {
					var page = $(this).attr("data-page");
					getPage(page);
				});
				//quanguo
				$("#js_provList li span a").live("click",function(e){
					province = $(this).attr("province");
					city ="";
					ptext = $(this).html();
					$("#ptext em").html(ptext);
					$("#ptext").css('display','block');
					getPage(1);
				});
				//城市
				$("#js_provList li ul li a").live("click",function(e){
					city = $(this).attr("city");
					province=provincetxt
					ptext = ptext +$(this).html();
					$("#ptext em").html(ptext);
					$("#ptext").css('display','block');
					getPage(1);
				});
				$("#province1 a,#province2 a,#typev a,#price a,#ord a").live("click",function(e){
					var id = $(e.target).parent().attr("id");
					switch (id){
						case "province":

							break;
						case "province1":
							$("#province").show();
							$("#province2").hide();
							city = "";
							province = $(this).attr("province");
							ptext = $(this).html();
							$("#ptext em").html(ptext);
							$("#ptext").css('display','block');
							break;
						case "province2":

							province = $(this).attr("province");
							city=	 $(this).attr("city");
							ptext = $(this).html();
							$("#ptext em").html(ptext);
							$("#ptext").css('display','block');
							break;
						case "typev":
							typev = $(this).attr("msgtype");
							typetext = $(this).html();
							$("#typetext em").html(typetext);
							$("#typetext").css('display','block');
							break;
						case "price":
							pricestar = $(this).attr("starpro");
							priceend = $(this).attr("endpro");
							mtext = $(this).html();
							$("#mtext em").html(mtext);
							$("#mtext").css('display','block');
							break;
						case "ord":
							ord = $(this).attr("ord");
							break;
					}
					if(ord==""){
						$("#"+id).find("a").removeClass("curr up");
						$("#"+id).find("a").removeClass("curr down");
						$(this).addClass("curr up");
					}else if(ord==1){
						$("#"+id).find("a").removeClass("curr up");
						$("#"+id).find("a").removeClass("curr down");
						$(this).addClass("curr up");
						$(this).attr("ord",2)
					}else if(ord==2){
						$("#"+id).find("a").removeClass("curr up");
						$("#"+id).find("a").removeClass("curr down");
						$(this).addClass("curr down");
						$(this).attr("ord",1)
					}
					getPage(1);
				});
				$("#cprovince").live("click",function(){
					$("#province").hide();
					$("#province2").show();
				});

				getPage(1);

			})
			function getPage(page) {
				var keyword = $(".search_text").val();
				$.get(url_ajax, {search: keyword,province: province,type:typev,psta:pricestar,pend:priceend,ord:ord,City:city, p: page}, function(data) {
					$('#ajax_lists').html(data);
				})
			}
		</script>
	</body>
</html>