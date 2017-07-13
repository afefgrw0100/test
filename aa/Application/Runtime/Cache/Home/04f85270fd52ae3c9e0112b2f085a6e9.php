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
                        <a href="<?php echo U('Home/Index/baem',empty(session('user.MemberId'))?'':array('uic'=>authcode(session('user.MemberId'),'ENCODE')));?>">成为经纪人</a>
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
                    <a href="<?php echo U('User/Member/region');?>" class="region">注册</a>
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
	<div class="insurance">
		<div class="banner"></div>
		<div class="info1">
			<div class="title">一.项目安全保障</div>
			<div class="item">所有上线项目均经过特金汇风控部门进行严格审核，选择同城特资经纪人进行线下尽职调查，对项目进行客观评估，
				并通过特金汇二次审核才能正式上线。一个项目的诞生，要经过8道关口，层层筛选，层层剥离风险敞口。</div>
			<div class="btn">流程</div>
			<div class="con">
				<ul>
					<li>
						<b><img src="//www.3qqq.com/static/images/common/aq_icon1.png"></b>
						<em>资料审查</em>
						<span>审核项目基础资料，确定项目资料的真实性。</span>

					</li>
					<li>
						<b><img src="//www.3qqq.com/static/images/common/aq_icon2.png"></b>
						<em>项目调研</em>
						<span>了解项目成因及来源的调查与分析。</span>

					</li>
					<li>
						<b><img src="//www.3qqq.com/static/images/common/aq_icon3.png"></b>
						<em>尽职调查</em>
						<span>同城特资经纪人进行线下尽调，确定项目操作可行性。</span>
					</li>
					<li>
						<b><img src="//www.3qqq.com/static/images/common/aq_icon4.png"></b>
						<em>市场分析</em>
						<span>资产项目/抵押物的同期、同类市场价格调研与分析。</span>

					</li>
					<li>
						<b><img src="//www.3qqq.com/static/images/common/aq_icon5.png"></b>
						<em>预案设计</em>
						<span>展现项目亮点与风险，根据项目实际情况设计风险防控预案。</span>

					</li>
					<li>
						<b><img src="//www.3qqq.com/static/images/common/aq_icon6.png"></b>
						<em>盈利分析</em>
						<span>提供项目操作成本控制方案与项目盈利分析。</span>

					</li>
					<li>
						<b><img src="//www.3qqq.com/static/images/common/aq_icon7.png"></b>
						<em>二次审查</em>
						<span>审核特资经纪人尽调报告完整性。</span>
					</li>
					<li>
						<b><img src="//www.3qqq.com/static/images/common/aq_icon8.png"></b>
						<em>售后保障</em>
						<span>保障尽调报告所述项目未与其他第三方完成交易。</span>

					</li>
				</ul>

			</div>
		</div>

		<div class="info2">
			<div class="title">二.项目审核</div>
			<div class="con">
				<div class="fl">
					<div class="item">三重高标准审核</div>
					<div class="pic"><img src="//www.3qqq.com/static/images/common/aq_man_03.jpg"></div>
				</div>
				<div class="fr">
					<div class="box">
						<div class="item">特金汇第一重审核</div>
						<span><i></i><b>根据上传的项目资料审核项目真实性，初步确定项目具备操作性。</b></span>
					</div>

					<div class="box">
						<div class="item">特资经纪人线下第二重审核</div>
						<span><i class="iconfont">&#xe695;</i><b>真实性核查：</b><em>全面核查项目资料完整性、真实性、合法性，了解项目形成原因。</em></span>
						<span><i class="iconfont">&#xe695;</i><b>可行性核查：</b><em>核查项目是否具备操作性，分析操作难度。</em></span>
						<span><i class="iconfont">&#xe695;</i><b>现场走访：</b><em>现场核查资产/抵押物最新状况、评估当前价值、周边情况摸底。</em></span>
						<span><i class="iconfont">&#xe695;</i><b>网搜调查：</b><em>通过网络搜索资产/债务人相关情况，工商、司法、拍卖等信息。</em></span>
						<span><i class="iconfont">&#xe695;</i><b>风险分析：</b><em>根据尽调结果，分析项目风险点，设计风险防控预案。</em></span>
						<span><i class="iconfont">&#xe695;</i><b>项目盈利分析：</b><em>分析项目处置成本、处置周期、变现能力、资金成本，设计盈利模型。</em></span>

					</div>

					<div class="box">
						<div class="item">特金汇第三重审核</div>
						<span><i class="iconfont">&#xe695;</i><b>审核特资经纪人所撰写的尽调报告完整性、合理性，杜绝弄虚作假，保证上线的每个项目都能够进行线下对接。</b></span>
					</div>
				</div>
			</div>
		</div>

		<div class="info3">
			<div class="title">三.网站建设</div>
			<div class="con">
				<ul>
					<li>
						<span><i class="iconfont">&#xe608;</i><b>资金安全</b></span>
						<p>特金汇采用微信支付系统，让用户每一分钱流向都高度透明，保障平台用户资金安全。</p>
					</li>
					<li>
						<span><i class="iconfont">&#xe60a;</i><b>数据安全</b></span>
						<p>采用国际标准的SSL传输方式+256位加密技术保障数据信息安全；私有云和公有云结合对网站资源的保护；数据库采用自研算法对用户密码等信息进行加密；数字安全证书；经验丰富的技术团队为资金保驾护航。</p>
					</li>

					<li>
						<span><i class="iconfont">&#xe620;</i><b>隐私安全</b></span>
						<p>特金汇上所有的隐私信息都经过 MD5加密处理，防止任何人包括公司员工非法获取用户信息。除法律法规规定情况外，特金汇不在任何情况下出售、出租或以任何非法形式泄漏您的信息。</p>

					</li>

				</ul>
			</div>
		</div>

		<div class="info4">
			<div class="title">四.协同保障</div>
			<div class="con">
				<p>记住官方网址：特金汇的官方网址为www.tejinhui.com，不要点击来历不明的链接访问网站，谨防网站钓鱼和欺诈，并建议您将特金汇官方网址加入浏览器收藏夹，以方便您下次访问。</p>

				<i>1</i>
			</div>

			<div class="con">
				<p>做好密码保护：在设置登录密码和安全密码时，密码不要有一定的规律，密码长度要在6位以上，最好是数字和字母结合。定期修改密码，防止密码泄露。</p>

				<i>2</i>
			</div>

			<div class="con">
				<p>加强安全防护：及时为您的电脑进行系统更新、安装安全补丁，以防系统漏洞被黑客利用。安装杀毒软件或防火墙，并定期为电脑进行查毒、杀毒。</p>

				<i>3</i>
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
                    <a href="<?php echo U('Home/Index/about');?>">关于特金汇 </a>
                    <a href="<?php echo U('Home/Index/safe');?>">安全保障</a>
                    <a href="<?php echo U('Home/Index/lagel');?>">法律政策 </a>
                    <a href="<?php echo U('Home/Index/buypro1');?>">特资经纪人申请协议</a>
                    <a href="<?php echo U('Home/Index/buypro2');?>">特资经纪人管理办法</a>

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

	</body>
</html>