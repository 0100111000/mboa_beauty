<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../config.php";

// Vérifie la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Récupère les données de la requête POST et les valide
$lat = isset($_POST['lat']) && is_numeric($_POST['lat']) ? $_POST['lat'] : null;
$lng = isset($_POST['lng']) && is_numeric($_POST['lng']) ? $_POST['lng'] : null;
$nom = isset($_POST['nom']) && !empty($_POST['nom']) ? $_POST['nom'] : null;
$token = isset($_POST['token']) && !empty($_POST['token']) ? $_POST['token'] : null;

// Crée un tableau pour stocker vos données
$data = array();

if ($lat !== null && $lng !== null && $nom !== null && $token !== null) {
  // Prépare et exécute la requête SQL
  $stmt = $conn->prepare("UPDATE users SET lat=?, lng=? WHERE nom=? AND token=?");
  $stmt->bind_param("ddss", $lat, $lng, $nom, $token);
  
  if ($stmt->execute()) {
    // Si la requête a réussi, ajoutez les coordonnées à votre tableau de données
    $data['lat'] = $lat;
    $data['lng'] = $lng;
    $data['message'] = "Les coordonnées ont été mises à jour avec succès";
  } else {
    // Si la requête a échoué, ajoutez un message d'erreur à votre tableau de données
    $data['message'] = "Erreur lors de la mise à jour des coordonnées : " . $stmt->error;
  }
} else {
  // Si les données sont invalides, ajoutez un message d'erreur à votre tableau de données
  $data['message'] = "Données invalides reçues dans la requête POST";
}

// Convertissez le tableau de données en JSON et imprimez-le
$json = json_encode($data);
if ($json === null && json_last_error() !== JSON_ERROR_NONE) {
    echo "Erreur d'encodage JSON : " . json_last_error_msg();
} else {
    echo $json;
}

$conn->close();

