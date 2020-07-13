<div class="container">
    <div class="row">
        <div class="col-md-12">            
                <?php
                $titulo = "";
                if(isset($_SESSION["titulo"])) {
                    if(strcmp($_SESSION["titulo"],"INFONETE")==0){ ?>
                      <h1 class="text-center">InfoNete <small>Diario Online</small> </h1>
                  <?php
                  }
                  else { ?> 
                    <h1 class="text-center"><?php echo $_SESSION["titulo"]; ?>        
                  </h1>
                  <?php 
                    }
                  }
                  else { ?>
                    <h1 class="text-center">InfoNete <small>Diario Online</small> </h1>
                  <?php
                    }
                 ?>   
                
        </div>      <!-- row 1 -->
    </div> <!-- fin row 1 -->
    <hr>
    <div class="row"> <!-- row 2 -->
        <div class="col-md-9"> <!-- md 9 -->
                <?php
                if(isset($_SESSION["noticias"])) {
                    $revistas = $_SESSION["noticias"];
                    $tam = sizeof($revistas);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posCampo = explode("-", $revistas[$i]);
                        if ((strcmp($posCampo[9],"SI")==0) and (strcmp($posCampo[3],"SI")==0)){
                        echo "<div class='card mb-4'>";
                        echo "<img class='card-img-top' src='view/img/$posCampo[0].jpg' alt=''>";
                        echo "<div class='card-body'>";
                        echo "<h2 class='card-title'>$posCampo[1]";
                        if(strcmp($posCampo[8],"SI")==0){
                            echo "<span class='text-primary'> <svg class='bi bi-unlock-fill' width='0.7em' height='0.7em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path d='M.5 9a2 2 0 012-2h7a2 2 0 012 2v5a2 2 0 01-2 2h-7a2 2 0 01-2-2V9z'/><path fill-rule='evenodd' d='M8.5 4a3.5 3.5 0 117 0v3h-1V4a2.5 2.5 0 00-5 0v3h-1V4z' clip-rule='evenodd'/></svg></span>";
                        }
                        else {
                            echo "<span class='text-primary'><svg class='bi bi-lock-fill' width='0.7em' height='0.7em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                        <rect width='11' height='9' x='2.5' y='7' rx='2'/><path fill-rule='evenodd' d='M4.5 4a3.5 3.5 0 117 0v3h-1V4a2.5 2.5 0 00-5 0v3h-1V4z' clip-rule='evenodd'/></svg></span>"; }
                        echo "</h2>";
                        echo "<p>$posCampo[2]</p>";
                        if(strcmp($posCampo[8],"SI")==0){
                        echo "<a href='index.php?page=abrirNoticia&idNoticia=".$posCampo[0]."
                        ' class='btn btn-primary'>Seguir Leyendo &rarr;</a>";
                        }
                        else {  
                         echo "<a href='#' class='btn btn-primary w3-disabled'>Seguir Leyendo &rarr;</a>";
                           }                   
                        echo "</div>";
                        echo "<div class='card-footer text-muted'>
                        Publicado por <a href='#''>$posCampo[7]</a> en <a href='#''>$posCampo[6]</a>
                         </div>";
                        echo "</div>"; }
                    }                                   
                     }?> 
        </div> <!-- fin md 9 -->

<!-- fin noticias -->
            <div class="col-md-3"> <!-- md-3 -->
            <?php if(!isset($_SESSION["usuarioOK"])) {  ?>
            <div class="card"> <!-- ingresar -->
                <h5 class="card-header">Ingreso <span><svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/></svg></span></h5>
                <div class="card-body">
                    <form name="login" action="index.php?page=login" method="post">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="">
                        </div>
                        <div class="form-group">
                            <label for="contrasena">Contraseña</label>
                            <input type="password" class="form-control" id="clave" name="clave">
                        </div>
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </form>
                </div>
                <div>
                    <a class="w3-button" href="index.php?page=registrar">Alta usuario</a>
                </div>
            </div><!-- fin ingresar -->
            <?php
            }
            ?>
            
            <?php if(isset($_SESSION["loginError"])) {
                echo"<div class='alert error'>
                        <span class='closebtn'>&times;</span>
                        <strong>Error!</strong>Usuario/Password invalido</div>";
                unset($_SESSION["loginError"]);
            }
            ?>
            <div class="card my-4">  <!-- buscar -->
                <h5 class="card-header">Busqueda <span><svg class="bi bi-search" width="0.9em" height="0.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/></svg></span></h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar por...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">Ir</button>
                            </span>
                    </div>
                </div>
            </div>  <!-- fin buscar -->

            <div class="card my-4"> <!-- clima -->
                <h5 class="card-header">Clima
                    <span><svg class="bi bi-brightness-high-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="4"/>
                    <path fill-rule="evenodd" d="M8 0a.5.5 0 01.5.5v2a.5.5 0 01-1 0v-2A.5.5 0 018 0zm0 13a.5.5 0 01.5.5v2a.5.5 0 01-1 0v-2A.5.5 0 018 13zm8-5a.5.5 0 01-.5.5h-2a.5.5 0 010-1h2a.5.5 0 01.5.5zM3 8a.5.5 0 01-.5.5h-2a.5.5 0 010-1h2A.5.5 0 013 8zm10.657-5.657a.5.5 0 010 .707l-1.414 1.415a.5.5 0 11-.707-.708l1.414-1.414a.5.5 0 01.707 0zm-9.193 9.193a.5.5 0 010 .707L3.05 13.657a.5.5 0 01-.707-.707l1.414-1.414a.5.5 0 01.707 0zm9.193 2.121a.5.5 0 01-.707 0l-1.414-1.414a.5.5 0 01.707-.707l1.414 1.414a.5.5 0 010 .707zM4.464 4.465a.5.5 0 01-.707 0L2.343 3.05a.5.5 0 01.707-.707l1.414 1.414a.5.5 0 010 .708z" clip-rule="evenodd"/></svg></span></h5>
                <div class="card-body">
                    Bs As : Soleado 21º C<br>
                    <a href="#">Ir a Pronóstico Completo</a>
                </div>
            </div> <!-- fin clima -->

            <div class="card my-4"> <!-- otros -->
                <h5 class="card-header">Otras Publicaciones <span><svg class="bi bi-book" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 018.5 2.5v11a.5.5 0 01-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 010 13.5v-11a.5.5 0 01.276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 01.22-.103 12.958 12.958 0 012.7-.869zM1 2.82v9.908c.846-.343 1.944-.672 3.074-.788 1.143-.118 2.387-.023 3.426.56V2.718c-1.063-.929-2.631-.956-4.09-.664A11.958 11.958 0 001 2.82z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 007.5 2.5v11a.5.5 0 00.854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0016 13.5v-11a.5.5 0 00-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 00-.799-.34 12.96 12.96 0 00-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0115 2.82z" clip-rule="evenodd"/></svg></span></h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Diario 1</a>
                                </li>
                                <li>
                                    <a href="#">Diario 2</a>
                                </li>
                                <li>
                                    <a href="#">Diario 3</a>
                                </li>
                                <li>
                                    <a href="#">Revista 1</a>
                                </li>
                                <li>
                                    <a href="#">Revista 2</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                
               </div> 
            </div>  <!-- fin otros -->       
        </div> <!-- md-3 -->
    </div> <!-- fin row 2 -->
</div> <!-- container -->

                                         
                    
                   
       


