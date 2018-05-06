<?php
session_start();
include "conexion.php";

$user_id = null;
$comprobacion = "select id from user where id=\"$_SESSION[user_id]\" && rol='Administrador'";
            
$comprobar = $con->query($comprobacion);

while ($r=$comprobar->fetch_array()) {
    $user_id=$r["id"];
    break;
}

if($user_id!=null){

    $sql = "delete from user where id = \"$_GET[id]\"";

if ($con->query($sql) === TRUE) {
    print "<script>alert(\"El usuario ha sido eliminado!\");</script>";
    print "<script>window.location='../home.php';</script>";
} else {
    print "<script>alert(\"Ha ocurrido un error al eliminar este usuario!\");</script>";
    print "<script>window.location='../home.php';</script>";
}
$con->close();
    }else{
        print "<script>alert(\"No tienes los permisos para realizar esta acción!\");</script>";
        print "<script>window.location='../home.php';</script>";
    }

?>
