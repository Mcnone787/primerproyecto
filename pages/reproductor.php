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
  <nav class="row nav_main1">
    <div class="col-3">
    </div>

    <div class="col-6">
      <img src="/imgs/jukebox.png" height="100px" class="logo">
      <ul id="menu1_">
        <a href="pages/anadir_play.php"> <li class="menu1">Añadir Playlist</li></a>
        <li class="menu1">|</li>
       <a href="/anadir_cancion.php"> <li class="menu1">Añadir cancion</li></a>
        <li class="menu1">|</li>
        <li class="menu1">Editar PlayList</li>
        <li class="menu1">|</li>
        <li class="menu1">Sesion</li>
      </ul>
    </div>
    <div class="col-3">
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

       $i_main=0;
       foreach (glob("../playlist/".$_GET["playlist"].".json") as  $ficheros) {
       $prueba1=file_get_contents($ficheros);
       $prueba2=json_decode($prueba1,true);
       
       echo "
       
       ";
       
       for($i=0;$i<count($prueba2["titulo_cancion"]);$i++){
         if($prueba2["titulo_cancion"][$i]==null){

         }else{
           echo "
           <p class='cancion cancioneslista' id='".$i."'>".$prueba2["titulo_cancion"][$i]."</p>"  ;  
         }
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
        <center> <img src="<?php echo $prueba2["imgsrc"][0]?>" height="auto" width="65%" style="clip-path: circle();" 
        id="img_songs" alt="Imagen cancion" displ></center>
    </div>
    
    
    
    
    <div class="row" style="height: 100px;
    z-index: 2;
    width: 100%;
    background-color: #2c4d6c6e;
    margin-top: 100px;
    border-radius: 10px;">
      <div class="col-3">
        <div >
     <h4 style="text-align:center;">titulo</h4>
     <p id="titulo" style="text-align:center;"></p>
     </div>
      </div>
      <div class="col-6">
<i class="fa-solid fa-backward" style="margin-right: 20px;" id="back"></i>
<i class="fa-solid fa-play" id="btn_start" ></i>
<input type="range" id="prueba" value="0" max="283.08898" >
<i class="fa-solid fa-circle-stop" style="margin-right: 20px;font-size: 20px;margin-left: 20px;" id="stop"></i>
<i class="fa-solid fa-shuffle" id="random"></i>
<i class="fa-solid fa-forward" style="margin-left: 20px;" id="next"></i>
</div>  
<div class="col-3">
  <div>
     <p>Autores</p>
     <p id="autores"></p>
    </div>
</div>
</div>
      </div>
  </div>
    
    <script>
    let jsonJS=<?php echo $prueba1;?>
    
</script>
  <script src="../script.js">


  </script>
  

 
  <!--
  This script places a badge on your repl's full-browser view back to your repl's cover
  page. Try various colors for the theme: dark, light, red, orange, yellow, lime, green,
  teal, blue, blurple, magenta, pink!
  -->
</body>

</html>