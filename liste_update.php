<?php session_start(); 
require_once(__DIR__ . '/databaseconnect.php');

$userEmail= $_SESSION['LOGGED_USER']['email'];
$getData = $_GET;

$getLine = $mysqlClient->prepare('SELECT title,author FROM list WHERE list_id = :id');
$getLine->execute([
    'id' => (int)$getData['id'],
]);
$total = $getLine->fetchAll();
$title=$total[0]['title'];
$author=$total[0]['author'];

$getContent = $mysqlClient->prepare('SELECT title FROM content INNER JOIN users ON users.user_id = content.author_id WHERE list_id = :id AND email = :email');
$getContent->execute([
    'id' => (int)$getData['id'],
    'email' => $author,

]);
$contenuListe = $getContent->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de listes - Page d'ajout de liste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">

        <?php require_once(__DIR__ . '/header.php'); ?>
        <?php if($author === $_SESSION['LOGGED_USER']['email']):?>
        <h1><?php echo $title?></h1>
        <?php foreach ($contenuListe as $contenu) : ?>
            <article>
                <p><?php echo($contenu['title']); ?></p>
            </article>
        <?php endforeach ?>







        <?php else:?>
        <p>Cette liste n'est pas la vôtre, retournez à l'accueil et cliquez sur éditer la liste.</p>
        <?php endif;?>
    </div>

</body>

</html>