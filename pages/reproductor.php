<?php
   $cookie_playlist_lista = json_decode($_COOKIE["Playlists_lista_"], true);
   $posicion = array_search($_GET["playlist"], $cookie_playlist_lista["playlist"]);
   
   if ($posicion == "") {
       array_push($cookie_playlist_lista["playlist"], $_GET["playlist"]);
       array_push($cookie_playlist_lista["clicks"], 1);
   } else {
       $cookie_playlist_lista["clicks"][$posicion] =
           $cookie_playlist_lista["clicks"][$posicion] + 1;
   }
   
   setcookie(
       "Playlists_lista_",
       json_encode($cookie_playlist_lista),
       time() + 60 * 60 * 24 * 30,
       "/"
   );
   
   session_start();
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width">
      <title>replit</title>
      <script src="https://kit.fontawesome.com/ba24da5ac1.js" crossorigin="anonymous"></script>
      <link href="/style.css" rel="stylesheet" type="text/css" />
      <link rel="icon" type="image/x-icon" href="imgs/rastreo.png">
   </head>
   <body id="back1">
      <?php  ?>
      <nav class="row nav_main1  parent" >
         <div class="div1">
            <center> <img src="../imgs/jukebox.png" height="100px" class="logo"></center>
            <center>
               <ul id="menu1_" style="display: flex;
                  justify-content: center;">
                  <a href="anadir_play.php">
                     <li class="menu1">Añadir Playlist</li>
                  </a>
                  <li class="menu1">|</li>
                  <a href="anadir_cancion.php">
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
      <div class="row playlist_back">
         <div class="col-3" style="border-top: 2px  gray solid;">
            <h2 style="text-align: center;">Canciones </h2>
            <details >
               <summary>Canciones de la <?php echo $_GET["playlist"]; ?></summary>
               <?php
                  //    error_reporting(E_ERROR | E_PARSE);
                  
                  $i_main = 0;
                  foreach (
                      glob("../playlist/" . $_GET["playlist"] . ".json")
                      as $ficheros
                  ) {
                      $prueba1 = file_get_contents($ficheros);
                      $prueba2 = json_decode($prueba1, true);
                      for ($i = 0; $i < count($prueba2["titulo_cancion"]); $i++) {
                          echo "
                     <p class='cancion cancioneslista' id='" .
                              $i .
                              "'>" .
                              $prueba2["titulo_cancion"][$i] .
                              "</p>";
                      }
                  }
                  ?>
         </div>
         </details>
      </div>
      <div class="col-9" style="padding:0;border-left: 2px solid gray;" id="div_global">
         <div class="col-12 visible" style="padding:0;border-left: 2px solid gray;" id="div_repr">
            <a href="../index.php"><i class="fa-solid fa-circle-xmark" style="float: right; font-size: 25px; margin-top: 20px;margin-right: 20px;" id="btn_repro_cerrar"></i></a>
            <div style="margin-top: 50px;">
               <center> <img src="<?php echo $prueba2[
                  "imgsrc"
                  ][0]; ?>" height="auto" width="65%" style="clip-path: circle();" 
                  id="img_songs" alt="Imagen cancion" displ></center>
            </div>
            <div class="row" style="
               width: 100%;
               background-color: #2c4d6c6e;
               margin-top: 100px;
               border-radius: 10px;
               display: flex;
               justify-content: space-evenly;
               padding: 30px;">
               <div class="">
                  <div >
                     <h4 style="text-align:center;">titulo</h4>
                     <p id="titulo" style="text-align:center;"></p>
                  </div>
               </div>
               <div class="">
                  <i class="fa-solid fa-backward" style="margin-right: 20px;" id="back"></i>
                  <i class="fa-solid fa-play" id="btn_start" ></i>
                  <p id="time_repro" style="display:inline-block;">00:00</p>
                  <input type="range" id="prueba" value="0" max="283.08898" >
                  <p id="total_time_song" style="display:inline-block;"></p>
                  <i class="fa-solid fa-circle-stop" style="margin-right: 20px;font-size: 20px;margin-left: 20px;" id="stop"></i>
                  <i class="fa-solid fa-shuffle" id="random"></i>
                  <i class="fa-solid fa-forward" style="margin-left: 20px;" id="next"></i>
                  <div id="audio_falso" style="display:inline;"> </div>
                  <i class="fa-solid fa-volume-high" id="volumen_icon"></i><input type="range" name="volumen"  id="volumen" max="100">
               </div>
               <div class="">
                  <div>
                     <p>Autores</p>
                     <p id="autores"></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>
         let jsonJS=<?php echo $prueba1; ?>
         
      </script>
      <script src="../script.js"></script>
      <!--
         This script places a badge on your repl's full-browser view back to your repl's cover
         page. Try various colors for the theme: dark, light, red, orange, yellow, lime, green,
         teal, blue, blurple, magenta, pink!
         -->
   </body>
</html>