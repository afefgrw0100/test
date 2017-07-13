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
	<div class="agreenment">
		<div class="con">
			<h2>委托尽调协议</h2>
			<p>
				本协议是您与特金汇，服务等相关事宜所订立的契约，请您仔细阅读本委托协议，您点击&quot;同意并继续&quot;按钮后，本协议即构成对双方有约束力的法律文件。
			</p>
			<p>
				用户在本网站发布特殊资产/实物处置信息前必须仔细阅读本协议条款，否则用户无权发布特殊资产/实物处置信息。用户一旦发布特殊资产/实物处置信息，即表示接受并同意本协议的所有条件和条款，不愿接受本协议条款的，不得在特金汇平台发布特殊资产/实物处置信息。本网站依据本协议为用户提供服务。用户还应不时注意本协议修改情况，在本协议修改后用户继续使用本网站或接受本网站服务时，视为用户同意该修改。
			</p>
			<p>
				&nbsp; &nbsp; &nbsp;特金汇有权对本协议进行修改，修改后的协议在本网站公布后即有效代替原来的协议。用户可随时查阅本协议并以最新协议为准。
			</p>
			<p>
				一、定义
			</p>
			<p>
				1、“用户”指为使用特金汇平台发布特殊资产/实物处置信息的自然人、法人或其他组织。
			</p>
			<p>
				2、“本协议”指《委托尽调协议》。
			</p>
			<p>
				3、“平台”指特金汇平台（www.tejinhui.com）
			</p>
			<p>
				二、委托事项
			</p>
			<p>
				1、用户按照平台制定格式上传特殊资产/实物项目信息，平台审核通过后接受用户委托，为用户推荐进行项目尽调工作的特资经纪人以供用户选择。
			</p>
			<p>
				2、用户同意由用户自行选择的特资经纪人就用户上传到平台的项目进行尽职调查，出具尽职调查报告。
			</p>
			<p>
				3、特资经纪人接受用户委托，为用户将撰写完成的尽调报告上传到平台上。
			</p>
			<p>
				三、委托期限
			</p>
			<p>
				&nbsp; &nbsp; 用户委托特资经纪人开展尽职调查的期限自用户支付尽调费用，特资经纪人接受用户委托之日起五个工作日内完成尽职调查报告；委托期限到期前，特资经纪人应完成尽职调查工作，向平台上传尽职调查报告。
			</p>
			<p>
				四、工作的方式
			</p>
			<p>
				1、平台为用户推荐进行进尽职调查工作的特资经纪人，特资经纪人自行决定是否接受用户委托：
			</p>
			<p>
				（1）若特资经纪人接受用户委托的，则平台将以短信的形式提醒用户特资经纪人已经接单，并将特资经纪人的联系方式告知用户，方便用户与特资经纪人进行线下对接。
			</p>
			<p>
				（2）若特资经纪人不接受用户委托的，则平台以短信的形式提醒用户，特资经纪人拒绝接单，并重新向用户推荐其他特资经纪人供用户进行选择。
			</p>
			<p>
				2、特资经纪人接单以后将采取现场调查和书面文件审查相结合的方式完成委托事项，用户为特资经纪人的工作提供必要的协助。
			</p>
			<p>
				五、尽职调查工作程序
			</p>
			<p>
				1、用户同意将所涉及尽职调查特殊资产/实物项目的全部资料提供给特资经纪人，特资经纪人将结合用户提供的资料开展尽职调查工作。
			</p>
			<p>
				2、用户同意特资经纪人使用平台提供的尽调报告格式撰写尽调报告。
			</p>
			<p>
				3、用户同意特资经纪人使用平台提供的尽调报告模板撰写的尽调报告发布在平台上供项目投资方进行查阅。
			</p>
			<p>
				六、尽调费用支付方式
			</p>
			<p>
				1、用户在上传项目基础信息后线上支付项目尽调费用。
			</p>
			<p>
				2、用户项目尽调费用按照单项目进行计算，具体价格请关注平台公告。
			</p>
			<p>
				3、用户项目尽调费用原则上为特资经纪人开展尽职调查的报酬，在特资经纪人完成工作前，由用户委托平台对该笔费用进行管理。
			</p>
			<p>
				4、用户项目尽调费用由通过第三方支付平台进行代收，待特资经纪人出具的尽调报告通过平台审核以后，有平台支付到特资经纪人账号上。
			</p>
			<p>
				5、在特资经纪人进行线下尽职调查工作中，所产生的行政、司法、鉴定、公证等任何第三方所收取的合理费用由用户与特资经纪人自行协商支付。平台不予承担。
			</p>
			<p>
				6、如因任何原因导致特资经纪人未开展尽职调查工作，用户可以向平台进行申诉，平台核实后，将重新向客户推荐其他特资经纪人或退还尽职调查费用。
			</p>
			<p>
				第六条 &nbsp;双方的责任&nbsp;
			</p>
			<p>
				1、用户同意依照法律法规和政策的要求，如实地向平台以及特资经纪人提供委托事项的有关情况和材料；&nbsp;
			</p>
			<p>
				2、特资经纪人必须按照本协议的约定，认真负责的开展尽职调查工作，并按时到场履行职务，特资经纪人怠于行使权利，未尽义务给用户造成损失的，用户有权要求特资经纪人补偿用户的损失； &nbsp; &nbsp; &nbsp;
			</p>
			<p>
				3、 用户同意平台以及特资经纪人就用户委托的特殊资产/实物项目在推广过程中对项目所涉及的资料与尽职调查报告向意向购买方进行披露，在披露过程中所产生的任何问题和一切损失由用户自行承担。
			</p>
			<p>
				4、用户同意并接受平台对特资经纪人出具的尽调报告进行审核，但平台不对尽调报告的真实性、合法性、有效性、完整性以及尽调报告披露后对用户以及特资经纪人所造成的损失承担赔偿责任。
			</p>
			<p>
				5、用户应自行对尽调报告的真实性、合法性、有效性以及完整性进行核实。若用户委托平台发布尽职调查报告的，则视为用户已认可该尽职调查报告内容，且保证其内容的真实性、合法性、有效性以及完整性。
			</p>
			<p>
				6、用户同意并接受平台对用户委托的特殊资产/实物项目进行发布，在项目发布后由于该项目发布造成对平台的不利影响，平台可以在不通知用户的情况下将项目下架，若由于该不利影响对平台造成损失，用户同意对平台进行赔偿。
			</p>
			<p>
				7、由于用户违反本协议或任何法律、法规或侵害第三方的权利，而引起第三方对本网站提出的任何形式的索赔、要求、诉讼，本网站有权向用户追偿相关损失，包括但不限于本网站为此支付的律师费、调查费、诉讼费、鉴定费等费用以及名誉损失、向第三方支付的赔偿金、补偿金等。
			</p>
			<p>
				8、用户应为特资经纪人提供必要的工作条件。
			</p>
			<p>
				9、用户同意并接受，用户通过线上支付系统向平台支付尽调费用时，由于任何原因所产生的任何损失由用户自行承担。
			</p>
			<p>
				10、用户应保证其已获得了相应的授权或处分权限，有权对拟进行尽职调查、信息发布的项目进行尽职调查行为以及公示、披露，且针对该项目的尽职调查和信息发布等公示、披露行为不会致使平台以及特资经纪人遭受第三人索赔或主张权利。若因用户对拟进行尽调的资产或项目无权处分而通过平台委托特资经纪人对项目进行尽职调查且利用平台进行公示、披露的，所产生的一切后果，由用户自行承担。平台保留向用户就所遭受的损失进行追偿的权利。
			</p>
			<p>
				第七条 法律适用及管辖
			</p>
			<p>
				1、因用户使用本网站而引起或与之相关的一切争议、权利主张或其它事项，均适用中华人民共和国法律。
			</p>
			<p>
				2、用户和本网站发生争议的，应根据诚实信用原则通过协商加以解决。如果协商不成，则应向特金汇所在地人民法院提起诉讼。
			</p>
			<p>
				第八条 条款的可分割性
			</p>
			<p>
				若本协议的任何条款被认定为不合法、无效或者无法实施时，则该等条款应视为可分割，不影响本协议其他条款的法律效力。
			</p>

			<div>

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