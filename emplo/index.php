<?php
session_start();
//include '../admin/redict.php';
include "../config.php";
if (isset($_SESSION['name'])) {

  $nom = $_SESSION['name'];

  $sql = "SELECT * FROM demande WHERE empl='$nom' AND statut='Accepter' ORDER BY id DESC  ";
  $result = $conn->query($sql);

  $sql1 = "SELECT * FROM demande WHERE empl='$nom' AND statut='En_cour' ORDER BY id DESC  ";
  $result1 = $conn->query($sql1);

  $sql2 = "SELECT * FROM demande WHERE empl='$nom' AND statut='Terminer' ORDER BY id DESC";
  $result2 = $conn->query($sql2);


  if ($_SESSION['defaut'] == '1') {
    // Vérifiez si la session 'modalShown' n'existe pas
    if (!isset($_SESSION['modalShown'])) {
      // Redirigez vers la boîte modale
      header("Location: #openModal");

      // Définissez la session 'modalShown' pour éviter les redirections futures
      $_SESSION['modalShown'] = true;
    }
  }
} else {
  header("Location: login.php?pro=deco");
}

?>

<script>
  function updateGeolocation() {
    if (navigator.geolocation) {
      var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: Infinity // Utiliser une position mise en cache
      };

      navigator.geolocation.getCurrentPosition(function (position) { // Utiliser getCurrentPosition au lieu de watchPosition
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };

        // Vérifiez si les coordonnées sont valides
        if (typeof pos.lat === "number" && typeof pos.lng === "number") {
          // Récupérer le nom de l'utilisateur et l'identifiant de la variable de session
          var nom = "<?php echo $_SESSION['name']; ?>";
          var token = "<?php echo $_SESSION['token']; ?>";

          // Créer une requête AJAX pour envoyer 'pos', 'username' et 'userId' à votre script PHP
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "script.php", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
              // La requête a été traitée avec succès
              var response = xhr.responseText;
              // Parsez la réponse JSON si nécessaire
              var data = JSON.parse(response);

              // Utilisez les données dans votre page web
              var latitude = data.lat;
              var longitude = data.lng;

              // Faites quelque chose avec les coordonnées
              console.log("Latitude : " + latitude);
              console.log("Longitude : " + longitude);

              // Affiche un message dans la console lorsque les données sont envoyées avec succès
              console.log("Les données géographiques ont été envoyées avec succès");
            }
          };
          // Envoyer les données de position, le nom de l'utilisateur et l'identifiant
          xhr.send("lat=" + pos.lat + "&lng=" + pos.lng + "&nom=" + nom + "&token=" + token);
        } else {
          console.error("Invalid coordinates");
        }

      }, function () {
        handleLocationError(true, "Erreur de géolocalisation");
      }, options);
    } else {
      // Le navigateur ne supporte pas la géolocalisation
      handleLocationError(false, "La géolocalisation n'est pas supportée par ce navigateur");
    }
  }

  function handleLocationError(browserHasGeolocation, errorMessage) {
    // Affiche un message d'erreur à l'utilisateur
    alert(errorMessage);
  }

  // Appelle la fonction updateGeolocation toutes les 30 secondes
  setInterval(updateGeolocation, 30000);

</script>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>mboa Employer</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet" />
  <link href="fontawesome/css/all.min.css" rel="stylesheet" />
  <link href="css/tooplate-chilling-cafe.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style>
    .modalDialog {
      position: fixed;
      font-family: Arial, Helvetica, sans-serif;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background: rgba(0, 0, 0, 0.1);
      z-index: 99999;
      opacity: 0;
      -webkit-transition: opacity 400ms ease-in;
      -moz-transition: opacity 400ms ease-in;
      transition: opacity 400ms ease-in;
      pointer-events: none;
    }

    .modalDialog:target {
      opacity: 1;
      pointer-events: auto;
    }

    .modalDialog>div {
      width: 400px;
      position: relative;
      margin: 10% auto;
      padding: 5px 20px 13px 20px;
      border-radius: 10px;
      background: -moz-linear-gradient(#2edbe8, #01a6b2);
      background: -webkit-linear-gradient(#2edbe8, #01a6b2);
      background: -o-linear-gradient(#2edbe8, #01a6b2);
    }

    .close {
      background: #606061;
      color: #ffffff;
      line-height: 25px;
      position: absolute;
      right: -12px;
      text-align: center;
      top: -10px;
      width: 24px;
      text-decoration: none;
      font-weight: bold;
      -webkit-border-radius: 12px;
      -moz-border-radius: 12px;
      border-radius: 12px;
      -moz-box-shadow: 1px 1px 3px #000;
      -webkit-box-shadow: 1px 1px 3px #000;
      box-shadow: 1px 1px 3px #000;
    }

    .close:hover {
      background: #6ed1d8;
    }
  </style>
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <div class="nav">
    <input type="checkbox" id="nav-check">
    <div class="nav-header">
      <div class="nav-title">
        Mboa Beauty
      </div>
    </div>
    <div class="nav-btn">
      <label for="nav-check">
        <span></span>
        <span></span>
        <span></span>
      </label>
    </div>

    <div class="nav-links">
      <a href="index.php">Home</a>
      <a href="#tache" >Tâches</a>
      <a href="#" >Information</a>
      <a href="#hist" >Historique</a>
      <a href="comptes.php" >Profile</a>
      <a href="login.php?decon=des">Déconnexion</a>
    </div>
  </div>

  <div class="tm-container">
    <div class="tm-text-white tm-page-header-container">
      <h1 class="tm-page-header">Black House Africa.</h1>
    </div>
    <div class="tm-main-content">
      <div id="tm-intro-img"></div>

      <a href="#openModal"></a>
      <div id="openModal" class="modalDialog">
        <div>
          <a href="#close" title="Close" class="close">X</a>
          <h2>Attention !!</h2>
          <p>Pour des raisons de sécurité il vous êtes conseiller de modifier votre mot de passe!</p><br />
          <a class='btn btn-success' href='comptes.php'>Modifier</a>
        </div>
        <a href="#close" title="Close" class="close">x</a>
      </div>
      <!-- Coffee Menu -->
      <section class="tm-section">
        <h2 class="tm-section-header" id='tache'>Liste des tâches à Accomplir</h2>
        <div class="tm-responsive-table">
          <table>
            <?php
            $data = array();
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $data[] = $row;
              }
            }
            ?>
            <tr class="tm-tr-header">
              <th>N°</th>
              <?php
              $counter = 1;
              foreach ($data as $row) {
                echo "<th>$counter</th>";
                $counter++;
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Secteur</td>
              <?php
              foreach ($data as $row) {
                echo "<th>" . $row['secteur'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Activité</td>
              <?php
              foreach ($data as $row) {
                echo "<th>" . $row['activite'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Nom</td>
              <?php
              foreach ($data as $row) {
                echo "<th>" . $row['nom'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Prix</td>
              <?php
              foreach ($data as $row) {
                echo "<th>" . $row['prix'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Date et heure (RDV)</td>
              <?php
              foreach ($data as $row) {
                echo "<th>" . $row['date'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Lieux</td>
              <?php
              foreach ($data as $row) {
                echo "<th>" . $row['lieux'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Quartier</td>
              <?php
              foreach ($data as $row) {
                echo "<th>" . $row['quartier'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Client</td>
              <?php
              foreach ($data as $row) {
                $t = $row['token'];
                $sqls = "SELECT * FROM users WHERE token='$t' ";
                $results = $conn->query($sqls);
                if ($results->num_rows > 0) {
                  while ($roww = $results->fetch_assoc()) {
                    echo "<th>" . $roww['nom'] . "</th>";
                  }
                }
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Actions</td>
              <?php
              foreach ($data as $row) {
                echo "<th> <a class='btn btn-success' href='cmc.php?id=" . $row['id'] . "'>Commencer</a></th>";
              }
              ?>

            </tr>
          </table>

        </div>
      </section>

      <!-- Tea Menu -->
      <section class="tm-section">
        <h2 class="tm-section-header" id='hist'>Tâche en cours d'acomplissement</h2>
        <div class="tm-responsive-table">
          <table>
            <?php
            $datas1 = array();
            if ($result1->num_rows > 0) {
              while ($row = $result1->fetch_assoc()) {
                $datas1[] = $row;
              }
            }
            ?>
            <tr class="tm-tr-header">
              <th>N°</th>
              <?php
              $counte = 1;
              foreach ($data as $row) {
                echo "<th>$counte</th>";
                $counte++;
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Secteur</td>
              <?php
              foreach ($datas1 as $row) {
                echo "<th>" . $row['secteur'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Activité</td>
              <?php
              foreach ($datas1 as $row) {
                echo "<th>" . $row['activite'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Nom</td>
              <?php
              foreach ($datas1 as $row) {
                echo "<th>" . $row['nom'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Prix</td>
              <?php
              foreach ($datas1 as $row) {
                echo "<th>" . $row['prix'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Date et heure (RDV)</td>
              <?php
              foreach ($datas1 as $row) {
                echo "<th>" . $row['date'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Lieux</td>
              <?php
              foreach ($datas1 as $row) {
                echo "<th>" . $row['lieux'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Quartier</td>
              <?php
              foreach ($datas1 as $row) {
                echo "<th>" . $row['quartier'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Client</td>
              <?php
              foreach ($datas1 as $row) {
                $t = $row['token'];
                $sqls = "SELECT * FROM users WHERE token='$t' ";
                $results = $conn->query($sqls);
                if ($results->num_rows > 0) {
                  while ($roww = $results->fetch_assoc()) {
                    echo "<th>" . $roww['nom'] . "</th>";
                  }
                }
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Actions</td>
              <?php
              foreach ($datas1 as $row) {
                echo "<th> <a class='btn btn-danger' href='term.php?id=" . $row['id'] . "'>Terminer</a></th>";
              }
              ?>

            </tr>
          </table>

        </div>
      </section>
      <!-- About our cafe -->
      <section class="tm-section">
        <h2 class="tm-section-header" id='term'>Tâche Terminer</h2>
        <div class="tm-responsive-table">
          <table>
            <?php
            $datas1 = array();
            if ($result2->num_rows > 0) {
              while ($row = $result2->fetch_assoc()) {
                $datas1[] = $row;
              }
            }
            ?>
            <tr class="tm-tr-header">
              <th>N°</th>
              <?php
              $counte = 1;
              foreach ($data as $row) {
                echo "<th>$counte</th>";
                $counte++;
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Secteur</td>
              <?php
              foreach ($datas1 as $row) {
                echo "<th>" . $row['secteur'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Activité</td>
              <?php
              foreach ($datas1 as $row) {
                echo "<th>" . $row['activite'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Nom</td>
              <?php
              foreach ($datas1 as $row) {
                echo "<th>" . $row['nom'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Prix</td>
              <?php
              foreach ($datas1 as $row) {
                echo "<th>" . $row['prix'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Date et heure (RDV)</td>
              <?php
              foreach ($datas1 as $row) {
                echo "<th>" . $row['date'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Lieux</td>
              <?php
              foreach ($datas1 as $row) {
                echo "<th>" . $row['lieux'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Quartier</td>
              <?php
              foreach ($datas1 as $row) {
                echo "<th>" . $row['quartier'] . "</th>";
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Client</td>
              <?php
              foreach ($datas1 as $row) {
                $t = $row['token'];
                $sqls = "SELECT * FROM users WHERE token='$t' ";
                $results = $conn->query($sqls);
                if ($results->num_rows > 0) {
                  while ($roww = $results->fetch_assoc()) {
                    echo "<th>" . $roww['nom'] . "</th>";
                  }
                }
              }
              ?>
            </tr>
            <tr>
              <td class="tm-text-left">Statut</td>
              <?php
              foreach ($datas1 as $row) {
                if(isset($row['token_pay'])){ 
                  echo "<th>" . $row['statut'] . "(Payer) </th>";
                }else{
                   echo "<th>" . $row['statut'] . "(Non payer) </th>";
                }
              }
              ?>
            </tr>
          </table>

        </div>
      </section>
      <section class="tm-section tm-section-small">
        <h2 class="tm-section-header">Notre Objectif Principal</h2>
        <p>
          Améliorer l’image et la réputation de la marque en respectant des normes élevées de qualité, de durabilité et
          de responsabilité sociale.
        </p>
      </section>
      <hr />
      <!-- Talk to us -->
      <section class="tm-section tm-section-small">
        <h2 class="tm-section-header">Talk to us</h2>
        <p class="tm-mb-0">

          <a href="mailto:info@example.com" class="tm-contact-link">
            nous joindre par ou suivez-nous sur les icônes sociales ci-dessous.</a>
        </p>
        <div class="tm-social-icons">
          <div class="tm-social-link-container">
            <a href="https://fb.com/tooplate" class="tm-social-link">
              <i class="fab fa-facebook"></i>
            </a>
          </div>
          <div class="tm-social-link-container">
            <a href="https://instagram.com" class="tm-social-link">
              <i class="fab fa-instagram"></i>
            </a>
          </div>
        </div>
      </section>
    </div>
    <footer>
      <p class="tm-text-white tm-footer-text">
        Copyright &copy; 2023 MERKS.
      </p>
    </footer>
  </div>

</body>

</html>