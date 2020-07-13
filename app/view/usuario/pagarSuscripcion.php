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
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                  <h3 class="my-0 font-weight-normal"> Datos para la compra</h3> 
                </div>
                <div class="card-body d-flex flex-column">
                    <form class="w3-container" name="pagarSuscripcion" action="index.php?page=procesarPago" method="post" enctype="application/x-www-form-urlencoded">
                    <ul class="list-unstyled mt-3 mb-4">
                    <div class="w3-row">
                      <div class="w3-half w3-container">
                        <label>Usuario </label><input class="w3-input w3-round" type="text" name="usuario" value="<?php echo $pos[1]?>"> <br/>
                        <label>Nro. Doc </label><input class="w3-input w3-round" type="text" name="nroDoc" value="<?php echo $pos[3]?>"><br/>
                        <label>Mail </label><input class="w3-input w3-round" type="email" name="mail" value="<?php echo $pos[4]?>"><br/>
                     </div>
                      <div class="w3-half w3-container">
                        <label>Nro. Tarjeta </label><input class="w3-input w3-round" type="text" maxlength="16" name="nroTarjeta" value=""> <br/>
                        <label>Fecha Vencimiento </label><input class="w3-input w3-round" type="date" name="fechaVencim" value=""> <br/>
                        <label>Codigo Seguridad </label><input class="w3-input w3-round" type="password" name="codSeguridad"  maxlength="3" value=""> <br/>
                      </div>
                    </div>
                        <input type="hidden" name="idUsuario" value="<?php echo $pos[0]?>">
                    </ul>
                    <h1 class="card-title pricing-card-title"> $ <?php echo $_SESSION["precio"]?> <small class="text-muted">/ Pesos</small> </h1>
                    <input type="hidden" name="idUsuario" value="<?php echo $pos[0]?>">
                    <input class="w3-button w3-blue-grey w3-round w3-center w3-hover-teal" type="submit" name="boton" value="PAGAR"/>
                    <a href="index.php?page=abrirSuscripcion&idProducto=<?php echo $_SESSION["idProducto"]?>" class="w3-btn w3-round w3-red" style="text-decoration: none" svalue="cancelar"> VOLVER </a>
                    </form>
                </div>
            </div>
    </div>
</div><br><br><br>
<?php } ?>

