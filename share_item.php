<?php
require_once(__DIR__."/databaseconnect.php");
require_once(__DIR__."/variables.php");
$postData = $_POST;
$getLine = $mysqlClient->prepare('SELECT title,author, access FROM list WHERE list_id = :id');
$getLine->execute([
    'id' => (int)$postData['id'],
]);
$total = $getLine->fetchAll();
$access = $total[0]['access'];
$access = unserialize($access);
print_r($access);
array_push($access,9);
print_r($access);
$email = $postData['email'];
foreach($users as $user){
    if($email == $user['email']){
        $
    }
}