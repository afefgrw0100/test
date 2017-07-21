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
				<div class="title">我的发布 <b class="publish_btn">
					<a href="<?php echo U('Web/Index/assets');?>"  target="_parent">发布实物资产</a>
					<a href="<?php echo U('Web/Index/packages');?>"  target="_parent">发布资产包</a>
					<a href="<?php echo U('Web/Index/debt');?>"  target="_parent">发布债权</a></b></div>
				<form action="<?php echo U('User/Common/mypublish');?>" method="get"  id="dosearch">
					<div class="mypublish">
						<div class="fl category"><em>信息类别：</em>
									<span>
										<select name="type">
											<option value="0">所有信息</option>
											<?php if(is_array($messageType)): $i = 0; $__LIST__ = $messageType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$message): $mod = ($i % 2 );++$i;?><option value="<?php echo ($message["CodeID"]); ?>"><?php echo ($message["CodeName"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</span>
						</div>
						<div class="fl time">时间：<input name="starttime" class="sang_Calender" type="text">
							到:&nbsp;<input name="endtime" class="sang_Calender" type="text">
							<input type="submit"  value="查询" class="btn"></div>
					</div>
				</form>

				<div class="table">
					<table class="table" border="" cellspacing="" cellpadding="">
						<tr>
							<th>项目名称</th>
							<th>类别</th>
							<th>处置方式</th>
							<th>价格</th>
							<th>发布时间</th>
							<th>当前状态</th>
							<th>操作</th>
						</tr>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($vo["title"]); ?></td>
								<td><?php echo empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?"":"资产包"):"实物资产"):"债权";?></td>
								<td><?php echo ($vo['promodel']=="2"?"质押金额":"转让金额"); ?></td>
								<td><em class="info_num">¥<?php echo ($vo["total"]); ?>元</em></td>
								<td><?php echo (date("Y-m-d",$vo["CreateTime"])); ?></td>
								<td><?php echo ($vo["AssetsStatue"]); ?></td>
								<td><a href="<?php echo U('Home/lists/content',empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?'':array('PackageID'=>$vo['PackageID'],'card'=>authcode(session('user.MemberId'),'ENCODE'))):array('AssetsID'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE'))):array('DebtID'=>$vo['DebtID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_parent">查看</a></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table>
					<div class="page">
						<?php echo ($page); ?>
					</div>


				</div>
			</div>

		</div>
	</div>
</div>

</div>
<script src="<?php echo tempurl('/static/js/datetime.js');?>"></script>
<script type="text/javascript">
//	$(".btn").live("click",function(){
//		var formurl = $("#dosearch").attr("action");
//		$.ajax({
//			cache: false,
//			type: "POST",
//			url:formurl,
//			data:$('#dosearch').serialize(),// 你的formid
//			async: true,
//			error:function(request){
//			},
//			beforeSend:function(){},
//			success:function(data){
//				//alert(data);
//
//			},
//
//		});
//
//	});


</script>
</body>

</html>