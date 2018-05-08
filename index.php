<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Avispack: Pedidos a domicilio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="includes/togglelogin.js"></script>
    <link rel="icon" type="image/png" href="img/icon.png" />
    <link rel="stylesheet" href="css/animate.css">
    <script src="js/wow.min.js" type="text/javascript"></script>
    <script>
        new WOW().init();
    </script>
    <style>
        body{
            background-image:url(img/dust_scratches.png);
        }
    </style>
</head>
<body>

<!--Encabezado-->
<?php include('includes/header.php'); ?>

<span class="fa fa-down fa-wp-dark center-text scroll-arrow" aria-hidden="true" style="font-size:28px;"></span>

<!--Cierre del encabezado-->

    <!--Primera vista-->
    <div class="container-fluid" style="padding-top: 127px">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/envios.png" alt="First slide">
                <div class="carousel-caption" style="background-color: rgba(0, 0, 0, 0.5)">
                    <h4 class="wow fadeIn" data-wow-duration="3s" style="text-shadow: 0px 1px 2px rgba(0,0,0,.3)">Entregas a todo Guaymas</h3>
                    <p class="h5 wow fadeIn" data-wow-duration="4s" style="text-shadow: 0px 1px 2px rgba(0,0,0,.3); padding-left: 15px;
                            padding-top: 10px">Ahora más facil a través de nuestra página</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--Cierre de la primera vista-->
    
    <!--Segunda Vista-->

    <div class="container" style="padding-top:110px">

        <div class="row">
            <div class="col-7">
                <p class="wow fadeIn" data-wow-offset="200" style="font-family: 'Open Sans', sans-serif; font-size: 40px; letter-spacing: -1px;
                color: #434343;">¿Por qué escoger Avispack?</p>
                <img src="img/separador1.jpg" alt="separador">
                <p class="wow fadeInLeft" data-wow-offset:"200" data-wow-duration:"3s" data-wow-delay:"40s" style="font-family: 'Open Sans', sans-serif; font-size: 20px;
                color: #434343; padding-top: 15px;">Son varias las razones por las que deberías elegir Avispack 
                como tu proveedor de pedidos a domicilio favorita, estas son algunas: </p>
                <img src="img/separador1.jpg" alt="separador">
                <ul style="font-family: 'Open Sans', sans-serif; font-size: 17px; color: #434343;">
                    <li class="p-2 wow fadeInLeft" data-wow-delay="1s">Seguridad, tus pedidos llegarán en buen estado a su destino siempre.</li>
                    <li class="p-2 wow fadeInLeft" data-wow-delay="2s">Disponibilidad, contamos con horarios de servicio de 9AM a 12AM</li>
                    <li class="p-2 wow fadeInLeft" data-wow-delay="3s">Accesibilidad, Contamos con las tarifas mas accesibles del mercado, adaptadas para 
                        ofrecer mejor satisfacción a cada tipo de Cliente.
                    </li>
                    <li class="p-2 wow fadeInLeft" data-wow-delay="4s">Puntualidad, ¡No te preocupes por las altas esperas! Con Avispack
                        tus pedidos llegarán siempre a tiempo a su destino.</li>
                    <li class="p-2 wow fadeInLeft" data-wow-delay="5s">Poderosa App, Nos mantenemos siempre actualizados y contamos con los mejores 
                        gestores de envíos del mercado.
                    </li>
                </ul>
                
            </div>
            <div class="col-5 text-center wow fadeIn">
                <p style="font-family: 'Open Sans', sans-serif; font-size: 40px; letter-spacing: -1px;
                color: #434343;">Clientes Satisfechos</p>
                <img src="img/separador1.jpg" alt="separador">
                <img class="p-3 text-center wow fadeIn" data-wow-offset="200" src="img/rosca.jpeg" alt="">       
            
            <blockquote class="pull-right">
                <p>Uso Avispack cada vez que me da flojera salir de casa.</p>
                <small>Recomendación del Señor <cite title="Nombre Apellidos">Oscar Carmona</cite></small>
            </blockquote>
            </div>
        </div>

    </div>

    <!--Cierre de la segunda vista-->


    <!--Tercera vista-->

    <div class="container" style="padding-top:80px; padding-bottom: 60px">
        <div class="row text-center">
            <div class="col wow bounceInDown" data-wow-offset="200">
                <h2>Una aplicación web diseñada para tí</h2>
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <p class="h5 p-4 wow bounceInDown" data-wow-delay="1s">Olvidate de tener que realizar llamadas telefonicas para realizar tus pedidos, con 
                    nuestra aplicación web, podrás realizar tus pedidos de una forma rápida y segura<p>
            </div>
        </div>

        <div class="row p-3">
            <div class="col wow bounceInLeft" data-wow-delay="3s" >
                <span class="h4"><img src="img/engrane.png" alt="Engrane">
                    Poderosas Aplicaciones</span>
                    <p class="p-2">Tus pedidos desde cualquier lugar, nuestra aplicación está disponible para Android, 
                        Apple, así como una versión Web.
                    </p>
            </div>
            <div class="col wow bounceInLeft" data-wow-delay="5s">
                <span class="h4"><img src="img/pc.png" alt="PC">
                    Interfaz Simple</span>
                    <p class="p-2">
                        Nuestra sencilla aplicación cuenta con todo lo necesario para que realices tus pedidos de una 
                        forma rápida e intuitiva.
                    </p>
            </div>
            <div class="col wow bounceInLeft" data-wow-delay="7s">
                <span class="h4"><img src="img/fast.png" alt="Fast">
                    Velocidad</span>
                    <p class="p-2">¿Páginas lentas? ¡Olvidate de eso! Nuestra aplicación está optimizada para 
                        ofrecerte la mejor experiencia en cuanto Velocidad.
                    </p>
            </div>
        </div>
    </div>

    <!--Cierre de la tercer vista-->

    <!--Descarga la App-->
    <div class="wow fadeInUp" data-wow-offset="50" style="background-image:url(img/fondodegradado.jpg)">
        <div class="container" style="padding-top: 140px; padding-bottom: 0px">
            <div class="row">
                <div class="col text-right wow fadeInUp" data-wow-delay="1s">
                    <img src="img/app2.png" alt="app">
                </div>
                <div class="col p-3 text-light">
                    <h2 style="text-shadow: 0px 1px 2px rgba(0,0,0,.3)">Descarga Nuestra App</h2><br>
                    <p class="h5" style="text-shadow: 0px 1px 2px rgba(0,0,0,.3)">
                        Lleva todo el poder de Avispack en tus manos, descarga nuestra App para poder realizar tus 
                        pedidos desde cualquier lugar.</p>
                    <div class="container">
                        <div class="row">
                            <img src="img/margen.png" alt="app">
                        </div>
                        <div class="row">
                            <img src="img/apple.png" alt="Apple image">
                            <p class="h5" style="text-shadow: 0px 1px 2px rgba(0,0,0,.3); padding-left: 15px;
                            padding-top: 10px">
                            Descarga para Iphone</p>
                        </div>

                        <div class="row">
                            <img src="img/margen.png" alt="app">
                        </div>
                        <div class="row">
                            <img src="img/android.png" alt="Android image">
                                <p class="h5" style="text-shadow: 0px 1px 2px rgba(0,0,0,.3); padding-left: 15px;
                                 padding-top: 10px">
                                Descarga para Android</p>
                        </div>

                        <div class="row">
                            <img src="img/margen.png" alt="app">
                        </div>
                        <div class="row">
                            <img src="img/windows.png" alt="Windows image">
                                <p class="h5" style="text-shadow: 0px 1px 2px rgba(0,0,0,.3); padding-left: 15px;
                                padding-top: 10px">
                                Descarga para Windows</p>
                        </div>

                        <div class="row">
                            <img src="img/margen.png" alt="app">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--Cierre de la descarga de la App-->
    <script src="js/valida_login.js"></script>
    <!--Footer-->
    <div style="clear: both;"></div>
    <?php include('includes/footer.php'); ?>
    </div>
    <!--Cierre del Footer-->
</body>
</html>