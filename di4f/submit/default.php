<?php	
require '../core/common.php';
$trade_no=daddslashes($_GET['trade_no']);
$srow=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$trade_no}' limit 1")->fetch();
if(!$srow)sysmsg('该订单号不存在，请返回来源地重新发起请求！');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Language" content="zh-cn">
<meta name="renderer" content="webkit">
<title>请选择支付方式 - <?php echo $_GET["sitename"]?$_GET["sitename"]:'零度即时到账支付';?></title>
<link href="/assets/css/wechat_pay.css" rel="stylesheet" media="screen">
<style type="text/css">
img.logo{width:14px;height:14px;margin:0 5px 0 3px;}
li{float: left;margin-left: 16px;margin-bottom: 35px;}
</style>
</head>
<body>
<div class="body">
<h1 class="mod-title">
<span class="text">请选择支付方式 - <?php echo $_GET["sitename"]?$_GET["sitename"]:'零度即时到账支付';?></span>
</h1>
<div class="mod-ct">
<div class="order">
</div>
<div class="amount">￥<?php echo $srow['money']?></div>
<h2>请选择支付方式：<h2><br/>
<ul>
	<li>
		<a href="alipay_payapi.php?type=alipay&trade_no=<?php echo $trade_no?>&sitename=<?php echo $_GET["sitename"]?>">
			<label>
				<img src="/assets/img/alipay.gif" title="支付宝"/>
			</label>
		</a>
	</li>
	<li>
		<a href="default_payapi.php?type=qqpay&trade_no=<?php echo $trade_no?>&sitename=<?php echo $_GET["sitename"]?>">
			<label>
				<img src="/assets/img/qqpay.jpg" title="QQ钱包"/>
			</label>
		</a>
	</li>
		
	<li>
		<a href="default_payapi.php?type=wxpay&trade_no=<?php echo $trade_no?>&sitename=<?php echo $_GET["sitename"]?>">
			<label>
				<img src="/assets/img/weixin.gif" title="微信支付"/>
			</label>
		</a>
	</li>
	<li>
		<a href="default_payapi.php?type=qqpay&trade_no=<?php echo $trade_no?>&sitename=<?php echo $_GET["sitename"]?>">
			<label>
				<img src="/assets/img/tenpay.gif" title="财付通"/>
			</label>
		</a>
	</li>
</ul>

<div class="detail" id="orderDetail">
<dl class="detail-ct" style="display: none;">
<dt>购买物品</dt>
<dd id="productName"><?php echo $srow['name']?></dd>
<dt>商户订单号</dt>
<dd id="billId"><?php echo $srow['out_trade_no']?></dd>
<dt>创建时间</dt>
<dd id="createTime"><?php echo date("Y-m-d H:i:s")?></dd>
</dl>
<a href="javascript:void(0)" class="arrow"><i class="ico-arrow"></i></a>
</div>
<div class="tip">
<span class="dec dec-left"></span>
<span class="dec dec-right"></span>
<div class="tip-text">
<p>请选择一种支付方式完成支付</p>
<p>诈骗违规投诉QQ272341207</p>
</div>
</div>
</div>
</div>
<script src="/assets/js/qrcode.min.js"></script>
<script src="/assets/js/qcloud_util.js"></script>
<script>
    // 订单详情
    $('#orderDetail .arrow').click(function (event) {
        if ($('#orderDetail').hasClass('detail-open')) {
            $('#orderDetail .detail-ct').slideUp(500, function () {
                $('#orderDetail').removeClass('detail-open');
            });
        } else {
            $('#orderDetail .detail-ct').slideDown(500, function () {
                $('#orderDetail').addClass('detail-open');
            });
        }
    });
</script>
</body>
</html>