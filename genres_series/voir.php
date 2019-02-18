<!--Affichage info selon la série-->
<?php
    //recup l id en GET
    if (isset($_GET['id'])) {
           $id_serie = $_GET['id'];
    }
    //var_dump($_GET);
    //die();
    
    ?>
<?php
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=netflix;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // On récupère tout le contenu de la table series
        $reponse = $bdd->query('SELECT * FROM series WHERE id = '.$id_serie);
        $reponse1 = $bdd->query("SELECT * FROM genres_series INNER JOIN genres  ON id_genre = genres.id INNER JOIN series ON id_serie = series.id WHERE id_serie = '$id_serie'");
    
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
    
    //print_r($reponse->fetch());
    //die();
    
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="..\Index\bootstrap-4.2.1-dist\css\bootstrap.min.css">
        <title>Document</title>
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
                        </li><li class="nav-item">
                            <a class="nav-link" href="../series/voir.php">Voir Séries</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../genres/voir.php">Voir Genres</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="jumbotron">
                <?php while ($donnees = $reponse->fetch()) : ?>
                <h1 class="display-4"><strong><?php echo $donnees['nom_series']?></strong></h1>
                <p class="lead">La liste des genres de cette série</p>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="../genres_series/ajouter.php?id=<?php echo $donnees['id']?>" role="button">Lier à un genre</a> <a class="btn btn-primary btn-lg" href="../genres/voir.php?" role="button">Retour</a>
                <?php endwhile; ?>
            </div>
        </header>
        <ul class="list-group list-group-horizontal-xl">
            <?php while ($donnees1 = $reponse1->fetch()) : ?>
            <li class="list-group-item" id="<?php echo $donnees1['id_serie']?>"> <?php echo $donnees1['label']; ?> <a href="supprimer.php?id=<?php echo $donnees1['id_genre']?>" class="badge badge-primary"  onclick="return confirm('voulez-vous vraiment supprimer ?')">Supprimer</a></li>
            <?php endwhile; ?>
        </ul>
        
    </body>
</html>
