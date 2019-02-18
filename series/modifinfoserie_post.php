<?php

//recup la variable POST

$mon_formulaire["id"] = $_POST["id"];
$mon_formulaire["nom_series"] = $_POST["nom_series"];
$mon_formulaire["nbr_saison"] = $_POST["nbr_saison"];
$mon_formulaire["nbr_episode"] = $_POST["nbr_episode"];

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
$req = $bdd->prepare('UPDATE series SET nom_series = :nom_series, nbr_saison = :nbr_saison, nbr_episode = :nbr_episode WHERE id = :id');
$req->execute(array(
    ':nom_series' => $_POST['nom_series'], 
    ':nbr_saison' => $_POST['nbr_saison'], 
    ':nbr_episode' => $_POST['nbr_episode'],
    ':id' => $_POST["id"]

));
header('Location: voir.php');


?>