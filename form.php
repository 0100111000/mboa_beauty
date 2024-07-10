<?php
session_start();
include 'redict.php';
$token = $_SESSION['token'];
include 'config.php';

if(isset($_GET['id'])){

// Récupérer les données de la base de données
$hom="";
$ii="";
$id=$_GET['id'];
if(isset($_GET['hommes'])){
    $hom = $_GET['hommes'];
    $sql = "SELECT * FROM hommes WHERE activite='$hom' and id='$id'  LIMIT 1";
    $result = $conn->query($sql);
    $ii="hommes";
}else if(isset($_GET['femmes'])){
    // Récupérer les données de la base de données
    $hom=$_GET['femmes'];
    $sql = "SELECT * FROM femmes WHERE activite='$hom' and id='$id' LIMIT 1";
    $result = $conn->query($sql);
    $ii="femmes";
}else if(isset($_GET['soins'])){
    // Récupérer les données de la base de données
    $hom=$_GET['soins'];
    $sql = "SELECT * FROM soins WHERE activite='$hom' and id='$id' LIMIT 1";
    $result = $conn->query($sql);
    $ii="soins";
}else if(isset($_GET['onglerie'])){
    // Récupérer les données de la base de données
    $hom=$_GET['onglerie'];
    $sql = "SELECT * FROM onglerie WHERE activite='$hom' and id='$id' LIMIT 1";
    $result = $conn->query($sql);
    $ii="onglerie";
}else if(isset($_GET['makeup'])){
    // Récupérer les données de la base de données
    $hom=$_GET['makeup'];
    $sql = "SELECT * FROM makeup WHERE activite='$hom' and id='$id' LIMIT 1";
    $result = $conn->query($sql);
    $ii="makeup";
}else if(isset($_GET['autre'])){
    // Récupérer les données de la base de données
    $hom=$_GET['autre'];
    $sql = "SELECT * FROM autre WHERE activite='$hom' and id='$id' LIMIT 1";
    $result = $conn->query($sql);
    $ii="autre";
}


$hom = iconv('UTF-8', 'ASCII//TRANSLIT', $hom);

}else{
    
}

$inom="";
$iprix="";


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
                            <form class="custom-form booking-form"  method="post" role="form">
                                <div class="text-center mb-4 pb-lg-2">
                                    <em class="text-white">Your Beauty At Home</em>
                                    <h2 class="text-white">Formulaire de validation</h2>
                                </div>
                                <?php
                                if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            ?>

                                <div class="booking-form-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h3 class="text-white"><?php echo $ii; ?></h3>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                        <h3 class="text-white"><?php if($row['activite']=='none'){}else{echo $row['activite'];}?></h3>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                        <h3 class="text-white">Nom: <?php echo $row['nom']; $inom=$row['nom']; ?></h3>
                                        </div>


                                        <div class="col-lg-6 col-12">
                                        <h3 class="text-white">Prix : <?php echo number_format($row['prix'], 0, ',', ' ');$iprix=$row['prix']; ?> FCFA</h3>
                                        </div>

                                        <select class="form-control" name="ville" id="secteur-select" required="">
                                        <option value="">Sélectionnez le secteur</option>
                                        <option value="Yaoundé I">Yaoundé I</option>
                                        <option value="Yaoundé II">Yaoundé II</option>
                                        <option value="Yaoundé III">Yaoundé III</option>
                                        <option value="Yaoundé IV">Yaoundé IV</option>
                                        <option value="Yaoundé V">Yaoundé V</option>
                                        <option value="Yaoundé VI">Yaoundé VI</option>
                                        <option value="Yaoundé VII">Yaoundé VII</option>
                                       
                                        </select>

                                        <select class="form-control" name="quartier" id="quartier-select" required="">
                                            <option value="">Sélectionnez le quartier</option>
                                        </select>

                                            <script>
                                                // Récupérer les références des selecteurs
                                                var secteurSelect = document.getElementById("secteur-select");
                                                var quartierSelect = document.getElementById("quartier-select");

                                                // Définir la liste des quartiers par secteur
                                                var quartiersParSecteur = {
                                                    "Yaoundé I": ["Quartier Centre commercial", "Quartier Elig-Essono", "Quartier Etoa-Meki 1", "Quartier Nlongkak", "Quartier Elig-Edzoa", "Quartier Bastos", "Quartier Manguier", "Quartier Tongolo", "Quartier Mballa 1", "Quartier Mballa 2", "Quartier Nkolondom", "Quartier Etoudi", "Quartier Messassi", "Quartier Okolo", "Quartier Olembe", "Quartier Nyom", "Quartier Etoa-Meki 2", "Quartier Mballa 3", "Quartier Emana", "Quartier Nkoleton"],
                                                    "Yaoundé II": ["Quartier Cite Verte", "Quartier Madagascar", "Quartier Mokolo", "Quartier Grand Messa", "Quartier Ekoudou", "Quartier Tsinga", "Quartier Nkom-kana", "Quartier Oliga", "Quartier Messa Carrière", "Quartier Ecole de Police", "Quartier Febe", "Quartier Ntoungou"],
                                                    "Yaoundé III": ["Quartier Obili", "Quartier Ngoa-Ekele 1", "Quartier Nlong Mvolye", "Quartier Ahala 1", "Quartier Efoulan", "Quartier Obobogo", "Quartier Nsam", "Quartier melen 2- Centre Administratif", "Quartier Etoa", "Quartier Nkolmesseng 1", "Quartier Afanoya 1", "Quartier Afanoya 2", "Quartier Afanoya 3", "Quartier Afanoya 4", "Quartier Nkolfon", "Quartier Mekoumbou 2", "Quartier Ahala 2", "Quartier Nsimeyong 1", "Quartier Nsimeyong 2", "Quartier Nsimeyong 3", "Quartier Olezoa", "Quartier Dakar", "Quartier Ngoa-Ekele 2"],
                                                    "Yaoundé IV": ["Quartier Mvan-Nord", "Quartier Ndamvout", "Quartier Messame-Ndongo", "Quartier Odzoa", "Quartier Ekoumdoum", "Quartier Awae", "Quartier Nkomo", "Quartier Ekounou", "Quartier Biteng", "Quartier Kondengui 1",, "Quartier Kondengui 2",, "Quartier Kondengui 3", "Quartier Mimboman 1", "Quartier Etam-Bafia", "Quartier Mvog-Mbi", "Quartier Nkol-Ndongo 2", "Quartier Mebandan", "Quartier Mvan-Sud", "Quartier Ekie", "Quartier Emombo", "Quartier Nkol-Ndongo 1", "Quartier Mimboman 3", "Quartier Ntui-Essong", "Quartier Nkolo", "Quartier Abom"],
                                                    "Yaoundé V": ["Quartier Mvog-Ada", "Quartier Essos", "Quartier Nkol-Messeng", "Quartier Nkol-Ebogo", "Quartier Fouda", "Quartier Ngousso 1", "Quartier Eleveur", "Quartier Mfandena 1", "Quartier Mfandena 2", "Quartier Ngousso 2", "Quartier Ngousso-Ntem", "Quartier Ngoulmekong"],
                                                    "Yaoundé VI": ["Quartier Melen 8B et C", "Quartier Etoug-Ebe 2", "Quartier Mvog-betsi", "Quartier Biyem-Assi", "Quartier Mendong 2", "Quartier Melen 8", "Quartier Simbock", "Quartier Etoug-Ebe 1", "Quartier Melen", "Quartier Elig-Effa", "Quartier Nkolbikok", "Quartier Simbock Ecole de guerre"],
                                                    "Yaoundé VII": ["Quartier Etetak", "Quartier Oyom-Abang", "Quartier Nkolbisson", "Quartier Minkoameyos", "Quartier Nkolso"],
                                                    };

                                                // Fonction pour mettre à jour les options du selecteur de quartier en fonction du secteur sélectionné
                                                function updateQuartiers() {
                                                    var secteur = secteurSelect.value;
                                                    var quartiers = quartiersParSecteur[secteur] || [];

                                                    // Effacer les options actuelles
                                                    quartierSelect.innerHTML = "";

                                                    // Ajouter les nouvelles options
                                                    for (var i = 0; i < quartiers.length; i++) {
                                                        var quartier = quartiers[i];
                                                        var option = document.createElement("option");
                                                        option.text = quartier;
                                                        option.value = quartier;
                                                        quartierSelect.add(option);
                                                    }
                                                }

                                                // Écouter l'événement onChange du selecteur de secteur
                                                secteurSelect.addEventListener("change", updateQuartiers);

                                                // Mettre à jour les quartiers initiaux
                                                updateQuartiers();
                                            </script>

                                            <div class="col-lg-6 col-12">
                                                <input type="datetime-local" name="date_heure" id="date_heure" class="form-control" required="">
                                            </div>

                                            <script>
                                                // Récupérer l'élément input de la date et de l'heure
                                                const dateHeureInput = document.getElementById('date_heure');

                                                // Définir la date et l'heure actuelles
                                                const maintenant = new Date();

                                                // Définir la date maximale (aujourd'hui)
                                                const dateMax = maintenant.toISOString().split('T')[0] + 'T23:59';

                                                // Définir les heures de début et de fin autorisées
                                                const heureDebut = 7;
                                                const heureFin = 18;

                                                // Écouter l'événement de changement de valeur de l'input
                                                dateHeureInput.addEventListener('input', function() {
                                                    // Récupérer la date et l'heure sélectionnées
                                                    const dateHeureSelectionnees = new Date(this.value);

                                                    // Vérifier si la date sélectionnée est égale à la date actuelle
                                                    const estAujourdhui = dateHeureSelectionnees.toISOString().split('T')[0] >= maintenant.toISOString().split('T')[0];

                                                    // Vérifier si l'heure sélectionnée est dans la tranche autorisée
                                                    const heureSelectionnee = dateHeureSelectionnees.getHours();
                                                    const estTrancheAutorisee = heureSelectionnee >= heureDebut && heureSelectionnee < heureFin;

                                                    // Vérifier les conditions et afficher un message d'erreur si nécessaire
                                                    if (!estAujourdhui) {
                                                        this.setCustomValidity("Veuillez sélectionner une date egale ou supérieur à aujourd'hui.");
                                                    } else if (!estTrancheAutorisee) {
                                                        this.setCustomValidity("La tranche horaire autorisée est de 7h à 18h.");
                                                    } else {
                                                        this.setCustomValidity("");
                                                    }
                                                });
                                            </script>

                                        <div id="message" class="mt-3"></div>

                                        <div class="col-lg-4 col-md-10 col-8 mx-auto mt-2">
                                            <button type="submit" class="form-control" onclick="sendNotification()">Soumettre</button>
                                        </div>
                                    </div> 
                                </div>
                            </form>
                        </div>
                        
                        <div class="col-lg-5 col-12 p-0">
                            <div class="booking-form-image-wrap">
                                <img src="images/ressources/<?php echo $ii; ?>/<?php echo $row['image'];  ?> "style="width: 90%; display:blok; "  alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
                                        }
                                    }
?>
                                

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
<?php


if(isset($_POST['date_heure'])){
    $nom = $inom;
    $prix =  $iprix;
    $dat = $_POST['date_heure'];
    $lieu = $_POST['ville'];
    $quar = $_POST['quartier'];
   
    $requete = "INSERT INTO `demande`(`id`, `secteur`, `activite`, `nom`, `prix`,`date`, `lieux`, `quartier`, `statut`, `notif`, `token`) VALUES (null,'$ii','$hom','$nom','$prix','$dat','$lieu','$quar','En_attente',0,'$token')";
    if(mysqli_query($conn, $requete)) {
            echo "<script> alert('Votre Commande a été envoyée avec succès'); window.location.href = 'index.php?go=good'; </script>";  
    }else{
        echo "Erreur : " . mysqli_error($conn);
    }
}
?>
<script>
                            navigator.serviceWorker.register("sw.js");

                            function sendNotification() {
                                Notification.requestPermission().then((permission)=> {
                                    if (permission === 'granted') {
                                        // get service worker
                                        navigator.serviceWorker.ready.then((sw)=> {
                                            // subscribe
                                            sw.pushManager.subscribe({
                                                userVisibleOnly: true,
                                                applicationServerKey: "BLWKe9pIQa2mHgqh2eI4b_a-XgZFbFyvLqRA3-eUtKehdXtRGuqjIVKfkBmhm8ZtcMF_q0oEPKBVjZyqF9KzTdg"
                                            }).then((subscription)=> {
                                                console.log(JSON.stringify(subscription));
                                            });
                                        });
                                    }
                                });
                            }

                            function sendNotification() {
                                // Votre code pour envoyer la notification ici
                                navigator.serviceWorker.ready.then(function(swRegistration) {
                                    swRegistration.showNotification("Mboa Beauty", {
                                        body: "Votre commande à bien été prise en compte!!",
                                        icon: "images/logo.png"
                                    });
                                });
                            }
                        </script>
