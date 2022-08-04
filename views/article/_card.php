<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><?= htmlentities($article->getNom_article()) ?></h5>
        <p><?= $article->getExcerpt() ?></p>
        <p><?= date_format($article->getDate_debut_encheres(), "d F Y") ?></p>
        <p><?= htmlentities($article->getPrix_initial()) ?> €</p>
        <p>
            <a href="<?= $router->url('article', ['id' => $article->getNo_article()]) ?>" class="btn btn-primary">Voir
                plus</a>
        </p>
    </div>
</div>