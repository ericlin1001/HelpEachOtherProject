<html>
<head>
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/dist/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/Login_loginForm.css"/>
<script type="text/javascript" src="__ROOT__/Public/js/jquery-2.0.2.js"></script>
<script type="text/javascript" src="__ROOT__/Public/dist/js/bootstrap.js"></script>
<script type="text/javascript" src="__ROOT__/Public/js/Login_loginForm.js"></script>
</head>
<body id="body1">
<div id="div1" class="container">
<form class="form-signin" method="post" action="__URL__/login">
	<h2 class="form-signin-heading">Login Form</h2>
	<input type="text" class="form-control" name="username" placeholder="Username" require autofocus>
	<input type="password" class="form-control" name="password" placeholder="Password" require>
	<button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
	<button class="btn btn-lg btn-primary btn-block" id="register" type="button">Register</button>
</form>
</div>
</body>
</html>
