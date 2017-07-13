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
    <div class="top_line"></div>
    <div class="top2">
        <div class="top2_c">
            <div class="fl logo"><b><a href="<?php echo U('Home/Index/index');?>"><img src="//www.3qqq.com/static/images/common/tejinh.jpg"></a></b><em><img src="//www.3qqq.com/static/images/common/index_06.jpg?tccc="></em>
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
                        <a href="<?php echo U('Home/Lists/lists');?>">找项目 </a>
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
                        <a href="<?php echo U('Home/Index/safe');?>">安全保障</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/index/help');?>">新手指南</a>
                    </li>
                </ul>
            </div>
            <div class="fr member_center">
                <a href="<?php echo U('User/Member/index');?>" id="cselect"><?php echo empty(session('user.MemberId'))?"登录/注册":"会员中心";?></a>
            </div>
        </div>

    </div>
</div>
<!-- header end -->
<div class="main">
	<div class="agreenment">
		<div class="con">
			<h2>尽调报告购买协议</h2>
			<p>
				本协议是您与特金汇，服务等相关事宜所订立的契约，请您仔细阅读本委托协议，您点击&quot;同意并继续&quot;按钮后，本协议即构成对双方有约束力的法律文件。
			</p>
			<p>
				用户在本网站购买尽调报告前必须仔细阅读本协议条款，否则用户无权购买尽调报告。用户一旦购买尽调报告，即表示接受并同意本协议的所有条件和条款，不愿接受本协议条款的，不得在特金汇平台购买尽调报告。本网站依据本协议为用户提供服务。用户还应不时注意本协议修改情况，在本协议修改后用户继续使用本网站或接受本网站服务时，视为用户同意该修改。
			</p>
			<p>
				&nbsp; &nbsp; &nbsp;特金汇有权对本协议进行修改，修改后的协议在本网站公布后即有效代替原来的协议。用户可随时查阅本协议并以最新协议为准。
			</p>
			<p>
				一、定义
			</p>
			<p>
				1、“用户”指在特金汇平台购买尽调报告的自然人、法人或其他组织。
			</p>
			<p>
				2、“本协议”指《尽调报告购买》。
			</p>
			<p>
				3、“平台”指特金汇平台（www.tejinhui.com）
			</p>
			<p>
				二、项目信息来源以及尽调报告来源
			</p>
			<p>
				1、平台所有项目均由在平台上注册的项目委托方进行发布，平台对项目进行初步审核，但不对项目的真实性、合法性、有效性、完整性负责，请用户自行判断。如由于信息的真实性、合法性、有效性、完整性对用户造成的损失由用户自行承担。
			</p>
			<p>
				2、平台上发布的所有尽调报告均由在平台上注册项目委托方委托的在平台上注册的特资经纪人进行线下尽职调查以及完成尽调报告，平台对尽调报告进行初步审核，但不对尽调报告的真实性、合法性、有效性、完整性负责，请用户自行判断。如由于尽调报告的真实性、合法性、有效性、完整性对用户造成的损失由用户自行承担。
			</p>
			<p>
				三、订购报告及格式
			</p>
			<p>
				1、用户通过平台查看项目免费版本以后，可根据需求自行在平台选择需要购买的尽调报告。
			</p>
			<p>
				2、报告格式：平台出售的尽调报告为电子版，不提供纸质报告。
			</p>
			<p>
				四、金额、支付时间及报告交付方式
			</p>
			<p>
				1、用户在平台上购买的尽调报告价格根据报告实际价格进行支付。
			</p>
			<p>
				2、用户在选定需要购买的尽调报告后可通过第三方支付平台线上支付购买报告费用。
			</p>
			<p>
				3、平台在确认收到用户付款后，将立即为用户开通报告下载通道，用户可通过下载链接自行下载尽调报告。
			</p>
			<p>
				五、验收
			</p>
			<p>
				自本合同签订之日起一周之内，用户如认为尽调报告内容存在明显错误，可以向平台进行投诉。平台将对尽调报告进行审查，若情况属实将退回用户购买尽调报告费用。
			</p>
			<p>
				六、尽调报告买断
			</p>
			<p>
				1、“买断”系指用户与平台就特定项目的公示行为达成一致，在一定期限内，该特定项目的尽调报告进行仅由“买断”的用户独自查阅，平台不得将之公示或披露给第三人。
			</p>
			<p>
				2、用户可以在平台对项目尽调报告进行独家买断，用户买断尽调报告以后，平台将根据用户买断时间对尽调报告进行下架。
			</p>
			<p>
				3、尽调报告买断价格由出具尽调报告的特资经纪人进行设定，具体价格请查看项目详情页面。
			</p>
			<p>
				4、平台上推出的尽调报告买断服务时间以月为单位，即用户可根据自身情况之下选择买断时间长短。买断时间到期后，若项目未成交，平台将重新对项目进行上架。
			</p>
			<p>
				5、用户买断项目后，在买断期间，平台保证在平台查找不到关于项目的任何信息，但并不保证除平台以外的其他渠道有第三方对项目进行发布。
			</p>
			<p>
				6、用户买断项目尽调报告以后，平台并不保证用户一定能够与特殊资产所有人以及特资经纪人进行对接，不保证用户与尽调报告所述项目所有人一定能够达成合作。
			</p>
			<p>
				七、用户申诉
			</p>
			<p>
				1、用户在平台购买尽调报告后，发现尽调报告与项目实际情况出现严重不符或尽调报告所述项目已经与其他第三方完成交易，用户可以向平台提出申诉。
			</p>
			<p>
				2、由于平台出售产品为信息类产品，故用户申诉期为三日，即购买/买断尽调报告之日开始计算。申诉期内平台接受用户投诉，申诉期结束后平台将不再受理用户投诉，因此而产生的一切损失由用户自行承担。
			</p>
			<p>
				3、用户向平台申诉的过程中应将发现问题以邮件的形式向平台进行反应，并提交相关证据，平台将在五个工作日内处理用户投诉并对尽调报告进行重新审核。若用户申诉情况符合平台要求，平台将全额退还用于购买尽调报告费用。
			</p>
			<p>
				八、双方的责任
			</p>
			<p>
				&nbsp; &nbsp; 1、用户应按平台上规定的尽调报告价格向平台支付尽调报告购买费用。
			</p>
			<p>
				2、用户对本合同涉及的产品、价格及合作方式等均负有保密责任，未经对方书面允许不得泄露给第三方。
			</p>
			<p>
				3、用户同意平台按平台上约定的工作流程、方法进行操作，如因平台工作流程设定或方法对用户造成的损失由用户自行承担。
			</p>
			<p>
				4、平台对提供给用户的尽调报告及其他产品或服务拥有自主知识产权。
			</p>
			<p>
				5、平台提供给用户的尽调报告仅限用户内部使用，不得向任何第三方复制、转载、翻录、节选，更不得向任何第三方销售；用户利用尽调报告所披露内容对第三方造成损失的由用户自行承担。因此给平台造成损失的，平台有权要求用户进行赔偿。
			</p>
			<p>
				6、由于用户违反本协议或任何法律、法规或侵害第三方的权利，而引起第三方对本网站提出的任何形式的索赔、要求、诉讼，本网站有权向用户追偿相关损失，包括但不限于本网站为此支付的律师费、调查费、诉讼费、鉴定费等费用以及名誉损失、向第三方支付的赔偿金、补偿金等。
			</p>
			<p>
				7、用户同意并接受，用户通过线上支付系统向平台支付尽调费用时，由于任何原因所产生的任何损失由用户自行承担。
			</p>
			<p>
				8、平台仅为信息发布机构，用户所购买的尽调报告系由债权人出具并委托平台发布。平台无条件亦无义务对尽职调查报告的真实性、合法性、有效性以及完整性进行核实。用户购买尽调报告后，应自行对尽调报告内容进行核实。平台不承担任何基于尽调报告内容所产生的一切责任以及赔付。
			</p>
			<p>
				9、用户购买的尽调报告只作为项目信息的参考，平台并不保证用户购买了尽调报告就一定能够与特殊资产所有人以及特资经纪人进行对接，不保证用户与尽调报告所述项目所有人一定能够达成合作。
			</p>
			<p>
				九、法律适用及管辖
			</p>
			<p>
				1、因用户使用本网站而引起或与之相关的一切争议、权利主张或其它事项，均适用中华人民共和国法律。
			</p>
			<p>
				2、用户和本网站发生争议的，应根据诚实信用原则通过协商加以解决。如果协商不成，则应向特金汇所在地人民法院提起诉讼。
			</p>
			<p>
				十、条款的可分割性
			</p>
			<p>
				若本协议的任何条款被认定为不合法、无效或者无法实施时，则该等条款应视为可分割，不影响本协议其他条款的法律效力。
			</p>
			<p>
				<br/>
			</p>
			<p>
				<br/>
			</p>
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
<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery.SuperSlide.2.1.1.js');?>"></script>
<script src="<?php echo tempurl('//www.3qqq.com/static/js/main.js');?>"></script>
<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery.flexslider-min.js');?>"></script>
<script src="<?php echo tempurl('//www.3qqq.com/static/js/easyscroll.js');?>"></script>
<script src="<?php echo tempurl('//www.3qqq.com/static/js/mousewheel.js');?>"></script>
<!-- 站长统计开始  -->
<div style="display:none">
				<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259609671'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1259609671' type='text/javascript'%3E%3C/script%3E"));</script>
</div>
<!-- 站长统计结束  -->

<script type="text/javascript">
    $(function() {
        $('.div_scroll').scroll_absolute({
            arrows: true
        })
    });
</script>
<script>
    //首页banner


        //回到顶部
        $("#top").click(function(){
            $('body,html').animate({scrollTop:0},800);

        })

</script>
	</body>

</html>