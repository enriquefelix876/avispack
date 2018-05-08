<?php

include "php/conexion.php";
			
$sql= "select * from user where id = \"$_SESSION[user_id]\"";
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

//Generación de envios pendientes
$sql2 = "select direccion.address, user.fullname, paquete.contenido, envio.fecha_pedido, user.id, envio.id
    FROM((( envio 
    INNER JOIN direccion on envio.direccion_envio = direccion.id) 
    INNER JOIN paquete on envio.paquete_id = paquete.id) 
    INNER JOIN user on envio.user_id = user.id) 
    WHERE envio.estado = 'Solicitado' ORDER BY `envio`.`fecha_pedido` DESC";
$query2 = $con->query($sql2);

//Generación de envios en camino
$sql3 = "select paquete.contenido, direccion.address, paquete.valor, envio.fecha_en_camino , envio.id, user.fullname, user.id
    FROM ((( envio 
    INNER JOIN paquete ON envio.paquete_id = paquete.id) 
    INNER JOIN direccion ON envio.direccion_envio = direccion.id) 
    INNER JOIN user ON envio.user_id = user.id)
    WHERE envio.repartidor_id = 3 && envio.estado = 'En camino' ORDER BY `envio`.`fecha_en_camino` DESC";
$query3 = $con->query($sql3);

$sql4 = "select envio.detalle, direccion.address, user.fullname, paquete.valor, envio.pago, envio.fecha_entregado, user.id
    FROM((( envio 
    INNER JOIN paquete ON envio.paquete_id = paquete.id) 
    INNER JOIN direccion ON envio.direccion_envio = direccion.id) 
    INNER JOIN user ON envio.repartidor_id = user.id) 
    WHERE envio.repartidor_id = 3 && estado = 'Entregado' ORDER BY `envio`.`fecha_entregado` DESC";
$query4 = $con->query($sql4);

?>

<div class="container" style="padding-top:30px">

    <div class="row">
        <div class="col-2">
            <div class="row">
                <img style="padding-top:20px" src="./img/user_man.png" alt="Imagen de Usuario">
            </div>
            <div class="row">
                <p class="h5 p-2"><?php echo $nombreCompleto;?></p>
            </div>
            <div class="row">
                <a href="./editar_usuario.php?id=<?php echo $_SESSION["user_id"]?>"><button style="width:150px" type="button" class="btn btn-secondary">Editar Perfil</button></a>
            </div>

        </div>

        <div class="col">

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" 
                        href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Solicitados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" 
                        href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">En camino</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" 
                        href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Entregados</a>
                    </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" 
                    aria-labelledby="pills-home-tab">
                    <!-- Contenido de los pedidos solicitados-->

                    <?php

                    $resultado2 = mysqli_query($con, $sql2) or die (mysqli_error($con));

                    //Se comprueba si hay registros
                    $id_resultado2 = mysqli_fetch_array($resultado2, MYSQLI_ASSOC);

                    $id2 = $id_resultado2['contenido'];

                    if($id2==null){
                        echo "</br>";
                        echo "<center><img src=\"img/empty_envio.png\"></center>";
                        echo "<center>No hay pedidos pendientes</center>";
                    }else{
                    ?>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Hora Pedido</th>
                                    <th scope="col">Confirmar</th>
                                    <th scope="col">Cancelar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($datos_pendientes=$query2->fetch_array()){
                                ?>
                                <tr>
                                    <td><?php echo $datos_pendientes["contenido"]?></td>
                                    <td><?php echo $datos_pendientes["address"]?></td>
                                    <td><a href="info_usuario_admin.php?id=<?php echo $datos_pendientes["4"]?>">
                                    <?php echo $datos_pendientes["fullname"]?></a></td>
                                    <td><?php echo $datos_pendientes["fecha_pedido"]?></td>
                                    <td><a href="confirmar.php?id=<?php echo $datos_pendientes["5"]?>">Confirmar</a></td>
                                    <td><a href="php/cancelar_pedido.php?id=<?php echo $datos_pendientes["5"]?>">Cancelar</a></td>
                                </tr>
                            <?php 
                            }?>

                            </tbody>
                            </table>
                            <?php
                    }
                    ?>

                    </div>

                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" 
                    aria-labelledby="pills-profile-tab">
                    <!-- Contenido de los pedidos En Camino-->

                    <?php

                        $resultado3 = mysqli_query($con, $sql3) or die (mysqli_error($con));

                        //Se comprueba si hay registros
                        $id_resultado3 = mysqli_fetch_array($resultado3, MYSQLI_ASSOC);

                        $id3 = $id_resultado3['contenido'];

                        if($id3==null){
                            echo "</br>";
                            echo "<center><img src=\"img/empty_envio.png\"></center>";
                            echo "<center>No tienes pedidos en camino</center>";
                        }else{
                        ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Costo</th>
                                        <th scope="col">En camino desde</th>
                                        <th scope="col">Entregar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($datos_pendientes3=$query3->fetch_array()){
                                    ?>
                                    <tr>
                                        <td><?php echo $datos_pendientes3["contenido"]?></td>
                                        <td><?php echo $datos_pendientes3["address"]?></td>
                                        <td><a href="info_usuario_admin.php?id=<?php echo $datos_pendientes3["6"]?>">
                                        <?php echo $datos_pendientes3["fullname"]?></a></td>
                                        <td><?php echo $datos_pendientes3["valor"]?></td>
                                        <td><?php echo $datos_pendientes3["fecha_en_camino"]?></td>
                                        <td><a href="php/entregar_pedido.php?id=<?php echo $datos_pendientes3["4"]?>">Entregar</a></td>
                                    </tr>
                                <?php 
                                }?>

                                </tbody>
                                </table>
                                <?php
                        }
                        ?>

                    </div>

                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" 
                    aria-labelledby="pills-contact-tab">

                    <!-- Contenido de los pedidos En Camino-->
                    <?php

                        $resultado4 = mysqli_query($con, $sql4) or die (mysqli_error($con));

                        //Se comprueba si hay registros
                        $id_resultado4 = mysqli_fetch_array($resultado4, MYSQLI_ASSOC);

                        $id4 = $id_resultado4['detalle'];

                        if($id4==null){
                            echo "</br>";
                            echo "<center><img src=\"img/empty_envio.png\"></center>";
                            echo "<center>No has entregado ningún producto";
                        }else{
                        ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Fecha Entrega</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($datos_pendientes4=$query4->fetch_array()){
                                    ?>
                                    <tr>
                                        <td><?php echo $datos_pendientes4["detalle"]?></td>
                                        <td><?php echo $datos_pendientes4["address"]?></td>
                                        <td><a href="info_usuario_admin.php?id=<?php echo $datos_pendientes4["6"]?>">
                                        <?php echo $datos_pendientes4["fullname"]?></a></td>
                                        <td><?php echo "$".($datos_pendientes4["valor"]+$datos_pendientes4["pago"])?></td>
                                        <td><?php echo $datos_pendientes4["fecha_entregado"]?></td>
                                    </tr>
                                <?php 
                                }?>

                                </tbody>
                                </table>
                                <?php
                        }
                        ?>

                    </div>
                    
                </div>

        </div>

    </div>
</div>