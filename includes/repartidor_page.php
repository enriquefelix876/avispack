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

            <div class="row">

            <ul class="nav nav-pills mb-3 nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" 
                    aria-controls="home" aria-selected="true">Pendientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" 
                    aria-controls="profile" aria-selected="false">En Camino</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" 
                    aria-controls="contact" aria-selected="false">Entregados</a>
                </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    
                <?php

                $resultado = mysqli_query($con, $sql2) or die (mysqli_error($con));

                //Se comprueba si hay registros
                $id_resultado = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

                $id = $id_resultado['contenido'];

                if($id==null){
                echo "<p>Actualmente no hay pedidos pendientes</p>";
                }else{
                ?>
                <table class="table" id="example" class="table table-striped table-bordered" style="width:100%">
                        <tbody>
                            <tr>
                                <th style="width:250px" class="table-primary text-center" scope="row">Descripción</th>
                                <th style="width:250px" class="table-primary text-center" scope="row">Dirección</th>
                                <th style="width:250px" class="table-primary text-center" scope="row">Nombre</th>
                                <th style="width:250px" class="table-primary text-center" scope="row">Hora pedido</th>
                                <th style="width:250px" class="table-primary text-center" scope="row">Confirmar</th>
                                <th style="width:250px" class="table-primary text-center" scope="row">Cancelar</th>
                            </tr>
                            <tr>
                            <?php
                                while($datos_pendientes=$query2->fetch_array()){
                                ?>
                                <td class="table-secondary"><?php echo $datos_pendientes['contenido']?></td>
                                <td class="table-secondary"><?php echo $datos_pendientes['address']?></td>
                                <td class="table-secondary text-center"><a href="./info_usuario_admin.php?id=<?php echo $datos_pendientes['4']?>"><?php echo $datos_pendientes['fullname']?></a></td>
                                <td class="table-secondary text-center"><?php echo $datos_pendientes['fecha_pedido']?></td>
                                    
                                <td class="table-secondary text-center">
                                <!-- Button trigger modal -->
                                <a href="" data-toggle="modal" data-target="#exampleModal">
                                Confirmar
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmar Pedido</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="" method="post">
                                        <div class="modal-body">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis
                                            obcaecati quisquam minima qui quasi consequatur earum architecto
                                            iure, fuga ipsam, veritatis, iste sequi aliquam? Repudiandae repellat
                                            reprehenderit qui quia nisi?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" 
                                            data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary">Confirmar</button>
                                        </div>
                                    </form>

                                    </div>
                                </div>
                                </div>
                                </td>
                                
                                <td class="table-secondary text-center"><a href="php/cancelar_pedido.php?id=<?php echo $datos_pendientes['5']?>">Cancelar</a></td>
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
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A, nisi. Dolore minima iusto
                    voluptatibus itaque, in mollitia rem? Earum quae laborum doloribus dolorum provident velit
                    voluptatibus illum ipsam nihil deleniti!</p>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A, nisi. Dolore minima iusto
                    voluptatibus itaque, in mollitia rem? Earum quae laborum doloribus dolorum provident velit
                    voluptatibus illum ipsam nihil deleniti!</p>
                </div>
            </div>

            </div>
            
        </div>
        
    </div>

</div>