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
							<div class="title">投诉建议</div>
							<div class="suggesstion">
							<div><em>标题：</em><b><input type="text" class="form-control"></b></div>
							<div><em>内容：</em><b><textarea name="" class="form-control"></textarea></b></div>
							<div><input type="submit" class="btn"></div>
							</div>
						</div>

						<div class="todo floor">
							<div class="title">我提交的信息</div>
							<div class="time">时间：<input name="starttime" class="sang_Calender" type="text">
							到:&nbsp;<input name="endtime" class="sang_Calender" type="text">
							<input type="button"  value="查询" class="btn"></div>
							<div class="table">
								<table class="table" border="" cellspacing="" cellpadding="">
									<tr>
										<th>标题</th>
										<th>当前状态</th>
										<th>提交时间</th>
										<th>操作</th>
									
									</tr>

									<tr>
										<td>付款到账问题</td>
										<td>未处理</td>
										<td>2016-11-12</td>
										<td><a href="">查看</a><a href="">撤回</a></td>
									</tr>

									<tr>
										<td>付款到账问题</td>
										<td>未处理</td>
										<td>2016-11-12</td>
										<td><a href="">查看</a><a href="">撤回</a></td>
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