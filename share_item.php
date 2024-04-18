<?php
session_start();
require_once(__DIR__."/databaseconnect.php");
require_once(__DIR__."/variables.php");
require_once(__DIR__."/functions.php");
$postData = $_POST;
$getLine = $mysqlClient->prepare('SELECT title,author, access FROM list WHERE list_id = :id');
$getLine->execute([
    'id' => (int)$postData['id'],
]);
$total = $getLine->fetchAll();
$access = $total[0]['access'];
$access = unserialize($access);
$email = $postData['email'];
$id = 0;
foreach($users as $user){
    if($email == $user['email']){
        $id = $user['user_id'];
    }
}
if($id == 0){
    $_SESSION['SHARE_ERROR'] = "Cet email n'est pas dans la base de données.";
    redirectToUrl("liste_update.php?id=".$postData['id']);
}

if(in_array($id, $access)){
    $_SESSION['SHARE_ERROR'] = "Liste déjà partagée avec ".$email;
    redirectToUrl("liste_update.php?id=".$postData['id']);
}
array_push($access,$id);

$access = serialize($access);

$getLine = $mysqlClient->prepare('UPDATE list SET access = :access WHERE list_id = :id');
$getLine->execute([
    'id' => (int)$postData['id'],
    'access' => $access,

]);
$_SESSION['SHARED'] = "Liste partagée avec ".$email;

redirectToUrl("liste_update.php?id=".$postData['id']);
