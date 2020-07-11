
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
                <div class="card-body d-flex flex-column">
                    <h1 class="card-title pricing-card-title"> <?php echo $posCampo[3]?> <small class="text-muted">/ Pesos</small> </h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li> <?php echo $posCampo[2]?> </li>
                    </ul>
                    <a type="button" class="btn btn-lg btn-block btn-primary mt-auto" href="index.php?page=pagarSuscripcion&idSuscrip=<?php echo $posCampo[0]?>">Pagar</a>
                </div>
            </div>
        <?php } }?>
    </div>
</div><br><br><br>

