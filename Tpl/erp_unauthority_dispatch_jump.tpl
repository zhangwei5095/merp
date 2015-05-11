<?php
    if(C('LAYOUT_ON')) {
        echo '{__NOLAYOUT__}';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<include file="./Application/Erp/View/Common/assets.html"/>
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
