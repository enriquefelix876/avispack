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

?>

<div class="container">
    <div class="row" style="padding-top:20px">
        <div class="col-3">
            
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

                        <form action="php/confirmar_pedido.php" method="post">
                            <div class="form-group">
                                <label for="paquete">Descripción del producto a pedir</label>
                                <input type="text" class="form-control" id="paquete" name="paquete" 
                                placeholder="Describe el producto"><small class="form-text text-muted">
                                Trata de describir de la mejor manera el producto solicitado</small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Confirmar Pedido</button>
                            </div>
                        </form>
                    </div>
                            
                    </div>
                </div>
                </div>
            </div>

            <div class="row" style="padding-top:15px">
                <a href="./editar_usuario.php?id=<?php echo $_SESSION["user_id"]?>"><button style="width:150px" type="button" 
                class="btn btn-success">Editar Perfil</button></a>
            </div>

        </div>

        <div class="col">
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
                        <td class="table-secondary"><?php echo $nombreCompleto?></td>
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