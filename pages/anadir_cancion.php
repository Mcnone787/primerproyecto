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
        <a href="anadir_play.php"> <li class="menu1">Añadir Playlist</li></a>
        <li class="menu1">|</li>
        <li class="menu1" >Añadir cancion</li>
        <li class="menu1">|</li>
        <li class="menu1">Editar PlayList</li>
        <li class="menu1">|</li>
        <li class="menu1">Sesion</li>
      </ul>
    </div>
    <div class="col-3">
    </div>

  </nav>
  <section class="row">
    <div class="col-3">

    </div>
    <div class="col-6">
      <div style="margin: 0 auto;">
      <h2 style="text-align: center;">Añadir Cancion  </h2>
      <form action="" style="text-align: center;" id="" method="post" action="anadir_play.php">
        <div id="formulario">
        <input type='text' name='titulo' id='' class='formulario_inputs' placeholder='Nombre cancion'>
        <input type="text" name="url_song" id="" class="formulario_inputs" placeholder="Url cancion">
        <input type='text' name='url_img' id='' class='formulario_inputs' placeholder='Url Imagen'>
        <input type='text' name='cantantes' id='' class='formulario_inputs' placeholder='Cantantes'>
        <input type='text' name='cover' id='' class='formulario_inputs' placeholder='Cover'>
      </div>
        <button type="submit" value="" style="background-color: #2c4d6c6e;
        border: 1px solid #2c4d6c6e;width: 50%;padding: 10px;margin-top: 30px;">Enviar </button>
      </form>
    </div>
    </div>
    <div class="col-3">
     
      
    </div>
    <?php
  ini_set('display_errors', 0);

  $nombreplay=$_POST["nombre"];
  $nombrecancion=$_POST["titulo"];
  $url_canciones=$_POST["url_song"];
  $url_img=$_POST["url_img"];
  $cantantes=$_POST["cantantes"];
  $cover=$_POST["cover"];
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
  <script src="../formulario.js"></script>
 
  <!--
  This script places a badge on your repl's full-browser view back to your repl's cover
  page. Try various colors for the theme: dark, light, red, orange, yellow, lime, green,
  teal, blue, blurple, magenta, pink!
  -->
</body>

</html>
