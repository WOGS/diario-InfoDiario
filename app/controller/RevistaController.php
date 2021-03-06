<?php
class RevistaController{
    
    private $modelo;

        public function __construct(){
            include_once("model/RevistaModel.php");
            $this->modelo = new RevistaModel();
        }

        public function execute(){
            $this->modelo->executeBuscarRevista();
            header("Location: interno.php?page=buscarNoticias");
        }

        public function executeCrearNoticia(){
            include_once("view/revista/crearNoticiaView.php");
        }

        public function executeCrearRevista(){
            include_once("view/revista/registrarRevistaView.php");
        }

        public function executeGuardarRevista($idAdmin,$titulo,$nroRevista,$descripcion){
            $this->modelo->executeGuardarRevista($idAdmin, $titulo, $nroRevista, $descripcion);
            header("Location: interno.php?page=admRevista");
        }

        public function executeBuscarNoticias(){
            $this->modelo->executeBuscarNoticias();
            header("Location: interno.php?page=buscarSecciones");
        }

        public function executeCambiarEstadoNoticia($idNoticia,$idEstado){
            $this->modelo->executeCambiarEstadoNoticia($idNoticia,$idEstado);
            include_once("view/revista/panelControlRevista.php");
        }

        public function executeEliminarNoticia($idNoticia){
            $this->modelo->executeEliminarNoticia($idNoticia);
            include_once("view/revista/panelControlRevista.php");
        }

        public function executeGuardarNoticia($tituloNoticia,$subtitulo,$informe,$cod_contenidista,$codProducto,$revistaSel,$seccionSel){
            $this->modelo->executeGuardarNoticia($tituloNoticia,$subtitulo,$informe,$cod_contenidista,$codProducto,$revistaSel,$seccionSel);
            header("Location: interno.php?page=admRevista");
        }
        
        public function executeCrearSeccion(){
            include_once("view/revista/crearSeccionView.php");
        }

        public function executeGuardarSeccion($nombreSeccion,$descripcion,$codProducto,$codContenidista){
            $this->modelo->executeGuardarSeccion($nombreSeccion,$descripcion,$codProducto,$codContenidista);
            header("Location: interno.php?page=buscarSecciones");
            }

        public function executeBuscarSecciones(){
            $this->modelo->executeBuscarSecciones();
            include_once("view/revista/panelControlRevista.php");

        }

        public function executeCambiarEstadoSeccion($idSeccion,$idEstado){
            $this->modelo->executeCambiarEstadoSeccion($idSeccion,$idEstado);
            header("Location: interno.php?page=admRevista");
            

        }

        public function executeEliminarSeccion($idSeccion){
            $this->modelo->executeEliminarSeccion($idSeccion);
            header("Location: interno.php?page=admRevista");
        }

        public function executeBuscarNoticiaById($idNoticia){
            $this->modelo->executeBuscarNoticiaById($idNoticia);
            include_once("view/revista/modificarNoticiaView.php");
        }

        public function executeModificarNoticia($idNoticia,$titulo,$subtitulo,$informe){
            $this->modelo->executeModificarNoticia($idNoticia,$titulo,$subtitulo,$informe);
            header("Location: interno.php?page=admRevista");
        }

        public function executeBuscarSeccionById($idSeccion){
            $this->modelo->executeBuscarSeccionById($idSeccion);
            include_once("view/revista/modificarSeccionView.php");
        }

        public function executeModificarSeccion($idSeccion,$nombre,$descripcion){
            $this->modelo->executeModificarSeccion($idSeccion,$nombre,$descripcion);
            header("Location: interno.php?page=admRevista");
        }

    public function executeBuscarProductoById($idProducto){
        $this->modelo->executeBuscarProductoById($idProducto);
        include_once("view/revista/modificarProductoView.php");
    }

    public function executeModificarProducto($idProducto,$titulo,$descripcion){
        $this->modelo->executeModificarProducto($idProducto,$titulo,$descripcion);
        header("Location: interno.php?page=admRevista");
    }

    public function executeBuscarNoticiaImagenById($idNoticia){
        $this->modelo->executeBuscarNoticiaImagenById($idNoticia);
        include_once("view/revista/crearImagenNoticia.php");
    }

    public function executeCambiarEstadoLibre($idNoticia,$idEstado){
        $this->modelo->executeCambiarEstadoLibre($idNoticia,$idEstado);
        header("Location: interno.php?page=admRevista");
    }
        
}

