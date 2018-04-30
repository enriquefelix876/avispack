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
?>
</body>
</html>