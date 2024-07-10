<?php
session_start();

//include 'redict.php';
include 'config.php';
$tableau = array();
$in = 0;


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

include_once 'icon.php';
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

    <link href="css/tooplate-barista.css" rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="images/logo.ico">

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
                            <a class="nav-link click-scroll" href="<?php $in = count($tableau);
                            echo "connexion.php?nb=" . $in;
                            $tableau[$in] = 'compte.php'; ?>">Compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="decon.php">Déconnexion</a>
                        </li>
                    </ul>

                    <div class="ms-lg-3">
                        <a class="btn custom-btn custom-border-btn" href="<?php $in = count($tableau);
                        echo "connexion.php?nb=" . $in;
                        $tableau[$in] = 'reservation.php'; ?>">
                            Mes Reservations
                            <i class="bi-arrow-up-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>


        <section class="hero-section d-flex justify-content-center align-items-center" id="home">

            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6 col-12 mx-auto">
                        <em class="small-text">Bienvenu</em>

                        <h1>Mboa Beauty</h1>

                        <p class="text-white mb-4 pb-lg-2">
                            Votre <em>beauté</em> chez vous.
                        </p>


                        <a class="btn custom-btn smoothscroll me-2 mb-2" href="http://192.168.56.1:3000/">
                            <strong>MboaShorts<img src="images/logo192.png" width="80">
                            </strong></a>
                    </div>

                </div>
            </div>

            <div class="hero-slides"></div>
        </section>
        <section class="barista-section section-padding section-bg" id="hommes">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">
                        <h2 class="text-white">Hommes</h2>
                    </div>

                    <?php
                    $displayedActivites = array();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row['activite'] != "none") {
                                if (!in_array($row['activite'], $displayedActivites)) {
                                    $displayedActivites[] = $row['activite']; // Ajouter l'activité actuelle au tableau
                                    ?>
                                    <a
                                        href="<?php $in = count($tableau);
                                        echo "connexion.php?nb=" . $in;
                                        $tableau[$in] = "activite.php?id=" . $row['id'] . "&hommes=" . $row['activite'] . "" ?>">
                                        <div class="col-lg-3 col-md-6 col-12 mb-4 image-container">
                                            <div class="team-block-wrap">
                                                <div class="team-block-info d-flex flex-column">
                                                    <div class="d-flex mt-auto mb-3">
                                                        <h4 class="text-white mb-0">
                                                            <?php echo $row['activite']; ?>
                                                        </h4>
                                                        <p class="badge ms-4"><em>default</em></p>
                                                    </div>
                                                </div>
                                                <div class="team-block-image-wrap">
                                                    <img src="images/ressources/hommes/<?php echo $row['image']; ?>"
                                                        class="team-block-image img-fluid" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php
                                }
                            } else {
                                ?>
                                <a
                                    href="<?php $in = count($tableau);
                                    echo "connexion.php?nb=" . $in;
                                    $tableau[$in] = "form.php?id=" . $row['id'] . "&hommes=" . $row['activite'] . "" ?>">
                                    <div class="col-lg-3 col-md-6 col-12 mb-4 image-container">
                                        <div class="team-block-wrap">
                                            <div class="team-block-info d-flex flex-column">
                                                <div class="d-flex mt-auto mb-3">
                                                    <h4 class="text-white mb-0">
                                                        <?php echo $row['nom']; ?>
                                                    </h4>
                                                    <p class="badge ms-4"><em>
                                                            <?php echo number_format($row['prix'], 0, ',', ' '); ?>FCFA
                                                        </em></p>
                                                </div>
                                            </div>
                                            <div class="team-block-image-wrap">
                                                <img src="images/ressources/hommes/<?php echo $row['image']; ?>"
                                                    class="team-block-image img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="barista-section section-padding section-bg" id="femmes">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">
                        <h2 class="text-white">Femmes</h2>
                    </div>

                    <?php
                    $displayed = array();
                    if ($result1->num_rows > 0) {
                        while ($row = $result1->fetch_assoc()) {
                            if ($row['activite'] != "none") {
                                if (!in_array($row['activite'], $displayed)) {
                                    $displayed[] = $row['activite']; // Ajouter l'activité actuelle au tableau
                                    ?>
                                    <a
                                        href="<?php $in = count($tableau);
                                        echo "connexion.php?nb=" . $in;
                                        $tableau[$in] = "activite.php?id=" . $row['id'] . "&femmes=" . $row['activite'] . " " ?>">
                                        <div class="col-lg-3 col-md-6 col-12 mb-4 image-container">
                                            <div class="team-block-wrap">
                                                <div class="team-block-info d-flex flex-column">
                                                    <div class="d-flex mt-auto mb-3">
                                                        <h4 class="text-white mb-0">
                                                            <?php echo $row['activite']; ?>
                                                        </h4>
                                                        <p class="badge ms-4"><em>default</em></p>
                                                    </div>
                                                </div>
                                                <div class="team-block-image-wrap">
                                                    <img src="images/ressources/femmes/<?php echo $row['image']; ?>"
                                                        class="team-block-image img-fluid" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php
                                }
                            } else {
                                ?>
                                <a
                                    href="<?php $in = count($tableau);
                                    echo "connexion.php?nb=" . $in;
                                    $tableau[$in] = "form.php?id=" . $row['id'] . "&femmes=" . $row['activite'] . "" ?>">
                                    <div class="col-lg-3 col-md-6 col-12 mb-4 image-container">
                                        <div class="team-block-wrap">
                                            <div class="team-block-info d-flex flex-column">
                                                <div class="d-flex mt-auto mb-3">
                                                    <h4 class="text-white mb-0">
                                                        <?php echo $row['nom']; ?>
                                                    </h4>
                                                    <p class="badge ms-4"><em>
                                                            <?php echo number_format($row['prix'], 0, ',', ' '); ?>FCFA
                                                        </em></p>
                                                </div>
                                            </div>
                                            <div class="team-block-image-wrap">
                                                <img src="images/ressources/femmes/<?php echo $row['image']; ?>"
                                                    class="team-block-image img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="barista-section section-padding section-bg" id="soins">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">


                        <h2 class="text-white">SOINS</h2>
                    </div>

                    <?php

                    if ($result2->num_rows > 0) {
                        while ($row = $result2->fetch_assoc()) {
                            ?>
                            <a href="<?php $in = count($tableau);
                            echo "connexion.php?nb=" . $in;
                            $tableau[$in] = "form.php?id=" . $row['id'] . "&soins=" . $row['activite'] . "" ?>">
                                <div class="col-lg-3 col-md-6 col-12 mb-4 image-container">
                                    <div class="team-block-wrap">
                                        <div class="team-block-info d-flex flex-column">
                                            <div class="d-flex mt-auto mb-3">
                                                <h4 class="text-white mb-0">
                                                    <?php echo $row['nom']; ?>
                                                </h4>

                                                <p class="badge ms-4"><em>
                                                        <?php echo number_format($row['prix'], 0, ',', ' '); ?>FCFA
                                                    </em></p>
                                            </div>

                                        </div>

                                        <div class="team-block-image-wrap">
                                            <img src="images/ressources/soins/<?php echo $row['image']; ?>"
                                                class="team-block-image img-fluid" alt="">
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

        <section class="barista-section section-padding section-bg" id="ongle">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">


                        <h2 class="text-white">ONGLERIE</h2>
                    </div>

                    <?php

                    if ($result3->num_rows > 0) {
                        while ($row = $result3->fetch_assoc()) {
                            ?>
                            <a href="<?php $in = count($tableau);
                            echo "connexion.php?nb=" . $in;
                            $tableau[$in] = "form.php?id=" . $row['id'] . "&onglerie=" . $row['activite'] . " " ?>">
                                <div class="col-lg-3 col-md-6 col-12 mb-4 image-container">
                                    <div class="team-block-wrap">
                                        <div class="team-block-info d-flex flex-column">
                                            <div class="d-flex mt-auto mb-3">
                                                <h4 class="text-white mb-0">
                                                    <?php echo $row['nom']; ?>
                                                </h4>

                                                <p class="badge ms-4"><em>
                                                        <?php echo number_format($row['prix'], 0, ',', ' '); ?>FCFA
                                                    </em></p>
                                            </div>

                                        </div>

                                        <div class="team-block-image-wrap">
                                            <img src="images/ressources/onglerie/<?php echo $row['image']; ?>"
                                                class="team-block-image img-fluid" alt="">
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

        <section class="barista-section section-padding section-bg" id="makeup">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">


                        <h2 class="text-white">MAKE UP</h2>
                    </div>

                    <?php

                    if ($result4->num_rows > 0) {
                        while ($row = $result4->fetch_assoc()) {
                            ?>
                            <a href="<?php $in = count($tableau);
                            echo "connexion.php?nb=" . $in;
                            $tableau[$in] = "form.php?id=" . $row['id'] . "&makeup=" . $row['activite'] . " " ?>">
                                <div class="col-lg-3 col-md-6 col-12 mb-4 image-container">
                                    <div class="team-block-wrap">
                                        <div class="team-block-info d-flex flex-column">
                                            <div class="d-flex mt-auto mb-3">
                                                <h4 class="text-white mb-0">
                                                    <?php echo $row['nom']; ?>
                                                </h4>

                                                <p class="badge ms-4"><em>
                                                        <?php echo number_format($row['prix'], 0, ',', ' '); ?>FCFA
                                                    </em></p>
                                            </div>

                                        </div>

                                        <div class="team-block-image-wrap">
                                            <img src="images/ressources/makeup/<?php echo $row['image']; ?>"
                                                class="team-block-image img-fluid" alt="">
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

        <section class="barista-section section-padding section-bg" id="autre">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">


                        <h2 class="text-white">AUTRES</h2>
                    </div>

                    <?php

                    if ($result5->num_rows > 0) {
                        while ($row = $result5->fetch_assoc()) {
                            ?>
                            <a href="<?php $in = count($tableau);
                            echo "connexion.php?nb=" . $in;
                            $tableau[$in] = "form.php?id=" . $row['id'] . "&autre=" . $row['activite'] . " " ?>">
                                <div class="col-lg-3 col-md-6 col-12 mb-4 image-container">
                                    <div class="team-block-wrap">
                                        <div class="team-block-info d-flex flex-column">
                                            <div class="d-flex mt-auto mb-3">
                                                <h4 class="text-white mb-0">
                                                    <?php echo $row['nom']; ?>
                                                </h4>

                                                <p class="badge ms-4"><em>
                                                        <?php echo number_format($row['prix'], 0, ',', ' '); ?>FCFA
                                                    </em></p>
                                            </div>

                                        </div>

                                        <div class="team-block-image-wrap">
                                            <img src="images/ressources/autre/<?php echo $row['image']; ?>"
                                                class="team-block-image img-fluid" alt="">
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

        <section class="contact-section section-padding" id="contact">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <em class="text-white">Hello</em>
                        <h2 class="text-white mb-4 pb-lg-2">Contacter</h2>
                    </div>

                    <div class="col-lg-6 col-12">
                        <form action="#" method="post" class="custom-form contact-form" role="form">

                            <div class="row">

                                <div class="col-lg-6 col-12">
                                    <label for="name" class="form-label">Nom <sup class="text-danger">*</sup></label>

                                    <input type="text" name="name" id="name" class="form-control" placeholder="BHA"
                                        required="">
                                </div>

                                <div class="col-lg-6 col-12">
                                    <label for="email" class="form-label">Address Email</label>

                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                        class="form-control" placeholder="blackhouseafricacm@gmail.com" required="">
                                </div>

                                <div class="col-12">
                                    <label for="message" class="form-label">Comment puis-je vous aider?</label>

                                    <textarea name="message" rows="4" class="form-control" id="message"
                                        placeholder="Message" required=""></textarea>

                                </div>
                            </div>

                            <div class="col-lg-5 col-12 mx-auto mt-3">
                                <button type="submit" class="form-control">envoyer un message</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-6 col-12 mx-auto mt-5 mt-lg-0 ps-lg-5">
                        <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
                            <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div>
                            <script>(function () {
                                    var setting = { "query": "Elig-Effa, Yaoundé, Cameroun", "width": 800, "height": 600, "satellite": false, "zoom": 16, "placeId": "ChIJHVP_h5_PixARdQddSCnIoNY", "cid": "0xd6a0c829485d0775", "coords": [3.8667449, 11.4922432], "lang": "fr", "queryString": "Elig-Effa, Yaoundé, Cameroun", "centerCoord": [3.8667449, 11.4922432], "id": "map-9cd199b9cc5410cd3b1ad21cab2e54d3", "embed_id": "1082373" };
                                    var d = document;
                                    var s = d.createElement('script');
                                    s.src = 'https://1map.com/js/script-for-user.js?embed_id=1082373';
                                    s.async = true;
                                    s.onload = function (e) {
                                        window.OneMap.initMap(setting)
                                    };
                                    var to = d.getElementsByTagName('script')[0];
                                    to.parentNode.insertBefore(s, to);
                                })();</script><a href="https://1map.com/fr/map-embed">1 Map</a>
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
                            Elig Efa, CAMEROUN
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
    <?php $_SESSION['lien'] = $tableau; ?>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/vegas.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>