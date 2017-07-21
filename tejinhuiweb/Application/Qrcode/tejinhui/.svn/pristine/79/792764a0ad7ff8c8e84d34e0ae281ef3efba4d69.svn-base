<?php if (!defined('THINK_PATH')) exit(); if(!empty($eqtc['tit'])): ?><div class="mbx">为您找到<em><?php echo ($eqtc["sum"]); ?>条“<?php echo ($eqtc["tit"]); ?>”</em>搜索结果</div>
    <?php else: endif; ?>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="box">
        <div class="fl pic"><img src="http://placehold.it/180x140"></div>
        <div class="fl con">
            <div class="info1"><b><?php echo ($vo["title"]); ?></b> <em><a href="<?php echo U('Home/lists/content',empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?'':array('PackageID'=>$vo['PackageID'],'card'=>authcode(session('user.MemberId'),'ENCODE'))):array('AssetsID'=>$vo['AssetsID'],'card'=>authcode(session('user.MemberId'),'ENCODE'))):array('DebtID'=>$vo['DebtID'],'card'=>authcode(session('user.MemberId'),'ENCODE')));?>">查看详情</a></em></div>
            <div class="info2">
                <span><b>项目类型</b><em><?php echo empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?"":"资产包"):"实物资产"):"债权";?></em></span>
                <span><b>逾期时间</b><em><?php echo ($vo["daytime"]); ?></em></span>
                <span><b><?php echo empty($vo['DebtID'])?(empty($vo['AssetsID'])?(empty($vo['PackageID'])?"":"资产包总金额"):"资产金额"):"债权金额";?></b><em class="money">¥<i class="info_num"><?php echo ($vo["total"]); ?></i></em></span>
                <span><b><?php echo ($vo['promodel']=="2"?"质押金额":"转让金额"); ?></b><em class="money2">¥<i class="info_num"><?php echo ($vo["proprice"]); ?></i></em></span>
                <span class="address"><b>所在地</b><em><?php echo ($vo["adress"]); ?><i class="iconfont">&#xe639;</i></em></span>
            </div>
        </div>

        <div class="fl click">
            <div class="info1"><b>目前进度</b> <em>已完成尽调</em></div>
            <div class="info1"><b>折扣率</b> <em><?php echo bcdiv($vo['proprice'],$vo['total'],4)*100;?>%</em></div>
            <div class="btn">点击查询</div>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
<div class="page">
    <div>
        <?php echo ($page); ?>
    </div>
</div>