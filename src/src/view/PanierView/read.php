<h1 class="text-align-center">Panier de <?= $username?></h1>
<ul class="list-articles">
<?php foreach($articles as $article) : ?>
    <li class="article">
        <p><?= $article->getTitre()?></p>
        <p>Prix : <?= $article->getPrix()?>€</p> 
        <button class="btn"><a class="linkToArticles" href="index.php?route=shopping&action=delete&id=<?= $article->getId()?>">Supprimer du panier</a></button>
    </li>
<?php endforeach; ?>
</ul>

<div class="float-right"> Prix total du panier : <?= $prix ?> €</div>

