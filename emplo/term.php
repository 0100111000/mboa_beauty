<?php
include '../config.php';
$ID = $_GET['id'];

$requete = "UPDATE demande SET statut='Terminer' WHERE id=$ID";
if (mysqli_query($conn, $requete)) {
    echo "<script> alert('La commande vient d\\'être Terminer'); window.location.href = 'index.php'; </script>";
} else {
    echo "Erreur : " . mysqli_error($conn);
}
?>