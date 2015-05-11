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

<script>

function changeMember(){
	var mid = $("#mid").val();
	var mobile = $("#mobile"+mid).val();
	var realname = $("#realname"+mid).val();
	var address = $("#address"+mid).val();
	var zipcode = $("#zipcode"+mid).val();
	
	$("#zipcode").val(zipcode);
	$("#consignee").val(realname);
	$("#consignee_phone").val(mobile);
	$("#delivery_address").val(address);
}
function validate(){
	var order_no = $("#order_no").val();

	if(order_no ==''){
		alert("订单号不允许为空！");
		return false;
	}
	document.form.submit();
}
</script>
<div class="container" id="container" style="width: 100%;">
<form action="<?php echo U('Sales/save');?>" name="form" method="post">
	<div class="row">
		<div class="bs-callout bs-callout-info" id="callout-tables-responsive-overflow">
		<h3>订单管理</h3>
	    <p>查看和管理商品订单 </p>
	  	</div>
	</div>
	<div class="row">
	 	<div class="col-xs-6">
		</div>
		<div class="col-xs-6" style="text-align: right">
			<input type="button" class="btn btn-primary" onclick="validate()" value="提交">
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
					    	<input class="form-control" name="order_no" id="order_no" type="text" value="<?php echo (NOW_TIME); ?>" >
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						 客户信息：
					    </label>
					    <div class="col-sm-9">
					   	 	<select name="mid" id="mid" class="form-control" onchange="changeMember()">
						   	 <?php if(is_array($Member)): $k = 0; $__LIST__ = $Member;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($k % 2 );++$k;?><option value="<?php echo ($list["mid"]); ?>"><?php echo ($list["realname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					    	</select>
						   	 <?php if(is_array($Member)): $k = 0; $__LIST__ = $Member;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($k % 2 );++$k;?><input type="hidden" id="mid<?php echo ($list['mid']); ?>" value="<?php echo ($list['mid']); ?>">
					    		<input type="hidden" id="realname<?php echo ($list['mid']); ?>" value="<?php echo ($list['realname']); ?>">
					    		<input type="hidden" id="mobile<?php echo ($list['mid']); ?>" value="<?php echo ($list['mobile']); ?>">
					    		<input type="hidden" id="address<?php echo ($list['mid']); ?>" value="<?php echo ($list['prov_name']); echo ($list['city_name']); echo ($list['district_name']); echo ($list['address']); ?>">
					    		<input type="hidden" id="zipcode<?php echo ($list['mid']); ?>" value="<?php echo ($list['zipcode']); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						   下单时间：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control" name="order_time" id="order_time" type="text" value="<?php echo (date('Y-m-d',NOW_TIME)); ?>" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" placeholder="下单时间">
					    </div>
					 </div>
 					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						   订单类型：
					    </label>
					    <div class="col-sm-9">
					    	<select name="order_type" class="form-control">
					    		<option value="1">零售</option>
								<option value="2">代理</option>
					    	</select>
					    </div>
					 </div>
 					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						   订单状态：
					    </label>
					    <div class="col-sm-9">
					    	<select name="order_status" class="form-control">
					    		<option value="0">已确认</option>
								<option value="1">已付款</option>
								<option value="2">已发货</option>
								<option value="3">已完成</option>
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
					    	<input class="form-control" name="num_total" id="num_total" type="text" value="0" placeholder="出货数量" readonly="readonly">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						 退货数量：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control" name="num_refund" id="num_refund" type="text" value="0" placeholder="退货数量">
					    </div>
					 </div>
					 
					<input name="goods_ids" id="goods_ids" type="hidden" value="">
					<input name="amount_in_price" id="amount_in_price" type="hidden" value="">
					 <div class="form-group col-sm-12">
						<div class="alert alert-info alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>说明</strong>：商品明细信息提交后<strong>无法修改</strong>
						</div>
					<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">选择商品</a>
					</div>
					
					<div class="form-group col-sm-12">
					<div class="table-responsive">
		             	<table id="myTable" class="table table-striped table-hover">
		                <thead>
		                  	<tr>
			                <th>商品条形码/代码</th>
			                <th>商品名称</th>
			                <th>所属分类</th>
			                <th>进价(元)</th>
			                <th>售价(元)</th>
			                <th>市场价(元)</th>
			                <th>库存</th>
			                <th>库存总额(元)</th>
			                <th>数量</th>
			                <th>实际售价</th>
			                <th>操作</th>
		              		</tr>
		                </thead>
		              	</table>
		              </div>
		              </div>
					<script type="text/javascript">
					$(document).ready(function() {
						//全选/取消全选
						$("#chk_all").click(function(){
						$("input[name='chk_list']").prop("checked", this.checked);
						});
						 $("input[name='chk_list']").click(function() {
						    var $subs = $("input[name='chk_list']");
						    $("#chk_all").prop("checked" , $subs.length == $subs.filter(":checked").length ? true :false);
				  		});
			  		});
					//获取被选中的checkbox的值
					function getCheckedValue(){
						var chk_list = document.getElementsByName('chk_list');
						var chkString = "";
						for(var i=0;i<chk_list.length;i++){
							if(chk_list[i].checked){
								 chkString =chk_list[i].value+","+chkString;
							}
						}
						return chkString.substring(0,chkString.length-1);
					}
					function getCheckedGoods(){
						$("#goods_ids").val(getCheckedValue());
						var Checkeds = getCheckedValue().split(",");
						var Str = "";
						var stockTotal = 0;
						var outPriceTotal = 0;
						for(var i=0;i<Checkeds.length;i++){
							var trId = "tr"+Checkeds[i];
							var stockId = "stock"+Checkeds[i];
							var stock = $("#"+stockId).val();
							var out_priceId = "out_price"+Checkeds[i];
							var out_price = $("#"+out_priceId).val();
							var in_priceId = "in_price"+Checkeds[i];
							var in_price = $("#"+in_priceId).val();
							stockTotal = stockTotal + parseFloat(stock);
							outPriceTotal = outPriceTotal + parseFloat(out_price)*parseFloat(stock);
							var trHtml = $("#"+trId).html();
							//截取掉无用字段
							trHtml = trHtml.substring(trHtml.indexOf("</td>")+5);
							trHtml = trHtml.substring(0,trHtml.lastIndexOf("<td>"));
							trHtml = trHtml + '<td><input class="form-control deliveredNum" style="width:60px;" name="deliveredNum'+Checkeds[i]+'" id="deliveredNum'+Checkeds[i]+'" onchange="changeNum(this)" type="text" value="'+stock+'" placeholder="数量"></td>';
							trHtml = trHtml + '<td><input class="form-control outPrice" style="width:80px;" name="outPrice'+Checkeds[i]+'" id="outPrice'+Checkeds[i]+'" onchange="changePrice(this)" type="text" value="'+out_price+'" placeholder="数量"></td>';
							trHtml = trHtml + '<input class="inPrice"  name="inPrice'+Checkeds[i]+'" id="inPrice'+Checkeds[i]+'" type="hidden" value="'+in_price+'"></td>';
							trHtml = trHtml + "<td><a href=\"#\" onclick=\"delTr(this,'"+Checkeds[i]+"');return false;\" class=\"btn btn-sm btn-danger delBtn\"  >删除</a></td>";
							Str = Str + "<tr>" + trHtml + "</tr>";
						}
						$("#myTable").append(Str); 
						$("#num_total").val(stockTotal);
						$("#num_delivered").val(stockTotal);
						$("#amount_total").val(outPriceTotal.toFixed(2));
						changePrice()
						//changeTotalPrice();
						//隐藏模态框
						$('#myModal').modal('hide')
						//取消复选框
						$("input[name='chk_list']").each(function(i){ 
							$(this).prop("checked",false);
						});
						$("#chk_all").prop("checked",false);
					}
					
					function delTr(obj,goodsid){
						var goods_ids = $("#goods_ids").val();
						goods_ids = goods_ids.replace(goodsid,"");
						goods_ids = goods_ids.replace(",,",",");
						$(obj).parent().parent().remove(); 
						if(goods_ids==","){
							goods_ids = "";
							alert("至少选择一个商品！");
						}
						changeTotalNum();
						$("#goods_ids").val(goods_ids);
					}
					//校验数量不超过库存
					function changeNum(obj){
						var id = obj.id;
						var value = parseFloat(obj.value);
						var goodsId = id.replace("deliveredNum","");
						var stockId = "stock"+goodsId;
						var stockNum = $("#"+stockId).val();
						if(value>parseFloat(stockNum)){
							alert("商品数量不能超过库存数量！");
							$(obj).val(stockNum);
						}
						changeTotalNum();
					}
					
					function changeTotalNum(){
						var stockTotal = 0;
						$(".deliveredNum").each(function(i){ 
							if($(this).val()!=""){
								stockTotal = stockTotal + parseFloat($(this).val());
							}
						});
						$("#num_total").val(stockTotal);
						$("#num_delivered").val(stockTotal);
						changePrice();
					}
					//更改amount_total的值
					function changePrice(){
						var outPriceTotal = 0;
						$(".outPrice").each(function(i){ 
							if($(this).val()!=""){
								var id = $(this).attr("id");
								var goodsId = id.replace("outPrice","");
								var stockId = "deliveredNum"+goodsId;
								var stockNum = $("#"+stockId).val();
								outPriceTotal = outPriceTotal + parseFloat($(this).val()*parseInt(stockNum));
							}
						});
						$("#amount_total").val(outPriceTotal.toFixed(2));
						
						var inPriceTotal = 0;
						$(".inPrice").each(function(i){ 
							if($(this).val()!=""){
								var id = $(this).attr("id");
								var goodsId = id.replace("inPrice","");
								var stockId = "deliveredNum"+goodsId;
								var stockNum = $("#"+stockId).val();
								inPriceTotal = inPriceTotal + parseFloat($(this).val()*parseInt(stockNum));
							}
						});
						$("#amount_in_price").val(inPriceTotal.toFixed(2));
						changeTotalPrice();
					}
					//更改amount_payed的值
					function changeTotalPrice(){
						var amount_total = $("#amount_total").val();
						var amount_freight = $("#amount_freight").val();
						if(amount_freight!=null&&amount_freight!=''){
							amount_freight = parseFloat(amount_freight);
						}else{
							amount_freight = 0;
						}
						$("#amount_payed").val((amount_freight + parseFloat(amount_total)).toFixed(2));
					}
					</script>
					
					<!-- 模态框（Modal） -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					   <div class="modal-dialog" style="width: 70%;">
					      <div class="modal-content">
					         <div class="modal-header">
					            <a type="button" data-dismiss="modal" aria-hidden="true" href="#" style="float: right">×
					            </a>
					            <h4 class="modal-title" id="myModalLabel" >
					               	选择商品
					            </h4>
					         </div>
					         <div class="modal-body">
					         	<div class="alert alert-danger alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<strong>说明</strong>：库存为 <strong>0</strong> 的商品<strong>无法显示</strong>
								</div>
					           	<div class="table-responsive">
				             	<table class="table table-striped table-hover">
				                <thead>
				                  <tr>
					                <th>序号</th>
					                <th>商品条形码/代码</th>
					                <th>商品名称</th>
					                <th>所属分类</th>
					                <th>进价(元)</th>
					                <th>售价(元)</th>
					                <th>市场价(元)</th>
					                <th>库存</th>
					                <th>库存总额(元)</th>
					                <th><input type="checkbox" name="chk_all" id="chk_all" /></th>
				              </tr>
				                </thead>
				                <tbody>
					                <?php if(is_array($Goods)): $k = 0; $__LIST__ = $Goods;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$list): $mod = ($k % 2 );++$k;?><tr id="tr<?php echo ($list['goods_id']); ?>">
											<td><?php echo ($k); ?>
												<input id="stock<?php echo ($list['goods_id']); ?>" type="hidden" value="<?php echo ($list['stock']); ?>">
												<input id="out_price<?php echo ($list['goods_id']); ?>" type="hidden" value="<?php echo ($list['out_price']); ?>">
												<input id="in_price<?php echo ($list['goods_id']); ?>" type="hidden" value="<?php echo ($list['in_price']); ?>">
												</td>
											<td><?php echo ($list["goods_sn"]); ?></td>
											<td><?php echo ($list["goods_name"]); ?></td>
											<td><?php echo ($list["cat_name"]); ?></td>
											<td><?php echo ($list["in_price"]); ?></td>
											<td><?php echo ($list["out_price"]); ?></td>
											<td><?php echo ($list["market_price"]); ?></td>
											<td>
												<?php if($list['stock'] > $list['warn_stock']): echo ($list['stock']); else: ?><code><?php echo ($list['stock']); ?>(缺)</code><?php endif; ?>
											</td>
											<td><?php echo ($list['in_price'] * $list['stock']); ?></td>
											<td>
											<?php if($list['stock'] == 0): ?><input type="checkbox" name="chk_list0" id="chk_list0_<?php echo ($k); ?>" value="<?php echo ($list['goods_id']); ?>" disabled/>
											<?php else: ?>
												<input type="checkbox" name="chk_list" id="chk_list_<?php echo ($k); ?>" value="<?php echo ($list['goods_id']); ?>" /><?php endif; ?>
											</td>
										</tr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>	
				                </tbody>
				              </table>
				              </div>
					         </div>
					         <div class="modal-footer">
					            <button type="button" class="btn btn-default" 
					               data-dismiss="modal">关闭
					            </button>
					            <button type="button" class="btn btn-primary" onclick="getCheckedGoods()">
					              	 提交
					            </button>
					         </div>
					      </div><!-- /.modal-content -->
						</div><!-- /.modal -->
					 </div>
            </div>
          </div>
        </div>
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
								<option value="3">已付款</option>
								<option value="1">未付款</option>
								<option value="2">部分付款</option>
								<option value="4">部分退款</option>
								<option value="5">完全退款</option>
					    	</select>
					    </div>
					 </div>
 					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						   支付方式：
					    </label>
					    <div class="col-sm-9">
					    	<select name="pay_type" class="form-control">
								<option value="2">支付宝</option>
								<option value="1">银行转账</option>
								<option value="3">微信支付</option>
								<option value="4">理财通支付</option>
								<option value="5">其他</option>
					    	</select>
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						运费金额：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control amount" name="amount_freight" id="amount_freight" type="text" value=""  onchange="changeTotalPrice()" placeholder="卖家承担运费为-10；买家承担运费为0">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						商品金额：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control amount" name="amount_total" id="amount_total" type="text" value="0" onchange="changeTotalPrice()" placeholder="商品金额">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						已支付额：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control amount" name="amount_payed" id="amount_payed" type="text" value="10" placeholder="已支付额">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						已退款额：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control amount" name="amount_refund" id="amount_refund" type="text" value="0" placeholder="已退款额">
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
					    	<input class="form-control logistics" name="logistics_no" id="logistics_no" type="text" value="" placeholder="物流单号">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						物流公司：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control logistics" name="logistics_company" id="logistics_company" type="text" value="" placeholder="物流公司">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						邮编：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control logistics" name="zipcode" id="zipcode" type="text" value="<?php echo ($Member[0]['zipcode']); ?>" placeholder="邮编">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						收货人：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control logistics" name="consignee" id="consignee" type="text" value="<?php echo ($Member[0]['realname']); ?>" placeholder="收货人">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						收货电话：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control logistics" name="consignee_phone" id="consignee_phone" type="text" value="<?php echo ($Member[0]["mobile"]); ?>" placeholder="收货电话">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						收货地址：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control logistics" name="delivery_address" id="delivery_address" type="text" value="<?php echo ($Member[0]['prov_name']); echo ($Member[0]['city_name']); echo ($Member[0]['district_name']); echo ($Member[0]['address']); ?>" placeholder="收货地址">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						物品重量：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control logistics" name="weight" id="weight" type="text" value="" placeholder="物品重量（kg）">
					    </div>
					 </div>
					 <div class="form-group col-sm-6">
					    <label class="col-sm-3 control-label text-right">
						 已发货数量：
					    </label>
					    <div class="col-sm-9">
					    	<input class="form-control logistics" name="num_delivered" id="num_delivered" type="text" value="0" placeholder="已发货数量">
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