<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/dist/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/Register_registerForm.css"/>
<script src="__ROOT__/Public/js/jquery-2.0.2.js"></script>
<script type="text/javascript" src="__ROOT__/Public/dist/js/bootstrap.js"></script>
<script src="__ROOT__/Public/js/Register_registerForm.js"></script>
</head>
<body id="body1">
<div id="div1" class="container">
<form class="form-signin" method="post" action="__URL__/register">
	<h2 class="form-signin-heading">Register Form</h2>
	<input type="text" class="form-control" name="username" placeholder="Username" require autofocus>
	<input type="password" class="form-control" name="password" placeholder="Password" require>
	<input type="password" class="form-control" name="confirm" placeholder="Confirm" require>
	<input type="text" class="form-control" name="email" placeholder="Email">
	<div class="container form-control">
		<div class="row">
			<div class="col-lg-6">
			<input type="radio" name="gender" value="m" checked="checked"/>
			Male
			</div>
			<div class="col-lg-6">
			<input type="radio" name="gender" value="f" />
			Female
			</div>
		</div>
	</div>
	<div class="controls">
	<select name="area" class="form-control">
		<option value="East Campus">East Campus</option>
		<option value="South Campus">South Campus</option>
		<option value="North Campus">North Campus</option>
		<option value="Zhuhai Campus">Zhuhai Campus</option>
	</select>
	</div>
	<button class="btn btn-lg btn-success btn-block" type="submit" value="Register">Register</button>
	<button class="btn btn-lg btn-primary btn-block" id="login" type="button">Login</button>
</form>
</div>
</body>
</html>