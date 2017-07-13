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
                <form action="<?php echo U('Web/Search/lists');?>" method="post">
                <input type="text" class="search_text" name="search" placeholder="找项目">
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
                        <a href="<?php echo U('Web/Lists/lists');?>">优质项目 </a>
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
			
			<div class="search_main">
				<?php if(!empty($search)): ?><div class="mbx">为您找到<em><?php echo ($search["sum"]); ?>条“<?php echo ($search["tit"]); ?>”</em>搜索结果</div>
					<?php else: endif; ?>

				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="box">
					<div class="fl pic"><img src="http://placehold.it/180x140"></div>
					<div class="fl con">
						<div class="info1"><b><?php echo ($vo["title"]); ?></b> <em><a href="<?php echo U('Web/lists/content',empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?'':array('PackageID'=>$vo['PackageID'])):array('AssetsID'=>$vo['AssetsID'])):array('DebtID'=>$vo['DebtID']));?>">查看详情</a></em></div>
						<div class="info2">
							<span><b>项目类型</b><em><?php echo empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?"":"资产包"):"实物资产"):"债权";?></em></span>
							<span><b>逾期时间</b><em><?php echo ($vo["daytime"]); ?></em></span>
							<span><b><?php echo empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?"":"资产包总金额"):"资产金额"):"债权金额";?></b><em class="money">¥<i class="info_num"><?php echo ($vo["total"]); ?></i></em></span>
							<span><b><?php echo ($vo['promodel']=="2"?"质押金额":"转让金额"); ?></b><em class="money2">¥<i class="info_num"><?php echo ($vo["proprice"]); ?></i></em></span>
							<span class="address"><b>所在地</b><em><?php echo ($vo["adress"]); ?><i class="iconfont">&#xe639;</i></em></span></div>
					</div>
					
					<div class="fl click">
						<div class="info1"><b>目前进度</b> <em>已完成尽调</em></div>
						<div class="info1"><b>折扣率</b> <em>50%</em></div>
						<div class="btn">点击查询</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="page">
					<?php echo ($page); ?>
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

	</body>
</html>