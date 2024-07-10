<?php
session_start();
include 'redict.php';
//$token = $_SESSION['token'];
include 'config.php';

if(isset($_GET['id'])){

// Récupérer les données de la base de données
$hom="";
$ii="";
if(isset($_GET['hommes'])){
    $hom = $_GET['hommes'];
    $sql = "SELECT * FROM hommes WHERE activite='$hom'";
    //echo $sql;
    $result = $conn->query($sql);
    $ii="hommes";
}else if(isset($_GET['femmes'])){
    // Récupérer les données de la base de données
    $hom=$_GET['femmes'];
    $sql = "SELECT * FROM femmes WHERE activite='$hom'";
    //echo $sql;
    $result = $conn->query($sql);
    $ii="femmes";
}
$hom = iconv('UTF-8', 'ASCII//TRANSLIT', $hom);

}else{
    header("Location: index.php");
    exit;
}

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


                
                <section class="barista-section section-padding section-bg" id="hommes">
                    <div class="container">
                        <div class="row justify-content-center">
                        </br>

                            <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">
                                

                                <h2 class="text-white"><?php echo $hom; ?></h2>
                            </div>

                            <?php
                                if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                                <a href="form.php?id=<?php echo $row['id']; ?>&<?php echo $ii; ?>=<?php echo $row['activite']; ?>">               
                                                <div class="col-lg-3 col-md-6 col-12 mb-4 image-container">
                                                    <div class="team-block-wrap">
                                                        <div class="team-block-info d-flex flex-column">
                                                            <div class="d-flex mt-auto mb-3">
                                                                <h4 class="text-white mb-0"><?php echo $row['nom']; ?></h4>

                                                                <p class="badge ms-4"><em><?php echo number_format($row['prix'],0,',', ' '); ?>FCFA</em></p>
                                                            </div>

                                                        </div>

                                                        <div class="team-block-image-wrap">
                                                            <img src="images/ressources/<?php echo $ii; ?>/<?php echo $row['image']; ?>" class="team-block-image img-fluid" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                               
                                            <?php 
                                            }
                                        }
                                            ?>
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
</html>