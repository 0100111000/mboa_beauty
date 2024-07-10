<?php
session_start();
// Vérifier si le formulaire a été transmis
// Récupérer les données de la base de données
include 'redict.php';
include '../config.php';

$sql = "SELECT * FROM demande WHERE statut='En_cour' and secteur='hommes' ORDER BY id DESC  ";
$result = $conn->query($sql);

$sql1 = "SELECT * FROM demande WHERE statut='En_cour' and secteur='femmes' ORDER BY id DESC  ";
$result1 = $conn->query($sql1);

$sql2 = "SELECT * FROM demande WHERE statut='En_cour' and secteur='soins' ORDER BY id DESC  ";
$result2 = $conn->query($sql2);

$sql3 = "SELECT * FROM demande WHERE statut='En_cour' and secteur='onglerie' ORDER BY id DESC  ";
$result3 = $conn->query($sql3);

$sql4 = "SELECT * FROM demande WHERE statut='En_cour' and secteur='makeup' ORDER BY id DESC  ";
$result4 = $conn->query($sql4);

$sql5 = "SELECT * FROM demande WHERE statut='En_cour' and secteur='autre' ORDER BY id DESC  ";
$result5 = $conn->query($sql5);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Mboa beauty</title>
  <!--

    Template 2106 Soft Landing

  http://www.tooplate.com/view/2106-soft-landing

    -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="team" content="">
  <meta http-equiv="refresh" content="100">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="css/tooplate.css">
  <link rel="stylesheet" href="css/ajout.css">


</head>

<body>

  <!-- PRE LOADER -->
  <section class="preloader">
    <div class="spinner">

      <span class="spinner-rotate"></span>

    </div>
  </section>


  <!-- MENU -->
  <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">

      <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
        </button>

        <!-- lOGO TEXT HERE -->
        <a href="index.php" class="navbar-brand">Mboa Adminer</a>
      </div>

      <!-- MENU LINKS -->
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php" class="smoothScroll">Home</a></li>
          <li><a href="gerer_compte.php" class="smoothScroll">Gerer Compte</a></li>
          <li><a href="ajouter.php" class="smoothScroll">Ajouter Employer</a></li>
          <li><a href="ajouter_p.php" class="smoothScroll">Ajouter Service</a></li>
          <li><a href="demande.php" class="smoothScroll">Les Demandes</a></li>
          <li><a href="service.php" class="smoothScroll">Les Services</a></li>
          <li><a href="map.php" target="_blank" class="smoothScroll">Carte</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Say hello - <span>
                <?php echo $_SESSION['email']; ?>
              </span></a></li>
        </ul>
      </div>

    </div>
  </section>

  <!-- FEATURE -->
  <section id="home" data-stellar-background-ratio="0.5">
    <div id="img">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">

          <div class="col-md-offset-3 col-md-6 col-sm-12">
            <div class="home-info">
              <h3>Espace d'administration Mboa Beauty</h3>
              <h1>La liste des différentes demande en cour de réalisation</h1>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <footer id="footer" data-stellar-background-ratio="0.5">
    <!-- Affichage du tableau HTML avec classes Bootstrap -->
    <style>
      .table-scroll {
        overflow-x: auto;
      }
    </style>
    <div class="table-scroll">
      <h1>Liste des Demandes</h1>
       <a class="btn btn-success " href="h_demande.php">Historique des demandes</a>
    <a class="btn btn-success " href="a_demande.php">Demande en Accepter</a>
    <a class="btn btn-success " href="demande.php">Demande en Attente</a>
      <table class="table table-bordered table-light">
        <h2>Hommes</h2>
        <thead class="thead-dark">
          <tr>
            <th>N°</th>
            <th>Secteur</th>
            <th>Activite</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Date d'émission</th>
            <th>Date et Heure (RDV)</th>
            <th>Lieux</th>
            <th>Quartier</th>
            <th>Client</th>
            <th>Statut</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
            $counter = 1;
            while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <td>
                  <?php echo $counter; ?>
                </td>
                <td>
                  <?php echo $row['secteur']; ?>
                </td>
                <td>
                  <?php echo $row['activite']; ?>
                </td>
                <td>
                  <?php echo $row['nom']; ?>
                </td>
                <td>
                  <?php echo $row['prix']; ?>
                </td>
                <td>
                  <?php echo $row['date_act']; ?>
                </td>
                <td>
                  <?php echo $row['date']; ?>
                </td>
                <td>
                  <?php echo $row['lieux']; ?>
                </td>
                <td>
                  <?php echo $row['quartier']; ?>
                </td>
                <td>
                  <?php
                  $t = $row['token'];
                  $sqls = "SELECT * FROM users WHERE token='$t' ";
                  $results = $conn->query($sqls);
                  if ($results->num_rows > 0) {
                    while ($roww = $results->fetch_assoc()) {
                      echo $roww['nom'];
                    }
                  }
                  ?>
                </td>

                <td>
                  <?php echo $row['statut']; ?>

              </tr>
              <?php
              $counter++;
            }
          } else {
            ?>
            <tr>
              <td colspan="6" class="text-center">Aucune donnée trouvée.</td>
            </tr>
            <?php
          }
          ?>
        </tbody>

      </table>

      <table class="table table-bordered table-light">
        <h2>Femmes</h2>
        <thead class="thead-dark">
          <tr>
            <th>N°</th>
            <th>Secteur</th>
            <th>Activite</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Date d'émission</th>
            <th>Date et Heure (RDV)</th>
            <th>Lieux</th>
            <th>Quartier</th>
            <th>Client</th>
            <th>Statut</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result1->num_rows > 0) {
            $counter = 1;
            while ($row = $result1->fetch_assoc()) {
              ?>
              <tr>
                <td>
                  <?php echo $counter; ?>
                </td>
                <td>
                  <?php echo $row['secteur']; ?>
                </td>
                <td>
                  <?php echo $row['activite']; ?>
                </td>
                <td>
                  <?php echo $row['nom']; ?>
                </td>
                <td>
                  <?php echo $row['prix']; ?>
                </td>
                <td>
                  <?php echo $row['date_act']; ?>
                </td>
                <td>
                  <?php echo $row['date']; ?>
                </td>
                <td>
                  <?php echo $row['lieux']; ?>
                </td>
                <td>
                  <?php echo $row['quartier']; ?>
                </td>
                <td>
                  <?php
                  $t = $row['token'];
                  $sqls = "SELECT * FROM users WHERE token='$t' ";
                  $results = $conn->query($sqls);
                  if ($results->num_rows > 0) {
                    while ($roww = $results->fetch_assoc()) {
                      echo $roww['nom'];
                    }
                  }
                  ?>
                </td>

                <td>
                  <?php echo $row['statut']; ?>
                
              </tr>
              <?php
              $counter++;
            }
          } else {
            ?>
            <tr>
              <td colspan="6" class="text-center">Aucune donnée trouvée.</td>
            </tr>
            <?php
          }
          ?>
        </tbody>

      </table>

      <table class="table table-bordered table-light">
        <h2>Soins</h2>
        <thead class="thead-dark">
          <tr>
            <th>N°</th>
            <th>Secteur</th>
            <th>Activite</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Date d'émission</th>
            <th>Date et Heure (RDV)</th>
            <th>Lieux</th>
            <th>Quartier</th>
            <th>Client</th>
            <th>Statut</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result2->num_rows > 0) {
            $counter = 1;
            while ($row = $result2->fetch_assoc()) {
              ?>
              <tr>
                <td>
                  <?php echo $counter; ?>
                </td>
                <td>
                  <?php echo $row['secteur']; ?>
                </td>
                <td>
                  <?php echo $row['activite']; ?>
                </td>
                <td>
                  <?php echo $row['nom']; ?>
                </td>
                <td>
                  <?php echo $row['prix']; ?>
                </td>
                <td>
                  <?php echo $row['date_act']; ?>
                </td>
                <td>
                  <?php echo $row['date']; ?>
                </td>
                <td>
                  <?php echo $row['lieux']; ?>
                </td>
                <td>
                  <?php echo $row['quartier']; ?>
                </td>
                <td>
                  <?php
                  $t = $row['token'];
                  $sqls = "SELECT * FROM users WHERE token='$t' ";
                  $results = $conn->query($sqls);
                  if ($results->num_rows > 0) {
                    while ($roww = $results->fetch_assoc()) {
                      echo $roww['nom'];
                    }
                  }
                  ?>
                </td>

                <td>
                  <?php echo $row['statut']; ?>
                
              </tr>
              <?php
              $counter++;
            }
          } else {
            ?>
            <tr>
              <td colspan="6" class="text-center">Aucune donnée trouvée.</td>
            </tr>
            <?php
          }
          ?>
        </tbody>

      </table>

      <table class="table table-bordered table-light">
        <h2>Onglerie</h2>
        <thead class="thead-dark">
          <tr>
            <th>N°</th>
            <th>Secteur</th>
            <th>Activite</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Date d'émission</th>
            <th>Date et Heure (RDV)</th>
            <th>Lieux</th>
            <th>Quartier</th>
            <th>Client</th>
            <th>Statut</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result3->num_rows > 0) {
            $counter = 1;
            while ($row = $result3->fetch_assoc()) {
              ?>
              <tr>
                <td>
                  <?php echo $counter; ?>
                </td>
                <td>
                  <?php echo $row['secteur']; ?>
                </td>
                <td>
                  <?php echo $row['activite']; ?>
                </td>
                <td>
                  <?php echo $row['nom']; ?>
                </td>
                <td>
                  <?php echo $row['prix']; ?>
                </td>
                <td>
                  <?php echo $row['date_act']; ?>
                </td>
                <td>
                  <?php echo $row['date']; ?>
                </td>
                <td>
                  <?php echo $row['lieux']; ?>
                </td>
                <td>
                  <?php echo $row['quartier']; ?>
                </td>
                <td>
                  <?php
                  $t = $row['token'];
                  $sqls = "SELECT * FROM users WHERE token='$t' ";
                  $results = $conn->query($sqls);
                  if ($results->num_rows > 0) {
                    while ($roww = $results->fetch_assoc()) {
                      echo $roww['nom'];
                    }
                  }
                  ?>
                </td>

                <td>
                  <?php echo $row['statut']; ?>
               
              </tr>
              <?php
              $counter++;
            }
          } else {
            ?>
            <tr>
              <td colspan="6" class="text-center">Aucune donnée trouvée.</td>
            </tr>
            <?php
          }
          ?>
        </tbody>

      </table>

      <table class="table table-bordered table-light">
        <h2>Make Up</h2>
        <thead class="thead-dark">
          <tr>
            <th>N°</th>
            <th>Secteur</th>
            <th>Activite</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Date d'émission</th>
            <th>Date et Heure (RDV)</th>
            <th>Lieux</th>
            <th>Quartier</th>
            <th>Client</th>
            <th>Statut</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result4->num_rows > 0) {
            $counter = 1;
            while ($row = $result4->fetch_assoc()) {
              ?>
              <tr>
                <td>
                  <?php echo $counter; ?>
                </td>
                <td>
                  <?php echo $row['secteur']; ?>
                </td>
                <td>
                  <?php echo $row['activite']; ?>
                </td>
                <td>
                  <?php echo $row['nom']; ?>
                </td>
                <td>
                  <?php echo $row['prix']; ?>
                </td>
                <td>
                  <?php echo $row['date_act']; ?>
                </td>
                <td>
                  <?php echo $row['date']; ?>
                </td>
                <td>
                  <?php echo $row['lieux']; ?>
                </td>
                <td>
                  <?php echo $row['quartier']; ?>
                </td>
                <td>
                  <?php
                  $t = $row['token'];
                  $sqls = "SELECT * FROM users WHERE token='$t' ";
                  $results = $conn->query($sqls);
                  if ($results->num_rows > 0) {
                    while ($roww = $results->fetch_assoc()) {
                      echo $roww['nom'];
                    }
                  }
                  ?>
                </td>

                <td>
                  <?php echo $row['statut']; ?>
                
              </tr>
              <?php
              $counter++;
            }
          } else {
            ?>
            <tr>
              <td colspan="6" class="text-center">Aucune donnée trouvée.</td>
            </tr>
            <?php
          }
          ?>
        </tbody>

      </table>

      <table class="table table-bordered table-light">
        <h2>Autres</h2>
        <thead class="thead-dark">
          <tr>
            <th>N°</th>
            <th>Secteur</th>
            <th>Activite</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Date d'émission</th>
            <th>Date et Heure (RDV)</th>
            <th>Lieux</th>
            <th>Quartier</th>
            <th>Client</th>
            <th>Statut</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result5->num_rows > 0) {
            $counter = 1;
            while ($row = $result5->fetch_assoc()) {
              ?>
              <tr>
                <td>
                  <?php echo $counter; ?>
                </td>
                <td>
                  <?php echo $row['secteur']; ?>
                </td>
                <td>
                  <?php echo $row['activite']; ?>
                </td>
                <td>
                  <?php echo $row['nom']; ?>
                </td>
                <td>
                  <?php echo $row['prix']; ?>
                </td>
                <td>
                  <?php echo $row['date_act']; ?>
                </td>
                <td>
                  <?php echo $row['date']; ?>
                </td>
                <td>
                  <?php echo $row['lieux']; ?>
                </td>
                <td>
                  <?php echo $row['quartier']; ?>
                </td>
                </td>
                <td>
                  <?php
                  $t = $row['token'];
                  $sqls = "SELECT * FROM users WHERE token='$t' ";
                  $results = $conn->query($sqls);
                  if ($results->num_rows > 0) {
                    while ($roww = $results->fetch_assoc()) {
                      echo $roww['nom'];
                    }
                  }
                  ?>
                </td>

                <td>
                  <?php echo $row['statut']; ?>

              </tr>
              <?php
              $counter++;
            }
          } else {
            ?>
            <tr>
              <td colspan="6" class="text-center">Aucune donnée trouvée.</td>
            </tr>
            <?php
          }
          ?>
        </tbody>

      </table>

    </div>


    <!-- FOOTER -->
    <a class="btn btn-success " href="h_demande.php">Historique des demandes</a>
    <a class="btn btn-success " href="a_demande.php">Demande en Accepter</a>
    <a class="btn btn-success " href="demande.php">Demande en Attente</a>

    <div class="container">
      <div class="row">

        <div class="copyright-text col-md-12 col-sm-12">
          <div class="col-md-6 col-sm-6">
            <p>Copyright &copy; 2023 MERKS -
          </div>

          <div class="col-md-6 col-sm-6">
            <ul class="social-icon">
              <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
              <li><a href="#" class="fa fa-twitter"></a></li>
              <li><a href="#" class="fa fa-instagram"></a></li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </footer>


  <!-- SCRIPTS -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/smoothscroll.js"></script>
  <script src="js/custom.js"></script>

</body>

</html>