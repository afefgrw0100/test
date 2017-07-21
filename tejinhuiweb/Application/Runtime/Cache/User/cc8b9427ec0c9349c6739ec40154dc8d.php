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
                        <a href="/list">找项目 </a>
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
		<div class="login-form">
			<div class="main">
				<div class="fl">
					<div class="login-tab">
						找回密码
					</div>
					<div class="login_con region">
						<form id="getPassword" method="post" action="<?php echo U('User/Login/dopassword');?>">
						<!--<div class="msg-error">验证码不正确或验证码已过期</div>-->
						
						<div class="password">
							<input class="form-control" type="text"placeholder="手机号" name="phone_number" id="phone_number" autocomplete="off">
							<!--<span class="account-error"><em>手机号码错误</em></span>-->
						</div>
						<div class="imgCode">
						<div class="form-authcode">
							<div class="code_input">
								<input type="text" class="form-control" name="mobile_code"  id="mobile_code" placeholder="验证码" autocomplete="off" >
							</div>
						<div class="Verifi"><input class="btn" type="button" value="获取验证码" id="Verifi"></div></div>
							
						
						</div>
						<div class="password">
							<input class="form-control password1" name="Password" id="password" type="password" placeholder="密码" autocomplete="off">
							
						</div>
						<div class="password">
							<input class="form-control" name="confirm_password" id="confirm_password" type="password" placeholder="确认密码" autocomplete="off">
							
						</div>
						
						<div class="submit"><input type="button" value="重置密码"  class="btn" id="sub_mit" data_status="1"></div>
						<div class="forget-pw return"><a href="<?php echo U('User/Index/index');?>">返回</a></div>
						
							</form>	
					</div>
					
				
				</div>
				<div class="fr">
					<div class="item">关注获取更多信息</div>
					<div >
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

    function search_text(){
        var rcc = $(".search_text").val();
        if(rcc==""){
            return false;
        }else {
            return true;
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

<script type="text/javascript">
	$(function(){
		$('#optional').click(function() {
			$(this).addClass('active');
			$(this).next().removeClass('hidden');
		});
		//提交表单
		$("#sub_mit").click(function(){
			var sub_status= $("#sub_mit").attr("data_status");
			if(sub_status==2){
				return false;
			}
			var formurl = $("#getPassword").attr("action");
			$.ajax({
				cache: false,
				type: "POST",
				url:formurl,
				data:$('#getPassword').serialize(),// 你的formid
				async: true,
				error:function(request){
					aler(1111);
					$(".msg-error").html("请求服务器失败");
				},
				beforeSend:function(){
					//表单js验证
					//用户名
//					if($("#MemberName").val()==""||!(/^[_0-9a-z]{6,16}$/i.test($("#MemberName").val()))){
//						csserror("#MemberName","用户名为6-16位字符",true);
//						return false;
//					}else {
//						csserror("#MemberName","",false);
//					}
					var phone = $("#phone_number").val(),pword=$("#password").val();
					if(!(/^1(3|4|5|7|8)\d{9}$/.test(phone))){
						csserror("#phone_number","账号为手机号",true);
						return false;
					}else{
						csserror("#phone_number","",false);
					}
					if(pword.length<6){
						csserror("#password","密码不能少于6位",true);
						return false;
					}else {
						csserror("#password","",false);
					}
					if($("#confirm_password").val==""||$("#confirm_password").val()!=pword){
						csserror("#confirm_password","密码不一致",true);
						return false;
					}else {
						csserror("#confirm_password","",false);
					}
					$("#sub_mit").attr("data_status","2");
				},
				success:function(data){
					if(data.code_josn=="200") {
						filterWarn("注册成功");
						setTimeout(function(){
							window.location.href=data.url;
						},3000);

						//window.location.href=data.url;
					}else if(data.code_josn=="4033") {
						csserror("#phone_number",data.info,true);
						$("#sub_mit").attr("data_status","1");
					}else if(data.code_josn=="403") {
						csserror("#mobile_code",data.info,true);
						$("#sub_mit").attr("data_status","1");
					}else if(data.code_josn=="400") {
						csserror("#confirm_password",data.info,true);
						$("#sub_mit").attr("data_status","1");
					}else if(data.code_josn=="401") {
						csserror("#phone_number",data.info,true);
						$("#sub_mit").attr("data_status","1");
					}


				},

			});

		});
		var murl ="<?php echo U('Portal/Index/mcode');?>";
		$("#Verifi").click(function(){
			var phoneNumber = $("#phone_number").val();
			if(!(/^1(3|4|5|7|8)\d{9}$/.test(phoneNumber))){
				csserror("#phone_number","请填写正确手机号",true);
				return false;
			}else{
				csserror("#phone_number","",false);
			}



			$.ajax({
				cache: false,
				type: "POST",
				url:murl,
				data:{mobile:phoneNumber},// 你的formid
				async: true,
				beforeSend:function(){

					var ccccc = false;
					$.ajax({
						cache: false,
						type: "POST",
						url:"/index.php/User/Login/getphone",
						data:{	phone:phoneNumber,},// 你的formid
						async: false,
						beforeSend:function(){

						},
						error:function(request){
						},
						success:function(data){
							if(data.status==1){
								filterWarn("用户不存在");
								ccccc = false;
							}else {
								ccccc = true;
							}
						}
					});
					return ccccc;
				},
				error:function(request){
				},
				success:function(data){
					if(data.code_josn=='200'&&data.data.status=="ok"){
						filterWarn("验证码发送成功");
					}else {
						filterWarn("发送失败");

					}
				}
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
		function verify(){
			return '/index.php?m=Web&c=Checkcode&a=index&length=4&font_size=14&width=100&height=55&charset=1234567890&use_noise=1&use_curve=0&time='+Math.random();
		}
	});
</script>

	</body>
</html>