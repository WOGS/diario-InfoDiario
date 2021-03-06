    <div class="w3-container w3-center">
        <h1 class="w3-center">Panel de control Productos</h1>
        <h2 class="w3-margin-left w3-margin-bottom" style="margin-top: 2%">Acciones posibles</h2>
        <div class="w3-center">
            <div class="w3-bar">
            <?php
                $usuario = $_SESSION["usuarioOK"];
                $pos = explode("-", $usuario);
            if($pos[2] == 1){?>
                <a href="interno.php?page=crearRevista" class="w3-btn btn-primary" style="text-decoration: none">Crear nuevo Producto</a>
            <?php }
            ?>
                <a href="interno.php?page=crearSeccion" class="w3-btn btn-primary" style="text-decoration: none">Crear Seccion</a>
                <a href="interno.php?page=crearNoticia" class="w3-btn btn-primary" style="text-decoration: none">Crear Noticia</a>
            <?php
            if($pos[2] == 1){?>
                <a href="interno.php?page=panelControl" class="w3-btn btn-primary" style="text-decoration: none" svalue="cancelar"> VOLVER </a>
            <?php }
            ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="w3-container">
            <div class="w3-container w3-light-grey w3-left-align w3-margin-bottom">
                <h3 style="text-shadow:1px 1px 0 #444">Lista de Productos</h3>
            </div>
            <table class="w3-table w3-bordered w3-centered w3-table-all">
                <tr>
                    <th>TITULO</th>
                    <th>DESCRIPCION</th>
                    <th>NUMERO</th>
                    <th>MODIFICAR PRODUCTO</th>
                    <th>BORRAR</th>
                </tr>
                <?php
                if(isset($_SESSION["revistas"])) {
                    $revistas = $_SESSION["revistas"];
                    $tam = sizeof($revistas);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posCampo = explode("-", $revistas[$i]);
                        echo "<tr>";
                        echo "<td>$posCampo[2]</td>";
                        echo "<td>$posCampo[4]</td>";
                        echo "<td>$posCampo[3]</td>";
                        if($pos[2] == 1){
                        echo "<td>";
                            echo"<a class='w3-padding w3-xlarge w3-text-teal glyphicon  glyphicon-pencil w3-center' href='interno.php?page=buscarProductoById&idProducto=$posCampo[0]'/>";
                        echo "</td>";
                        echo "<td>";
                            echo"<a class='w3-padding w3-xlarge w3-text-teal glyphicon glyphicon-trash w3-center'href='#'/>";
                        echo "</td>";
                        } else {
                            echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-teal  glyphicon glyphicon-pencil w3-center w3-disabled' href='#'/>";
                            echo "</td>";
                               echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-teal glyphicon glyphicon-trash  w3-center w3-disabled'href='#'/>";
                            echo "</td>";
                        }
                        echo"</tr>";
                    }
                }
                if(isset($_SESSION["sinDatosRevistas"])) {
                    echo"<div class='alert warning'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong> No hay datos para mostrar en la tabla
                            </div>";
                    unset($_SESSION["sinDatosRevistas"]);   
                }
                ?>
            </table>
        </div>
                <br><br><br>
        <div class="w3-container">
            <div class="w3-container w3-light-grey w3-left-align w3-margin-bottom">
                <h3 style="text-shadow:1px 1px 0 #444">Lista de Secciones</h3>
            </div>
            <table class="w3-table w3-bordered w3-centered w3-table-all">
                <tr>
                    <th>PRODUCTO</th>
                    <th>SECCION</th>
                    <th>DESCRIPCION</th>
                    <th>PUBLICAR</th>
                    <th>MODIFICAR SECCION</th>
                    <th>MODIFICAR ESTADO</th>
                    <th>BORRAR</th>
                </tr>
                <?php
                if(isset($_SESSION["secciones"])) {
                    $secciones = $_SESSION["secciones"];
                    $tam = sizeof($secciones);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posSeccion = explode("-", $secciones[$i]);
                        echo "<tr>";
                        echo "<td>$posSeccion[4]</td>";
                        echo "<td>$posSeccion[1]</td>";
                        echo "<td>$posSeccion[2]</td>";
                        echo "<td>$posSeccion[3]</td>";
                        if($pos[2] == 1){
                        echo "<td>";
                            echo"<a class='w3-padding w3-xlarge w3-text-teal glyphicon  glyphicon-pencil w3-center' href='interno.php?page=buscarSeccionById&idSeccion=$posSeccion[0]'/>";
                        echo "</td>";
                        echo "<td>";
                            echo"<a class='w3-padding w3-xlarge w3-text-teal  glyphicon glyphicon-check w3-center' href='interno.php?page=cambiarEstadoSeccion&idSeccion=$posSeccion[0]&idEstado=$posSeccion[3]'/>";
                        echo "</td>";
                        echo "<td>";
                            echo"<a class='w3-padding w3-xlarge w3-text-teal glyphicon glyphicon-trash w3-center'href='interno.php?page=eliminarSeccion&idSeccion=$posSeccion[0]'/>";
                        echo "</td>";
                        } else {
                            echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-teal  glyphicon glyphicon-pencil w3-center w3-disabled' href='#'/>";
                            echo "</td>";
                            echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-teal  glyphicon glyphicon-check w3-center w3-disabled' href='#'/>";
                            echo "</td>";
                            echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-teal glyphicon glyphicon-trash w3-center w3-disabled'href='#'/>";
                            echo "</td>";
                        }
                        
                        echo"</tr>";
                    }
                }
                if(isset($_SESSION["sinDatosSecciones"])) {
                    echo"<div class='alert warning'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong> No hay datos para mostrar en la tabla
                            </div>";
                    unset($_SESSION["sinDatosSecciones"]);
                }
                if(isset($_SESSION["seccionEliminada"])) {
                    echo"<div class='alert success'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Success!</strong>Seccion Eliminada correctamente</div>";
                    unset($_SESSION["seccionEliminada"]);
                } ?>
            </table>
        </div>
                <br>
                <br>
                <br>
        <div class="w3-container">
            <div class="w3-container w3-light-grey w3-left-align w3-margin-bottom">
                <h3 style="text-shadow:1px 1px 0 #444">Lista de Noticias</h3>
            </div>
            <table class="w3-table w3-bordered w3-centered w3-table-all">
                <tr>
                    <th>PRODUCTO</th>
                    <th>SUBPRODUCTO</th>
                    <th>SECCION</th>
                    <th>TITULO</th>
                    <th>SUBTITULO</th>
                    <th>PUBLICAR</th>
                    <th>SUBIR IMAGEN</th>
                    <th>MODIFICAR NOTICIA</th>
                    <th>MODIFICAR ESTADO</th>
                    <th>VISTA GRATUITA</th>
                    <th>BORRAR</th>
                </tr>
                <?php
                if(isset($_SESSION["noticias"])) {
                    $noticias = $_SESSION["noticias"];
                    $tam = sizeof($noticias);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posNoticia = explode("-", $noticias[$i]);
                        echo "<tr>";
                        echo "<td>$posNoticia[4]</td>";
                        echo "<td>$posNoticia[6]</td>";
                        echo "<td>$posNoticia[5]</td>";
                        echo "<td>$posNoticia[1]</td>";
                        echo "<td>$posNoticia[2]</td>";
                        echo "<td>$posNoticia[3]</td>";
                        if($pos[2] == 1){
                            echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-teal  glyphicon glyphicon-picture w3-center w3-disabled' href='#'/>";
                                echo "</td>";
                            echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-teal  glyphicon glyphicon-pencil w3-center w3-disabled' href='#'/>";
                            echo "</td>";
                            echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-teal  glyphicon glyphicon-check w3-center' href='interno.php?page=cambiarEstadoNoticia&idNoticia=$posNoticia[0]&idEstado=$posNoticia[3]'/>";
                            echo "</td>";
                            if (strcmp($posNoticia[7],"SI")==0){
                                echo "<td>";
                                    echo"<a class='w3-padding w3-xlarge w3-text-teal glyphicon glyphicon-ok w3-center 'href='interno.php?page=cambiarEstadoLibre&idNoticia=$posNoticia[0]&idEstado=$posNoticia[7]'/>";
                                echo "</td>";}
                                else{
                                echo "<td>";
                                    echo"<a class='w3-padding w3-xlarge w3-text-teal glyphicon glyphicon-lock w3-center 'href='interno.php?page=cambiarEstadoLibre&idNoticia=$posNoticia[0]&idEstado=$posNoticia[7]'/>";
                                echo "</td>"; }
                            echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-teal glyphicon glyphicon-trash w3-center' href='interno.php?page=eliminarNoticia&idNoticia=$posNoticia[0]'/>";
                            echo "</td>";
                            } else {
                                echo "<td>";
                                    echo"<a class='w3-padding w3-xlarge w3-text-teal  glyphicon glyphicon-picture w3-center' href='interno.php?page=buscarNoticiaImagenById&idNoticia=$posNoticia[0]'/>";
                                echo "</td>";
                                echo "<td>";
                                    echo"<a class='w3-padding w3-xlarge w3-text-teal  glyphicon glyphicon-pencil w3-center' href='interno.php?page=buscarNoticiaById&idNoticia=$posNoticia[0]'/>";
                                echo "</td>";
                                echo "<td>";
                                    echo"<a class='w3-padding w3-xlarge w3-text-teal  glyphicon glyphicon-check w3-center w3-disabled' href='#'/>";
                                echo "</td>";
                                if (strcmp($posNoticia[7],"SI")==0){
                                echo "<td>";
                                    echo"<a class='w3-padding w3-xlarge w3-text-teal glyphicon glyphicon-ok w3-center  w3-disabled'href='#'/>";
                                echo "</td>";}
                                else{
                                echo "<td>";
                                    echo"<a class='w3-padding w3-xlarge w3-text-teal glyphicon glyphicon-lock w3-center  w3-disabled'href='#'/>";
                                echo "</td>"; }                               
                                echo "<td>";
                                    echo"<a class='w3-padding w3-xlarge w3-text-teal glyphicon glyphicon-trash w3-center  w3-disabled'href='#'/>";
                                echo "</td>";
                        }
                        echo"</tr>";
                    }
                }
                if(isset($_SESSION["sinDatosNoticias"])) {
                    echo"<div class='alert warning'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong> No hay datos para mostrar en la tabla
                            </div>";
                    unset($_SESSION["noticias"]);
                    unset($_SESSION["sinDatosNoticias"]);
                }
                if(isset($_SESSION["noticiaEliminada"])) {
                    echo"<div class='alert success'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Success!</strong>Noticia Eliminada correctamente</div>";
                    unset($_SESSION["noticiaEliminada"]);
                }

                ?>
            </table>
        </div>
    </div>
  

