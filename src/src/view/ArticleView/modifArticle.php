

<h1>Modifier l'article</h1>

<form action="index.php?route=newArt&action=modif" method="post" >


  <div class="mb-3">
    <label for="titre" class="form-label">Titre de l'article</label><br/>
    <input type="text" name="titre" class="form-control" value="<?= $article->getTitre(); ?>" tabindex="20"/><br/>
  </div>


  <div class="mb-3">
    <label for="description" class="form-label">Description de l'Article</label><br/>
    <input type="text" name="description" class="form-control" tabindex="20" value="<?= $article->getDescription(); ?>"/><br/>
  </div>

  <div class="mb-3">
    <label for="prix" class="form-label">Prix</label><br/>
    <input type="number" name="prix" class="form-control" value="<?= $article->getPrix(); ?>" tabindex="20"/><br/>
  </div>

  <div class="mb-3">
    <label for="marque" class="form-label">Marque</label><br/>
    <input type="text" name="marque" class="form-control" value="<?= $article->getMarque();?>" tabindex="20"/><br/>
  </div>


    <button type="submit" class="btn btn-danger">Valider Modification</button>
