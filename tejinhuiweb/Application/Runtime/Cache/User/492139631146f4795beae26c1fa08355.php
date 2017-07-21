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

		<!-- main -->
<div class="main">
	<div class="tranning">
		<div class="tranning_c">
			<div class="ad"><img src="//www.3qqq.com/static/images/temp/tranning_ad.jpg"></div>
			<div class="con">
				<form method="post" action="<?php echo U('User/Economic/dotrai');?>" id="tain">
					<ul>
						<div class="item">一、单选题</div>
						<li>
							<div class="title">1. 在债的关系中，有要求他的债务人实施一定行为或者不实施一定行为的权利的当事人是：</div>
							<div class="option">
								<input type="radio" name="subject1" value="A" />
								<label><span>A</span>法院</label>
								<input type="radio" name="subject1" value="B" />
								<label><span>B</span>债权转让方</label>
								<input type="radio" name="subject1" value="C" />
								<label><span>C</span>检察院</label>
								<input type="radio" name="subject1" value="D" />
								<label><span>D</span>债权人</label>
							</div>

							<div class="result">
								<input type="hidden" value="D">
								<span class="error"><b>答案为：</b><em>D</em>,请重新作答！</span>
								<span class="true"><b>答案为：</b><em>D</em>,回答正确！</span>
							</div>
						</li>

						<li>
							<div class="title">2. 民事诉讼中，已经开始的强制执行，因发生某种特殊情况而暂时停止执行的程序是：</div>
							<div class="option">
								<input type="radio" name="subject2" value="A" />
								<label><span>A</span>终结执行  </label>
								<input type="radio" name="subject2" value="B" />
								<label><span>B</span>中止执行　</label>
								<input type="radio" name="subject2" value="C" />
								<label><span>C</span>终止执行   </label>
								<input type="radio" name="subject2" value="D" />
								<label><span>D</span>恢复执行</label>
							</div>
							<div class="result">
								<input type="hidden" value="B">
								<span class="error"><b>答案为：</b><em>B</em>,请重新作答！</span>
								<span class="true"><b>答案为：</b><em>B</em>,回答正确！</span>
							</div>
						</li>

						<li>
							<div class="title">3. 最高人民法院出台的一项司法解释，对拒不执行法院生效法律文书的"老赖”，将采取"限制高消费"的严厉措施，行业术语称为：</div>
							<div class="option">
								<input type="radio" name="subject3" value="A" />
								<label><span>A</span>查封</label>
								<input type="radio" name="subject3" value="B" />
								<label><span>B</span>限高令</label>
								<input type="radio" name="subject3" value="C" />
								<label><span>C</span>冻结</label>
								<input type="radio" name="subject3" value="D" />
								<label><span>D</span>扣划</label>
							</div>
							<div class="result">
								<input type="hidden" value="B">
								<span class="error"><b>答案为：</b><em>B</em>,请重新作答！</span>
								<span class="true"><b>答案为：</b><em>B</em>,回答正确！</span>
							</div>
						</li>

						<li>
							<div class="title">4. 根据尽调发现的可能存在的除了现在已经经过确认的债务人之外的潜在的对于项目债务承担一定责任的单位或者个人，是指以下哪种人：</div>
							<div class="option">
								<input type="radio" name="subject4" value="A" />
								<label><span>A</span>抵押人</label>
								<input type="radio" name="subject4" value="B" />
								<label><span>B</span>潜在债务人</label>
								<input type="radio" name="subject4" value="C" />
								<label><span>C</span>关联人</label>
								<input type="radio" name="subject4" value="D" />
								<label><span>D</span>保证人</label>
							</div>
							<div class="result">
								<input type="hidden" value="B">
								<span class="error"><b>答案为：</b><em>B</em>,请重新作答！</span>
								<span class="true"><b>答案为：</b><em>B</em>,回答正确！</span>
							</div>
						</li>

						<li>
							<div class="title">5. 根据不良资产处置时机对资产项目进行的分类，项目组根据处置商机的变化可随时处置的资产属于：</div>
							<div class="option">
								<input type="radio" name="subject5" value="A" />
								<label><span>A</span>必须处置的资产</label>
								<input type="radio" name="subject5" value="B" />
								<label><span>B</span>相机处置的资产</label>
								<input type="radio" name="subject5" value="C" />
								<label><span>C</span>待升值处置的资产</label>
								<input type="radio" name="subject5" value="D" />
								<label><span>D</span>暂无法处置的资产</label>
							</div>
							<div class="result">
								<input type="hidden" value="B">
								<span class="error"><b>答案为：</b><em>B</em>,请重新作答！</span>
								<span class="true"><b>答案为：</b><em>B</em>,回答正确！</span>
							</div>
						</li>

					</ul>

					<ul>
						<div class="item">二、判断题</div>

						<li>
							<div class="title">6. 债权凭证是指所有真实记录和反映公司在不良资产项目中的资产明细，债权债务关系、产权关系以及相关情况的契约、凭据和其他相关资料：</div>
							<div class="option">
								<input type="radio" name="subject8" value="A" />
								<label>√</label>
								<input type="radio" name="subject8" value="B" />
								<label>×</label>
							</div>
							<div class="result">
								<input type="hidden" value="B">
								<span class="true"><b>答案为：</b><em>X</em>,回答正确！</span>
								<span class="error"><b>答案为：</b><em>X</em>,项目档案是指所有真实记录和反映公司在不良资产项目中的资产明细，债权债务关系、产权关系以及相关情况的契约、凭据和其他相关资料</span>
							</div>
						</li>

						<li>
							<div class="title">7.股权资产包括：政策性债转股形成的股权资产、商业性债转股形成的股权资产、划转投资中的股权资产、资产置换和以资产抵债形成的股权资产等：</div>
							<div class="option">
								<input type="radio" name="subject9" value="A" />
								<label>√</label>
								<input type="radio" name="subject9" value="B" />
								<label>×</label>
							</div>
							<div class="result">
								<input type="hidden" value="A">
								<span class="error"><b>答案为：</b><em>√</em>,请重新作答！</span>
								<span class="true"><b>答案为：</b><em>√</em>,回答正确！</span>
							</div>
						</li>

						<li>
							<div class="title">8. 企业的不良资产是指企业尚未处理的资产净损失和潜亏(资金)挂账，以及按财务会计制度规定应提未提资产减值准备的各类有问题资产预计损失金额：</div>
							<div class="option">
								<input type="radio" name="subject10" value="A" />
								<label>√</label>
								<input type="radio" name="subject10" value="B" />
								<label>×</label>
							</div>
							<div class="result">
								<input type="hidden" value="A">
								<span class="error"><b>答案为：</b><em>√</em>,请重新作答！</span>
								<span class="true"><b>答案为：</b><em>√</em>,回答正确！</span>
							</div>
						</li>

						<li>
							<div class="title">9. 损失类贷款是指在采取所有可能的措施或一切必要的法律程序后，本息仍然无法收回，或只能收回极少部分的贷款：</div>
							<div class="option">
								<input type="radio" name="subject11" value="A" />
								<label>√</label>
								<input type="radio" name="subject11" value="B" />
								<label>×</label>
							</div>
							<div class="result">
								<input type="hidden" value="A">
								<span class="error"><b>答案为：</b><em>√</em>,请重新作答！</span>
								<span class="true"><b>答案为：</b><em>√</em>,回答正确！</span>
							</div>
						</li>

						<li>
							<div class="title">10. 不良资产所有人根据项目的特点、区域、行业类别等将三户以上的单项目组成资产包，购买人也可以自由挑选组包购买，三户以上即可称为资产包：</div>
							<div class="option">
								<input type="radio" name="subject12" value="A" />
								<label>√</label>
								<input type="radio" name="subject12" value="B" />
								<label>×</label>
							</div>
							<div class="result">
								<input type="hidden" value="B">
								<span class="true"><b>答案为：</b><em>×</em> 不良资产所有人根据项目的特点、区域、行业类别等将２户以上的单项目组成资产包，购买人也可以自由挑选组包购买，２户以上即可称为资产,回答正确！</span>
								<span class="error"><b>答案为：</b><em>×</em>,请重新作答！</span>

							</div>
						</li>

					</ul>

					<div class="submit1"><input type="submit" value="提交答卷" id="submitQuestions" class="btn"></div>
				</form>
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

<script>
	$(function() {
		$('input[type=radio]').change(function() {

			var val = $(this).val();
			if($(this).parent('div').next().find('input').val() == val) {
				$(this).parent().parent().addClass("clickQue");
				$(this).parent('div').next().find('span.true').show();
				$(this).parent('div').next().find('span.error').hide();
			} else {
				$(this).parent().parent().removeClass("clickQue");
				$(this).parent('div').next().find('span.true').hide();
				$(this).parent('div').next().find('span.error').show();
			}
		})

		$("#submitQuestions").click(function() {
			var Length_li=$('.tranning_c .con ul li').length;
			var Length_select=$('.clickQue').length;

			if(Length_li ==Length_select){
				$("#tain").submit();
			}else {
				alert("已做答对:" + ($(".clickQue").length) + "道题,还有" + (Length_li - ($(".clickQue").length)) + "道题未完成");
				return false;
			}
		})
	})
</script>


		<!--main end -->


	</body>

</html>