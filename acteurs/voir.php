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
	$reponse = $bdd->query('SELECT * FROM acteurs ORDER BY Nom ');
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../index/index.php">Netflix mentèr !</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../series/voir.php">Voir Séries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../genres/voir.php">Voir Genres</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Date de naissance</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <?php while ($donnees = $reponse->fetch()) : ?>
                <tbody>
                    <tr>
                        <td scope="col"><?php echo $donnees['nom']?></td>
                        <td scope="col"><?php echo $donnees['prenom']?></td>
                        <td scope="col"><?php echo $donnees['date_naissance']?></td>
                        <td scope="col"><a class="btn btn-outline-dark" href="editer.php?id=<?php echo $donnees['id']?>" role="button">Editer</a></td>
                        <td scope="col"><a class="btn btn-outline-dark" href="../acteurs_series/voir.php?id=<?php echo $donnees['id']?>" role="button">Voir détails de l'acteur</a></td>
                        <td scope="col"><a class="btn btn-outline-dark" href="supprimer.php?id=<?php echo $donnees['id']?>" role="button" onclick="return confirm('voulez-vous vraiment supprimer ?')">Supprimer</a></td>
                    </tr>
                </tbody>
                <?php endwhile; ?>
            </table>
        </div>
        <?php
            $reponse->closeCursor(); // Termine le traitement de la requête
        ?>  


    </body>
</html>