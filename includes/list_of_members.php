<?php

include "php/conexion.php";
			
$sql= "select * from user";
$query = $con->query($sql);


?>

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre completo</th>
      <th scope="col">Nombre de Usuario</th>
      <th scope="col">Correo Electronico</th>
      <th scope="col">Rol</th>
      <th scope="col">Fecha de Registro</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>

<?php
    while($datos=$query->fetch_array()){   
    
?>
    <tbody>
    <tr>
      <th scope="row"> <?php echo $datos["id"]?> </th>
      <td> <?php echo $datos["fullname"]?> </td>
      <td> <?php echo $datos["username"]?> </td>
      <td> <?php echo $datos["email"]?> </td>
      <td> <?php echo $datos["rol"]?> </td>
      <td> <?php echo $datos["created_at"]?> </td>
         
      <td> <a href="./info_usuario_admin.php?id=<?php echo $datos["id"]?>"> Editar</td></a>
    </tr>

    </tbody>
    <?php
    }
    ?>
</table>