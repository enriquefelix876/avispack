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

?>
<h2 style="padding-top:140px;">Bienvenido, <?php echo $nombreCompleto?></h2>

<?php


switch ($_SESSION["user_rol"]) {

    case "Administrador":

    echo "<center><h3>Lista de Usuarios</h3></center>";
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