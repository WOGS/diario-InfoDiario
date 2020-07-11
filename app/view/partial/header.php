<?php
session_start();
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>InfoNete - Diario Online</title>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="img/png" href="view/img/favdiario.ico"/>
        <!-- css -->
        <link rel="stylesheet" href="view/css/bootstrap.min.css">
        <link rel="stylesheet" href="view/css/estilos.css">
        <link rel="stylesheet" href="view/css/style.css">
        <link rel="stylesheet" href="view/css/w3.css">
        <!-- js -->
        <script type="text/javascript" src="view/js/jquery-3.5.1.js"></script>

            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/pricing/">

            <!-- Bootstrap core CSS -->
            <link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

            <!-- Favicons -->
            <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
            <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
            <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
            <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
            <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
            <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
            <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
            <meta name="theme-color" content="#563d7c">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <style>
                .bd-placeholder-img {
                    font-size: 1.125rem;
                    text-anchor: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                }

                @media (min-width: 768px) {
                    .bd-placeholder-img-lg {
                        font-size: 3.5rem;
                    }
                }
            </style>


    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <span>
                    <svg class="bi bi-info-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                        <circle cx="8" cy="4.5" r="1"/>
                    </svg>
                </span> InfoNete
            </a>
            <div class="collapse navbar-collapse align-content-center">
                <ul class="navbar-nav ml-auto align-content-center">
                    <li class="nav-item active align-content-center">
                        <?php if(isset($_SESSION["usuarioOK"])) { ?>
                            <label>Bienvenido <?php echo $pos[1];?></label>
                        <?php } ?>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <?php if(isset($_SESSION["usuarioOK"])) {
                    if($pos[2] == 3){
                    ?>
                    <li class="nav-item">                       
                        <a class="nav-link" href="index.php?page=panelUsuario">Suscripciones</a>
                    </li>  
                    <?php 
                    } 
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="view/logOut.php">Salir</a>
                    </li> 
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">