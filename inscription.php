<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nb = $_GET['nb'];
}
$i = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le formulaire a été transmis
    $nb = $_POST['nb'];
    if (isset($_POST["nom"])) {
        // Récupérer les valeurs du formulaire
        $nom = $_POST["nom"];
        $email = $_POST["email"];
        $mdps = $_POST["mdp"];
        $tel = $_POST["tel"];


        $chiffre1 = rand(0, 9);
        $chiffre2 = rand(0, 9);
        $chiffre3 = rand(0, 9);
        $chiffre4 = rand(0, 9);
        $chiffre = "" . $chiffre1 . "" . $chiffre2 . "" . $chiffre3 . "" . $chiffre4 . "" . "" . $tel;


        include 'config.php';


        // Vérifier si l'email exite déjà
        $requete_verification = "SELECT id FROM users WHERE email='$email'";
        $resultat_verification = mysqli_query($conn, $requete_verification);
        if (mysqli_num_rows($resultat_verification) > 0) {

            $i = 1;

        } else {


            // Insérer les données dans la table des utilisateurs
            $hashM = password_hash($mdps, PASSWORD_DEFAULT);
            $hashM = addslashes($hashM);
            $requete = "INSERT INTO `users`(`id`, `nom`, `email`, `tel`, `password`, `statu`,`token`) VALUES (null,'" . $nom . "', '" . $email . "','" . $tel . "','" . $hashM . "','client','" . $chiffre . "')";
            if (mysqli_query($conn, $requete)) {
                echo "Inscription réussie !";
                echo "Authentification réussie !";
                echo $nb;
                header("Location: connexion.php?nb=$nb");
                exit;
            } else {
                echo "Erreur : " . mysqli_error($conn);
            }

            // Fermer la connexion
            mysqli_close($conn);
        }
    }
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

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,400;0,600;0,700;1,200;1,700&display=swap"
        rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/vegas.min.css" rel="stylesheet">

    <link href="css/tooplate-barista.css" rel="stylesheet">
    <!--

Tooplate 2137 Barista

https://www.tooplate.com/view/2137-barista-cafe

Bootstrap 5 HTML CSS Template

-->
</head>

<body class="reservation-page">

    <main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    MBOA BEAUTY
                </a>
            </div>
        </nav>


        <section class="booking-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12 mx-auto">
                        <div class="booking-form-wrap">
                            <div class="row">
                                <div class="col-lg-7 col-12 p-0">
                                    <form class="custom-form booking-form" action="inscription.php" method="post"
                                        role="form">
                                        <div class="text-center mb-4 pb-lg-2">
                                            <em class="text-white">Your Beauty At Home</em>

                                            <h2 class="text-white">INSCRIPTION</h2>
                                        </div>

                                        <div class="booking-form-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-12">
                                                    <input type="text" name="nom" id="name" class="form-control"
                                                        placeholder="Nom" required>
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <input type="number" class="form-control" name="tel" min="0"
                                                        max="999999999" placeholder="+237 " required="">
                                                </div>
                                                <input type="hidden" name="nb" value="<?php echo $nb ?>">

                                                <div class="col-lg-6 col-12">
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        placeholder="Email@mail.com" required>
                                                </div>

                                                <input type="hidden" name="nb" value="<?php echo $nb ?>">
                                                <div class="col-lg-6 col-12">
                                                    <input type="password" name="mdp" id="password" class="form-control"
                                                        placeholder="Entre votre mot de passe" required>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <input type="password" name="cmdp" id="confirm-password"
                                                        class="form-control" placeholder="Confirmer votre mot de passe"
                                                        required>
                                                </div>
                                                <div class="progress">
                                                    <div id="progress-bar" class="progress-bar bg-danger"
                                                        style="width: 0%"></div>
                                                </div>
                                                <style>
                                                    .progress {
                                                        height: 5px;
                                                        /* Réduisez cette valeur pour diminuer l'épaisseur de la barre */
                                                        background-color: #fff;
                                                        transition: width 0.3s ease-in-out;
                                                    }
                                                </style>
                                                <div id="message" class="mt-3"></div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="privacyPolicyCheck" required>
                                                    <label class="form-check-label" for="privacyPolicyCheck">
                                                        <em class="text-white">J'accepte la</em> <a
                                                            href="confident.html" target="_blank">politique
                                                            de confidentialité</a>.
                                                    </label>
                                                </div>

                                                <?php
                                                if ($i == 1) {
                                                    $i = 1;
                                                    echo '<div class="alert alert-danger" role="alert">Se compte existe déjà !! Cliquez sur connexion</div>';
                                                }
                                                ?>

                                                <div class="col-lg-4 col-md-10 col-8 mx-auto mt-2">
                                                    <button type="submit" class="form-control">S'inscrire</button>
                                                </div>

                                                <div class="col-lg-4 col-md-10 col-8 mx-auto mt-2">
                                                    <p><em class="text-white"> Vous avez déjà un compte cliquer sur</em>
                                                        <a href="connexion.php?nb=<?php echo $nb ?>">Connexion</a>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-lg-5 col-12 p-0">
                                    <div class="booking-form-image-wrap">

                                        <img src="images/logo.png" style="width: 80%; display:blok; margin-left: 50px; "
                                            alt="">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </section>



    </main>


    <!-- JAVASCRIPT FILES -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/vegas.min.js"></script>
    <script src="js/custom.js"></script>

</body>
<script>
    function isPasswordStrong(password) {
        return password.length >= 6 && /[A-Z]/.test(password) && /[a-z]/.test(password);
    }


    document.getElementById('password').addEventListener('input', function (event) {
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

    document.querySelector('form').addEventListener('submit', function (event) {
        event.preventDefault(); // Empêche le rechargement de la page

        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm-password').value;
        var message = document.getElementById('message');

        if (password.trim() === '' || confirmPassword.trim() === '') {
            message.innerHTML = '<div class="alert alert-danger">Veuillez remplir tous les champs du mot de passe.</div>';
            return;
        }

        if (password === confirmPassword && isPasswordStrong(password)) {
            // Soumettre le formulaire
            this.submit();
        } else {
            message.innerHTML = '<div class="alert alert-danger">Les mots de passe ne correspondent pas ou ne sont pas suffisamment forts.</div>';
        }
    });
</script>

</html>