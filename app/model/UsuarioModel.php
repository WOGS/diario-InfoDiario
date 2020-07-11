<?php
include_once("helper/Database.php");

class UsuarioModel
{
    private $conexion;

    public function __construct(){
        $this->conexion = new Database();
    }

    public function executeProcesarPago($tarjeta,$fechaVenc,$codSeguridad,$idUsuario,$idProducto,$precio,$idPlan){
     $hoy = date("Y-m-d");
     $sql = "INSERT INTO Pago (Nro_tarjeta,Fecha_vencTarjeta,Cod_seguridad,Id_usuario,Cod_plan,Cod_producto,Fecha_pago,Precio)
      value ($tarjeta,'$fechaVenc',$codSeguridad,$idUsuario,$idPlan,$idProducto,'$hoy',$precio)";
      $this->conexion->queryInsert($sql);

      $sql2 = "INSERT INTO Suscripcion (Cod_Usuario,Cod_producto,Cod_plan,Fecha_suscripcion)
      value ($idUsuario,$idProducto,$idPlan,'$hoy')";
      $this->conexion->queryInsert($sql2);

      $this->conexion->close();

      $_SESSION['suscripcionOk'] = "ok";
    }

    public function executeMisSuscripciones($idUsuario){
        $this->conexion->queryBuscarMisSuscripciones($idUsuario);
    }

    public function executeMisFacturas($idUsuario){
        $this->conexion->executeMisFacturas($idUsuario);
    }
}
