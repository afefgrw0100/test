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
		<div class="directstore" >
		<div class="main">
			<div class="banner" style="background: url(<?php echo imgpublic($img_logo_photo['url']);?>) no-repeat center top; height: 560px;"></div>
			<div class="box">
			<div class="box1 num1">
				<ul>
					<li class="parent"><i class="iconfont">&#xe611;</i><span><b><?php echo ($Auc_user_a_count); ?></b><p>合伙人数量</p></span></li>
					<li class="agent"><i class="iconfont">&#xe60c;</i><span><b><?php echo ($Auc_user_b_count); ?></b><p>经纪人数量</p></span></li>

				</ul>
			</div>
			<?php if(is_array($user_in)): $i = 0; $__LIST__ = $user_in;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uvo): $mod = ($i % 2 );++$i;?><div class="box2">
				<div class="fl">
					<?php if(empty($uvo['intImg'])): ?><img src="http://placehold.it/390x240">
						<?php else: ?>
						<img src="<?php echo imgpublic($uvo['intImg']);?>?imageView2/2/w/390/h/240"><?php endif; ?>

				</div>
				<div class="fl">
					<span>
						<h2>合伙人介绍</h2>
						<p><em>联&nbsp;&nbsp;系&nbsp;&nbsp;人：</em><b><?php echo ($uvo["RealName"]); ?></b></p>
						<p><em>电 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：</em><b><?php echo ($uvo["CellPhone"]); ?></b></p>

						<p><em>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：</em><b><?php echo ($uvo["pname"]); echo ($uvo["cname"]); echo ($uvo["Street"]); ?></b></p>
						<p><em>业务类型：</em><b><?php echo ($uvo["memo"]); ?></b></p>

						<div class="btn-block">
							<a href="<?php echo U('User/Index/region');?>" class="btn1">成为特资经纪人</a>
							<a href="" class="btn2 clickVer"  data-toggle="modal" data-target="#mymodal-data<?php echo ($uvo["MemberId"]); ?>">项目委托</a>
						</div>
						<!-- 模态弹出窗内容 -->
						<div class="modal" id="mymodal-data<?php echo ($uvo["MemberId"]); ?>" tabindex="-1" role="dialog" >
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span>&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title">项目委托</h4>
									</div>
									<div class="modal-body">
										<div class="item">该服务中心位于：<?php echo ($cityname["pname"]); echo ($cityname["name"]); ?>，服务类型为：<?php echo ($uvo["memo"]); ?>
										</div>
										<div class="con">
											<div class="fl">
												<form action="<?php echo U('Home/Index/adddirct',array('mid'=>$uvo['MemberId']));?>" method="post" class="registerform">
													<div class="form-group">
														<div class="clearfix">
															<label>项目位置：</label>
															<button class="btn btn-default" type="button" id="dropdownMenu1" disabled="disabled" >
																<input type="hidden" value="<?php echo ($cityname["pname"]); ?> " name="province"> <em><?php echo ($cityname["pname"]); ?> </em>  <span class="caret"></span>  </button>

															<button class="btn btn-default" type="button" id="dropdownMenu2" disabled="disabled">
																<input type="hidden" value="<?php echo ($cityname["name"]); ?> " name="city"> <em><?php echo ($cityname["name"]); ?> </em>  <span class="caret"></span>  </button>
															<div class="dropdown">
																<button class="btn btn-default" type="button" id="dropdownMenu3" data-toggle="dropdown">
																	<input type="hidden" value="" name="area" datatype="*" nullmsg="请选择地区！" errormsg="请选择地区！"> <em>地区</em> <span class="caret"></span>  </button>
																<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
																	<?php if(is_array($areaInfo)): $i = 0; $__LIST__ = $areaInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$areavo): $mod = ($i % 2 );++$i;?><li role="presentation">
																		<a role="menuitem" tabindex="-1" val="<?php echo ($areavo["name"]); ?>" ><?php echo ($areavo["name"]); ?></a>
																	</li><?php endforeach; endif; else: echo "" ;endif; ?>

																</ul>

															</div>

														</div>

													</div>
													<div class="form-group">
														<div class="clearfix">
															<label>项目类型：</label>
															<div class="dropdown">
																<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown">
																	<input type="hidden" value="" name="etype" datatype="*" nullmsg="请选择项目类型！" errormsg="请选择项目类型！"> <em>请选择</em>  <span class="caret"></span>  </button>

																<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
																	<li role="presentation">
																		<a role="menuitem" tabindex="-1" val="1" >土地</a>
																	</li>
																	<li role="presentation">
																		<a role="menuitem" tabindex="-1"  val="2" >写字楼</a>
																	</li>
																	<li role="presentation">
																		<a role="menuitem" tabindex="-1"  val="3" >商业</a>
																	</li>
																	<li role="presentation">
																		<a role="menuitem" tabindex="-1"   val="4" >住宅</a>
																	</li>

																</ul>
															</div>

															<div class="dropdown">
																<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu5" data-toggle="dropdown">
																	<input type="hidden" value="" name="ptype" datatype="*" nullmsg="请选择项目类型！" errormsg="请选择项目类型！"> <em>请选择</em> <span class="caret"></span>  </button>

																<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu5">


																</ul>
															</div>


														</div>
													</div>
													<div class="form-group">
														<div class="clearfix">
															<label>处置方式：</label>
															<div class="dropdown">
																<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu6" data-toggle="dropdown">
																	<input type="hidden" value="" name="manage" datatype="*" nullmsg="请选择处置方式！" errormsg="请选择处置方式！"> <em>请选择</em> <span class="caret"></span>  </button>

																<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
																	<li role="presentation">
																		<a role="menuitem" tabindex="-1"  val="1">转让</a>
																	</li>
																	<li role="presentation">
																		<a role="menuitem" tabindex="-1"  val="2">出租</a>
																	</li>

																</ul>
															</div>
														</div>


													</div>
													<div class="form-group">
														<div class="clearfix">
															<label>项目联系人：</label> <input class="form-control" placeholder="请输入你的姓名" type="text" name="name"  datatype="s2-18" nullmsg="请输入你的姓名！" errormsg="请输入你的姓名！" />
														</div>

													</div>
													<div class="form-group">
														<div class="clearfix"><label>联系人电话：</label> <input class="form-control" type="text" id="phone<?php echo ($uvo["MemberId"]); ?>" name="phone" datatype="m" nullmsg="手机号码不能为空！" errormsg="手机号码不正确！" /></div>
														<div class="onError" style="display: none">手机号码不能为空</div>
													</div>
													<div class="form-group">
														<div class="clearfix">
															<label>图形验证码：</label> <input class="form-control" type="text" name="verify" datatype="s2-18" nullmsg="请输入图形验证码！" errormsg="请输入图形验证码！"  /><em><img class="verify_img" src="/index.php?m=Web&amp;c=Checkcode&amp;a=index&amp;length=4&amp;font_size=16&amp;width=120&amp;height=45&amp;charset=1234567890&amp;use_noise=1&amp;use_curve=0&amp;time=0.5246274670379651" onclick="this.src='/index.php?m=Web&amp;c=Checkcode&amp;a=index&amp;length=4&amp;font_size=16&amp;width=120&amp;height=45&amp;charset=1234567890&amp;use_noise=1&amp;use_curve=0&amp;time='+Math.random();" style="cursor: pointer;" title="点击获取"></em>
														</div>
													</div>

													<div class="form-group">
														<div class="clearfix">
															<label>手机验证码：</label> <input class="form-control" name="phonecode" datatype="s2-18" nullmsg="请输入手机验证码！" errormsg="请输入手机验证码！"  /> <em><input value="获取验证码" type="button" class="btn btn-primary phone" phone="#phone<?php echo ($uvo["MemberId"]); ?>" ></em>
														</div>
													</div>
													<div class="form-btn clearfix">
														<a  class=" btn btn-primary btnSubmit">立即申请</a>
														<em class="">*为了您的权益，您的隐私将被严格保密</em>
													</div>

												</form>
											</div>
											<div class="steps">
												<div class="title">简单3步<br />特殊资产流转省时省心</div>
												<p>
													Step1：<br/>特资经纪人电话回访，实地考察<br>并撰写、上传尽调报告，全网发布。
												</p>
												<i class="iconfont">&#xe675;</i>

												<p>
													Step2：<br/>特资经纪人线下客户带看，提供<br>尽调报告，意向客户签订居间协议。
												</p>
												<i class="iconfont">&#xe675;</i>
												<p>
													Step3：<br/>签订流转合同，<br>完成资产流转交易。
												</p>

											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</span>
					
					
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<div class="box3">
				<div class="title"><h2>项目列表</h2><em><a href="<?php echo U('Home/Lists/lists');?>">更多>></a></em></div>
					<div class="nTab"> 
		<div class="TabTitle">
		<ul id="myTab">
		<li class="active" onmouseover="nTabs(this,0);">转让</li>
		<li class="normal" onmouseover="nTabs(this,1);">出租</li>	
		<!--<li class="normal" onmouseover="nTabs(this,2);">拍卖</li>-->
		</ul>
		</div>
	    <div class="TabContent">
			<div id="myTab_Content0">
				
				<div class="con">
					<ul>
						<?php if(is_array($info_c)): $i = 0; $__LIST__ = $info_c;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_c): $mod = ($i % 2 );++$i;?><li>
							<a href="<?php echo U('Home/lists/content/',array('AssetsID'=>$vo_c['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>">
								<div class="pic">
									<?php if(empty($vo_c['titimg'])): ?><img src="	http://placehold.it/250x180">
										<?php else: ?>
										<img src="<?php echo imgpublic($vo_c['titimg']);?>?imageView2/2/w/250/h/180"><?php endif; ?>
								</div>
								<div class="price"><em>转让金额：</em> <span><b class="numtenhousand"><?php echo ($vo_c["ProPrice"]); ?></b>元</span></div>
								<div class="oldPrice"><em>资产金额：</em> <span><b class="numtenhousand"><?php echo ($vo_c["Price"]); ?></b>元</span></div>
								<div class="info">
									<span><em>资产类型：</em><b><?php echo C('asset_type')[$vo_c['AssetsType']];?></b></span>
									<span class="fr"><i class="iconfont">&#xe639;</i><b><?php echo ($cityname["name"]); ?></b></span>
								</div>
							</a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			
				
			</div>
			<div id="myTab_Content1" class="none">
				
				<div class="con">
					<ul>
						<?php if(is_array($info_b)): $i = 0; $__LIST__ = $info_b;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_b): $mod = ($i % 2 );++$i;?><li>
								<a href="<?php echo U('Home/lists/content/',array('AssetsIDrent'=>$vo_b['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>">
									<div class="pic">
										<?php if(empty($vo_b['titimg'])): ?><img src="	http://placehold.it/250x180">
											<?php else: ?>
											<img src="<?php echo imgpublic($vo_b['titimg']);?>?imageView2/2/w/250/h/180"><?php endif; ?>


									</div>
									<div class="price"><em>出租金额：</em> <span><b class="numtenhousand"><?php echo ($vo_b["ProPrice"]); ?></b>元</span></div>
									<div class="oldPrice"><em>资产金额：</em> <span><b class="numtenhousand"><?php echo ($vo_b["Price"]); ?></b>元</span></div>
									<div class="info">
										<span><em>资产类型：</em><b><?php echo C('asset_type')[$vo_b['AssetsType']];?></b></span>
										<span class="fr"><i class="iconfont">&#xe639;</i><b><?php echo ($cityname["name"]); ?></b></span>
									</div>
								</a>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>

						
					</ul>
				</div>
			
				
			</div>
			<!--<div id="myTab_Content2" class="none">-->
				<!---->
				<!--<div class="con">-->
					<!--<ul>-->
						<!--<?php if(is_array($info_a)): $i = 0; $__LIST__ = $info_a;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_a): $mod = ($i % 2 );++$i;?>-->
							<!--<li>-->
								<!--<a href="<?php echo U('Home/lists/content/',array('AssetsID'=>$vo_a['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>">-->
									<!--<div class="pic"><img src="<?php echo imgpublic($vo_a['titimg']);?>?imageView2/2/w/250/h/180"></div>-->
									<!--<div class="price"><em>起拍金额：</em> <span><b class="numtenhousand"><?php echo ($vo_a["ProPrice"]); ?></b>元</span></div>-->
									<!--<div class="oldPrice"><em>资产金额：</em> <span><b class="numtenhousand"><?php echo ($vo_a["Price"]); ?></b>元</span></div>-->
									<!--<div class="info">-->
										<!--<span><em>资产类型：</em><b><?php echo C('Aucassetstype')[$vo_a['AssetsType']];?></b></span>-->
										<!--<span class="fr"><i class="iconfont">&#xe639;</i><b><?php echo ($cityname["name"]); ?></b></span>-->
									<!--</div>-->
								<!--</a>-->
							<!--</li>-->
						<!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
					<!--</ul>-->
				<!--</div>-->
			<!---->
			<!---->
			<!--</div>-->
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

<script  type="text/javascript" charset="utf-8" src="<?php echo tempurl('//www.3qqq.com/static/js/Validform_v5.3.2_min.js');?>"></script>
<script type="text/template" id="land">
	<li role="presentation">
		<a role="menuitem" tabindex="-1"  val="1" >工业用地</a>
	</li>
	<li role="presentation">
		<a role="menuitem" tabindex="-1"  val="2" >商业用地</a>
	</li>
	<li role="presentation">
		<a role="menuitem" tabindex="-1"  val="3" >住宅用地</a>
	</li>
	<li role="presentation">
		<a role="menuitem" tabindex="-1"  val="4" >商住两用地</a>
	</li>
</script>
<script type="text/template" id="residence">
	<li role="presentation">
		<a role="menuitem" tabindex="-1"  val="1">别墅</a>
	</li>
	<li role="presentation">
		<a role="menuitem" tabindex="-1"  val="2">洋房</a>
	</li>
	<li role="presentation">
		<a role="menuitem" tabindex="-1"  val="3">普通住宅</a>
	</li>

</script>
<script>
	$(document).ready(function() {

		$(".registerform").Validform({
			btnSubmit:'.btnSubmit',
			ajaxPost:true,
			callback:function(data){
				if(data.status==1){

					setTimeout(function(){
						$.Hidemsg(); //公用方法关闭信息提示框;显示方法是$.Showmsg("message goes here.");
						window.location.reload();
					},2000);
				}else {
					$(".verify_img").attr("src",verify());
				}
			}
		});
		$(".clickVer").click(function(){
			var clickVerId =  $(this).attr("data-target");
			$(clickVerId).find(".verify_img").attr("src",verify());
		});
		$(".dropdown-menu").on("click","li a",function(){
			var slehtml = $(this).html();
			var sleval = $(this).attr("val");

			$(this).parents(".dropdown").children("button").children("input").val(sleval);
			$(this).parents(".dropdown").children("button").children("em").html(slehtml);
			if(slehtml=="土地"){
				var landhtml = $("#land").html();
				$(this).parents(".dropdown").next().children("ul").html(landhtml);
				$(this).parents(".dropdown").next().children("button").children("input").val("");
				$(this).parents(".dropdown").next().children("button").children("em").html("请选择");
			}
			if(slehtml=="住宅"){
				var landhtml = $("#residence").html();
				$(this).parents(".dropdown").next().children("ul").html(landhtml);
				$(this).parents(".dropdown").next().children("button").children("input").val("");
				$(this).parents(".dropdown").next().children("button").children("em").html("请选择");
			}
			if(slehtml=="写字楼"||slehtml=="商业"){
				var landhtml = "";
				$(this).parents(".dropdown").next().children("ul").html(landhtml);
				$(this).parents(".dropdown").next().children("button").children("input").val(0);
				$(this).parents(".dropdown").next().children("button").children("em").html("无选项");
			}
			console.log(slehtml);
		});

		function verify(){
			return '/index.php?m=Web&c=Checkcode&a=index&length=4&font_size=16&width=120&height=45&charset=1234567890&use_noise=1&use_curve=0&time='+Math.random();
		};

		var murl ="<?php echo U('Portal/Index/mcode');?>";
		var cc =1;
		$(".phone").click(function(){
			//var ccc = $("#sub_mit").trigger("click");
			//return false;
			var clickthis = $(this);
			var phoneNumber = $(clickthis.attr("phone")).val();
			if(!( /^0{0,1}(13[0-9]|14[0-9]|17[0-9]|15[0-9]|153|156|18[0-9])[0-9]{8}$/.test(phoneNumber))){
				$(".onError").css("display","block");
				$(".onError").html("请填写正确手机号");
				return false;
			}else{
				$(".onError").css("display","none");
			};


			if(cc==0){
				return false;
			}
			$.ajax({
				cache: false,
				type: "POST",
				url:murl,
				data:{mobile:phoneNumber},// 你的formid
				async: true,
				beforeSend:function(){

				},
				error:function(request){
				},
				success:function(data){
					if(data.code_josn=='200'&&data.data.status=="ok"){
						var send_sms_interval = '120';
						var send_sms_handler = setInterval(function () {
							if (send_sms_interval <= 0) {
								clearInterval(send_sms_handler);
								//$("#btn_captcha_sms").attr('onclick', 'javascript:send_sms_code()').removeAttr('style');
								clickthis.val('获取验证码');
								cc=1;
							} else {
								cc=0;
								clickthis.val(send_sms_interval + '秒');

							}
							send_sms_interval--;
						}, 1000);

						clickthis.val("发送成功");
						console.log(clickthis.val());
						//csserror("#mobile_code","验证码发送成功",true);
					}else {
						console.log(clickthis.val());
						clickthis.val("发送失败")
						//$(this).val("发送失败");
					}
				}
			});

		});

	});
</script>
	</body>
</html>