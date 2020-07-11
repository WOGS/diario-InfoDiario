<?php 
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">

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

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Planes</h1>
    <p class="lead"> aca poner algo copado </p>
</div>

<div class="container">
    <div class="card-deck mb-3 text-center">
        <?php
        if(isset($_SESSION["planes"])) {
        $planes = $_SESSION["planes"];
        $tam = sizeof($planes);
        for ($i = 1; $i <= $tam; $i++) {
            $posCampo = explode("-", $planes[$i])?>
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                  <h3 class="my-0 font-weight-normal"><?php echo $posCampo[1] . "Mes/Meses"?></h3> 
                </div>
                <div class="card-body d-flex flex-column">
                    <h1 class="card-title pricing-card-title"> <?php echo $posCampo[3]?> <small class="text-muted">/ Pesos</small> </h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li> <?php echo $posCampo[2]?> </li>
                    </ul>
                    <?php echo "<a type='button' class='btn btn-lg btn-block btn-primary mt-auto' href='index.php?page=pagarSuscripcion&idSuscrip=1&precio=1oo'>Pagar</a> " ?>
                </div>
            </div>
        <?php }
            } ?>
    </div>
</div><br><br><br>
</body>
</html>
