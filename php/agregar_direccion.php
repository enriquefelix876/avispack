<?php 

session_start();
include "conexion.php";

$user_id=null;
$comprobacion = "select id from user where id = \"$_SESSION[user_id]\" && rol = 'Miembro'";
$comprobar = $con->query($comprobacion);

while ($r=$comprobar->fetch_array()) {
    $user_id=$r["id"];
    break;
}

//Comprobar si hay direcciones previas
$direcciones ="select id from direccion where user_id = \"$_SESSION[user_id]\"";

$resultado3 = mysqli_query($con, $direcciones) or die (mysqli_error($con));

        //Se comprueba si hay direcciones previas
        $id_resultado3 = mysqli_fetch_array($resultado3, MYSQLI_ASSOC);

        $numeroDirecciones = $id_resultado3['id'];

if($numeroDirecciones!=null){

    if(isset($_POST["address"]) ){
        if($user_id!=null){

            $sql = "insert into direccion(user_id, address) value (\"$_SESSION[user_id]\",\"$_POST[address]\")";

            $query = $con->query($sql);

            if($query!=null){
                print "<script>alert(\"La dirección ha sido agregada a tu cuenta\");
                window.location='../home.php';</script></script>";
                }else{
                    print "<script>alert(\"No ha sido posible agregar la dirección!\");
                window.location='../home.php';</script>";
                }
        }else{
            print "<script>alert(\"No puedes agregar direcciones!\");
            window.location='../home.php';</script>";
        }
    }else{

        print "<script>alert(\"Debes proporcionar debidamente la dirección!\");
        window.location='../home.php';</script>";
    }
}else{

    if(isset($_POST["address"]) ){
        if($user_id!=null){

            $sql = "insert into direccion(user_id, address, predeterminado) value (\"$_SESSION[user_id]\",\"$_POST[address]\",1)";

            $query = $con->query($sql);

            if($query!=null){
                print "<script>alert(\"La dirección ha sido agregada a tu cuenta\");
                window.location='../home.php';</script></script>";
                }else{
                    print "<script>alert(\"No ha sido posible agregar la dirección!\");
                window.location='../home.php';</script>";
                }
        }else{
            print "<script>alert(\"No puedes agregar direcciones!\");
            window.location='../home.php';</script>";
        }
    }else{

        print "<script>alert(\"Debes proporcionar debidamente la dirección!\");
        window.location='../home.php';</script>";
    }

}

?>