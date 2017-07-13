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

		<div class="pub_object">
			<div class="title">
				<div class="title_c">
					<h2>资产包尽调发布页面</h2></div>
			</div>
			<div class="main">
				<form action="<?php echo U('Web/Packages/domic');?>" id="pub_Object" method="post"  enctype="multipart/form-data">
				<div class="pub_report">
					<ul>
						<li>
							<b>项目名称：</b>
							<i><?php echo ($tit["Title"]); ?></i>
							<input type="hidden" name="PackageID" value="<?php echo ($tit["PackageID"]); ?>">
							<input type="hidden" name="SubName[0]" value="<?php echo ($tit["Title"]); ?>">
						</li>
						<li>
							<b>项目描述：</b>
							<em><textarea class="form-control" name="SubDesc"></textarea></em>
						</li>
						<li>
							<b>资产包介绍：</b>
							<em><textarea class="form-control" name="PackageDesc"></textarea></em>
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
											<img src="//www.3qqq.com/static/images/common/up_01.png">
											<input class="up_file" type="file" name="orginpic" id="fload7" name="fload7" zzp="zip">
											<input class="up_file"  type="hidden" name="JDUrl[0]"   value="" >
										</a>
									</div>
								</div>
							</div>
							<div class="item">
								<p>1、请上传尽调报告压缩包，文件最大限制为499M。</p>
								<p>2、根据您的网络环境，该可能需要等待一段时间。</p>
								<p>3、请在本报告上传之后在进行其他操作。</p>
							</div>
						</li>
						<li>
							<b>尽调报告部分公开展示：</b>
							<div class="fl">
								<div class="dp-lig">
									<div class="dp-boxa">
										<a href="">
											<img src="//www.3qqq.com/static/images/common/up_01.png">
											<input class="up_file" type="file" name="orginpic" id="fload41" name="fload4" zzp="pdf">
											<input class="up_file"  type="hidden" name="DescPdf"   value="" id="DescPdf" >
										</a>
									</div>
								</div>
							</div>
							<div class="item">
								<p>1、请上传尽调报告部分公开展示pdf文件，文件最大限制为499M。</p>
								<p>2、根据您的网络环境，该可能需要等待一段时间。</p>
								<p>3、请在本报告上传之后在进行其他操作。</p>
							</div>
						</li>
						<li>
							<b>标题展示：</b>
							<div class="fl">
								<div class="dp-lig">
									<div class="dp-boxa">
										<a href="">
											<img src="//www.3qqq.com/static/images/common/up_01.png">
											<input class="up_file" type="file" name="orginpic" id="fload9" name="fload9" >
											<input class="up_file"  type="hidden" name="titimg"   value="" >
										</a>
									</div></div>
							</div>
						</li>
						<li>
							<b>图片样式项目列表：</b>
							<div class="fl">
								<div class="dp-lig">
								<div class="dp-boxa">
										<a href="">
											<img src="//www.3qqq.com/static/images/common/up_01.png">
											<input class="up_file" type="file" name="orginpic" id="fload6" name="fload6">
											<input class="up_file"  type="hidden" name="AssetsDesc[]"   value="" >
										</a>
									</div>
									<div class="dp-boxa">
										<a href="">
											<img src="//www.3qqq.com/static/images/common/up_01.png">
											<input class="up_file" type="file" name="orginpic" id="fload5" name="fload5" >
											<input class="up_file"  type="hidden" name="AssetsDesc[]"   value="" >
										</a>
									</div>
									<div class="dp-boxa">
										<a href="">
											<img src="//www.3qqq.com/static/images/common/up_01.png">
											<input class="up_file" type="file" name="orginpic" id="fload4" name="fload4">
											<input class="up_file"  type="hidden" name="AssetsDesc[]"   value="" >
										</a>
									</div>
								</div>
							</div>
						</li>

						<li>
							<b>资产图片：</b>
							<div class="fl">
								<div class="dp-lih">注意：仅支持文件大小不超过2M的JPG、PNG格式的图像文件</div>
								<div class="dp-lig">
									<div class="dp-boxa">
										<a href="">
											<img src="//www.3qqq.com/static/images/common/up_01.png">
											<input class="up_file" type="file" name="orginpic" id="fload3" name="fload3">
											<input class="up_file"  type="hidden" name="Images[]"   value="" >
										</a>
									</div>
									<div class="dp-boxa">
										<a href="">
											<img src="//www.3qqq.com/static/images/common/up_01.png">
											<input class="up_file" type="file" name="orginpic" id="fload2" name="fload2">
											<input class="up_file"  type="hidden" name="Images[]"   value="" >
										</a>
									</div>
									<div class="dp-boxa">
										<a href="">
											<img src="//www.3qqq.com/static/images/common/up_01.png">
											<input class="up_file" type="file" name="orginpic" id="fload1" name="fload1">
											<input class="up_file"  type="hidden" name="Images[]"   value="" >
										</a>
									</div>
								</div>
								
								<div class="dp-lig">
									<div class="dp-box">法院有效判决及执行文件 </div>									
								</div>


							</div>
						</li>


						<li>
							<b>主包查看尽调费用：</b>
							<span>
								<em><input type="text" name="ViewPrice[0]" value="" class="form-control" strint="<?php echo ($ggtv["CodeName"]); ?>" endint="<?php echo ($ggtv["CodeValue"]); ?>" /></em>
								<i>元</i>
							</span>
							<span class="price" class="strendint">购买费用为<strong><?php echo ($ggtv["CodeName"]); ?>元-<?php echo ($ggtv["CodeValue"]); ?>元</strong></span>
						</li>
						<li>
							<b>主包买断尽调费用：</b>
							<span>
								<em><input type="text" name="BuyPrice[0]" value="" class="form-control" strint="<?php echo ($ggtc["CodeName"]); ?>" endint="<?php echo ($ggtc["CodeValue"]); ?>"  /></em>
								<i>元</i>
							</span>
							<span class="price" class="strendint">购买费用为<strong><?php echo ($ggtc["CodeName"]); ?>元-<?php echo ($ggtc["CodeValue"]); ?>元</strong></span>
						</li>
					<?php $__FOR_START_859__=1;$__FOR_END_859__=$tit['Projectnum']+1;for($i=$__FOR_START_859__;$i < $__FOR_END_859__;$i+=1){ ?><li>
							<b><?php echo ($i); ?>、项目列表标题：</b>
							<em><input type="text" name="SubName[<?php echo ($i); ?>]" value="" class="form-control" titlist="aaa"  /></em>

						</li>
						<li>
							<b><?php echo ($i); ?>、项目尽调查看费用：</b>
							<span>
								<em><input type="text" name="ViewPrice[<?php echo ($i); ?>]" value="" class="form-control" strint="<?php echo ($ggtv["CodeName"]); ?>" endint="<?php echo ($ggtv["CodeValue"]); ?>"  /></em>
								<i>元</i>
							</span>
							<span class="price" class="strendint">购买费用为<strong><?php echo ($ggtv["CodeName"]); ?>元-<?php echo ($ggtv["CodeValue"]); ?>元</strong></span>
						</li>
						<li>
							<b><?php echo ($i); ?>、项目买断费用：</b>
							<span>
								<em><input type="text" name="BuyPrice[<?php echo ($i); ?>]" value="" class="form-control" strint="<?php echo ($ggtc["CodeName"]); ?>" endint="<?php echo ($ggtc["CodeValue"]); ?>"  /></em>
								<i>元</i>
							</span>
							<span class="price" class="strendint">购买费用为<strong><?php echo ($ggtc["CodeName"]); ?>元-<?php echo ($ggtc["CodeValue"]); ?>元</strong></span>
						</li>
						<li>
							<b><?php echo ($i); ?>、尽调报告压缩包：</b>
							<div class="fl">
								<div class="dp-lig">
									<div class="dp-boxa">
										<a href="">
											<img src="//www.3qqq.com/static/images/common/up_01.png">
											<input class="up_file" type="file" name="orginpic" id="fload7<?php echo ($i); ?>" name="fload7<?php echo ($i); ?>" zzp="zip">
											<input class="up_file"  type="hidden" name="JDUrl[<?php echo ($i); ?>]"   value="" >
										</a>
									</div>
								</div>
							</div>
							<div class="item">
								<p>1、请上传尽调报告压缩包，文件最大限制为499M。</p>
								<p>2、根据您的网络环境，该可能需要等待一段时间。</p>
								<p>3、请在本报告上传之后在进行其他操作。</p>
							</div>
						</li><?php } ?>
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

<script type="text/javascript" charset="utf-8" src="<?php echo tempurl('//www.3qqq.com/static/js/ajaxfileupload.js');?>"></script>
<script type="text/javascript">
	$(':file').on("change",function(){
		//uploadImage();
		var fileid= $(this).attr("id");
		//alert($(this).attr("id"));
		ajaxFileUpload(fileid);
	});

	function ajaxFileUpload(id){
		var zzp =$("#"+id).attr("zzp");
		if(zzp==undefined){
			zzp="";
		}
		var url ="/index.php/Portal/Upload/load/zzp/"+zzp;
		$("#"+id).prev().attr("src","//static.resource.tejinhui.com/static/images/load.gif");
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
							if(zzp=="zip"){
								$("#"+id).prev().attr("src","//static.resource.tejinhui.com/static/images/zipimg.jpg");
							}if(zzp=="pdf"){
								$("#"+id).prev().attr("src","//static.resource.tejinhui.com/static/images/pdf.jpg");
							}else {
								$("#"+id).prev().attr("src",data.url);
							}
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
<script type="text/javascript" charset="utf-8" src="<?php echo tempurl('//www.3qqq.com/static/js/Validform_v5.3.2_min.js');?>"></script>
<script type="text/javascript">
	$(function(){
		//$(".registerform").Validform();  //就这一行代码！;
		var strint,endint;
		var demo=$("#pub_Object").Validform({
			tiptype:3,
			label:".label",
			btnSubmit:'#sub_mit',
			showAllError:true,
			datatype:{
				"zh1-6":/^[\u4E00-\u9FA5\uf900-\ufa2d]{1,6}$/,
				"twn":function(gets,obj,curform,regxp){
					strint =Number(obj.attr("strint"));
					endint = Number(obj.attr("endint"));
					if(strint<=gets&&gets<=endint){
						return true;
					}else {
						if(obj.attr("titlist")=="aaa"&&regxp["*"].test(gets)){
							return true;
						}
						return false;
					}
				}
			},
			//默认为false，使用ajax方式提交表单数据，将会把数据POST到config方法或表单action属性里设定的地址；
			ajaxPost:false,
			postonce:true,
		});

		//通过$.Tipmsg扩展默认提示信息;
		//$.Tipmsg.w["zh1-6"]="请输入1到6个中文字符！";
		demo.tipmsg.w["zh1-6"]="请输入1到6个中文字符！";
		demo.tipmsg.w["twn"]="请输入规定的区间数字！";
		demo.tipmsg.r=" ";
		demo.addRule([
			{
				ele:":input:text",
				datatype:"*"
			},
			{
				ele:":input:text",
				datatype:"twn"
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
			{
				ele:":input:hidden",
				datatype:"*",


			},
//			{
//				ele:":radio",
//				datatype:"*"
//			},

		]);

	})
</script>
	</body>

</html>