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
<link rel="stylesheet" href="<?php echo tempurl('/static/style/user.css');?>" />
		<!-- header end -->

		<div class="main">

			<div class="member_bg">
				<div class="member_bg1"></div>
				<div class="member_con">
					<!--<div class="iconfont">&#xe615;</div>-->
					<div class="fl">
						<div class="man"><img src="/static/images/user/man_03.jpg"></div>
<div class="member_left">
    <h2>会员中心</h2>
    <ul>
        <li><a href="<?php echo U('User/Common/memberindex');?>" target="frammain"><i class="icon iconfont">&#xe606;</i>我的账户</a></li>
        <li><a href="<?php echo U('User/Common/ordermgt');?>" target="frammain"><i class="icon iconfont">&#xe603;</i>订单管理</a></li>
        <li><a href="<?php echo U('User/Common/todo');?>" target="frammain"><i class="icon iconfont">&#xe631;</i>待办事项</a></li>
        <li><a href="<?php echo U('User/Common/mypublish');?>" target="frammain"><i class="icon iconfont">&#xe673;</i>我的发布</a></li>
        <li><a href="<?php echo U('User/Common/drawmgt');?>" target="frammain"><i class="icon iconfont">&#xe601;</i>提现管理</a></li>
        <li><a href="<?php echo U('User/Common/card');?>" target="frammain"><i class="icon iconfont">&#xe602;</i>个人名片</a></li>
        <li><a href="<?php echo U('User/Common/suggesstion');?>" target="frammain"><i class="icon iconfont">&#xe615;</i>投诉建议</a></li>
        <li><a href="<?php echo U('User/Member/logout');?>"><i class="icon iconfont">&#xe660;</i>退出登录</a></li>
    </ul>
</div>

					</div>
					<div class="iframe">
						<iframe id="frammain"  name="frammain" src="<?php echo empty(session('login_http_member'))?U('User/Common/memberindex'):session('login_http_member');?>" width="100%"  frameborder="no" border="0" scrolling="no" onload="iFrameHeight(this)">
	
						</iframe>
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


		
		<div class="mask" id="mask">
	<div class="popups clearfix">
		<h2>请选择支付方式：</h2>
		<div class="bg">
			<div class="con">
				<ul>
					<li><input type="radio" name="ownertype" value="1" />
						<label><img src="/static/images/user/user_07.png"></label></li>
					<li><input type="radio" name="ownertype" value="2" />
						<label><img src="/static/images/user/user_10.png"></label></li>
				</ul>
			</div>
			<div class="btn">
				<a href="">前往支付</a>
			</div>
		</div>

		<div class="close">关闭</div>
	</div>
</div>

		<script>	
        function iFrameHeight() {
            var ifm = document.getElementById("frammain");
            var subWeb = document.frames ? document.frames["frammain"].document :
            ifm.contentDocument;
            if (ifm != null && subWeb != null) {
                ifm.height = subWeb.body.scrollHeight;
            }
        }
		$(function() {
				$('input[name=ownertype').click(function() {
					$(this).parents('ul').find('li').removeClass('red');
					$(this).parent('li').addClass('red');
				});


			})
    
			</script>

	</body>

</html>