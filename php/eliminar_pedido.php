<?php 

session_start();
include "conexion.php";

//Se comprueba si el id que recibe el pedido a eliminar coincide que el usuario que realiza la consulta
$user_id=null;
$comprobacion = "select id from envio where id = \"$_GET[id]\" && user_id = \"$_SESSION[user_id]\" && estado = 'Cancelado'";
$comprobar = $con->query($comprobacion);

while ($r=$comprobar->fetch_array()) {
    $user_id=$r["id"];
    break;
}

if($user_id!=null){

    $sql= "delete FROM envio WHERE id = \"$_GET[id]\"";
    
    $query = $con->query($sql);
		if($query!=null){
            print "<script>alert(\"El pedido ha sido eliminado\");
            window.location='../home.php';</script>";
			}else{
            print "<script>alert(\"No tienes los permisos necesarios para eliminar este pedido!\");
            window.location='../home.php';</script>";
            }

    }else{
        print "<script>alert(\"No tienes los permisos necesarios para eliminar este pedido!\");
        window.location='../home.php';</script>";
    }

?>