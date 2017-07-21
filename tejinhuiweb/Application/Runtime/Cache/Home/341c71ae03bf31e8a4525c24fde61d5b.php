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
<div class="changecity">
	<div class="nav">
		<div class="navbar-l">
			<a href="javascript:history.go(-1)"><i class="icon-back"> </i></a>
		</div>
		<div class="navbar-m">选择城市</div>

	</div>

	<div class="hot">
		<div class="title">热门城市</div>
		<div class="con">
			<ul>
				<?php if(is_array($cpro)): $i = 0; $__LIST__ = $cpro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cprovo): $mod = ($i % 2 );++$i;?><li>
					<a href="<?php echo U('Home/Lists/lists',array('province'=>$cprovo['pid'],City=>$cprovo['area_id']));?>"><?php echo ($cprovo["area_name"]); ?></a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
				<li>
					<a href="<?php echo U('Home/Lists/lists');?>">全国</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="mui-content">
		<div class="mui-card">
			<ul class="mui-table-view">
				<?php if(is_array($area)): $i = 0; $__LIST__ = $area;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arvo): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-collapse">
					<a class="mui-navigate-right" href="#"><?php echo ($arvo["name"]); ?></a>
					<div class="mui-collapse-content">
						<ul>
							<?php if(is_array($arvo["city"])): $i = 0; $__LIST__ = $arvo["city"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ctiyvo): $mod = ($i % 2 );++$i;?><li>
									<a href="<?php echo U('Home/Lists/lists',array('province'=>$arvo['id'],City=>$ctiyvo['id']));?>" city="35"><?php echo ($ctiyvo["name"]); ?></a>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>

</div>
<!--<script>
    $(".city").CityPicker();
</script>
</body>-->

</html>