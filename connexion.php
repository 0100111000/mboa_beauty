<?php
session_start();
// Vérification des identifiants de connexion
$lien = array();
$lien = $_SESSION['lien'];
$nb = $_GET['nb'];
$i = 0;

if (isset($_SESSION['token'])) {
    $_SESSION['otherX'] = $_SESSION['token'];
    $liens = $lien[$nb];
    header("Location: $liens");
    exit;
} else
    if (isset($_COOKIE['token'])) {
        include 'config.php';

        $token = $_COOKIE['token'];
        // Requête pour récupérer l'utilisateur correspondant à l'identifiant unique
        $sql = "SELECT * FROM users WHERE token = '$token' and statu='client'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Restauration de la session de l'utilisateur connecté
            $_SESSION['email'] = $row['email'];
            $_SESSION['token'] = $row['token'];
            $_SESSION['sta'] = $row['statu'];
            $_SESSION['otherX'] = $row['otherX'];
            header("Location: $lien[$nb]");
            exit;
        }

        $conn->close();
    } else
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usern = $_POST["username"];
            $passwd = $_POST["password"];

            include "config.php";


            // Requête pour récupérer le mot de passe haché
            $sql = "SELECT * FROM users WHERE nom = '$usern' or email='$usern' or tel='$usern' and statu='client'";
            $result = $conn->query($sql);

            $i = 0;
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $hashedPassword = $row["password"];

                // Vérification du mot de passe haché
                
                if (password_verify($passwd, $row["password"])) {
                    // Authentification réussie
                    $_SESSION['email'] = $row['email'];
                    echo "Authentification réussie !";
                    if (isset($_POST['remember'])) {
                        // Stockage de l'identifiant unique dans un cookie pendant 30 jours
                        setcookie('token', $row['token'], time() + (30 * 24 * 60 * 60));
                    }
                    $_SESSION['token'] = $row['token'];
                    $_SESSION['otherX'] = $row['otherX'];
                    $_SESSION['sta'] = $row['statu'];
                    header("Location: $lien[$nb]");
                    exit;

                } else {
                    // Mot de passe incorrect
                    $i = 1;
                    // echo '<div class="alert alert-danger" role="alert">Mot de passe incorrect ou utilisateur introuvable.</div>';

                }
            } else {
                // Utilisateur non trouvé
                $i = 1;
                //echo '<div class="alert alert-danger" role="alert">Mot de passe incorrect ou utilisateur introuvable.</div>';
            }

            $conn->close();
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
                                    <form class="custom-form booking-form" action="#" method="POST" role="form">
                                        <div class="text-center mb-4 pb-lg-2">
                                            <em class="text-white">Your Beauty At Home</em>

                                            <h2 class="text-white">Connexion</h2>
                                        </div>

                                        <div class="booking-form-body">
                                            <div class="row">

                                                <div class="col-lg-6 col-12">
                                                    <input type="text" name="username" id="booking-form-name"
                                                        class="form-control" placeholder="Email/Tel/Nom" required>
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <input type="password" name="password" id="booking-form-password"
                                                        class="form-control" placeholder="Entre votre mot de passe"
                                                        required>
                                                </div>

                                                <div class="col-lg-12 col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                            id="remember-checkbox">
                                                        <label class="form-check-label" for="remember-checkbox">
                                                            <p><em class="text-white"> Rester connecté</em>
                                                        </label>
                                                    </div>
                                                </div>
                                                <?php
                                                if ($i == 1) {
                                                    $i = 1;
                                                    echo '<div class="alert alert-danger" role="alert">Mot de passe incorrect ou utilisateur introuvable.</div>';
                                                }
                                                ?>

                                                <div class="col-lg-4 col-md-10 col-8 mx-auto mt-2">
                                                    <button type="submit" class="form-control">Connexion</button>
                                                </div>

                                                <div class="col-lg-4 col-md-10 col-8 mx-auto mt-2">
                                                    <p><em class="text-white"> Vous n'avez pas encore de compte? cliquer
                                                            sur</em>
                                                        <a href="inscription.php?nb=<?php echo $nb; ?>">Inscription</a>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/vegas.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>