<?php

use App\Auth;
use App\Connection;
use App\Table\CategoryTable;

Auth::check();

$title = "Administration - Gestion des catégories";

$pdo = Connection::getPDO();
$link = $router->url('admin_categories');
$items = (new CategoryTable($pdo))->all();

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
            <th>Fontawesome</th>
            <th>
                <a href="<?= $router->url("admin_category_new") ?>" class="btn btn-success">Nouveau</a>
            </th>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td>#<?= $item->getNo_categorie()?></td>
                <td><a
                        href="<?=$router->url('admin_category', ['id' => $item->getNo_categorie()])?>"><?= htmlentities($item->getLibelle()) ?></a>
                </td>
                <td><?= $item->getFontawesome() ?></a>
                </td>
                <td><a href="<?=$router->url('admin_category', ['id' => $item->getNo_categorie()])?>"
                        class="btn btn-primary">Editer</a>
                    <form action="<?=$router->url('admin_category_delete', ['id' => $item->getNo_categorie()])?>"
                        method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer cet category ?')"
                        style="display:inline">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>