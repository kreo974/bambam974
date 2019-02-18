<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=netflix;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO acteurs(nom, prenom, date_naissance) VALUES(?, ?, ?)');
$req->execute(array($_POST['nom'], $_POST['prenom'], $_POST['date_naissance']));

// Redirection du visiteur vers la page du minichat
header('Location: voir.php');
?>