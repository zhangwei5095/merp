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
	<div class="row">
		<div class="bs-callout bs-callout-info" id="callout-tables-responsive-overflow">
		<h3>系统说明</h3>
	    <p>ERP系统是企业资源计划(Enterprise Resource Planning )的简称 </p>
	  	</div>
	</div>
	<div class="row">
        <div class="col-sm-12">
            	<div class="page-header">
				  <h3>系统简介</h3>
				</div>
            	<blockquote>
				<p>
				&nbsp;&nbsp;ERP系统是企业资源计划(Enterprise Resource Planning )的简称，是指建立在信息技术基础上，以系统化的管理思想，为企业决策层及员工提供决策运行手段的管理平台。它是从MRP（物料需求计划）发展而来的新一代集成化管理信息系统，它扩展了MRP的功能，其核心思想是供应链管理。它跳出了传统企业边界，从供应链范围去优化企业的资源。ERP系统集信息技术与先进管理思想于一身，成为现代企业的运行模式，反映时代对企业合理调配资源，最大化地创造社会财富的要求，成为企业在信息时代生存、发展的基石。它对于改善企业业务流程、提高企业核心竞争力具有显著作用。
				</p>
				</blockquote>
            	<div class="page-header">
				  <h3>主要特性</h3>
				</div>
            	<blockquote>
					<h3><strong>实用性</strong></h3>

					<p>ERP系统实际应用中更重要的是应该体现其“管理工具”的本质。　erp系统主要宗旨是对企业所拥有的人、财、物、信息、时间和空间等综合资源进行综合平衡和优化管理，erp软件协调企业各管理部门，erp系统围绕市场导向开展业务活动，提高企业的核心竞争力，erp软件从而取得最好的经济效益。所以，ERP系统首先是一个软件，同时是一个管理工具。erp软件是IT技术与管理思想的融合体，erp系统也就是先进的管理思想借助电脑，来达成企业的管理目标。
					</p>
					<h3><strong>整合性</strong></h3>
					
					<p>ERP最大特色便是整个企业信息系统的整合，比传统单一的系统更具功能性。</p>
					<h3><strong>弹性</strong></h3>
					
					<p>采用模块化的设计方式，使系统本身可因应企业需要新增模块来支持并整合，提升企业的应变能力。</p>
					<h3><strong>数据储存</strong></h3>
					
					<p>将原先分散企业各角落的数据整合起来，使数据得以一致性，并提升其精确性。</p>
					<h3><strong>便利性</strong></h3>
					
					<p>在整合的环境下，企业内部所产生的信息透过系统将可在企业任一地方取得与应用。</p>
					<h3><strong>管理绩效</strong></h3>
					
					<p>ERP系统将使部分间横向的联系有效且紧密，使得管理绩效提升。</p>
					<h3><strong>互动关系</strong></h3>
					
					<p>透过ERP系统配合选软件网在线试用以及供应4500万家中小企业了解管理模式，使企业与原物料供货商之间紧密结合，增加其市场变动的能力。而客户关系管理模式则使企业充分掌握市场需要取向的动脉，两者皆有助于促进企业与上下游的互动发展关系。
					</p>
					<h3><strong>实时性</strong></h3>
					
					<p>ERP是整个企业信息的整合管理，重在整体性，而整体性的关键就体现在“实时和动态管理”上，所谓“兵马未动，粮草先行”，强调的就是不同部门的“实时动态配合”，现实工作中的管理问题，也是部门协调与岗位配合的问题，因此缺乏“实时动态的管理手段和管理能力”的ERP管理，就是空谈。
					</p>
					<h3><strong>及时性</strong></h3>
					
					<p>ERP管理的关键是“现实工作信息化”，即把现实中的工作内容与工作方式，用信息化的手段来表现，因为人的精力和能力是有限的，现实事务达到一定的繁杂程度后，人就会在所难免的出错，将工作内容与工作方式信息化，就能形成ERP管理的信息化体系，才能拥有可靠的信息化管理工具。
					</p>
				</blockquote>
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