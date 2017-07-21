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

	<div class="agents">
		<div class="main">
			<div class="banner"></div>
			<div class="box1">
				<div class="info1">
					<div class="fl"><img src="//www.3qqq.com/static/images/common/agent1_06.jpg"></div>
					<div class="fr">
						<h1>特资经纪人</h1>
						<span>特资经纪人将手中持有的特殊资产（含金融机构资产包、单项目债权、大宗实物资产）信息，按平台统一标准的尽调报告格式发布，并自行设定查看报告的费用。投资方通过在线阅读尽调报告后，单独联系特资经纪人对接后续工作。直接锁定交易上下游、确保佣金不流失。</span>
						<a href="<?php echo U('Home/Index/visf_user',array('uic'=>authcode($user['MemberId'],'ENCODE'),'code'=>authcode('cc',ENCODE)));?>">立即成为特资经纪人>></a>
					</div>
				</div>
				
				<div class="info2">
					<div class="item">
						<em>01</em>
						<span>发布特殊资产</span>
						<span>项目信息</span>
					</div>
					<div class="icon"><img src="//www.3qqq.com/static/images/common/agent1_10.gif" ></div>
					<div class="item">
						<em>02</em>
						<span>上传项目尽职调查报告</span>
						<span>设定查看报告的费用</span>
					</div>
					<div class="icon"><img src="//www.3qqq.com/static/images/common/agent1_10.gif" ></div>
					<div class="item">
						<em>03</em>
						<span>投资方阅读</span>
						<span>尽调报告</span>
					</div>
					<div class="icon"><img src="//www.3qqq.com/static/images/common/agent1_10.gif" ></div>
					<div class="item">
						<em>04</em>
						<span>联系对接</span>
						<span>锁定交易</span>
					</div>
					<div class="icon"><img src="//www.3qqq.com/static/images/common/agent1_10.gif" ></div><div class="item">
						<em>05</em>
						<span>协助完成交易</span>
						<span>收取佣金</span>
					</div>
					
				</div>
			</div>
			<div class="box2">
				<div class="info1">
					<div class="fl"><img src="//www.3qqq.com/static/images/common/agent1_14.jpg"></div>
					<div class="fr">
						<h1>盈利空间丰厚</h1>
						<span>项目尽调报告阅读费、协助项目成交的佣金、协助融资的佣金、平台优秀经纪人分红等等，盈利模式不在单一，多劳多得。</span>
						<a href="<?php echo U('Home/Index/visf_user',array('uic'=>authcode($user['MemberId'],'ENCODE'),'code'=>authcode('cc',ENCODE)));?>">立即成为特资经纪人>></a>
					</div>
				</div>
			</div>
			<div class="box3"><img src="//www.3qqq.com/static/images/common/agent1_03.jpg"></div>
			<div class="box2">
				<div class="info1">
					<div class="fl"><img src="//www.3qqq.com/static/images/common/agent1_18.jpg"></div>
					<div class="fr">
						<h1>多维度培训</h1>
						<span>特金汇创始团队积累了多年的实操经验，沉淀了丰富的理论知识，专门针对特殊资产尽职调查环节推出的培训课程，轻松易懂，实用性强。多维度培训方案，一次培训，终身复训。</span>                      
						<a href="<?php echo U('Home/Index/visf_user',array('uic'=>authcode($user['MemberId'],'ENCODE'),'code'=>authcode('cc',ENCODE)));?>">立即成为特资经纪人>></a>
					</div>
				</div>
			</div>
		 <div class="box4">
		 	<div class="info1">
					<div class="fl"><img src="//www.3qqq.com/static/images/common/agent1_21.jpg"></div>
					<div class="fr">
						<h1>独家对接渠道</h1>
						<span>所有项目上传的资料，只会在特金汇平台展示，不会外流（平台只负责项目展示及项目定向推介的渠道，不会介入中介及处置环节，如遇到合适项目平台会通过资产管理公司自行收购）独家对接渠道，消除您的顾虑。</span>                                                                              
						<a href="<?php echo U('Home/Index/visf_user',array('uic'=>authcode($user['MemberId'],'ENCODE'),'code'=>authcode('cc',ENCODE)));?>">立即成为特资经纪人>></a>
					</div>
				</div>
			<div class="info2">
				<div class="agent-tan" id="agent-tan">
					<div class="title">
						<h2>复制以下您的专属推广链接发送给好友</h2> <em id="close">X</em></div>
					<div class="con"><input type="text" class="form-control" id="fe_text" value="<?php echo get_url();?>" onfocus="selectText()"></div>
				</div>
				<img src="//www.3qqq.com/static/images/common/agent1_07.jpg">
			</div>
		 	<div class="info3">
		 		<span><a href="<?php echo U('Home/Index/visf_user',array('uic'=>authcode($user['MemberId'],'ENCODE'),'code'=>authcode('cc',ENCODE)));?>"><img src="//www.3qqq.com/static/images/common/agent1_11.jpg"></a></span>
		 		<span><a href="<?php echo U('Home/Index/visf_user',array('uic'=>authcode($user['MemberId'],'ENCODE'),'code'=>authcode('cc',ENCODE)));?>"><img src="//www.3qqq.com/static/images/common/agent1_13.jpg"></a></span>
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

<script type="text/javascript">
	function selectText() {
		var user = document.getElementById("fe_text");
		user.select();

	}
</script>

<script>
	$(function() {
		$('#btn2').click(function() {
			$('#agent-tan').show();
		});
		$('#close').click(function() {
			$('#agent-tan').hide();
		});
	})
</script>

	</body>

</html>