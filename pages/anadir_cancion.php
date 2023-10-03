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
    <link href="../style.css" rel="stylesheet" type="text/css" />
  

</head>

<body id="back1">
<nav class="row nav_main1">
    <div class="col-3">
    </div>

    <div class="col-6">
    <a href="/index.php"><img src="/imgs/jukebox.png" height="100px" class="logo"></a>
      <ul id="menu1_" style="display: flex;
    justify-content: center;">
        <a href="/pages/anadir_play.php"> <li class="menu1">Añadir Playlist</li></a>
        <li class="menu1">|</li>
       <a href="/pages/anadir_cancion.php"> <li class="menu1">Añadir cancion</li></a>
        <li class="menu1">|</li>
        <li class="menu1">Editar PlayList</li>
      </ul>
    </div>
    <div class="col-3">
      <?php

      if(isset($_SESSION["usuario"])){
        $usuario_=$_SESSION["usuario"];
        echo "<p style='    float: right;
        margin: 25px;
        border: solid;
        padding: 20px'>Bienvenido:  ".$usuario_."<a href='/pages/perfil.php'><i class='fa-solid fa-user' style='margin-left:10px;'></i></a><a href='pages/logout.php'><i class='fa-solid fa-arrow-right-from-bracket'></i></a></p>";
      }else{
        echo "<p style='    float: right;
        margin: 25px;
        border: solid;
        padding: 20px'><a href='/pages/sesion.php'>Registrarse</a></p>";
      }
      ?>
  </div>
    
  </nav>
  <section class="row">
    <div class="col-3">
    <button  value="" style="background-color: #2c4d6c6e;
        border: 1px solid #2c4d6c6e;width: 70%;padding: 10px;margin-top: 30px;margin-left:60px;" id="ficherolocal">Fichero local  <p>Los ficheros no pueden superar los <?php     echo ini_get("upload_max_filesize");?></p></button>
               

    </div>
    <div class="col-6">
      <div style="margin: 0 auto;margin-top:20px;">
      <h2 style="text-align: center;">Añadir Cancion  </h2>
      
        </div>
        <div id="back_formulario">
        
      
    </div>
    </div>
    <div class="col-3">
    <button value="" style="background-color: #2c4d6c6e;
        border: 1px solid #2c4d6c6e;width: 70%;padding: 10px;margin-top: 30px;" id="ficheroexterno">Fichero externo </button>
      
    </div>
    <?php
  

  $nombreplay="";
  $nombrecancion="";
  $url_canciones="";
  $url_img="";
  $cantantes="";
  $cover="";
if(isset($_POST["nombre"])){
  $nombreplay=$_POST["nombre"];
}
if(isset($_POST["titulo"])){
    $nombrecancion=$_POST["titulo"];
}
if(isset($_POST["url_song_externo"])){
      $nombrecancion=$_POST["url_song_externo"];
}
if(isset($_POST["url_img"])){
      $url_img=$_POST["url_img"];
}
if(isset($_POST["cantantes"])){
        $cantantes=$_POST["cantantes"];
}
if(isset($_POST["cover"])){
        $cover=$_POST["cover"];
}

if(isset($_FILES["url_song_local"]) && isset($_FILES["url_img_local"])){
  
  $tmp_nameimg=$_FILES["url_img_local"]["tmp_name"];
  $url_img="../imgs/".$_FILES["url_img_local"]["name"];
  move_uploaded_file($tmp_nameimg,$url_img);

  $tmp_name=$_FILES["url_song_local"]["tmp_name"];
  $url_canciones="../songsfileslocal/".$_FILES["url_song_local"]["name"];
  move_uploaded_file($tmp_name,$url_canciones);
}
 
  
  $cancion=[
    "titulo_cancion"=>$nombrecancion,
    "imgsrc"=>$url_img,
    "cancionssrc"=>$url_canciones,
    "cantantes"=>$cantantes,
    "cover"=>$cover,
  ];   


$guardar= json_encode($cancion);
file_put_contents("../songs/".$nombrecancion.".json",$guardar);
?>
  </section>
<script src="../anadir_cancion.js"></script> 
  <!--
  This script places a badge on your repl's full-browser view back to your repl's cover
  page. Try various colors for the theme: dark, light, red, orange, yellow, lime, green,
  teal, blue, blurple, magenta, pink!
  -->
</body>

</html>
