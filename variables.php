<?php
require_once(__DIR__."/databaseconnect.php");

// Récupération des variables à l'aide du client MySQL
$usersStatement = $mysqlClient->prepare('SELECT * FROM users');
$usersStatement->execute();
$users = $usersStatement->fetchAll();

$listesStatement = $mysqlClient->prepare('SELECT * FROM list');
$listesStatement->execute();
$listes = $listesStatement->fetchAll();
