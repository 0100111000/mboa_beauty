<?php
session_start();
//session_destroy();
// Vérification des identifiants de connexion
$i=0;
include "../config.php";
echo "0";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    echo "1";
    
    // Requête pour récupérer le mot de passe haché
    $sql = "SELECT * FROM users WHERE nom = '$username' or email='$username' or tel='$username' and statu='admin'";
    $result = $conn->query($sql);
    $i=0;
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];
        
        // Vérification du mot de passe haché
		//echo $row["motdepasse"];
        echo "Verifier le mot de passe";
        if (password_verify($password, $row["password"])) {
            // Authentification réussie
            echo "Authentification réussie !";
			$_SESSION['email']= $row['email'];
            $_SESSION['token'] = $row['token'];
            $_SESSION['stat'] = $row['statu'];
			header("Location: index.php");
			exit;
        } else {
            // Mot de passe incorrect
            $i=1;
           // echo '<div class="alert alert-danger" role="alert">Mot de passe incorrect ou utilisateur introuvable.</div>';
            
        }
    } else {
        // Utilisateur non trouvé
        $i=1;
        //echo '<div class="alert alert-danger" role="alert">Mot de passe incorrect ou utilisateur introuvable.</div>';
    }
    
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Mboa Adminer</title>
  

</head>
<body>
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
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
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
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
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
        <input type="text" placeholder="Email or Phone" id="username" name="username">

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Entrez votre mot de passe" id="password" name="password">
        </br>
        <?php 
            if($i==1){
                $i=1;
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