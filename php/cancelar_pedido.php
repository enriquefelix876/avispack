<?php 
session_start();
include "conexion.php";

//Se comprueba si el id que recibe el get coincide con un envio solicitado del usuario que hace la consulta o
//con un repartidor
$user_id=null;
$comprobacion = "select id from envio where id = \"$_GET[id]\" && 
(user_id = \"$_SESSION[user_id]\" or \"$_SESSION[user_rol]\"='Repartidor') && estado = 'Solicitado'";
$comprobar = $con->query($comprobacion);

while ($r=$comprobar->fetch_array()) {
    $user_id=$r["id"];
    break;
}
//Se comprueba que el id del get 
if($user_id!=null){
			
$sql = "update envio SET estado='Cancelado', fecha_cancelado = NOW() WHERE id = \"$_GET[id]\"";

$query = $con->query($sql);
		if($query!=null){
            print "<script>alert(\"El pedido ha sido cancelado\");
            window.location='../home.php';</script></script>";
			}else{
                print "<script>alert(\"Ha ocurrido un error al cancelar el envio\");
            window.location='../home.php';</script>";
            }
    }else{
        print "<script>alert(\"No es posible cancelar este pedido\");
        window.location='../home.php';</script>";
    }    

?>