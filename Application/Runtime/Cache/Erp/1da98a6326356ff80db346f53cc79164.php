<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link rel="stylesheet" href="/merp/Public/bootstrap/bootstrap.css" type="text/css" media="screen" />
<script type="text/javascript" src="/merp/Public/assets/js/jquery.js" ></script>
<script type="text/javascript" src="/merp/Public/bootstrap/bootstrap.js" ></script>
<script type="text/javascript">
function validate(){
	var username = $("#username").val();
	var pwd = $("#pwd").val();
	
	if(username ==''){
		alert("用户名不允许为空！");
		return false;
	}
	if(pwd ==''){
		alert("密码不允许为空！");
		return false;
	}
	document.form.submit();
}

</script>
</head>

<body id="login" style="background: #4B4B4B">
<div class="container" role="main">
<br/>
<div class="row text-center" style="color: white;">
	<h1>ERP系统</h1>
</div>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<div class="row text-center" style="width:50%;margin: 0 auto;min-width: 550px;">
		<div class="panel panel-default">
		  <div class="panel-body">
				 <form action="<?php echo U( 'Login/checklogin');?>" name="form" method="post">
				    <div class="loginBox row-fluid">
				        <h2>登录</h2>
				     	<div class="form-group col-sm-12">
					    <label class="col-sm-3 control-label text-right">
						  用户名:
					    </label>
					    <div class="col-sm-9">
						  <input class="form-control" name="username" id="username" placeholder="用户名" value="" type="text">
					    </div>
						</div>
						<br>	
				     	<div class="form-group col-sm-12">
					    <label class="col-sm-3 control-label text-right">
						  密码:
					    </label>
					    <div class="col-sm-9">
					    <input class="form-control" name="pwd" id="pwd" placeholder="密码" type="password" >
					    </div>
						</div>	
						<div class="form-group col-sm-12">
							<div class="form-group col-sm-3">
							</div>
							<div class="form-group col-sm-7">
							<p></p>
							<p></p>
							<input type="button" onclick="validate()" class="btn btn-lg btn-primary btn-block" value="登录" />
							</div>	
							<div class="form-group col-sm-2">
							</div>
						</div>
					 </div> 
				 </form>
			 </div> 
		 </div> 
	</div>
	</div>
</body>
</html>