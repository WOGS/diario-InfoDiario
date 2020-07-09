<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
    ?>
    <html>
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
            <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <div class="w3-container w3-center">
                <h1 class="w3-center">Panel de control Usuario</h1>
                <h2 class="w3-margin-left w3-margin-bottom" style="margin-top: 2%">Acciones posibles</h2>
                <div class="w3-center">
                    <div class="w3-bar">
                    <a href="interno.php?page=crearSeccion" class="w3-btn w3-red" style="text-decoration: none">Mis Facturas</a>
                    <a href="index.php?page=buscarUsuarioById&idUsiario=<?php echo $pos[0]?>" class="w3-btn w3-red" style="text-decoration: none">Editar Mis Datos</a>
                    </div>
                </div>
                <br><br><br>
                <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                    <h1 class="display-4">Planes</h1>
                    <p class="lead"> aca poner algo copado </p>
                </div>
                <div class="container">
                    <div class="card-deck mb-3 text-center">
                        <?php
                        if(isset($_SESSION["revistas"])) {
                        $revistas = $_SESSION["revistas"];
                        $tam = sizeof($revistas);
                        for ($i = 1; $i <= $tam; $i++) {
                            $posCampo = explode("-", $revistas[$i])?>
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal">1 mes</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li><?php echo $posCampo[2]?></li>
                                        <li><?php echo $posCampo[3]?></li>
                                        <li><?php echo$posCampo[4]?></li>
                                    </ul>
                                    <a type="button" class="btn btn-lg btn-block btn-primary" href="index.php?page=abrirSuscripcion">Suscribirse</a>
                                </div>
                            </div>
                        <?php } }?>
                    </div>
                </div>
            <script>
                var close = document.getElementsByClassName("closebtn");
                var i;
                for (i = 0; i < close.length; i++) {
                    close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                    }
                }
            </script>
        </body>
    </html>
<?php
}else{
header("Location: interno.php");
exit();
}
?>
