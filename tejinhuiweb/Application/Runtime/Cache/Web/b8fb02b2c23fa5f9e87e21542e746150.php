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

		<div class="pub_object">
			<div class="title">
				<div class="title_c">
					<h2>实物出租页面</h2></div>
			</div>
			<div class="main">
				<div class="object_con">
					<form id="pub_Object" method="post" action="<?php echo U('Web/Assetsrent/add_edit');?>" enctype="multipart/form-data">
						<ul>
							<li style="display: none">
								<label class="label"><span class="need"></span> 资产来源：</label>

								<input type="hidden" value="6" name="source" class="sourceclick" />
							</li>
							<article id="tempAuc">
								<li>
									<label class="label"><span class="need"></span> 标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：</label>
									<input type="text" value="" name="title" class="form-control titlevalid">
								</li>
								<li>
									<label class="label"><span class="need"></span> 资产价值：</label>
									<input type="text" value="" name="Price" class="form-control pricevalid">
								</li>

								<li>
									<label class="label"><span class="need"></span> 资产类别：</label>
									<input type="radio" name="assetstype" value="1" />
									<label>商铺</label>
									<input type="radio" name="assetstype" value="2" />
									<label>厂房</label>
									<input type="radio" value="3" name="assetstype" />
									<label>土地</label>


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
									<input type="radio"  name="isinissue" value="2" />
									<label>否</label>

								</li>
								<li>
									<label class="label"><span class="need"></span> 资产状态：</label>
									<input type="radio" name="statue" value="1" />
									<label>正常</label>
									<input type="radio" name="statue"  value="2"  />
									<label>封查</label>
									<input type="radio"  name="statue" value="3" />
									<label>抵押</label>
									<input type="radio" name="statue"   value="4"  />
									<label>其他</label>
								</li>
								<li>
									<label class="label"><span class="need"></span>处置联系人名称：</label>
									<input type="text" value="" name="contact" class="form-control contactvalid">
								</li>
								<li>
									<label class="label"><span class="need"></span> 手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：</label>
									<input type="text" value="" name="cellphone" class="form-control cellphonevalid">
								</li>
								<li>
									<label class="label"><span class="need"></span> 补充说明：</label>
									<textarea value="" class="form-control" name="remark"></textarea>
								</li>
								<li>
									<span class="fl_box"><label class="label"><span class="need"></span>月租价格：</label>
											<span class="dp-spabb">
										<input type="text" value="" name="proprice"  class="form-control propricevalid" >
										<em class="icon">元</em>
									</span>
									<input type="hidden" value="1" name="processmodle[]" class="processmodle" />


									</span>


								</li>
								<li>
									<label class="label"><span class="need"></span> 押金：</label>
									<input type="text" value="" name="Deposit" class="form-control pricevalid">
								</li>
								<li>
									<label class="label"><span class="need"></span> 租金支付方式：</label>
									<input type="radio" name="CentMode" value="1" />
									<label>月付</label>
									<input type="radio" name="CentMode"  value="2"  />
									<label>季付</label>
									<input type="radio"  name="CentMode" value="3" />
									<label>半年付</label>
									<input type="radio" name="CentMode"   value="4"  />
									<label>年付</label>
								</li>
								<li>
									<label class="label"><span class="need"></span> 面积：</label>
									<input type="text" value="" name="Acreage" class="form-control pricevalid">(平方米)m²
								</li>
								<li></li>
							</article>

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
												<img src="//www.3qqq.com/static/images/common/up_01.png">
												<input class="up_file"  type="file"id="uploadFile" name="uploadFile"   value="">
												<input class="up_file"  type="hidden" name="authpic"   value="" ></a>
										</div>
										<div class="dp-boxa">
											<a href="javascript:void(0)">
												<img src="//www.3qqq.com/static/images/common/up_01.png">
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
										<div class="agent_search">
											<input class="form-control" placeholder="搜索经纪人" id="sbname">
											<input type="button" class="btn" value="搜索" id="sbbtn" />
											<input type="hidden" name="agedili" value="" id="age">
										</div>
									</div>
									<div class="man div_scroll" id="agent">
										<?php if(is_array($age)): $i = 0; $__LIST__ = $age;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$avo): $mod = ($i % 2 );++$i;?><span ageid="<?php echo ($avo["MemberId"]); ?>">
											<b><img src="<?php echo empty($avo['HeadImg'])?'/static/images/common/man_01.jpg':headimg($avo['HeadImg']);?>"></b>
											<em><?php echo ($avo["RealName"]); ?></em>
											<strong>
												<i class="g-star<?php echo ($avo["StarLevel"]); ?>"></i>
											</strong>
										</span><?php endforeach; endif; else: echo "" ;endif; ?>
									</div>
								</li><?php endif; ?>

							<div class="agreen"><input type="checkbox" name="agreen" checked="">我已阅读并同意
								<a href="<?php echo U('Home/Index/pubpro');?>">《特资尽调委托协议》</a>
							</div>
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

<script src="<?php echo tempurl('//www.3qqq.com/static/js/laydate/laydate.js');?>" type="text/javascript" ></script>
<script type="text/javascript">
	function datatime(e){
		var date = e;
		date = date.substring(0,19);
		date = date.replace(/-/g,'/');
		var timestamp = new Date(date).getTime();
		return timestamp;
	}
			$(function() {
				var temptext = $("#tempAuc").html();
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
//				$(".sourceclick").click(function(){
//					$("#tempAuc").html(temptext);
//					validform_temp();
//				});
//				$('#sourceclick').click(function(){
//					var tempAuchtml = $("#template").html();
//					//console.log(tempAuchtml);
//					$("#tempAuc").html(tempAuchtml);
//					validform_temp();
//
//				});


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
<script type="text/javascript" charset="utf-8" src="<?php echo tempurl('//www.3qqq.com/static/js/ajaxfileupload.js');?>"></script>
<script type="text/javascript">
	$(':file').on("change",function(){
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
<script type="text/javascript" charset="utf-8" src="<?php echo tempurl('//www.3qqq.com/static/js/Validform_v5.3.2_min.js');?>"></script>
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
				ele:".titlevalid",
				datatype:"*4-20"
			},
			{
				ele:".pricevalid",
				datatype:"n"
			},
			{
				ele:".contactvalid",
				datatype:"*2-20"
			},
			{
				ele:".cellphonevalid",
				datatype:"m"
			},
			{
				ele:".propricevalid",
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
			},
			{
				ele:"#cc",
				datatype:"*"
			}
		]);

	})
	function validform_temp(){
		//document.write("<script src='<?php echo tempurl('//www.3qqq.com/static/js/datetime.js');?>'><\/script>");
		var demo=$("#pub_Object").Validform({
			tiptype:3,
			label:".label",
			btnSubmit:'#sub_mit',
			showAllError:true,
			datatype:{
				"zh1-6":/^[\u4E00-\u9FA5\uf900-\ufa2d]{1,6}$/,
				"tzm":function(gets,obj,curform,regxp){
					var stime = curform.find(".AuctionStartvalid").val();
					if(gets){
						if(datatime(stime)<datatime(gets)){
							return true;
						}

					};
					return false;
				},
			},
			//默认为false，使用ajax方式提交表单数据，将会把数据POST到config方法或表单action属性里设定的地址；
			ajaxPost:false,
			postonce:true,
		});

		//通过$.Tipmsg扩展默认提示信息;
		//$.Tipmsg.w["zh1-6"]="请输入1到6个中文字符！";
		demo.tipmsg.w["zh1-6"]="请输入1到6个中文字符！";
		demo.tipmsg.w["tzm"]="结束时间小于起始时间！";
		demo.tipmsg.r=" ";
		demo.addRule([
			{
				ele:".titlevalid",
				datatype:"*4-20"
			},
			{
				ele:".pricevalid",
				datatype:"n"
			},
			{
				ele:".contactvalid",
				datatype:"*2-20"
			},
			{
				ele:".cellphonevalid",
				datatype:"m"
			},
			{
				ele:".propricevalid",
				datatype:"n"
			},
			{
				ele:".ReservePricevalid",
				datatype:"n"
			},

			{
				ele:".Bondvalid",
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
			},
			{
				ele:"#cc",
				datatype:"*"
			}
		]);
	}
</script>

<script type="text/javascript">
	$(function() {
		//选经纪人头像

		$("#agent").on("click","span",(function(){
			var ageid= $(this).attr("ageid");
			$("#age").val(ageid);
			$(this).addClass('select').siblings().removeClass('select');
		}));

		$("#sbbtn").on("click",function(){
			$("#aget2").trigger("change");
		});

		$("#aget2").on("change",function(){
			var dataval = $(this).val(),agethtml="";
			var sbname = $("#sbname").val();
			$.ajax({
				cache: false,
				type: "POST",
				url:"/index.php/Web/Index/ajaxage",
				data:{city:dataval,name:sbname},// 你的formid
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