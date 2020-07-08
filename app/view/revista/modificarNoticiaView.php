<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
    ?>
    <br>
    <br>
    <div class="w3-card-4 w3-display-middle " style="width:60%;">
        <div class="w3-container w3-teal w3-round">
            <h2 class="w3-center">Crear Noticia</h2>
        </div>
        <br>
        <form class="w3-container" name="registrarNoticia" action="interno.php?page=guardarNoticia" method="post" enctype="application/x-www-form-urlencoded">
            <!--div class="container">
                <label>Tipo de Producto: </label>
            </div>
                <div class="container">
                    <input id="diario" class="w3-radio" type="radio" name="codProducto" value="DIARIO">
                    <label>Diario</label>
                    <br>
                    <input id="revista" class="w3-radio" type="radio" name="codProducto" value="REVISTA">
                    <label>Revista</label>
                </div>
                <div class="container">
                    <label>Seleccionar Revista: </label>
                    <select id="revistaSel" name="revistaSel">  
                        <!?php
                        if(isset($_SESSION["revistas"])) {
                            $revistas = $_SESSION["revistas"];
                            $tam = sizeof($revistas);
                            for ($i = 1; $i <= $tam; $i++) {
                                $posCampo = explode("-", $revistas[$i]);
                            echo '<option value="'.$posCampo[0].'">'.$posCampo[2].'</option>'; 
                            }
                        }  
                        ?>
                    </select>
                </div>

                <div class="container">
                    <label>Seleccionar Secciones: </label>
                    <select id="seccionSel" name="seccionSel">  
                        <!?php
                        if(isset($_SESSION["secciones"])) {
                            $secciones = $_SESSION["secciones"];
                            $tam = sizeof($secciones);
                            for ($i = 1; $i <= $tam; $i++) {
                                $posCampo = explode("-", $secciones[$i]);
                            echo '<option value="'.$posCampo[0].'">'.$posCampo[1].'</option>'; 
                            }
                        }  
                        ?>
                    </select>
                </div-->
            <label>Titulo</label>
            <input class="w3-input w3-round" type="text" name="titulo"><br/>
            <label>Subtitulo</label>
            <input class="w3-input w3-round" type="text" name="subtitulo"><br/>
            <label>Informe</label>
            <textarea class="w3-input w3-round" type="text" name="informe" rows="4" cols="50"></textarea>
            <br/>
            <div>
            
            </div> 
            </br>
            <div>
            <input type="hidden" name="cod_contenidista" value="<?php echo $pos[0]?>">
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