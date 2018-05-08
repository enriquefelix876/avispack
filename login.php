<?php session_start(); ?>
<html>
	<head>
		<title>Iniciar Sesión</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <link rel="icon" type="image/png" href="img/icon.png" />
	</head>
	<style>
        body{
            background-image:url(img/dust_scratches.png);
				}
	</style>
	<body>

<!--Comienzo del header-->
<header style="background: rgba(0,0,0,0.9);">
    <a href="index.php"><img src="img/logo2.png" alt="app"></a>
</header>
<!--Cierre del header-->

<div class="container p-2">
<div class="row">
<div class="col-md-6">
		<h2>Login</h2>

		<form role="form" name="login" action="php/login.php" method="post">
		  <div class="form-group">
		    <label for="username">Nombre de usuario o email</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
		  </div>
		  <div class="form-group">
		    <label for="password">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
		  </div>

		  <button type="submit" class="btn btn-default">Acceder</button>
			
		</form>
</div>
</div>
</div>
		<script src="js/valida_login.js"></script>
	</body>
</html>