<?php

class AdministradorController
{
    private $modelo;

    public function __construct(){
        include_once("model/AdminModel.php");
        $this->modelo = new AdminModel();
    }

    public function executeListarUsuario(){
        $this->modelo->executeListarUsuario();
        include_once("view/adm/panelControl.php");
    }

    public function executeEliminarUsuario($idUsuario){
        $this->modelo->executeEliminarUsuario($idUsuario);
        include_once("view/adm/panelControl.php");
    }

    public function executeBuscarUsuarioById($idUsuario){
        $this->modelo->executeBuscarUsuarioById($idUsuario);
        include_once("view/modificarUsuarioView.php");
    }

}
