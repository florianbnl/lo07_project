<?php
session_start();
$_SESSION['login'] = "vide";
header('Location: app/router/router1.php?action=truc');

?>

