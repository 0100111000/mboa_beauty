<?php
session_start();
// Vérification des identifiants de connexion
$i = 0;
include '../config.php';
$nom = $_SESSION['name'];
if (isset($_POST['mdp'])) {

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

        #progressBar {
            /* Style de base de la barre de progression */
            width: 0;
            height: 20px;
            background-color: #FF0000;
            /* Rouge */
            transition: width .3s ease-in-out, background-color .3s ease-in-out;
            border-radius: 10px;
        }

        #progressBar::-webkit-progress-bar {
            /* Style de base pour Chrome, Safari et Opera */
            border-radius: 10px;
            background-color: #f3f3f3;
        }

        #progressBar::-webkit-progress-value {
            /* Animation pour Chrome, Safari et Opera */
            background-color: #4CAF50;
            transition: width .3s ease-in-out;
            border-radius: 10px;
        }

        #progressBar::-moz-progress-bar {
            /* Animation pour Firefox */
            background-color: #4CAF50;
            transition: width .3s ease-in-out;
            border-radius: 10px;
        }

        #back {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-family: Arial, sans-serif;
            text-align: center;
            text-decoration: none;
            background-color: #4CAF50;
            /* Vert */
            color: white;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        #back:hover {
            background-color: #45a049;
            /* Vert foncé */
        }
    </style>




</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="comptes.php">
        <h3>Gestion de compte</h3>

        <label for="username">Nom: <i>
                <?php echo $nom; ?>
            </i></label>

        <label for="password">Mot de passe (Actuel)</label>
        <input type="password" placeholder="Entrez votre mot de passe" id="amdp" name="amdp">

        <label for="password">Nouveau mot de passe</label>
        <input type="password" placeholder="Entrez le nouveau mot de passe" id="mdp" name="mdp">

        <label for="password">Confirmer le mot de passe</label>
        <input type="password" placeholder="Confirmer votre mot de passe" id="cmdp" name="cmdp">
        </br>
        <div id="progressBar"></div>

        <progress id="progressBar" max="2" value="0" style="width: 100%; height: 5px;"></progress>

        <button type="submit">Modifier</button><br />
        <div style="text-align: center;">
            <a id="back" href='index.php'>Annuler</a>
        </div>

        <div id="message"></div>

    </form>
</body>

</html>
<!-- partial -->

</body>
<script>
    var mdp = document.getElementById("mdp");
    var cmdp = document.getElementById("cmdp");
    var progressBar = document.getElementById("progressBar");
    var message = document.getElementById("message");

    // Fonction pour vérifier la validité du mot de passe
    function isPasswordStrong(password) {
        return password.length >= 6 && /[A-Z]/.test(password) && /[a-z]/.test(password);
    }

    // Ajoutez un écouteur d'événements pour vérifier la validité du mot de passe en temps réel
    mdp.addEventListener("input", function () {
        var password = mdp.value;

        if (isPasswordStrong(password)) {
            progressBar.style.width = '100%';
            progressBar.style.backgroundColor = '#4CAF50'; // Vert
            message.innerHTML = '<div class="alert alert-success">Mot de passe suffisamment fort.</div>';
        } else {
            var strength = Math.floor((password.length / 30) * 100); // Calculer la force en pourcentage
            progressBar.style.width = strength + '%';
            progressBar.style.backgroundColor = '#FF0000'; // Rouge
            message.innerHTML = '<div class="alert alert-danger">Mot de passe faible.</div>';
        }
    });

    cmdp.addEventListener("input", function () {
        checkPasswordConfirmation(mdp.value, cmdp.value);
    });

    // Fonction pour vérifier la confirmation du mot de passe
    function checkPasswordConfirmation(password, confirmPassword) {
        if (password === confirmPassword) {
            // Les mots de passe correspondent
            cmdp.setCustomValidity("");
        } else {
            // Les mots de passe ne correspondent pas
            cmdp.setCustomValidity("Les mots de passe ne correspondent pas");
        }
    }
</script>


</html>