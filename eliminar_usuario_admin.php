<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null || $_SESSION["user_rol"] != "Administrador"){
    print "<script>alert(\"Acceso invalido!\");window.location='index.php';</script>";
}
?>

<?php

include "php/conexion.php";
			
$sql= "select * from user where id = \"$_GET[id]\"";
$query = $con->query($sql);

while($datos=$query->fetch_array()){
    $id = $datos["id"];
    $nombreCompleto = $datos["fullname"];
    $nombreUsuario = $datos["username"];
    $email = $datos["email"];
    $rol = $datos["rol"];
    $numeroTelefono = $datos["phonenumber"];
    $fechaRegistro = $datos["created_at"];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="img/icon.png"/>
    <title>Eliminar Usuario</title>
</head>
<body>
    <!--Encabezado-->
    <?php include('./includes/header.php'); ?>

    <div class="container" style="padding-top:150px">
        
        <div class="row">
            <div class="col-6">
                <div class="alert alert-danger" role="alert">
                    Estas a punto de eliminar este usuario — ¿Estas seguro?
                </div>
            </div>
            </div>
        <div class="row">
            <div class="col-6">
            <table class="table">
                <tbody>
                    <tr>
                        <th style="width:250px" class="table-primary" scope="row">ID</th>
                        <td class="table-secondary"><?php echo $id?></td>
                    </tr>
                    <tr>
                        <th class="table-primary"scope="row">Nombre Completo</th>
                        <td class="table-secondary"><?php echo $nombreCompleto?></td>
                    </tr>
                    <tr>
                        <th class="table-primary" scope="row">Nombre de Usuario</th>
                        <td class="table-secondary"><?php echo $nombreUsuario?></td>
                    </tr>
                    <tr>
                        <th class="table-primary" scope="row">Correo Electronico</th>
                        <td class="table-secondary"><?php echo $email?></td>
                    </tr>
                    <tr>
                        <th class="table-primary" scope="row">Rol</th>
                        <td class="table-secondary"><?php echo $rol?></td>
                    </tr>
                    <tr>
                        <th class="table-primary" scope="row">Numero Telefonico</th>
                        <td class="table-secondary"><?php echo $numeroTelefono?></td>
                    </tr>
                    <tr>
                        <th class="table-primary" scope="row">Fecha de Registro</th>
                        <td class="table-secondary"><?php echo $fechaRegistro?></td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="col text-center">
                <img src="./img/danger.png" alt="Eliminar">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="./info_usuario_admin.php?id=<?php echo $_GET["id"]?>">
                <button type="button" class="btn btn-secondary">Regresar</button></a>
                <a href="php/delete_user.php?id=<?php echo $id?>">
                <button type="button" class="btn btn-danger">Eliminar</button></a>
            </div>
            <div class="col">
                
            </div>
        </div>
    </div>
</body>
</html>