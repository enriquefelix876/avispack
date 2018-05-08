<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null || $_SESSION["user_rol"] != "Miembro"){
    print "<script>alert(\"Acceso invalido!\");window.location='index.php';</script>";
}
include "php/conexion.php";

//Generación de direccion predeterminada
$sql6 = "select address from direccion where predeterminado = 1 && user_id = \"$_SESSION[user_id]\" ";
$query6 = $con->query($sql6);

while($datos_pendientes6=$query6->fetch_array()){
    $direccion_predeterminada = $datos_pendientes6['address'];
}

//Generación de direcciones
$sql7 = "select id, address from direccion where predeterminado = 0 && user_id = \"$_SESSION[user_id]\"";
$query7 = $con->query($sql7);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Direcciones</title>
    <link rel="icon" type="image/png" href="img/icon.png"/>
</head>
<body>
    <!--Encabezado-->
    <?php include('includes/header.php'); ?>

    <div class="container" style="padding-top:150px">
    
        <div class="row">
            <div class="col-6">
                <h2 style="padding-bottom:10px">Otras Direcciones</h2>
            </div> 
            <div class="col-6">
                    <h2>Tu Dirección: </h2>
            </div>
        </div>

        <div class="row">

            <div class="col-6">

                <table class="table">
                    <thead>
                        <tr>
                        <th class="table-primary" scope="col">Dirección</th>
                        <th class="table-primary" scope="col">predeterminada</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <?php
                                while($datos=$query7->fetch_array()){   
                                
                            ?>
                                <tbody>
                                <tr class¨="table-primary">
                                    <td><?php echo $datos["address"]?></td>
                                    <td><a href="php/establecer_predeterminada.php?id=<?php echo $datos["id"]?>">
                                    Establecer como Determinada</a></td>
                                </tr>

                                </tbody>
                                <?php
                                }
                            ?>

                        </tr>
                    </tbody>
                </table>
                
                <div class="" style="padding-top:10px">
                    <a href="home.php"><button type="button" class="btn btn-secondary">Regresar</button></a>
                    <a href=""><button type="button" class="btn btn-primary">Agregar</button></a>
                </div>
                    


            </div>

            <div class="col-6"> 
                <div class="row">
                    <iframe
                        width="500"
                        height="280"
                        frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDdRoJlFXaTYr6ghQaW3v-_qwpyW-AyFZw
                            &q=<?php echo $direccion_predeterminada?>" allowfullscreen>
                    </iframe>
                </div>
                <div class="row">
                    <?php echo $direccion_predeterminada ?>
                </div>
            </div>

        </div>

    </div>
    
</body>
</html>