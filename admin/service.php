<?php
session_start();
include '../config.php';

// Récupérer les données de la base de données
$sql = "SELECT * FROM hommes";
$result = $conn->query($sql);

// Récupérer les données de la base de données
$sql1 = "SELECT * FROM femmes";
$result1 = $conn->query($sql1);

// Récupérer les données de la base de données
$sql2 = "SELECT * FROM soins";
$result2 = $conn->query($sql2);

// Récupérer les données de la base de données
$sql3 = "SELECT * FROM onglerie";
$result3 = $conn->query($sql3);

// Récupérer les données de la base de données
$sql4 = "SELECT * FROM makeup";
$result4 = $conn->query($sql4);

// Récupérer les données de la base de données
$sql5 = "SELECT * FROM autre";
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
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="css/tooplate-style.css">
  <link rel="stylesheet" href="css/ajou.css">


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


  <form method="post" enctype="multipart/form-data">
    <h1>Liste des Activités</h1>

    <h2>Hommes</h2>
    <table class="table table-bordered table-light">
      <thead class="thead-dark">
        <tr>
          <th>N°</th>
          <th>Activite</th>
          <th>Nom</th>
          <th>Prix</th>
          <th>Images</th>
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
                <?php echo $row['activite']; ?>
              </td>
              <td>
                <?php echo $row['nom']; ?>
              </td>
              <td>
                <?php echo $row['prix']; ?>
              </td>
              <td class="col-sm-4">
                <?php echo $row['image']; ?>
              </td>
              <td>
                <?php if ($row['activite'] !== 'Supprimer') { ?>
                  <a class="btn btn-danger" href="gerer_ser.php?id=<?php echo $row['id']; ?>&table=hommes">Supprimer</a>
                <?php } else { ?>
                  <a class="btn btn-danger disabled" href="#">Supprimer</a>
                <?php } ?>
              </td>
              <td>
                <?php if ($row['activite'] !== 'Supprimer') { ?>
                  <a class="btn btn-success" href="ajouter_p.php?id=<?php echo $row['id']; ?>&table=hommes" ?>Modifier</a>
                <?php } else { ?>
                  <a class="btn btn-success disabled" href="#">Modifie</a>
                <?php } ?>
              </td>
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

    <h2>Femmes</h2>
    <table class="table table-bordered table-light">
      <thead class="thead-dark">
        <tr>
          <th>N°</th>
          <th>Activite</th>
          <th>Nom</th>
          <th>Prix</th>
          <th>Images</th>
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
                <?php echo $row['activite']; ?>
              </td>
              <td>
                <?php echo $row['nom']; ?>
              </td>
              <td>
                <?php echo $row['prix']; ?>
              </td>
              <td class="col-sm-4">
                <?php echo $row['image']; ?>
              </td>
              <td>
                <?php if ($row['activite'] !== 'Supprimer') { ?>
                  <a class="btn btn-danger" href="gerer_ser.php?id=<?php echo $row['id']; ?>&table=femmes">Supprimer</a>
                <?php } else { ?>
                  <a class="btn btn-danger disabled" href="#">Supprimer</a>
                <?php } ?>
              </td>
              <td>
                <?php if ($row['activite'] !== 'Supprimer') { ?>
                  <a class="btn btn-success" href="ajouter_p.php?id=<?php echo $row['id']; ?>&table=femmes" ?>Modifie</a>
                <?php } else { ?>
                  <a class="btn btn-success disabled" href="#">Modifie</a>
                <?php } ?>
              </td>
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
    <h2>Soins</h2>
    <table class="table table-bordered table-light">
      <thead class="thead-dark">
        <tr>
          <th>N°</th>
          <th>Activite</th>
          <th>Nom</th>
          <th>Prix</th>
          <th>Images</th>
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
                <?php echo $row['activite']; ?>
              </td>
              <td>
                <?php echo $row['nom']; ?>
              </td>
              <td>
                <?php echo $row['prix']; ?>
              </td>
              <td class="col-sm-4">
                <?php echo $row['image']; ?>
              </td>
              <td>
                <?php if ($row['activite'] !== 'Supprimer') { ?>
                  <a class="btn btn-danger" href="gerer_ser.php?id=<?php echo $row['id']; ?>&table=soins">Supprimer</a>
                <?php } else { ?>
                  <a class="btn btn-danger disabled" href="#">Supprimer</a>
                <?php } ?>
              </td>
              <td>
                <?php if ($row['activite'] !== 'Supprimer') { ?>
                  <a class="btn btn-success" href="ajouter_p.php?id=<?php echo $row['id']; ?>&table=soins" ?>Modifie</a>
                <?php } else { ?>
                  <a class="btn btn-success disabled" href="#">Valider</a>
                <?php } ?>
              </td>
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

    <h2>Onglerie</h2>
    <table class="table table-bordered table-light">
      <thead class="thead-dark">
        <tr>
          <th>N°</th>
          <th>Activite</th>
          <th>Nom</th>
          <th>Prix</th>
          <th>Images</th>
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
                <?php echo $row['activite']; ?>
              </td>
              <td>
                <?php echo $row['nom']; ?>
              </td>
              <td>
                <?php echo $row['prix']; ?>
              </td>
              <td class="col-sm-4">
                <?php echo $row['image']; ?>
              </td>
              <td>
                <?php if ($row['activite'] !== 'Supprimer') { ?>
                  <a class="btn btn-danger" href="gerer_ser.php?id=<?php echo $row['id']; ?>&table=onglerie">Supprimer</a>
                <?php } else { ?>
                  <a class="btn btn-danger disabled" href="#">Supprimer</a>
                <?php } ?>
              </td>
              <td>
                <?php if ($row['activite'] !== 'Supprimer') { ?>
                  <a class="btn btn-success" href="ajouter_p.php?id=<?php echo $row['id']; ?>&table=onglerie" ?>Modifier</a>
                <?php } else { ?>
                  <a class="btn btn-success disabled" href="#">Valider</a>
                <?php } ?>
              </td>
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

    <h2>Make Up</h2>
    <table class="table table-bordered table-light">
      <thead class="thead-dark">
        <tr>
          <th>N°</th>
          <th>Activite</th>
          <th>Nom</th>
          <th>Prix</th>
          <th>Images</th>
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
                <?php echo $row['activite']; ?>
              </td>
              <td>
                <?php echo $row['nom']; ?>
              </td>
              <td>
                <?php echo $row['prix']; ?>
              </td>
              <td class="col-sm-4">
                <?php echo $row['image']; ?>
              </td>
              <td>
                <?php if ($row['activite'] !== 'Supprimer') { ?>
                  <a class="btn btn-danger" href="gerer_ser.php?id=<?php echo $row['id']; ?>&table=makeup">Supprimer</a>
                <?php } else { ?>
                  <a class="btn btn-danger disabled" href="#">Supprimer</a>
                <?php } ?>
              </td>
              <td>
                <?php if ($row['activite'] !== 'Supprimer') { ?>
                  <a class="btn btn-success" href="ajouter_p.php?id=<?php echo $row['id']; ?>&table=makeup" ?>Modifier</a>
                <?php } else { ?>
                  <a class="btn btn-success disabled" href="#">Valider</a>
                <?php } ?>
              </td>
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

    <h2>Autres</h2>
    <table class="table table-bordered table-light">
      <thead class="thead-dark">
        <tr>
          <th>N°</th>
          <th>Activite</th>
          <th>Nom</th>
          <th>Prix</th>
          <th>Images</th>
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
                <?php echo $row['activite']; ?>
              </td>
              <td>
                <?php echo $row['nom']; ?>
              </td>
              <td>
                <?php echo $row['prix']; ?>
              </td>
              <td class="col-sm-4">
                <?php echo $row['image']; ?>
              </td>
              <td>
                <?php if ($row['activite'] !== 'Supprimer') { ?>
                  <a class="btn btn-danger" href="gerer_ser.php?id=<?php echo $row['id']; ?>&table=autre">Supprimer</a>
                <?php } else { ?>
                  <a class="btn btn-danger disabled" href="#">Supprimer</a>
                <?php } ?>
              </td>
              <td>
                <?php if ($row['activite'] !== 'Supprimer') { ?>
                  <a class="btn btn-success" href="ajouter_p.php?id=<?php echo $row['id']; ?>&table=autre" ?>Modifier</a>
                <?php } else { ?>
                  <a class="btn btn-success disabled" href="#">Valider</a>
                <?php } ?>
              </td>
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

  </form>
  </br>

  <!-- FOOTER -->
  <footer id="footer" data-stellar-background-ratio="0.5">
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

<script>
  function updateOptions() {
    var select1 = document.getElementById("select1");
    var select2 = document.getElementById("select2");
    var selectedOption = select1.value;

    // Supprimer toutes les options existantes de la deuxième sélection
    select2.innerHTML = "";

    if (selectedOption === "hommes") {
      // Ajouter les sous-options pour l'option 1
      var option1Values = [" ", "COUPE en degradee", "Man Bun"];
      for (var i = 0; i < option1Values.length; i++) {
        var option = document.createElement("option");
        option.text = option1Values[i];
        select2.add(option);
      }
    } else if (selectedOption === "femmes") {
      // Ajouter les sous-options pour l'option 2
      var option2Values = ["Tresses", "Coiffurees", "Greffes", "Perruques", "Défrissage"];
      for (var i = 0; i < option2Values.length; i++) {
        var option = document.createElement("option");
        option.text = option2Values[i];
        select2.add(option);
      }
    }
  }
</script>

</html>