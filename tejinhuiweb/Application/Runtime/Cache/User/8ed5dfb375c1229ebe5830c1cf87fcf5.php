<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<link rel="stylesheet" href="../style/bootstrap.min.css" />
	<link rel="stylesheet" href="../style/user.css" />
	<link rel="stylesheet" href="../style/iconfont.css" />
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script src="../js/main.js"></script>
	

	<body>
		<!-- header -->
		<div class="header">
			<div class="top_line"></div>
			<div class="top2">
				<div class="top2_c">
					<div class="fl logo"><b><img src="../images/common/index_03.jpg"></b></<em><img src="../images/common/index_06.jpg"></em>
					</div>
					<div class="fr search">
						<input type="text" class="search_text" placeholder="找项目">
						<input type="button" class="search_bth">
					</div>

				</div>

			</div>
			<div class="nav">
				<div class="nav_c">
					<div class="fl">
						<ul>
							<li class="select">
								<a href="#">首页</a>
							</li>
							<li>
								<a href="#">优质项目 </a>
							</li>
							<li>
								<a href="#">发布项目</a>
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
						<a href="#">会员中心</a>
					</div>
				</div>

			</div>
		</div>
		<!-- header end -->

		<div class="main">

			<div class="member_bg">
				<div class="member_bg1"></div>
				<div class="member_con">
					<!--<div class="iconfont">&#xe615;</div>-->
					<div class="fl">
						<div class="man"><img src="../images/user/man_03.jpg"></div>
						<div class="member_left">
							<h2>会员中心</h2>
							<ul>
								<li>
									<a href=""><i class="icon iconfont">&#xe606;</i>我的账户</a>
								</li>
								<li>
									<a href=""><i class="icon iconfont">&#xe603;</i>订单管理</a>
								</li>
								<li>
									<a href=""><i class="icon iconfont">&#xe631;</i>待办事项</a>
								</li>
								<li>
									<a href=""><i class="icon iconfont">&#xe673;</i>我的发布</a>
								</li>
								<li>
									<a href=""><i class="icon iconfont">&#xe601;</i>提现管理</a>
								</li>
								<li>
									<a href=""><i class="icon iconfont">&#xe600;</i>资金流水</a>
								</li>
								<li>
									<a href=""><i class="icon iconfont">&#xe602;</i>个人名片</a>
								</li>
								<li>
									<a href=""><i class="icon iconfont">&#xe615;</i>投诉建议</a>
								</li>
							</ul>
						</div>

					</div>
					<div class="fr">
						
						<div class="todo floor mt70">
							<div class="title">我的发布</div>
							<div class="mypublish">
								<div class="fl category"><em>信息类别：</em>
								<span>
									<select name="">
										<option value="请选择省" selected="selected">请选择省</option>
										<option value="">实物资产</option>
										<option value="">实物资产</option>
										<option value="">实物资产</option>
										<option value="">实物资产</option>
									</select>
								</span>
							</div>
							<div class="fl time">时间：<input name="starttime" class="sang_Calender" type="text">
							到:&nbsp;<input name="endtime" class="sang_Calender" type="text">
							<input type="button"  value="查询" class="btn"></div>
							</div>
							
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

									<tr>
										<td>长沙银行大厦转让</td>
										<td>实物转让</td>
										<td>转让</td>
										<td><em class="info_num">¥32232</em></td>
										<td>2016-11-12</td>
										<td>等待接单</td>
										<td><a href="">查看</a></td>
									</tr>

									<tr>
										<td>长沙银行大厦转让</td>
										<td>实物转让</td>
										<td>转让</td>
										<td><em class="info_num">¥32232</em></td>
										<td>2016-11-12</td>
										<td>等待接单</td>
										<td><a href="">查看</a></td>
									</tr>
								</table>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

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
					<div class="fr"><img src="../images/common/erweima.png"></div>
				</div>
				<div class="info2">
					<div class="pic">
						<img src="../images/temp/footer_pic.png">
						<img src="../images/temp/footer_pic2.png">
						<img src="../images/temp/footer_pic2.png">
						<img src="../images/temp/footer_pic2.png">
						<img src="../images/temp/footer_pic2.png">

					</div>
					<div class="con">湘ICP备12023672号-5 | 湘公网安备 11010502025073 号 © 2016 tejinhui.com | 特金汇有限公司 版权所有</div>
				</div>

			</div>
		</div>
		<script src="../js/datetime.js"></script>

	</body>

</html>