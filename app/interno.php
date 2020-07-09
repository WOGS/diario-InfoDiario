<?php
include_once("view/partial/header.php");


$_SESSION["usuarioAlta"] = "Admin";
$_SESSION["actionReg"] = "interno";
$page = isset($_GET[ "page" ]) ? $_GET[ "page" ] : "inicioAdm";

switch ($page){

    case "login":
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
        include_once("controller/LoginController.php");
        $controller = new LoginController();
        $controller->execute($usuario,$clave);
        break;

    case "registrar":
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
        $codUser = $_POST["codUser"];
        include_once("controller/AltaUsuarioController.php");
        $controller = new AltaUsuarioController();
        $controller->executeRegistarUsuario($usuario,$clave,$nroDoc,$tel,$mail,$codUser);
        break;

    case "panelControl":
        include_once("controller/InicioController.php");
        $controller = new InicioController();
        $controller->executePanelControl();
        break;

    case "admRevista":
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->execute();
        break;

    case "buscarNoticias":
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeBuscarNoticias();
        break;

    case "crearRevista":
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeCrearRevista();
        break;

    case "crearNoticia":
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeCrearNoticia();
        break;

    case "guardarNoticia":
        $tituloNoticia = $_POST["titulo"];
        $subtitulo= $_POST["subtitulo"];
        $informe = $_POST["informe"];
        $cod_contenidista = $_POST["cod_contenidista"];
        $codProducto = $_POST["codProducto"];
        $revistaSel = $_POST["revistaSel"];
        $seccionSel = $_POST["seccionSel"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeGuardarNoticia($tituloNoticia,$subtitulo,$informe,$cod_contenidista,$codProducto,$revistaSel,$seccionSel);
        break;

    case "guardarRevista":
        $titulo = $_POST["titulo"];
        $nroRevista = $_POST["nroRevista"];
        $descripcion = $_POST["descripcion"];
        $idAdmin = $_POST["idUsuario"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeGuardarRevista($idAdmin,$titulo,$nroRevista,$descripcion);
        break;

    case "buscarSecciones":
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeBuscarSecciones();
        break;

    case "crearSeccion":
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeCrearSeccion();
        break;

    case "guardarSeccion":
        $codProducto = $_POST["codProducto"];
        $nombreSeccion = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $codContenidista = $_POST["cod_contenidista"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeGuardarSeccion($nombreSeccion,$descripcion,$codProducto,$codContenidista);
        break;


    case "cambiarEstadoSeccion":
        $idSeccion = $_GET["idSeccion"];
        $idEstado = $_GET["idEstado"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeCambiarEstadoSeccion($idSeccion,$idEstado);
        break;

    case "eliminarSeccion":
        $idSeccion = $_GET["idSeccion"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeEliminarSeccion($idSeccion);
        break;
 

    case "cambiarEstadoNoticia":
        $idNoticia = $_GET["idNoticia"];
        $idEstado = $_GET["idEstado"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeCambiarEstadoNoticia($idNoticia,$idEstado);
        break;

    case "eliminarNoticia":
        $idNoticia = $_GET["idNoticia"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeEliminarNoticia($idNoticia);
        break;

    case "listarUsuario":
        include_once("controller/AdministradorController.php");
        $controller = new AdministradorController();
        $controller->executeListarUsuario();
        break;

    case "eliminarUsuario":
        $idUsuario = $_GET["idUsiario"];
        include_once("controller/AdministradorController.php");
        $controller = new AdministradorController();
        $controller->executeEliminarUsuario($idUsuario);
        break;

    case "buscarUsuarioById":
        $idUsuario = $_GET["idUsiario"];
        include_once("controller/AdministradorController.php");
        $controller = new AdministradorController();
        $controller->executeBuscarUsuarioById($idUsuario);
        break;

    case "modifDatosUsuario":
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
        $nroDoc = $_POST["nroDoc"];
        $tel = $_POST["telefono"];
        $mail = $_POST["mail"];
        $codUsuario = $_POST["codUsuario"];
        $idUsuario = $_POST["idUsuario"];
        include_once("controller/AltaUsuarioController.php");
        $controller = new AltaUsuarioController();
        $controller->executeModifUsuario($usuario,$clave,$nroDoc,$tel,$mail,$codUsuario,$idUsuario);
        break;

    case "buscarNoticiaById":
        $idNoticia = $_GET["idNoticia"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeBuscarNoticiaById($idNoticia);
        break;

    case "modificarNoticia":
        $idNoticia = $_POST["idNoticia"];
        $titulo = $_POST["titulo"];
        $subtitulo = $_POST["subtitulo"];
        $informe = $_POST["informe"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeModificarNoticia($idNoticia,$titulo,$subtitulo,$informe);
        break;

    case "buscarSeccionById":
        $idSeccion = $_GET["idSeccion"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeBuscarSeccionById($idSeccion);
        break;

    case "modificarSeccion":
        $idSeccion = $_POST["idSeccion"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
         include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeModificarSeccion($idSeccion,$nombre,$descripcion);
        break;

    case "buscarProductoById":
        $idProducto = $_GET["idProducto"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeBuscarProductoById($idProducto);
        break;

    case "modificarProducto":
        $idProducto = $_POST["idProducto"];
        $titulo = $_POST["titulo"];
        $descripcion = $_POST["descripcion"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeModificarProducto($idProducto,$titulo,$descripcion);
        break;

    case "inicioAdm":
    default:
        include_once("controller/InicioController.php");
        $controller = new InicioController();
        $controller->executeAdm();
        break;
}

//include_once("view/partial/footerInterno.php");
?>