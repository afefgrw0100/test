<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="ui-page-login">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
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
		<div class="home">
			<div class="main">
			<div class="top">
				<div class="hot-city"><i class="iconfont">&#xe642;</i><a href="<?php echo U('Home/Lists/mobilecity');?>">热门城市</a></div>
				<!--<div class="search"><i class="iconfont">&#xe61b;</i><input type="text" placeholder="找项目"></div>-->
				<form action="<?php echo U('Home/Search/lists');?>" method="get" onsubmit="return search_text(this)">
				<div class="mui-input-row mui-search">

					<input type="search" class="mui-input-clear search_text" name="search" placeholder="找项目"  value="<?php echo ($search); ?>">

				</div>
				</form>
			</div>
			<div class="banner">
				<!--<img src="images/temp/index_02.jpg">-->
					<div id="slider" class="mui-slider" >
			<div class="mui-slider-group mui-slider-loop">
				<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="<?php echo ($imgvo["0"]["url"]); ?>">
						<img src="<?php echo C('IMGPATH').'/'.$listimg[0]['path'];?>?imageView/2/w/640">
					</a>
				</div>

				<?php if(is_array($listimg)): $i = 0; $__LIST__ = $listimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imgvo): $mod = ($i % 2 );++$i;?><!-- 第一张 -->
					<div class="mui-slider-item banner_pic">
						<a href="<?php echo ($imgvo["url"]); ?>">
							<img src="<?php echo C('IMGPATH').'/'.$imgvo['path'];?>?imageView/2/w/640">
						</a>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="<?php echo ($imgvo["0"]["url"]); ?>">
						<img src="<?php echo C('IMGPATH').'/'.$listimg[0]['path'];?>?imageView/2/w/640">
					</a>
				</div>
			</div>
			<div class="mui-slider-indicator">
				<div class="mui-indicator mui-active"></div>
				<div class="mui-indicator"></div>
				<div class="mui-indicator"></div>
				<div class="mui-indicator"></div>
			</div>
		</div>
	

			</div>
		

				<div class="hot-project">
					<div class="title"><span><i></i><b>城市分站</b></span> <em><a href="/auclist">更多》</a></em></div>
					<div class="hot-city">
						<ul>
							<?php if(is_array($substation)): $i = 0; $__LIST__ = $substation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$stvo): $mod = ($i % 2 );++$i;?><li>
								<a href="/auc/<?php echo ($stvo["area_code"]); ?>">
								<div class="pic">
									<img src="<?php echo imgpublic($stvo['titleImg']);?>">
									<div class="text">
										<h3><?php echo ($stvo["title"]); ?></h3>
										<p>城市分站</p>
									</div>
								</div>
								</a>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
				</div>

				<div class="hot-project">
				<div class="title"><span><i></i><b>热门项目</b></span> <em><a href="<?php echo U('Home/Lists/lists');?>">更多》</a></em></div>
				<div class="con">
					<ul>
						<?php if(is_array($infoimg)): $i = 0; $__LIST__ = $infoimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$infoimgv): $mod = ($i % 2 );++$i;?><li>
							<?php if($infoimgv['AssetsStatue'] == 8): ?><div class="saled-icon"><img src="//static.resource.tejinhui.com/static/images/common/chengjiao.png"></div><?php endif; ?>
							<div class="items"><?php echo ($infoimgv["Title"]); ?></div>
							<div class="info">
								<div class="pic"><img src="<?php echo empty($infoimgv['titimg'])?'http://placehold.it/80x50':imgpublic($infoimgv['titimg']).'?imageView/2/w/80/h/50';?>"></div>
								<div class="viewcount"><span><i><?php echo empty($infoimgv['ViewCount'])?"0":$infoimgv['ViewCount'];?></i><em>人</em></span> <b> 浏览次数</b></div>
								<div class="viewcount"><span><i><?php echo empty($infoimgv['BuyCount'])?"0":$infoimgv['BuyCount'];?></i><em>次</em></span> <b>尽调购买</b></div>
								<div class="btn">
									<?php if($infoimgv['Source'] == 6): ?><a href="<?php echo U('Home/lists/content',array('AssetsIDrent'=>$infoimgv['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>">立即查看</a>
										<?php else: ?>
										<a href="<?php echo U('Home/lists/content',array('AssetsID'=>$infoimgv['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>">立即查看</a><?php endif; ?>

								</div>
								
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div></div>
		
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




		<script type="text/javascript" charset="utf-8">
			$(function(){
				var Length=$('.banner_pic').length;
				var Html='';
				for(var i=0;i<Length;i++){
					Html+='<div class="mui-indicator"></div>';
				}
				$('.mui-slider-indicator').html(Html);
				$('.mui-indicator:first').addClass('mui-active');


			})
			//			var slider = mui("#slider");
			//			slider.slider({
			//						interval: 5000
			//				});

		</script>

	</body>

</html>