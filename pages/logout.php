<?php
setcookie("canciones", "", time()-3600);
setcookie("Playlists", "", time()-3600);
setcookie("Playlists_lista_", "", time()-3600);
session_start();
session_destroy();
header("Location: ../index.php")

?>