<h1>Découvez un blog comme vous n'en avez jamais vu...</h1>

<img src="/assets/img/valloire.jpg" class="w-100 mb-2">

<p>Un site avec des produits incroyable pour animaux.</p>

<h3>Les 3 derniers articles :</h3>
<ul>
	<?php #Avec cette boucle on affiche 1 à 1 les articles sous la forme d'une liste où les éléments sont cliquables et renvoient vers les articles
	var_dump($lastThree);
	foreach($lastThree as $article) {?>
		<li><a href="index.php?route=article&action=read&id=<?= $article->getId();?>"><?= $article->getTitre(); ?></a></li>
	<?php
	}
	?>
</ul>

<hr>

<div class="row">
	<div class="col-4 text-center">
		<span style="font-size: 5rem;">&#128075;</span>
	</div>

	<div class="col-8">
		<p>Blabla.</p>
	</div>
</div>