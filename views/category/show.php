<?php

use App\Connection;
use App\Table\ArticleTable;
use App\Table\CategoryTable;

$id = (int)$params['id'];

$pdo = Connection::getPDO();
$category = (new CategoryTable($pdo))->find($id);

[$articles, $paginatedQuery] = (new ArticleTable($pdo))->findPaginatedForCategory($id);

$title = "Catégorie {$category->getLibelle()}";

$link = $router->url('category', ['id' => $category->getNo_categorie()]);

?>
<div class="pt-5">
    <h1 class="pt-5"><?= $title ?></h1>
    <div class="row">
        <?php foreach($articles as $article): ?>
        <div class="col-md-3">
            <?php require dirname(__DIR__) . '/article/_card.php'?>
        </div>
        <?php endforeach ?>
    </div>
    <div class="d-flex justify-content-between my-4">
        <?= $paginatedQuery->previousLink($link) ?>
        <?= $paginatedQuery->nextLink($link) ?>
    </div>
</div>