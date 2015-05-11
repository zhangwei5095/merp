<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
</head>
<body>
<br>
<br>
<br>
<br>
<div class="container">
	<div class="jumbotron">
		<div class="row text-center">
			<?php if(isset($message)) {?>
				<h1><span class="label label-success">Success</span>   <small><?php echo($message); ?></small>    </h1>
			<?php }else{?>
				<h1><span class="label label-danger">Error</span>    <small><?php echo($error); ?></small>        </h1>
			<?php }?>
			<br>
			<br>
			<br>
			<br>
			<p class="jump">
			页面自动 <a id="href" class="btn btn-primary btn-lg" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
			</p>
		</div>
	</div>
</div>




<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>


</body>
</html>