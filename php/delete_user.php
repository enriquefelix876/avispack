<?php

include "conexion.php";
			
$sql = "delete from user where id = \"$_GET[id]\"";

if ($con->query($sql) === TRUE) {
    print "<script>alert(\"El usuario ha sido eliminado!\");</script>";
    print "<script>window.location='../home.php';</script>";
} else {
    print "<script>alert(\"Ha ocurrido un error al eliminar este usuario!\");</script>";
    print "<script>window.location='../home.php';</script>";
}
$con->close();
?>
