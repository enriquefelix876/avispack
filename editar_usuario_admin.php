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
    <title>Editar Usuario</title>
</head>
<body>
    <!--Encabezado-->
    <?php include('./includes/header.php'); ?>

    <div class="container" style="padding-top:150px">
        <div class="row">
            <div class="col-6 text-center">
                <div class="alert alert-warning" role="alert">
                    ¡Estás en una zona de edición! Ten cuidado al escribir en los campos.
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-6">
            <p class="h2"><?php echo $nombreCompleto?></p>
            
                <!--Formulario-->
                <form role="form" name="editar" action="php/edit_user.php?id=<?php echo $id?>" method="post">
                    <div class="form-group">
                        <div class="input-group mb-3" style="padding-top:20px">
                            <div class="input-group-prepend">
                                <span style="width:180px" class="input-group-text">Nombre Completo</span>
                            </div>
                                <input type="text" value="<?php echo $nombreCompleto?>" class="form-control" id="fullname" name="fullname"
                                aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span style="width:180px" class="input-group-text">Nombre de Usuario</span>
                            </div>
                                <input type="text" value="<?php echo $nombreUsuario?>" class="form-control" id="username" name="username"
                                aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span style="width:180px" class="input-group-text">Correo Electronico</span>
                            </div>
                            <input type="text" value="<?php echo $email?>" class="form-control" id="email" name="email" 
                            aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span style="width:180px" class="input-group-text">Telefono</span>
                            </div>
                            <input type="text" value="<?php echo $numeroTelefono?>" id="phonenumber" name="phonenumber" 
                            class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label style="width:180px" class="input-group-text" 
                                for="inputGroupSelect01">Rol del Usuario</label>
                            </div>
                            <select class="custom-select" id="rol" name="rol">
                                <option selected><?php  echo $rol?></option>
                                <option value="Miembro">Miembro</option>
                                <option value="Repartidor">Repartidor</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span style="width:180px" class="input-group-text">Contraseña</span>
                            </div>
                            <input type="password" id="password" name="password" 
                            class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
        
                        <div class="" style="padding-top:20px">
                            <a href="./info_usuario_admin.php?id=<?php echo $_GET["id"]?>"><button type="button" 
                            class="btn btn-secondary">Regresar</button></a>
                            <button style="text-align:right" type="submit" class="btn btn-primary">Modificar</button>
                            <script src="js/valida_editar_usuario.js"></script>
                        </div>

                    </div>
                </form>

            </div>
            <div class="col-6 text-right">
                <img src="img/editar_usuario.png" alt="Editar Usuario">
            </div>
        </div>
        

    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>