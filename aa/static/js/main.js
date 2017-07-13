//首页选项卡
function nTabs(thisObj, Num) {
	if(thisObj.className == "active") return;
	var tabObj = thisObj.parentNode.id;
	var tabList = document.getElementById(tabObj).getElementsByTagName("li");
	for(i = 0; i < tabList.length; i++) {
		if(i == Num) {
			thisObj.className = "active";
			document.getElementById(tabObj + "_Content" + i).style.display = "block";
		} else {
			tabList[i].className = "normal";
			document.getElementById(tabObj + "_Content" + i).style.display = "none";
		}
	}
}

//给当前页或者跳转后页面的导航栏添加选中样式

$(document).ready(function() {
	$(".nav_c div ul li a").each(function() {
		$this = $(this);
		//alert(window.location);
		if($this[0].href == String(window.location)) {

			//var tcccc=document.title;
			 // www.jquerycn.cn

			//var cdo_tit = $this.html();
			//alert(cdo_tit);
			//document.title =cdo_tit+"—"+tcccc;
			var cselect= $this.attr("id");
			if(cselect=='cselect'){
				return ;
			}
			$this.addClass("select");
			$(".nav_c div ul li ul li a").removeClass("select");
		}
	});

});

//首页数字转化
$(function() {
	$('.info_num').each(function(index) {
		_this = $(this).text();
		var str=thousandBitSeparator(_this);
		//console.log(_this);
		//var str = _this.split('').reverse().join('').replace(/(\d{3})/g, '$1,').replace(/\,$/, '').split('').reverse().join('');

		$(this).text(str);
	})
})
function thousandBitSeparator(num) {
	return num && (num
			.toString().indexOf('.') != -1 ? num.toString().replace(/(\d)(?=(\d{3})+\.)/g, function($0, $1) {
			return $1 + ",";
		}) : num.toString().replace(/(\d)(?=(\d{3})+\b)/g, function($0, $1) {
			return $1 + ",";
		}));
}

//提示语 2S隐藏
function filterWarn(msg) {
	var $warnBox = $('<div class="tips">' + msg + '</div>')
	$('body').append($warnBox)
	$warnBox.fadeIn()
	setTimeout(function() {
		$warnBox.fadeOut(function() {
			$warnBox.remove()
		})
	}, 2000)
}

//分享微博 微信
$(function() {
	$('.tj_btn .share').click(function() {
		$('.mask').show();
	})
//	//经纪人支付弹窗
//	$('.next_btn a').click(function() {
//		$('.mask').show();
//	})
//
	
	
			//经纪人支付弹窗
		$('.next_btn a').delegate("click",function() {
		var formurl =$("#doForm").attr("action");
		$.ajax({
		cache: false,
		type: "POST",
		url:formurl,
		data:$('#doForm').serialize(),// 你的formid
		async: true,
		error:function(request){
		},
		beforeSend:function(){},
		success:function(data){
		//alert(1111);
		if(data.status==1){
		$('.mask').show();
		}else {
		filterWarn(data.info);
		}
		},
		
		});
		})



	$('.close').click(function() {
		$('.mask').css('display', 'none');
	});
	//$('.share').click(function() {
	//	$('.mask').show();
	//})
})