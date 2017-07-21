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
<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/style/user.css');?>" />
		<!-- header end -->

		<div class="main">

			<div class="member_bg">
				<div class="member_bg1"></div>
				<div class="member_con">
					<!--<div class="iconfont">&#xe615;</div>-->
					<div class="fl">
						<div class="man" id="tit_updata">
    <div class="mask" style="display: none;" id="mask">修改图片</div>
    <img src="<?php echo empty(session('user.HeadImg'))?'//www.3qqq.com/static/images/user/man_03.jpg':headimg(session('user.HeadImg'));?>">
    <input class="up_man" type="file" id="uploadFile" name="uploadFile" zzp = "imgfile">
    <input class="up_man" type="hidden"  name="imgname" value="">
</div>
<div class="member_left">
    <h2>会员中心</h2>
    <ul>
        <li><a href="<?php echo U('User/Common/memberindex');?>" target="frammain"><i class="icon iconfont">&#xe606;</i>我的账户</a></li>
        <li><a href="<?php echo U('User/Common/ordermgt');?>" target="frammain"><i class="icon iconfont">&#xe603;</i>订单管理</a></li>
        <li><a href="<?php echo U('User/Common/todo');?>" target="frammain"><i class="icon iconfont">&#xe631;</i>待办事项</a></li>
        <li><a href="<?php echo U('User/Common/mypublish');?>" target="frammain"><i class="icon iconfont">&#xe673;</i>我的发布</a></li>
        <?php if((session('user.MemberType') == 5) OR (session('user.MemberType1') == 5) ): ?><li>
            <a href="<?php echo U('User/Common/partner');?>" target="frammain"><i class="icon iconfont bold">&#xe60c;</i>我的经纪人</a>
        </li>
        <li>
            <a href="<?php echo U('User/Common/partnerproject');?>" target="frammain"><i class="icon iconfont bold">&#xe607;</i>合伙项目</a>
        </li>
        <li>
            <a href="<?php echo U('User/Common/partnerorder');?>" target="frammain"><i class="icon iconfont">&#xe69b;</i>合伙订单</a>
        </li>
            <li>
                <a href="<?php echo U('User/Common/deputelist');?>" target="frammain"><i class="icon iconfont">&#xe604;</i>项目委托</a>
            </li><?php endif; ?>
        <?php if((session('user.MemberType') == 4) and (session('user.MemberStatu') == 1)): ?><li><a href="<?php echo U('User/Common/drawmgt');?>" target="frammain"><i class="icon iconfont">&#xe601;</i>提现管理</a></li><?php endif; ?>
        <?php if((session('user.MemberType') == 4) OR (session('user.MemberStatu') > 1)): endif; ?>
        <li><a href="<?php echo U('User/Common/train');?>" target="frammain"><i class="icon iconfont">&#xe641;</i>资讯中心</a></li>
        <li><a href="<?php echo U('User/Common/card');?>" target="frammain"><i class="icon iconfont">&#xe602;</i>个人名片</a></li>
        <li><a href="<?php echo U('User/Common/suggesstion');?>" target="frammain"><i class="icon iconfont">&#xe615;</i>投诉建议</a></li>
        <li><a href="<?php echo U('User/Member/logout');?>" onclick="if(!confirm('确认退出')){return false;}"><i class="icon iconfont">&#xe660;</i>退出登录</a></li>
    </ul>
</div>


					</div>
					<div class="iframe">
						<iframe id="frammain" height="1000"  name="frammain" src="<?php echo empty(session('login_http_member'))?U('User/Common/memberindex'):session('login_http_member');?>" width="100%"  frameborder="no" border="0" scrolling="no"">
	
						</iframe>
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

		
		<div class="mask" id="mask">
	<div class="popups clearfix">
		<h2>请选择支付方式：</h2>
		<div class="bg">
			<div class="con">
				<ul>
					<li><input type="radio" name="ownertype" value="1" />
						<label><img src="//www.3qqq.com/static/images/user/user_07.png"></label></li>
					<li><input type="radio" name="ownertype" value="2" />
						<label><img src="//www.3qqq.com/static/images/user/user_10.png"></label></li>
				</ul>
			</div>
			<div class="btn">
				<a href="">前往支付</a>
			</div>
		</div>

		<div class="close">关闭</div>
	</div>
</div>
<script>
	$(function(){
		$('.member_left ul li').click(function(){
			$(this).addClass('select').siblings().removeClass('select');
		})
	})
</script>

		<script>
			var ifm = document.getElementById("frammain");
        function iFrameHeight() {
			//var frame = document.getElementById('#frame'),
					ifm.height = 750;
					win = ifm.contentWindow,
					doc = win.document,
					html = doc.documentElement,
					body = doc.body;

// 获取高度
			var height = Math.max( body.scrollHeight, body.offsetHeight,
					html.clientHeight, html.scrollHeight, html.offsetHeight );
			//frame.setAttribute('height', height);
			//alert(height);
//			var subWeb = document.frames ? document.frames["frammain"].document :
//            ifm.contentDocument;
//			alert(subWeb.body.scrollHeight);
            if (ifm != null && height != null) {
                ifm.height = height;
            }

        }
			ifm.onload = function(){
			iFrameHeight();

		}
			ifm.onresize=function(){
			iFrameHeight();
		}
		$(function() {
				$('input[name=ownertype').click(function() {
					$(this).parents('ul').find('li').removeClass('red');
					$(this).parent('li').addClass('red');
				});


			})
    
			</script>
<script type="text/javascript" charset="utf-8" src="<?php echo tempurl('//www.3qqq.com/static/js/ajaxfileupload.js');?>"></script>
<script type="text/javascript" charset="utf-8" >
	$('#tit_updata').delegate(":file","change",function(){
		//uploadImage();
		var fileid= $(this).attr("id");
		//alert($(this).attr("id"));
		ajaxFileUploads(fileid);
	});
	function ajaxFileUploads(id){
		var zzp =$("#"+id).attr("zzp");
		if(zzp==undefined){
			zzp="";
		};

		var url ="/index.php/User/Common/headimg/zzp/"+zzp;

		$.ajaxFileUpload(
				{
					url:url,            //需要链接到服务器地址
					secureuri:false,
					type: 'post',
					fileElementId:id,                        //文件选择框的id属性
					dataType: 'json',                                     //服务器返回的格式，可以是json
					success: function (data)            //相当于java中try语句块的用法
					{


						//data=eval("("+data+")");
						if(data.status==1){
							$("#"+id).prev().attr("src",data.url);
							$("#"+id).next().val(data.url);
							filterWarn("上传成功");
							return false;
						}else {
							filterWarn(data.info);
						}

						//alert(data);
						//$('#result').html('添加成功');
					},
					error: function (data, status, e)            //相当于java中catch语句块的用法
					{
						//filterWarn("上传失败");
						//$('#result').html('添加失败');
					}
				}

		);

	}
	//经纪人支付弹窗
	$('.next_btn a').on("click",function() {
		var formurl =$("#doForm").submit();

	})
	$("#tit_updata").hover(function (){
		$("#mask").show();
	},function (){
		$("#mask").hide();
	});
</script>
	</body>

</html>