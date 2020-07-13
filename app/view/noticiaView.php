<?php
    if(isset($_SESSION["noticiaModif"])) {
    $noticia = $_SESSION["noticiaModif"];
    $posNoticia = explode("-", $noticia);       
}
?>
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
    <div class="col-md-9">
        <p class="mt-4"><?php echo $posNoticia[4]; ?></p>
        <h1><?php echo $posNoticia[1]; ?>           
        </h1>
        <p class="lead">Por <?php echo $posNoticia[5]; ?></p>          
        

        <hr>
        <img class="img-fluid rounded" src="view/img/<?php echo $posNoticia[0]; ?>.jpg" alt=""><br>
        <p class="lead"><?php echo $posNoticia[2]; ?></p><br>
        <p><?php echo $posNoticia[3]; ?></p>    


        <hr>   



        </div>   <!-- fin md9 -->
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
            <?php
            if(isset($_SESSION["usuarioOK"])) {?>
                <a href="index.php?page=panelUsuario" class="w3-btn w3-round w3-blue-grey" style="text-decoration: none" svalue="cancelar"> PANEL USUARIO</a>    
            <?php } ?>     
        </div> <!-- md-3 -->
</div> <!-- fin container -->

