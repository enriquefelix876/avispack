<div class="container">
    <div class="row" style="padding-top:20px">
        <div class="col-3">
            
            <div class="row">
                <img style="padding-top:20px" src="./img/user_man.png" alt="Imagen de Usuario">
            </div>

            <div class="row">
                <p class="h5 p-2"><?php echo $_SESSION["user_fullname"];?></p>
            </div>

            <div class="row">
                <a><button style="width:150px" type="button" class="btn btn-primary">Envios</button></a>
            </div>

            <div class="row" style="padding-top:15px">
                <a href="./editar_usuario.php?id=<?php echo $_SESSION["user_id"]?>"><button style="width:150px" type="button" 
                class="btn btn-success">Editar Perfil</button></a>
            </div>

        </div>

        <div class="col">
            <table class="table">
                <tbody>
                    <tr>
                        <th style="width:250px" class="table-primary" scope="row">ID</th>
                        <td class="table-secondary"><?php echo $_SESSION["user_id"]?></td>
                    </tr>
                    <tr>
                        <th class="table-primary"scope="row">Nombre Completo</th>
                        <td class="table-secondary"><?php echo $_SESSION["user_fullname"]?></td>
                    </tr>
                    <tr>
                        <th class="table-primary" scope="row">Nombre de Usuario</th>
                        <td class="table-secondary"><?php echo $_SESSION["user_fullname"]?></td>
                    </tr>
                    <tr>
                        <th class="table-primary" scope="row">Correo Electronico</th>
                        <td class="table-secondary"><?php echo $_SESSION["user_email"]?></td>
                    </tr>
                    <tr>
                        <th class="table-primary" scope="row">Rol</th>
                        <td class="table-secondary"><?php echo $_SESSION["user_rol"]?></td>
                    </tr>
                    <tr>
                        <th class="table-primary" scope="row">Numero Telefonico</th>
                        <td class="table-secondary"><?php echo $_SESSION["user_phonenumber"]?></td>
                    </tr>
                    <tr>
                        <th class="table-primary" scope="row">Fecha de Registro</th>
                        <td class="table-secondary"><?php echo $_SESSION["user_created_at"]?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>