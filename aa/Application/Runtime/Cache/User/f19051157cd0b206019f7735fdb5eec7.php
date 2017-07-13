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
				<div class="title">我的发布 <b class="publish_btn">
					<?php if(session('user.MemberType') == 4): ?><a href="<?php echo U('Web/Index/assets');?>"  target="_parent">发布实物转让</a>
						<a href="<?php echo U('Web/Index/assetsLease');?>"  target="_parent">发布出租</a>
						<!--<a href="<?php echo U('Web/Index/assetsauc');?>"  target="_parent">发布司法拍卖</a>--><?php endif; ?>
					</b>
				</div>
				<form action="<?php echo U('User/Common/mypublish');?>" method="get"  id="dosearch">
					<div class="mypublish">
						<div class="fl category"><em>信息类别：</em>
									<span>
										<select name="type">
											<option value="0">所有信息</option>
											<option value="2">转让</option>
											<option value="6">出租</option>
											<!--<option value="1">司法拍卖</option>-->

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
								<td>
									<?php if(($vo['source'] == 1)): ?>司法拍卖

										<?php elseif($vo['source'] == 6): ?> 出租
										<?php else: ?>转让<?php endif; ?>
								</td>
								<td>
									<?php if(($vo['source'] == 1)): elseif($vo['source'] == 6): ?>
										<?php if(($vo['promodel'] == 1)): ?>整租
											<?php elseif($vo['promodel'] == 2): ?>
											分租<?php endif; ?>
										<?php else: ?>
										<?php if(($vo['promodel'] == 1)): ?>转让
											<?php elseif($vo['promodel'] == 2): ?>
											质押
											<?php else: ?>
											转让/质押<?php endif; endif; ?>
								</td>
								<td><em class="info_num">¥<?php echo ($vo["total"]); ?>元</em></td>
								<td><?php echo (date("Y-m-d",$vo["CreateTime"])); ?></td>
								<td><?php echo ($vo["AssetsStatue"]); ?></td>
								<td>
									<?php if(($vo['source'] == 1)): elseif($vo['source'] == 6): ?>
										<a href="<?php echo U('Home/lists/content',array('AssetsIDrent'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_parent">查看</a>
										<?php else: ?>
										<a href="<?php echo U('Home/lists/content',array('AssetsID'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_parent">查看</a><?php endif; ?>

								</td>
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
<script src="<?php echo tempurl('//www.3qqq.com/static/js/jquery-1.11.1.js');?>"></script>
<script src="<?php echo tempurl('//www.3qqq.com/static/js/main.js');?>"></script>
<script src="<?php echo tempurl('//www.3qqq.com/static/js/datetime.js');?>"></script>
<script type="text/javascript">
//	$(".btn").on("click",function(){
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