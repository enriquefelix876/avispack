<div class="container">

<h2 style="padding-top:140px;">Bienvenido, <?php echo $_SESSION["user_fullname"]?></h2>

<?php

switch ($_SESSION["user_rol"]) {

    case "Administrador":

    echo "<center><h3>Lista de Usuarios</h3></center>";
    include('list_of_members.php');

        break;

    case "Miembro":
    echo "Te has logeado como Miembro Normal: ";
    echo "<br>";
    echo $_SESSION["user_id"];
    echo "<br>";
    echo $_SESSION["user_fullname"];
    echo "<br>";    
    echo $_SESSION["user_username"];
    echo "<br>";
    echo $_SESSION["user_email"];
    echo "<br>";
    echo $_SESSION["user_password"];
    echo "<br>";
    echo $_SESSION["user_rol"];
    echo "<br>";
    echo $_SESSION["user_phonenumber"];
    echo "<br>";
    echo $_SESSION["user_created_at"];
        break;

    case "Repartidor":

    echo "Te has logeado como Repartidor: ";
    echo "<br>";
    echo $_SESSION["user_id"];
    echo "<br>";
    echo $_SESSION["user_fullname"];
    echo "<br>";    
    echo $_SESSION["user_username"];
    echo "<br>";
    echo $_SESSION["user_email"];
    echo "<br>";
    echo $_SESSION["user_password"];
    echo "<br>";
    echo $_SESSION["user_rol"];
    echo "<br>";
    echo $_SESSION["user_phonenumber"];
    echo "<br>";
    echo $_SESSION["user_created_at"];
        break;
}
?>
</div>