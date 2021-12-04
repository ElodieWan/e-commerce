<h1>Découvez des produits animaux comme vous n'en avez jamais vu...</h1>

<img src="/assets/img/valloire.jpg" class="w-100 mb-2">

<p>Un site avec des produits incroyable pour animaux.</p>

<h3>Les 3 derniers articles :</h3>
<div class='row justify-content-evenly mt-4'>
	<?php foreach ($lastThree as $article) : ?>
		<div class="card col-3">
			<img class="card-img-top" src=<?= $article->getImage(); ?> alt="Card image">
			<div class="card-body">
				<h5 class="card-title"><?= $article->getTitre(); ?></h5>
				<p class="card-text"><?= $article->getDescription(); ?>.</p>
				<a href="index.php?route=article&action=read&id=<?= $article->getId(); ?>">Voir l'article</a>
			</div>
		</div>
	<?php endforeach; ?>
	<div class="col text-center">
		<button class="btn btn-default" href="index.php?action=article">Voir plus d'articles</button>
	</div>
</div>