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

        $stmt = $this->conexion->prepare("SELECT  ntc.Cod_noticia, ntc.Titulo,ntc.Subtitulo ,ntc.informe_noticia,ntc.link_noticia,ntc.Cod_georef,ntc.imagen_noticia,ntc.Cod_seccion,ntc.Cod_contenidista,ntc.EstadoAutorizado,ntc.Origen,ntc.Cod_revista, secc.NombreSeccion
	        FROM Noticia  ntc JOIN Seccion secc ON ntc.Cod_seccion = secc.Cod_seccion");
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
                $seccion = $row['NombreSeccion'];

                $resultados[$i]= $codNoticia."-".$titulo."-".$subTitulo."-".$estadoAutorizado."-".$origen."-".$seccion;
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

        $stmt = $this->conexion->prepare("SELECT * FROM Usuario usu JOIN Rol rol ON usu.Cod_Usuario = rol.Cod_Rol");
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
                $nroDoc=$row['Nro_doc'];
                $tel = $row['Telefono'];
                $rol = $row['Descripcion_rol'];

                $resultados[$i]= $idUsuario."-".$nombre."-".$mail."-".$nroDoc."-".$tel."-".$rol;
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
            while($row = $result->fetch_assoc()) {
                $idUsuario= $row['Id_usuario'];
                $nroDoc=$row['Nro_doc'];
                $nombre=$row['Nombre'];
                $mail = $row['Mail'];
                $pass = $row['Pass'];
                $tel = $row['Telefono'];
                $codUsu = $row['Cod_Usuario'];
                $resultado = $idUsuario."-".$nroDoc."-".$nombre."-".$mail."-".$pass."-".$tel."-".$codUsu;
            }
            // se guarda el usuario a modificar en SESSION
            $_SESSION["usuariosModif"] = $resultado;           
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

        $stmt = $this->conexion->prepare("SELECT sec.Cod_seccion,sec.NombreSeccion,sec.Descripcion,sec.EstadoAutorizado, prd.Descripcion as DescProd 
                                                    FROM Seccion sec JOIN Producto prd ON sec.Cod_producto = prd.Cod_producto;");
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
                $estado= $row['EstadoAutorizado'];
                $descProd= $row['DescProd'];


                $resultados[$i]= $codSeccion."-".$nombreSeccion."-".$descripcion."-".$estado."-".$descProd;
                $i++;
            }
            // se guarda las Secciones recuperados de la consulta en SESSION
            $_SESSION["secciones"] = $resultados;
        }

        $stmt->close();
        $this->conexion->close();
    }

    public function queryCambiarEstadoSeccion($idSeccion,$idEstado){

        $estado = "";
        if (strcmp ($idEstado , "SI" ) == 0){
            $estado = "NO";
        } else {
            $estado = "SI";
        }
        $stmt = $this->conexion->prepare("UPDATE Seccion SET EstadoAutorizado=?  WHERE Cod_seccion=?");
        $stmt->bind_param('si', $estado,$idSeccion);
        
        $stmt->execute();
        $stmt->close();

        $stmt2 = $this->conexion->prepare("UPDATE Noticia SET EstadoAutorizado=?  WHERE Cod_seccion=?");
        $stmt2->bind_param('si', $estado,$idSeccion);

        $stmt2->execute();
        $stmt2->close();

        $this->conexion->close();
    }

    public function executeEliminarSeccion($idSeccion){

        $stmt = $this->conexion->prepare("DELETE FROM Noticia WHERE Cod_seccion=?");
        $stmt->bind_param('i', $idSeccion);

        $stmt->execute();
 
        $stmt->close();
        $_SESSION["noticiaEliminada"] = "si";

        $stmt2 = $this->conexion->prepare("DELETE FROM Seccion WHERE Cod_seccion=?");
        $stmt2->bind_param('i', $idSeccion);

        $stmt2->execute();
        $_SESSION["seccionEliminada"] = "si";
        $stmt2->close();
        $this->conexion->close();
    }

    public function queryInsert($sql){
        mysqli_query($this->conexion, $sql);
    }

    public function close(){
        mysqli_close($this->conexion);
    }


}