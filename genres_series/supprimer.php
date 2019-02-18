<?php
    //recup l id en GET
    if (isset($_GET['id'])) {
        $id_genre = $_GET['id'];
    }
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
    $reponse = $bdd->query("DELETE FROM genres_series WHERE id_genre = '$id_genre'");

    header('Location: ../series/voir.php');
?>