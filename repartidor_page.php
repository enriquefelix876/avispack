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

    <div class="row">
        <div class="col-2">
            <div class="row">
                <img style="padding-top:20px" src="./img/user_man.png" alt="Imagen de Usuario">
            </div>
            <div class="row">
                <p class="h5 p-2"><?php echo $nombreCompleto;?></p>
            </div>
            <div class="row">
                <a href="./editar_usuario.php?id=<?php echo $_SESSION["user_id"]?>"><button style="width:150px" type="button" 
                class="btn btn-secondary">Editar Perfil</button></a>
            </div>

        </div>
        
    </div>

</div>