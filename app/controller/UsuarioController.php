<?php
class UsuarioController{
    
    private $modelo;

        public function __construct(){
            include_once("model/RevistaModel.php");
            $this->modelo = new RevistaModel();
        }

        public function execute(){
            $this->modelo->executeBuscarRevista();
            include_once("view/usuario/panelControlUsuario.php");
        }

        public function executeAbrirSuscripcion(){
            $this->modelo->executeBuscarPlanes();
            include_once("view/usuario/suscribirseView.php");
        }

        public function executeAbrirPagarSuscripcion(){
            include_once("view/usuario/pagarSuscripcion.php");
        }
}
