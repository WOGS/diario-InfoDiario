<?php
include_once("view/partial/header.php");

$page = isset($_GET[ "page" ]) ? $_GET[ "page" ] : "inicio";
$_SESSION["usuarioAlta"] = "Usuario";
switch ($page){

    case "login":
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
        include_once("controller/LoginController.php");
        $controller = new LoginController();
        $controller->execute($usuario,$clave);
        break;

    case "registrar":
        $_SESSION["usuarioAlta"] = "Usuario";
        $_SESSION["actionReg"] = "index";
        include_once("controller/AltaUsuarioController.php");
        $controller = new AltaUsuarioController();
        $controller->execute();
        break;

    case "guardarUsuario":
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
        $nroDoc = $_POST["nroDoc"];
        $tel = $_POST["telefono"];
        $mail = $_POST["mail"];
        $codUser = 3;
        include_once("controller/AltaUsuarioController.php");
        $controller = new AltaUsuarioController();
        $controller->executeRegistarUsuario($usuario,$clave,$nroDoc,$tel,$mail,$codUser);
        break;

    case "panelUsuario":
       include_once("controller/UsuarioController.php");
       $controller = new UsuarioController();
       $controller->execute();       
       break;

    case "buscarUsuarioById":
        $idUsuario = $_GET["idUsiario"];
        include_once("controller/AdministradorController.php");
        $controller = new AdministradorController();
        $controller->executeBuscarUsuarioById($idUsuario);
        break;

    case "abrirSuscripcion":
        $idProducto = $_GET["idProducto"];
        $_SESSION["idProducto"] = $idProducto;
        include_once("controller/UsuarioController.php");
        $controller = new UsuarioController();
        $controller->executeAbrirSuscripcion();
        break;

    case "pagarSuscripcion":
        $idSuscrip = $_GET["idSuscrip"];
        $_SESSION["idSuscrip"] = $idSuscrip;
        $precio = $_GET["precio"];
        $_SESSION["precio"] = $precio;
        include_once("controller/UsuarioController.php");
        $controller = new UsuarioController();
        $controller->executeAbrirPagarSuscripcion();
        break;
    
    //case "procesarPago":

    case "inicio":
    default:
        include_once("controller/InicioController.php");
        $controller = new InicioController();
        $controller->execute();
        break;
}
include_once("view/partial/footer.php");

?>