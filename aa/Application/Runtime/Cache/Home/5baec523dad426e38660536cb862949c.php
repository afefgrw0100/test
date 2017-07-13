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
                        <a href="/apt">城市合伙人</a>
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
    <div class="agreenment">
        <div class="con">
            <h2>特资经纪人申请协议</h2>
            <p>
                特金汇是一个特殊资产流转平台，本协议的双方是申请成为特金汇特资经纪人用户与特金汇平台。在申请成为特金汇特资经纪人并使用特金汇提供的各项服务之前，请您务必仔细阅读并透彻理解本协议条款。如您同意申请成为特金汇特资经纪人，则视为您已认真阅读、理解并完全接受了本协议全部内容，本协议即时在您与特金汇之间发生法律效力。
            </p>
            <p>
                特金汇依据本协议为您提供服务，您应不时注意本协议修改情况，在本协议修改后，特资经纪人继续使用本平台或接受本平台服务时，视为特资经纪人同意我们对该协议的修改。
            </p>
            <p>
                以下为本协议内容：
            </p>
            <p>
                一、 定义
            </p>
            <p>
                1、“特金汇”是一个特殊资产流转平台。
            </p>
            <p>
                2、“特资经纪人”“您”指向特金汇平台申请成为特资经纪人的自然人、法人或其他组织。
            </p>
            <p>
                3、“本协议”指《特资经纪人申请协议》。
            </p>
            <p>
                4、“平台”指特金汇平台（www.tejinhui.com）
            </p>
            <p>
                <br/>
            </p>
            <p>
                二、 服务内容
            </p>
            <p>
                1、特金汇的具体服务内容包括但不限于：向特资经纪人收取培训费用，向特资经纪人提供培训资料及安排培训，组织特资经纪人考试，上传拟尽调项目列表，审查尽调报告，尽调报告挂网推广，特资经纪人考核管理，特资经纪人评分管理等服务。特金汇保留随时变更、中断或终止部分或全部服务的权利，具体服务以平台发布内容为准。
            </p>
            <p>
                2、特金汇在提供服务时，可能会对部分服务收取一定的费用。在此情况下，特金汇会在相应网站页面上作出明确的提示。特资经纪人可选择接受或拒绝支付，如特资经纪人拒绝支付该费用，则不能使用对应的服务。
            </p>
            <p>
                3、特金汇仅提供相关的线上服务，除此之外的有关设备（如电脑、办公场地、交通工具等）及所需的费用（如交通费、餐饮费、电话费、查询费等）均应由特资经纪人自行负担。
            </p>
            <p>
                4、如本协议与平台其他特别约定、专项服务协议不一致的，均优先适用其他特别约定及专项服务协议。特资经纪人对此表示知悉并同意。
            </p>
            <p>
                <br/>
            </p>
            <p>
                三、使用规则
            </p>
            <p>
                1、特资经纪人在申请使用平台服务时，必须根据提示向平台提供准确的资料，如资料有任何变动，必须在平台上及时更新。
            </p>
            <p>
                2、特资经纪人帐号申请成功后，每个特资经纪人都将获得一个独立特资经纪人帐号并由该特资经纪人自行设置、管理其相应的密码，以其独立所有的帐号进行相应的活动。特资经纪人对以其特资经纪人帐号进行的所有活动和事件承担法律责任。特资经纪人应妥善保管自己的帐号及密码，若因为特资经纪人自身原因（包括但不限于：任意向第三方透露帐号和密码及相关注册资料；多人共享同一个帐号；安装非法或来路不明的程序等），导致其帐号、密码遭他人非法使用时，平台不承担任何责任。如有任何第三方向平台相关服务发出指示，在确认其提供准确帐户、密码信息的情况下，平台有权视为该行为获得了特资经纪人的充分授权，该行为所产生任何结果均归属于特资经纪人本身。
            </p>
            <p>
                3、特资经纪人许可并同意接受平台通过手机短信、电子邮件或特资经纪人提交的其他联系方式向特资经纪人发送平台或其合作伙伴的服务信息或其他相关商业信息。
            </p>
            <p>
                4、如根据申请流程需要特资经纪人提供个人身份信息，在特资经纪人提供虚假申请信息或其提交的资料无法有效证明其身份时，平台有权拒绝提供任何服务或承担任何义务。
            </p>
            <p>
                5、特资经纪人在使用平台服务过程中，必须遵循以下原则：
            </p>
            <p>
                （1）遵守中国有关的法律和法规；
            </p>
            <p>
                （2）不得为任何非法目的而使用平台服务系统；
            </p>
            <p>
                （3）遵守所有与平台服务有关的协议、规定和程序；
            </p>
            <p>
                （4）如发现任何非法使用特资经纪人帐号或帐号出现安全漏洞的情况，应立即通告平台。
            </p>
            <p>
                6、特资经纪人应遵守中华人民共和国相关法律法规(如果特资经纪人在中华人民共和国境外使用平台服务，应遵守所在国家或地区的法律法规)。特资经纪人将自行承担特资经纪人所发布的信息内容的责任。特资经纪人不得发布下列内容：
            </p>
            <p>
                （1）反对中华人民共和国宪法所确定的基本原则的；
            </p>
            <p>
                （2）危害国家统一、主权和领土完整的；
            </p>
            <p>
                （3）泄露国家秘密，危害国家安全或者损害国家荣誉和利益的；
            </p>
            <p>
                （4）破坏民族团结或者侵害民族风俗、习惯的；
            </p>
            <p>
                （5）破坏国家宗教政策，宣扬邪教、迷信的；
            </p>
            <p>
                （6）散布谣言，扰乱社会秩序，破坏社会稳定的；
            </p>
            <p>
                （7）散布淫秽、赌博、暴力或者教唆犯罪的；
            </p>
            <p>
                （8）侮辱或者诽谤他人，侵害他人合法权益的；
            </p>
            <p>
                （9）含有中华人民共和国法律、行政法规禁止的其他内容的。
            </p>
            <p>
                <br/>
            </p>
            <p>
                四、培训费用
            </p>
            <p>
                1、成为特金汇特资经纪人，首先需要向平台申请成为特资经纪人，其次向平台支付特资经纪人培训费用，然后参加平台特资经纪人线上培训，最后通过平台特资经纪人考试。
            </p>
            <p>
                2、平台统一向特资经纪人一次性收取特资经纪人培训费用人民币贰仟元整（小写：￥2000元整）。
            </p>
            <p>
                3、培训费用特资经纪人应于向平台提交特资经纪人申请时根据平台界面提示通过线上支付方式支付至平台指定账户。
            </p>
            <p>
                4、培训费用最迟应于特资经纪人向平台提交申请之日起两日内根据平台界面提示通过线上支付方式支付至平台指定账户。
            </p>
            <p>
                5、该费用是平台向申请成为特金汇特资经纪人收取的培训费用，特资经纪人一经支付均不予退还。
            </p>
            <p>
                <br/>
            </p>
            <p>
                五、培训制度
            </p>
            <p>
                1、成为特金汇特资经纪人均应无条件同意并接受平台组织的线上经纪人培训及经纪人资格考试。
            </p>
            <p>
                2、特资经纪人应于成功支付特资经纪人培训费用之日起七日内自行在平台下载相关培训资料，完成线上经纪人培训。
            </p>
            <p>
                3、特资经纪人应于成功支付特资经纪人培训费用之日起七日内自行通过平台线上操作方式参加经纪人资格考试。
            </p>
            <p>
                4、如经培训、考试，特资经纪人未能通过特金汇特资经纪人资格考试，特资经纪人需重新通过线上方式进行培训，并再次通过平台线上操作方式参加特资经纪人资格考试，直至通过特金汇特资经纪人考试。
            </p>
            <p>
                5、特资经纪人在平台通过线上方式完成特资经纪人考试后，即成为平台特资经纪人，可在平台上接单尽调、提供服务。
            </p>
            <p>
                <br/>
            </p>
            <p>
                六、考核制度
            </p>
            <p>
                1、为规范平台管理制度及控制风险，特资经纪人在接受平台服务或为平台其他人员提供服务时均应无条件同意并履行平台各项考核制度。
            </p>
            <p>
                2、平台为落实特资经纪人在平台的积分体系，维护各特资经纪人的利益，特资经纪人在接受平台服务或为平台其他人员提供服务时均应严格遵循平台的各项制度。
            </p>
            <p>
                3、平台对各特资经纪人在平台上所提供的服务采取积分累计制度，如特资经纪人能按时、按量、按标准完成平台委托的各项业务，平台将增加其在平台的积分；如特资经纪人不能按时、按量、按标准完成平台委托的工作或所提供的服务存在问题，平台将减少其在平台的积分、予以处罚等。
            </p>
            <p>
                4、特资经纪人在平台提供的各项服务如获得用户的肯定或好评，平台将增加其在平台的积分；如特资经纪人在平台提供的各项服务用户评价为服务差或被用户投诉，平台会对其服务进行核实，如服务确实存在问题，用户评价情况属实，平台将减少其在平台的积分、予以处罚等。
            </p>
            <p>
                5、特资经纪人通过在平台服务累计获取的积分，不仅作为特资经纪人在平台所提供服务质量的排名，且在平台以后新上项目时，平台会自动为用户推荐排名在前、积分高的特资经纪人，排名在前、积分高的特资经纪人也能在平台获取更多的服务机会、获取更丰厚的利润。
            </p>
            <p>
                6、特金汇将结合特资经纪人在平台所提供的服务数量、质量及平台累计的积分等情况，将特资经纪人所在区域内服务质量好、积分等级高等综合能力强的特资经纪人发展成为平台城市合伙人或平台股东等。
            </p>
            <p>
                <br/>
            </p>
            <p>
                七、免责条款
            </p>
            <p>
                1、特资经纪人不得以盗用、窃取、利用系统漏洞等非法途径以及在未获平台授权的非法途径获取平台特资经纪人服务，否则平台有权取消特资经纪人的资格。由此带来的后果由特资经纪人自行承担，平台不负任何责任。
            </p>
            <p>
                2、平台帐号使用权仅属于初始申请特资经纪人，禁止账号共享、赠与、借用、租用、转让或售卖，因上述原因导致帐号或密码丢失，平台不负任何责任，由此带来的损失由特资经纪人自行承担。
            </p>
            <p>
                3、特资经纪人与平台系合作关系，互不隶属，不存在任何形式的劳动或者劳务关系。特资经纪人通过平台接受债权特殊资产人委托开展活动，其行为对债权特殊资产人负责。非经平台特别书面许可，特资经纪人不得以“特金汇”或平台的名义对外接受委托或开展业务。
            </p>
            <p>
                <br/>
            </p>
            <p>
                八、法律适用及争议解决
            </p>
            <p>
                1、本《协议》的解释、效力及纠纷的解决，均适用中华人民共和国法律。
            </p>
            <p>
                2、若特资经纪人和平台之间因本《协议》发生任何纠纷或争议，首先应友好协商解决，协商不成，则应向特金汇所在地人民法院提起诉讼。
            </p>
            <p>
                3、由于特资经纪人违反本协议或任何违反法律、法规或侵害第三方的权利，而引起第三方对本平台提出的任何形式的索赔、要求、诉讼，平台有权向特资经纪人追偿相关损失，包括但不限于平台为此支付的律师费、调查费、诉讼费、鉴定费等其他费用，因此给平台造成的名誉损失及其他损失，平台因此向第三方支付的赔偿金、补偿金等。
            </p>
            <p>
                <br/>
            </p>
            <p>
                九、其他
            </p>
            <p>
                1、本《协议》一经特资经纪人&quot;同意&quot;，即发生法律效力，对双方均具有法律约束力。
            </p>
            <p>
                2、本《协议》所定任何条款的部分无效，不影响本协议其他条款的效力。
            </p>
            <p>
                3、特金汇有权对本协议随时进行修改，修改后的协议在本平台公布后立即有效，修改后的协议代替原来的协议，特资经纪人可随时登录本平台查阅本协议并以最新协议为准。
            </p>
            <p>
                4、本《协议》的一切解释权与修改权均归属于特金汇。<span class="Apple-tab-span" style="white-space:pre">	</span>
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
                    <a href="<?php echo U('Home/Index/baem',empty(session('user.MemberId'))?'':array('uic'=>authcode(session('user.MemberId'),'ENCODE')));?>">成为经纪人</a>
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