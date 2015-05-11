<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>进销存管理系统</title>
<!-- <link rel="stylesheet" href="/moke/Public/assets/simpla/css/reset.css" type="text/css" />
<link rel="stylesheet" href="/moke/Public/assets/simpla/css/style.css" type="text/css" />
<link rel="stylesheet" href="/moke/Public/assets/simpla/css/invalid.css" type="text/css" /> -->
<script type="text/javascript" src="/moke/Public/assets/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="/moke/Public/assets/WdatePicker/WdatePicker.js"></script>
<link rel="stylesheet" href="/moke/Public/bootstrap/bootstrap.min.css" type="text/css" media="screen" />
<!-- 扁平化的主题需要注释掉以下代码 -->
<!-- <link rel="stylesheet" href="/moke/Public/bootstrap/bootstrap-theme.min.css" type="text/css" media="screen" />
 --> 
 <link rel="stylesheet" href="/moke/Public/bootstrap/docs.min.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/moke/Public/bootstrap/font-awesome/css/font-awesome.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/moke/Public/css/page.css" type="text/css" media="screen" />
<!-- <script type="text/javascript" src="/moke/Public/assets/js/holder.js" ></script> -->
<script type="text/javascript" src="/moke/Public/assets/js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="/moke/Public/bootstrap/bootstrap.js" ></script>
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
<div class="row">
    
    	<div class="col-md-2 col-sm-3 col-xs-4 text-right" id="silde" style="background-color: #4B4B4B;font-weight: bold;min-height: 650px;color: white;font-size: 15px;">
	    	<div class="page-header">
			  <h3>
			  <strong>进销存管理系统</strong>
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
    <a href="./"><img id="logo" src="/moke/Public/assets/simpla/images/logo.png" alt="<?php echo ($head_title); ?>" /></a> 
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

<script>
function validate(){
	var supplier = $("#supplier").val();
	var in_num = $("#in_num").val();
	var in_price = $("#in_price").val();
	var purchase = $("#purchase").val();

	if(supplier ==''){
		alert("供应商不允许为空！");
		return false;
	}
	if(in_num ==''){
		alert("入库数量（采购数量）不允许为空！");
		return false;
	}
	if(in_price ==''){
		alert("商品单价不允许为空！");
		return false;
	}
	if(purchase ==''){
		alert("采购时间不允许为空！");
		return false;
	}
	

	document.form.submit();
}
function getPayment(obj){
	var in_num = $("#in_num").val();//进货数
	var in_price = $("#in_price").val();//进货价
	var express = $("#express").val();//邮费
	var payment = $("#payment").val();//付款
	if(in_num!=null){
		if(in_price!=null){
			payment = parseFloat(in_price) * parseInt(in_num);
			if(express!=null){
				payment = payment + parseFloat(express);
			}
		}else{
			payment = 0;
		}
	}else{
		payment = 0;
	}
	payment = payment + "";
	if(payment.indexOf(".")>0){
	    payment = payment.substring(0,payment.indexOf(".") + 3);
	}
	$("#payment").val(payment);
}

</script>
<div class="container" id="container" style="width: 100%;">
<form action="<?php echo U('Purchase/save');?>" name="form" method="post">
	<div class="row">
		<div class="bs-callout bs-callout-info" id="callout-tables-responsive-overflow">
		<h3>采购管理</h3>
	    <p>查看和管理商品采购</p>
	  	</div>
	</div>
	<div class="row">
	 	<div class="col-xs-6">
		</div>
		<div class="col-xs-6" style="text-align: right">
			<input type="button" class="btn btn-primary" onclick="validate()" value="提交">
			<a href="<?php echo U('Purchase/index',array('pid'=>0));?>" class="btn btn-default"  >返回</a>
		</div>
	</div>
	<p></p>
	<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">商品入库
              <!-- <span class="badge">1</span> -->
              </h4>
            </div>
            <div class="panel-body">
            	<div class="controls">  
					 <div class="form-group col-sm-12">
					    <label class="col-sm-3 control-label text-right">
						 商品名称：
					    </label>
					    <div class="col-sm-9">
					   	 <input class="form-control" name="goods_name" id="goods_name" type="text" value="<?php echo ($Purchase['goods_name']); ?>" readonly="readonly">
					     <input type="hidden" name="goods_id" value="<?php echo ($Purchase['goods_id']); ?>">
					     <input type="hidden" name="cat_id" value="<?php echo ($Purchase['cat_id']); ?>">
					     <input type="hidden" name="ac" value="<?php echo ($ac); ?>">
					    </div>
					 </div>
					 <div class="form-group col-sm-12">
					    <label class="col-sm-3 control-label text-right">
						   <font class="red"> * </font>商品条形码/代码：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control" name="goods_sn" id="goods_sn" type="text" value="<?php echo ($Purchase['goods_sn']); ?>" readonly="readonly">
					    </div>
					 </div>
					 <div class="form-group col-sm-12">
					    <label class="col-sm-3 control-label text-right">
						   <font class="red"> * </font>供应商：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control" name="supplier" id="supplier" type="text" value="<?php echo ($Purchase['supplier']); ?>" placeholder="供应商">
					    </div>
					 </div>
					 <div class="form-group col-sm-12">
					    <label class="col-sm-3 control-label text-right">
						   <font class="red"> * </font>入库数量（采购数量）：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control" name="in_num" id="in_num" type="text" value="<?php echo ($Purchase['in_num']); ?>" placeholder="入库数量" onchange="getPayment(this)">
					    	<input type="hidden" name="in_num_old" value="<?php echo ($Purchase['in_num']); ?>">
					    	<input type="hidden" name="id" value="<?php echo ($Purchase['id']); ?>">
					    </div>
					 </div>
 					 <div class="form-group col-sm-12">
					    <label class="col-sm-3 control-label text-right">
						   <font class="red"> * </font>进价：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control" name="in_price" id="in_price" type="text" value="<?php echo ($Purchase['in_price']); ?>" onchange="getPayment(this)">
					    </div>
					 </div>
					 <div class="form-group col-sm-12">
					    <label class="col-sm-3 control-label text-right">
						   快递费：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control" name="express" id="express" type="text" value="<?php echo ($Purchase['express']); ?>" placeholder="快递费" onchange="getPayment(this)">
					    </div>
					 </div>
					 <div class="form-group col-sm-12">
					    <label class="col-sm-3 control-label text-right">
						  付款金额：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control" name="payment" id="payment" type="text" value="<?php echo ($Purchase['payment']); ?>" placeholder="付款金额">
					    </div>
					 </div>
					 <div class="form-group col-sm-12">
					    <label class="col-sm-3 control-label text-right">
						 订单状态：
					    </label>
					    <div class="col-sm-9">
					    	<select name="order_status" class="form-control">
					    		<option value="0" <?php if($Order['order_status'] == 0): ?>selected="selected"<?php endif; ?>>已确认</option>
								<option value="1" <?php if($Order['order_status'] == 1): ?>selected="selected"<?php endif; ?>>已付款</option>
								<option value="2" <?php if($Order['order_status'] == 2): ?>selected="selected"<?php endif; ?>>已发货</option>
								<option value="3" <?php if($Order['order_status'] == 3): ?>selected="selected"<?php endif; ?>>已完成</option>
								<option value="4" <?php if($Order['order_status'] == 4): ?>selected="selected"<?php endif; ?>>退货中</option>
								<option value="5" <?php if($Order['order_status'] == 5): ?>selected="selected"<?php endif; ?>>已退货</option>
					    	</select>
					    </div>
					 </div>
					 <div class="form-group col-sm-12">
					    <label class="col-sm-3 control-label text-right">
						   <font class="red"> * </font>采购时间：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control" name="purchase" id="purchase" type="text" value="<?php echo ($Purchase['purchase']); ?>" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" placeholder="入库时间">
					    </div>
					 </div>
					 <div class="form-group col-sm-12">
					    <label class="col-sm-3 control-label text-right">
						   入库时间（收货时间）：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control" name="dateymd" id="dateymd" type="text" value="<?php echo ($Purchase['dateymd']); ?>" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" placeholder="入库时间">
					    </div>
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
    <p class="navbar-text">Copyright 2014-2015 Jason,   version V0.1</p>
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">关于我们 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" style="bottom: 100%;top: auto;">
            <li><a href="<?php echo U('Helper/index');?>">使用说明</a></li>
            <li><a href="#">关于我们</a></li>
            <li><a href="<?php echo U('Helper/link');?>">联系我们</a></li>
            <li><a href="#">购买授权</a></li>
            <li><a href="#">功能定制</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo U('Helper/feedback');?>">意见反馈</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</body>
</html>