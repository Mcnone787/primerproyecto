<?php
unlink("../".$_GET["prueba"]);
header('Location: /index.php');
exit;
?>