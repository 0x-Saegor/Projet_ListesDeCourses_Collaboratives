<?php session_start(); 
$userEmail= $_SESSION['LOGGED_USER']['email'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de listes - Page d'ajout de liste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

        <?php require_once(__DIR__ . '/header.php'); ?>
        <h1>Ajouter une recette</h1>
        <form action="submit_liste.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" placeholder="Soupe aux choux" class="form-control" id="title" name="title" aria-describedby="title-help">
            </div>
            <div class="mb-3">
                <input type="hidden" class="form-control" id="email" name="email" aria-describedby="email-help" value="<?php echo $userEmail?>">
            </div>

            
            
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>

</body>
</html>
