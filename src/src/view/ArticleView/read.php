<h1><?= $article->getTitre(); ?></h1>

<p><?= nl2br($article->getDescription()); ?></p>

<img src=<?= $article->getImage(); ?> alt="Card image">

<ul>
	<li>Marque : <?= $article->getMarque(); ?></li>
	<li>Description : <?= $article->getDescription() ?></li>
	<li>Prix : <?= $article->getPrix() ?>€</li>
</ul>
<button class="d-flex align-center"><a class="linkToArticles" href=<?=$href?>>Ajouter au panier</a></button>
<button class="btn"><a class="linkToArticles" href="index.php?route=newArticle&action=delete&id=<?= $article->getId()?>">Supprimer l'article</a></button>
<button class="btn"><a class="linkToArticles" href="index.php?route=newArticle&action=modifArt&id=<?= $article->getId()?>">Modifier l'article</a></button>
