<?php
include_once("helper/Database.php");

class RevistaModel
{
    private $conexion;

    public function __construct(){
        $this->conexion = new Database();
    }

    public function executeBuscarRevista(){
       $this->conexion->queryBuscarRevistas();
    }

    public function executeBuscarPlanes(){
       $this->conexion->executeBuscarPlanes();
    }

    public function executeBuscarNoticias(){
        $this->conexion->queryBuscarNoticias();

    }

    public function executeCambiarEstadoNoticia($idNoticia,$idEstado){
        $this->conexion->queryCambiarEstado($idNoticia,$idEstado);
    }

    public function executeEliminarNoticia($idNoticia){
        $this->conexion->queryEliminarNoticia($idNoticia);
    }


    public function executeGuardarRevista($idAdmin,$titulo,$nroRevista,$descripcion){

        $sql = "INSERT INTO Diario_Revista(Id_Admin,Titulo,Numero,Descripcion)
                value($idAdmin,'$titulo',$nroRevista,'$descripcion')";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
    }
    public function executeGuardarNoticia($tituloNoticia,$subtitulo,$informe,$cod_contenidista,$codProducto,$revistaSel,$seccionSel){

        $sql = "INSERT INTO Noticia (Titulo,Subtitulo,informe_noticia,Cod_georef
                 ,Cod_seccion,Cod_Contenidista,EstadoAutorizado,Origen)
      value ('$tituloNoticia','$subtitulo','$informe',1,$seccionSel,$cod_contenidista,'NO','$codProducto')";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
    }

    public function executeGuardarSeccion($nombreSeccion,$descripcion,$codProducto,$codContenidista){

        $sql = "INSERT INTO Seccion (nombreSeccion,Descripcion,EstadoAutorizado,Cod_producto,Cod_contenidista)
      value ('$nombreSeccion','$descripcion','NO',$codProducto,$codContenidista)";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
    }


    public function executeBuscarSecciones(){
       $this->conexion->executeBuscarSecciones();
    }

    public function executeCambiarEstadoSeccion($idSeccion,$idEstado){
        $this->conexion->queryCambiarEstadoSeccion($idSeccion,$idEstado);
    }

    public function executeEliminarSeccion($idSeccion){
        $this->conexion->executeEliminarSeccion($idSeccion);
    }

    public function executeBuscarNoticiaById($idNoticia){
        $this->conexion->executeBuscarNoticiaById($idNoticia);
    }


    public function executeModificarNoticia($idNoticia,$titulo,$subtitulo,$informe){
        $sql = "UPDATE Noticia SET Titulo='$titulo',Subtitulo ='$subtitulo',informe_noticia='$informe'  WHERE Cod_noticia = $idNoticia";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
        $_SESSION["noticiaActualizada"] = "ok";
    }

    public function executeBuscarSeccionById($idSeccion){
        $this->conexion->executeBuscarSeccionById($idSeccion);
    }

    public function executeModificarSeccion($idSeccion,$nombre,$descripcion){
        $sql = "UPDATE Seccion SET NombreSeccion='$nombre',Descripcion ='$descripcion' WHERE Cod_seccion = $idSeccion";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
        $_SESSION["seccionActualizada"] = "ok";
    }

    public function executeBuscarProductoById($idProducto){
        $this->conexion->executeBuscarProductoById($idProducto);
    }

    public function executeModificarProducto($idProducto,$titulo,$descripcion){
        $sql = "UPDATE Diario_Revista SET Titulo='$titulo',Descripcion ='$descripcion' WHERE Id = $idProducto";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
        $_SESSION["productoActualizado"] = "ok";
    }

    public function executeBuscarNoticiaImagenById($idNoticia){
        $this->conexion->executeBuscarNoticiaById($idNoticia);
    }
}