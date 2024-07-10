<?php
session_start();
// Vérifier si le formulaire a été transmis
// Récupérer les données de la base de données
include 'redict.php';
include '../config.php';

$id = $_GET['id'];
$tab = $_GET['table'];

// Préparer la requête SQL
$stmt = $conn->prepare("SELECT * FROM `$tab` WHERE `id` = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lien = "../images/ressources/" .$tab. "/".$row['image']."";
        if (file_exists($lien)) {
            // Supprimer le fichier
            if (unlink($lien)) {
                // echo 'Le fichier a été supprimé avec succès.';
            }
        }
    }
}

// Préparer la requête SQL pour supprimer la ligne
$stmt = $conn->prepare("DELETE FROM `$tab` WHERE `id` = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header('Location: service.php');
exit;
?>