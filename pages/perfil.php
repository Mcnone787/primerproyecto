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
      <img src="../imgs/jukebox.png" height="100px" class="logo">
      <ul id="menu1_">
        <a href="pages/anadir_play.php"> <li class="menu1">Añadir Playlist</li></a>
        <li class="menu1">|</li>
       <a href="pages/anadir_cancion.php"> <li class="menu1">Añadir cancion</li></a>
        <li class="menu1">|</li>
        <li class="menu1">Editar PlayList</li>
        <li class="menu1">|</li>
        <li class="menu1">Sesion</li>
      </ul>
    </div>
    <div class="col-3">
    </div>

  </nav>
 <div class="row" style="margin-top: 50px;">
    <div class="col-12" >
        <div style="">
            <h2 style="text-align: center;margin-bottom:50px;">Perfil</h2>
            <div style="margin: 0 auto;
    width: 60%;">
            <h4 style="margin-bottom:20px;">Cancion mas escuchada segun tu interacion</h4>
            </div>
            <div style="overflow: auto;height: 200px; width: 60%; margin-top: 20px;margin:0 auto;/* width */
::-webkit-scrollbar {
  width: 20px;
}" id="div_songs">
            <?php
              $cookie_main=json_decode($_COOKIE["canciones"],true);
              array_multisort($cookie_main["click"],SORT_DESC,$cookie_main["srcimg"],$cookie_main["titulo_cancion"]);
            ?>
                 <?php
                 echo  "<div style=''>
  <div style='display:flex;'>
  <img src='".$cookie_main["srcimg"][0]."' alt='cancionimg' height='90px' width='auto'>
  <h4>Puesto numero 1</h4>
  <div style='display: flex;
  flex-direction: column;
  justify-content: center;'>
  <p >Nombre de la cancion: ".$cookie_main["titulo_cancion"][0]." </p>
  <p>Has reproducido la cancion ".$cookie_main["click"][0]." veces</p>
  </div>
  </div>
  </div>";
                    // for($i=0;$i<count($cookie_main["titulo_cancion"]);$i++){
                    //   echo "
                    //   <div style=''>
                    //   <div style='display:flex;'>
                    //   <img src='".$cookie_main["srcimg"][$i]."' alt='cancionimg' height='90px' width='auto'>
                    //   <h4>Puesto numero ".($i+1)."</h4>
                    //   <div style='display: flex;
                    //   flex-direction: column;
                    //   justify-content: center;'>
                    //   <p >Nombre de la cancion: ".$cookie_main["titulo_cancion"][$i]." </p>
                    //   <p>Has reproducido la cancion ".$cookie_main["click"][$i]." veces</p>
                    //   </div>
                    //   </div>
                    //   </div>";
                    // }
                  ?>
                
                
        </div>
        <div style="margin-bottom:50px;"></div>
    </div>
 </div>
</body>

</html>