<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Planes</h1>
    <p class="lead"> Elegi el plan que se ajusta a tus necesidades, promociones imperdibles </p>
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
                  <h3 class="my-0 font-weight-normal"><?php echo $posCampo[1]; 
                    if ($posCampo[1] == 1){
                    echo  " Mes" ;
                    } else {    
                            echo  " Meses";
                        } 
                    ?></h3> 
                </div>
                <form class="w3-container" name="registrar" action="index.php?page=pagarSuscripcion" method="post" enctype="application/x-www-form-urlencoded">
                    <div class="card-body d-flex flex-column">
                        <h1 class="card-title pricing-card-title"> <?php echo $posCampo[3]?> <small class="text-muted">/ Pesos</small> </h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li> <?php echo $posCampo[2]?> </li>
                        </ul>
                        <input type="hidden" name="id" value="<?php echo $posCampo[0]?>">
                        <input type="hidden" name="precio" value="<?php echo $posCampo[3]?>">
                        <input class='btn btn-lg btn-block btn-primary mt-auto' type="submit" value="PAGAR"/>
                    </div>
                </form>
                </div>
        <?php }
            } ?>
    </div>
    <div class="w3-container w3-center w3-margin-bottom"> 
        <a href="index.php?page=panelUsuario" class="w3-btn w3-red" style="text-decoration: none" svalue="cancelar"> VOLVER </a>
    </div>
</div><br><br><br>

