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
		<div class="login-form">
			<div class="main">
				<div class="fl">
					<div class="login-tab">
						<a class="login-tab_l select" href="">登录</a>
						<a class="login-tab_r" href="<?php echo U('User/Index/region');?>">注册</a>
					</div>
					<div class="login_con login">
						<form method="post" action="<?php echo U('Login/dologin');?>" id="loginForm">

							<!--<div class="msg-error">验证码不正确或验证码已过期</div>-->
							<div class="loginname"><input class="form-control" type="text" name="MemberName" id="mname" autocomplete="off" placeholder="用户号" >
							</div>
							<div class="password"><input class="form-control" name="Password" type="Password" placeholder="密码" id="pword" autocomplete="off" oncontextmenu="return false" onpaste="return false" ></div>
							<div class="imgCode">
								<div class="code_input">
									<input type="text" class="form-control" name="verify" id="verify" placeholder="验证码" autocomplete="off">
								</div>
								<div class="Verifi"><img class="verify_img" src="/index.php?m=Web&amp;c=Checkcode&amp;a=index&amp;length=4&amp;font_size=16&amp;width=120&amp;height=55&amp;charset=1234567890&amp;use_noise=1&amp;use_curve=0&amp;time=0.5246274670379651" onclick="this.src='/index.php?m=Web&amp;c=Checkcode&amp;a=index&amp;length=4&amp;font_size=16&amp;width=120&amp;height=55&amp;charset=1234567890&amp;use_noise=1&amp;use_curve=0&amp;time='+Math.random();" style="cursor: pointer;" title="点击获取"></div>
								<div class="click"><a id="clickVer">点击刷新</a></div>
							</div>
							<div class="submit"><input type="button" value="登录" id="sub_mit" class="btn" data_status="1"></div>
							<div class="forget-pw"><a href="<?php echo U('User/Index/getpassword');?>">找回密码</a></div>
						</form>
					</div>


				</div>
				<div class="fr">
					<div class="item">关注获取更多信息</div>
					<div id="">
						<span><b><img src="//www.3qqq.com/static/images/common/dinyue.jpg"></b><em>订阅号</em></span>
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

		
	</body>
		<script type="text/javascript">
			$(function(){
				$(document).keyup(function(event){
					if(event.keyCode ==13){
						$("#sub_mit").trigger("click");
					}
				});
				$("#sub_mit").click(function(){
					var sub_status= $("#sub_mit").attr("data_status");
					if(sub_status==2){
						return false;
					}
					var formurl = $("#loginForm").attr("action");
					$.ajax({
						cache: false,
						type: "POST",
						url:formurl,
						data:$('#loginForm').serialize(),// 你的formid
						async: true,
						error:function(request){
							$(".msg-error").html("请求服务器失败");
						},
						beforeSend:function(){
							//表单js验证
							var phone = $("#mname").val(),pword=$("#pword").val();
							//!(/^1(3|4|5|7|8)\d{9}$/.test(phone))
							if(!(/^[_0-9a-z]{6,16}$/i.test(phone))){
								csserror("#mname","账号格式不正确",true);
								return false;
							}else{
								csserror("#mname","",false);
							}
							if(pword==""){
								csserror("#pword","密码不能为空",true);
								return false;
							}else {
								csserror("#pword","",false);
							}
							$("#sub_mit").attr("data_status","2");
						},
						success:function(data){
							if(data.code_josn=="200") {
								//alert(data.info);
								window.location.href=data.url;
							}else if(data.code_josn=="400") {
								//alert(1111);
								csserror("#verify",data.info,true);
								$(".verify_img").attr("src",verify());
								$("#sub_mit").attr("data_status","1");
							}else if(data.code_josn=="401") {
								csserror("#mname",data.info,true);
								$(".verify_img").attr("src",verify());
								$("#sub_mit").attr("data_status","1");
							}else if(data.code_josn=="402") {
								csserror("#pword",data.info,true);
								$(".verify_img").attr("src",verify());
								$("#sub_mit").attr("data_status","1");
							}

						},

					});

				});
				function csserror(id,cont,sta){
					if(sta==true){
						$(id).addClass("error");
						$(id).nextAll().remove();
						$(id).after('<label id="Password-error" class="error" for="Password">'+cont+'</label>');
					}else {
						$(id).removeClass("error")
						$(id).nextAll().remove();
					}

				}
				$("#clickVer").click(function(){
					$(".verify_img").attr("src",verify());
				});
				function verify(){
					return '/index.php?m=Web&c=Checkcode&a=index&length=4&font_size=16&width=120&height=55&charset=1234567890&use_noise=1&use_curve=0&time='+Math.random();
				}
			});
		</script>
</html>