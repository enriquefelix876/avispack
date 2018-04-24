<header style="background: rgba(0,0,0,0.9); width: 100%; position: fixed; z-index: 10;">
    <section style="width: 80%; margin: auto; overflow:hidden">

        <!--Sí no hay sesión iniciada-->
    <?php if(!isset($_SESSION["user_id"])):?>
        <div class="row">
        <div class="col sm-6">
            <a href=""><img src="img/logo2.png" alt="app"></a>
        </div>
        <div class="col sm-6 text-right" style="padding-top:45px">
            <a href="login.php"><button type="button" class="btn btn-light">Acceder</button></a>
            <a href="registro.php"><button type="button" class="btn btn-light">Registrar</button></a>
        </div>
        </div>
        
    <!--Sí hay una sesión iniciada-->
    <?php else:?>
    <div class="row">
        <div class="col sm-6">
            <a href=""><img src="img/logo2.png" alt="app"></a>
        </div>
        <div class="col sm-6 text-right" style="padding-top:45px">
            <a href="./php/logout.php">SALIR</a>
        </div>
        </div>
    <?php endif;?>
    </section>
</header>