<?php
class AltaUsuarioController{
    private $modelo;

        public function __construct(){
            include_once("model/AltaUsuarioModel.php");
            $this->modelo = new AltaUsuarioModel();
        }

        public function execute()
        {
            include_once("view/registrarUsuarioView.php");
        }

    public function executeRegistarUsuario($usuario,$clave,$nroDoc,$telefono,$mail,$codUser){

        $this->modelo->executeRegistarUsuario($usuario,$clave,$nroDoc,$telefono,$mail,$codUser);

        if(strcmp($_SESSION["usuarioAlta"],"Usuario")){
            header("Location: index.php");
        }else{
            header("Location: interno.php?page=panelControl");
        }
    }

    public function executeModifUsuario($usuario,$clave,$nroDoc,$tel,$mail,$codUsuario,$idUsuario){
        $this->modelo->executeModifUsuario($usuario,$clave,$nroDoc,$tel,$mail,$codUsuario,$idUsuario);

        if(strcmp($_SESSION["usuarioAlta"],"Usuario")==0){
            header("Location: index.php?page=panelUsuario");
        }else{
            header("Location: interno.php?page=listarUsuario");
        }
    }
}
