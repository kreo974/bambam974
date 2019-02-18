<?php

//recup la variable POST

$mon_formulaire["id"] = htmlentities($_POST["id"]);
$mon_formulaire["nom"] = htmlentities($_POST["nom"]);
$mon_formulaire["prenom"] = htmlentities($_POST["prenom"]);
$mon_formulaire["date_naissance"] = htmlentities($_POST["date_naissance"]);

//var_dump($mon_formulaire["id"]);
//var_dump($_POST);
//die();
//Todo : Vériffier que les informations sont corrects
//utiliser htmlentities

// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=netflix;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

//Todo : UPDATE les données dans la table acteurs
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('UPDATE acteurs SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance WHERE id = :id');
$req->execute(array(
    ':nom' => $_POST['nom'], 
    ':prenom' => $_POST['prenom'], 
    ':date_naissance' => $_POST['date_naissance'],
    ':id' => $_POST["id"]

));
header('Location: voir.php');


?>
