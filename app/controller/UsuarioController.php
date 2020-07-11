<?php
class UsuarioController{
    
    private $modelo;

        public function __construct(){
            include_once("model/RevistaModel.php");
            include_once("model/UsuarioModel.php");
            $this->modelo = new RevistaModel();
            $this->modelUsuario = new UsuarioModel();
        }

        public function execute(){
            $this->modelo->executeBuscarRevista();
        }

        public function executeMisSuscripciones($idUsuario){
            $this->modelUsuario->executeMisSuscripciones($idUsuario);
            include_once("view/usuario/panelControlUsuario.php");
        }

        public function executeAbrirSuscripcion(){
            $this->modelo->executeBuscarPlanes();
            include_once("view/usuario/suscribirseView.php");
        }

        public function executeAbrirPagarSuscripcion(){
            include_once("view/usuario/pagarSuscripcion.php");
        }

        public function executeProcesarPago($tarjeta,$fechaVenc,$codSeguridad,$idUsuario,$idProducto,$precio,$idPlan) {
            $this->modelUsuario->executeProcesarPago($tarjeta,$fechaVenc,$codSeguridad,$idUsuario,$idProducto,$precio,$idPlan);
            header("Location: index.php?page=panelUsuario");
        }
        
        public function executeMisFacturas($idUsuario){
            $this->modelUsuario->executeMisFacturas($idUsuario);
            include_once("view/usuario/misFacturasView.php");
        }

}
