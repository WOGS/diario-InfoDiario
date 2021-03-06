
<div class="w3-container w3-center">
        <h1 class="w3-center">Panel de control Administrador</h1>
        <br>
        <h2 class="w3-center">Acciones posibles</h2>
        <div class="w3-center">
            <div class="w3-bar">
                <a href="interno.php?page=registrar" class="w3-btn btn-primary" style="text-decoration: none">Alta Usuario</a>
                <a href="interno.php?page=admRevista" class="w3-btn btn-primary" style="text-decoration: none">Administrar Contenido</a>
                <a href="interno.php?page=listarUsuario" class="w3-btn btn-primary" style="text-decoration: none">Listar Usuarios</a>
                <a href="view/adm/reporteSuscripciones.php" class="w3-btn btn-primary" style="text-decoration: none" target="_blank">Reporte Suscripciones</a>
                <a href="view/adm/reportePagos.php" class="w3-btn btn-primary" style="text-decoration: none" target="_blank">Reporte Pagos</a>
        </div>
        <br>
        <div class='w3-container'>
            <?php if(isset($_SESSION["usuarios"])) { ?>
                <div class='w3-container w3-light-grey w3-left-align w3-margin-top w3-margin-bottom'>
                    <h2 style='text-shadow:1px 1px 0 #444'>Lista de Usuarios</h2>
                </div>
            <table class='w3-table w3-bordered w3-centered w3-table-all'>
                <tr>
                    <th>Nombre</th>
                    <th>Mail</th>
                    <th>Documento</th>
                   <th>Telefono</th>
                    <th>Rol</th>
                    <th>Modificar datos Usuario</th>
                    <th>Borrar</th>
                </tr>
                 <?php
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
                                echo"<a class='w3-padding w3-xlarge w3-text-teal glyphicon glyphicon glyphicon-user w3-center' href='interno.php?page=buscarUsuarioById&idUsiario=$posUsuario[0]'/>";
                            echo "</td>";
                            echo "<td>";
                                echo"<a class='w3-padding w3-xlarge w3-text-teal glyphicon glyphicon-trash'href='interno.php?page=eliminarUsuario&idUsiario=$posUsuario[0]'/>";
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
</div>