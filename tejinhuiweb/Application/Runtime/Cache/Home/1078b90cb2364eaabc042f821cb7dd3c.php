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
		<!-- header end -->
		<div class="main">
			<div class="agreenment">
				<div class="con">
					<h2>城市合伙人管理办法</h2>
<p>
    第一章 总则
</p>
<p>
    第一条 为规范湖南炜弘信息科技有限公司“特金汇”——特殊资产汇聚平台城市合伙人及其相关业务活动，加强城市合伙人的自律管理，明确城市合伙人权利与义务，维护正常的交易秩序，根据中华人民共和国相关法律法规和特金汇相关规定，制定本管理办法。&nbsp;
</p>
<p>
    第二条 本办法所称城市合伙人是指符合特金汇所规定的申请条件，依程序在特金汇注册、签订相关协议，并经特金汇批准，在特金汇平台许可的特定区域范围内从事特殊资产服务活动的法人或其他经济组织。&nbsp;
</p>
<p>
    第三条 所有城市合伙人均应遵守法律、法规和政策规定，遵守特金汇相关业务制度和管理制度。特金汇对城市合伙人相关交易及业务活动提供服务、指导并进行监督、管理。
</p>
<p>
    第四条 凡是依法设立并符合本办法规定条件的法人、其他组织，均可向特金汇提出申请，经审查批准，履行相关程序后，取得城市合伙人资格。申请人应当按要求向特金汇提交申请材料，并对所提交资料的真实性、准确性、完整性和合法性负责。
</p>
<p>
    第五条 特金汇平台对本办法享有解释与修改的权利。特金汇平台可随时对本办法进行修改，修改以后的本办法，特金汇将在平台上进行公示，城市合伙人无条件接受本办法的修改。
</p>
<p>
    <br/>
</p>
<p>
    第二章 准入条件
</p>
<p>
    第六条 申请成为特金汇城市合伙人需具备以下条件：
</p>
<p>
    （一）有志在特殊资产流转及集约化经营领域长远发展；
</p>
<p>
    （二）认同特金汇企业文化和经营理念，接受特金汇培训，服从特金汇总部管理；
</p>
<p>
    （三）为依法登记的法人或其他组织，并能够提供营业执照等相关证件交由特金汇总部审核；
</p>
<p>
    （四）拥有专职工作人员、独立办公场地及一辆以上用于开展特殊资产服务的车辆；
</p>
<p>
    （五）特金汇要求具备的其他条件。
</p>
<p>
    第七条 特金汇根据城市合伙人所在的城市向城市合伙人收取一定的平台管理费（北上广深为10万/年；二线以上城市为8万/年；其他城市为6万/年）（详见附表）。
</p>
<p>
    <br/>
</p>
<p>
    第三章 权利和义务
</p>
<p>
    第八条 城市合伙人的权利
</p>
<p>
    （一）在特金汇的授权范围内开展经营活动；
</p>
<p>
    （二）城市合伙人有权获得特金汇提供的经营技术；
</p>
<p>
    （三）城市合伙人有权获得特金汇提供的培训和指导；
</p>
<p>
    （四）向特金汇提出合法、合理的意见和建议。
</p>
<p>
    第九条 城市合伙人的义务
</p>
<p>
    （一）城市合伙人应具备在特金汇平台开展相关业务的技能，依国家相关法律、行政法规、监管机构和其他行政管理部门规定、行业公认的职业道德规范（以下统称“法律、法规、准则”），以及本办法约定从事相关活动，不进行本协议禁止的行为。
</p>
<p>
    （二）城市合伙人向特金汇及其他相关方提供的任何信息、资料是真实、准确、完整的，不存在虚假记载、误导性陈述或重大遗漏。
</p>
<p>
    （三）遵守国家法律、法规、准则及特金汇的相关规章制度，保守特金汇的商业秘密及交易信息，自觉维护特金汇的市场声誉及合法权益。
</p>
<p>
    （四）在特金汇许可的展业地域范围内从事经营活动；否则，特金汇有权视情节轻重给予警告、处罚、暂停与城市合伙人的合作、解除协议等处罚。&nbsp;
</p>
<p>
    （五）城市合伙人应按照特金汇的规定，严格执行特金汇的营销政策、渠道管理政策、客户管理政策，主动自觉地维护和规范相关业务市场。
</p>
<p>
    （六）城市合伙人应按本办法约定，按时按量向特金汇支付管理费。
</p>
<p>
    （七）依照特金汇的标准，保持经营场所的结构及形象，维护特金汇的名誉和形象。
</p>
<p>
    （八）城市合伙人有义务接受特金汇的指导和监督。
</p>
<p>
    （九）城市合伙人在展业过程中应遵守以下原则：
</p>
<p>
    1、诚信准则：必须遵守诚实信用原则，忠实履行义务，不得损害特金汇及其他客户的合法权益，不得对外提供任何可能导致他人对城市合伙人与特金汇关系产生误解的身份证明文件，包括介绍信、名片等；
</p>
<p>
    2、告知义务：必须如实向客户告知有关签订合同事项，不得故意隐瞒项目风险或故意扩大投资利益，不得进行不实、误导性的广告与宣传，尤其不得随意在互联网或其他媒体上作不实宣传，不得进行欺诈活动；
</p>
<p>
    3、保密准则：城市合伙人应按约定为特金汇保守商业机密，为特金汇及交易用户保守商业秘密及个人隐私，不得泄露；
</p>
<p>
    4、实名原则：城市合伙人须以真实身份从事展业活动，不得隐瞒或夸大身份，不得使用虚假身份。
</p>
<p>
    第四章 监督和管理
</p>
<p>
    第十条 城市合伙人必须遵守有关法律、法规、政策和特金汇的各项规则和办法，特金汇有权对城市合伙人执行交易规则和各项规定的情况进行监督检查，对城市合伙人开展相关交易、服务业务及相关系统使用安全等情况进行监控。
</p>
<p>
    第十一条 城市合伙人应遵守社会公共道德，相互尊重，严格自律，自觉维护正常的交易和交收秩序，认真履行应尽职责。
</p>
<p>
    第十二条 城市合伙人应充分行使享有的合法权利，自觉维护城市合伙人的合法权益和特金汇的商业声誉。
</p>
<p>
    第十三条 城市合伙人的对外宣传工作要遵守特金汇的统一部署，不得擅自对媒体发布未经特金汇审核的任何有关特金汇的信息、言论，不得进行虚假宣传，确保有关特金汇的对外宣传信息真实、完整和准确。
</p>
<p>
    第十四条 城市合伙人应当按照特金汇的要求参加特金汇组织的各项活动和特金汇召开的各种会议。
</p>
<p>
    第十五条 城市合伙人有下列行为之一的，特金汇有权视其行为性质和情节严重程度，给予警告、通报批评、罚款、限期整改、暂停交易、限制交易许可权、终止城市合伙人资格等处罚；涉嫌犯罪的，按法律程序提交司法机关。
</p>
<p>
    （一）未及时足额交纳相关费用的；
</p>
<p>
    （二）违反相关保密义务的；
</p>
<p>
    （三）城市合伙人因自身原因，未完成或不能正常完成相关交易业务，影响相关交易正常进行的；
</p>
<p>
    （四）城市合伙人行为有损其他城市合伙人、特金汇利益或声誉的；
</p>
<p>
    （五）提供虚假资料，制造并散布虚假信息，扰乱交易市场秩序的；
</p>
<p>
    （六）采用胁迫、欺诈、贿赂或恶意串通等不正当手段进行交易或者妨碍交易的；
</p>
<p>
    （七）其他违反法律法规规定从事交易的行为。
</p>
<p>
    第十六条 城市合伙人若对特金汇的处理决定有异议，有权自收到处理决定后十个工作日内，以书面形式向特金汇提请复议。对于城市合伙人的复议申请，特金汇受理并做出决定。复议期间不影响原处理决定的执行。
</p>
<p>
    <br/>
</p>
<p>
    第五章 保密条款
</p>
<p>
    第十七条 城市合伙人应对展业过程中知悉的一切信息进行保密。
</p>
<p>
    第十八条 城市合伙人须严格履行保密义务，保守特金汇的商业、技术、经营、管理、业务、财税、专利、档案资料及报酬支付等保密信息，除法律法规、政府主管部门要求及特金汇允许或授权外，不得以任何方式向第三方传播、披露；否则，承担相应法律责任。
</p>
<p>
    <br/>
</p>
<p>
    第六章 争议解决
</p>
<p>
    第十九条 城市合伙人和特金汇之间因本办法或展业活动发生任何纠纷或争议，首先应友好协商解决，协商不成，则应向特金汇总部所在地人民法院提起诉讼。
</p>
<p>
    &nbsp;
</p>
<p>
    第七章 附则
</p>
<p>
   第二十条 本办法未作规定的，适用特金汇的其他规定。
</p>
<p>
    第二十一条 本办法由特金汇负责解释和修订。如本办法有修订的，将在特金汇官方网站上发布公告，不再另行通知。
</p>
<p>
    第二十二条 本办法的最终解释权及随时修订权归特金汇所有。
</p>
<p>
    第二十三条 本办法自公布之日起实施。
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

	</body>

</html>