<?php
class LoginController{
    private $modelo;

    public function __construct(){
        include_once("model/LoginModel.php");
        $this->modelo = new LoginModel();
    }

    public function execute($usuario,$clave){
     
        $this->modelo->verificarUsuario($usuario,$clave);
      
                $usuario = $_SESSION["usuarioOK"];
                $pos = explode("-", $usuario);
                if($pos[2]==1){// codigo 1 Administrador
                    header("Location: interno.php?page=panelControl");
                }elseif($pos[2]==2){// codigo 2 Contenidista
                    header("Location: interno.php?page=admRevista");
                }elseif($pos[2]==3){// codigo 3 Lector
                    $_SESSION["titulo"]="INFONETE";
                    header("Location: index.php");
                }else{
                    header("Location: index.php");
                    }
            }     
}
