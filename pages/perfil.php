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
      <link href="/style.css" rel="stylesheet" type="text/css" />
      <link rel="icon" type="image/x-icon" href="imgs/rastreo.png">


  </head>

  <body id="back1">
  <nav class="row nav_main1">
    <div class="col-3">
    </div>

    <div class="col-6">
    <a href="/index.php"><img src="/imgs/jukebox.png" height="100px" class="logo"></a>      <ul id="menu1_" style="display: flex;
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
        padding: 20px'>Bienvenido:  ".$usuario_."<a href='/pages/perfil.php'><i class='fa-solid fa-user' style='margin-left:10px;'></i></a><a href='/pages/logout.php'><i class='fa-solid fa-arrow-right-from-bracket'></i></a></p>";
      }else{
        echo "<p style='    float: right;
        margin: 25px;
        border: solid;
        padding: 20px'><a href='/pages/sesion.php'>Registrarse</a></p>";
      }
      ?>
  </div>
    
  </nav>
  <div class="row" style="margin-top: 50px;">
      <div class="col-12" >
          <div style="">
              <h2 style="text-align: center;margin-bottom:50px;">Perfil</h2>
              <div style="margin: 0 auto;
      width: 60%;">
              <h4 style="margin-bottom:20px;text-align:center;">Cancion mas escuchada segun tu interacion</h4>
              </div>
              <div style="overflow: auto;height: 200px; width: 60%; margin-top: 20px;margin:0 auto;/* width */::-webkit-scrollbar {
    width: 20px;}" id="div_songs">
              <?php
              if(isset($_COOKIE["canciones"])){
                $cookie_main=json_decode($_COOKIE["canciones"],true);
                array_multisort($cookie_main["click"],SORT_DESC,$cookie_main["srcimg"],$cookie_main["titulo_cancion"]);
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
              }
               
                    ?>
                  
                  
          </div>
      </div>
      <div style="display: flex;
    flex-direction: row;
    justify-content: center;margin-bottom:20px;">
        <hr style="width:20%;">
      </div>
      <div class="row" >
      <div class="col-12" >
          <div style="">
              <div style="margin: 0 auto;
      width: 60%;">
              </div>
            <div style="    display: flex;
      flex-direction: row;
      justify-content: center; padding:20px;border:solid;
            border: gray 3px solid;
      border-radius:20px;">
            <div style="padding:20px;border-right:solid;width:50%;">
            <h4 style='text-align:center;'>Playlists mas escuchadas ordenadas de mas escucadas y alfabeticamente </h4>
            <div style="display: flex;
    flex-direction: row;
    justify-content: center;;margin-top:20px;margin-bottom:20px;">
                <a href="perfil.php?ordenado=alfabetic"> <button  style="color:black; ">Ordenar alfabeticamente</button></a>
                <a href="perfil.php?ordenado=escuchadas"><button style="color:black;margin-left:10px">Ordenar de mas escucadas a menos escuchadas</button></a>
                </div>
            <?php
              if(isset($_COOKIE["Playlists_lista_"])){
                $UltimaPlaylistsEscojida=json_decode($_COOKIE["Playlists_lista_"],true);

                if(isset($_GET["ordenado"])){
                  switch($_GET["ordenado"]){
                    case "escuchadas":
                      array_multisort($UltimaPlaylistsEscojida["clicks"],SORT_DESC,$UltimaPlaylistsEscojida["playlist"]);

                      break;
                      case "alfabetic":
                        array_multisort($UltimaPlaylistsEscojida["playlist"],SORT_DESC,$UltimaPlaylistsEscojida["clicks"]);
                      break; 
                      default:
                      break;
                  }
                }
                echo "<div style=''>
                <div style='display:flex;flex-direction: row;
                justify-content: center; margin-top:10px;'>
                            <div style='display: flex;
                            flex-direction: column;
                            justify-content: center;
                            margin-top: 20px;'>
                                <p style='text-align:center;'>Nombre Playlists </p>";
                for($i=0;$i<count($UltimaPlaylistsEscojida["playlist"]);$i++){
                 echo "<p style='text-align:center;margin-top:10px;'>".$UltimaPlaylistsEscojida["playlist"][$i]." </p>";
                }
                echo "
                          </div>
                          <div style='display: flex;
                          flex-direction: column;
                          justify-content: center;
                          margin-top: 20px;margin-left:20px;'>
                          <p style='margin-left:10px;text-align:center;'>Veces reproducidas la playlist </p>";
                          for($i=0;$i<count($UltimaPlaylistsEscojida["playlist"]);$i++){
                            echo "                                <p style='text-align:center;margin-top:10px;'>".$UltimaPlaylistsEscojida["clicks"][$i]." </p>
                            ";
                           }
                           echo "
                          </div>
                          </div> 
                          </div>  "; 
              } 
                           
                
              ?>
            </div>
            <div style="padding:20px;width:50%;">
            <?php
              if(isset($_COOKIE["Playlists"])){
                $UltimaPlaylistsEscojida=json_decode($_COOKIE["Playlists"],true);

                echo "<div style=''>
                <h4 style='text-align:center;'>Ultima playList escuchada</h4>
                <div style='display:flex;flex-direction: row;
                justify-content: center; margin-top:10px;'>
                            <div style='display: flex;
                            flex-direction: column;
                            justify-content: center;
                            margin-top: 20px;'>
                                <p style='text-align:center;'>Nombre </p>
                                <p style='text-align:center;margin-top:10px;'>".$UltimaPlaylistsEscojida["playlist"][0]." </p>
                            </div>
                            <div style='display: flex;
                            flex-direction: column;
                            justify-content: center;
                            margin-top: 20px;margin-left:20px;'>
                            <p style='margin-left:10px;text-align:center;'>Ultima vez escuchada </p>
                                  <p style='text-align:center;margin-top:10px;'>".$UltimaPlaylistsEscojida["fecha"][0]." </p>
                            </div>
                            </div>  
                           
                </div>
                </div>";
              }
               
              ?></div>
            </div>
                  

          <div style="margin-bottom:50px;"></div>
      </div>
  </div>
  </body>

  </html>