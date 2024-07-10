<?php
session_start();
include "../config.php";

$ID = $_GET['id'];
$A = $_GET['act'];

$requete = "UPDATE demande SET statut='Rejeter' WHERE id=$ID";
if (mysqli_query($conn, $requete)) {
    echo "<script> alert('Votre Commande a été Annuler avec succès'); window.location.href = 'demande.php?go=good'; </script>";
} else {
    echo "Erreur : " . mysqli_error($conn);
}

?>