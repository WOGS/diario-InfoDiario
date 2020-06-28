<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
    ?>
    <html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <body>
    <div class="w3-display-topmiddle">
        <div class="w3-container w3-blue-grey w3-round">
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1>Panel de control Revista</h1>
        <br>
        <h2>Acciones posibles</h2>
        <div class="w3-center">
            <div class="w3-bar">
            <?php
            if($pos[2] == 1){?>
                <a href="interno.php?page=crearRevista" class="w3-btn w3-red">Crear nueva Revista</a>
            <?php }
            ?>
                <a href="interno.php?page=crearNoticia" class="w3-btn w3-red">Crear Noticia</a>
                <a href="interno.php?page=panelControl" class="w3-btn w3-red" svalue="cancelar"> VOLVER </a>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="w3-container">
            <h2>Lista de Revistas</h2>
            <table class="w3-table w3-bordered w3-centered">
                <tr>
                    <th>id Revista</th>
                    <th>id Administrador</th>
                    <th>Titulo</th>
                    <th>Numero</th>
                    <th>Descripcion</th>
                    <th>Borrar</th>
                    <th>Modificar</th>
                </tr>
                <?php
                if(isset($_SESSION["revistas"])) {
                    $revistas = $_SESSION["revistas"];
                    $tam = sizeof($revistas);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posCampo = explode("-", $revistas[$i]);
                        echo "<tr>";
                        echo "<td>$posCampo[0]</td>";
                        echo "<td>$posCampo[1]</td>";
                        echo "<td>$posCampo[2]</td>";
                        echo "<td>$posCampo[3]</td>";
                        echo "<td>$posCampo[4]</td>";
                        echo "<td>";
                        if($pos[2] == 1){
                        echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-trash'href='#'/>";
                        echo "</td>";
                        echo "<td>";
                        echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-search w3-center' href='#'/>";
                        echo "</td>";
                        } else {
                            echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-trash w3-disabled'href='#'/>";
                            echo "</td>";
                            echo "<td>";
                            echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-search w3-center w3-disabled' href='#'/>";
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
            <h2>Lista de Noticias</h2>
            <table class="w3-table w3-bordered w3-centered">
                <tr>
                    <th>cod. Noticia</th>
                    <th>Titulo</th>
                    <th>Subtitulo</th>
                    <th>Estado</th>
                    <th>Origen</th>
                    <th>Borrar</th>
                    <th>Modificar Estado</th>
                </tr>
                <?php
                if(isset($_SESSION["noticias"])) {
                    $noticias = $_SESSION["noticias"];
                    $tam = sizeof($noticias);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posNoticia = explode("-", $noticias[$i]);
                        echo "<tr>";
                        echo "<td>$posNoticia[0]</td>";
                        echo "<td>$posNoticia[1]</td>";
                        echo "<td>$posNoticia[2]</td>";
                        echo "<td>$posNoticia[3]</td>";
                        echo "<td>$posNoticia[4]</td>";
                        echo "<td>";
                        if($pos[2] == 1){
                            echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-trash'href='interno.php?page=eliminarNoticia&idNoticia=$posNoticia[0]'/>";
                            echo "</td>";
                            echo "<td>";
                            echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-search w3-center' href='interno.php?page=cambiarEstadoNoticia&idNoticia=$posNoticia[0]&idEstado=$posNoticia[3]'/>";
                            echo "</td>"; 
                            } else {
                                echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-trash w3-disabled'href='#'/>";
                                echo "</td>";
                                echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-search w3-center w3-disabled' href='#'/>";
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
