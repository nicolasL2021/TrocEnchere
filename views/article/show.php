<?php

use App\Connection;
use App\Table\ArticleTable;
use App\Table\CategoryTable;

$id = $params['id'];

$pdo = Connection::getPDO();

$article = (new ArticleTable($pdo))->find($id);
$category = (new CategoryTable($pdo))->find($article->getNo_categorie());

?>
<div class="py-5">
    <h1 class="card-title pt-5"><?= htmlentities($article->getNom_article()) ?></h1>
    <h5 class="text-decoration-underline"><?= htmlentities($category->getLibelle()) ?></h5>
    <p><?= $article->getFormattedDescription() ?></p>
    <p><?= date_format($article->getDate_debut_encheres(), "d F Y") ?></p>
    <p><?= htmlentities($article->getPrix_initial()) ?>€</p>
</div>