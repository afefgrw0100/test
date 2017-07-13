<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="ui-page-login">

	<head>
		<meta charset="utf-8">
		<meta name="keywords" content="<?php echo ($_SESSION['keyword']['keyword']); ?>" />
		<meta name="description" content="<?php echo ($_SESSION['keyword']['desc']); ?>" />
		<link rel="icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
		<title><?php echo ($_SESSION['keyword']['title']); ?></title>
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/mui.min.css');?>">
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/style.css');?>" />
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/iconfont.css');?>" />
		<meta name="viewport" id="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<script src="<?php echo tempurl('//www.3qqq.com/static/mobile/js/jquery-1.7.2.min.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/mobile/js/mui.min.js');?>"></script>
		<style>
			body {
				background: #f8f8f8;
			}
		</style>

	</head>

	<body>
		<div class="search">
			<div class="main">
				<div class="top">
					<!--<div class="hot-city"><i class="iconfont">&#xe642;</i>热门城市</div>-->
					<!--<div class="search"><i class="iconfont">&#xe61b;</i><input type="text" placeholder="找项目"></div>-->
					<form action="<?php echo U('Home/Search/lists');?>" method="get" onsubmit="return search_text()">
					<div class="mui-input-row mui-search">

							<input type="search" class="mui-input-clear search_text" name="search" id="search_text" placeholder="找项目"  value="<?php echo ($search); ?>">

					</div>
					</form>
					<div class="nav-bar">
						<ul class="nav">
							<li data-type=0>
								<a href="<?php echo U('Home/Lists/mobilecity');?>"><i class="iconfont">&#xe642;</i>城市</a>
							</li>
							<li data-type='1' class="icon">类别</li>
							<li data-type='2' class="icon">价格</li>
						</ul>

						<div class="dropdown">
							<ul>
								<li class="li1">
									<ul>
										<li><span>长沙</span></li>
										<li><span>北京</span></li>
										<li><span>上海</span></li>
									</ul>
								</li>
								<li class="li1">
									<ul  id="typev">
										<li msgtype=""><span  >不限</span></li>
										<li msgtype="11"><span  >转让</span></li>
										<li msgtype="15"><span  >出租</span></li>
										<!--<li msgtype="14"><span  >拍卖</span></li>-->

									</ul>
								</li>
								<li class="li1">
									<ul id="price">
										<li  starpro="0" endpro="0" >不限制</li>
										<li  starpro="500" endpro="1000"><span>500万-1000万</span></li>
										<li   starpro="1001" endpro="3000"><span>1001万-3000万</span></li>
										<li  starpro="3001" endpro="10000"><span>3001万-1亿</span></li>
										<li  starpro="10000" endpro="400000"><span>1亿以上</span></li>


									</ul>
								</li>
							</ul>

						</div>
					</div>

				</div>

				<div class="search-list">
					<div class="pro-maks"></div>
					<ul class="mui-table-view" id="ajax_lists">



					</ul>

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
    function search_text(){
        var rcc = $(".search_text").val();
        console.log(111);
        if(rcc==""){
            return false;
        }else {
            return true;
        }

    }
</script>
<!-- 站长统计开始  -->
<div style="display:none">
    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259609671'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1259609671' type='text/javascript'%3E%3C/script%3E"));</script>
</div>
<!-- 站长统计结束  -->



		<script type="text/javascript">
			$('.nav li').click(function() {
				$('.dropdown ul li.li1 ul').slideUp(400);
				var type = $(this).attr('data-type');
				//console.log(type); 
				if($(this).hasClass('active')) {
					$('.nav li').removeClass('active');
					$('.pro-maks').hide();
					$('.dropdown ul li.li1').eq(type).find('ul').slideUp(400);
				} else {
					//$('.nav li').removeClass('active');
					$(this).addClass('active').siblings().removeClass('active');
					$('.pro-maks').show();
					$('.dropdown ul li.li1').eq(type).find('ul').slideDown(400);
				}
			});
			$('.pro-maks').click(function(){
				$('.dropdown ul li.li1 ul').slideUp(400);
				$('.pro-maks').hide();

			})
		</script>

		<script type="text/javascript">
			var url_ajax = "/Home/Search/orders",pricestar,priceend,typev=<?php echo empty($typevs)?"''":$typevs;?>,province=<?php echo empty($provinec)?"''":$provinec;?>,provincetxt,ord,city=<?php echo empty($City)?"''":$City;?>;
			var ptext,typetext,mtext;
			var pagesum = 1;
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
						case "typetext":
							typev="";
							break;
						case "mtext":
							pricestar="";
							priceend="";
							break;

					}
					$(this).parent().css('display','none');
					pagesum = 1;
					getPage(1);
				})
				//分页
				$("#ajax_lists").delegate(".page div a", "click", function() {
					var page = $(this).attr("data-page");
					pagesum = 1;
					getPage(page);
				});
				//quanguo
				$("#js_provList li span a").on("click",function(e){
					province = $(this).attr("province");
					city ="";
					ptext = $(this).html();
					$("#ptext em").html(ptext);
					$("#ptext").css('display','block');
					pagesum = 1;
					getPage(1);
				});
				//城市
				$("#js_provList li ul li a").on("click",function(e){
					city = $(this).attr("city");
					province=provincetxt
					ptext = ptext +$(this).html();
					$("#ptext em").html(ptext);
					$("#ptext").css('display','block');
					pagesum = 1;
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

					pagesum = 1;
					getPage(1);
					//alert( typev);
				});

				$("#province1 a,#province2 a,#typev li,#price li,#ord a").on("click",function(e){

					$('.nav li').removeClass('active');
					$('.pro-maks').hide();
					$(this).parent().slideUp(400);

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
					pagesum = 1;
					getPage(1);
				});
				$("#cprovince").on("click",function(){
					$("#province").hide();
					$("#province2").show();
				});

				getPage(pagesum);
				$(window).scroll(function(){
					var scrollTop = $(this).scrollTop();
					var scrollHeight = $(document).height();
					var windowHeight = $(this).height();
					if(scrollTop + windowHeight == scrollHeight){
						pagesum=pagesum+1;
						getPage_load(pagesum);
						//alert(datahtml);
					}
				});

			})



			function getPage(page) {
				var keyword = $("#search_text").val();
				$.get(url_ajax, {search: keyword,province: province,type:typev,psta:pricestar,pend:priceend,ord:ord,City:city, p: page}, function(data) {
					$('#ajax_lists').html(data);
					sandnum();
				})
			}

			function getPage_load(page) {
				//console.log(page);
				var keyword = $("#search_text").val();
				var htmldata = "";
				$.get(url_ajax, {search: keyword,province: province,type:typev,psta:pricestar,pend:priceend,ord:ord,City:city, p: page}, function(data) {
					$('#ajax_lists').append(data);
					sandnum();
				});

			}
			function sandnum(){
				var numi = $(".numtenhousand").size();
				var pagenum = (pagesum-1)*10;

				for(var i=pagenum;i<numi;i++){
					var numtenthousand = parseInt($(".numtenhousand:eq("+i+")").html());

					if(numtenthousand>10000){
						numtenthousand = Math.round((numtenthousand /10000) * 100) / 100;
						numtenthousand = numtenthousand + "万";
						$(".numtenhousand:eq("+i+")").html(numtenthousand);
					}
				}
			}
		</script>
	</body>

</html>