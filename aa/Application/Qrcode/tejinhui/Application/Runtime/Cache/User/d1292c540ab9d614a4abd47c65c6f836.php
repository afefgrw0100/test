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
		<div class="main">
			<div class="pay">
				<h2>收银台</h2>
				<div class="list">
					<div class="title">
						<div class="name">项目</div>
						<div class="num">数量</div>
						<div class="num">价格</div>
						<div class="total">总计</div>
					</div>
					<div class="con">
						<div class="name"><?php echo ($info["Title"]); ?></div>
						<div class="num">1</div>
						<div class="price">¥<?php echo ($info["DealPrice"]); ?></div>
						<div class="total">¥<?php echo ($info["DealPrice"]); ?></div>
					</div>

				</div>
				<div class="total_price">
					应付金额:<em>¥<?php echo ($info["DealPrice"]); ?></em>
				</div>
				<div class="tel">
					<div class="title">您的手机</div>
					<div class="con">支付成功后，特金汇将发送到手机：<em><?php echo ($_SESSION['user']['CellPhone']); ?></em>，确认消费信息。</div>
				</div>
				<div class="pay_way">
					<div class="title">微信支付</div>
					<div class="con">
						<div class="fl">
							<!--<div class="info1 red">二维码已过期，<a href="">刷新</a> 页面重新获取二维码。</div>-->
							<div class="weixin_img"><img src="<?php echo U('User/payment/weixinpay_qrcode',array('codekey'=>$bas,'type'=>$type,codetype=>$codetype));?>"></div>
							<div class="info2">
								<p>请使用微信扫一扫</p>
								<p>扫描二维码支付</p>

							</div>
						</div>
						<div class="fr"><img src="/static/images/common/phone-bg.png"></div>
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
			$(function() {
				$('input[name=ownertype').click(function() {
					$(this).parents('ul').find('li').removeClass('red');
					$(this).parent('li').addClass('red');
				})
			})
		</script>

	</body>

</html>