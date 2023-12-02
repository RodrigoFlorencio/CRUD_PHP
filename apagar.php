<?php 

setcookie('nomeUsuario', '', time() - 3600);

header('Location: index.php');
exit;

?>