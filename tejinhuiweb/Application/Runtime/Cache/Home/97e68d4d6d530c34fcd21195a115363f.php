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

		<div class="main">
			
			<div class="search_main">


				<div class="hot">
					<dl>
						<dt class="address">地区：</dt>
						<dd>
							<div class="h_chooselist" >
								<div class="info1" id="province1">
									<a href="javascript:void(0)"  class="select_all" province="">全国</a>
											<?php if(is_array($cpro)): $i = 0; $__LIST__ = $cpro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$acvo): $mod = ($i % 2 );++$i;?><span><em><a href="javascript:void(0)" class="province2" target="art" province="<?php echo ($acvo["pid"]); ?>" city="<?php echo ($acvo["area_id"]); ?>"><?php echo ($acvo["area_name"]); ?></a></em> <i></i></span><?php endforeach; endif; else: echo "" ;endif; ?>

								</div>
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
							</div>
						</dd>
					</dl>

					<dl>
						<dt>类别：</dt>
						<dd>
							<div class="h_chooselist" >
								<div class="info2" id="typev">
								<ul id="js_provList1">
									<li><span><a href="javascript:void(0)"  class="select_all" msgtype="">全部</a></span></li>
									<li>
										<span><a href="javascript:void(0)"  msgtype="11" >转让</a></span>
										<ul>
											<li><a href="javascript:void(0)" AssetsType="1">房产</a></li>
											<li><a href="javascript:void(0)" AssetsType="5">土地</a></li>
											<li><a href="javascript:void(0)" AssetsType="2">车辆</a></li>
											<li><a href="javascript:void(0)" AssetsType="3">机械设备</a></li>
											<li><a href="javascript:void(0)" AssetsType="4">其他</a></li>


										</ul>
									</li>
									<li><span><a href="javascript:void(0)"  msgtype="15">出租</a></span></li>
									<!--<li><span><a href="javascript:void(0)"  msgtype="12">债权</a></span></li>-->
									<!--<li><span><a href="javascript:void(0)"  msgtype="13">资产包</a></span></li>-->
									<!--<li><span><a href="javascript:void(0)"  msgtype="14">拍卖</a></span></li>-->



								</ul>

							</div>



							</div>
							<!--<div class="h_chooselist" id="typev">-->

								<!--<a href="javascript:void(0)"  class="select_all" msgtype="">全部</a>-->
								<!--<?php if(is_array($messagetype)): $i = 0; $__LIST__ = $messagetype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$typev): $mod = ($i % 2 );++$i;?>-->
									<!--<a href="javascript:void(0)"  msgtype="<?php echo ($typev["CodeID"]); ?>"><?php echo ($typev["CodeName"]); ?></a>-->
								<!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
							<!--</div>-->
						</dd>
					</dl>

					<dl>
						<dt>转让价格：</dt>
						<dd>
							<div class="h_chooselist" id="price">
								<a href="javascript:void(0)"  starpro="0" endpro="0" class="select_all">不限</a>
								<a href="javascript:void(0)" starpro="500" endpro="1000">500万-1000万</a>
								<a href="javascript:void(0)"  starpro="1001" endpro="3000">1001万-3000万</a>
								<a href="javascript:void(0)"  starpro="3001" endpro="10000">3001万-1亿</a>
								<a href="javascript:void(0)"  starpro="10000" endpro="400000">1亿以上</a>
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
						<b>价格：</b>
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

		<script type="text/javascript">
			var url_ajax = "/Home/Search/orders",pricestar,priceend,typev="<?php echo I('get.type');?>",province=<?php echo empty($provinec)?"''":$provinec;?>,provincetxt,ord,city=<?php echo empty($City)?"''":$City;?>,typetest,AssetsType;
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
				//城市
				$('#js_provList1 li ').mouseover(function(){
					$(this).children('ul').css('display','block')
					typetest = $(this).children('span').children('a').attr("msgtype");
					typetext =  $(this).children('span').children('a').html();
				})


				$('#js_provList1 li').mouseout(function(){
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
						case "typetext":
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
				$("#js_provList li span a").on("click",function(e){
					province = $(this).attr("province");
					city ="";
					ptext = $(this).html();
					$("#ptext em").html(ptext);
					$("#ptext").css('display','block');
					getPage(1);
				});
				//城市
				$("#js_provList li ul li a").on("click",function(e){
					city = $(this).attr("city");
					province=provincetxt
					ptext = ptext +$(this).html();
					$("#ptext em").html(ptext);
					$("#ptext").css('display','block');
					getPage(1);
				});

				//quanguo1111111111111111111
				$("#js_provList1 li span a").on("click",function(e){
					typev = $(this).attr("msgtype");
					console.log(1111);
					AssetsType ="";
					typetext = $(this).html();
					$("#typetext em").html(typetext);
					$("#typetext").css('display','block');
					getPage(1);
				});
				//城市
				$("#js_provList1 li ul li a").on("click",function(e){
					AssetsType = $(this).attr("AssetsType");
					typev=typetest
					typetext = typetext +$(this).html();
					$("#typetext em").html(typetext);
					$("#typetext").css('display','block');
					getPage(1);
				});

				$("#ajax_lists").on("click",".searlist a",function(){
  					var onsral = $(this);
					if(onsral.attr("province") !=undefined){
						province=onsral.attr("province");
						ptext = onsral.html();

					}
					if(onsral.attr("city") !=undefined){
						city = onsral.attr("city");
						if(onsral.attr("ptext")!=undefined){
							ptext = onsral.attr("ptext");
						}
						$("#ptext em").html(ptext);
						$("#ptext").css('display','block');
					}
					if(onsral.attr("msgtype") !=undefined){
						typev =onsral.attr("msgtype");
						typetext = onsral.html()
						$("#typetext em").html(typetext);
						$("#typetext").css('display','block');
					}


					getPage(1);
					//alert( typev);
				});

				$("#province1 a,#province2 a,#typev a,#price a,#ord a").on("click",function(e){
					var id = $(e.target).parent().attr("id");
					if(id==undefined){
						id = e.target.className;
					}
					//alert(e.target.className);
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
				$("#cprovince").on("click",function(){
					$("#province").hide();
					$("#province2").show();
				});

				getPage(1);

			})
			function getPage(page) {
				var keyword = $(".search_text").val();
				$.get(url_ajax, {search: keyword,province: province,type:typev,psta:pricestar,pend:priceend,ord:ord,City:city,AssetsType:AssetsType, p: page}, function(data) {
					$('#ajax_lists').html(data);
				})
			}
		</script>
	</body>
</html>