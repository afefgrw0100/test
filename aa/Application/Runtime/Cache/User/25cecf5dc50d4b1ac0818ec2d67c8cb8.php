<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body style="text-align: center;">

<button onclick="getOrder()">购买</button>


<jquery />
<script>

function onBridgeReady(){
    var data=<?php echo ($data); ?>;
    WeixinJSBridge.invoke(
        'getBrandWCPayRequest', data, 
        function(res){
            if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                window.location.href="<?php echo ($url); ?>";
                //window.history.back(-1);
                // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回    ok，但并不保证它绝对可靠。
            }else{
                window.history.back(-1);
              //  alert(res.err_code+res.err_desc+res.err_msg); // 显示错误信息
            }
        }
    );
}

 if (typeof WeixinJSBridge == "undefined"){
     if( document.addEventListener ){
         document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
     }else if (document.attachEvent){
         document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
         document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
     }
 }else{
      onBridgeReady();
 }

</script>
</body>
</html>