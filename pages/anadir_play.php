<?php
   session_start();
   error_reporting(0);
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width">
      <title>replit</title>
      <script src="https://kit.fontawesome.com/ba24da5ac1.js" crossorigin="anonymous"></script>
      <link href="/style.css" rel="stylesheet" type="text/css" />
   </head>
   <body id="back1">
      <nav class="row nav_main1  parent" >
         <div class="div1">
            <center> <a href="../index.php"><img src="../imgs/jukebox.png" height="100px" class="logo"></a></center>
            <center>
               <ul id="menu1_" style="display: flex;
                  justify-content: center;">
                  <a href="../pages/anadir_play.php">
                     <li class="menu1">Añadir Playlist</li>
                  </a>
                  <li class="menu1">|</li>
                  <a href="../pages/anadir_cancion.php">
                     <li class="menu1">Añadir cancion</li>
                  </a>
               </ul>
            </center>
         </div>
         <div class="div2" style=" float: right;">
            <?php if (isset($_SESSION["usuario"])) {
               $usuario_ = $_SESSION["usuario"];
               echo "<p style='   
               margin: 25px;
               border: solid;
               padding: 20px'>Bienvenido:  " .
                   $usuario_ .
                   "<a href='perfil.php'><i class='fa-solid fa-user' style='margin-left:10px;'></i></a><a href='logout.php'><i class='fa-solid fa-arrow-right-from-bracket'></i></a></p>";
               } else {
               echo "<p style='    float: right;
               margin: 25px;
               border: solid;
               padding: 20px'><a href='sesion.php'>Registrarse</a></p>";
               } ?>
         </div>
      </nav>
      <br>
      <section class="row">
         <div class="col-3">
         </div>
         <div class="col-6">
            <div style="margin: 0 auto;">
               <h2 style="text-align: center;">Añadir PlayList</h2>
               <form action="" style="text-align: center;" id="" method="post" action="anadir_play.php">
                  <div id="formulario">
                     <input type="text" name="nombre" id="" class="formulario_inputs" placeholder="Nombre PlayList">
                  </div>
                  <button type="submit" value="" style="background-color: #2c4d6c6e;
                     border: 1px solid #2c4d6c6e;width: 50%;padding: 10px;margin-top: 30px;">Enviar </button>
               </form>
            </div>
         </div>
         <div class="col-3">
         </div>
      </section>
      <?php
         $nombreplay = $_POST["nombre"];
         $nombrecancion = [];
         $url_canciones = [];
         $url_img = [];
         $cantantes = [];
         $cover = [];
         $playlist = [
             "playlistNombre" => $nombreplay,
             "titulo_cancion" => $nombrecancion,
             "imgsrc" => $url_img,
             "cancionssrc" => $url_canciones,
             "cantantes" => $cantantes,
             "cover" => $cover,
         ];
         
         $guardar = json_encode($playlist);
         file_put_contents("../playlist/" . $nombreplay . ".json", $guardar);
         ?>
      <!--
         This script places a badge on your repl's full-browser view back to your repl's cover
         page. Try various colors for the theme: dark, light, red, orange, yellow, lime, green,
         teal, blue, blurple, magenta, pink!
         -->
   </body>
</html>