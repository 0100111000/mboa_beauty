<?php
session_start();
// Vérifier si le formulaire a été transmis
// Récupérer les données de la base de données
include 'redict.php';
include '../config.php';
$sql = "SELECT * FROM users WHERE statu='emplX'  ORDER BY id DESC  ";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Compte supprimer</title>
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
                         <li><a href="#">Say hello - <span><?php echo $_SESSION['email']; ?></span></a></li>
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
                              <h1>Liste des comptes d'Employers (Supprimer) </h1>
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
     <table class="table table-bordered table-light">
    <thead class="thead-dark">
        <tr>
            <th>N°</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
          $counter = 1;
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $counter; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['tel']; ?></td>
                    
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
     <a class="btn btn-success" href="gerer_compte.php">Compte Actifs</a>
    
     
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