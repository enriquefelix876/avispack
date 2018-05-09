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

//Generación de pedidos pendientes
$sql2 = "select envio.id, paquete.contenido, direccion.address, envio.pago, envio.fecha_pedido 
    FROM (( envio 
    INNER JOIN paquete ON envio.paquete_id = paquete.id && envio.user_id = \"$_SESSION[user_id]\" && envio.estado = 'Solicitado') 
    INNER JOIN direccion ON envio.direccion_envio = direccion.id) 
    ORDER BY `envio`.`fecha_pedido` DESC";
$query2 = $con->query($sql2);

//Generación de pedidos pendientes
$sql3 = "select paquete.contenido, direccion.address, envio.pago, user.fullname, envio.fecha_pedido, envio.fecha_en_camino, paquete.valor
    FROM((( envio 
    INNER JOIN paquete ON envio.paquete_id = paquete.id && envio.user_id = \"$_SESSION[user_id]\" && envio.estado = 'En camino') 
    INNER JOIN direccion ON envio.direccion_envio = direccion.id)
    INNER JOIN user ON envio.repartidor_id = user.id) 
    ORDER BY `envio`.`fecha_en_camino` DESC;";
$query3 = $con->query($sql3);


//Generación de pedidos entregados
$sql4 = "select paquete.contenido, direccion.address, envio.pago, user.fullname, envio.fecha_pedido, envio.fecha_en_camino, paquete.valor, envio.fecha_entregado
    FROM((( envio 
    INNER JOIN paquete ON envio.paquete_id = paquete.id && envio.user_id = \"$_SESSION[user_id]\" && envio.estado = 'Entregado') 
    INNER JOIN direccion ON envio.direccion_envio = direccion.id)
    INNER JOIN user ON envio.repartidor_id = user.id) 
    ORDER BY `envio`.`fecha_entregado` DESC;";
$query4 = $con->query($sql4);

//Generación de pedidos cancelados
$sql5 = "select envio.id, paquete.contenido, direccion.address, envio.fecha_cancelado 
    FROM(( envio
    INNER JOIN paquete ON envio.paquete_id = paquete.id) 
    INNER JOIN direccion ON envio.direccion_envio = direccion.id) 
    WHERE envio.estado = 'Cancelado' && envio.user_id = \"$_SESSION[user_id]\" 
    ORDER BY `envio`.`fecha_cancelado` DESC;";
$query5 = $con->query($sql5);

//Generación de direccion predeterminada
$sql6 = "select address from direccion where predeterminado = 1 && user_id = \"$_SESSION[user_id]\" ";
$query6 = $con->query($sql6);

while($datos_pendientes6=$query6->fetch_array()){
    $direccion_predeterminada = $datos_pendientes6['address'];
}
?>

<div class="container">
    <div class="row" style="padding-top:20px">
        <div class="col-2">
            
            <div class="row">
                <img style="padding-top:20px" src="./img/user_man.png" alt="Imagen de Usuario">
            </div>

            <div class="row">
                <p class="h5 p-2"><?php echo $nombreCompleto;?></p>
            </div>

            <div class="row">
                
                <!-- Button trigger modal -->
                <button type="button" style="width:150px" class="btn btn-primary" 
                data-toggle="modal" data-target="#exampleModal">Solicitar pedido</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Solicitar Pedido</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form role="form" name="pedido" action="php/confirmar_pedido.php" method="post">
                            <div class="form-group">
                                <label for="paquete">Descripción del producto a pedir</label>
                                <input type="text" class="form-control" id="paquete" name="paquete" 
                                placeholder="Describe el producto"><small class="form-text text-muted">
                                Trata de describir de la mejor manera el producto solicitado</small>
                            </div>
                            
                            <?php if(isset($direccion_predeterminada)):?>
                            <div style="padding-top:5px">
                                <?php echo "Dirección a enviar: "."</br>";?>
                                <?php echo $direccion_predeterminada."</br>";
                            ?>
                            <small class="form-text text-muted">
                            Puedes cambiar tu dirección predeterminada en la administración de direcciones</small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Confirmar Pedido</button>
                                <script src="js/valida_pedido.js"></script>
                            </div>

                            <?php else:?>
                            <p>No tiene ninguna dirección a enviar asignada a la cuenta. Vaya al administrador de 
                            direcciones para agregarla</p>

                            <?php endif;?>

                        </form>
                    </div>
                            
                    </div>
                </div>
                </div>
            </div>
            
            
            <div class="row" style="padding-top:15px">
                
                <!-- Button trigger modal -->
                <a href="direcciones.php"><button type="button" style="width:150px" class="btn btn-success" >
                    Direcciones
                </button></a>

            </div>


            <div class="row" style="padding-top:15px">
                <a href="./editar_usuario.php?id=<?php echo $_SESSION["user_id"]?>"><button style="width:150px" type="button" 
                class="btn btn-secondary">Editar Perfil</button></a>
            </div>

        </div>

        <div class="col">


<ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" 
    role="tab" aria-controls="pills-home" aria-selected="true">Pendientes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" 
    role="tab" aria-controls="pills-profile" aria-selected="false">En Camino</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" 
    role="tab" aria-controls="pills-contact" aria-selected="false">Entregados</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-cancelado-tab" data-toggle="pill" href="#pills-cancelado" 
    role="tab" aria-controls="pills-cancelado" aria-selected="false">Cancelados</a>
  </li>
</ul>

<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <?php

        $resultado = mysqli_query($con, $sql2) or die (mysqli_error($con));

        //Se comprueba si hay registros
        $id_resultado = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

        $id = $id_resultado['contenido'];

    if($id==null){
        echo "</br>";
        echo "<center><img src=\"img/empty_envio.png\"></center>";
        echo "</br>";
        echo "<center>Actualmente no tienes pedidos pendientes</center>";

    }else{
        ?>
    <table class="table" id="example" class="table table-striped table-bordered" style="width:100%">
                <tbody>
                    <tr>
                        <th style="width:250px" class="table-primary text-center" scope="row">Descripción</th>
                        <th style="width:250px" class="table-primary text-center" scope="row">Dirección</th>
                        <th style="width:250px" class="table-primary text-center" scope="row">Comisión</th>
                        <th style="width:250px" class="table-primary text-center" scope="row">Fecha Pedido</th>
                        <th style="width:250px" class="table-primary text-center" scope="row">Cancelar Pedido</th>
                    </tr>
                    <tr>
                    <?php
                        while($datos_pendientes=$query2->fetch_array()){
                        ?>
                        <td class="table-secondary"><?php echo $datos_pendientes['contenido']?></td>
                        <td class="table-secondary"><?php echo $datos_pendientes['address']?></td>
                        <td class="table-secondary text-center"><?php echo "$".$datos_pendientes['pago']?></td>
                        <td class="table-secondary"><?php echo $datos_pendientes['fecha_pedido']?></td>
                        <td class="table-secondary text-center"><a href="php/cancelar_pedido.php?id=<?php echo $datos_pendientes['id']?>">Cancelar</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                </tbody>
            </table>
            <?php
            }
            ?>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">


        <?php

        $resultado3 = mysqli_query($con, $sql3) or die (mysqli_error($con));

        //Se comprueba si hay registros en camino
        $id_resultado3 = mysqli_fetch_array($resultado3, MYSQLI_ASSOC);

        $id3 = $id_resultado3['contenido'];

        if($id3==null){
            echo "</br>";
            echo "<center><img src=\"img/empty_envio.png\"></center>";
            echo "</br>";
            echo "<center>Actualmente no tienes pedidos en camino</center>";
        }else{
        ?>
  <table class="table">
                <tbody>
                    <tr>
                        <th style="width:250px" class="table-primary" scope="row">Descripción</th>
                        <th style="width:250px" class="table-primary" scope="row">Dirección</th>
                        <th style="width:250px" class="table-primary" scope="row">Costo</th>
                        <th style="width:250px" class="table-primary" scope="row">En camino desde</th>
                        <th style="width:250px" class="table-primary" scope="row">Repartidor</th>
                    </tr>
                    <tr>
                    <?php
                        while($datos_pendientes3=$query3->fetch_array()){
                        ?>
                        <td class="table-secondary"><?php echo $datos_pendientes3['contenido']?></td>
                        <td class="table-secondary"><?php echo $datos_pendientes3['address']?></td>
                        <td class="table-secondary"><?php echo "$".$datos_pendientes3['valor']?></td>
                        <td class="table-secondary"><?php echo $datos_pendientes3['fecha_en_camino']?></td>
                        <td class="table-secondary"><?php echo $datos_pendientes3['fullname']?></td>
                        </tr>
                        <?php
                        }
                        ?>
                </tbody>
            </table>
            <?php
            }
            ?>

    </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
  
    <?php

    $resultado4 = mysqli_query($con, $sql4) or die (mysqli_error($con));

    //Se comprueba si hay registros en camino
    $id_resultado4 = mysqli_fetch_array($resultado4, MYSQLI_ASSOC);

    $id4 = $id_resultado4['contenido'];

    if($id4==null){
        echo "</br>";
        echo "<center><img src=\"img/empty_envio.png\"></center>";
        echo "</br>";
        echo "<center>No le han entregado ningún pedido</center>";
    }else{
    ?>
    <table class="table">
            <tbody>
                <tr>
                    <th style="width:250px" class="table-primary" scope="row">Descripción</th>
                    <th style="width:250px" class="table-primary" scope="row">Dirección</th>
                    <th style="width:250px" class="table-primary" scope="row">Total Pagado</th>
                    <th style="width:250px" class="table-primary" scope="row">Entregado en</th>
                </tr>
                <tr>
                <?php
                    while($datos_pendientes4=$query4->fetch_array()){
                    ?>
                    <td class="table-secondary"><?php echo $datos_pendientes4['contenido']?></td>
                    <td class="table-secondary"><?php echo $datos_pendientes4['address']?></td>
                    <td class="table-secondary"><?php echo "$".($datos_pendientes4['valor']+$datos_pendientes4['pago'])?></td>
                    <td class="table-secondary"><?php echo $datos_pendientes4['fecha_entregado']?></td>
                    </tr>
                    <?php
                    }
                    ?>
            </tbody>
        </table>
        <?php
        }
        ?>

  </div>

    <div class="tab-pane fade" id="pills-cancelado" role="tabpanel" aria-labelledby="pills-cancelado-tab">
    
    <?php

    $resultado5 = mysqli_query($con, $sql5) or die (mysqli_error($con));

    //Se comprueba si hay registros cancelados
    $id_resultado5 = mysqli_fetch_array($resultado5, MYSQLI_ASSOC);

    $id5 = $id_resultado5['contenido'];

    if($id5==null){
        echo "</br>";
        echo "<center><img src=\"img/empty_envio.png\"></center>";
        echo "</br>";
        echo "<center>No tienes ningún pedido cancelado</center>";
    }else{
    ?>
    <table class="table">
            <tbody>
                <tr>
                    <th style="width:250px" class="table-primary" scope="row">Descripción</th>
                    <th style="width:250px" class="table-primary" scope="row">Dirección</th>
                    <th style="width:250px" class="table-primary" scope="row">Fecha Cancelación</th>
                    <th style="width:250px" class="table-primary" scope="row">Eliminar</th>
                </tr>
                <tr>
                <?php
                    while($datos_pendientes5=$query5->fetch_array()){
                    ?>
                    <td class="table-secondary"><?php echo $datos_pendientes5['contenido']?></td>
                    <td class="table-secondary"><?php echo $datos_pendientes5['address']?></td>
                    <td class="table-secondary"><?php echo $datos_pendientes5['fecha_cancelado']?></td>
                    <td class="table-secondary"><a href="php/eliminar_pedido.php?id=<?php echo $datos_pendientes5['id']?>">
                    Eliminar</a></td>
                    </tr>
                    <?php
                    }
                    ?>
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