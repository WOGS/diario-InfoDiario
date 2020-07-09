<?php
class UsuarioController{
    
    private $modelo;

        public function __construct(){
            include_once("model/RevistaModel.php");
            $this->modelo = new RevistaModel();
        }

        public function execute(){
            $this->modelo->executeBuscarRevista();
            //header("Location:view/usuario/panelControlUsuario.php");
            include_once("view/usuario/panelControlUsuario.php");
        }

        public function executeAbrirSuscripcion(){
            include_once("view/usuario/suscribirseView.php");
        }
}
