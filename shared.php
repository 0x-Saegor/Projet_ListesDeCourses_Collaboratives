<!-- inclusion des variables et fonctions -->
<?php session_start();
require_once(__DIR__."/functions.php");
require_once(__DIR__."/variables.php");

$getContent = $mysqlClient->prepare('SELECT title,access, list_id FROM list WHERE author = :author');
$getContent->execute([
    'author' => $_SESSION['LOGGED_USER']['email'],

]);
$contenuListe = $getContent->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de listes de courses - Listes partagées</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.css"
            rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <!-- inclusion de l'entête du site -->
        <?php require_once(__DIR__ . '/header.php'); ?>

        <?php
        if($contenuListe == []){
            echo "Vous n'avez aucune liste";
        }


        foreach($contenuListe as $liste){
            echo "<strong>".$liste['title'] ."</strong>". " est partagée avec : ";
            foreach(unserialize($liste['access']) as $st){
                foreach($users as $user){
                    if($user['user_id'] == $st && $user['user_id'] != $_SESSION['LOGGED_USER']['user_id']){
                        echo "<a data-toggle='tooltip' data-placement='top' title='Supprimer le partage' href='remove_share.php?list_id=".$liste['list_id']."&user_id=".$user['user_id']."'>".$user['email']."</a>"." ";
                    }
                }
            }
            echo "<br>";
        }

        ?>


        
    </div>

</body>
</html>
