<?php 

session_start();
include "conexion.php";
//Update valor del paquete
//Update estado del envio a en camino
//Update repartidor_id
//Update fecha de en camino
//Update detalle del envio

if(isset($_POST["valor"]) &&isset($_POST["detalle"])){

    $sql= "select envio.id, paquete.id
        FROM ( envio 
        INNER JOIN paquete ON envio.paquete_id = paquete.id)
        WHERE envio.id = \"$_GET[id]\";";
    $query = $con->query($sql);

    while($datos=$query->fetch_array()){
        $envio_id = $datos["0"];
        $paquete_id = $datos["1"];
    }


    //Se comprueba que el id del get corresponde a un repartidor
    if($envio_id!=null){

        $sql2="update envio SET estado = 'En Camino', repartidor_id  = \"$_SESSION[user_id]\", fecha_en_camino = NOW(), 
        detalle= \"$_POST[detalle]\" where id = \"$_GET[id]\"";
        $query2 = $con->query($sql2);

        $sql3="update paquete SET valor = \"$_POST[valor]\" where id = \"$paquete_id\"";
        $query3 = $con->query($sql3);

        print "<script>alert(\"El pedido se ha confirmado correctamente!\");
        window.location='../home.php';</script>";


    }else{

        print"<script>alert(\"Ha ocurrido un error al confirmar el envio!\");
        wi ndow.location='../home.php';</script>";
    }


}else{
    print "<script>alert(\"Asegurese de llenar los campos!\");
    window.location='../home.php';</script>";

}

?>