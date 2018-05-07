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
    WHERE envio.estado = 'Solicitado'";
$query2 = $con->query($sql2);

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
                    echo "<p>Actualmente no hay pedidos pendientes</p>";
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
                                    <td><?php echo $datos_pendientes["fullname"]?></td>
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
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam molestias repellendus quas dicta saepe est, fugiat quo officiis rem dolor praesentium accusantium odit quis, nisi odio labore recusandae vero sint.</p>
                    </div>

                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" 
                    aria-labelledby="pills-contact-tab">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum vel assumenda ab excepturi nobis? Ex eos non repudiandae soluta quis facilis ratione eum iste sunt praesentium, officia enim dignissimos autem?</p>
                    </div>
                    
                </div>

        </div>

    </div>
</div>