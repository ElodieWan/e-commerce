<h1>Inscrivez-vous</h1>

<form method="POST" action="index.php?route=users&action=create">
	
	<div class="mb-3">
		<label for="username" class="form-label">Username</label>
		<input type="text" name="username" class="form-control" placeholder="username">
	</div>

    <div class="mb-3">
		<label for="email" class="form-label">Email</label>
		<input type="email" name="email" placeholder="email" class="form-control">
	</div>

	<div class="mb-3">
		<label for="password" class="form-label">Mot de passe</label>
		<input type="password" name="password" class="form-control">
	</div>
	

	<button type="submit" class="btn btn-danger">S'inscrire</button>

	<span class="text-muted">Déjà inscrit ? <a class="link-secondary" href="index.php?route=users&action=connexion">Connectez-vous</a></span>

</form>