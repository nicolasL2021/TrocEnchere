<?php


use App\Connection;
use App\Table\ArticleTable;

$pdo = Connection::getPDO();
$title = 'Articles';

[$articles, $pagination] = (new ArticleTable($pdo))->findPaginated();

$link = $router->url('articles');

?>
<div class="pt-5">
    <h1 class="py-5"><?= $title ?></h1>
</div>

<div class="row">
    <?php foreach($articles as $article): ?>
    <div class="col-md-3">
        <?php require '_card.php'?>
    </div>
    <?php endforeach ?>
</div>
<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link) ?>
    <?= $pagination->nextLink($link) ?>

</div>