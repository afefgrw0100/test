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
	.main{ background: #f5f5f5; margin-top: 8px; overflow: hidden;}
</style>
		<div class="main">
			<div class="pub_detail">
				<?php if($asset['AssetsStatue'] == 8): ?><div class="mask-buy" id="mask-buy"><span><img src="//www.3qqq.com/static/images/common/chengjiao.png"></span></div><?php endif; ?>
				<div class="box1">
					<div class="name"><?php echo ($pack["title"]); ?></div>
					<div class="time">发布时间：<?php echo ($pack["CreateTime"]); ?></div>
					<div class="line">
						<ul>
							<li><i class="iconfont">&#xe6ed;</i><em><?php echo empty($pack['ViewCount'])?"0":$pack['ViewCount'];?></em>人看过</li>
							<li class="share"><i class="iconfont">&#xe67e;</i><em><?php echo empty($pack['ShareCount'])?"0":$pack['ShareCount'];?></em>次分享</li>
							<li class="last"><i class="iconfont">&#xe604;</i><em><?php echo empty($pack['BuyCount'])?"0":$pack['BuyCount'];?></em>人付款</li>
						</ul>
					</div>
					<div class="btn1">

						<?php if(($pack['AssetsStatue'] != 8) ): if(($pack['AssetsStatue'] == 4) AND ($downurl != 88) AND ($pack['DueCreateMember'] != session('user.MemberId'))): ?><em class="price">¥<?php echo ($proinfo["ViewPrice"]); ?></em><a href="<?php echo U('User/Logic/buymic',array('type'=>'package',buyid =>$pack['PackageID'],'ismian'=>1));?>" class="buy">购买尽调报告</a><?php endif; ?>
							<?php if((($downurl == 88) OR ($pack['DueCreateMember'] == session('user.MemberId'))) AND ($pack['AssetsStatue'] == 4)): ?><a href="<?php echo U('User/Logic/downFile',array('type'=>'package',buyid =>$pack['PackageID'],'ismian'=>1));?>" class="buy" target="_blank">下载尽调</a>
								<if condition="($pack['AssetsStatue'] neq 7) AND ($pack['DueCreateMember'] neq session('user.MemberId'))">
														<span class="sale">
															<form method="get" action="<?php echo U('User/Logic/deal',array('type'=>'package',buyid =>$pack['PackageID'],'ismian'=>1));?>" id="deal">
																<em class="price">¥<?php echo ($proinfo["BuyPrice"]); ?>/天</em><a href="javascript:void(0);" class="buy">买断尽调报告</a>
																<div class="down">
																	<span>
																		<input type="text" class="form-control"  placeholder="买断天数" name="day" value="" id ="day"/>
																		<button  id="sut">购买</button>
																	</span>
																	<em>七天起买</em>
																	<em>30天以上打八折</em>
																</div>
															</form>
														</span>
									<span class="sale">
										<a href="javascript:;" class="buy2" id="apply">申请配资</a>
									</span><?php endif; endif; ?>
						</if>

					</div>

					<div class="agreen"><input type="checkbox" name="agreen" checked="" id="che">我已阅读并同意
						<a href="<?php echo U('Home/Index/buypro');?>">《尽调报告购买协议》</a>
					</div>
				</div>

			<div class="box4">
				<!--<div class="title"><img src="images/common/zcb_15.jpg"></div>-->
					<article id="pdfjs">
						<iframe src="<?php echo imgpublic($pack['DescPdf']);?>" width="1000" height="500"></iframe>
					</article>


				</div>

				<div class="star">
					<div class="notice">以上是“<strong><?php echo ($pack["title"]); ?></strong>”项目的尽调报告部分内容，如果您对本项目感兴趣，请点击“付款按钮”购买后查看详细的尽调报告。</div>
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


<div class="mask" id="mask">
	<div class="apply_content">
		<div class="agent-tan">
			<form action="<?php echo U('Home/Lists/dofinan',array('type'=>'package',buyid =>$pack['PackageID'],'ismian'=>1));?>" method="post" id="dddd">
				<div class="title"><h2>申请配资</h2> <em id="close">X</em></div>
				<ul>
					<li><em>项目名称：</em><b><?php echo ($pack["title"]); ?></b></li>
					<li><em>项目所在地区：</em><b><?php echo explode("|",$pack['OwnerAdress'][0])[1]; echo explode("|",$pack['OwnerAdress'][1])[1]; echo ($pack["OwnerAdress"]["2"]); ?></b></li>
					<li><em>项目整体购买金额：</em><b><?php echo ($pack["processmodle"]); ?>  元</b></li>
					<li><em>拟配资金额：</em><b><input type="text" class="form-control" id="request_quanlity" name="request_quanlity" nullmsg="请填写拟配资金额" /></b></li>
					<li><em>申请主体名称：</em><b><input type="text" class="form-control" id="contact_name" name="contact_name" nullmsg="请填申请主体名称"  /></b></li>
					<li><em>联系电话：</em><b><input type="text" class="form-control" id="contact_phone" name="contact_phone" nullmsg="请填写联系电话"  /></b></li>
				</ul>
				<div  class="submit">
					<input class="btn" type="submit" id="sub_mitfinan" value="提交"/>
				</div>
			</form>
		</div>

	</div>

</div>
		<script>
			$(function(){
				$("#apply").click(function(){
					$("#mask").show();	
				});
				$("#close").click(function(){
					$("#mask").hide();	
				})
				
			})
		</script>

	</body>

</html>