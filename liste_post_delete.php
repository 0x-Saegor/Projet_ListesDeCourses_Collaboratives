<?php

session_start();

require_once(__DIR__ . '/isConnect.php');
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/functions.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$postData = $_POST;

if (!isset($postData['id']) || !is_numeric($postData['id'])) {
    echo 'Il faut un identifiant valide pour supprimer une liste.';
    return;
}

$getAuthor = $mysqlClient->prepare('SELECT author FROM list WHERE list_id = :id');
$getAuthor->execute([
    'id' => (int)$postData['id'],
]);
$author = $getAuthor->fetchAll()[0]['author'];

if($_SESSION['LOGGED_USER']['email'] !== $author){
    echo $_SESSION['LOGGED_USER']['email'];
    print_r ($author);
    echo "Cette liste n'est pas la votre";
    redirectToUrl("index.php");
}

$deleteListeStatement = $mysqlClient->prepare('DELETE FROM list WHERE list_id = :id');
$deleteListeStatement->execute([
    'id' => (int)$postData['id'],
]);

redirectToUrl('index.php');
