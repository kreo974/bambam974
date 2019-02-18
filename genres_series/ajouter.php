<?php
    //recup l id en GET
    if (isset($_GET['id'])) {
        $id_serie = $_GET['id'];
    }

?>

<?php 
//var_dump($_GET);
//die(); 
?>

<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=netflix;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table acteurs

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="..\Index\bootstrap-4.2.1-dist\css\bootstrap.min.css">
<title>associer acteur_série<?php ?></title>
</head>
<body>

<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="../index/index.php">Netflix mentèr !</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" href="../acteurs/voir.php">Voir Acteurs</a>
</li>
<li class="nav-item">
<a class="nav-link" href="../acteurs/voir.php">Voir Séries</a>
</li>
<li class="nav-item">
<a class="nav-link" href="../genres/voir.php">Voir Genres</a>
</li>
</ul>
</div>
</nav>
</header>




<div class="container">

<form name="info_acteur" action="associer.php" method="POST">
<?php $reponse = $bdd->query("SELECT * FROM series WHERE id = '$id_serie'");?>
<?php while ($donnees = $reponse->fetch()):?>
<input type="hidden" name="id_serie" value="<?php echo $donnees['id']?>" />
<div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label"><?php echo $donnees['nom_series']?></label>
    <?php endwhile;?>
    
    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="id_genre">
        <?php $reponse = $bdd->query('SELECT id,label FROM genres');?>
        <?php while ($donnees = $reponse->fetch()):?>
    <option value="<?php echo $donnees['id']; ?>"><?php echo $donnees['label']; ?></option>
  
    <?php endwhile;?>
</select>

<button type="submit" class="btn btn-primary">Valider</button>
<a class="btn btn-primary" href="../series/voir.php" role="button">Retour</a>
</form>
</div>



<?php $reponse->closeCursor(); // Termine le traitement de la requête ?>



</body>
</html>