<?php
include_once("helper/Database.php");

class AltaUsuarioModel
{
    private $conexion;

    public function __construct(){
        $this->conexion = new Database();
    }

    public function executeRegistarUsuario($usuario,$clave,$nroDoc,$telefono,$mail,$codUser){
        $sql = "INSERT INTO Usuario(Nro_doc,Cod_doc,Nombre,Mail,Telefono,Cod_Localidad,Cod_Usuario,Pass)
                value($nroDoc,1,'$usuario','$mail',$telefono,1,$codUser,'$clave')";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
    }

    public function executeModifUsuario($usuario,$clave,$nroDoc,$tel,$mail,$codUsuario,$idUsuario){
        $sql = "UPDATE Usuario SET Nro_doc=$nroDoc,Nombre='$usuario',Mail='$mail',Telefono=$tel,Cod_Usuario=$codUsuario,Pass='$clave' WHERE Id_usuario = $idUsuario";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
        $_SESSION["usuarioActualizado"] = "ok";        
    }  
}