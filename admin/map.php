<!DOCTYPE html>
<html>

<head>
  <title>Carte des utilisateurs</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <style>
    /* Style pour la carte */
    #map {
      width: 100%;
      height: 400px;
    }
  </style>
</head>

<body>
  <?php
  include "../config.php";
  // Récupère les coordonnées et les autres informations de tous les utilisateurs
  $sql = "SELECT lat, lng, nom, token, statu, tel FROM users";
  $result = $conn->query($sql);

  // Convertit les résultats en un tableau que JavaScript peut utiliser
  $locations = array();
  while ($row = $result->fetch_assoc()) {
    $locations[] = array($row['lat'], $row['lng'], $row['nom'], $row['token'], $row['statu'], $row['tel']);
  }

  $conn->close();
  ?>

  <!-- Div pour la carte -->
  <div id="map"></div>

  <script>
    // Fonction pour initialiser la carte
    function initMap() {
      var map = L.map('map').setView([-33.92, 151.25], 10);

      // Ajoute le fond de carte OpenStreetMap
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
      }).addTo(map);

      // Ajoute des marqueurs à la carte pour chaque emplacement
      var locations = <?php echo json_encode($locations); ?>;
      for (var i = 0; i < locations.length; i++) {
        var location = locations[i];

        // Crée le contenu de l'info-bulle
        var content = "Nom : " + location[2] + "<br/>" +
          "Token : " + location[3] + "<br/>" +
          "Statut : " + location[4] + "<br/>" +
          "Numéro : " + location[5];

        // Ajoute un marqueur avec une info-bulle à la carte
        L.marker([location[0], location[1]]).addTo(map)
          .bindPopup(content);
      }
    }

    // Initialise la carte
    initMap();
  </script>
</body>

</html>