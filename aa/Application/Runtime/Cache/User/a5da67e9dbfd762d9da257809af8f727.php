<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>

	<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/style/bootstrap.min.css');?>" />
	<link rel="stylesheet" href="<?php echo tempurl('//www.3qqq.com/static/style/iframe.css');?>" />

	<body>

		<div class="mainhtml">
			<div class="mainhtml_c">
				<div class="fr">
					<div class="top_right">
    <span class="hello">Hi , <i><?php echo dataG(); echo ($_SESSION['user']['RealName']); ?></i></span>
    <span class="time">上次登录时间：<i><?php echo empty(session('user.LastLoginTime'))?"当前是第一次登录":session('user.LastLoginTime');?></i></span>
						<span class="btn">
                            <?php if(session('user.MemberTypesss') == 400): ?><a href="<?php echo U('User/Common/rechager');?>" class="btn1">充值</a><?php endif; ?>
                             <?php if(session('user.MemberType') == 4): ?><a href="<?php echo U('User/Common/cashmis');?>"  class="btn2">提现</a><?php endif; ?>

						</span>
</div>
					<div class="todo floor mt70">
						<div class="title">基本信息修改</div>

						<div class="baseInfo floor" style=" border: none;">
							<form action="<?php echo U('User/Logic/savemember');?>" method="post" id="loginForm">
								<div class="con revise">
									<div class="xing"><img src="//www.3qqq.com/static/images/user/xing_03.jpg"></div>
										<ul>
											<li><b>用户名称：</b> <em><?php echo ($user["MemberName"]); ?></em></li>
											<li><b>用户类型：</b> <em><?php echo ($user["MemberType"]["CodeName"]); ?></em></li>
											<li><b>真实姓名：</b> <em><input type="text" name="RealName" class="form-control" value="<?php echo ($user["RealName"]); ?>"></em></li>
											<li><b>微信号码：</b> <em><input type="text" name="MicroMsg" class="form-control" value="<?php echo ($user["MicroMsg"]); ?>"></em></li>
											<li></li>
										</ul>
									<div class="tel"><b>手机号码：</b>
										<em>
											<input type="text" name="CellPhone" class="form-control" id="phone_number" value="<?php echo ($user["CellPhone"]); ?>">
											<input type="text" name="verifi" class="form-control verifi" placeholder="验证码">
											<input class="btn1" type="button" value="获取验证码" id="Verifi">
										</em></div>
									<div class="tel">
										<b>详细地址：</b>
										<em>
										<select name="Province" id="s1" onchange="secondcode('#s1','#s2')">
											<option value="0" >请选择省</option>
											<?php if(is_array($codeA)): $i = 0; $__LIST__ = $codeA;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$codeV): $mod = ($i % 2 );++$i;?><option value="<?php echo ($codeV["id"]); ?>" <?php echo ($user['Province']==$codeV['id']? "selected='selected'":""); ?> ><?php echo ($codeV["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
										<select name="City" id="s2">
											<option value="<?php echo empty($user['City'])?0:$user['City'];?>" selected="selected">请选择市</option>
										</select>

										<input type="text" name="Street" placeholder="详细地址" value="<?php echo ($user["Street"]); ?>" class="detaile_adress form-control" />
										</em>

									</div>
									<?php if(($user[MemberType][CodeValue] == 'c-member') OR ($user[MemberType][CodeValue] == 'd-member')): ?><div class="tel">
										<b>业务描述：</b>
										<em>
											<input type="text" name="memo" placeholder="详细地址" value="<?php echo ($user["memo"]); ?>" class="detaile_adress form-control" />
										</em>

									</div>
									<div class="tel">
										<li>
											<b>描述图片：</b>
											<em class="up_pic">
												<a href="javascript:void(0)">
													<img src="<?php echo empty($user['intImg'])?'//www.3qqq.com/static/images/user/up_pic.png':$user['intImg'];?>" height="100" width="100" />
													<input class="up_file" type="file" id="uploadFile" name="uploadFile">
													<input class="up_file" type="hidden"  name="intImg" value="<?php echo empty($user['intImg'])?'':$user['intImg'];?>">
												</a>
											</em>
										</li>
									</div><?php endif; ?>
								</div>
								<div class="submit_btn">
									<a id="sub_mit" stat = "1">确认</a>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
		<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery-1.11.1.js');?>"></script>
		<script src="<?php echo tempurl('//www.3qqq.com/static/js/main.js');?>"></script>
<script type="text/javascript">
	$("#sub_mit").click(function(){
		var formurl= $("#loginForm").attr("action"),id=$(this);
		if(id.attr("stat")!=1){
			return false;
		}
		$.ajax({
			cache: false,
			type: "POST",
			url:formurl,
			data:$('#loginForm').serialize(),// 你的formid
			async: true,
			error:function(request){
			},
			beforeSend:function(){
				id.attr("stat",2);
			},
			success:function(data){
				if(data.status==1){
					filterWarn(data.info);
					window.location.href=data.url;

				}else {
					id.attr("stat",1);
					filterWarn(data.info);
				}

			},

		});
	});

	var murl ="<?php echo U('Portal/Index/mcode');?>";
	$("#Verifi").click(function(){
		var phoneNumber = $("#phone_number").val();
		if(!(/^1(3|4|5|7|8)\d{9}$/.test(phoneNumber))){
			filterWarn("请填写正确手机号");
			return false;
		}
		$.ajax({
			cache: false,
			type: "POST",
			url:murl,
			data:{mobile:phoneNumber},// 你的formid
			async: true,
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
	secondcode("#s1","#s2");
	function secondcode(getid,setid){
		var setidvar=$(getid).val(),secondrmurl="<?php echo U('Portal/Area/codeB');?>",optiontext=null;
		if(setidvar=="0"){
			$(setid).html("<option value='0' selected='selected'>请选择市</option>")
			return false;
		}
		if($(setid).val()=="0"||$(setid).val()==null){
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
				console.log($(this).attr("id"));
				//alert($(this).attr("id"));
				ajaxFileUpload(fileid);
			});
			function ajaxFileUpload(id){
				var zzp =$("#"+id).attr("zzp");
				if(zzp==undefined){
					zzp="";
				}
				var url ="/index.php/Portal/Upload/load/zzp/"+zzp;

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
		</script>
	</body>

</html>