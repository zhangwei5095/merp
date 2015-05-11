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
<div class="row" >
    
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

<script language="javascript" type="text/javascript" src="/moke/Public/jqplot/jquery.jqplot.min.js"></script> 
<script language="javascript" type="text/javascript" src="/moke/Public/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script> 
<script language="javascript" type="text/javascript" src="/moke/Public/jqplot/plugins/jqplot.canvasAxisLabelRenderer.min.js"></script> 
<script language="javascript" type="text/javascript" src="/moke/Public/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script> 
<script language="javascript" type="text/javascript" src="/moke/Public/jqplot/plugins/jqplot.pointLabels.min.js"></script> 
<script language="javascript" type="text/javascript" src="/moke/Public/jqplot/plugins/jqplot.pieRenderer.min.js"></script> 
<script language="javascript" type="text/javascript" src="/moke/Public/jqplot/plugins/jqplot.donutRenderer.min.js"></script> 
<script language="javascript" type="text/javascript" src="/moke/Public/jqplot/plugins/jqplot.barRenderer.min.js"></script> 
<script language="javascript" type="text/javascript" src="/moke/Public/jqplot/plugins/jqplot.dateAxisRenderer.min.js"></script> 
<script language="javascript" type="text/javascript" src="/moke/Public/jqplot/plugins/jqplot.highlighter.min.js"></script> 
<link rel="stylesheet" type="text/css" href="/moke/Public/jqplot/jquery.jqplot.min.css" /> 
<script type="text/javascript">
$(function () {
	var line1=[<?php echo ($line); ?>];
	var act=<?php echo ($act); ?>;
	if(act==1){
		var formatstr = '%Y-%m-%#d';
	}else{
		var formatstr = '%Y-%#m';
		
	}
    $.jqplot('chart1', [line1], {
        title: "商品销售数量统计折线图", //图表标题
        axes: {
            xaxis:{
            	label: "商品",
            	show: true,    //是否自动显示坐标轴
            	renderer: $.jqplot.CategoryAxisRenderer,
            	showTicks: true,        // 是否显示刻度线以及坐标轴上的刻度值  
            	showTickMarks: true,    //设置是否显示刻度
            	tickOptions: {
            	    show: true,
            	    showLabel: true, //是否显示刻度线以及坐标轴上的刻度值
            	    showMark: false,//设置是否显示刻度
            	    showGridline: false // 是否在图表区域显示刻度值方向的网格
                }
              },
              yaxis:{
            	  label: "数量", 
            	  min :<?php echo ($min); ?>,
            	  max :<?php echo ($m); ?>,
            	  tickOptions:{formatString:'%#d'}
              }
        } ,
        highlighter: {
          show: true,
          sizeAdjust: 7.5
        },
        cursor: {
          show: false
        } ,
        series: [{
            lineWidth: 1, //指定折线的宽度
            markerOptions: { style: "dimaond" } //指定折线的样式
        }]
    });
    
    $.jqplot('chart2', [line1], {
        title: "商品销售数量统计柱状图", //图表标题
        seriesDefaults: {  
            renderer: $.jqplot.BarRenderer, // 利用渲染器（BarRenderer）渲染现有图表  
            pointLabels: { show: true },
            rendererOptions: {
            	barPadding: 8, //设置同一分类两个柱状条之间的距离(px)
            	barMargin: 10, //设置不同分类两个柱状条之间的距离(px)(同一个横坐标表点上)
            	barDirection: 'vertical', //设置柱状图显示的方向：垂直显示和水平显示，默认垂直显示 vertical or horizontal.
            	barWidth: 50, //设置柱状图中每个柱状条的宽度
            	}
        }, 
        axes: {
            xaxis:{
            	label: "商品",
            	show: true,    //是否自动显示坐标轴
            	renderer: $.jqplot.CategoryAxisRenderer,
            	showTicks: true,        // 是否显示刻度线以及坐标轴上的刻度值  
            	showTickMarks: true,    //设置是否显示刻度
            	tickOptions: {
            	    show: true,
            	    showLabel: true, //是否显示刻度线以及坐标轴上的刻度值
            	    showMark: false,//设置是否显示刻度
            	    showGridline: false // 是否在图表区域显示刻度值方向的网格
                }
              },
              yaxis:{
            	  label: "数量", 
            	  min :<?php echo ($min); ?>,
            	  max :<?php echo ($m); ?>,
            	  tickOptions:{formatString:'%#d'}
              }
        } ,
        highlighter: {
          show: true,
          sizeAdjust: 7.5
        },
        cursor: {
          show: true
        }
    });
});
	
function _submit(obj){
	//日统计 1  月统计2
	$("#act").val(obj);
	document.form.submit();
}

</script>
<form action="<?php echo U('Statistics/sales',array('op'=>$op));?>" name="form" method="post" >
<input type="hidden" name="act" id="act" value="<?php echo ($act); ?>">
<input type="hidden" name="op" id="op" value="<?php echo ($op); ?>">
<div class="container" id="container" style="width: 100%;">
	<div class="row">
		<div class="bs-callout bs-callout-info" id="callout-tables-responsive-overflow">
		<h3>统计报表</h3>
	    <p>统计销售、库存、财务等信息 </p>
	  	</div>
	</div>
	<div class="row">
	 	<div class="col-xs-6">
		</div>
		<div class="col-xs-6" style="text-align: right">
			<a href="<?php echo U('Statistics/index');?>" class="btn btn-default"  >返回</a>
		</div>
	</div>
	<p></p>
	<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">商品销售数量统计
              </h4>
            </div>
            <div class="panel-body">
	            <div class="panel panel-default">
					  <div class="panel-body">
					    <div class="form-group col-sm-6">
						    <label class="col-sm-3 control-label text-right">
							   起始时间：
						    </label>
						    <div class="col-sm-9">
						    	<input class="form-control" name="begintime" id="begintime" type="text" value="<?php echo ($begintime); ?>" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',maxDate:'#F<?php echo ($dp["$D('endtime')"]); ?>'})" placeholder="起始时间">
						    </div>
					 	</div>
					 	<div class="form-group col-sm-6">
						    <label class="col-sm-3 control-label text-right">
							   结束时间：
						    </label>
						    <div class="col-sm-9">
						    	<input class="form-control" name="endtime" id="endtime" type="text" <?php if($endtime == ''): ?>value="<?php echo (date('Y-m-d',NOW_TIME)); ?>"<?php else: ?>value="<?php echo ($endtime); ?>"<?php endif; ?> onclick="WdatePicker({dateFmt:'yyyy-MM-dd',maxDate:'%y-%M-%d'})" placeholder="结束时间">
						    </div>
					 	</div>
					 	<div class="form-group col-sm-12 text-center">
						 	<input type="button" class="btn btn-primary" onclick="_submit(1)" value="按日统计">
						 	&nbsp;
						 	<input type="button" class="btn btn-primary" onclick="_submit(2)" value="按月统计">
					 	</div>
					 	<div class="form-group col-sm-12">
		            		<ul id="myTab" class="nav nav-tabs">
							   <li class="active">
							      <a href="#statistics1" data-toggle="tab">数据列表</a>
							   </li>
							   <li>
							      <a href="#statistics3" data-toggle="tab">折线图</a>
							   </li>
							   <li><a href="#statistics2" data-toggle="tab">柱状图</a></li>
							</ul>
							<div id="myTabContent" class="tab-content">
							   <div class="tab-pane active" id="statistics1">
							   		<table class="table table-striped table-hover">
					                <thead>
					                  <tr>
					                  	<th>序号</th>
						                <th>日期</th>
						                <th>金额</th>
					              	 </tr>
					                </thead>
					                <tbody>
						                <?php if(is_array($OrderGoods)): $k = 0; $__LIST__ = $OrderGoods;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$list): $mod = ($k % 2 );++$k;?><tr>
												<td><?php echo ($k); ?></td>
												<td><?php echo ($list["month"]); ?></td>
												<td><?php echo ($list["total"]); ?></td>
											</tr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>	
					                </tbody>
					              </table>
							   </div>
							   <div class="tab-pane active" id="statistics3">
							   		<div id="chart1"style="width:100%;height:400px;" ></div>
							   </div>
							   <div class="tab-pane active" id="statistics2" >
							      	<div id="chart2"style="width:100%;height:400px;" ></div>
							   </div>
							</div>
					   </div>
					  </div>
				 </div>
            </div>
          </div>
        </div>
      </div>
</div>
</form>
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