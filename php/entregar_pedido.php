<?php  

session_start();
include "conexion.php";

$user_id = null;
$comprobacion = "select id from user where id=\"$_SESSION[user_id]\" && rol='Repartidor'";
            
$comprobar = $con->query($comprobacion);

while ($r=$comprobar->fetch_array()) {
    $user_id=$r["id"];
    break;
}

if($user_id != null){

    $sql = "update envio SET estado = 'Entregado', fecha_entregado = NOW() where id=\"$_GET[id]\"";

    if ($con->query($sql) === TRUE) {
        print "<script>alert(\"El pedido ha sido entregado correctamente!\");</script>";
        print "<script>window.location='../home.php';</script>";
    } else {
        print "<script>alert(\"Ha ocurrido un error al entregar este pedido!\");</script>";
        print "<script>window.location='../home.php';</script>";
    }
    $con->close();

}else{

    print "<script>alert(\"No tienes los permisos para realizar esta acción!\");</script>";
    print "<script>window.location='../home.php';</script>";
}


?>