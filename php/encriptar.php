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

    $opciones = [
        'cost' => 8,
    ];

    $hash = password_hash("roscavela", PASSWORD_BCRYPT, $opciones);
    $hash2 = password_hash("roscavela", PASSWORD_BCRYPT, $opciones);
    
    echo $hash;
    echo "<br>";
    echo $hash2;
    echo "<br>";

    if (password_verify('roscavel', $hash)) {
        echo '¡La contraseña es válida!';
    } else {
        echo 'La contraseña no es válida.';
    }
?>
</body>
</html>