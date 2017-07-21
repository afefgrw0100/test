<?php if (!defined('THINK_PATH')) exit(); if(!empty($eqtc['tit'])): ?><div class="mbx">为您找到<em><?php echo ($eqtc["sum"]); ?>条“<?php echo ($eqtc["tit"]); ?>”</em>搜索结果</div>
    <?php else: endif; ?>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="box">
       <?php if(($vo['AssetsStatue'] == 8)): ?><div class="saled-icon"><img src="//static.resource.tejinhui.com/static/images/common/chengjiao.png"></div><?php endif; ?>

        <div class="fl pic">
            <?php if($vo['source'] == 6): ?><a href="<?php echo U('Home/lists/content',array('AssetsIDrent'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_blank">
                    <img src="<?php echo empty($vo['titimg'])?'http://placehold.it/180x140':imgpublic($vo['titimg']).'?imageView/2/w/180/h/140';?>">
                </a>
                <?php else: ?>
                <a href="<?php echo U('Home/lists/content',array('AssetsID'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_blank">
                    <img src="<?php echo empty($vo['titimg'])?'http://placehold.it/180x140':imgpublic($vo['titimg']).'?imageView/2/w/180/h/140';?>">
                </a><?php endif; ?>

        </div>
        <div class="fl con">
            <div class="info1"><b><?php echo ($vo["title"]); ?></b>
                <em>
                    <?php if($vo['source'] == 6): ?><a href="<?php echo U('Home/lists/content',array('AssetsIDrent'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_blank">查看详情</a>
                        <?php else: ?>
                        <a href="<?php echo U('Home/lists/content',array('AssetsID'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_blank">查看详情</a><?php endif; ?>

                </em>
            </div>
            <div class="info2 searlist">
                <span><b>资产类型</b><em><a  href="javascript:void(0)" msgtype="<?php echo empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?'':'13'):'11'):'12';?>">
                    <?php if($vo['source'] == 1): echo empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?"":C('pack_type')[$vo['typeset']]):C('Aucassetstype')[$vo['typeset']]):C('debt_type')[$vo['typeset']];?> <?php else: ?>  <?php echo empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?"":C('pack_type')[$vo['typeset']]):C('asset_type')[$vo['typeset']]):C('debt_type')[$vo['typeset']]; endif; ?>
                  </a></em></span>
                <?php if($vo['source'] == 6): ?><span><b>出租面积</b><em><?php echo ($vo["Acreage"]); ?>m²</em></span>
                    <?php else: ?>
                <span><b>逾期时间</b><em><?php echo empty($vo['daytime'])?"未逾期":$vo['daytime']; echo ($vo["Acreage"]); ?></em></span><?php endif; ?>
                <span><b><?php echo empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?"":"资产包总金额"):"资产金额"):"债权金额";?></b><em class="money">¥<i class="info_num numtenhousand"><?php echo ($vo["total"]); ?></i></em></span>
                <span><b><?php if($vo['source'] == 1): ?>起拍价<?php elseif($vo['source'] == 6): ?>月出租价<?php else: ?>转让金额<?php endif; ?></b><em class="money2">¥<i class="info_num numtenhousand"><?php echo ($vo["proprice"]); ?></i></em></span>
                <span class="address">
                    <b>所在地</b>
                    <em>
                        <a href="javascript:void(0)" province="<?php echo ($vo["adr"]["ppd"]["0"]); ?>" city="" ><?php echo ($vo["adr"]["ppd"]["1"]); ?></a> —
                        <a href="javascript:void(0)" province="<?php echo ($vo["adr"]["ppd"]["0"]); ?>" city="<?php echo ($vo["adr"]["ckk"]["0"]); ?>" ptext = "<?php echo ($vo["adr"]["ppd"]["1"]); echo ($vo["adr"]["ckk"]["1"]); ?>"><?php echo ($vo["adr"]["ckk"]["1"]); ?></a>
                        <i class="iconfont">&#xe639;</i>
                    </em>
                </span>
            </div>
        </div>

        <div class="fl click">
            <div class="info1"><b>目前进度</b> <em><?php if($vo['source'] == 1): if(strtotime($vo['AucStart']) > time()): ?>拍卖未开始 <?php elseif((strtotime($vo['AucStart']) < time()) AND (strtotime($vo['AucEnd']) > time())): ?>拍卖中<?php else: ?>拍卖结束<?php endif; else: if($vo['AssetsStatue'] == 4): ?>已完成尽调<?php elseif($vo['AssetsStatue'] == 8): ?>已成交<?php endif; endif; ?></em></div>
            <div class="info1"><b>折扣率</b> <em><?php echo round(($vo['proprice']/$vo['total']),4)*100;?>%</em></div>
            <?php if(($vo['AssetsStatue'] == 8) OR (($vo['source'] == 1) AND comper_time($vo['AucEnd']))): ?><div class="btn warning">
                    <?php else: ?>
                    <div class="btn "><?php endif; ?>

            <?php if($vo['source'] == 6): ?><a href="<?php echo U('Home/lists/content',array('AssetsIDrent'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_blank">查看详情</a>
                <?php else: ?>
                <a href="<?php echo U('Home/lists/content',array('AssetsID'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" target="_blank">查看详情</a><?php endif; ?></div>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
<div class="page">
    <div>
        <?php echo ($page); ?>
    </div>
</div>
<script>
    //首页banner


    //回到顶部
    var numi = $(".numtenhousand").size();
    for(var i=0;i<numi;i++){
        var numtenthousand = parseInt($(".numtenhousand:eq("+i+")").html());

        if(numtenthousand>10000){
            numtenthousand = Math.round((numtenthousand /10000) * 100) / 100;
            numtenthousand = numtenthousand + "万";
            $(".numtenhousand:eq("+i+")").html(numtenthousand);
        }
    }

</script>