<?php
    //recup l id en GET
    if (isset($_GET['id'])) {
        $id_genre = $_GET['id'];
    }

?>
<?php
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=netflix;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // On récupère tout le contenu de la table series
        
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
    $reponse = $bdd->query("DELETE FROM genres WHERE id = '$id_genre'");

    header('Location: voir.php');
?>
