<?php

$token = $_SESSION['token'];
$stat = $_SESSION['stat'];
if($stat=='admin'){
if(isset($token) && isset($stat))
{

}else{
    header("Location: login.php");
    exit;
}
} else {
    header("Location: login.php");
    exit;
}

?>