<?php

include "php/conexion.php";
			
$sql= "select * from user";
$query = $con->query($sql);


?>

<div class="container" style="padding-top:20px; padding-bottom: 20px">
  <div class="row">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
        <input type="text" id="nombre" name="nombre">
        <button type="submit">Buscar</button>
    </form>
  </div>
</div>

<?php 

  if(isset($_GET['nombre'])){
  $sql= "select * from user where fullname LIKE '%$_GET[nombre]%' or username LIKE '%$_GET[nombre]%'";
  $query = $con->query($sql);
  }

?>

<!--Si la busqueda arroja resultados -->
<?php
$resultado3 = mysqli_query($con, $sql) or die (mysqli_error($con));

//Se comprueba si hay registros en camino
$id_resultado3 = mysqli_fetch_array($resultado3, MYSQLI_ASSOC);
$id = $id_resultado3['id'];

if($id==null){
    echo "</br>";
    echo "<img src=\"img/result-not-found-1.png\">";
}else{
?>

<table class="table">
  <thead>
    <tr class="table-secondary">
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
    <tr class¨="table-primary">
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
<?php
}?>

  <a href="includes/reporte_usuarios.php" target="_blank"><img src="img/pdf.png" alt=""></a>
