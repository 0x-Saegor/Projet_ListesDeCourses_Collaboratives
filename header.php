<?php
$uri = $_SERVER['REQUEST_URI'];

$arr = explode('/', $uri);
$string = implode('/',array_slice($arr, 3, 4));
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Site de listes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($string == 'index.php') ? 'active' : ''; ?>" aria-current="page" href="index.php">Home</a>
                </li>
                <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($string == 'nouvelle_liste.php') ? 'active' : ''; ?>" aria-current="page" href="nouvelle_liste.php">Ajouter une liste</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($string == 'shared.php') ? 'active' : ''; ?>" aria-current="page" href="shared.php">Mes partages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($string == 'logout.php') ? 'active' : ''; ?>" aria-current="page" href="logout.php">Déconnexion</a>
                    </li>

                <?php else:?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($string == 'register.php') ? 'active' : ''; ?>"aria-current="page" href="register.php">S'enregistrer</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
