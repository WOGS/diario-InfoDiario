<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    ?>
    <html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="view/css/estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <body>
    <div class="w3-container w3-center">
        <h1 class="w3-center">Panel de control Administrador</h1>
        <br>
        <h2 class="w3-center">Acciones posibles</h2>
        <div class="w3-center">
            <div class="w3-bar">
                <a href="interno.php?page=registrar" class="w3-btn w3-red" style="text-decoration: none">Alta Usuario</a>
                <a href="interno.php?page=admRevista" class="w3-btn w3-red" style="text-decoration: none">Administrar Contenido</a>
                <a href="interno.php?page=listarUsuario" class="w3-btn w3-red" style="text-decoration: none">Listar Usuarios</a>
        </div>
        <br>
        <?php
        if(isset($_SESSION["usuarios"])) {
        echo "<div class='w3-container'>";
        echo    "<div class='w3-container w3-light-grey w3-left-align w3-margin-top w3-margin-bottom'>";
        echo        "<h2 style='text-shadow:1px 1px 0 #444'>Lista de Usuarios</h2>";
        echo    "</div>";
        echo    "<table class='w3-table w3-bordered w3-centered w3-table-all'>";
        echo        "<tr>";
        echo            "<th>Nombre</th>";
        echo            "<th>Mail</th>";
        echo            "<th>Documento</th>";
        echo            "<th>Telefono</th>";
        echo            "<th>Rol</th>";
        echo            "<th>Modificar datos Usuario</th>";
        echo            "<th>Borrar</th>";
        echo        "</tr>";
        }?>
                <?php
                if(isset($_SESSION["usuarios"])) {
                    $usuarios = $_SESSION["usuarios"];
                    $tam = sizeof($usuarios);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posUsuario = explode("-", $usuarios[$i]);
                        echo "<tr>";
                            echo "<td>$posUsuario[1]</td>";
                            echo "<td>$posUsuario[2]</td>";
                            echo "<td>$posUsuario[3]</td>";
                            echo "<td>$posUsuario[4]</td>";
                            echo "<td>$posUsuario[5]</td>";
                            echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon glyphicon-user w3-center' href='interno.php?page=buscarUsuarioById&idUsiario=$posUsuario[0]'/>";
                            echo "</td>";
                            echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-trash'href='interno.php?page=eliminarUsuario&idUsiario=$posUsuario[0]'/>";
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
