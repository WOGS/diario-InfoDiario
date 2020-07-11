    <div class="w3-container w3-center">
        <h1 class="w3-center">Panel de control Usuario</h1>
        <h2 class="w3-margin-left w3-margin-bottom" style="margin-top: 2%">Acciones posibles</h2>
        <?php
            $usuario = $_SESSION["usuarioOK"];
            $pos = explode("-", $usuario);
                ?>
        <div class="w3-center">
            <div class="w3-bar">
            <a href="interno.php?page=crearSeccion" class="w3-btn w3-red" style="text-decoration: none">Mis Facturas</a>
            <a href="index.php?page=buscarUsuarioById&idUsiario=<?php echo $pos[0]?>" class="w3-btn w3-red" style="text-decoration: none">Editar Mis Datos</a>
            </div>
        </div>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Planes</h1>
            <p class="lead"> Elegí tus publicaciones de InfoNete favoritas y accedé al mejor análisis periodístico en todo momento y lugar </p>
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
                          <h3 class="my-0 font-weight-normal"><?php echo $posCampo[2]?></h3>
                        </div>
                        <div class="card-body d-flex flex-column">
                             <ul class="list-unstyled mt-3 mb-4">
                                <li> <?php echo $posCampo[4]?> </li>
                                <li> </li>
                                <li> </li>
                            </ul>
                            <a type="button" class="btn btn-lg btn-block btn-primary mt-auto" href="index.php?page=abrirSuscripcion&idProducto=<?php echo $posCampo[0]?>">Suscribirse</a>
                        </div>
                    </div>
                <?php } }?>
            </div>
        </div><br><br><br>