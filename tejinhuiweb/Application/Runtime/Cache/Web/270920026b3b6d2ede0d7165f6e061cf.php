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

		<!-- header end -->
<div class="main">
	<div class="publish">

		<div class="con">
			<div class="ad">请选择您要发布的信息类型</div>
			<div class="title">
				<h2 id="title">请选择</h2>
				<div class="line"></div>
			</div>
			<ul>
				<li><a href="<?php echo U('Web/Index/assetsLease');?>" ><i class="iconfont">&#xe610;</i><b>我要出租</b></a></li>
				<li><a href="<?php echo U('Web/Index/assets');?>"><i class="iconfont">&#xe730;</i><b>我要转让</b></a></li>

			</ul>
			<div class="form-agreen">
				<input type="checkbox" name="agreen"   id="agreen">阅读并同意
				<a href="javascript:;" id="protocol" data-toggle="modal" data-target="#mymodal-data">《特金汇发布项目须知》</a>

				<div class="modal" id="mymodal-data" tabindex="-1" role="dialog" >
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title">项目发布须知</h4>
							</div>
							<div class="modal-body">
								<p>
									特金汇是一个特殊资产流转平台，平台招募全国各地志在从事特殊资产的同仁成为平台特资经纪人、城市合伙人，为项目持有方提供项目推介、撮合对接等服务，帮助项目持有方实现项目快速对接，为项目投资方提供优质项目信息、详细的尽职调查报告，平台以用户需求为发展导向，发现需求，满足需求，通过“互联网＋”模式共享大数据资源，让项目信息流转变得简单、高效、放心。现将特金汇平台特资经纪人发布特殊资产项目的具体要求、发布流程、审核标准，公布如下：
								</p>
								<p>
									一、项目具体要求
								</p>
								<p>
									1、发布项目的标的须是不动产如土地、厂房、写字楼、门面、商场、别墅等大宗实体物业，商品房、动产及其他财产权利均不属于该范畴。
								</p>
								<p>
									2、转让类大宗资产标的价值按城市经济发达程度进行划分：北上广深标的评估价值须大于3000万；二线及以上城市标的评估价值须大于2000万；其他城市标的评估价值须大于1000万（城市划分详见平台“全国城市划分”）。
								</p>
								<p>
									3、出租类大宗资产标的价值按城市经济发达程度进行划分：北上广深标的年租金额须大于300万；二线及以上城市标的年租金额须大于200万；其他城市标的年租金额须大于100万（城市划分详见平台“全国城市划分”）。
								</p>
								<p>
									4、发布的出售、出租项目要求价格应等于或低于市价。
								</p>
								<p>
									5、尽调报告的格式沿用平台“会员中心”公布的版本，内容必须完整（正文部分必须包含定义、项目总体情况介绍、资产方情况、产权证情况、资产状况、项目盈利分析、项目风险分析、综合结论）。
								</p>
								<p>
									6、尽调报告中项目的联系人必须是特资经纪人本人，并且尽调报告中须有产权文书、物业照片、业主名称、法人资产方企业报告、同类型物业出租出售价格对比等内容。
								</p>
								<p>
									7、严禁从任何网站或地方摘抄、复制相关内容上传至平台。
								</p>
								<p>
									8、特资经纪人应保障项目信息的真实，并无其他虚假宣传等内容。
								</p>
								<p>
									二、项目发布流程
								</p>
								<p>
									在特金汇平台发布项目的前提为具备特金汇特资经纪人身份，特资经纪人发布项目至平台只需登录特资经纪人账号，点击“发布项目”并按平台提示填写所发布项目相关内容，再点击“发布”按钮即可轻松上传项目。以下为发布项目的具体操作流程。
								</p>
								<p>
									1、点击“发布项目”平台显示相应页面，特资经纪人根据所发布项目的类型选择“转让”或“出租”并点击。
								</p>
								<p>
									2、选择所发布项目的类型后，平台显示实物发布页面，特资经纪人根据页面显示填写相应内容（补充说明、凭证上传为可选择性内容，可填可不填），后点击“提交”。
								</p>
								<p>
									3、点击“提交”按钮后平台显示实物尽调发布页面，页面显示信息如下：项目描述（简单描述项目出售/出租的情况）；资产情况介绍（包含但不限于资产具体位置、面积、目前现状、项目优势亮点等，可在尽调报告中摘取相应内容）；
								</p>
								<p>
									尽调报告介绍（详细介绍项目尽调的范围、尽调的途径及尽调报告包含的内容）；
								</p>
								<p>
									尽调报告压缩包（将完整尽调报告的PDF版本上传）；尽调报告部分公开展示（将预览版PDF尽调报告上传）；标题展示（自行选择一张实地照片作为项目封面）；资产图片（平台要求至少上传三张。前两张为资产实地照片，第三张为百度地图上相应位置的截图）；购买报告费用设置（查看费用一般为10-300元/次、买断费用一般为20-2000元/天，具体费用由资产经纪人自行决定，我们一般定价100元/次，可供参考）。填写完以上内容后，点击“提交”按钮，项目即发布成功，等待特金汇后台工作人员审核。
								</p>
								<p>
									三、项目审核标准
								</p>
								<p>
									特金汇针对特资经纪人上传的特殊资产项目，已安排专门后台工作人员及时进行审核，具体审核标准如下：
								</p>
								<p>
									1、核实所上传项目标的是否属于特金汇要求的土地、厂房、写字楼、门面、商场、别墅等大宗实体物业。
								</p>
								<p>
									2、核实所上传项目标的评估价值是否符合特金汇明确规定的对应城市的价值要求。
								</p>
								<p>
									3、核实是否虚高标的物价值，项目出售、出租价格是否等于或低于当地市场价值。
								</p>
								<p>
									4、核实尽调报告形式是否符合特金汇所公布的尽调报告形式，正文部分是否包含定义、项目总体情况介绍、资产方情况、产权证情况、资产状况、项目盈利分析、项目风险分析、综合结论等，报告内容前后文是否一致，有无其他错误（包含但不限于错别字、格式错误等）。
								</p>
								<p>
									5、核实尽调报告中联系人是否特资经纪人，是否提供项目产权文书、物业照片、位置截图、业主名称、法人资产方企业报告、同类型物业出租出售价格对比等。
								</p>
								<p>
									如通过审核发现特资经纪人所上传的项目不符合特金汇对标的类型、价值的规定，将直接审核不通过；如审核发现所上传项目存在除不符合特金汇对标的类型、价值规定以外的问题，审核人员将及时与特资经纪人取得联系，要求对其内容进行修改、调整，直至符合特金汇公布的上传项目要求，并审核通过；如所发布项目内容均符合特金汇公布的上传项目要求，后台工作人员将及时审核通过。
								</p>
							</div>
						</div>
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

<script type="text/javascript">
	$(function(){
		$('.publish ul li').click(function(){

			if($('#agreen').is(':checked')==false){
				filterWarn("您必须阅读并同意《特金汇发布项目须知》");
				return false;
			}
		})


	})
</script>

	</body>
</html>