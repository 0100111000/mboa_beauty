<?php
include '../config.php';
$ID = $_GET['id'];

$requete = "UPDATE demande SET statut='En_cour' WHERE id=$ID";
if (mysqli_query($conn, $requete)) {
    echo "<script> alert('La commande vient d\\'être lancer'); window.location.href = 'index.php'; </script>";
} else {
    echo "Erreur : " . mysqli_error($conn);
}
?>