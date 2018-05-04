<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    echo "<br>";
    
    $num = 5;
    $ubicación = 'árbol';

    $formato = 'Hay %d monos en el %s';
    echo sprintf($formato, $num, $ubicación);

?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>