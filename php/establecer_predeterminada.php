<?php 

include "conexion.php";
session_start();

//Quitar predeterminada
$sql = "select id from direccion where user_id = \"$_SESSION[user_id]\" && predeterminado = 1";
$query = $con->query($sql);
while($datos=$query->fetch_array()){
    $direccion_predeterminada = $datos["id"];
}

$sql= "update direccion SET predeterminado = 0 WHERE id = \"$direccion_predeterminada\"";
$query = $con->query($sql);

//Actualizar dirección predeterminada
$sql2= "update direccion SET predeterminado = 1 WHERE id = \"$_GET[id]\"";
$query = $con->query($sql2);

print "<script>alert(\"La dirección predeterminada ha sido actualizada correctamente!\");
    window.location='../direcciones.php';</script>";

?>