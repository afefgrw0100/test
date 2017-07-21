<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo tempurl('/static/style/bootstrap.min.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('/static/style/style.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('/static/style/iconfont.css');?>" />
    <link rel="stylesheet" href="<?php echo tempurl('/static/style/valifrom.css');?>" />
    <script src="<?php echo tempurl('/static/js/jquery-1.7.2.min.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/jquery.SuperSlide.2.1.1.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/main.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/jquery.flexslider-min.js');?>"></script>
    <script src="<?php echo tempurl('/static/js/easyscroll.js');?>"></script>
    <script type="text/javascript">
        $(function() {
            $('.div_scroll').scroll_absolute({
                arrows: true
            })
        });
    </script>

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
                        <a href="<?php echo U('Home/Lists/lists');?>">优质项目 </a>
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

		<div class="pub_object">
			<div class="title">
				<div class="title_c">
					<h2>债权尽调发布页面</h2></div>
			</div>
			<div class="main">
				<form action="<?php echo U('Web/Debt/domic');?>" method="post" id="pub_Object" enctype="multipart/form-data">
				<div class="pub_report">
					<ul>
						<li>
							<b>项目名称：</b>
							<i><?php echo ($tit["Title"]); ?></i>
							<input type="hidden" name="DebtID" value="<?php echo ($tit["DebtID"]); ?>">
							<input type="hidden" name="SubName" value="<?php echo ($tit["Title"]); ?>">
						</li>
						<li>
							<b>项目描述：</b>
							<em><textarea class="form-control" name="SubDesc"></textarea></em>
						</li>
						<li>
							<b>资产情况介绍：</b>
							<em><textarea class="form-control" name="AssetsDesc"></textarea></em>
						</li>
						<li>
							<b>尽调报告介绍：</b>
							<em><textarea class="form-control" name="ReportDesc"></textarea></em>
						</li>
						<li>
							<b>尽调报告压缩包：</b>
							<div class="fl">
								<div class="dp-lig">
								<div class="dp-boxa">
										<a href="">
											<img src="/static/images/common/up_01.png">
											<input class="up_file" type="file" name="orginpic" id="fload5" name="fload5">
											<input class="up_file"  type="hidden" name="JDUrl"   value="" >
										</a>
									</div></div>
							</div>
						</li>

						<li>
							<b>资产图片：</b>
							<div class="fl">
								<div class="dp-lih">注意：仅支持文件大小不超过2M的JPG、PNG格式的图像文件</div>
								<div class="dp-lig">
									<div class="dp-boxa">
										<a href="">
											<img src="/static/images/common/up_01.png">
											<input class="up_file" type="file" name="orginpic" id="fload4" name="fload4">
											<input class="up_file"  type="hidden" name="Images[]"   value="" >
										</a>
									</div>
									<div class="dp-boxa">
										<a href="">
											<img src="/static/images/common/up_01.png">
											<input class="up_file" type="file" name="orginpic" id="fload3" name="fload3">
											<input class="up_file"  type="hidden" name="Images[]"   value="" >
										</a>
									</div>
									<div class="dp-boxa">
										<a href="">
											<img src="/static/images/common/up_01.png">
											<input class="up_file" type="file" name="orginpic" id="fload2" name="fload2">
											<input class="up_file"  type="hidden" name="Images[]"   value="" >
										</a>
									</div>
								</div>
								
								<div class="dp-lig">
									<div class="dp-box">法院有效判决及执行文件 </div>									
								</div>

								<div class="dp-lig">
									<div class="dp-boxa">
										<a href="">
											<img src="/static/images/common/up_01.png">
											<input class="up_file" type="file" name="orginpic" id="fload1" name="fload1">
											<input class="up_file"  type="hidden" name="JudgedPic"   value="" >
										</a>
									</div>
									</div>

							</div>
						</li>

						<li>
							<b>查看尽调报告费用：</b>
							<em><input type="text" name="ViewPrice" value="" class="form-control"  /></em>
							<i>元</i>
						</li>
						<li>
							<b>买断尽调报告费用：</b>
							<em><input type="text" name="BuyPrice"  value="" class="form-control" /></em>
							<i>元</i>
						</li>
						<div class="submit">
							<a href="" id="sub_mit">提交</a>
						</div>

					</ul>
				</div>
				</form>
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
<script type="text/javascript" charset="utf-8" src="<?php echo tempurl('/static/js/Validform_v5.3.2_min.js');?>"></script>
<script type="text/javascript">
	$(function(){
		//$(".registerform").Validform();  //就这一行代码！;

		var demo=$("#pub_Object").Validform({
			tiptype:3,
			label:".label",
			btnSubmit:'#sub_mit',
			showAllError:true,
			datatype:{
				"zh1-6":/^[\u4E00-\u9FA5\uf900-\ufa2d]{1,6}$/
			},
			//默认为false，使用ajax方式提交表单数据，将会把数据POST到config方法或表单action属性里设定的地址；
			ajaxPost:false,
			postonce:true,
		});

		//通过$.Tipmsg扩展默认提示信息;
		//$.Tipmsg.w["zh1-6"]="请输入1到6个中文字符！";
		demo.tipmsg.w["zh1-6"]="请输入1到6个中文字符！";
		demo.tipmsg.r=" ";
		demo.addRule([
			{
				ele:":input:text:eq(0)",
				datatype:"n"
			},
			{
				ele:":input:text:eq(1)",
				datatype:"n"
			},
			{
				ele:".form-control:eq(0)",
				datatype:"*"
			},
			{
				ele:".form-control:eq(1)",
				datatype:"*"
			},
			{
				ele:".form-control:eq(2)",
				datatype:"*"
			},

		]);

	})
</script>

	</body>

</html>