<?php
// Supprimer le cookie
session_start();
setcookie('token', '', time() - 3600, '/pro');
session_destroy();
header("Location: index.php");
exit;

?>