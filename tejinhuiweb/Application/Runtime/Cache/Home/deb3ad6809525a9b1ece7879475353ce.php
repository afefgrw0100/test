<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media">
    <?php if($vo['source'] == 6): ?><a href="<?php echo U('Home/lists/content',array('AssetsIDrent'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" >

        <?php else: ?>
        <a href="<?php echo U('Home/lists/content',array('AssetsID'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>" ><?php endif; ?>
        <?php if(($vo['AssetsStatue'] == 8) ): ?><div class="saled-icon"><img src="//static.resource.tejinhui.com/static/images/common/chengjiao.png"></div><?php endif; ?>
        <img class="mui-media-object mui-pull-left" src="<?php echo empty($vo['titimg'])?'http://placehold.it/180x140':imgpublic($vo['titimg']).'?imageView/2/w/180/h/140';?>">
        <div class="mui-media-body">
            <div class="name"><?php echo ($vo["title"]); ?></div>
            <div class='mui-ellipsis'>
                <span><b>资产类型</b><em><?php echo empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?"":C('pack_type')[$vo['typeset']]):C('asset_type')[$vo['typeset']]):C('debt_type')[$vo['typeset']];?></em></span>
                <span><b><?php if($vo['source'] == 1): ?>起拍价<?php elseif($vo['source'] == 6): ?>月出租价<?php else: ?>转让金额<?php endif; ?></b><em class=" numtenhousand"><?php echo ($vo["proprice"]); ?></em></span>
                <span><b>折扣率</b><em class="discount "><?php echo round(($vo['proprice']/$vo['total']),4)*100;?>%</em></span>
            </div>
        </div>
    </a>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
<script>
    //首页banner


    //回到顶部


</script>