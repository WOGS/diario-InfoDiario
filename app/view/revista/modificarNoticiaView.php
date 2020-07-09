<?php
if(isset($_SESSION["noticiaModif"])) {
    $noticia = $_SESSION["noticiaModif"];
    $posNoticia = explode("-", $noticia);
    ?>
    <br>
    <br>
    <div class="w3-card-4 w3-display-middle " style="width:50%;">
        <div class="w3-container w3-teal w3-round">
            <h2 class="w3-center">Modificar Noticia</h2>
        </div>
        <br>
        <form class="w3-container" name="modificarNoticia" action="interno.php?page=modificarNoticia" method="post" enctype="application/x-www-form-urlencoded">
             <label>Titulo</label>
                <input class="w3-input w3-round" type="text" name="titulo" value="<?php echo $posNoticia[1]?>"><br/>
            <label>Subtitulo</label>
                <input class="w3-input w3-round" type="text" name="subtitulo" value="<?php echo $posNoticia[2]?>"><br/>
            <label>Informe</label>
                <textarea class="w3-input w3-round" type="text" name="informe" rows="4" cols="50"><?php echo $posNoticia[3]?></textarea>
            <br/>
            </br>
            <div>
                <input type="hidden" name="idNoticia" value="<?php echo $posNoticia[0]?>">
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