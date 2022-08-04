<?php

use App\Auth;
use App\Connection;
use App\Table\ArticleTable;

Auth::check();

$title = "Administration";

$pdo = Connection::getPDO();
$link = $router->url('admin_articles');
[$articles, $pagination] = (new ArticleTable($pdo))->findPaginated();

if(isset($_GET['delete'])):
?>
<div class="alert alert-success">
    L'enregistrement a bien été supprimé
</div>
<?php endif ?>
<div class="mt-5 pt-5">
    <table class="table table-striped">
        <thead>
            <th>#</th>
            <th>Titre</th>
            <th>
                <a href="<?= $router->url("admin_article_new") ?>" class="btn btn-success">Nouveau</a>
            </th>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
            <tr>
                <td>#<?= $article->getNo_article()?></td>
                <td><a
                        href="<?=$router->url('admin_article', ['id' => $article->getNo_article()])?>"><?= htmlentities($article->getNom_article()) ?></a>
                </td>
                <td><a href="<?=$router->url('admin_article', ['id' => $article->getNo_article()])?>"
                        class="btn btn-primary">Editer</a>
                    <form action="<?=$router->url('admin_article_delete', ['id' => $article->getNo_article()])?>"
                        method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer cet article ?')"
                        style="display:inline">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-between my-4">
        <?= $pagination->previousLink($link) ?>
        <?= $pagination->nextLink($link) ?>
    </div>
</div>