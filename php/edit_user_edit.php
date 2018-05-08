<?php

include "conexion.php";
            
if (!empty($_POST["password"])) {
    
    //Encriptar
    $pass_encrypt = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "update user SET fullname=\"$_POST[fullname]\", username=\"$_POST[username]\", email=\"$_POST[email]\",
    phonenumber=\"$_POST[phonenumber]\", password=\"$pass_encrypt\" where id = \"$_GET[id]\"";

    if ($con->query($sql) === TRUE) {
        print "<script>alert(\"El usuario ha sido modificado!\");</script>";
        print "<script>window.location='../home.php';</script>";
    } else {
        print "<script>alert(\"Ha ocurrido un error al modificar este usuario!\");</script>";
        print "<script>window.location='../home.php';</script>";
    }
    $con->close();

}else{  
    
    $sql = "update user SET fullname=\"$_POST[fullname]\", username=\"$_POST[username]\", email=\"$_POST[email]\",
    phonenumber=\"$_POST[phonenumber]\" where id = \"$_GET[id]\"";

    if ($con->query($sql) === TRUE) {
        print "<script>alert(\"El usuario ha sido modificado!\");</script>";
        print "<script>window.location='../home.php';</script>";
    } else {
        print "<script>alert(\"Ha ocurrido un error al modificar este usuario!\");</script>";
        print "<script>window.location='../home.php';</script>";
    }
    $con->close();

}

?>
