<?php

$conn = mysqli_connect("localhost", "root", "", "mboa") or die("Impossible de se connecter � la base de donn�es");

if (mysqli_connect_errno())
{
  echo "Echec de la connexion � MySQL: " . mysqli_connect_error();
}
?>