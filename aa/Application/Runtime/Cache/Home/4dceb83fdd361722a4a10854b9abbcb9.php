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
	<div class="introduce">
		<div class="banner"></div>

		<div class="main_c">
			<div class="info1">
				<div class="title">一、平台产品与服务</div>
				<div class="severs">
					<div class="fl"><img src="//www.3qqq.com/static/images/common/introduce_05.jpg"></div>
					<div class="fr">
						特金汇是一个特殊资产共享合伙平台。平台以用户需求为发展导向，发现需求，满足需求，通过平台模式共享大数据资源，让项目信息流转变得简单、高效、放心。平台率先创立城市合伙人模式，城市合伙人为项目提供线下尽职调查服务，并出具详细尽调报告，线下撮合成交，保证平台上线项目真实、合法、具备操作性。通过平台授权的城市合伙人共享平台资源、共拓共创亿万蓝海。
					</div>

				</div>

				<div class="part1">
					<div class="title">真正让客户放心 互联网+特殊资产 O2O</div>
					<div class="con">
						<ul>
							<li>
								<span>事业部前期拓展</span>
								<b>1</b>
								<em>项目达成平台上线、对接以及勘察</em>
							</li>
							<li>
								<span>线上项目快速传播</span>
								<b>2</b>
								<em>项目第一时间通过特金汇平台发放出去，让项目第一时间在各大平台上展现，“缩短周期”迅速扩散</em>
							</li>
							<li>
								<span>线下直营店一对一项目服务</span>
								<b>3</b>
								<em>尽职报告撰写、市场调研分析等等，最后促使成交</em>

							</li>
						</ul>
					</div>
				</div>

				<div class="part2" style=" width: 1070px;">

					<div class="video-img" id="video-img" onclick="playPause()">
						<img src="//www.3qqq.com/static/images/common/vedio_03.jpg"></div>

				</div>


			</div>

			<div class="info2">
				<div class="title">二、满足三方需求，实现三方共赢</div>
				<div class="con">
					<div class="pic"><img src="//www.3qqq.com/static/images/common/introduce_09.jpg"></div>
					<div class="part1">
						<b>项目投资方</b>
						<p>花最少的钱购买最合适自己的资产</p>
						<p>购买具有真实、合法、可操作性的资产</p>

					</div>

					<div class="part2">
						<b>城市合伙人</b>
						<p>实地尽职调查报告</p>
						<p>发布大宗物业项目</p>
						<p>从大宗物业处置过程中获得收益</p>
						<p>简单方便快捷的业务模式</p>
					</div>


					<div class="part3">
						<b>项目持有方</b>
						<p>快速出让大宗物业，实现快速变现</p>


					</div>

				</div>
			</div>

			<div class="info3">
				<div class="title">三、便捷流程，促使项目快速流转及质押融资</div>
				<div class="con">
					<div class="part">
						<b>项目持有方：</b>
						<p><img  src="//www.3qqq.com/static/images/common/intro1_07.jpg"></p>
					</div>
					<div class="part">
						<b>特资经纪人：</b>
						<p><img  src="//www.3qqq.com/static/images/common/intro1_11.jpg"></p>
					</div>

					<div class="part">
						<b>项目投资方：</b>
						<p><img  src="//www.3qqq.com/static/images/common/intro1_15.jpg"></p>
					</div>
				</div>
			</div>

			<div class="info4">
				<div class="title">四、专业定制级项目信息发布</div>
				<div class="con">
					<div class="fl"><img src="//www.3qqq.com/static/images/common/introduce_13.jpg"></div>
					<div class="fr">
								<span>
									<i>1</i>
									<b>自主选择</b>
									<em>项目持有方线上根据地域分布，选择当地城市合伙人为其服务。</em>
								</span>

								<span>
									<i>2</i>
									<b>快速响应</b>
									<em>24小时内城市合伙人与项目持有方进行线下对接。</em>
								</span>

								<span>
									<i>3</i>
									<b>定制方案</b>
									<em>但项目专业尽职调查、实地看样、提供项目操作方案与项目盈利分析。</em>
								</span>

								<span>
									<i>4</i>
									<b>三级审核</b>
									<em>三级审核 线上初审、线下复审、平台终审、确保项目真实性、合法性、操作性。</em>
								</span>

					</div>
				</div>
			</div>
		</div>

	</div>



</div>

<div class="mask" id="mask" onclick="playPause()">
	<div class="video">
		<div class="video_c">
			<video id="video" width="1070" src="http://static.resource.tejinhui.com/tejinhui.mp4" controls="controls"></video>
		</div>
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
	function playPause() {
		var myVideo = document.getElementsByTagName('video')[0];
		if(myVideo.paused) {
			myVideo.play();
		} else {
			myVideo.pause();
		}
	}
</script>

<script>
	$("#video-img").click(function() {
		$(".mask").show();
		return false;
	})

	$("#mask").click(function() {
		$(".mask").hide();

	})
</script>

</body>
</html>