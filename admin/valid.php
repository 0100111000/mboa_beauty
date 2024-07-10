<?php
session_start();
include 'redict.php';
include "../config.php";

$id = $_GET['id'];
//Cas des hommes
if (isset($_GET['id'])) {
     $sql = "SELECT * FROM demande WHERE id='$id' ORDER BY id DESC  ";
     $result = $conn->query($sql);
}

if(isset($_POST['select']))
{
     $req = "UPDATE `demande` SET `empl`='".$_POST['select']."', statut='Accepter' WHERE id='".$id."'";
     if (mysqli_query($conn, $req)) {

          echo "<script>alert  ('Tâche transmisse avec succès.');</script>";
          header("Location: demande.php");
          exit;

     } else {
          //echo "Erreur : " . mysqli_error($connexion);
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
     <meta http-equiv="refresh" content="100">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate.css">
     <link rel="stylesheet" href="css/ajout.css">
     <link rel="stylesheet" href="css/submit.scss">


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
                                   <h3>Validations</h3>
                                   <h1>Veuillez choisir un employer disponible!</h1>

                                    <?php
                                        if ($result->num_rows > 0) {
                                             while ($row = $result->fetch_assoc()) {
                                                  ?>
                                   <form method="POST" id="login-form" class="login-form" autocomplete="off" role="main">
                                        <h2>Détaille de la commande</h2>
                                        <div>
                                             <label class="label-email">
                                                  <span class="required">Secteur : <em><?php echo $row['secteur']; ?></em></span>
                                                       </label>
                                                  </div>
                                                  <div>
                                                       <label class="label-email">
                                                            <span class="required">Activite :<em> <?php echo $row['activite']; ?></em></span>
                                                       </label>
                                                  </div>
                                                  <div>
                                                       <label class="label-email">
                                                            <span class="required">Nom : <em><?php echo $row['nom']; ?></em>
                                                                      </span>
                                                                 </label>
                                                            </div>
                                                            <div>
                                                       <label class="label-email">
                                                            <span class="required">Prix : <em><?php echo $row['prix']; ?> FCFA</em>
                                                                                </span>
                                                                           </label>
                                                                      </div>
                                                                      <div>
                                                       <label class="label-email">
                                                            <span class="required">Date d'émission :<em> <?php echo $row['date_act']; ?></em>
                                                                                          </span>
                                                                                     </label>
                                                                                </div>
                                                       <div>
                                                       <label class="label-email">
                                                            <span class="required">Date et Heure (RDV) :<em> <?php echo $row['date']; ?></em>
                                                                           </span>
                                                                      </label>
                                                                 </div>
                                                       <div>
                                                       <label class="label-email">
                                                            <span class="required">Lieux : <em><?php echo $row['lieux']; ?></em>
                                                                           </span>
                                                                      </label>
                                                                 </div>
                                                       <div>
                                                       <label class="label-email">
                                                            <span class="required">Quartier : <em><?php echo $row['quartier']; ?></em>
                                                                           </span>
                                                                      </label>
                                                                 </div>
                                                       <div>
                                                            <label class="label-email">
                                                                 <h2>Liste des Employers disponible :</h2>
                                                                 <select name="select" id="select" required>
                                                  
                                                                      <option></option>
                                                  <?php
                                                       $sqls = "SELECT * FROM users WHERE statu='empl' ";
                                                       $results = $conn->query($sqls);
                                                       if ($results->num_rows > 0) {
                                                            while ($roww = $results->fetch_assoc()) {
                                                                 echo "<option value='".$roww['nom']."'>".$roww['nom']." ". $roww['email']."</option>";
                                                            }
                                                       }
                                                  ?>
                                             
                                                  
                                             </select>
                                             </label>
                                             </div>
                                             <div> 
                                             </br>
                                             <button type="button" class="btn btn-secondary" onclick="backe()">Annuler</button>
                                             
                                                  <button id="button" class="btn btn-animation btn-success" onclick="envoyerFormulaire()">Envoyer</button>
                                   
                                             </div>
                                   </form>
                                   <style>
                                        .btn-animation {
                                             transition: background-color 0.3s ease;
                                        }

                                        .btn-animation:hover {
                                             background-color: #28a745;
                                             color: #fff;
                                        }
                                   </style>
                                   <script>
                                        function envoyerFormulaire() {
                                             var formulaire = document.querySelector('form');
                                             formulaire.submit();
                                        }
                                        function backe() {
                                             window.location.href = "demande.php";
                                        }
                                   </script>
                                   <?php
                                         }
                                    } else {
                                         ?>
                                        <tr>
                                             <td colspan="6" class="text-center">Aucune donnée trouvée.</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
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

          <!-- FOOTER 
          <a class="btn btn-success " href="h_demande.php">Historique des demandes</a>
               -->
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