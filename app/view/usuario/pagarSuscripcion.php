<?php
    if(isset($_SESSION["usuarioOK"])) {
        $usuario = $_SESSION["usuarioOK"];
        $pos = explode("-", $usuario);
?>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Pagar tu plan</h1>
    <p class="lead"> Pagalo con tu tarjeta de Débito o Crédito </p>
</div>

<div class="container">
    <div class="card-deck mb-3 text-center">
        <?php
        if(isset($_SESSION["planes"])) {
            $planes = $_SESSION["planes"];
            $posCampo = explode("-", $planes[$i])?>
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                  <h3 class="my-0 font-weight-normal"> Datos para la compra</h3> 
                </div>
                <div class="card-body d-flex flex-column">
                    <ul class="list-unstyled mt-3 mb-4">
                    <form class="w3-container" name="registrar" action="index.php?page=procesarPago" method="post" enctype="application/x-www-form-urlencoded">
                    <div class="w3-row">
                      <div class="w3-half w3-container">
                        <label>Usuario </label><input class="w3-input w3-round" type="text" name="usuario" value="<?php echo $pos[1]?>"> <br/>
                        <label>Nro. Doc </label><input class="w3-input w3-round" type="text" name="nroDoc" value="<?php echo $pos[3]?>"><br/>
                        <label>Mail </label><input class="w3-input w3-round" type="email" name="mail" value="<?php echo $pos[4]?>"><br/>
                     </div>
                      <div class="w3-half w3-container">
                        <label>Nro. Tarjeta </label><input class="w3-input w3-round" type="text" name="nroDoc" value=""> <br/>
                        <label>Fecha Vencimiento </label><input class="w3-input w3-round" type="text" name="usuario" value=""> <br/>
                        <label>Codigo Seguridad </label><input class="w3-input w3-round" type="email" name="mail" value=""> <br/>
                      </div>
                    </div>
                        <input type="hidden" name="idUsuario" value="<?php echo $pos[0]?>">
                    </form>
                    </ul>
                    <h1 class="card-title pricing-card-title">  <small class="text-muted">/ Pesos</small> </h1>
                    <input class="w3-button w3-blue-grey w3-round w3-center w3-hover-teal" type="submit" name="boton" value="PAGAR"/>
                </div>
            </div>
        <?php } ?>
    </div>
</div><br><br><br>

<?php } ?>

