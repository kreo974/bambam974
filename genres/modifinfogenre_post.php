<?php

//recup la variable POST

$mon_formulaire["id"] = $_POST["id"];
$mon_formulaire["label"] = $_POST["label"];

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
$req = $bdd->prepare('UPDATE genres SET label = :label WHERE id = :id');
$req->execute(array(
    ':label' => $_POST['label'],
    ':id' => $_POST["id"]

));
header('Location: voir.php');


?>