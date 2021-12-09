<?php if (!isset($_SESSION)) { session_start(); }?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PetShop</title>

    <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-danger mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Magasin pour animaux</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?route=article">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?route=article&action=create">Nouvel article</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <?php if (!isset($_SESSION['connecter'])) : ?>
                        <a class="connexion text-decoration-none link-light mr-4" href="index.php?route=users&action=connexion">Se connecter</a>
                    <?php else : ?>
                        <a class="text-decoration-none link-light mr-4" href="index.php?route=shopping&action=read"><img class="resize" src="/assets/img/cart.png" alt="panier"></a>
                        <a class="deconnexion text-decoration-none link-light mr-4" href="index.php?route=users&action=deconnexion">Se deconnecter</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php if (isset($message)) : ?>
            <p><?= $message ?></p>
        <?php endif ?>
        <?= $content ?>
    </div>
    <hr>
    <footer>
        Copyright
        2021
    </footer>

</body>

</html>
