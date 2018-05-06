<div class="container">

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
    $pass = $datos["password"];
}

$sql2= "select * from envio where estado = 'Solicitado'";
$query2 = $con->query($sql2);

$filas = 0;
while($datos2=$query2->fetch_array()){
    $filas++;
}


?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 style="padding-top:140px;">Bienvenido, <?php echo $nombreCompleto?></h2>
        </div>
        <div class="col text-right">
            <?php
            if($_SESSION["user_rol"]=='Repartidor'){
                ?>
                <h3 style="padding-top:140px;">Pedidos Pendientes<span class="badge badge-primary"><?php echo $filas ?></span></h3>
            <?php
            }
            ?>
        </div>
    </div>
</div>




<?php
switch ($_SESSION["user_rol"]) {

    case "Administrador":

    include('list_of_members.php');

        break;

    case "Miembro":

        include('member_page.php');

        break;

    case "Repartidor":

        include('repartidor_page.php');

        break;
}
?>
</div>