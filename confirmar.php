<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null || $_SESSION["user_rol"] != "Repartidor"){
    print "<script>alert(\"No tienes los permisos necesarios para acceder a esta página!\");
    window.location='index.php';</script>";
}

include "php/conexion.php";
            
//Generacion informacion de  envio
$sql= "select envio.fecha_pedido, direccion.address, paquete.contenido, user.fullname
    FROM ((( envio 
    INNER JOIN direccion ON envio.direccion_envio = direccion.id)
    INNER JOIN paquete ON envio.paquete_id = paquete.id)
    INNER JOIN user ON envio.user_id = user.id) WHERE envio.id = \"$_GET[id]\";";
$query = $con->query($sql);

while($datos=$query->fetch_array()){
    $fecha_pedido = $datos["fecha_pedido"];
    $direccion = $datos["address"];
    $paquete = $datos["contenido"];
    $fullname = $datos["fullname"];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Confirmar Pedido</title>
</head>
<body>
    <!--Encabezado-->
    <?php include('./includes/header.php'); ?>

    <div class="container">
        <div class="row" style="padding-top:150px">
            <div class="col-6">
                <h2>Confirmación del envío</h2>
            </div>
        </div>
        <div class="row" style="padding-top:10px">
            <div class="col-6">
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="table-primary"scope="row">Nombre del Cliente</th>
                            <td class="table-secondary"><?php echo $fullname?></td>
                        </tr>
                        <tr>
                            <th class="table-primary" scope="row">Dirección de envío</th>
                            <td class="table-secondary"><?php echo $direccion?></td>
                        </tr>
                        <tr>
                            <th class="table-primary" scope="row">Paquete a enviar</th>
                            <td class="table-secondary"><?php echo $paquete?></td>
                        </tr>
                        <tr>
                            <th class="table-primary" scope="row">Fecha Pedido</th>
                            <td class="table-secondary"><?php echo $fecha_pedido?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-6 text-center">
                <iframe
                    width="500"
                    height="280"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDdRoJlFXaTYr6ghQaW3v-_qwpyW-AyFZw
                        &q=<?php echo $direccion?>" allowfullscreen>
                </iframe>
            </div>

        </div>

        <div class="row">
            <div class="col-6">
                <h4>Detalles del envio</h4>

                <form name="confirmar" action="php/confirmar_pedido_repartidor.php?id=<?php echo $_GET["id"]?>" method="post">
                    <div class="form-group">
                        <div class="input-group mb-3" style="padding-top:10px">
                            <div class="input-group-prepend">
                                <span style="width:180px" class="input-group-text">Costo del Pedido</span>
                            </div>
                            <input type="text" class="form-control" id="valor" name="valor"
                            aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span style="width:180px" class="input-group-text">Detalles del envío</span>
                            </div>
                            <input type="text" class="form-control" id="detalle" name="detalle"
                            aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div>
                            <a href="home.php"><button type="button" 
                            class="btn btn-secondary">Regresar</button></a>
                            <button style="text-align:right" type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                    </div>
                </form>
            
            </div>
        </div>

    </div>
<script src="js/valida_login.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"></script>
</body>
</html>

