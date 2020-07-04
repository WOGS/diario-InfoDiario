<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="/AJAX_Ejemplo_Codigo/js/jquery.js"></script>
    <script>
        function muestraLocalidad(provincia) {
            var parametros = {
                "provincia" : provincia
            };
            $.ajax({
                data:  parametros,
                url:   'load_localidad3.php',
                type:  'post',
                beforeSend: function () {
                    $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                    $("#resultado").html(response);
                }
            });
        }
    </script>

</head>

<body>

<form>
    <select name="provincia" onchange="muestraLocalidad(this.value)">

        <?php
        $connect = mysqli_connect("localhost", "root", "1234", "infonete");
        $output = array();
        $query = "SELECT Cod_producto,Descripcion FROM Producto group by Cod_producto,Descripcion";
        $result = mysqli_query($connect, $query);
        while($fila = mysqli_fetch_array($result))
        {
            echo "<option value='" . $fila["Cod_producto"] . "'>" . $fila["Descripcion"] . "</option>";
        }
        ?>
    </select>
</form>
<br>
<div id="resultado"></div>

</body>
</html>