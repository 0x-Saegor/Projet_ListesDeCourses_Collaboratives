<?php
session_start();
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/variables.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */

$postData = $_POST;

$getLine = $mysqlClient->prepare('SELECT title,author, access FROM list WHERE list_id = :id');
$getLine->execute([
    'id' => (int)$postData['id'],
]);
$total = $getLine->fetchAll();


if(!in_array($_SESSION['LOGGED_USER']['user_id'], unserialize($total[0]['access']))){
    redirectToUrl("liste_update.php?id=".$postData['id']);
}


$id = $_SESSION['LOGGED_USER']['user_id'];


// Ecriture de la requête
$sqlQuery = 'INSERT INTO content(title, author_id, list_id) VALUES (:title, :author_id, :list_id)';

// Préparation
$insertListe = $mysqlClient->prepare($sqlQuery);

// Exécution ! La liste est maintenant en base de données
$insertListe->execute([
    'title' => $postData['title'],
    'author_id' => $id,
    'list_id' => $postData['id'],

]);

redirectToUrl("liste_update.php?id=".$postData['id']);

?>


