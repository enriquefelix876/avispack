<?php

include "conexion.php";
			
$sql = "update user SET fullname=\"$_POST[fullname]\", username=\"$_POST[username]\", email=\"$_POST[email]\",
phonenumber=\"$_POST[phonenumber]\", rol=\"$_POST[rol]\" where id = \"$_GET[id]\"";

if ($con->query($sql) === TRUE) {
    print "<script>alert(\"El usuario ha sido modificado!\");</script>";
    print "<script>window.location='../home.php';</script>";
} else {
    print "<script>alert(\"Ha ocurrido un error al modificar este usuario!\");</script>";
    print "<script>window.location='../home.php';</script>";
}
$con->close();

?>
