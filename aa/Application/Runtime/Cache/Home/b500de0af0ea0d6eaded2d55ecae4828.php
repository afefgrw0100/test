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
					<h2>特资经纪人管理办法</h2>
<p>
    第一章 总则
</p>
<p>
    第一条 &nbsp;为规范特资经纪人的管理，建立健全的激励与约束机制，促进业务发展，依据行业规范、自律规则和特金汇平台规则等有关规定，制定本办法。&nbsp;
</p>
<p>
    第二条 &nbsp;本办法所称特资经纪人是指接受特金汇平台的委托，在特金汇平台授权范围内代理从事与经纪业务相关的平台用户招揽、平台用户服务等活动的特金汇平台员工以外的自然人。&nbsp;
</p>
<p>
    第三条 &nbsp;特金汇平台对特资经纪人的管理遵循以下原则：&nbsp;
</p>
<p>
    （一）集中管理：特金汇平台制定特资经纪人管理办法和配套制度，建立特资经纪人管理系统，对特资经纪人的资质审批、注册登记、业务培训、绩效考核、风险控制等进行集中管理；&nbsp;
</p>
<p>
    （二）统筹规划：特资经纪人是特金汇平台运营体系的重要组成部分，特金汇平台统一制定特资经纪人发展战略；&nbsp;
</p>
<p>
    （三）风险防范：特金汇平台与特资经纪人是委托代理关系，与特资经纪人签订委托代理合同，特金汇平台通过明确特资经纪人的授权范围和禁止性行为，防范特资经纪人委托代理风险；&nbsp;
</p>
<p>
    （四）专业化发展：特金汇平台按照专业化的管理模式规范特资经纪人的招募、培训、考核、管理体系，促进特资经纪人提高职业化、专业化的能力；
</p>
<p>
    （五）防范利益冲突：特金汇平台在制度上以及与特资经纪人的委托代理合同中，强化特资经纪人的守法合规意识和职业道德观念，以保障平台用户利益优先为前提，避免特资经纪人与平台用户发生利益冲突；维持特资经纪人和特金汇平台之间的利益均衡，保障特资经纪人的合法权益。&nbsp;
</p>
<p>
    第四条 通过特金汇平台集中统一的信息系统管理和考核特资经纪人。&nbsp;
</p>
<p>
    第五条 特金汇平台对本办法享有解释与修改的权利。特金汇平台可随时对本办法进行修改，修改以后的本办法，特金汇将在平台上进行公示，特资经纪人无条件接受本办法的修改。
</p>
<p>
    <br/>
</p>
<p>
    第二章 经纪人上岗认证
</p>
<p>
    第六条 特资经纪人原则上应符合以下资质条件：&nbsp;
</p>
<p>
    （一）新招募的特资经纪人年龄在20-55周岁，具有完全民事行为能力，大专以上学历； &nbsp;
</p>
<p>
    （二）具有法律、金融、不良资产等相关行业从业经历；&nbsp;
</p>
<p>
    （三）品行端正，具有良好的职业道德；&nbsp;
</p>
<p>
    （四）具备良好沟通、表达能力；
</p>
<p>
    （五）无违法违规行为记录；。
</p>
<p>
    第七条 平台注册用户可以通过特金汇平台申请成为平台特资经纪人。平台对提交申请的用户进行初选。初选采用线上审核的方式进行。所有申请成为特资经纪人的用户须在线上提交以下资料：身份证扫描件、学历及学位证书复印件（须交验原件）、律师证或其他相关从业资格证书、个人履历、个人照片、联系方式、工作单位、工作地址、邮箱、微信号等。
</p>
<p>
    第八条 初选通过的用户需向平台缴纳培训费用，并参加平台组织的特资经纪人专项技能培训（具体培训细则请登录平台进行查看）。
</p>
<p>
    第九条 培训采用线上培训的方式进行，用户通过平台链接观看培训视频，学习培训资料。
</p>
<p>
    第十条 培训结束以后，用户必须参加平台组织的特资经纪人考核，考核通过线上进行。考核内容由平台制定，题目范围从培训资料中选取。
</p>
<p>
    第十一条 通过考核的用户，颁发特金汇平台特资经纪人认证资格证明；
</p>
<p>
    第十二条 特资经纪人获得平台特资经纪人认证资格证明后，应积极响应平台项目需求。如特资经纪人在获取平台资格证明后三个月未成功提供一次尽调服务，平台有权将其除名。
</p>
<p>
    <br/>
</p>
<p>
    第三章 尽职调查&nbsp;
</p>
<p>
    第十三条 用户成为特资经纪人后，特金汇平台将特资经纪人信息纳入平台特资经纪人列表，供用户选择。特资经纪人可以在特金汇平台上接受项目委托方的尽调委托，提供尽职调查服务。
</p>
<p>
    第十四条 当项目委托方选择特资经纪人进行尽调服务后，平台将以手机短信的形式提醒特资经纪人及时接受委托，特资经纪人可以在个人中心的待办事项查询并接受委托。
</p>
<p>
    第十五条 特资经纪人必须在项目委托方提交委托申请后的24小时内确认接单或否单，并与项目委托方取得联系。约定见面时间、地点，提前通知项目委托方需要哪些人参与见面，需要准备哪些资料。
</p>
<p>
    第十六条 特资经纪人在线下尽职调查过程中应秉着客观、公正的原则进行尽调，不得应项目委托方的要求美化项目情况，隐藏项目瑕疵。特资经纪人在线下尽职调查过程必须确认项目未与第三方完成交易，如果有第三方已经与项目委托方正在洽谈但未完成交易的，特资经纪人必须在尽调报告内予以注明。若因经纪人项目尽调报告引起项目投资方的投诉，特金汇平台将要求特资经纪人返还尽调费用以及报告查看费用，并对特资经纪人予以处罚。若对项目投资方造成损失的，由特资经纪人进行赔偿。
</p>
<p>
    第十七条 特资经纪人必须严格按照平台出具的尽调报告模板撰写尽调报告，不得自行更换模板。特金汇提供的尽调报告模板为项目通用模板，所涉及内容比较全面，特资经纪人可根据项目实际情况对模板调整。
</p>
<p>
    <br/>
</p>
<p>
    第四章 上传尽调报告
</p>
<p>
    第十八条 特资经纪人接受项目委托方委托后，必须在五个工作日内完成尽职调查并上传项目尽调报告到特金汇平台进行审核，平台将在一个工作日内完成审核并上传到平台项目列表内。
</p>
<p>
    第十九条 特资经纪人在上传尽调报告过程中必须对查看尽调报告以及买断尽调报告的价格进行设定，平台将给出价格区间。经纪人必须客观的评价项目质量以及尽调报告质量，对尽调报告给予合理定价，不得虚高尽调报告价格。因价格虚高导致项目投资方进行投诉的，特金汇平台审核确认后将扣除特资经纪人项目查看/买断费用，并予以处罚。
</p>
<p>
    第二十条 关于平台尽调报告查看费用与买断费用价格区间以特金汇平台项目上传页面所显示价格为准，若平台对区间价格进行调整将在平台首页进行公告。
</p>
<p>
    <br/>
</p>
<p>
    第五章 平台业务规则
</p>
<p>
    第二十一条 特金汇平台对特资经纪人实行积分排名办法，项目委托方选择特资经纪人时，特金汇平台将提供特资经纪人列表供项目委托方进行选择。排名顺序根据项目发布数量、登录特金汇平台频率、尽调报告质量、完成平台发布任务情况等要素进行综合评分，按照评分高低进行排名。
</p>
<p>
    第二十二条 特金汇平台专门为尽调报告生成单独推广链接，特资经纪人可以利用该链接通过微信、QQ、邮箱等推广工具对尽调报告进行推广。调动自身关系人脉在线下对尽调报告进行推广。
</p>
<p>
    第二十三条 特资经纪人在推广尽调报告时不得脱离特金汇平台，私自将项目尽调报告发送给其他第三方。一经发现平台将取消特资经纪人资格，若因此给特金汇平台或特金汇平台上其他用户造成损失，特金汇平台有权向特资经纪人追偿相关损失。
</p>
<p>
    第二十四条 项目投资方在购买尽调报告以后，对尽调报告中为涉及到的内容提出二次尽调时，特资经纪人可以与项目投资方进行线下对接，具体费用由双方自行商议，另行签订协议，平台概不介入。若因此产生的纠纷由双方自行解决。
</p>
<p>
    第二十五条 项目委托方提出该项目由特资经纪人独家委托处置，特资经纪人可以与项目委托方另行签订协议，平台概不介入。若因此产生的纠纷由双方自行解决。
</p>
<p>
    第二十六条 项目投资方在购买尽调报告以后，要求特资经纪人协助其进行线下项目对接时，特资经纪人可以与项目投资方另行签订协议，具体费用由双方自行商议，平台概不介入。若因此产生的纠纷由双方自行解决。
</p>
<p>
    <br/>
</p>
<p>
    第六章 结算
</p>
<p>
    第二十七条 特资经纪人在本平台获取的尽调基本费、尽调报告查看费、尽调报告买断费等可随时向平台申请结算，平台向其结算特资经纪人申请当日一周之前的尽调费用（如特资经纪人本周一8:00申请结算，平台向其结算上周一8:00之前的所有费用）。
</p>
<p>
    第二十八条 特资经纪人每次向平台申请结算的金额，不得超过特资经纪人结算时账户内余额的80%。
</p>
<p>
    第二十九条 特资经纪人接受项目委托方委托的尽调任务后，需完成尽调工作，将尽调报告上传至平台，并通过平台审核后，方可向平台申请结算尽调基本费用。
</p>
<p>
    第三十条 因项目委托方查看尽调报告、买断尽调报告产生的费用，特资经纪人需在尽调报告上传至平台，并通过平台审核后，方可向平台申请结算。
</p>
<p>
    第三十一条 平台结算方式为向特资经纪人微信账号支付相关尽调费用，特资经纪人应保证微信账号运营的稳定性，以防无法及时到账或及时获取相关信息。未经平台确认变更收款方式、账户，特资经纪人不得随意变更。
</p>
<p>
    <br/>
</p>
<p>
    第七章 投诉
</p>
<p>
    第三十二条 特资经纪人应严格遵循平台的业务规划及相关法律法规，按时、按量认真的完成项目委托方委托的尽调项目，以防引起投诉，从而带来不便。
</p>
<p>
    第三十三条 因项目信息时刻变动，平台只受理项目投资方下载尽调报之日起三日内的投诉，超出此期限的投诉，平台概不受理。
</p>
<p>
    第三十四条 平台收到投诉方对特资经纪人的相关投诉，平台会对投诉行为的真实性进行核实，确认投诉是否成立。
</p>
<p>
    第三十五条 对于投诉方的投诉行为，经平台核实如投诉方的投诉不成立，平台将驳回其投诉，并告知其驳回投诉的原因。
</p>
<p>
    第三十六条 对于投诉方的投诉行为，经平台核实如投诉方的投诉确实成立，平台即支持投诉方的投诉行为，特资经纪人应退回本项目收取的所有尽调费用、尽调报告查看/买断费用，并对其进行处罚（如降低评分、等级、限制接单数量等），若对项目投资方造成损失的，由特资经纪人进行赔偿。
</p>
<p>
    第三十七条 对被投诉成功的项目，特资经纪人应对被投诉项目的尽调报告进行调整，并重新上传平台审核。
</p>
<p>
    <br/>
</p>
<p>
    第八章 行为规范
</p>
<p>
    第三十八条 特资经纪人在平台提供服务时，必须遵循以下原则：
</p>
<p>
    （一）遵守中华人民共和国有关法律、法规；
</p>
<p>
    （二）遵守所有与平台有关的协议、规定和程序；
</p>
<p>
    （三）不得为任何非法目的而使用平台服务系统；
</p>
<p>
    （四）如发现任何非法使用特资经纪人帐号或帐号出现安全漏洞的情况，应立即通告平台。
</p>
<p>
    第三十九条 特资经纪人保证向平台提交的以下资料均真实、有效，包括但不限于：身份证明、学历及学位证明、相关从业资格证书、个人履历、个人照片、联系方式、工作单位、工作地址、邮箱、微信号等。如资料有任何变动，必须在平台上及时进行更新。
</p>
<p>
    第四十条 经纪人从事客户招揽和客户服务等活动，应当遵守法律、行政法规、监管机构和行政管理部门的规定、自律规则以及职业道德，自觉接受平台的管理，履行合同约定的义务。
</p>
<p>
    第四十一条 特资经纪人应保证所做尽调报告内容真实、可靠，不存在弄虚作假、欺骗项目投资方、项目委托方、本平台或其他第三人的行为。
</p>
<p>
    第四十二条 特资经纪人不得采用贬低平台其他特资经纪人等手段招揽业务或影响其他特资经纪人在本平台的评分、等级、接单数量等。
</p>
<p>
    第四十三条 特资经纪人应严格遵循平台所规定的资质审批、注册登记、业务培训、绩效考核、风险控制等。
</p>
<p>
    第四十四条 特资经纪人在平台提供服务时应时刻维护平台的形象及利益，不得有任何贬低平台形象、价值及利益的行为。
</p>
<p>
    第四十五条 特资经纪人对客户应当耐心、细致，认真听取客户的意见、建议并根据客户合理意见予以改进。
</p>
<p>
    第四十六条 特资经纪人不得泄露平台各方或其他第三人的商业秘密或个人隐私。
</p>
<p>
    第四十七条 其他违反法律、法规或平台相关规定的事项。
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
                    <a href="<?php echo U('Home/Index/baem',empty(session('user.MemberId'))?'':array('uic'=>authcode(session('user.MemberId'),'ENCODE')));?>">成为经纪人</a>
                    <a href="<?php echo U('Home/Index/buypro1');?>">特资经纪人申请协议</a>
                    <a href="<?php echo U('Home/Index/buypro2');?>">特资经纪人管理办法</a>
                    <a href="//www.3qqq.com/static/images/application.pdf" download ="application.pdf" target="_blank">全国城市划分</a>
                    <a href="//www.3qqq.com/static/images/City.pdf" download ="City.pdf" target="_blank">城市合伙人申请协议</a>

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