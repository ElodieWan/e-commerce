<h1>Connectez-vous</h1>

<form method="POST" action="index.php?route=users&action=login">
	
	<div class="mb-3">
		<label for="username" class="form-label">Username</label>
		<input type="text" name="username" class="form-control" placeholder="username">
	</div>

	<div class="mb-3">
		<label for="password" class="form-label">Mot de passe</label>
		<input type="password" name="password" class="form-control">
	</div>

	<button type="submit" class="btn btn-danger">Se connecter</button>

	<span class="text-muted">Pas encore de compte ? <a class="link-secondary" href="index.php?route=users&action=inscription">Inscrivez-vous</a></span>

</form>