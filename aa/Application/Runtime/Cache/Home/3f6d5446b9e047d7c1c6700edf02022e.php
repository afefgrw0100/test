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
                        <a href="<?php echo U('Home/Lists/lists');?>">找项目 </a>
                        <ul>
                            <li><a href="<?php echo U('Home/Lists/lists',array('type'=>11));?>">转让</a></li>
                            <li><a href="<?php echo U('Home/Lists/lists',array('type'=>15));?>">出租</a></li>
                            <li><a href="<?php echo U('Home/Lists/lists',array('type'=>14));?>">司法拍卖</a></li>
                        </ul>
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
                <a href="<?php echo U('User/Member/index');?>" id="cselect"><?php echo empty(session('user.MemberId'))?"登录/注册":"会员中心";?></a>
            </div>
        </div>

    </div>
</div>
<!-- header end -->
<style>
	.bdsharebuttonbox{ display: block; border: none; margin: 0 auto; width: 150px; overflow: hidden; position: static;}
	.bdsharebuttonbox a{ margin-right: 20px;}
</style>
		<div class="main">
			<div class="agent">
				<div class="banner"><img src="//www.3qqq.com/static/images/common/agent_03.jpg"></div>
				<div class="con">
					<div class="info1">
						<div class="title"><h2>经纪人基本信息</h2><b><img src="<?php echo empty($user['HeadImg'])?'//www.3qqq.com/static/images/user/man_03.jpg':headimg($user['HeadImg'],116,116);?>"></b></div>
						<div class="content">
							<ul>
								<li><b>用户名称： </b><em><?php echo ($user["MemberName"]); ?></em></li>
								<li><b>用户类型：</b><em><?php echo ($user["MemberType"]["CodeName"]); ?></em></li>
								<li><b>已上传项目数量：</b><em><?php echo ($user["pronum"]); ?></em></li>
								<li><b>发布尽调报告数量：</b><em><?php echo ($user["make"]); ?></em></li>
								<li><b>分享地址：</b><em><?php echo ($user["host"]); ?></em></li>
								<li><b>评价等级：</b><em class="xing"><b class="g-star<?php echo ($user["StarLevel"]["name"]); ?>"></b></em></li>
							</ul>

						</div>
						<div class="tj_btn">
							<a href="javascript:void(0);" class="share"><img src="//www.3qqq.com/static/images/common/agent_11.jpg"></a>
							<a href="<?php echo U('Home/Index/visf_user',array('uic'=>authcode($user['MemberId'],'ENCODE')));?>"><img src="//www.3qqq.com/static/images/common/agent_08.jpg"></a>
						</div>
					</div>
					
					<div class="info1">
						<div class="title"><h2>用户发布信息</h2></div>
						<div class="news">
							<div class="fl">
								<h2>已上传的项目</h2>
								<ul>
									<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Home/lists/content',empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?'':array('PackageID'=>$vo['PackageID'])):array('AssetsID'=>$vo['AssetsID'])):array('DebtID'=>$vo['DebtID']));?>" target="_parent"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div>
							<div class="fl">
								<h2>尽调报告项目</h2>
								<ul>
									<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lvo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Home/lists/content',empty($lvo['DebtID'])?(empty($lvo['AssetsID'])?(empty($lvo['PackageID'])?'':array('PackageID'=>$lvo['PackageID'])):array('AssetsID'=>$lvo['AssetsID'])):array('DebtID'=>$lvo['DebtID']));?>" target="_parent"><?php echo ($lvo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
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


<div class="mask">

	<div class="popups clearfix">
		<h2>分享到：</h2>

		<div class="shares">
			<div class="bdsharebuttonbox">
				<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
				<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
				<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
			</div>
			<script>
				window._bd_share_config = {
					"common": {
						"bdSnsKey": {},
						"bdText": "",
						"bdMini": "2",
						"bdPic": "",
						"bdStyle": "0",
						"bdSize": "32"
					},
					"share": {}
				};
				with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
			</script>
		</div>

		<div class="close">关闭</div>
	</div>
</div>


	</body>
</html>