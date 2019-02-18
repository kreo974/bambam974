<?php
    //recup l id en GET
    if (isset($_GET['id'])) {
        $id_acteur = $_GET['id'];
    }

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
    $reponse = $bdd->query("DELETE FROM acteurs WHERE id = '$id_acteur'");

    header('Location: voir.php');
?>
