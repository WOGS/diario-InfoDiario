<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
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
        <h1>Panel de control Administrador</h1>
        <br>
        <h2>Acciones posibles</h2>
        <div class="w3-center">
            <div class="w3-bar">
                <a href="interno.php?page=registrar" class="w3-btn w3-red">Alta Usuario</a>
                <a href="interno.php?page=admRevista" class="w3-btn w3-red">Administrar Contenido</a>
                <a href="interno.php?page=listarUsuario" class="w3-btn w3-red">Listar Usuarios</a>
        </div>
        <br>
        <div class="w3-container">
            <h2>Lista de Usuarios</h2>
            <table class="w3-table w3-bordered w3-centered">
                <tr>
                    <th>Id Usuario</th>
                    <th>Nombre</th>
                    <th>Mail</th>
                    <th>Borrar</th>
                    <th>Modificar</th>
                </tr>
                <?php
                if(isset($_SESSION["usuarios"])) {
                    $usuarios = $_SESSION["usuarios"];
                    $tam = sizeof($usuarios);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posUsuario = explode("-", $usuarios[$i]);
                        echo "<tr>";
                        echo "<td>$posUsuario[0]</td>";
                        echo "<td>$posUsuario[1]</td>";
                        echo "<td>$posUsuario[2]</td>";
                        echo "<td>";
                        echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-trash'href='interno.php?page=eliminarUsuario&idUsiario=$posUsuario[0]'/>";
                        echo "</td>";
                        echo "<td>";
                        echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-search w3-center' href='interno.php?page=modifUsuario&idUsiario=$posUsuario[0]'/>";
                        echo "</td>";
                        echo"</tr>";
                    }
                }
                if(isset($_SESSION["sinDatosUsuarios"])) {
                    echo"<div class='alert warning'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong> No hay datos para mostrar en la tabla
                            </div>";
                    unset($_SESSION["sinDatosUsuarios"]);
                }
                ?>
            </table>
        </div>
        <br>
        <br>
        <!--div class="w3-container w3-display-bottomright">
            <a href="index.php" class="w3-btn w3-blue">Salir</a>
        </div-->
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
    header("Location: index.php");
    exit();
}
?>
