
<div class="w3-container w3-center">
        <h1 class="w3-center">Panel de control Mis Facturacion</h1>
        <br>
        <h2 class="w3-center">Acciones posibles</h2>
        <div class="w3-center">
            <div class="w3-bar">
                <!--<a href="interno.php?page=registrar" class="w3-btn w3-red" style="text-decoration: none">Alta Usuario</a>
                <a href="interno.php?page=admRevista" class="w3-btn w3-red" style="text-decoration: none">Administrar Contenido</a> -->
                <a href="index.php?page=panelUsuario" class="w3-btn w3-red" style="text-decoration: none">Volver</a>
        </div>
        <br>
        <div class='w3-container'>
            <?php if(isset($_SESSION["misFacturas"])) { ?>
                <div class='w3-container w3-light-grey w3-left-align w3-margin-top w3-margin-bottom'>
                    <h2 style='text-shadow:1px 1px 0 #444'>Lista de Facturas</h2>
                </div>
            <table class='w3-table w3-bordered w3-centered w3-table-all'>
                <tr>
                    <th>Nro Factura</th>
                    <th>Fecha</th>
                    <th>Importe $</th>
                   <th>Nro Tarjeta</th>
                    <th>Detalle</th>
                    <th>Titulo</th>
                    <th>Imprimir Factura</th>
                </tr>
                 <?php
                    $factura = $_SESSION["misFacturas"];
                    $tam = sizeof($factura);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posUsuario = explode("_", $factura[$i]);
                        echo "<tr>";
                            echo "<td>$posUsuario[0]</td>";
                            echo "<td>$posUsuario[2]</td>";
                            echo "<td>$posUsuario[3]</td>";
                            echo "<td>$posUsuario[1]</td>";
                            echo "<td>$posUsuario[4]</td>";
                            echo "<td>$posUsuario[5]</td>";
                            echo "<td> <a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-print  w3-center 'href='#'/> </td>";
                        echo"</tr>";
                        } 
                }
                if(isset($_SESSION["sinFacturas"])) {
                    echo"<div class='alert warning'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong> No hay Facturas para mostrar
                            </div>";
                    unset($_SESSION["sinFacturas"]);
                }
                ?>
            </table>
        </div>
        <br>
        <br>
    </div>