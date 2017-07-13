<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<script src="<?php echo tempurl('/static/js/jquery-1.7.2.min.js');?>"></script>
	<script src="<?php echo tempurl('/static/js/main.js');?>"></script>
	<link rel="stylesheet" href="<?php echo tempurl('/static/style/bootstrap.min.css');?>" />
	<link rel="stylesheet" href="<?php echo tempurl('/static/style/iframe.css');?>" />

	<body>

		<div class="mainhtml">
			<div class="mainhtml_c">
				<div class="fr">
					<div class="top_right">
    <span class="hello">Hi , <i><?php echo dataG(); echo ($_SESSION['user']['RealName']); ?></i></span>
    <span class="time">上次登录时间：<i><?php echo empty(session('user.LastLoginTime'))?"当前是第一次登录":session('user.LastLoginTime');?></i></span>
						<span class="btn"><a href="<?php echo U('User/Economic/visitf');?>" class="btn1">充值</a><a href="<?php echo U('User/Economic/trainning');?>"  class="btn2">提现</a>
						</span>
</div>
					<div class="todo floor mt70">
						<div class="title">基本信息修改</div>

						<div class="baseInfo floor" style=" border: none;">
							<form action="<?php echo U('User/Logic/savemember');?>" method="post" id="loginForm">
								<div class="con revise">
									<div class="xing"><img src="/static/images/user/xing_03.jpg"></div>
										<ul>
											<li><b>用户名称：</b> <em><?php echo ($user["MemberName"]); ?></em></li>
											<li><b>用户类型：</b> <em><?php echo ($user["MemberType"]["CodeName"]); ?></em></li>
											<li><b>真实姓名：</b> <em><input type="text" name="RealName" class="form-control" value="<?php echo ($user["RealName"]); ?>"></em></li>
											<li><b>微信号码：</b> <em><input type="text" name="MicroMsg" class="form-control" value="<?php echo ($user["MicroMsg"]); ?>"></em></li>
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
	</body>

</html>