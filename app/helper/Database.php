<?php

class Database{

    private $conexion;

    public function __construct(){
        $configuracion = parse_ini_file("config/config.ini");
        $servername = $configuracion["servername"];
        $username = $configuracion["username"];
        $dbname =  $configuracion["dbname"];
        $password =  $configuracion["password"];

        $conn = new mysqli($servername, $username, $password);

        if ($conn->connect_error) {
            die("Fallo la conexion: " . $conn->connect_error);
        }
        $conn->select_db($dbname);
        $this->conexion = $conn;
    }

    public function query($usuario,$clave){
        $stmt = $this->conexion->prepare("SELECT * FROM Usuario WHERE Nombre = ? and Pass = ?");
        $stmt->bind_param('ss', $usuario, $clave);

        // set parameters and execute
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 0) {
            $_SESSION["loginError"] = "error";
         }

        while($row = $result->fetch_assoc()) {
            $resultado = $row['Id_usuario']."-".$row['Nombre']."-".$row['Cod_Usuario'];
        }
        // se guarda el usuario recuperado de la consulta en SESSION
        $_SESSION["usuarioOK"] = $resultado;
        $stmt->close();
        $this->conexion->close();
    }
    
    public function queryBuscarRevistas(){

        $stmt = $this->conexion->prepare("SELECT * FROM Diario_Revista");
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0) {
            $_SESSION["sinDatosRevistas"] = "0";
        }else{
            $i=1;
            while($row = $result->fetch_assoc()) {
                $id= $row['Id'];
                $idAdmin= $row['Id_Admin'];
                $titulo=$row['Titulo'];
                $numero = $row['Numero'];
                $descripcion = $row['Descripcion'];

                $resultados[$i]= $id."-".$idAdmin."-".$titulo."-".$numero."-".$descripcion;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            $_SESSION["revistas"] = $resultados;
        }

        $stmt->close();
        $this->conexion->close();
    }

    public function queryBuscarNoticias(){

        $stmt = $this->conexion->prepare("SELECT * FROM Noticia");
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0) {
            $_SESSION["sinDatosNoticias"] = "0";
        }else{
            $i=1;
            while($row = $result->fetch_assoc()) {
                $codNoticia= $row['Cod_noticia'];
                $titulo=$row['Titulo'];
                $subTitulo = $row['Subtitulo'];
                $estadoAutorizado = $row['EstadoAutorizado'];
                $origen = $row['Origen'];

                $resultados[$i]= $codNoticia."-".$titulo."-".$subTitulo."-".$estadoAutorizado."-".$origen;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            $_SESSION["noticias"] = $resultados;
        }

        $stmt->close();
        $this->conexion->close();
    }

    public function queryCambiarEstado($idNoticia,$idEstado){

        $estado = "";
        if (strcmp ($idEstado , "SI" ) == 0){
            $estado = "NO";
        } else {
            $estado = "SI";
        }
        $stmt = $this->conexion->prepare("UPDATE Noticia SET EstadoAutorizado=?  WHERE Cod_noticia=?");
        $stmt->bind_param('si', $estado,$idNoticia);
        
        $stmt->execute();
        $stmt->close();

        $this->queryBuscarNoticias();
    }

    public function queryBuscarUsuario(){

        $stmt = $this->conexion->prepare("SELECT * FROM Usuario");
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0) {
            $_SESSION["sinDatosUsuarios"] = "0";
        }else{
            $i=1;
            while($row = $result->fetch_assoc()) {
                $idUsuario= $row['Id_usuario'];
                $nombre=$row['Nombre'];
                $mail = $row['Mail'];

                $resultados[$i]= $idUsuario."-".$nombre."-".$mail;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            $_SESSION["usuarios"] = $resultados;
        }

        $stmt->close();
        $this->conexion->close();
    }

    public function executeBuscarUsuarioById($idUsuario){

        $stmt = $this->conexion->prepare("SELECT * FROM Usuario WHERE Id_usuario = ?");
        $stmt->bind_param('i', $idUsuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0) {
            $_SESSION["sinDatosUsuarios"] = "0";
        }else{
            $i=1;
            while($row = $result->fetch_assoc()) {
                $idUsuario= $row['Id_usuario'];
                $nombre=$row['Nombre'];
                $mail = $row['Mail'];

                $resultados[$i]= $idUsuario."-".$nombre."-".$mail;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            $_SESSION["usuariosModif"] = $resultados;
        }

        $stmt->close();
        $this->conexion->close();
    }

    public function queryEliminarNoticia($idNoticia){

        $stmt = $this->conexion->prepare("DELETE FROM Noticia WHERE Cod_noticia=?");
        $stmt->bind_param('i', $idNoticia);

        $stmt->execute();
        $_SESSION["noticiaEliminada"] = "si";
        $stmt->close();
        $this->queryBuscarNoticias();
    }

    public function executeEliminarUsuario($idUsuario){

        $stmt = $this->conexion->prepare("DELETE FROM Usuario WHERE Id_usuario=?");
        $stmt->bind_param('i', $idUsuario);

        $stmt->execute();
        $_SESSION["usuarioEliminado"] = "si";
        $stmt->close();
        $this->queryBuscarUsuario();
    }


    public function executeBuscarSecciones(){

        $stmt = $this->conexion->prepare("SELECT * FROM Seccion");
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0) {
            $_SESSION["sinDatosSeccion"] = "0";
        }else{
            $i=1;
            while($row = $result->fetch_assoc()) {
                $codSeccion= $row['Cod_seccion'];
                $nombreSeccion=$row['NombreSeccion'];
                $descripcion = $row['Descripcion'];
                $codProducto= $row['Cod_producto'];

                $resultados[$i]= $codSeccion."-".$nombreSeccion."-".$descripcion."-".$codProducto;
                $i++;
            }
            // se guarda las Secciones recuperados de la consulta en SESSION
            $_SESSION["secciones"] = $resultados;
        }

        $stmt->close();
        $this->conexion->close();
    }

    public function queryInsert($sql){
        mysqli_query($this->conexion, $sql);
    }

    public function close(){
        mysqli_close($this->conexion);
    }


}