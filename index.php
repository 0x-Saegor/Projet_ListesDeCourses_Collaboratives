<!-- inclusion des variables et fonctions -->
<?php session_start();
require_once(__DIR__."/functions.php");
require_once(__DIR__."/variables.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de listes de courses - Page d'accueil</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <!-- inclusion de l'entête du site -->
        <?php require_once(__DIR__ . '/header.php'); ?>

        

        <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
            <?php require_once(__DIR__ . '/login.php'); ?>
        <?php else :?>
            <h1>Vos listes</h1>
            <?php foreach ($listes as $liste) : ?>
            <article>
                <h3><?php echo($liste['title']); ?></h3>
                <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><a class="link-success" href="recipes_update.php?id=<?php echo($liste['list_id']); ?>">Editer la liste</a></li>
                        <li class="list-group-item"><a class="link-danger" href="recipes_delete.php?id=<?php echo($liste['list_id']); ?>">Supprimer la liste</a></li>
                </ul>
            </article>
        <?php endforeach ?>
        <?php endif;?>



        <!-- Formulaire de connexion -->
        
    </div>

    <!-- inclusion du bas de page du site -->
</body>
</html>
