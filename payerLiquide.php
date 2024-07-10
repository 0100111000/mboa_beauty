<?php
session_start();
//include 'redict.php';
$token = $_SESSION['token'];


$ii = 0;
include 'config.php';

$idp = $_GET['id'];

// Récupérer les données de la base de données
$sql = "UPDATE demande SET token_pay='1' WHERE id='$idp'";
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

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,400;0,600;0,700;1,200;1,700&display=swap"
        rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/vegas.min.css" rel="stylesheet">

    <link href="css/anime.css" rel="stylesheet">

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

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

                                            <h2 class="text-white">Listes de vos réservation</h2>
                                        </div>
                                        <h4 class="text-white">Payement en cash</h4>

                                        <div class="spinner-2"></div>
                                        <a href="reservation.php"><img src="images/just.png" width="50%"
                                                height="50%"></a>

                                </div>

                                <div class="col-lg-5 col-12 p-0">
                                    <div class="booking-form-image-wrap">

                                        <img src="images/logo.png" class="booking-form-image img-fluid" alt="">
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
                        <p class="copyright-text mb-0">Copyright © MERKS 2023

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

    <script>
        // Attendre que le DOM soit complètement chargé
        document.addEventListener('DOMContentLoaded', function () {
            // Définir un délai de 2 secondes
            setTimeout(function () {
                // Sélectionner l'élément .ring
                var ring = document.querySelector('.ring');

                // Supprimer l'animation du spinner et masquer l'élément span
                var span = ring.querySelector('span');
                if (span) {
                    span.style.display = 'none';
                }

                // Changer le contenu de .ring en un bouton 'Continuer'
                ring.innerHTML = '<button id="continueButton">Continuer</button>';

                // Appliquer le style du bouton
                var button = document.getElementById('continueButton');
                button.style.background = 'transparent';
                button.style.border = '3px solid #3c3c3c';
                button.style.color = '#fff000';
                button.style.fontFamily = 'sans-serif';
                button.style.fontSize = '20px';
                button.style.letterSpacing = '4px';
                button.style.textTransform = 'uppercase';
                button.style.position = 'absolute';
                button.style.top = '50%';
                button.style.left = '50%';
                button.style.transform = 'translate(-50%, -50%)';
                button.style.lineHeight = '150px';
                button.style.cursor = 'pointer'; /* Ajout pour indiquer que le bouton est cliquable */
                button.onclick = function () { /* Ajout de l'événement onclick */
                    window.location.href = 'reservation.php';
                };
            }, 2000);
        });
    </script>

</body>


</html>