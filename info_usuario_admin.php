<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null || $_SESSION["user_rol"] == "Miembro"){
    print "<script>alert(\"Acceso invalido!\");window.location='index.php';</script>";
}
?>

<?php

include "php/conexion.php";
			
$sql= "select * from user where id = \"$_GET[id]\"";
$query = $con->query($sql);

$sql2= "select * from envio where user_id = \"$_GET[id]\"";
$query2 = $con->query($sql2);

$entregado = 0;
$en_camino = 0;
$solicitado = 0;
$cancelado = 0;

while($datos2=$query2->fetch_array()){

    switch($datos2["estado"]){

        case "Solicitado":
            $solicitado++;
        break;

        case "En Camino":
            $en_camino++;
        break;

        case "Entregado":
            $entregado++;
        break;

        case "Cancelado":
            $cancelado++;
        break;

        default:
        break;
    }
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
    <title>Administración de Usuarios</title>
</head>
<body>
    <!--Encabezado-->
    <?php include('./includes/header.php'); ?>
    <?php

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
<?php   
if($_SESSION["user_rol"]=='Administrador'){
?>

<div class="container">
    <div class="row">
        <div class="col-2">
            <div class="row">
                <h2 style="padding-top:150px">Editar Usuario</h2>
            </div>
            <div class="row">
                <img style="padding-top:20px" src="./img/user_man.png" alt="Imagen de Usuario">
                
            </div>
            <div class="row">
                <p class="h5 p-2"><?php echo $nombreCompleto?></p>
            </div>
            
            <div class="row">
                <a href="editar_usuario_admin.php?id=<?php echo $_GET["id"]?>"><button style="width:150px" type="button" class="btn btn-success">Modificar Usuario</button></a>
            </div>
            <div class="row" style="padding-top:15px">
                <a href="eliminar_usuario_admin.php?id=<?php echo $_GET["id"]?>"><button style="width:150px" type="button" class="btn btn-danger">Eliminar Usuario</button></a>
            </div>
            <div class="row" style="padding-top:15px">
                <a href="./home.php"><button style="width:150px" type="button" class="btn btn-secondary">Regresar</button></a>
            </div>
            </div>

        <div class="col" style="padding-top:150px">
            <h2 style="padding-bottom:15px">Información de Usuario</h2>
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
    </div>
</div>
<?php
}
?>

<?php   
if($_SESSION["user_rol"]=='Repartidor'){
?>

<div class="container">
    <div class="row">
        <div class="col-2">

            <div class="row" style="padding-top:200px">
                <img style="padding-top:20px" src="./img/user_man.png" alt="Imagen de Usuario">
            </div>
            <div class="row">
                <p class="h5 p-2"><?php echo $nombreCompleto?></p>
            </div>

            <div class="row" style="padding-top:15px">
                <a href="./home.php"><button style="width:150px" type="button" class="btn btn-secondary">Regresar</button></a>
            </div>
        </div>

        <div class="col" style="padding-top:150px">
            <h2 style="padding-bottom:15px">Información de Usuario</h2>
            <table class="table">
                <tbody>
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
                    <tr>
                        <th class="table-primary" scope="row">Pedidos Recibidos</th>
                        <td class="table-secondary"><?php echo $entregado?></td>
                    </tr>
                    <tr>
                        <th class="table-primary" scope="row">Pedidos Cancelados</th>
                        <td class="table-secondary"><?php echo $cancelado?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
}
?>

</body>
</html>
