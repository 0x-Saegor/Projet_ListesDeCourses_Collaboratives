<?php
session_start();
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/variables.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */

$getData = $_GET;

$getLine = $mysqlClient->prepare('SELECT title,author, access FROM list WHERE list_id = :id');
$getLine->execute([
    'id' => (int)$getData['list_id'],
]);
$total = $getLine->fetchAll();

$title=$total[0]['title'];
$author=$total[0]['author'];
$liste = $total[0]['access'];


if (
    !isset($getData['id'])
    || !isset($getData['list_id'])
) {
    redirectToUrl("liste_update.php?id=".$getData['list_id']);
}


if(in_array($_SESSION['LOGGED_USER']['user_id'], unserialize($liste['access']))){
    redirectToUrl("liste_update.php?id=".$getData['list_id']);
}


$deleteItem = $mysqlClient->prepare('DELETE FROM content WHERE content_id = :id');
$deleteItem->execute([
'id' => $getData['id'],
]);

redirectToUrl("liste_update.php?id=".$getData['list_id']);

?>


