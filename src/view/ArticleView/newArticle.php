

<h1>Ajouter un article</h1>

<form method="POST" action="index.php?route=article&action=create">
<!-- <form method="POST" action="index.php?route=users&action=create"> -->

	<div class="mb-3">
		<label for="titre" class="form-label">Titre</label>
		<input type="text" name="titre" class="form-control" placeholder="titre">
	</div>

	<div class="mb-3">
		<label for="description" class="form-label">Description</label>
		<input type="text" name="description" class="form-control" placeholder="description">
	</div>

	<div class="mb-3">
		<label for="marque" class="form-label">Marque</label>
		<input type="text" name="marque" class="form-control" placeholder="marque">
	</div>

	<div class="mb-3">
		<label for="prix" class="form-label">Prix</label>
		<input type="number" name="prix" class="form-control" placeholder="prix">
	</div>

	<button type="submit" class="btn btn-danger">Ajouter</button>

</form>
