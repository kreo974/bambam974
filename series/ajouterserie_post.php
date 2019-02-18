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
$req = $bdd->prepare('INSERT INTO series(nom_series, nbr_saison, nbr_episode) VALUES(?, ?, ?)');
$req->execute(array($_POST['nom_series'], $_POST['nbr_saison'], $_POST['nbr_episode']));

// Redirection du visiteur vers la page du minichat
header('Location: ../series/voir.php');
?>
