<?php
if(isset($_GET["prueba"]) && isset($_GET["id"])){
    $playlist=json_decode($_GET["prueba"],true);
    $id=$_GET["id"];
    print_r($_GET["prueba"]);
    print_r($playlist);
    unset($playlist["titulo_cancion"][$id]);
    unset($playlist["imgsrc"][$id]);
    unset($playlist["cancionssrc"][$id]);
    unset($playlist["cantantes"][$id]);
    unset($playlist["cover"][$id]);
    echo "../playlist".$playlist["playlistNombre"].".json";
    file_put_contents("../playlist/".$playlist["playlistNombre"].".json",json_encode($playlist));
}
?>