<!-- inclusion des variables et fonctions -->
<?php session_start();
require_once(__DIR__."/functions.php");
require_once(__DIR__."/variables.php");
?>
<!-- https://www.w3schools.com/bootstrap/bootstrap_examples.asp 

https://www.cluemediator.com/insert-an-array-into-a-mysql-database-using-php
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de listes de courses - Page d'accueil</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.css"
            rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <!-- inclusion de l'entête du site -->
        <?php require_once(__DIR__ . '/header.php'); ?>

        

        
        <?php require_once(__DIR__ . '/login.php'); ?>
        <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
            <h1>Vos listes</h1>
            <?php foreach ($listes as $liste) : ?>
            <?php if(in_array($_SESSION['LOGGED_USER']['user_id'], unserialize($liste['access']))):?>
            <article>
                <ul class="list-group list-group-horizontal">
                    <h4><?php echo($liste['title']); ?></h4>
                    <a class="btn btn-success mx-lg-2" href="liste_update.php?id=<?php echo($liste['list_id']); ?>">Editer la liste</a>
                    <a class="btn btn-danger mx-lg-2" href="liste_delete.php?id=<?php echo($liste['list_id']); ?>">Supprimer la liste</a>
                </ul>
                <br>
            </article>
        <?php endif;?>
        <?php endforeach ?>
        <?php endif;?>



        <!-- Formulaire de connexion -->
        
    </div>

    <!-- inclusion du bas de page du site -->
</body>
</html>
