<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
    ?>
    <br>
    <br>
    <div class="w3-card-4 w3-display-middle " style="width:60%;">
        <div class="w3-container w3-blue-grey w3-round">
            <h2 class="w3-center">Subir Imagen</h2>
        </div>
        <br>
            <section>
            <div class="container-fluid p-3 my-3 bg-white text-black">
                
                <div class="text-center">
                    <p class="pre-wrap masthead-subheading font-weight-light mb-0">Subir imagen para la Noticia</p>
                </div>
            
                <div class="justify-content-center">
                    <FORM ACTION="view/revista/cargarImagen.php" METHOD="POST" ENCTYPE="multipart/form-data">
                        <br>
                        <INPUT class="w3-button w3-blue-grey w3-round" TYPE="file" NAME="file">
                        <br>
                        <br>
                        
                        <div class="w3-container w3-center w3-margin-bottom">
                            <input class="w3-button w3-blue-grey w3-round" type="submit" value="Subir imagen">
                            <a href="interno.php?page=buscarSecciones" class="w3-button w3-blue-grey w3-round w3-center" style="text-decoration: none" value="cancelar"> VOLVER </a>
                        </div>
                        </div>
                    </FORM>
                </div>
            </div>
            </section>
            <br/>
    </div>
    <?php
}
?>