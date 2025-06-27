<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "php-social-network";

try{
    $bdd= new PDO("mysql:host=$host;dbname=$db;charset=utf8", $username, $password);
   // echo "Connexion réussie à la base de données <br>";


}catch(PDOException $e){
    die("Erreur connexion : " . $e->getMessage());
}
 

