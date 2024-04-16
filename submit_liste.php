<?php
$id = $_SESSION['LOGGED_USER']['id']
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/functions.php');

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

redirectToUrl("index.php");

?>


