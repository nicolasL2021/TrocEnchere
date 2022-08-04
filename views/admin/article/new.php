<?php

use App\Auth;
use App\HTML\Form;
use App\Connection;
use App\ObjectHelper;
use App\Model\Article;
use App\Table\ArticleTable;
use App\Table\CategoryTable;
use App\Validators\ArticleValidator;

Auth::check();

$pdo = Connection::getPDO();
$errors = [];
$article = new Article();
$categoryTable = new CategoryTable($pdo);
$categories = $categoryTable->list();
$article->setCreated_at(date('Y-m-d H:i:s'));

if(!empty($_POST)){
    $articleTable = new ArticleTable($pdo);
    $v = new ArticleValidator($_POST, $articleTable, $article->getNo_article(), $categories);
    ObjectHelper::hydrate($article, $_POST, ['nom_article', 'description', 'date_debut_encheres', 'date_fin_encheres', 'prix_initial', 'prix_vente', 'no_categorie']);
    if($v->validate()) {
        $articleTable->createArticle($article);
        header('Location: ' . $router->url('admin_articles') . '?created=1');
        exit();
    } else {
        $errors = $v->errors();
    }
}

$form = new Form($article, $errors);

if(!empty($errors)): ?>
<div class="alert alert-danger">
    L'article n'a pas pu être enregistré, merci de corriger vos erreurs
</div>
<?php endif ?>

<div class="mt-5 pt-5">
    <h1>Créer un article</h1>
    <?php require('_form.php')?>
</div>