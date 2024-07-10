<?php
session_start();
// Vérifier si le formulaire a été transmis
$i=0;
include '../config.php';
if(isset($_POST["nom"])) {
    // Récupérer les valeurs du formulaire
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $pas = "default";
   
    $chiffre1 = rand(0, 9);
    $chiffre2 = rand(0, 9);
    $chiffre3 = rand(0, 9);
    $chiffre4 = rand(0, 9);
    $chiffre = "".$chiffre1."".$chiffre2."".$chiffre3."".$chiffre4.""."".$tel;

    $hashM = password_hash($pas, PASSWORD_DEFAULT);
    $hashM = addslashes($hashM);

    $req = "INSERT INTO `users`(`id`, `nom`, `email`, `tel`, `password`, `statu`, `token`) VALUES (null,'$nom','$email','$tel','$hashM','empl','$chiffre')";
    if(mysqli_query($conn, $req)) {
        
     echo "<script>alert  ('Employer ajouter avec succès.');</script>";

    }else{
        //echo "Erreur : " . mysqli_error($connexion);
    }

    // Fermer la connexion
    mysqli_close($conn);
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
                         <li><a href="#">Say hello - <span><?php echo $_SESSION['email']; ?></span></a></li>
                    </ul>
               </div>

          </div>
     </section>


     <form method="post" enctype="multipart/form-data" >
		<h1>Ajout d'employer</h1>


		<label for="numero_compte">Nom:</label>
          <input type="text" id="nom" name="nom" required>

          <label for="numero_compte">Email:</label>
          <input type="email" id="email" name="email" required>

		<label for="login">Téléphone :</label>
		<input type="number" id="tel" name="tel" required>
		
		<label for="login">NB : Le mot de passe de se compte sera "default" Veuillez le modifier pour plus de sécurité!!</label>

          <input type="submit" class="ai" value="Créer">
	
		<a href="index.php" class="ai" value="Retour">Retour</a>
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
</html>