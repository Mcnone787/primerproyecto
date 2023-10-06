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
    <link href="../style.css" rel="stylesheet" type="text/css" />
  

</head>

<body id="back1">
<nav class="row nav_main1  parent" >
   
   <div class="div1">
   <center><a href="../index.php"> <img src="../imgs/jukebox.png" height="100px" class="logo"></a></center>     <center> <ul id="menu1_" style="display: flex;
    justify-content: center;">
        <a href="../pages/anadir_play.php"> <li class="menu1">Añadir Playlist</li></a>
        <li class="menu1">|</li>
       <a href="../pages/anadir_cancion.php"> <li class="menu1">Añadir cancion</li></a>
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
        padding: 20px'>Bienvenido:  ".$usuario_."<a href='perfil.php'><i class='fa-solid fa-user' style='margin-left:10px;'></i></a><a href='logout.php'><i class='fa-solid fa-arrow-right-from-bracket'></i></a></p>";
      }else{
        echo "<p style='    float: right;
        margin: 25px;
        border: solid;
        padding: 20px'><a href='sesion.php'>Registrarse</a></p>";
      }
      ?>
  </div>
    
  </nav>
 

  <section class="row">
    <div class="col-3">
    <div style="border: 2px solid #2c4d6c6e !important;padding: 30px;">
    <p>Eligue la playlist que quieres guardar esta cancion: <?php echo $_GET["cancion"] ?></p>
      </div>
    </div>
    <div class="col-6">
      <div style="margin: 0 auto;">
      <h2 style="text-align: center;">Añadir Cancion  </h2>
      
      <form action="" style="text-align: center;" id="" method="post" action="anadir_play.php">
        <div id="formulario">
        <select  name="playlist" class='formulario_inputs' >
      <?php
       foreach (glob("../playlist/*.json") as  $ficheros) {
        $prueba1=file_get_contents($ficheros);
        $prueba2=json_decode($prueba1,true);
        $infoextension=pathinfo(basename($ficheros));
        $playlist_sinextension=basename($ficheros,'.'.$infoextension['extension']);
        echo "<option value='".$playlist_sinextension."'>".$playlist_sinextension."</option>";
      }
      ?>

        </select>
        
      </div>
        <button type="submit" value="" style="background-color: #2c4d6c6e;
        border: 1px solid #2c4d6c6e;width: 50%;padding: 10px;margin-top: 30px;">Enviar </button>
      </form>
    </div>
    </div>
    <div class="col-3">
     
      
    </div>
    <?php
 
 



  
  if(isset($_POST['playlist'])){
    $nombreplaylist=$_POST['playlist'];
    $contenidocancion=file_get_contents("../songs/".$_GET['cancion'].".json");
    $cancion=json_decode($contenidocancion,true);
    $fichero_playlist=file_get_contents("../playlist/".$nombreplaylist.".json");
    $playlist=json_decode($fichero_playlist,true);
    array_push($playlist["titulo_cancion"],$cancion["titulo_cancion"]);
    array_push($playlist["imgsrc"],$cancion["imgsrc"]);
    array_push($playlist["cancionssrc"],$cancion["cancionssrc"]);
    array_push($playlist["cantantes"],$cancion["cantantes"]);
    array_push($playlist["cover"],$cancion["cover"]);
    $guardar=json_encode($playlist);
    file_put_contents("../playlist/".$nombreplaylist.".json",$guardar);
  }

?>
  </section>
  <script src="../formulario.js"></script>
 
  <!--
  This script places a badge on your repl's full-browser view back to your repl's cover
  page. Try various colors for the theme: dark, light, red, orange, yellow, lime, green,
  teal, blue, blurple, magenta, pink!
  -->
</body>

</html>
