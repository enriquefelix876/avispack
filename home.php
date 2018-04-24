<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
    print "<script>alert(\"Acceso invalido!\");window.location='index.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="img/icon.png" />
</head>
<body>

<!--Comienzo del header-->
<header style="background: rgba(0,0,0,0.9);">
    <a href="index.php"><img src="img/logo2.png" alt="app"></a>
</header>
<!--Cierre del header-->

<h1>Te has logueado Correctamente</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur molestias pariatur rem iste dolore labore, 
    culpa explicabo unde commodi assumenda numquam omnis soluta repellat ratione. Soluta suscipit autem error 
    dolorum.</p>

<!--Footer-->
<div style="clear: both;"></div>
    <?php include('includes/footer.php'); ?>
</div>
<!--Cierre del Footer-->

</section>
</body>
</html>