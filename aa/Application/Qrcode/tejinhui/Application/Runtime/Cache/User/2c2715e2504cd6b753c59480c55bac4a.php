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
				<div class="title">请确认并完善经纪人信息</div>


				<div class="baseInfo floor" style=" border: none;">
					<div class="con">
						<ul>
							<li ><b>用户名称：</b>	<em><?php echo ($user["MemberName"]); ?></em></li>
							<li><b>用户类型：</b>	<em><?php echo ($user["MemberType"]["CodeName"]); ?></em></li>
							<li><b>真实姓名：</b>	<em><?php echo ($user["RealName"]); ?></em></li>
							<li><b>微信号码：</b>	<em><?php echo empty($user['MicroMsg'])?"你还没有添加微信":$user['MicroMsg'];?></em></li>
							<li><b>手机号码：</b>	<em><?php echo ($user["CellPhone"]); ?></em></li>
							<li><b>详细地址：</b>	<em><?php echo ($user["Province"]["name"]); echo ($user["City"]["name"]); echo ($user["Street"]); ?></em></li>
							<form enctype="multipart/form-data" method="post" action="<?php echo U('User/Economic/doecnomic');?>" id="doForm" target="_parent">
								<li><b>主&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;体：</b>
									<em>
										<select name="type">
											<option value="请选择省"  name="type">请选择</option>
											<option value="1"  <?php echo ($user['IdentityType']==1?"selected='selected'":""); ?>>个人</option>
											<option value="2"  <?php echo ($user['IdentityType']==2?"selected='selected'":""); ?>>企业</option>

										</select>
									</em>
								</li>
								<li>
									<b>证明文件：</b>
									<em class="up_pic">
										<a href="javascript:void(0)">
											<img src="<?php echo empty($user['IdentityImg'])?'/static/images/user/up_pic.png':$user['IdentityImg'];?>">
											<input class="up_file" type="file" id="uploadFile" name="uploadFile" zzp = "imgfile">
											<input class="up_file" type="hidden"  name="imgname" value="<?php echo empty($user['IdentityImg'])?'':$user['IdentityImg'];?>">
										</a>
									</em>
								</li>
							</form>

						</ul>
					</div>
					<div class="next_btn"><a href="javascript:void(0)" target="_parent">下一步</a></div>
				</div>
			</div>

		</div>
	</div>

	<!--支付-->

	<script type="text/javascript">
		function show() {
			if(window.parent.document.getElementById('mask')) {
				window.parent.document.getElementById('mask').style.display = "block";
			}
		};
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
		$('.next_btn a').live("click",function() {
			var formurl =$("#doForm").submit();

		})
	</script>
</div>

</body>

</html>