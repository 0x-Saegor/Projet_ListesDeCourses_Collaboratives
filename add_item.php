<?php
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/variables.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */

$postData = $_POST;


if (
    !isset($postData['title'])
    || !isset($postData['id'])
    || !isset($postData['email'])
) {
    redirectToUrl("liste_update.php?id=%s",$postData['id']);
}

foreach ($users as $user) {
    if ($user['email'] === $postData['email']) {
        $id=$user['user_id'];
    }}


// Ecriture de la requête
$sqlQuery = 'INSERT INTO content(title, author_id, list_id) VALUES (:title, :author_id, :list_id)';

// Préparation
$insertListe = $mysqlClient->prepare($sqlQuery);

// Exécution ! La recette est maintenant en base de données
$insertListe->execute([
    'title' => $postData['title'],
    'author_id' => $id,
    'list_id' => $postData['id'],

]);

redirectToUrl("liste_update.php?id=".$postData['id']);

?>


