<?php
include_once("helper/Database.php");

class InicioModel
{
    private $conexion;

    public function __construct(){
        $this->conexion = new Database();
    }   

    public function executeBuscarNoticiasInicio($idProducto){
        $this->conexion->queryBuscarNoticiasInicio($idProducto);        
    }

    public function executeAbrirNoticia($idNoticia){
        $this->conexion->executeBuscarNoticiaById($idNoticia);      
    }
}