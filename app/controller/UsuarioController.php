<?php
class UsuarioController{
    
    private $modelo;

        public function __construct(){
            include_once("model/RevistaModel.php");
            $this->modelo = new RevistaModel();
        }

        public function execute(){
          //  $this->modelo->executeBuscarRevista();
            header("Location: index.php?page=panelUsuario");
        }

        
}
