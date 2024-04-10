<?php
require_once(__DIR__ . '/databaseconnect.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */

$postData = $_POST;

if (
    !isset($postData['title'])
    || !isset($postData['email'])
) {
    echo('Il faut un titre pour soumettre le formulaire.');
    return;
}



// Ecriture de la requête
$sqlQuery = 'INSERT INTO list(title, author) VALUES (:title, :author)';

// Préparation
$insertListe = $mysqlClient->prepare($sqlQuery);

// Exécution ! La recette est maintenant en base de données
$insertListe->execute([
    'title' => $postData['title'],
    'author' => $postData['email'],
]);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Contact reçu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">

        <?php require_once(__DIR__ . '/header.php'); ?>
        <h1>Liste ajoutée</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rappel de votre recette</h5>
                <p class="card-text"><b>Titre</b> : <?php echo($postData['title']); ?></p>
                <p class="card-text"><b>Auteur</b> : <?php echo($postData['email']); ?></p>
            </div>
        </div>
    </div>
</body>
</html>
