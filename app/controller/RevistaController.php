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
            include_once("view/revista/panelControlRevista.php");
        }

        public function executeCambiarEstadoNoticia($idNoticia,$idEstado){
            $this->modelo->executeCambiarEstadoNoticia($idNoticia,$idEstado);
            include_once("view/revista/panelControlRevista.php");
        }

    public function executeEliminarNoticia($idNoticia){
        $this->modelo->executeEliminarNoticia($idNoticia);
        include_once("view/revista/panelControlRevista.php");
    }

    public function executeGuardarNoticia($tituloNoticia,$subtitulo,$informe,$cod_contenidista){
        $this->modelo->executeGuardarNoticia($tituloNoticia,$subtitulo,$informe,$cod_contenidista);
        header("Location: interno.php?page=admRevista");
    }
}