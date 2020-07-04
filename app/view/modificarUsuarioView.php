<?php if(isset($_SESSION["usuariosModif"])) {
    $usuario = $_SESSION["usuariosModif"];
    $pos = explode("-", $usuario);
?>

<div class="w3-card-4 w3-display-middle " style="width:25%;">
    <div class="w3-container w3-teal w3-round">
        <h2 class="w3-center">Modificar Usuario</h2>
    </div>
    <br>
    <form class="w3-container" name="registrar" action="interno.php?page=modifDatosUsuario" method="post" enctype="application/x-www-form-urlencoded">
        <label>Usuario </label><input class="w3-input w3-round" type="text" name="usuario" value="<?php echo $pos[2]?>"> <br/>
        <label>Clave </label><input class="w3-input w3-round" type="password" name="clave" value="<?php echo $pos[4]?>"><br/>
        <label>Nro. Doc </label><input class="w3-input w3-round" type="text" name="nroDoc" value="<?php echo $pos[1]?>"><br/>
        <label>Telefono </label><input class="w3-input w3-round" type="text" name="telefono" value="<?php echo $pos[5]?>"><br/>
        <label>mail </label><input class="w3-input w3-round" type="email" name="mail" value="<?php echo $pos[3]?>"><br/>
        <input type="hidden" name="idUsuario" value="<?php echo $pos[0]?>">
        <div class="container">
            <label>Tipo de usuario:
        </div>
        <?php
        if($pos[6]==1){ ?>
            <div class="container w3-margin-bottom">
                <input id="lector" class="w3-radio w3-margin-bottom" type="radio" name="codUsuario" value="3">
                <label>Lector</label>
                <br>
                <input id="conte" class="w3-radio w3-margin-bottom" type="radio" name="codUsuario" value="2">
                <label>Contenidista</label>
            </div>
        <?php }
            if($pos[6]==2){ ?>
            <div class="container w3-margin-bottom">
                <input id="lector" class="w3-radio w3-margin-bottom" type="radio" name="codUsuario" value="3">
                <label>Lector</label>
                <br>
                <input id="admin" class="w3-radio w3-margin-bottom" type="radio" name="codUsuario" value="1">
                <label>Administrador</label>
            </div>
        <?php }
            if($pos[6]==3){ ?>
        <div class="container w3-margin-bottom">
            <input id="conte" class="w3-radio w3-margin-bottom" type="radio" name="codUsuario" value="2">
            <label>Contenidista</label>
            <br>
            <input id="admin" class="w3-radio w3-margin-bottom" type="radio" name="codUsuario" value="1">
            <label>Administrador</label>
        </div>
    <?php } ?>

        <div class="container">
            <input class="w3-button w3-blue-grey w3-round w3-center" type="submit" name="boton" value="ENVIAR">
            <a href="interno.php?page=panelControl" class="w3-button w3-blue-grey w3-round w3-center"  value="cancelar">CANCELAR</a>
        </div>
    </form>
</div>
<?php } ?>