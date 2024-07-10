<?php
session_start();
// Vérifier si le formulaire a été transmis
$i = 0;
include "../config.php";
if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $bd = $_GET['table'];
     // Récupérer les données de la base de données
     if ($bd == "hommes") {
          $sql = "SELECT * FROM hommes where id =$id";
          $result = $conn->query($sql);
          $bds = "Hommes";
     }
     if ($bd == "femmes") {
          // Récupérer les données de la base de données
          $sql = "SELECT * FROM femmes where id =$id";
          $result = $conn->query($sql);
          $bds = "Femmes";
     }
     if ($bd == "soins") {
          // Récupérer les données de la base de données
          $sql = "SELECT * FROM soins where id =$id";
          $result = $conn->query($sql);
          $bds = "Soins";
     }
     if ($bd == "onglerie") {
          // Récupérer les données de la base de données
          $sql = "SELECT * FROM onglerie where id =$id";
          $result = $conn->query($sql);
          $bds = "Onglerie";
     }
     if ($bd == "makeup") {
          // Récupérer les données de la base de données
          $sql = "SELECT * FROM makeup where id =$id";
          $result = $conn->query($sql);
          $bds = "Make Up";
     }
     if ($bd == "autre") {
          // Récupérer les données de la base de données
          $sql = "SELECT * FROM autre where id =$id";
          $result = $conn->query($sql);
          $bds = "Autres";
     }
} else {

     if (isset($_POST["nom"])) {
          // Récupérer les valeurs du formulaire
          $nom = $_POST["nom"];
          $secteur = $_POST["secteur"];
          $prix = $_POST["prix"];

          $activite = $_POST["activite"];


          $destination = "../images/ressources/$secteur/";
          $nomFichier = $_FILES['image']['name'];
          $nomTemporaire = $_FILES['image']['tmp_name'];
          // Générer un nouveau nom de fichier basé sur une numérotation
          $numerotation = count(glob($destination . '*')) + 1;
          $newNomFichier = $destination . $numerotation . '_' . $nomFichier;

          $dest = $numerotation . '_' . $nomFichier;
          if (move_uploaded_file($nomTemporaire, $newNomFichier)) {
               //echo "L'image a été téléchargée avec succès.";
               //echo "<script>message.innerHTML = '<div class='alert alert-success'>Tâche ajouter avec succes.</div>';</script>";
               //$i=1;
          } else {
               //echo "Une erreur s'est produite lors du téléchargement de l'image.";
          }

          // Insérer les données dans la table 
          $requete = "INSERT INTO `$secteur`(`id`, `activite`, `nom`, `prix`, `image`) VALUES (null,'" . $activite . "', '" . $nom . "','" . $prix . "','" . $dest . "')";
          if (mysqli_query($conn, $requete)) {
               //echo "Inscription réussie !";
               // $i=1;
               echo "<script>alert  ('Tâche ajouter avec succes.');</script>";

          } else {
               //echo "Erreur : " . mysqli_error($connexion);
          }

          // Fermer la connexion
          mysqli_close($conn);
     }
}

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

     <?php
     if (isset($_GET['id'])) {
          if ($result->num_rows > 0) {
               $counter = 1;
               while ($row = $result->fetch_assoc()) {
                    ?>


                    <form method="post" enctype="multipart/form-data">
                         <h1>Ajout d'activité</h1>
                         <?php echo $bds; ?>
                         <label for="numero_compte">Secteur d'activité :</label>

                         <select id="select1" name="secteur" class="select" onchange="updateOptions()">
                              <option value="">Sélectionnez</option>
                              <option <?php if ($bds == 'hommes') {
                                   echo 'selected';
                              }
                              ; ?> value="hommes">Hommes</option>
                              <option <?php if ($bds == 'femmes') {
                                   echo 'selected';
                              }
                              ; ?> value="femmes">Femmes</option>
                              <option <?php if ($bds == 'soins') {
                                   echo 'selected';
                              }
                              ; ?> value="soins">Soins</option>
                              <option <?php if ($bds == 'onglerie') {
                                   echo 'selected';
                              }
                              ; ?> value="onglerie">Onglerie</option>
                              <option <?php if ($bds == 'makeup') {
                                   echo 'selected';
                              }
                              ; ?> value="makeup">Make Up</option>
                              <option <?php if ($bds == 'autre') {
                                   echo 'selected';
                              }
                              ; ?> value="autre">Autres</option>
                         </select>
                         <label for="login">Activité :</label>
                         <select id="select2" class="select" name="activite" selected='<?php echo $row['activite']; ?>'>
                              <option value="">Sélectionnez une sous-option</option>
                         </select>

                         <label for="login">Prix(FCFA) :</label>
                         <input type="text" id="prix" name="prix" required value='<?php echo $row['prix']; ?>'>

                         <label for="nom">Nom :</label>
                         <input type="text" id="nom" name="nom" required value='<?php echo $row['nom']; ?>'>

                         <label for="image">Sélectionnez une image :</label>
                         <input type="file" id="image" name="image" accept="image/*" value='<?php echo $row['image']; ?>'>

                         <input type="submit" class="ai" value="Ajouter">

                         <a href="index.php" class="ai" value="Retour">Retour</a>
                    </form>
                    <?php
               }
          }
     } else {
          ?>


          <form method="post" enctype="multipart/form-data">
               <h1>Ajout d'activité</h1>


               <label for="numero_compte">Secteur d'activité :</label>
               <select id="select1" name="secteur" class="select" onchange="updateOptions()">
                    <option value="">Sélectionnez</option>
                    <option value="hommes">Hommes</option>
                    <option value="femmes">Femmes</option>
                    <option value="soins">Soins</option>
                    <option value="onglerie">Onglerie</option>
                    <option value="makeup">Make Up</option>
                    <option value="autre">Autres</option>
               </select>


               <label for="login">Activité :</label>
               <select id="select2" class="select" name="activite">
                    <option value="">Sélectionnez une sous-option</option>
               </select>

               <label for="login">Prix(FCFA) :</label>
               <input type="text" id="prix" name="prix" required>

               <label for="nom">Nom :</label>
               <input type="text" id="nom" name="nom" required>

               <label for="image">Sélectionnez une image :</label>
               <input type="file" id="image" name="image" accept="image/*">

               <input type="submit" class="ai" value="Ajouter">

               <a href="index.php" class="ai" value="Retour">Retour</a>
          </form>
          <?php
     }
     ?>
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
               var option1Values = ["none", "COUPE en degradee", "Man Bun"];
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