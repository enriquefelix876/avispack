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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Agregar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Agregar Dirección</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Formulario -->
                        <div class="modal-body">
                            <form name="direccion"action="php/agregar_direccion.php" method="post">
                                <label class="h6" for="address">Dirección</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="address" name="address" 
                                    class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>
                                <p>Escribe la dirección siguiendo este formato:</p>  
                                <p>Golfo de California 285 Nacionalizacion del
                                Golfo de California 85477 Heroica Guaymas, Son.</p>    
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                            <script src="js/valida_direcion.js"></script>
                        </form>
                        </div>
                        </div>
                    </div>
                    </div>
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
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"></script>

</body>
</html>