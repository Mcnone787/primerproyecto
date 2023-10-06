<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width">
      <title>replit</title>
      <script src="https://kit.fontawesome.com/ba24da5ac1.js" crossorigin="anonymous"></script>
      <link href="../style.css" rel="stylesheet" type="text/css" />
   </head>
   <body id="back1">
      <nav class="row nav_main1">
         <div class="col-3">
         </div>
         <div class="col-6">
            <a href="../index.php"><img src="../imgs/jukebox.png" height="100px" class="logo"></a>
            <ul id="menu1_">
               <a href="">
                  <li class="menu1">Añadir Playlist</li>
               </a>
               <li class="menu1">|</li>
               <li class="menu1">Sesion</li>
            </ul>
         </div>
         <div class="col-3">
         </div>
      </nav>
      <br>
      <?php
         foreach (glob("../playlist/*.json") as $ficheros) {
             $prueba1 = file_get_contents($ficheros);
             $prueba2 = json_decode($prueba1, true);
             echo basename($ficheros . " ");
             print_r($prueba2);
             gettype($prueba2);
             echo $prueba2["imgsrc"][0];
             echo count($prueba2["imgsrc"]);
             for ($i = 0; $i < count($prueba2["imgsrc"]); $i++) {
                 echo "<p>" . $prueba2["imgsrc"][$i] . "</p>";
             }
         
             echo $_GET["cancion"];
         }
         $pruebass = ["19/09/2023", "19/07/2023"];
         natsort($pruebass);
         foreach ($pruebass as $elementos) {
             echo $elementos;
         }
         echo fileatime("../playlist/playlist2.json");
         ?>
      <?php
         $i_main = 1;
         $salto_depaginas = 5;
         $count = 0;
         ?>
      <?php
         $fechas = [];
         $srcs = [];
         foreach (glob("../songs/*.json") as $nombrescanciones) {
             array_push($fechas, filemtime($nombrescanciones));
             array_push($srcs, $nombrescanciones);
         }
         
         array_multisort($fechas, $srcs);
         echo count($srcs);
         ?>
      <script src="../formulario.js"></script>
      <!--
         This script places a badge on your repl's full-browser view back to your repl's cover
         page. Try various colors for the theme: dark, light, red, orange, yellow, lime, green,
         teal, blue, blurple, magenta, pink!
         -->
   </body>
</html>