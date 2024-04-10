<!-- inclusion des variables et fonctions -->
<?php session_start();
require_once(__DIR__."/functions.php");
require_once(__DIR__."/variables.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de listes de courses - Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <!-- inclusion de l'entête du site -->
        <?php require_once(__DIR__ . '/header.php'); ?>
        <h1>S'enregistrer</h1>
        
        <?php if(isset($_SESSION['LOGGED_USER'])):?>
        <p>Vous êtes déjà connecté, pas besoin de s'enregistrer !</p>
        <?php else:?>
        <form action="submit_register.php" method="POST">
            <!-- si message d'erreur on l'affiche -->
            <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['LOGIN_ERROR_MESSAGE'];
                unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
            </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="surname" class="form-label">Prénom</label>
                <input type="surname" class="form-control" id="surname" name="surname" aria-describedby="surname-help"
                    placeholder="Arthur">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="name" class="form-control" id="name" name="name" aria-describedby="name-help"
                    placeholder="Le Gall">
            </div>
            

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help"
                    placeholder="you@exemple.com">
                <div id="email-help" class="form-text">L'email utilisé pour créer votre compte.</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>

        </form>
        <?php endif; ?>



        <!-- Formulaire de connexion -->

    </div>

    <!-- inclusion du bas de page du site -->
</body>

</html>