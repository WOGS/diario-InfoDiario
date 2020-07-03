<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
    ?>
    <br>
    <br>
    <div class="w3-card-4 w3-display-middle " style="width:25%;">
        <div class="w3-container w3-teal w3-round">
            <h2 class="w3-center">Crear Revista</h2>
        </div>
        <br>
        <form class="w3-container" name="registrar" action="interno.php?page=guardarRevista" method="post" enctype="application/x-www-form-urlencoded">
            <label>Titulo</label>
            <input class="w3-input w3-round" type="text" name="titulo"><br/>
            <label>Nro. Revista</label>
            <input class="w3-input w3-round" type="text" name="nroRevista"><br/>
            <label>Descripcion</label>
            <textarea class="w3-input w3-round" type="text" name="descripcion" rows="4" cols="50"></textarea>
            <br/>
            <input type="hidden" name="idUsuario" value="<?php echo $pos[0]?>">
            <div class="w3-center">
            <div class="w3-bar">
                <input class="w3-button w3-blue-grey w3-round w3-center" type="submit" name="boton" value="GRABAR">
                <a href="interno.php?page=buscarNoticias" class="w3-button w3-blue-grey w3-round w3-center" style="text-decoration: none" value="cancelar"> VOLVER </a>
            </div>
            </div>
        </form>
    </div>
    <?php
}
?>