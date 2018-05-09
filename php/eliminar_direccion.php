<?php
session_start();
include "conexion.php";

    //El id de la persona que intenta eliminar la direccion debe coincidir con el id de la sesión del usuario
    $sql = "select id from direccion where user_id = \"$_SESSION[user_id]\"";
    $query = $con->query($sql);

    if($query!=null){

        $sql2="delete from direccion where id = \"$_GET[id]\"";
        $query2 = $con->query($sql2);

        if($query2!=null){
            print "<script>alert(\"La direccion ha sido eliminado\");
            window.location='../home.php';</script>";
			}else{
            print "<script>alert(\"Ha ocurrido un error al eliminar esta dirección\");
            window.location='../home.php';</script>";
        }

    }else{
        print "<script>alert(\"No tienes los permisos necesarios para realizar esta acción!\");
        window.location='../home.php';</script>";
    }

