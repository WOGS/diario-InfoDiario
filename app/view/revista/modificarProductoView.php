<?php
if(isset($_SESSION["productoModif"])) {
    $producto = $_SESSION["productoModif"];
    $pos = explode("-", $producto);
    ?>
    <br>
    <br>
    <div class="w3-card-4 w3-display-middle " style="width:25%;">
        <div class="w3-container w3-teal w3-round">
            <h2 class="w3-center">Modificar Producto</h2>
        </div>
        <br>
        <form class="w3-container" name="registrar" action="interno.php?page=modificarProducto" method="post" enctype="application/x-www-form-urlencoded">
            <label>Titulo</label>
            <input class="w3-input w3-round" type="text" name="titulo" value="<?php echo $pos[1]?>"><br/>
            <label>Descripcion</label>
            <textarea class="w3-input w3-round" type="text" name="descripcion" rows="4" cols="50"><?php echo $pos[2]?></textarea>
            <br/>
            <input type="hidden" name="idProducto" value="<?php echo $pos[0]?>">
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