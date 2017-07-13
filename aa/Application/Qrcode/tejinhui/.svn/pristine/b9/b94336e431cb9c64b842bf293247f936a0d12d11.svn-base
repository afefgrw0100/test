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
					<h2>实物发布页面</h2></div>
			</div>
			<div class="main">
				<div class="object_con">
					<form id="pub_Object" method="post" action="<?php echo U('Web/Assets/add_edit');?>" enctype="multipart/form-data">
						<ul>
							<li>
								<label class="label"><span class="need"></span> 标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：</label>
								<input type="text" value="" name="title" class="form-control">
							</li>
							<li>
								<label class="label"><span class="need"></span> 资产价值：</label>
								<input type="text" value="" name="price" class="form-control">
							</li>
							<li>
								<label class="label"><span class="need"></span> 资产类别：</label>
								<input type="radio" name="assetstype" value="1" />
								<label>房产</label>
								<input type="radio" value="2" name="assetstype" />
								<label>车辆</label>
								<input type="radio" value="3" name="assetstype" />
								<label>机械设备</label>
								<input type="radio" value="4" name="assetstype" />
								<label>其他</label>

							</li>
							<li>
								<label class="label"><span class="need"></span> 资产来源：</label>
								<input type="radio" name="source" value="1" />
								<label>司法拍卖</label>
								<input type="radio" value="2" name="source" />
								<label>资产变卖</label>
								<input type="radio" value="3" name="source" />
								<label>自由资产出售</label>
								<input type="radio" value="4" name="source" />
								<label>其他来源</label>
							</li>
							<li>
								<label class="label"><span class="need"></span> 资产地址：</label>
								<select id="s1" onchange="secondcode('#s1','#s2')"  name="address[]"  class="form-control" style=" width: 100px;">
									<option value="" selected="selected">请选择省</option>
									<?php if(is_array($codeA)): $i = 0; $__LIST__ = $codeA;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$codeV): $mod = ($i % 2 );++$i;?><option value="<?php echo ($codeV["id"]); ?>|<?php echo ($codeV["name"]); ?>|<?php echo ($codeV["code"]); ?>"><?php echo ($codeV["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
								<select id="s2" name="address[]"  class="form-control" style=" width: 100px;">
									<option value="" selected="selected">请选择市</option>
								</select>

								<input type="text" placeholder="详细地址" name="address[] " class="form-control detaile_adress" />
							</li>
							<li>
								<label class="label"><span class="need"></span>是否存在权属纠纷：</label>
								<input type="radio" name="isinissue" value="1" />
								<label>是</label>
								<input type="radio" value="2" name="isinissue" />
								<label>否</label>

							</li>
							<li>
								<label class="label"><span class="need"></span> 资产状态：</label>
								<input type="radio" name="statue" value="1" />
								<label>正常</label>
								<input type="radio" value="2" name="statue" />
								<label>封查</label>
								<input type="radio" value="3" name="statue" />
								<label>扣押</label>
								<input type="radio" value="4" name="statue" />
								<label>其他</label>
							</li>
							<li>
								<label class="label"><span class="need"></span>处置联系人名称：</label>
								<input type="text" value="" name="contact" class="form-control">
							</li>
							<li>
								<label class="label"><span class="need"></span> 手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：</label>
								<input type="text" value="" name="cellphone" class="form-control">
							</li>
							<li>
								<label class="label"><span class="need"></span> 补充说明：</label>
								<textarea value="" class="form-control" name="remark"></textarea>
							</li>
							<li>
								<li>
									<span class="fl_box"><label class="label"><span class="need"></span>处置方式：</label>
									<input type="checkbox" value="1" name="processmodle[]" class="processmodle" />
									<label>转让</label>
									<input type="checkbox" value="2" name="processmodle[]" class="processmodle" />
									<label>质押融资</label>

									</span>

									<span class="fl_box processmodle_span">
									<span class="dp-spab01 processmodle_text">价格：</span>
									<span class="dp-spabb">
										<input type="text" value="" name="proprice"  class="form-control" >
										<em class="icon">元</em>
									</span>

									</span>

								</li>
							</li>
							<li>
								<label class="label"><span class="need"></span>凭证上传：</label>
								<div class="fl">
									<div class="dp-lih">注意：仅支持文件大小不超过2M的JPG、PNG格式的图像文件</div>
									<div class="dp-lig">
										<div class="dp-box first">权利证书</div>
										<div class="dp-box">实物照片</div>
									</div>

									<div class="dp-lig">
										<div class="dp-boxa first">
											<a href="javascript:void(0)">
												<img src="/static/images/common/up_01.png">
												<input class="up_file"  type="file"id="uploadFile" name="uploadFile"   value="">
												<input class="up_file"  type="hidden" name="authpic"   value="" ></a>
										</div>
										<div class="dp-boxa">
											<a href="javascript:void(0)">
												<img src="/static/images/common/up_01.png">
												<input class="up_file" type="file" id="uploadFile1" name="uploadFile1" value="">
												<input class="up_file" type="hidden"  name="realpic" value="" ></a>
										</div>
									</div>


								</div>
							</li>
							<?php if(session('user.MemberType') == 4): ?><input type="hidden" name="agedili" value="<?php echo ($_SESSION['user']['MemberId']); ?>" id="age">
								<?php else: ?>
								<li class="agent">
									<div class="agent-address">
										<label class="label"><span class="need"></span>选择经纪人：</label>
										<select id="aget1" onchange="secondcode('#aget1','#aget2')"  name="address[]"  class="form-control" style=" width: 100px;" onload="secondcode('#aget1','#aget2')">
											<option value="" selected="selected">请选择省</option>
											<?php if(is_array($codeA)): $i = 0; $__LIST__ = $codeA;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$codeV): $mod = ($i % 2 );++$i;?><option value="<?php echo ($codeV["id"]); ?>|<?php echo ($codeV["name"]); ?>|<?php echo ($codeV["code"]); ?>"><?php echo ($codeV["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
										<select id="aget2" name="address[]"  class="form-control" style=" width: 100px;">
											<option value="" selected="selected">请选择市</option>
										</select>
										<input type="hidden" name="agedili" value="" id="age">
									</div>
									<div class="man div_scroll" id="agent">
										<?php if(is_array($age)): $i = 0; $__LIST__ = $age;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$avo): $mod = ($i % 2 );++$i;?><span ageid="<?php echo ($avo["MemberId"]); ?>">
											<b><img src="<?php echo empty($avo['HeadImg'])?'/static/images/common/man_01.jpg':$avo['HeadImg'];?>"></b>
											<em><?php echo ($avo["RealName"]); ?></em>
											<strong>
												<i class="g-star<?php echo ($avo["StarLevel"]); ?>"></i>
											</strong>
										</span><?php endforeach; endif; else: echo "" ;endif; ?>
									</div>
								</li><?php endif; ?>

							<div class="submit">
								<a href="javascript:void(0)" id="sub_mit" data_status="1">提交</a>
							</div>
						</ul>
					</form>
				</div>
			</div>

		</div>
		<!--footer -->
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
<!-- GeoTrust Siteseal [Start] -->
<script language="javascript" type="text/javascript" src="//smarticon.geotrust.com/si.js"></script>
<!--  GeoTrust Siteseal [End] -->



<script type="text/javascript">
			$(function() {
				$('.processmodle').click(function() {
					var val = $(this).val();
					$('.processmodle_span').show();
					if(val == 1) {
						$('.processmodle_text').text('价格：');
					} else if(val == 2) {
						$('.processmodle_text').text('价格：');
					} else {
						$('.processmodle_span').hide();
					}
				});


				secondcode("#s1","#s2");
			})
			//
			function secondcode(getid,setid){
				var setidvar=$(getid).val(),secondrmurl="<?php echo U('Portal/Area/codeB');?>",optiontext="<option value='' selected='selected'>请选择市</option>";
				if(setidvar==""){
					$(setid).html("<option value='' selected='selected'>请选择市</option>")
					return false;
				}
				if($(setid).val()==""||$(setid).val()==null){
				}else {
					//alert($(setid).val());
					var setval = $(setid).val().split('|')[0];
				}
				var arr=setidvar.split('|')[0];
					//alert(arr[0]);
				$.ajax({
					cache: false,
					type: "POST",
					url:secondrmurl,
					data:{codeid:arr},// 你的formid
					async: true,
					error:function(request){
					},
					beforeSend:function(){},
					success:function(data){
						$.each(data,function(n,vname){
							if(setval==vname.id){
								optiontext+= "<option value='"+vname.id+"|"+vname.name+"|"+vname.code+"'selected='selected'>"+vname.name+"</option>"
							}else {
								optiontext+= "<option value='"+vname.id+"|"+vname.name+"|"+vname.code+"'>"+vname.name+"</option>"
							}

							$(setid).html(optiontext);
							//alert(vname.name);
						})
						//alert(data);

					},

				});

			}
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
				datatype:"*4-20"
			},
			{
				ele:":input:text:eq(1)",
				datatype:"n"
			},
			{
				ele:":input:text:eq(3)",
				datatype:"*2-20"
			},
			{
				ele:":input:text:eq(4)",
				datatype:"m"
			},
			{
				ele:":input:text:eq(5)",
				datatype:"n"
			},
			{
				ele:"#age",
				datatype:"n"
			},

			{
				ele:":radio",
				datatype:"*"
			},
			{
				ele:"select:lt(2)",
				datatype:"*"
			},
			{
				ele:":checkbox",
				datatype:"*"
			}
		]);

	})
</script>

<script type="text/javascript">
	$(function() {
		//选经纪人头像

		$('#agent span').live("click",(function(){
			var ageid= $(this).attr("ageid");
			$("#age").val(ageid);
			$(this).addClass('select').siblings().removeClass('select');
		}));
		$("#aget2").live("change",function(){
			var dataval = $(this).val(),agethtml="";
			$.ajax({
				cache: false,
				type: "POST",
				url:"/index.php/Web/Index/ajaxage",
				data:{city:dataval},// 你的formid
				async: true,
				error:function(request){
				},
				beforeSend:function(){},
				success:function(data){
					$.each(data,function(n,vname){
						agethtml+= "<span ageid="+vname.MemberId+"> <b><img src=\""+vname.HeadImg+"\"></b> <em>"+vname.RealName+"</em> <strong> <i class=\"g-star"+vname.StarLevel+"\"></i> </strong> </span>";
					});
					$("#agent").html(agethtml);
				},
			});
		});
//		$("#sub_mit").click(function(){
//			var formurl= $("#pub_Object").attr("action"), status = $(this).attr("data_status"),submit =$(this);
//			if(status==2){
//				return false;
//
//			}
//			$.ajax({
//				cache: false,
//				type: "POST",
//				url:formurl,
//				data:$('#pub_Object').serialize(),// 你的formid
//				async: true,
//				error:function(request){
//					filterWarn(request);
//				},
//				beforeSend:function(){
//					//alert(submit.attr("id"));
//					submit.attr("data_status","2");
//				},
//				success:function(data){
//					filterWarn(data.info);
//					if(data.status=='1'){
//						window.location= data.url;
//					}else {
//						submit.attr("data_status","1");
//						//filterWarn(data.info);
//					}
//
//					//window.location= data.url;
//				},
//
//			});
//		});


	});
</script>
	</body>

</html>