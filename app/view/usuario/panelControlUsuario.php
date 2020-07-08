<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
    ?>
    <html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <body>
    <div class="w3-container w3-center">
        <h1 class="w3-center">Panel de control Usuario</h1>
        <h2 class="w3-margin-left w3-margin-bottom" style="margin-top: 2%">Acciones posibles</h2>
        <div class="w3-center">
            <div class="w3-bar">                           
                <a href="interno.php?page=crearSeccion" class="w3-btn w3-red" style="text-decoration: none">Mis Facturas</a>
                <a href="interno.php?page=buscarUsuarioById&idUsiario=<?php echo $pos[0]?>" class="w3-btn w3-red" style="text-decoration: none">Editar Mis Datos</a>               
            </div>
        </div>
        <?php if(isset($_SESSION["usuarioActualizado"])) {
                    echo"<div class='alert warning'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong> 'Sus Datos se veran actualizados al realizar nuevo logueo.'
                            </div>";
                    unset($_SESSION["usuarioActualizado"]);
                }
        ?>

        <br>
        <br>
        <br>
        <div class="w3-container">
            <div class="w3-container w3-light-grey w3-left-align w3-margin-bottom">
                <h3 style="text-shadow:1px 1px 0 #444">Lista de Mis Suscripciones</h3>
            </div>
            <table class="w3-table w3-bordered w3-centered w3-table-all">
                <tr>
                    <!--th>id Administrador</th-->
                    <th>TITULO</th>
                    <th>NUMERO</th>
                    <th>DESCRIPCION</th>
                    <th>MODIFICAR PRODUCTO</th>                    
                </tr>
                <?php
                if(isset($_SESSION["revistas"])) {
                    $revistas = $_SESSION["revistas"];
                    $tam = sizeof($revistas);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posCampo = explode("-", $revistas[$i]);
                        echo "<tr>";
                        //echo "<td>$posCampo[1]</td>";
                        echo "<td>$posCampo[2]</td>";
                        echo "<td>$posCampo[3]</td>";
                        echo "<td>$posCampo[4]</td>";
                        echo "<td>";
                        echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-trash  w3-center w3-disabled'href='#'/>";
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
                <br>
                <br>
                <br>
        <div class="w3-container">
            <div class="w3-container w3-light-grey w3-left-align w3-margin-bottom">
                <h3 style="text-shadow:1px 1px 0 #444">Lista de Productos</h3>
            </div>
            <table class="w3-table w3-bordered w3-centered w3-table-all">
                <tr>
                    <th>PRODUCTO</th>
                    <th>SECCION</th>
                    <th>TITULO</th>
                    <th>SUBTITULO</th>
                    <th>PUBLICAR</th>
                    <th>MODIFICAR NOTICIA</th>                    
                </tr>
                <?php
                if(isset($_SESSION["noticias"])) {
                    $noticias = $_SESSION["noticias"];
                    $tam = sizeof($noticias);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posNoticia = explode("-", $noticias[$i]);
                        echo "<tr>";
                        echo "<td>$posNoticia[4]</td>";
                        echo "<td>$posNoticia[5]</td>";
                        echo "<td>$posNoticia[1]</td>";
                        echo "<td>$posNoticia[2]</td>";
                        echo "<td>$posNoticia[3]</td>";
                        if($pos[2] == 1){
                            echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-orange  glyphicon glyphicon-pencil w3-center' href='#'/>";
                            echo "</td>";
                            echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-orange  glyphicon glyphicon-check w3-center' href='interno.php?page=cambiarEstadoNoticia&idNoticia=$posNoticia[0]&idEstado=$posNoticia[3]'/>";
                            echo "</td>";
                            echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-trash w3-center' href='interno.php?page=eliminarNoticia&idNoticia=$posNoticia[0]'/>";
                            echo "</td>";
                            } else {
                                echo "<td>";
                                    echo"<a class='w3-padding w3-xlarge w3-text-orange  glyphicon glyphicon-pencil w3-center w3-disabled' href='#'/>";
                                echo "</td>";
                                echo "<td>";
                                    echo"<a class='w3-padding w3-xlarge w3-text-orange  glyphicon glyphicon-check w3-center w3-disabled' href='#'/>";
                                echo "</td>";
                                echo "<td>";
                                    echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-trash w3-center  w3-disabled'href='#'/>";
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
  
    <script>
        var close = document.getElementsByClassName("closebtn");
        var i;
        for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
        }
    </script>
    </body>
    </html>
    <?php
}else{
    header("Location: interno.php");
    exit();
}
?>