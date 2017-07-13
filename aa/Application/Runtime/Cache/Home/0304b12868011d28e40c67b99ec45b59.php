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
	<div class="helps">
		<div class="banner"></div>
		<div class="con">
			<div class="info1">
				<div class="title">
					<span><h2><img src="//www.3qqq.com/static/images/common/zhinan_03.jpg"></h2></span>
					<div class="line"></div>
				</div>
				<div class="part1">
					<h2>特金汇能做什么？</h2>
					<div class="item">特金汇是一个特殊资产流转平台</div>
					<div class="content">
						<p>
							特金汇是一个特殊资产流转平台，平台招募全国各地志在从业特殊资产的人成为平台城市合伙人，为项目持有方提供项目推介、撮合对接等服务，帮助项目持有方实现项目快速对接。为项目投资方提供优质项目信息，详细的尽职调查报告，降低项目尽职调查成本，节省项目筛选的时间，提供方便的特殊资
						</p>
					</div>

				</div>
				<div class="part2">
					<div class="title">
						<h2>我们能够为您提供哪些服务</h2></div>
					<!--<div class="content">
                        <ul>
                            <li><b><img src="images/common/zn_icon_05.jpg"></b><span>债权质押融资</span></li>
                            <li><b><img src="images/common/zn_icon_07.jpg"></b><span>实物资产抵押融资</span></li>
                            <li><b><img src="images/common/zn_icon_09.jpg"></b><span>债权转让</span></li>
                            <li><b><img src="images/common/zn_icon_11.jpg"></b><span>实物资产转让</span></li>
                            <li><b><img src="images/common/zn_icon_13.jpg"></b><span>资产包转让</span></li>

                        </ul>
                    </div>-->

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
			</div>

			<div class="info1">
				<div class="title">
					<span><h2><img src="//www.3qqq.com/static/images/common/zhinan_06.jpg"></h2></span>
					<div class="line"></div>
				</div>
				<div class="part1">
					<h2>会员注册这点事</h2>
					<div class="content">
						<div class="section1">
							<h3><em>如何注册平台会员？</em><i class="iconfont"></i></h3>
							<div>特金汇平台的首页点击“会员中心-注册”，利用手机号码进行注册，根据提示填写基本信息，即可免费查看3次尽调报告。</div>
						</div>
						<div class="section1">
							<h3><em>如何成为平台城市合伙人？</em><i class="iconfont"></i></h3>
							<div>
								注册成为平台会员后，可在首页提交申请，填写个人相关信息，参加平台专业培训并考核通过后成为城市合伙人。即可招募特资经纪人团队，并发布项目信息以及上传尽职调查报告。共享平台大数据资方资源共创嘉业。
							</div>
						</div>


						<div class="section1">
							<h3><em>如何成为平台特资经纪人？</em><i class="iconfont"></i></h3>
							<div>注册成为平台会员后，可在首页提交申请，填写个人相关信息，参加平台专业培训并考核通过后成为特资经纪人。即可发布项目信息以及上传尽职调查报告。</div>
						</div>


						<div class="section1">
							<h3><em>收不到手机验证码？</em><i class="iconfont"></i></h3>
							<div>您确认点击了“免费获取校正短信”按钮后，1分钟内即可收到信息，如长时间未收到，确认信息未被手机软件拦截，可点击重新获取</div>
						</div>

						<div class="section1">
							<h3><em>平台用户名密码忘记怎么办？</em><i class="iconfont"></i></h3>
							<div>您可以使用手机号进行验证，重新设置新密码。我们也可以人工验证您的身份帮您修改，修改后的用户名和密码会通过短信发送到您注册时使用的手机上。</div>
						</div>
					</div>

				</div>
			</div>

			<div class="info1">
				<div class="title">
					<span><h2><img src="//www.3qqq.com/static/images/common/zhinan_10.jpg"></h2></span>
					<div class="line"></div>
				</div>

				<div class="part1">
					<h2>问题帮助</h2>
				</div>

				<div class="part3">
					<div class="title">
						<h2>项目持有方</h2></div>
					<div class="content">
								<span>
									<b>1、项目持有方如何在平台上进行注册？</b>
									<p>特金汇平台的首页点击"注册"，利用手机号码进行注册，根据提示填写基本信息；</p>
								</span>

								<span>
									<b>2、在特金汇平台发布项目需要准备些什么？</b>
									<p>项目持有方在特金汇平台发布项目暂时不会收取费用，但需要通过平台的审核。审核通过后平台会免费提供多项增值服务。为保证项目质量，需要委托方提供以下资料，并保证资料的真实性。</p>
									<p>资产方：单位或者个人的名称，项目名称，社会背景， 涉诉情况（包括银行贷款）；</p>
									<p>资产概况： 地址位置，产权面积，价格（评估价格，市场价格，实际售价，是否卡死)；</p>
									<p>租赁情况：承租人信息（名称，行业）， 租金（交租方式） ，合同期限；</p>
									<p>权证信息：  国土使用证 ，房屋产权证， 公司营业执照 ；</p>
								</span>

								<span>
									<b>3、平台提供的服务有那些？</b>
									<!--<p>项目持有方在特金汇平台发布项目暂时不会收取费用，但需要通过平台的审核。审核通过后平台会免费提供多项增值服务。为保证项目质量，需要委托方提供以下资料，并保证资料的真实性。</p>-->
								<p>（1）定制级专业项目尽调报告一份（同城特资经纪人将为您提供详细尽职调查服务，撰写尽调报告，尽调报告需要从项目列表进入查看）；</p>
								<p>（2）平台项目展示机会（与平台其他优质项目共同展示的机会）；</p>
								<p>（3）专业特资经纪人线下精准推荐服务；</p>
								<p>（4）平台针对优质项目免费广告宣传；</p>
								<p>（5）专业特资经纪人线下精准推荐服务；</p>
								</span>
								<span>
									<b>4、可以修改填写的债权信息吗？</b>
									<p>特金汇平台发布的所有项目信息均提供详细尽职调查报告，尽调报告若出现严重纰漏或信息失真，平台将重新安排特资经纪人进行尽调，完善项目尽调报告；</p>
								</span>


					</div>
				</div>

				<div class="part3">
					<div class="title">
						<h2>城市合伙人</h2></div>
					<div class="content">

								<span>
									<b>1、如何申请成为城市合伙人？需要收费吗？</b>
									<p>注册成为平台会员后，可在首页提交申请，填写个人相关信息，参加平台专业培训并考核通过后授权成为城市合伙人；
										申请成为城市合伙人需要缴纳平台管理费用，平台将为您提供多项超值服务：</p>
									<p>（1）提供一个创业的机会（招募特资经纪人团队、垂直的培训体系、千万级别媒体品牌宣传推广、项目洽谈，让您从小白变身为行业里手）；</p>
									<p>（2）提供一项赚钱的渠道（平台城市合伙人身份成立，为您提供一项赚钱的渠道）； </p>
									<p>（3）赚取特资经纪人的培训费；</p>
									<p>（4）赚取项目尽调费；</p>
									<p>（5）赚取平台上传项目鼓励金；</p>
									<p>（6）赚取尽调报告查看费用；</p>
									<p>（7）成为项目对接中间人，赚取中间费用；</p>
									<p>（8）成为平台股东，变身高富帅，迎娶白富美！</p>

								</span>


					</div>
				</div>



				<div class="part3">
					<div class="title">
						<h2>项目投资方</h2></div>
					<div class="content">

								<span>
									<b>1、查看收费的尽调报告有什么好处？</b>
									<p>（1）大量且详细的债权信息可供选择（您通过详细了解项目情况后可以迅速做出选择，是否对接该项目）；</p>
									<p>（2）详细周全的尽职调查信息可供参考（为您节省后期尽调成本，节约时间，加快项目对接进度）；</p>
									<p>（3）独家对接项目机会（您将拥有买断该项目的权利，享有独家操作该项目的机会，平台上其他用户将无法查询到已买断项目）；</p>
									<p>（4）免去不必要的中间费用（尽调报告内详细介绍项目持有方联系方式，您可以直接与其取得联系）；</p>

								</span>
								<span>
									<b>2、尽调报告里是不是只介绍项目优点，隐瞒项目风险？</b>
									<p>特资经纪人将秉着公平公正的原则以第三方的角度客观评价项目，尽调报告内即介绍项目亮点也披露项目风险，并针对项目风险提出风险防控预案，
										对项目进行盈利分析；</p>
								</span>

					</div>
				</div>

				<div class="part3">
					<div class="title">
						<h2>特资经纪人</h2></div>
					<div class="content">
								<span>
									<b>1、如何申请成为平台经纪人？需要收费吗？</b>
									<p>注册成为平台会员后，可在首页提交申请，填写个人相关信息，参加平台专业培训并考核通过后成为特资经纪人；</p>
									<p>申请成为特资经纪人需要缴纳特资经纪人培训费用，收取培训费用后平台将为您提供多项超值服务：</p>
									<p>（1）学习一门技能（平台培训分为平台使用、业务推广、与银行AMC收包流程、项目实操、专业术语等板块的培训，让您从小白变身为行业里手）；</p>
									<p>（2）提供一项赚钱的渠道（平台特资经纪人都以兼职身份成立，在不耽误您本职工作的情况下为您提供一项赚钱的渠道）；</p>
									<p>（3）赚取项目尽调费用；</p>
									<p>（4）赚取尽调报告查看费用；</p>
									<p>（5）赚取项目尽调报告买断费用；</p>
									<p>（6）成为项目对接中间人，赚取中间费用；</p>
									<p>（7）发展成为平台城市合伙人（与平台共同分享城市收益）；</p>
									<p>（8）成为平台股东，变身高富帅，迎娶白富美！</p>
								</span>
								<span>
									<b>2、怎样才能让项目持有方选择我作为特资经纪人？</b>
									<p> 平台设计特资经纪人排名制度，根据特资经纪人项目操作数量、尽调报告质量、在线时长、完成平台推广任务情况等条件进行综合评分决定特资经纪人排名顺序。您如果排名靠前，被项目持有方选择的机会将会大大增加；</p>


								</span>

					</div>
				</div>

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

		<script>
		$(function(){
			$('.section1 h3').on("click", function() {
						$(this).parent().addClass('active').siblings().removeClass('active');
						$(this).next().slideToggle(100);
						//$('section1>div').not($(this).next()).slideUp('fast');
					});
		})
		</script>
		
	

	</body>

</html>