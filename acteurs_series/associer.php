<?php
//var_dump($_POST);
//die();
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
$req = $bdd->prepare('INSERT INTO acteurs_series(id_serie,id_acteur) VALUES(?, ?)');

$req->execute(array($_POST['id_serie'], $_POST['id_acteur']));

// Redirection du visiteur vers la page du minichat
header('Location: ../acteurs_series/voir.php?id= '.$_POST['id_acteur']);
?>
