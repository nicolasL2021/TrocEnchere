<?php

use App\Connection;
use App\Table\ArticleTable;
use App\Table\CategoryTable;


$pdo = Connection::getPDO();


// [$articles, $paginatedQuery] = (new ArticleTable($pdo))->findPaginatedForCategory($id);

$title = "Liste des catégories";

// $link = $router->url('category', ['id' => $category->getNo_categorie()]);

?>
<div class="pt-5">
    <h1 class="pt-5"><?= $title ?></h1>   
</div>