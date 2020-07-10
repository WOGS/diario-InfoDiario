
<?php
session_start();

if(isset($_SESSION["noticiaModif"])) {
    $noticias = $_SESSION["noticiaModif"];
    $pos = explode("-", $noticias);
    $nombreImagen = $pos[0];


}if($_FILES["file"]["error"] > 0) {
		echo "Error: " . $_FILES["file"]["error"] . "<br />";
	} else {
			echo "Upload: " . $_FILES["file"]["name"] . "<br />";
			echo "Type: " . $_FILES["file"]["type"] . "<br />";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
			echo "Stored in: " . $_FILES["file"]["tmp_name"];
			if(file_exists("../img/" . $_FILES["file"]["name"])) {
				echo $_FILES["file"]["name"] . " ya existe. ";
			} else {

					$tipoArchivo = explode(".", $_FILES["file"]["name"]);

					move_uploaded_file($_FILES["file"]["tmp_name"], "../img/" . $nombreImagen . ".". $tipoArchivo[1]);
					echo "Almacenado en: " . "../img/" . $nombreImagen .".". $tipoArchivo[1];
					}
		}


	header("Location: ../../interno.php?page=buscarSecciones");
	exit();
?>