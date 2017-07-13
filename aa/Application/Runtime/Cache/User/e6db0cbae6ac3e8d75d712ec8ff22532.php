<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="<?php echo ($_SESSION['keyword']['keyword']); ?>" />
		<meta name="description" content="<?php echo ($_SESSION['keyword']['desc']); ?>" />
		<link rel="icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="//www.3qqq.com/static/images/bitbug_favicon.ico" mce_href="//www.3qqq.com/static/images/bitbug_favicon.ico" type="image/x-icon" />
		<title>待办事项</title>
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/mui.min.css');?>">
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/user.css');?>" />
		<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/mobile/style/iconfont.css');?>" />
		<meta name="viewport" id="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<script src="<?php echo tempurl('//www.3qqq.com/static/mobile/js/jquery-1.7.2.min.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/mobile/js/mui.min.js');?>"></script>

	</head>

	<body>
		<div class="user">

			<div class="main">

				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="order-list">
					<ul>
						<li><span class="num">项目名称：<?php echo ($vo["title"]); ?></span> <em class="i-info"><?php echo ($vo["AssetsStatue"]); ?></em></li>
						<li>
							<span>类别：<?php echo empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?"":"资产包"):"实物资产"):"债权";?></span>
							<span class="line">|</span> <span>处置方式：<?php echo ($vo['promodel']=="2"?"质押":($vo['promodel']=="1"?"转让":"转让/质押")); ?></span><em ></em>
						</li>
						<li><span>联系人：<?php echo ($vo["Contact"]); ?></span> <span class="line">|</span> <span>联系电话：<?php echo ($vo["mobile"]); ?></span></li>
						<li class="btn">
							<?php if(session('user.MemberType') == 4): if(($vo['source'] == 1)): elseif($vo['source'] == 6): ?>
									<a href="<?php echo U('Home/lists/content',array('AssetsIDrent'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" >查看信息</a>
									<?php else: ?>
									<a href="<?php echo U('Home/lists/content',array('AssetsID'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" >查看信息</a><?php endif; ?>
								<?php if( ($vo['Statue'] < 3)): if(($vo['OptType'] == 1) OR ($vo['Statue'] == 2)): ?><a href="">请在电脑端上传尽调</a>
										<a href="<?php echo empty($vo['AssetsID'])?(empty($vo['PackageID'])?Qiniu_Sign($jdmodel[2]['CodeValue']):Qiniu_Sign($jdmodel[0]['CodeValue'])):Qiniu_Sign($jdmodel[1]['CodeValue']);?>" target="_parent">下载模板</a>
										<?php elseif($vo['Statue'] == 1): ?>
										<if condition="($vo['source'] eq 1)">

											<?php elseif($vo['source'] == 6): ?>
											<a href="<?php echo U('User/logic/todocomit',array('AssetsIDrent'=>$vo['AssetsID']));?>" >接单</a>
											<a href="<?php echo U('User/logic/todocomit',array('AssetsIDrent'=>$vo['AssetsID'],'type'=>'cancel'));?>">拒绝</a>
											<?php else: ?>
											<a href="<?php echo U('User/logic/todocomit',array('AssetsID'=>$vo['AssetsID']));?>" >接单</a>
											<a href="<?php echo U('User/logic/todocomit',array('AssetsID'=>$vo['AssetsID'],'type'=>'cancel'));?>">拒绝</a><?php endif; endif; ?>
								<?php elseif(session('user.MemberType') == 3): ?>
								<?php if(($vo['source'] == 1)): elseif($vo['source'] == 6): ?>
									<a href="<?php echo U('User/Common/zzr',array('AssetsIDrent'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_parent">选择经济人</a>
									<?php else: ?>
									<a href="<?php echo U('User/Common/zzr',array('AssetsID'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_parent">选择经济人</a><?php endif; endif; ?>
						</li>
					</ul>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>

				
				
				
				
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


	</body>

</html>