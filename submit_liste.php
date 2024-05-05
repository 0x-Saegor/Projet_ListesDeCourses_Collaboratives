<?php
session_start();
$id = $_SESSION['LOGGED_USER']['user_id'];
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

$access = [$id];
$access = serialize($access);


// Ecriture de la requête
$sqlQuery = 'INSERT INTO list(title, author, access) VALUES (:title, :author, :access)';

// Préparation
$insertListe = $mysqlClient->prepare($sqlQuery);

// Exécution ! La liste est maintenant en base de données
$insertListe->execute([
    'title' => $postData['title'],
    'author' => $postData['email'],
    'access' => $access,
]);

redirectToUrl("index.php");

?>


