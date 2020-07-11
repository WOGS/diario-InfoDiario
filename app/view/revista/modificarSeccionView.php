<?php
if(isset($_SESSION["seccionModif"])) {
    $seccion = $_SESSION["seccionModif"];
    $pos = explode("-", $seccion);
    ?>
    <br>
    <br>
    <div class="w3-card-4 w3-display-middle " style="width:25%;">
        <div class="w3-container w3-blue-grey w3-round">
            <h2 class="w3-center">Modificar Seccion</h2>
        </div>
        <br>
        <form class="w3-container" name="registrarSeccion" action="interno.php?page=modificarSeccion" method="post" enctype="application/x-www-form-urlencoded">
            <label>Nombre de Seccion</label>
                <input class="w3-input w3-round" type="text" name="nombre" value="<?php echo $pos[1]?>"><br/>
            <label>Descripcion</label>
                <textarea class="w3-input w3-round" type="text" name="descripcion" rows="4" cols="50"> <?php echo $pos[2]?></textarea>
            </br>
            </br>
            <div>
                <input type="hidden" name="idSeccion" value="<?php echo $pos[0]?>">
            </div>
            <div class="w3-center">
                <div class="w3-bar">
                <input class="w3-button w3-blue-grey w3-round w3-center" type="submit" name="boton" value="GRABAR"/> 
                <a href="interno.php?page=buscarNoticias" class="w3-button w3-blue-grey w3-round w3-center" style="text-decoration: none" value="cancelar"> VOLVER </a>
                </div>
            </div>
        </form>
    </div>
    <?php
}
?>