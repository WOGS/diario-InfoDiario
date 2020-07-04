 <?php  
 $connect = mysqli_connect("localhost", "root", "1234", "infonete");

 $query = "SELECT Cod_seccion,NombreSeccion FROM Seccion WHERE Cod_producto=".$_POST["producto"];
 $result = mysqli_query($connect, $query);
 echo "<select name='localidad'>";
 while($fila = mysqli_fetch_array($result))
 {  
      echo "<option value='" . $fila["Cod_seccion"].  "'>" . $fila["NombreSeccion"] . "</option>";
 }
 echo "</select>";
 ?>