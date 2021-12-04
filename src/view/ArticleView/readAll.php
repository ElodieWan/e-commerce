<h1>Articles</h1>

<?php for($i=0; $i<$rowCount; $i+=3) : ?>
    <div class='row justify-content-evenly mt-4'>
        <?php for($j=$i; ($j<$i+3) && $j<$articlesNumber; $j++) : ?>
            <div class="card col-3">
                <img class="card-img-top" src=<?= $articles[$j]->getImage(); ?> alt="Card image">
                <div class="card-body">
                    <h5 class="card-title"><?= $articles[$j]->getTitre(); ?></h5>
                    <p class="card-text"><?= $articles[$j]->getDescription(); ?>.</p>
                    <a href="index.php?route=article&action=read&id=<?= $articles[$j]->getId(); ?>">Voir l'article</a>
                </div>
            </div>
        <?php endfor; ?>
    </div>
<?php endfor; ?>