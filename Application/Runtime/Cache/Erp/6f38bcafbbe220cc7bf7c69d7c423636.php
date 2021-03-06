<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ERP系统</title>
<!-- <link rel="stylesheet" href="/merp/Public/assets/simpla/css/reset.css" type="text/css" />
<link rel="stylesheet" href="/merp/Public/assets/simpla/css/style.css" type="text/css" />
<link rel="stylesheet" href="/merp/Public/assets/simpla/css/invalid.css" type="text/css" /> -->
<script type="text/javascript" src="/merp/Public/assets/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="/merp/Public/assets/WdatePicker/WdatePicker.js"></script>
<link rel="stylesheet" href="/merp/Public/bootstrap/bootstrap.min.css" type="text/css" media="screen" />
<!-- 扁平化的主题需要注释掉以下代码 -->
<!-- <link rel="stylesheet" href="/merp/Public/bootstrap/bootstrap-theme.min.css" type="text/css" media="screen" />
 --> 
 <link rel="stylesheet" href="/merp/Public/bootstrap/docs.min.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/merp/Public/bootstrap/font-awesome/css/font-awesome.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/merp/Public/css/page.css" type="text/css" media="screen" />
<!-- <script type="text/javascript" src="/merp/Public/assets/js/holder.js" ></script> -->
<script type="text/javascript" src="/merp/Public/assets/js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="/merp/Public/bootstrap/bootstrap.js" ></script>
<script type="text/javascript">
//调整iframe高度
function iframeAuto() 
{ 
try 
	{ 
		var H = $(".container-fluid").height();
		var H2 = $("#silde").css("height");
		if(H>1500){
			H = "1500";
		}
		$("#silde").css("height",H+"px");
	} 
catch (ex){} 
} 
window.setInterval(iframeAuto, 100); 
</script>

<style>
#slide a{
	color: white;
}
#slide a:hover{
	color: #4B4B4B;
}
#slide .dropdown-menu a{
	color: black;
}
/* body {
	font-family: 微软雅黑;
} */
.red{
	color: red !important;
}
.green{
	color: green !important;
}
.yellow{
	color: #A5B41D !important;
}
</style>
</head>
<body>
<div class="container-fluid">
<div class="row" >
    
    	<div class="col-md-2 col-sm-3 col-xs-4 text-right" id="silde" style="background-color: #4B4B4B;font-weight: bold;min-height: 650px;color: white;font-size: 15px;">
	    	<div class="page-header">
			  <h3>
			  <strong>ERP系统</strong>
			  <br>
			  <small style="color: white;">您好, 
			  <a href="<?php echo U('Account/edit',array('admin_id'=>$_SESSION['admin_id']));?>" title="编辑资料"><?php echo (session('admin_realname')); ?></a>
			  </small>
			  </h3>
			  <br>
		      <a href="<?php echo U('Account/editpwd',array('admin_id'=>$_SESSION['admin_id']));?>" class="btn btn-primary" title="修改密码">修改密码</a>
		      <a href="<?php echo U('Login/logout');?>" class="btn btn-primary" title="退出系统">退出系统</a>
			</div>
	    	<ul class="nav nav-pills nav-stacked " id="slide">
			  <li role="presentation" <?php if($currentname == 'Home'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Home/index');?>">首页</a></li>
			  <li role="presentation" <?php if($currentname == 'Member'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Member/index');?>">会员管理</a></li>
			  <li role="presentation" <?php if($currentname == 'Category'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('Category/index');?>">分类管理</a></li>
			  <li role="presentation" <?php if($currentname == 'Goods'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Goods/index');?>">商品管理</a></li>
			  <li role="presentation" <?php if($currentname == 'Purchase'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Purchase/index');?>">采购管理</a></li>
			  <li role="presentation" <?php if($currentname == 'Sales'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Sales/index');?>">订单管理</a></li>
			  <!-- <li role="presentation" class="dropdown">
			    <a class="dropdown-toggle" id="dLabel" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
			    <span class="caret"></span>
			      	订单管理 
			    </a>
			    <ul class="dropdown-menu text-right" role="menu" aria-labelledby="dLabel" style="width:100%">
			    	<li role="presentation" class="text-right"><a href="<?php echo U('Sales/index');?>">销售列表</a></li>
			    	<li role="presentation" class="text-right"><a href="<?php echo U('Sales/out');?>">商品出库</a></li>
			    	<li role="presentation" class="text-right"><a href="<?php echo U('Sales/return');?>">商品退货</a></li>
			    </ul>
			  </li> -->
			  <li role="presentation" <?php if($currentname == 'Statistics'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Statistics/index');?>">统计管理</a></li>
			  <?php if($_SESSION['admin_gid'] == 1): ?><li role="presentation" <?php if($currentname == 'Account'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Account/index');?>">管理员管理</a></li><?php endif; ?>
			</ul>
    	
    	
        </div>
        <div class="col-md-10 col-sm-9 col-xs-8">
         






<!-- <div id="sidebar">
  <div id="sidebar-wrapper">
    <h1 id="sidebar-title"><a href="./"><?php echo ($head_title); ?></a></h1>
    <a href="./"><img id="logo" src="/merp/Public/assets/simpla/images/logo.png" alt="<?php echo ($head_title); ?>" /></a> 
    Sidebar Profile links
    <div id="profile-links"> 您好, <a href="#" title="编辑资料"><?php echo (session('admin_name')); ?></a><br />
      <br />
      <a href="<?php echo U('Home/index');?>" title="管理首页">管理首页</a> | <a href="<?php echo U('Login/logout');?>" title="退出系统">退出系统</a> </div>
    <ul id="main-nav">
      <li> <a href="javascript:;" class="nav-top-item {/if $inpath[1] eq "category"/}current">分类管理</a>
        <ul>
            <li><a href="<?php echo U('Category/index');?>" class="{/if $inpath[2] eq $k/}current">分类管理</a></li>
            <li><a href="<?php echo U('Category/add');?>" class="{/if $inpath[2] eq $k/}current">添加分类</a></li>
        </ul>
      </li>
      <li> <a href="javascript:;" class="nav-top-item {/if $inpath[1] eq "goods"/}current">商品管理</a>
        <ul>
            <li><a href="<?php echo U('Goods/index');?>" class="{/if $inpath[2] eq $k/}current">商品管理</a></li>
            <li><a href="<?php echo U('Goods/add');?>" class="{/if $inpath[2] eq $k/}current">添加商品</a></li>
        </ul>
      </li>
      <li> <a href="javascript:;" class="nav-top-item {/if $inpath[1] eq "purchase"/}current">采购管理</a>
        <ul>
            <li><a href="<?php echo U('Purchase/index');?>" class="{/if $inpath[2] eq $k/}current">库存管理</a></li>
            <li><a href="<?php echo U('Purchase/add');?>" class="{/if $inpath[2] eq $k/}current">添加库存</a></li>
        </ul>
      </li>
      <li> <a href="javascript:;" class="nav-top-item {/if $inpath[1] eq "sales"/}current">订单管理</a>
        <ul>
        	<li><a href="<?php echo U('Sales/index');?>" class="{/if $inpath[2] eq $k/}current">销售列表</a></li>
            <li><a href="<?php echo U('Sales/out');?>" class="{/if $inpath[2] eq $k/}current">商品出库</a></li>
            <li><a href="<?php echo U('Sales/return');?>" class="{/if $inpath[2] eq $k/}current">商品退货</a></li>
        </ul>
      </li>
      <li> <a href="javascript:;" class="nav-top-item {/if $inpath[1] eq "statistics"/}current">统计管理</a>
        <ul>
            <li><a href="<?php echo U('statistics/sales');?>" class="{/if $inpath[2] eq $k/}current">销售统计</a></li>
        </ul>
      </li>
      <li> <a href="javascript:;" class="nav-top-item {/if $inpath[1] eq "account"/}current">帐号管理</a>
        <ul>
        	<li><a href="<?php echo U('Account/index');?>" class="{/if $inpath[2] eq $k/}current">帐号管理</a></li>
            <li><a href="<?php echo U('Account/add');?>" class="{/if $inpath[2] eq $k/}current">添加账号</a></li>
            <li><a href="<?php echo U('Account/resetpwd');?>" class="{/if $inpath[2] eq $k/}current">密码修改</a></li>
        </ul>
      </li>
      <li> <a href="javascript:;" class="nav-top-item {/if $inpath[1] eq "member"/}current">会员管理</a>
        <ul>
        	<li><a href="<?php echo U('Member/index');?>" class="{/if $inpath[2] eq $k/}current">帐号管理</a></li>
            <li><a href="<?php echo U('Member/add');?>" class="{/if $inpath[2] eq $k/}current">添加账号</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div> -->

<div class="container" id="container" style="width: 100%;">
<form action="<?php echo U('Sales/saverefund');?>" name="form" method="post">
<input type="hidden" name="order_id" value="<?php echo ($Order['order_id']); ?>">
	<div class="row">
		<div class="bs-callout bs-callout-info" id="callout-tables-responsive-overflow">
		<h3>订单管理</h3>
	    <p>查看和管理商品订单 </p>
	    <p>退货 </p>
	  	</div>
	</div>
	<div class="row">
	 	<div class="col-xs-6">
		</div>
		<div class="col-xs-6" style="text-align: right">
			<input type="submit" class="btn btn-primary" value="提交">
			<a href="<?php echo U('Sales/index',array('pid'=>0));?>" class="btn btn-default"  >返回</a>
		</div>
	</div>
	<p></p>
	<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">基本信息
              <!-- <span class="badge">1</span> -->
              </h4>
            </div>
            <div class="panel-body">
            	<div class="controls">  
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						   <font class="red"> * </font>订单号：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control" name="order_no" id="order_no" type="text" value="<?php echo ($Order['order_no']); ?>" disabled="disabled">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						 客户信息：
					    </label>
					    <div class="col-sm-9">
					   	 	<select name="mid" class="form-control" disabled="disabled">
						   	 <?php if(is_array($Member)): $k = 0; $__LIST__ = $Member;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($k % 2 );++$k;?><option value="<?php echo ($list["mid"]); ?>" <?php if($list['mid'] == $Order['mid']): ?>selected="selected"<?php endif; ?>><?php echo ($list["realname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					    	</select>
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						   下单时间：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control" name="order_time" id="order_time" type="text" value="<?php echo (date('Y-m-d',$Order['order_time'])); ?>"  disabled="disabled" placeholder="下单时间">
					    </div>
					 </div>
 					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						   订单类型：
					    </label>
					    <div class="col-sm-9">
					    	<select name="order_type" class="form-control" disabled="disabled">
					    		<option value="1" <?php if($Order['order_type'] == 1): ?>selected="selected"<?php endif; ?>>零售</option>
								<option value="2" <?php if($Order['order_type'] == 2): ?>selected="selected"<?php endif; ?>>代理</option>
					    	</select>
					    </div>
					 </div>
 					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						   订单状态：
					    </label>
					    <div class="col-sm-9">
					    	<select name="order_status" class="form-control">
								<option value="4">退货中</option>
								<option value="5">已退货</option>
					    	</select>
					    </div>
					 </div>
				</div>
            </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">销售订单明细
              <!-- <span class="badge">1</span> -->
              </h4>
            </div>
            <div class="panel-body">
            	<div class="controls">  
					    <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						 出货数量：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control" name="num_total" id="num_total" type="text" value="<?php echo ($Order['num_total']); ?>" placeholder="出货数量" readonly="readonly">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						 退货数量：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control" name="num_refund" id="num_refund" type="text" value="<?php echo ($Order['num_refund']); ?>" placeholder="退货数量" readonly="readonly">
					    </div>
					 </div>
					 
					<input name="goods_ids" id="goods_ids" type="hidden" value="<?php echo ($goods_ids); ?>">
					 
					<div class="form-group col-sm-12">
					<div class="table-responsive">
		             	<table id="myTable" class="table table-striped table-hover">
		                <thead>
		                  	<tr>
			                <th>商品条形码/代码</th>
			                <th>商品名称</th>
			                <th>所属分类</th>
			                <th>售价(元)</th>
			                <th>市场价(元)</th>
			                <th>当前库存</th>
			                <th>库存总额(元)</th>
			                <th>数量</th>
			                <th>实际售价</th>
			                <th>退货数量</th>
		              		</tr>
		                </thead>
		                <?php if(is_array($OrderGoods)): $k = 0; $__LIST__ = $OrderGoods;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$list): $mod = ($k % 2 );++$k;?><tr id="tr<?php echo ($list['goods_id']); ?>">
								<td><?php echo ($list["goods_sn"]); ?>
								<input id="num<?php echo ($list['goods_id']); ?>" type="hidden" value="<?php echo ($list['num']); ?>">
								<input class="price" id="price<?php echo ($list['goods_id']); ?>" name="outPrice<?php echo ($list['goods_id']); ?>" type="hidden" value="<?php echo ($list['price']); ?>">
								<input name="deliveredNum<?php echo ($list['goods_id']); ?>" type="hidden" value="<?php echo ($list['num']); ?>">
								</td>
								<td><?php echo ($list["goods_name"]); ?></td>
								<td><?php echo ($list["cat_name"]); ?></td>
								<td><?php echo ($list["out_price"]); ?></td>
								<td><?php echo ($list["market_price"]); ?></td>
								<td>
									<?php if($list['stock'] > $list['warn_stock']): echo ($list['stock']); else: ?><code><?php echo ($list['stock']); ?>(缺)</code><?php endif; ?>
								</td>
								<td><?php echo ($list['in_price'] * $list['stock']); ?></td>
								<td><?php echo ($list['num']); ?></td>
								<td><?php echo ($list['price']); ?></td>
								<td>
									<input class="form-control refundNum" name="num_refund<?php echo ($list['goods_id']); ?>" id="num_refund<?php echo ($list['goods_id']); ?>" onchange="changeRefundNum(this,<?php echo ($list['goods_id']); ?>)" type="text" value='<?php if($list['num_refund'] > 0): echo ($list['num_refund']); else: ?>0<?php endif; ?>' placeholder="退货数量" style="width: 60px;">
								</td>
							</tr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
		              	</table>
	              </div>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
        function changeRefundNum(obj,goodsId){
        	var value = parseInt(obj.value);
        	var id = obj.id;
			var numId = "num"+goodsId;
			var numValue = $("#"+numId).val();
			if(value>parseInt(numValue)){
				alert("退货数量不能超过出货数量！");
				$(obj).val(numValue);
			}
			changeTotalNum();
        }
        function changeTotalNum(){
			var stockTotal = 0;
			$(".refundNum").each(function(i){ 
				if($(this).val()!=""){
					stockTotal = stockTotal + parseFloat($(this).val());
				}
			});
			$("#num_refund").val(stockTotal);
			changePrice();
		}
      //更改amount_refund的值
		function changePrice(){
			var outPriceTotal = 0;
			$(".price").each(function(i){ 
				if($(this).val()!=""){
					var id = $(this).attr("id");
					var goodsId = id.replace("price","");
					var numId = "num_refund"+goodsId;
					var numValue = $("#"+numId).val();
					outPriceTotal = outPriceTotal + parseFloat($(this).val()*parseInt(numValue));
				}
			});
			$("#amount_refund").val(outPriceTotal.toFixed(2));
		}
        </script>
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">金额信息
              <a href="#" onclick="resetLogistics('amount');return false;" style="float: right" >清空</a>
              </h4>
            </div>
            <div class="panel-body">
            	<div class="controls">  
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						   付款状态：
					    </label>
					    <div class="col-sm-9">
					    	<select name="pay_status" class="form-control">
								<option value="4" >部分退款</option>
								<option value="5" >完全退款</option>
					    	</select>
					    </div>
					 </div>
 					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						   支付方式：
					    </label>
					    <div class="col-sm-9">
					    	<select name="pay_type" class="form-control" disabled="disabled">
								<option value="1" <?php if($Order['pay_type'] == 1): ?>selected="selected"<?php endif; ?>>银行转账</option>
								<option value="2" <?php if($Order['pay_type'] == 2): ?>selected="selected"<?php endif; ?>>支付宝</option>
								<option value="3" <?php if($Order['pay_type'] == 3): ?>selected="selected"<?php endif; ?>>微信支付</option>
								<option value="4" <?php if($Order['pay_type'] == 4): ?>selected="selected"<?php endif; ?>>理财通支付</option>
								<option value="5" <?php if($Order['pay_type'] == 5): ?>selected="selected"<?php endif; ?>>其他</option>
					    	</select>
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						运费金额：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control amount" name="amount_freight" id="amount_freight" type="text" disabled="disabled" value="<?php echo ($Order['amount_freight']); ?>" placeholder="运费金额">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						商品金额：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control amount" name="amount_total" id="amount_total" type="text" disabled="disabled" value="<?php echo ($Order['amount_total']); ?>" placeholder="商品金额">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						已支付额：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control amount" name="amount_payed" id="amount_payed" type="text" disabled="disabled" value="<?php echo ($Order['amount_payed']); ?>" placeholder="已支付额">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						已退款额：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control amount" name="amount_refund" id="amount_refund" type="text" value="<?php echo ($Order['amount_refund']); ?>" placeholder="已退款额">
					    </div>
					 </div>
				</div>
            </div>
          </div>
          <script type="text/javascript">
          
          function resetLogistics(className){
        	  $("."+className).val("");
          }
          
          </script>
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">物流信息
              <a href="#" onclick="resetLogistics('logistics');return false;" style="float: right" >清空</a>
              </h4>
            </div>
            <div class="panel-body">
            	<div class="controls">  
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						物流单号：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control logistics" name="logistics_no" id="logistics_no" type="text" disabled="disabled" value="<?php echo ($Order['logistics_no']); ?>" placeholder="物流单号">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						物流公司：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control logistics" name="logistics_company" id="logistics_company" type="text" disabled="disabled" value="<?php echo ($Order['logistics_company']); ?>" placeholder="物流公司">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						邮编：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control logistics" name="zipcode" id="zipcode" type="text" disabled="disabled" value="<?php echo ($Order['zipcode']); ?>" placeholder="邮编">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						收货人：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control logistics" name="consignee" id="consignee" type="text" disabled="disabled" value="<?php echo ($Order['consignee']); ?>" placeholder="收货人">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						收货电话：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control logistics" name="consignee_phone" id="consignee_phone" disabled="disabled" type="text" value="<?php echo ($Order['consignee_phone']); ?>" placeholder="收货电话">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						收货地址：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control logistics" name="delivery_address" id="delivery_address" type="text" disabled="disabled" value="<?php echo ($Order['delivery_address']); ?>" placeholder="收货地址">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						物品重量：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control logistics" name="weight" id="weight" type="text" disabled="disabled" value="<?php echo ($Order['weight']); ?>" placeholder="物品重量">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						 已发货数量：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control logistics" name="num_delivered" id="num_delivered" disabled="disabled" type="text" value="<?php echo ($Order['num_delivered']); ?>" placeholder="已发货数量">
					    </div>
					 </div>
				</div>
            </div>
          </div>
      </div>
</form>
</div>
</div><!-- left.html class="col-md-10" 结束 -->
</div><!-- header.html class="row" 结束-->
</div><!-- header.html class="container-fluid" 结束-->
<nav class="navbar navbar-default " style="margin-bottom: 0px;"><!-- navbar-fixed-bottom -->
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Jason Moke</a>
    </div>
    <p class="navbar-text">Copyright 2014-2015  Gao Guangchao,   version V0.1</p>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="全文检索">
        </div>
        <button type="submit" class="btn btn-default">查询</button>
      </form>
      <ul class="nav navbar-nav navbar-right" >
        <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">系统说明<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" style="bottom: 100%;top: auto;">
            <li><a href="<?php echo U('Helper/instruction');?>">系统说明</a></li>
            <li><a href="<?php echo U('Helper/index');?>">使用说明</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">购买授权<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" style="bottom: 100%;top: auto;">
            <li><a href="<?php echo U('Helper/aboutus');?>">版权声明</a></li>
            <li><a href="<?php echo U('Helper/buy');?>">购买授权</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">关于我们 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" style="bottom: 100%;top: auto;">
            <li><a href="<?php echo U('Helper/link');?>">联系我们</a></li>
            <li><a href="<?php echo U('Helper/feedback');?>">意见反馈</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</body>
</html>