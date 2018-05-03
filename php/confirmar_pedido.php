<?php

include "conexion.php";
session_start();
$sql= "select * from user where id = \"$_SESSION[user_id]\"";
$query = $con->query($sql);


while($datos=$query->fetch_array()){
    $id_usuario = $datos["id"];

}

    //Registrar Paquete
    if(isset($_POST["paquete"]) ){
                
        $sql = "insert into paquete(contenido) value (\"$_POST[paquete]\")";
        $query = $con->query($sql);
        if($query!=null){
			}else{
                print "<script>alert(\"Ha ocurrido un error al registrar el paquete\");
            window.location='../home.php';</script>";
            }
        }

        $sql3 = "Select id FROM paquete order by id DESC LIMIT 1";
        // Pasamos el resultado
        $resultado = mysqli_query($con, $sql3) or die (mysqli_error($con));
        // Pasamos a un array asociativo 
        $id_resultado = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        $id_paquete = $id_resultado['id'];
        


	if(isset($_POST["paquete"]) ){
			
		$sql2 = "insert into envio(user_id,paquete_id,pago,direccion_envio,fecha_pedido) value 
        (\"$id_usuario\",\"$id_paquete\",35,1,NOW())";
        
		$query2 = $con->query($sql2);
		if($query!=null){
            print "<script>alert(\"El pedido ha sido solicitado correctamente, espere su confirmación\");
            window.location='../home.php';</script></script>";
			}else{
                print "<script>alert(\"Ha ocurrido un error al registrar el envio\");
            window.location='../home.php';</script>";
            }
		}
	
?>