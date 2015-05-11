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

<div class="container" style="width: 100%;">
	<br>
	<div class="row">
	<div class="page-header">
	  <h1>&nbsp;&nbsp;&nbsp;欢迎您 ! <small>&nbsp;<?php echo (session('admin_realname')); ?>[<?php echo (session('admin_name')); ?>]</small>
	  <a href="<?php echo U('Helper/aboutus');?>" class="btn btn-primary" style="float:right;margin-right: 28px;" >声明</a>
	  </h1>
	</div>
	</div>
	<br>
<div class="jumbotron">
	<div class="row">
		<div class="col-sm-12">
			<a href="<?php echo U('Home/index',array('refresh'=>1));?>" class="btn btn-default" style="float:right;margin-bottom: 10px;" title="默认首页统计数据为缓存中数据，点击刷新更新缓存">刷新</a>
		</div>
		<div class="col-sm-12">
			<div class="alert alert-info alert-dismissible" role="alert">
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				 <strong>商品总数：</strong><?php echo ($goodscount); ?>&nbsp;&nbsp;
				 <strong>已经销售的总金额：</strong><?php echo ($salesamount); ?>&nbsp;&nbsp;
				 <strong>库存总数：</strong><?php echo ($stock); ?>&nbsp;&nbsp;
				 <strong>库存商品总价：</strong><?php echo ($countamount); ?>&nbsp;&nbsp;
				 <strong style="float:right;">默认首页统计数据为缓存中数据，点击“刷新”更新缓存</strong>
				 
			</div>
		</div>
	
        <div class="col-sm-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">销售排行 
              <!-- <span class="badge">1</span> -->
              </h4>
            </div>
            <div class="panel-body">
             	<table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>商品名称</th>
                    <th>销量</th>
                    <th>销售额</th>
                  </tr>
                </thead>
                <tbody>
	                <?php if(is_array($salestop)): $i = 0; $__LIST__ = $salestop;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($list["goods_name"]); ?></td>
							<td><?php echo ($list["a"]); ?></td>
							<td><?php echo ($list["b"]); ?>元</td>
						</tr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>	
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.col-sm-6 -->
        <div class="col-sm-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">缺货的商品
               <!-- <span class="badge">2</span> -->
              </h4>
            </div>
            <div class="panel-body">
             	<table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>商品名称</th>
                    <th>库存</th>
                    <th>操作</th>
                  </tr>
                </thead>
                <tbody>
                 <?php if(is_array($goodsstock)): $i = 0; $__LIST__ = $goodsstock;if( count($__LIST__)==0 ) : echo "暂无缺货商品" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($list["goods_name"]); ?></td>
							<td><?php echo ($list["stock"]); ?></td>
							<td>
							<a href="<?php echo U('Purchase/add',array('goods_id'=>$list['goods_id']));?>" title="新增入库" >入库</a>
							</td>
						</tr><?php endforeach; endif; else: echo "暂无缺货商品" ;endif; ?>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>
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