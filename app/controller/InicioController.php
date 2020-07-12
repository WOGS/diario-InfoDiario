<?php

class InicioController
{   public function __construct(){
        include_once("model/InicioModel.php");
        $this->modelo = new InicioModel();
    }
    public function execute($idProducto){       
        $this->modelo->executeBuscarNoticiasInicio($idProducto);      
        include_once("view/inicioView.php");
    }
    public function executeAdm(){
        include_once("view/adm/indexInternoView.php");
    }   

    public function executePanelControl(){
        include_once("view/adm/panelControl.php");
    }

    public function executeAbrirNoticia($idNoticia){
        $this->modelo->executeAbrirNoticia($idNoticia);
         include_once("view/noticiaView.php");        
    }

    public function executeBuscarNoticiasInicio($idProducto){
        $this->modelo->executeBuscarNoticiasInicio($idProducto);  
         include_once("view/inicioView.php");        
    }


}