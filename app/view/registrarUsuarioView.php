
<div class="w3-card-4 w3-display-middle " style="width:65%;max-height: 120%">
    <div class="w3-container w3-blue-grey w3-round">
        <h2 class="w3-center">Alta <?php echo$_SESSION["usuarioAlta"] ?></h2>
    </div>
    <br>
    <form class="w3-container" name="registrar" action="<?php echo $_SESSION["actionReg"] ?>.php?page=guardarUsuario" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <div class="w3-container">
                <label>Usuario </label><input class="w3-input w3-round" type="text" name="usuario"><br/>
                <label>Clave </label><input class="w3-input w3-round" type="password" name="clave"><br/>
                <label>Nro. Doc </label><input class="w3-input w3-round" type="text" name="nroDoc"><br/>
            </div>
            <div class="w3-container">
                <label>Telefono </label><input class="w3-input w3-round" type="text" name="telefono"><br/>
                <label>Mail </label><input class="w3-input w3-round" type="email" name="mail"><br/>
                <?php
                    if($_SESSION["usuarioAlta"]!="Usuario"){ ?>
                        <div class="container">
                            <label>Tipo de usuairo: </label>
                        </div>
                        <div class="container">
                            <div class="w3-container">
                                <input id="admin" class="w3-radio w3-margin-bottom" type="radio" name="codUser" value="1">
                                <label>Administrador</label>
                            </div>
                            <div class="w3-container">
                                <input id="conte" class="w3-radio w3-margin-bottom" type="radio" name="codUser" value="2">
                                <label>Contenidista</label>
                            </div>
                        </div>
                 <?php } ?>
            </div>
        </div>
        <div class="container">
            <div class="w3-center w3-margin-bottom">
            <input class="w3-button w3-blue-grey w3-round w3-center" type="submit" name="boton" value="ENVIAR">
            <a href="interno.php?page=panelControl" style="text-decoration: none" class="w3-button w3-blue-grey w3-round w3-center"  value="cancelar"> CANCELAR </a>
            </div>
        </div>
    </form>
</div>