<?php

$token = $_SESSION['token'];
$otherX = $_SESSION['otherX'];
$sta = $_SESSION['sta'];
if ($sta == 'client') {
    if (isset($token) || isset($otherX)) {

    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

?>