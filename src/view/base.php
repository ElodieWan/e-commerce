<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php if (isset($titrePage)) {
                echo $titrePage . " -";
            } else {
                echo "";
            } ?>Mon blog</title>

    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-danger mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mon super blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../../articles.php">Articles</a>
                    </li>
                    <?php if (!isset($_SESSION['utilisateur_connecte'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="router.php?route=article&action=create">Nouvel article</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="d-flex">
                    <?php if (!isset($_SESSION['utilisateur_connecte'])) : ?>
                        <a class="text-decoration-none link-light" href="../connexion.php">Se connecter</a>
                    <?php else : ?>
                        <span class="text-light">Bonjour <?php echo $_SESSION['prenom_utilisateur']; ?> (<a class="text-decoration-none link-light" href="deconnexion.php">Déconnexion</a>)</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">

        <?= $content ?>

    </div>
    <footer>
        Copyright
        2021
    </footer>

</body>

</html>