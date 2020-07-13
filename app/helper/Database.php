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
            $resultado = $row['Id_usuario']."-".$row['Nombre']."-".$row['Cod_Usuario']."-".$row['Nro_doc']."-".$row['Mail'];
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
        $stmt = $this->conexion->prepare("SELECT  ntc.Cod_noticia, ntc.Titulo,ntc.Subtitulo ,ntc.informe_noticia,ntc.link_noticia, ntc.Cod_georef,ntc.imagen_noticia,ntc.Cod_seccion,ntc.Cod_contenidista,ntc.EstadoAutorizado, ntc.Origen,ntc.Cod_revista, secc.NombreSeccion, ntc.AccesoGratuito, dr.Titulo as TituloRevista
        FROM Noticia  ntc JOIN Seccion secc ON ntc.Cod_seccion = secc.Cod_seccion
                          JOIN Diario_Revista dr ON dr.Id = ntc.Cod_revista");
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
                $subProducto = $row['TituloRevista'];
                $acceso = $row['AccesoGratuito'];

                $resultados[$i]= $codNoticia."-".$titulo."-".$subTitulo."-".$estadoAutorizado."-".$origen."-".$seccion."-".$subProducto."-".$acceso;
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
        $stmt = $this->conexion->prepare("SELECT sec.Cod_seccion,sec.NombreSeccion,sec.Descripcion,sec.EstadoAutorizado, prd.Descripcion as DescProd   FROM Seccion sec JOIN Producto prd ON sec.Cod_producto = prd.Cod_producto;");
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

    public function executeBuscarNoticiaById($idNoticia){
        $stmt = $this->conexion->prepare("SELECT * FROM Noticia ntc join usuario usu on ntc.Cod_contenidista=usu.Cod_Usuario join Seccion secc on secc.Cod_seccion=ntc.Cod_seccion WHERE Cod_noticia = ?");
        $stmt->bind_param('i', $idNoticia);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0) {
            $_SESSION["sinDatosNoticias"] = "0";
        }else{
            while($row = $result->fetch_assoc()) {
                $idNoticia= $row['Cod_noticia'];
                $titulo=$row['Titulo'];
                $subtitulo=$row['Subtitulo'];
                $contenido = $row['informe_noticia'];
                $seccion = $row['NombreSeccion'];
                $contenidista = $row['Nombre'];
                $resultado = $idNoticia."-".$titulo."-".$subtitulo."-".$contenido."-".$seccion."-".$contenidista;
            }
            // se guarda la noticia a modificar en SESSION
            $_SESSION["noticiaModif"] = $resultado;
        }
        $stmt->close();
        $this->conexion->close();
    }

    public function executeBuscarSeccionById($idSeccion){
        $stmt = $this->conexion->prepare("SELECT * FROM Seccion WHERE Cod_seccion = ?");
        $stmt->bind_param('i', $idSeccion);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0) {
            $_SESSION["sinDatosSeccion"] = "0";
        }else{
            while($row = $result->fetch_assoc()) {
                $idSeccion= $row['Cod_seccion'];
                $nombreSeccion=$row['NombreSeccion'];
                $descripcion=$row['Descripcion'];
                $resultado = $idSeccion."-".$nombreSeccion."-".$descripcion;
            }
            // se guarda la seccion a modificar en SESSION
            $_SESSION["seccionModif"] = $resultado;
        }
        $stmt->close();
        $this->conexion->close();
    }
    public function executeBuscarProductoById($idProducto){
        $stmt = $this->conexion->prepare("SELECT * FROM Diario_Revista WHERE Id = ?");
        $stmt->bind_param('i', $idProducto);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0) {
            $_SESSION["sinDatosProducto"] = "0";
        }else{
            while($row = $result->fetch_assoc()) {
                $idProducto= $row['Id'];
                $titulo=$row['Titulo'];
                $descripcion=$row['Descripcion'];
                $resultado = $idProducto."-".$titulo."-".$descripcion;
            }
            // se guarda el producto a modificar en SESSION
            $_SESSION["productoModif"] = $resultado;
        }
        $stmt->close();
        $this->conexion->close();
    }

    public function executeBuscarPlanes(){
        $stmt = $this->conexion->prepare("SELECT * FROM Plan");
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0) {
            $_SESSION["sinDatosPlanes"] = "0";
        }else{
            $i=1;
            while($row = $result->fetch_assoc()) {
                $codPlan= $row['Cod_plan'];
                $periodo= $row['Periodo'];
                $detalle=$row['Detalle'];
                $precio = $row['Precio'];

                $resultados[$i]= $codPlan."-".$periodo."-".$detalle."-".$precio;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            $_SESSION["planes"] = $resultados;
        }
        $stmt->close();
        $this->conexion->close();
    }

    public function queryBuscarMisSuscripciones($idUsuario){
        $stmt = $this->conexion->prepare("SELECT * FROM Suscripcion sus JOIN Diario_Revista dr ON sus.Cod_producto = dr.Id  JOIN Plan pl ON  sus.Cod_plan = pl.Cod_plan where Cod_usuario = ?;");
        $stmt->bind_param('i', $idUsuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0) {
            $_SESSION["sinSuscripciones"] = "0";
        }else{
            $i=1;
            while($row = $result->fetch_assoc()) {
                $codSuscripcion= $row['Cod_suscripcion'];
                $titulo= $row['Titulo'];
                $descripcion = $row['Descripcion'];
                $detalle=$row['Detalle'];
                $fechaSuscripcion = $row['Fecha_suscripcion'];

                $resultados[$i]= $codSuscripcion."_".$titulo."_".$descripcion."_".$detalle."_".$fechaSuscripcion;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            $_SESSION["misSuscripciones"] = $resultados;
        }
        $stmt->close();
        $this->conexion->close();
    }

    public function executeMisFacturas($idUsuario){
        $stmt = $this->conexion->prepare("SELECT * FROM Pago pg JOIN Plan pl ON  pg.Cod_plan = pl.Cod_plan
                      JOIN  Diario_Revista dr ON pg.Cod_producto = dr.Id
                    where Id_usuario = ?;");
        $stmt->bind_param('i', $idUsuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0) {
            $_SESSION["sinFacturas"] = "0";
        }else{
            $i=1;
            while($row = $result->fetch_assoc()) {
                $nroFactura = $row['Id_pago'];
                $nroTarjeta= $row['Nro_tarjeta'];
                $fechaPago= $row['Fecha_pago'];
                $precio = $row['Precio'];
                $detalle=$row['Detalle'];
                $titulo = $row['Titulo'];


                $resultados[$i]= $nroFactura."_".$nroTarjeta."_".$fechaPago."_".$precio."_".$detalle."_".$titulo;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            $_SESSION["misFacturas"] = $resultados;
        }
        $stmt->close();
        $this->conexion->close();
    }


      public function queryBuscarNoticiasInicio($idProducto){
        $stmt = $this->conexion->prepare("SELECT ntc.Cod_noticia, ntc.Titulo,ntc.Subtitulo ,ntc.informe_noticia,ntc.link_noticia, ntc.Cod_georef,ntc.imagen_noticia,ntc.Cod_seccion,ntc.Cod_contenidista,ntc.EstadoAutorizado,
        ntc.Origen,ntc.Cod_revista, secc.NombreSeccion, usu.Nombre, ntc.AccesoGratuito, secc.EstadoAutorizado as EstadoSeccion, ntc.informe_noticia, dr.Titulo as TituloRevista
        FROM Usuario usu JOIN Noticia ntc ON Id_usuario=Cod_contenidista  JOIN Seccion secc ON ntc.Cod_seccion = secc.Cod_seccion JOIN Diario_Revista dr ON dr.Id = ntc.Cod_revista WHERE ntc.Cod_revista = ? AND ntc.EstadoAutorizado ='SI'");
        $stmt->bind_param('i', $idProducto);
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
                $subProducto = $row['TituloRevista'];
                $contenidista = $row ['Nombre'];
                $acceso = $row ['AccesoGratuito'];
                $estadoSeccion = $row ['EstadoSeccion'];
                $informe = $row ['informe_noticia'];

                $resultados[$i]= $codNoticia."-".$titulo."-".$subTitulo."-".$estadoAutorizado."-".$origen."-".$seccion."-".$subProducto."-".$contenidista."-".$acceso."-".$estadoSeccion."-".$informe;
                $i++;
            }
            // se guarda las revistas recuperados de la consulta en SESSION
            $_SESSION["noticias"] = $resultados;
            $_SESSION["titulo"] = $subProducto;
        }
        $stmt->close();
        $this->conexion->close();
    }


    public function queryCambiarEstadoLibre($idNoticia,$idEstado){
        $estado = "";
        if (strcmp ($idEstado , "SI" ) == 0){
            $estado = "NO";
        } else {
            $estado = "SI";
        }
        $stmt = $this->conexion->prepare("UPDATE Noticia SET AccesoGratuito=?  WHERE Cod_noticia=?");
        $stmt->bind_param('si', $estado,$idNoticia);
        
        $stmt->execute();
        $stmt->close();
        $this->queryBuscarNoticias();

    }

    public function queryInsert($sql){
        mysqli_query($this->conexion, $sql);
    }

    public function close(){
        mysqli_close($this->conexion);
    }
}

