<?php
session_start();
include 'redict.php';
$token = $_SESSION['token'];


$ii=0;
include 'config.php';

if(isset($_POST['submit'])) {
  $mdp = $_POST['mdp'];
  $nmdp = $_POST['nmdp'];
  
  // Requête pour récupérer le mot de passe haché
  $sqll = "SELECT * FROM users WHERE token = '$token'";
  $result = $conn->query($sqll);
  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row["password"];
    if (password_verify($mdp, $row["password"])) {
        $ii=1;
        $hashM = password_hash($nmdp, PASSWORD_DEFAULT);
        $hashM = addslashes($hashM);
        $sqlx = "UPDATE users SET password = '$hashM' WHERE token = ".$token;
        $resultt = $conn->query($sqlx);
        echo "<script>message.innerHTML = '<div class='alert alert-success'>Votre mot de passe à été mise à jour avec success.</div>';</script>";
    }else{ echo "<script>message.innerHTML = '<div class='alert alert-danger'>Les mots de passe ne correspondent pas.</div>';</script>";}
  }else{ echo "<script>message.innerHTML = '<div class='alert alert-danger'>Les mots de passe ne correspondent pas.</div>';</script>";}
}

// Récupérer les données de la base de données
$sql = "SELECT * FROM users WHERE token=$token ";
$result = $conn->query($sql);

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Mboa beauty</title>

        <!-- CSS FILES -->                
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,400;0,600;0,700;1,200;1,700&display=swap" rel="stylesheet">
            
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/vegas.min.css" rel="stylesheet">

        <link href="css/tooplate-barista.css" rel="stylesheet">
        
<!--

Tooplate 2137 Barista Cafe

https://www.tooplate.com/view/2137-barista-cafe

Bootstrap 5 HTML CSS Template

-->
    </head>
    
    <body>
                
            <main>
                <nav class="navbar navbar-expand-lg">                
                    <div class="container">
                        <a class="navbar-brand d-flex align-items-center" href="index.php">
                        <img src="images/logo.png" width="40" height="50" alt="Logo">
                            Mboa beauty
                        </a>
        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
        
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-lg-auto">
                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="index.php#home">Accueil</a>
                                </li>
        
                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="index.php#hommes">Homme</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="index.php#femmes">Femme</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="index.php#soins">Soins</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="index.php#ongle">Onglerie</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="index.php#makeup">Make Up</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="index.php#autre">Autres</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="compte.php">Compte</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="decon.php">Déconnexion</a>
                                </li>
                            </ul>

                            <div class="ms-lg-3">
                                <a class="btn custom-btn custom-border-btn" href="reservation.php">
                                    Mes Reservations
                                    <i class="bi-arrow-up-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>

                <section class="booking-section section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 mx-auto">
                            <div class="booking-form-wrap">
                                <div class="row">
                                    <div class="col-lg-7 col-12 p-0">
                                        <form class="custom-form booking-form" method="post" role="form">
                                            <div class="text-center mb-4 pb-lg-2">
                                                <em class="text-white">Your Beauty At Home</em>

                                                <h2 class="text-white">Gestion de compte</h2>
                                            </div>
                                            <?php
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        ?>

                                            <div class="booking-form-body">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">                                                       
                                                        <em class="text-white"><p>Nom : <?php echo $row['nom']; ?></em>                                                      
                                                    </div>

                                                    <div class="col-lg-6 col-12">
                                                        
                                                        <em class="text-white"><p>Tel : <?php echo $row['tel']; ?></em> 
                                                    </div>

                                                    <div class="col-lg-6 col-12">
                                                        
                                                        <em class="text-white"><p>Email : <?php echo $row['email']; ?></em>
                                                    </div>

                                                    <div class="col-lg-6 col-12">
                                                        <input type="password" name="mdp" id="mdp" class="form-control" placeholder="Entrez l'ancient mot de passe" required >
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <input type="password" name="nmdp" id="password" class="form-control" placeholder="Nouveau mot de passe" required>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <input type="password" name="cmdp" id="confirm-password" class="form-control" placeholder="Confirmer mot de passe" required>
                                                    </div>
                                                    <div class="progress">
                                                    <div id="progress-bar" class="progress-bar bg-danger" style="width: 0%"></div>
                                                    </div>
                                                    <style>
                                                        .progress {
                                                            height: 5px; /* Réduisez cette valeur pour diminuer l'épaisseur de la barre */
                                                            background-color: #fff;
                                                            transition: width 0.3s ease-in-out;
                                                            }
                                                    </style>
                                                    <div id="message" class="mt-3"></div>

                                                    
                                                    <div class="col-lg-4 col-md-10 col-8 mx-auto mt-2">
                                                        <button type="submit" class="form-control">Modifier</button>
                                                    </div>

                                                    
                                                    <?php
                                                          }
                                                      } else {
                                                          ?>                                                         
                                                              <em class="text-white">Aucune donnée trouvée.</em>                                                  
                                                          <?php
                                                      }
                                                      ?>
                                                    
                                                </div> 
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-lg-5 col-12 p-0">
                                        <div class="booking-form-image-wrap">
                                            
                                        <img src="images/logo.png" style="width: 80%; display:blok; margin-left: 50px; " alt="">
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <footer class="site-footer">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-4 col-12 me-auto">
                                <em class="text-white d-block mb-4">Où nous situer?</em>

                                <strong class="text-white">
                                    <i class="bi-geo-alt me-2"></i>
                                    Elig Efa, CAMERUON
                                </strong>

                                <ul class="social-icon mt-4">
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-facebook">
                                        </a>
                                    </li>
        
                                    <li class="social-icon-item">
                                        <a href="https://x.com/minthu" target="_new" class="social-icon-link bi-twitter">
                                        </a>
                                    </li>

                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-whatsapp">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-12 mt-4 mb-3 mt-lg-0 mb-lg-0">
                                <em class="text-white d-block mb-4">contacter</em>

                                <p class="d-flex mb-1">
                                    <strong class="me-2">Telephone:</strong>
                                    <a href="tel: 305-240-9671" class="site-footer-link">
                                        (237) 
                                        681 528 386
                                    </a>
                                </p>

                                <p class="d-flex">
                                    <strong class="me-2">Email:</strong>

                                    <a href="mailto:info@yourgmail.com" class="site-footer-link">
                                        hello@blackhouseafricacm.com
                                    </a>
                                </p>
                            </div>


                            <div class="col-lg-5 col-12">
                                <em class="text-white d-block mb-4">horaires d’ouverture.</em>

                                <ul class="opening-hours-list">
                                    <li class="d-flex">
                                        Lundi - Vendredi
                                        <span class="underline"></span>

                                        <strong>7:20 - 18:00</strong>
                                    </li>

                                    <li class="d-flex">
                                        Samedi
                                        <span class="underline"></span>

                                        <strong>11:00 - 15:00</strong>
                                    </li>

                                    <li class="d-flex">
                                        Dimanch
                                        <span class="underline"></span>

                                        <strong>Fermé</strong>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-8 col-12 mt-4">
                                <p class="copyright-text mb-0">Copyright © MERKS  2023 
                                   
                            </div>
                    </div>
                </footer>
            </main>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/vegas.min.js"></script>
        <script src="js/custom.js"></script>

    </body>

    <script>
  function isPasswordStrong(password) {
    if (password.length < 8) {
      return false;
    }

    // Vérifier la présence d'au moins une lettre majuscule
    if (!/[A-Z]/.test(password)) {
      return false;
    }

    // Vérifier la présence d'au moins une lettre minuscule
    if (!/[a-z]/.test(password)) {
      return false;
    }

    // Vérifier la présence d'au moins un chiffre
    if (!/[0-9]/.test(password)) {
      return false;
    }

    // Vérifier la présence d'au moins un caractère spécial
    if (!/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password)) {
      return false;
    }

    // Tous les critères sont satisfaits, le mot de passe est considéré comme fort
    return true;
  }

  document.getElementById('password').addEventListener('input', function(event) {
    var password = event.target.value;
    var progressBar = document.getElementById('progress-bar');
    var message = document.getElementById('message');

    if (isPasswordStrong(password)) {
    progressBar.style.width = '100%';
    progressBar.classList.remove('bg-danger');
    progressBar.classList.add('bg-success');
    message.innerHTML = '<div class="alert alert-success">Mot de passe suffisamment fort.</div>';
  } else {
    var strength = Math.floor((password.length / 30) * 100); // Calculer la force en pourcentage
    progressBar.style.width = strength + '%';
    progressBar.classList.remove('bg-success');
    progressBar.classList.add('bg-danger');
    message.innerHTML = '<div class="alert alert-danger">Mot de passe faible.</div>';
  }
});

  document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm-password').value;
    var message = document.getElementById('message');

    if (password.trim() === '' || confirmPassword.trim() === '') {
      message.innerHTML = '<div class="alert alert-danger">Veuillez remplir tous les champs du mot de passe.</div>';
      return;
    }

    if (password === confirmPassword && isPasswordStrong(password)) {
      message.innerHTML = '<div class="alert alert-success">Les mots de passe correspondent et sont suffisamment forts. Envoi du formulaire...</div>';
      // Soumettre le formulaire
      this.submit();
    } else {
      message.innerHTML = '<div class="alert alert-danger">Les mots de passe ne correspondent pas ou ne sont pas suffisamment forts.</div>';
    }
  });
</script>
</html>