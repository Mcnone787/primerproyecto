<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <script src="https://kit.fontawesome.com/ba24da5ac1.js" crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/x-icon" href="imgs/rastreo.png">
    <style>
.botonMenu {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 3rem;    
    height: 3rem;
    position: fixed;
    top: 1rem;
    right: 1rem;
    background-color: #99B2B7; 
    border: 0;
    color: white;
    cursor: pointer;
}
/* Se le quita el borde azul cuando se pulsa en Chrome */
.botonMenu:focus {
    outline: none;
}
/* Cuando es pulsado, se quita el translate que lo ocultaba */
.botonMenu:focus + .principal {
    transform: translateX(0rem);
}
/* Se posiciona y se oculta con translate */
nav.principal {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    width: 15rem;
    background-color: #7A6A53;
    transform: translateX(15rem);
    transition: 1s all;
}
/* Estilos sencillos para decorar los links */
nav.principal ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
nav.principal a {
    display: block;
    color: #D5DED9;
    padding: 1rem;
    transition: .5s all;
}
nav.principal a:hover {
    text-decoration: none;
    background-color: #948C75;
}
  </style>

</head>

<body id="back1">
  <nav class="row nav_main1  parent" >
  
   <div class="div1">
     <center> <img src="imgs/jukebox.png" height="100px" class="logo"></center>
     <center> <ul id="menu1_" style="display: flex;
    justify-content: center;">
        <a href="pages/anadir_play.php"> <li class="menu1">Añadir Playlist</li></a>
        <li class="menu1">|</li>
       <a href="pages/anadir_cancion.php"> <li class="menu1">Añadir cancion</li></a>
    
      </ul>
      </center>
    </div>
    
    <div class="div2" style=" float: right;">
      <?php

      if(isset($_SESSION["usuario"])){
        $usuario_=$_SESSION["usuario"];
        echo "<p style='   
        margin: 25px;
        border: solid;
        padding: 20px'>Bienvenido:  ".$usuario_."<a href='pages/perfil.php'><i class='fa-solid fa-user' style='margin-left:10px;'></i></a><a href='pages/logout.php'><i class='fa-solid fa-arrow-right-from-bracket'></i></a></p>";
      }else{
        echo "<p style='    float: right;
        margin: 25px;
        border: solid;
        padding: 20px'><a href='pages/sesion.php'>Registrarse</a></p>";
      }
      ?>
  </div>
    
  </nav>
 

  <br>
  <div class="row playlist_back">
    <div class="col-3" style="border-top: 2px  gray solid;">
      <h2 style="text-align: center;">PlayLists </h2>
     <!-- comprovamos si hay playlist creadas -->
     <?php
       error_reporting(E_ERROR | E_PARSE);


          $countelementosUwU=count(glob("playlist/*.json"));
          if($countelementosUwU<=0){
            
            echo "<p style='margin-top:20px;border:solid black 1px;padding:20px;'>No tienes ninguna playlist creada aun unu :-: CREALA A QUE ESPERAS. por que sigues leyendo ves a crear
            la playlist vengaaa corre que haces xd? por que sigues sabias que los gatos tienen la costumbre de amasar 
            la barriga si siente que eres parte como de su familia? aun sigues leyendo xdxdxd pero a ver xdxd
            mira la web xd mira la musica xd xdxxd</p>";
       
          }else{
            //cargamos playlists
          $i_main=0;
            foreach (glob("playlist/*.json") as  $ficheros) {
            $prueba1=file_get_contents($ficheros);
            $prueba2=json_decode($prueba1,true);

            echo "<p class='playlist_' style='text-align:center   ;'><a href='pages/reproductor.php?playlist=".$prueba2["playlistNombre"]."'>".$prueba2["playlistNombre"] ."</a><a href='/pages/eliminar_playlist.php?prueba=".$ficheros."'><i class='fa-solid fa-xmark' style='float:right;    font-size: 20px;'></i></a></p>";
            
          }
        }
       ?>
    
    </div>
 <div class="col-9" style="padding:0;border-left: 2px solid gray;" id="div_global">
  <div>
    
  <img src="imgs/pink-floyd-dark-side-of-the-moon-portada-significado.jpg" height="450px" width="100%" id="slider" style="filter:brightness(65%);">
  <i class="fa-solid fa-arrow-right" id="flecha_slider_D"></i>
  <i class="fa-solid fa-arrow-left" id="flecha_slider_Iz"></i>

</div>  
<section id="canciones" style="    width: 93%;
    border: solid;
    padding: 10px;
    margin: 0 auto;
    border-radius: 70px;
    margin-top:50px;
    margin-bottom:50px;
">
      <h2 style="text-align: center;margin-bottom: 50px;margin-top:50px;">Canciones de nuestra gramola ^^</h2>
      <div class="cancion_put" style="">
      <!-- cargamos la lista de manera ordenada para mostrar en la pagina -->
      <?php
       $i_main=1;
       $salto_depaginas=7 ;
       $count=0;
       $fechas = array();
      $srcs = array();
    
   
      foreach(glob("songs/*.json") as $nombrescanciones){
          array_push($fechas,filemtime($nombrescanciones));
          array_push($srcs,$nombrescanciones);
        }
        
      array_multisort($fechas,SORT_DESC, $srcs);
      foreach($srcs as $nombrescanciones){
        if($count>=$salto_depaginas){
          $i_main++;
          $count=0;
        }
        crear_canciones_pages($nombrescanciones,$i_main);
        $count++;
        
          
      }
      function crear_canciones_pages ($nombrescanciones,$i_main){
        $contenidocancion=file_get_contents($nombrescanciones);
        $cancion=json_decode($contenidocancion,true);
        $count++;
        if($i_main==1){
          echo "<p class='lista".$i_main." listasC'>".$cancion['titulo_cancion']."<a href='pages/anadircancionplaylist.php?cancion=".$cancion['titulo_cancion']."'><span style=''> add</span></a></p>";
        }else{
          echo "<p class='lista".$i_main." listasC invisible'>".$cancion['titulo_cancion']."<a href='pages/anadircancionplaylist.php?cancion=".$cancion['titulo_cancion']."'><span style=''> add</span></a></p>";

        }
        
      }
      ?>
      </div>
      <div style="margin:0 auto;text-align: center;margin: bottom 50px;margin-top:30px;" id="paginacion_numeros">
      <i class="fa-solid fa-arrow-left" id="paginacionIzFl"  style="padding-rigth:10px;"></i>
    <!-- cargamos las paginaciones -->
    <?php
    $count_paginas=0;
        for($i=1;$i<=$i_main;$i++){
          if($i!=0 && $i%6==0 ){
            $count_paginas++;
          }
          if($i<=5){      
            if($i==1){
              echo "<p class='paginacion visible pagina".$count_paginas."' data-pagina='".$i."' id=lista_".$i." >
              ".$i."
            </p>";
            }else{
              echo "<p class='paginacion visible pagina".$count_paginas."' data-pagina='".$i."' id=lista_".$i." >
              - ".$i."
            </p>";
            }
          }else{
            
            echo "<p class='paginacion invisible  pagina".$count_paginas."' data-pagina='".$i."'  id=lista_".$i." >
           ".$i."
          </p>";
          }
          
        }
      ?>   
      <i class="fa-solid fa-arrow-right" id="paginacionDF"></i>
  
      </div> 
      

    </div>
    </div>
    
   
  </div>


  <script>

  </script>

 <script src="imgs_y_imgsmusica.js"></script>
 <script src="paginacion_canciones.js"></script>
 
  <!--
  This script places a badge on your repl's full-browser view back to your repl's cover
  page. Try various colors for the theme: dark, light, red, orange, yellow, lime, green,
  teal, blue, blurple, magenta, pink!
  -->
</body>

</html>