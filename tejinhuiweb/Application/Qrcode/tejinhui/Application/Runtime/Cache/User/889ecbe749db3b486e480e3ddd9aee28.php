<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo tempurl('/static/style/bootstrap.min.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('/static/style/style.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('/static/style/iconfont.css');?>" />
    <script src="<?php echo tempurl('/static/js/jquery-1.7.2.min.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/jquery.SuperSlide.2.1.1.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/main.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/jquery.flexslider-min.js');?>"></script>

</head>



<body>
<!-- header -->
<div class="header">
    <div class="top_line"></div>
    <div class="top2">
        <div class="top2_c">
            <div class="fl logo"><b><img src="/static/images/common/index_03.jpg"></b><em><img src="/static/images/common/index_06.jpg"></em>
            </div>
            <div class="fr search">
                <form action="<?php echo U('Web/Search/lists');?>" method="post">
                <input type="text" class="search_text" name="search" placeholder="找项目">
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
                        <a href="<?php echo U('Web/Lists/lists');?>">优质项目 </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Web/Index/publish');?>">发布项目</a>
                    </li>
                    <li>
                        <a href="#">赚钱模式</a>
                    </li>
                    <li>
                        <a href="#">安全保障</a>
                    </li>
                    <li>
                        <a href="#">新手指南</a>
                    </li>
                </ul>
            </div>
            <div class="fr member_center">
                <a href="<?php echo U('User/Index/index');?>">会员中心</a>
            </div>
        </div>

    </div>
</div>
<!-- header end -->
<link rel="stylesheet" href="<?php echo tempurl('/static/style/user.css');?>" />

		<div class="main">

			<div class="member_bg">
				<div class="member_bg1"></div>
				<div class="member_con">
					<!--<div class="iconfont">&#xe615;</div>-->
					<div class="fl">
						<div class="man"><img src="/static/images/user/man_03.jpg"></div>
<div class="member_left">
    <h2>会员中心</h2>
    <ul>
        <li><a href="<?php echo U('User/Member/index');?>"><i class="icon iconfont">&#xe606;</i>我的账户</a></li>
        <li><a href="<?php echo U('User/Member/ordermgt');?>"><i class="icon iconfont">&#xe603;</i>订单管理</a></li>
        <li><a href="<?php echo U('User/Member/todo');?>"><i class="icon iconfont">&#xe631;</i>待办事项</a></li>
        <li><a href="<?php echo U('User/Member/mypublish');?>"><i class="icon iconfont">&#xe673;</i>我的发布</a></li>
        <li><a href="<?php echo U('User/Member/drawmgt');?>"><i class="icon iconfont">&#xe601;</i>提现管理</a></li>
        <li><a href="<?php echo U('User/Member/');?>"><i class="icon iconfont">&#xe600;</i>资金流水</a></li>
        <li><a href="<?php echo U('User/Member/');?>"><i class="icon iconfont">&#xe602;</i>个人名片</a></li>
        <li><a href="<?php echo U('User/Member/suggesstion');?>"><i class="icon iconfont">&#xe615;</i>投诉建议</a></li>
    </ul>
</div>

					</div>
					<div class="fr">
						
						<div class="todo floor mt70">
							<div class="title">请确认并完善经纪人信息</div>
							
							
							<div class="baseInfo floor" style=" border: none;">
								<div class="con">
									<ul>
									<li ><b>用户名称：</b>	<em><?php echo ($user["MemberName"]); ?></em></li>
									<li><b>用户类型：</b>	<em><?php echo ($user["MemberType"]); ?></em></li>
									<li><b>真实姓名：</b>	<em><?php echo ($user["RealName"]); ?></em></li>
									<li><b>微信号码：</b>	<em><?php echo empty($user['MicroMsg'])?"你还没有添加微信":$user['MicroMsg'];?></em></li>
									<li><b>手机号码：</b>	<em><?php echo ($user["CellPhone"]); ?></em></li>
									<li><b>详细地址：</b>	<em><?php echo ($user["Province"]["name"]); echo ($user["City"]["name"]); echo ($user["Street"]); ?></em></li>
									<li><b>主&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;体：</b>
										<em>
											<select name="">
										<option value="请选择省" >请选择</option>
										<option value="1"  <?php echo ($user['IdentityType']==1?"selected='selected'":""); ?>>个人</option>
										<option value="2" <?php echo ($user['IdentityType']==2?"selected='selected'":""); ?>>企业</option>

									</select>
										</em>
									</li>
									<li>
										<form enctype="multipart/form-data" method="post" action="<?php echo U('');?>">
											<b>证明文件：</b>
											<em class="up_pic">
												<a href="javascript:void(0)">
													<img src="<?php echo empty($user['IdentityImg'])?'/static/images/user/up_pic.png':$user['IdentityImg'];?>">
													<input class="up_file" type="file" id="uploadFile" name="uploadFile" >
													<input class="up_file" type="hidden"  name="realpic" value="">
												</a>
											</em>
										</form>
									</li>
								
								</ul>
								</div>
								<div class="next_btn"><a>下一步</a></div>
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
                    <a href="">关于特金汇 </a>
                    <a href="">安全保障</a>
                    <a href="">常见问题</a>
                    <a href="">法律政策 </a>
                    <a href=""> 资费说明</a>
                    <a href="">媒体报道</a>
                </div>
                <div class="link">
                    <span class="tel"><b>4000-000-000</b><em>（工作时间：9:00-22:00）</em></span>
                    <span class="email">tejinhui@.com</span>
                    <span class="qq">在线客服</span>
                </div>
            </div>
            <div class="fr"><img src="/static/images/common/erweima.png"></div>
        </div>
        <div class="info2">
            <div class="pic">
                <img src="/static/images/temp/footer_pic.png">
                <img src="/static/images/temp/footer_pic2.png">
                <img src="/static/images/temp/footer_pic2.png">
                <img src="/static/images/temp/footer_pic2.png">
                <img src="/static/images/temp/footer_pic2.png">

            </div>
            <div class="con">湘ICP备12023672号-5  |  湘公网安备 11010502025073 号
                © 2016 tejinhui.com  | 特金汇有限公司 版权所有</div>
        </div>

    </div>
</div>
		<script src="<?php echo tempurl('/static/js/datetime.js');?>"></script>
		<!--支付-->
		<div class="mask">
			<div class="popups clearfix">
				<h2>请选择支付方式：</h2>
				<div class="bg">
					<div class="con">
					<ul>
						<li><input type="radio" name="ownertype" value="1" />
								<label><img src="/static/images/user/user_07.png"></label></li>
						<li><input type="radio" name="ownertype" value="2"   />
								<label><img src="/static/images/user/user_10.png"></label></li>
					</ul>
				</div>
				<div class="btn"><a href="">前往支付</a></div>
				</div>
				
				<div class="close">关闭</div>
			</div>
		</div>
		<script>
			$(function(){
				$('input[name=ownertype').click(function(){
				   $(this).parents('ul').find('li').removeClass('red');
				    $(this).parent('li').addClass('red');
})
				
			})
		</script>
<script type="text/javascript" charset="utf-8" src="<?php echo tempurl('/static/js/ajaxfileupload.js');?>"></script>
<script type="text/javascript">
	$(':file').live("change",function(){
		//uploadImage();
		var fileid= $(this).attr("id");
		//alert($(this).attr("id"));
		ajaxFileUpload(fileid);
	});
	function ajaxFileUpload(id){
		$.ajaxFileUpload(
				{
					url:"<?php echo U('Portal/Upload/load');?>",            //需要链接到服务器地址
					secureuri:false,
					fileElementId:id,                        //文件选择框的id属性
					dataType: 'json',                                     //服务器返回的格式，可以是json
					success: function (data)            //相当于java中try语句块的用法
					{

						//data=eval("("+data+")");
						if(data.status==1){
							$("#"+id).prev().attr("src",data.url);
							$("#"+id).next().val(data.url);
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
</script>
<script type="text/javascript" charset="utf-8">

	$(function() {

		//经纪人支付弹窗
		$('.next_btn a').click(function() {
			$.ajax({
				cache: false,
				type: "POST",
				url:formurl,
				data:$('#loginForm').serialize(),// 你的formid
				async: true,
				error:function(request){
				},
				beforeSend:function(){},
				success:function(data){

				},

			});
		})

	})
</script>
	</body>

</html>