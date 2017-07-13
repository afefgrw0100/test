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
                <form action="<?php echo U('Home/Search/lists');?>" method="get" onsubmit="return search_text()">
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
                        <a href="<?php echo U('/');?>">首页</a>
                    </li>
                    <li>
                        <a href="<?php echo U('/list');?>">找项目 </a>
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
				<div class="title_c"><h2>债权人发布页面</h2></div>
				</div>
			<div class="main">
				<div class="object_con">
					<form id="pub_Object" method="post" action="<?php echo U('Web/Debt/add_edit');?>"  enctype="multipart/form-data">
						<ul>
							<li>
								<label class="label"><span class="need"></span> 标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：</label>
								<input type="text" value="" name="title"  class="form-control" >
							</li>
							<li>
								<label class="label"><span class="need"></span> 债权本金：</label>
								<input type="text" value="" name="price"  class="form-control" id="c1">
								<em>元</em>
							</li>
							<li>
								<label class="label"><span class="need"></span> 未归还利息：</label>
								<input type="text" value="" name="interest"  class="form-control" id="c2" >
								<em>元</em>
							</li>
							<li>
								<label class="label"><span class="need"></span>债权总金额：</label>
								<input type="text" value="" name="total"  class="form-control" readonly="readonly" id="c3">
								<em>元</em>
							</li>
							
							<li>
								<label class="label"><span class="need"></span> 资产类型：</label>
								
								<input type="radio" name="type" value="1" />
								<label> 逾期贷款</label>
								<input type="radio"value="2" name="type"/>
								<label> 企业商账</label>
								<input type="radio"value="3" name="type"/>
								<label>其他债权</label>
								<span class="dp-spabb">
									<span class="dp-spb">约定利率：</span>
									<span class="dp-spc">月息</span>
									<span class="dp-spd">
										<input type="text" name="rate" class="form-control">
									</span>
									<span class="dp-spc"> %</span>
								</span>
								
							</li>
							
							<li>
								<label class="label"><span class="need"></span>债权产生时间：</label>
								<input type="text" name="starttime" class="sang_Calender" id="t1"/>
							</li>
							
							<li>
								<label class="label"><span class="need"></span>债权到期时间：</label>
								<input type="text" name="endtime" class="sang_Calender" id="t2" />
							</li>
							
							<li>
								<label class="label"><span class="need"></span>担保方式：</label>
								<input type="radio" name="assureType" value="1" />
								<label>信用担保</label>
								<input type="radio"value="2" name="assureType"/>
								<label>保证</label>
								<input type="radio"value="3" name="assureType"/>
								<label>抵押</label>
								<input type="radio"value="4" name="assureType"/>
								<label>质押</label>
								
							</li>
							
							<li>
								<span class="fl_box"><label class="label"><span class="need"></span>是否具备原始凭证：</label>
								<input type="radio" name="isorgpic" value="1"  nullmsg=" "/>
								<label>是</label>
								<input type="radio" value="2" name="isorgpic"  nullmsg=" "/>
								<label>否</label></span>
								
								
								<span class="fl_box">
									<span class="dp-spab01"><span class="need"></span>是否已经催收：</span>
									<input type="radio" name="isioans" value="1"  nullmsg=" " />
									<label>是</label>
									<input type="radio"value="2" name="isioans"  nullmsg=" "/>
									<label>否</label>	
								</span>
								
							</li>
							
								<li>
									<span class="fl_box">
										<label class="label"><span class="need"></span>是否诉讼：</label>
										<input type="radio" name="islitigation" value="1"  nullmsg=" "/>
										<label>是</label>
										<input type="radio" value="2" name="islitigation"  nullmsg=" "/>
										<label>否</label>
									</span>

									<span class="fl_box">
										<span class="dp-spab01"><span class="need"></span>是否判决：</span>
										<input type="radio" name="isjudged" value="1"   nullmsg=" "/>
										<label>是</label>
										<input type="radio"value="2" name="isjudged"  nullmsg=" "/>
										<label>否</label>
									</span>
							</li>
							
							<li>
								<label class="label"><span class="need"></span>债权人姓名：</label>
								<input type="text" value="" name="owner"  class="form-control" >
							</li>
							<li>
								<label class="label"><span class="need"></span> 债权人类别：</label>
								<input type="radio" name="ownertype" value="1" />
								<label>金融机构</label>
								<input type="radio"value="2" name="ownertype"/>
								<label>民间金融企业</label>
								<input type="radio"value="3" name="ownertype"/>
								<label>一般企业</label>
								<input type="radio"value="4" name="ownertype"/>
								<label>个人</label>
								<input type="radio"value="5" name="ownertype"/>
								<label>其他</label>
								
							</li>
							
							
							<li>
								<label class="label"><span class="need"></span> 手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：</label>
								<input type="text" value="" name="cellphone"  class="form-control tel" >
							</li>
							
							<li>
								<label class="label"><span class="need"></span> 债务人姓名：</label>
								<input type="text" value="" name="debtor"  class="form-control tel" >
							</li>
							<li>
								<label class="label"><span class="need"></span>债务人所在地：</label>
								<select id="s3" onchange="secondcode('#s3','#s4')" name="debtadress[]" class="form-control" style=" width: 100px;">
									<option value="" selected="selected">请选择省</option>
									<?php if(is_array($codeA)): $i = 0; $__LIST__ = $codeA;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$codeV): $mod = ($i % 2 );++$i;?><option value="<?php echo ($codeV["id"]); ?>|<?php echo ($codeV["name"]); ?>|<?php echo ($codeV["code"]); ?>"><?php echo ($codeV["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
								<select id="s4" name="debtadress[]" class="form-control" style=" width: 100px;">
									<option value="" selected="selected">请选择市</option>
								</select>

								<input type="text" name="debtadress[]" placeholder="详细地址" class="form-control detaile_adress" />
							</li>
							
							<li>
								<span class="fl_box"><label class="label"><span class="need"></span>债务人类别：</label>
								<input type="radio" name="debttype" value="1" nullmsg="！"/>
								<label>企业</label>
								<input type="radio"value="2" name="debttype" nullmsg="！"/>
								<label>个人</label>
								<input type="radio"value="3" name="debttype" nullmsg="！"/>
								<label>其他</label></span>
								
								
								<span class="fl_box">
									<span class="dp-spab01"><span class="need"></span>债务人联系情况：</span>
									<input type="radio" name="otherdebtor" value="1"  nullmsg="！"/>
									<label>能联系</label>
									<input type="radio"value="2" name="otherdebtor" nullmsg="！"/>
									<label>不能联系</label>	
								</span>
								
							</li>
							
							
							<li>
								<label class="label"><span class="need"></span>债务人经营情况：</label>
								<input type="radio" name="debtoptstatue" value="1" />
								<label>正常经营</label>
								<input type="radio"value="2" name="debtoptstatue"/>
								<label>经营困难</label>
								<input type="radio"value="3" name="debtoptstatue"/>
								<label>濒临倒闭</label>
								<input type="radio"value="4" name="debtoptstatue"/>
								<label>已经破产</label>
								<input type="radio"value="5" name="debtoptstatue"/>
								<label>其他</label>
								
							</li>
							
							<li>
								<label class="label"><span class="need"></span>抵押物价值：</label>
								<input type="text" value="" name="pledgevalue"  class="form-control" >
								<em>元</em>
							</li>
							
							
								<li>
								<label class="label"><span class="need"></span>抵押物类别：</label>
								<input type="radio" name="pledgetype" value="1" />
								<label>房产</label>
								<input type="radio"value="2" name="pledgetype"/>
								<label>土地</label>
								<input type="radio"value="3" name="pledgetype"/>
								<label>车辆</label>
								<input type="radio"value="4" name="pledgetype"/>
								<label>机械设备</label>
								<input type="radio"value="5" name="pledgetype"/>
								<label>其他</label>
								
							</li>
							
							<li>
								<label class="label"><span class="need"></span>抵押物地址：</label>
								<select id="s1" onchange="secondcode('#s1','#s2')" name="pledgeaddress[]" class="form-control" style=" width: 100px;">
									<option value="" selected="selected">请选择省</option>
									<?php if(is_array($codeA)): $i = 0; $__LIST__ = $codeA;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$codeV): $mod = ($i % 2 );++$i;?><option value="<?php echo ($codeV["id"]); ?>|<?php echo ($codeV["name"]); ?>|<?php echo ($codeV["code"]); ?>"><?php echo ($codeV["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								<select id="s2" name="pledgeaddress[]" class="form-control" style=" width: 100px;">
									<option value="" selected="selected">请选择市</option>
									</select>
									
								<input type="text" name="pledgeaddress[]" placeholder="详细地址" class="form-control detaile_adress" />
							</li>
							
							<li>
								<span class="fl_box"><label class="label"><span class="need"></span>是否存在权属纠纷：</label>
								<input type="radio" name="isinissue" value="1"   nullmsg="请选择！"/>
								<label>是</label>
								<input type="radio"value="2" name="isinissue"  nullmsg="请选择！"/>
								<label>否</label></span>
							
								
								
								<span class="fl_box">
									<span class="dp-spab01"><span class="need"></span>抵押物状态：</span>
									<input type="radio" name="pledgestatue" value="1"  nullmsg="！"/>
									<label>正常</label>
									<input type="radio"value="2" name="pledgestatue" nullmsg="！"/>
									<label>封查</label>	
									<input type="radio"value="3" name="pledgestatue" nullmsg="！"/>
									<label>抵押</label>
									<input type="radio"value="4" name="pledgestatue" nullmsg="！"/>
									<label>其他</label>	
								</span>
								
							</li>
							
							<li>
								<label class="label"><span class="need"></span> 补充说明：</label>
								<textarea value="" class="form-control" name="remark"></textarea>
							</li>
							
								
								
								<li>
								<span class="fl_box"><label class="label"><span class="need"></span>处置方式：</label>
								<input type="checkbox" value="1" name="processmodle[]" class="processmodle" />
								<label>转让</label>
								<input type="checkbox" value="2" name="processmodle[]" class="processmodle"/>
								<label>质押融资</label>

								</span>
							
								
								
								<span class="fl_box processmodle_span">
									<span class="dp-spab01 processmodle_text">价格：</span>
									<span class="dp-spabb">
										<input type="text" value="" name="proprice"  class="form-control" >
									</span>
								<em class="icon">元</em>
								</span>
								
							</li>
							
							
							</li>
							<li>
								<label class="label"><span class="need"></span>凭证上传：</label>
								<div class="fl">
									<div class="dp-lih">注意：仅支持文件大小不超过2M的JPG、PNG格式的图像文件</div>
									<div class="dp-lig">
										<div class="dp-box">原始凭证或合同文书 </div>
										<div class="dp-box">权利证书及资料</div>
										<div class="dp-box">资产包列表</div>
									</div>
									
									<div class="dp-lig">
										<div class="dp-boxa">
											<a href="javascript:void(0)">
												<img src="//www.3qqq.com/static/images/common/up_01.png">
												<input class="up_file" type="file" name="file1" id="file1">
												<input class="up_file" type="hidden" name="orginpic">
											</a>
										</div>
										<div class="dp-boxa">
											<a  href="javascript:void(0)">
												<img src="//www.3qqq.com/static/images/common/up_01.png">
												<input  class="up_file" type="file" name="file2" id="file2">
												<input  class="up_file" type="hidden" name="ownerpic">
											</a>
										</div>
										<div class="dp-boxa">
											<a  href="javascript:void(0)">
												<img src="//www.3qqq.com/static/images/common/up_01.png">
												<input  class="up_file" type="file" name="file3" id="file3">
												<input  class="up_file" type="hidden" name="judgedpic">
											</a>
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
								<input type="hidden" value="">
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

    function search_text(){
        var rcc = $(".search_text").val();
        if(rcc==""){
            return false;
        }else {
            return true;
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

<script type="text/javascript" charset="utf-8" src="<?php echo tempurl('//www.3qqq.com/static/js/datetime.js');?>" ></script>
<script type="text/javascript" charset="utf-8" src="<?php echo tempurl('//www.3qqq.com/static/js/Validform_v5.3.2_min.js');?>"></script>
<script type="text/javascript">
	function datatime(e){
		var date = e;
		date = date.substring(0,19);
		date = date.replace(/-/g,'/');
		var timestamp = new Date(date).getTime();
		return timestamp;
	}
	$(function(){
		//$(".registerform").Validform();  //就这一行代码！;

		var demo=$("#pub_Object").Validform({
			tiptype:3,
			label:".label",
			btnSubmit:'#sub_mit',
			showAllError:true,
			datatype:{
				"zh1-6":/^[\u4E00-\u9FA5\uf900-\ufa2d]{1,6}$/,
				"tzm":function(gets,obj,curform,regxp){
					var stime = curform.find("#t1").val();
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
				ele:":input:text:eq(0)",
				datatype:"*4-20"
			},
			{
				ele:":input:text:eq(1)",
				datatype:"n"
			},
			{
				ele:":input:text:eq(2)",
				datatype:"n"
			},
			{
				ele:":input:text:eq(3)",
				datatype:"n"
			},
			{
				ele:":input:text:eq(5)",
				datatype:"*4-20"
			},

			{
				ele:":input:text:eq(6)",
				datatype:"tzm"
			},
			{
				ele:":input:text:eq(7)",
				datatype:"*2-20"
			},

			{
				ele:":input:text:eq(8)",
				datatype:"m"
			},
			{
				ele:":input:text:eq(9)",
				datatype:"*2-20"
			},
			{
				ele:":input:text:eq(13)",
				datatype:"n"
			},
			{
				ele:":input:text:eq(16)",
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
				ele:"select:lt(4)",
				datatype:"*"
			},
			{
				ele:":checkbox",
				datatype:"*"
			}
		]);

	})
</script>
<script type="text/javascript" charset="utf-8" src="<?php echo tempurl('//www.3qqq.com/static/js/ajaxfileupload.js');?>"></script>
<script type="text/javascript">
	$("#c1,#c2").blur(function(){
		var c1 = $("#c1").val(),c2 = $("#c2").val(),c3;
		c3=Number(c1)+Number(c2);
		$("#c3").val(c3);
	});
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
						$("#"+id).prev().attr("src",data.url);
						$("#"+id).next().val(data.url);
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
<script>
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
		secondcode("#s3","#s4")
	})
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
<script type="text/javascript">
	$(function() {
		$('#agent').on("click","span",(function(){
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