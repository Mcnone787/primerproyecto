<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <script src="https://kit.fontawesome.com/ba24da5ac1.js" crossorigin="anonymous"></script>
    <link href="../style.css" rel="stylesheet" type="text/css" />
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
 <div class="row" style="margin-top: 100px;">
    <div class="col-3"></div>
    <div class="col-6" >
        <div style="">
            <h2 style="text-align: center;">Perfil</h2>
            <p style="text-align: center;">Usuario: Admin </p>
            <h4>Canciones mas escuchadas segun tu interacciones</h4>
            <div style="overflow: auto;height: 100px; width: 100%; margin-top: 20px;" id="div_songs">
                <div style="">
                <img src="../imgs/jukebox.png" alt="cancionimg" height="70px" width="auto">
                <p style="display: inline-block;">info</p>
                </div>
                <div>
                    <img src="" alt="cancionimg">
                    <p style="display: inline-block;">info</p>
                    </div>
                    <div>
                        <img src="" alt="cancionimg">
                        <p style="display: inline-block;">info</p>
                        </div>
            </div>
        </div>

    </div>
    <div class="col-3"></div>
 </div>
</body>

</html>