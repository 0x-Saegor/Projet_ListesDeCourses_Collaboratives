<?php
session_start();
require_once(__DIR__."/functions.php");
require_once(__DIR__."/variables.php");$getData = $_GET;

$list_id = $getData['list_id'];
$user_id = $getData['user_id'];

$getContent = $mysqlClient->prepare('SELECT access FROM list WHERE list_id = :list_id');
$getContent->execute([
    'list_id' => $list_id,

]);
$contenuListe = $getContent->fetchAll();

$access = $contenuListe[0]['access'];
$access = unserialize($access);

$pos = array_search($user_id, $access);

unset($access[$pos]);

$access = serialize($access);
$updateContent = $mysqlClient->prepare('UPDATE list SET access = :access WHERE list_id = :list_id');
$updateContent->execute([
    'access' => $access,
    'list_id' => $list_id,

]);
redirectToUrl("shared.php");