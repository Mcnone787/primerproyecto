<?php

if(isset($_POST["usuario"])){
  session_start();
  $_SESSION["usuario"]=$_POST["usuario"];

  $valores_reproductor=(object)[
    'playlist'=>[],
    'titulo_cancion'=>[],
    'srcimg'=>[],
    'click'=>[]
  ];
  $playlists_=(object)[
    'playlist'=>[],
    'fecha'=>[]
  ];
  $playlists_lista_=(object)[
    'playlist'=>[],
    'clicks'=>[]
  ];
  setcookie("canciones", json_encode($valores_reproductor),time()+60*60*24*30,"/");
  setcookie("Playlists", json_encode($playlists_),time()+60*60*24*30,"/");
  setcookie("Playlists_lista_", json_encode($playlists_lista_),time()+60*60*24*30,"/");
  header('Location: /index.php');
  exit;

}

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
   <a href="/index.php"><img src="/imgs/jukebox.png" height="100px" class="logo"></a>      <ul id="menu1_">
        <a href="/pages/anadir_play.php"> <li class="menu1">Añadir Playlist</li></a>
      <li class="menu1" >|</li>
      <a href="/pages/anadir_cancion.php"><li class="menu1" >Añadir cancion</li></a>
        <li class="menu1">|</li>
        <li class="menu1">Editar PlayList</li></a>
      </ul>
    </div>
    <div class="col-3">
    </div>

  </nav>

  <br>

  <section class="row">
    <div class="col-3">

    </div>
    <div class="col-6">
      <div style="margin: 0 auto;">
      <h2 style="text-align: center;">Crear usuario</h2>
      <form action="" style="text-align: center;" id="" method="post" >
        <div id="formulario">
        <input type="text" name="usuario" id="" class="formulario_inputs" placeholder="Nombre Usuario">
        <button type="submit" value="" style="background-color: #2c4d6c6e;
        border: 1px solid #2c4d6c6e;width: 50%;padding: 10px;margin-top: 30px;">Enviar </button>
      </form>
    </div>
    </div>
    <div class="col-3">
      
    </div>
  </section>

  <script src="../formulario.js"></script>
 
  <!--
  This script places a badge on your repl's full-browser view back to your repl's cover
  page. Try various colors for the theme: dark, light, red, orange, yellow, lime, green,
  teal, blue, blurple, magenta, pink!
  -->
</body>

</html>
