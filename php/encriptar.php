<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encriptar</title>
</head>
<body>
<?php

 
    $hash = password_hash("nose", PASSWORD_DEFAULT);

    echo $hash;
    echo "<br>";

    echo password_verify('nose', $hash);

    include "conexion.php";
    
    echo "<br>";
    $sql = "Select id FROM paquete order by id DESC LIMIT 1";

    // Pasamos el resultado
    $resultado = mysqli_query($con, $sql) or die (mysqli_error($con));

    // Pasamos a un array asociativo 
    $id_resultado = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

    $id = $id_resultado['id'];

    echo $id;

?>
</body>
</html>