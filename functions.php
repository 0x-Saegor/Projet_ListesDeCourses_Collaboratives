<?php
require_once(__DIR__."/databaseconnect.php");
require_once(__DIR__."/variables.php");


function displayAuthor(string $authorEmail, array $users): string
{
    foreach ($users as $user) {
        if ($authorEmail === $user['email']) {
            return $user['full_name'] . '(' . $user['age'] . ' ans)';
        }
    }

    return 'Auteur inconnu';
}


function redirectToUrl(string $url): never
{
    header("Location: {$url}");
    exit();
}
