<?php
session_start();
// Vérification des identifiants de connexion
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    session_destroy();
}
$i = 0;

include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (isset($_SESSION['modalShown'])) {
        // Détruisez la session 'modalShown'
        unset($_SESSION['modalShown']);
    }

    if ($password == 'default') {
        $_SESSION['defaut'] = '1';
    } else {
        $_SESSION['defaut'] = '0';
    }


    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Requête pour récupérer le mot de passe haché
    $sql = "SELECT * FROM users WHERE nom = '$username' or email='$username' or tel='$username' and statu='empl'";
    $result = $conn->query($sql);
    $i = 0;
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        // Vérification du mot de passe haché
        //echo $row["motdepasse"];
        if (password_verify($password, $row["password"])) {
            // Authentification réussie
            $_SESSION['email'] = $row['email'];
            echo "Authentification réussie !";
            if (isset($_POST['remember'])) {
                // Stockage de l'identifiant unique dans un cookie pendant 30 jours
                setcookie('token', $row['token'], time() + (30 * 24 * 60 * 60));
            }
            $_SESSION['token'] = $row['token'];
            $_SESSION['otherX'] = $row['otherX'];
            $_SESSION['name'] = $row['nom'];
            header("Location: index.php");
            exit;
        } else {
            // Mot de passe incorrect
            $i = 1;
            //echo '<div class="alert alert-danger" role="alert">Mot de passe incorrect ou utilisateur introuvable.</div>';

        }
    } else {
        // Utilisateur non trouvé
        $i = 1;
        //echo '<div class="alert alert-danger" role="alert">Mot de passe incorrect ou utilisateur introuvable.</div>';
    }

    $conn->close();
}


?>

<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Mboa Adminer</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #080710;
        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(#1845ad,
                    #23a2f6);
            left: -80px;
            top: -80px;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #ff512f,
                    #f09819);
            right: -30px;
            bottom: -80px;
        }

        form {
            height: 520px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        button {
            margin-top: 10px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .social {
            margin-top: 30px;
            display: flex;
        }

        .social div {
            background: red;
            width: 150px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: rgba(255, 255, 255, 0.27);
            color: #eaf0fb;
            text-align: center;
        }

        .social div:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }

        .social .fb {
            margin-left: 25px;
        }

        .social i {
            margin-right: 4px;
        }

        .alert {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            position: relative;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>




</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="login.php">
        <h3>Connexion</h3>

        <label for="username">Login</label>
        <input type="text" placeholder="Email,Name or Phone" id="username" name="username">

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Entrez votre mot de passe" id="password" name="password">
        </br>
        <?php
        if ($i == 1) {
            $i = 1;
            echo '<div class="alert alert-danger" role="alert">Mot de passe incorrect ou utilisateur introuvable.</div>';
        }
        ?>

        <button type="submit">Se Connecter</button>

    </form>
</body>

</html>
<!-- partial -->

</body>

</html>