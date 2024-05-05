<?php

session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$postData = $_POST;

// Validation du formulaire
if (isset($postData['email']) &&  isset($postData['password']) && isset($postData['surname']) &&  isset($postData['name'])) {
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Il faut un email valide pour soumettre le formulaire.';
    } else {
        foreach ($users as $user) {
            if ($user['email'] === $postData['email']) {
                $_SESSION['LOGIN_ERROR_MESSAGE'] = sprintf(
                    "L'email donné avait déjà été entré par quelqu'un d'autre : (%s)",
                    $postData['email']);

                redirectToUrl("register.php");
                return;
                exit;
            }}
            
        $full_name = $postData['surname']." ".$postData['name'];

        $sqlQuery = 'INSERT INTO users(full_name, email, password) VALUES (:full_name, :email, :password)';

        // Préparation
        $insertUser = $mysqlClient->prepare($sqlQuery);

        // Exécution ! La liste est maintenant en base de données
        $insertUser->execute([
            'full_name' => $full_name,
            'email' => $postData['email'],
            'password' => $postData['password'],
        ]);

        redirectToUrl("index.php");
        return;
        exit;

            
        

        
    }

    redirectToUrl('register.php');
}