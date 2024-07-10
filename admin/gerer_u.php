<?php
session_start();
// Vérifier si le formulaire a été transmis
// Récupérer les données de la base de données
include 'redict.php';
include '../config.php';

$id = $_GET['id'];
if(isset($_GET['users'])){
     $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
               $sql1 = "UPDATE `demande` SET `statut`='En_attente', empl=NULL WHERE `empl` = '" . $row['nom'] . "'";
               $result1 = $conn->query($sql1);
          }
     }
     $sql2 = "UPDATE `users` SET statu='emplX' WHERE `id` = '$id'";
     $result2 = $conn->query($sql2);  
}
header('Location: gerer_compte.php');
exit;
?>