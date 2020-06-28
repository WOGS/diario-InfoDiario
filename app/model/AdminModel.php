<?php
include_once("helper/Database.php");

class AdminModel
{
    private $conexion;

    public function __construct(){
        $this->conexion = new Database();
    }

    public function executeListarUsuario(){
       $this->conexion->queryBuscarUsuario();
    }


}