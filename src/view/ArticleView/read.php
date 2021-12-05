
<h1><?= $article->getTitre(); ?></h1>

<p><?= nl2br($article->getDescription());?></p>

<img src=<?= $article->getImage();?> alt="Card image">

<ul>
	<li>Marque : <?= $article->getMarque(); ?></li>
	<li>Description : <?= $article->getDescription()?></li>
	<li>Prix : <?= $article->getPrix()?>€</li>
</ul>

<button class="d-flex align-center">Ajouter au panier</button>

<?php #Ce qui est entre le if ne sera ajouté que lorsque l'utilisateur sera connecté ;) ?>
<?php if (isset($_SESSION['utilisateur_connecte'])): ?>
	<a class="btn btn-danger" href="router.php?route=article&action=modif?id=<?php echo $article->getId(); ?>"><i class="bi bi-pen"></i>
 Modifier l'article</a>
<?php endif ?>

