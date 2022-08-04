<?php

use App\Auth;
use App\HTML\Form;
use App\Connection;
use App\ObjectHelper;
use App\Table\ArticleTable;
use App\Table\CategoryTable;
use App\Validators\ArticleValidator;

Auth::check();

$pdo = Connection::getPDO();
$articleTable = new ArticleTable($pdo);
$categoryTable = new CategoryTable($pdo);
$categories = $categoryTable->list();
$article = $articleTable->find($params['id']);
$success = false;
$errors = [];

if(!empty($_POST)){
    $v = new ArticleValidator($_POST, $articleTable, $article->getNo_article(), $categories);
    ObjectHelper::hydrate($article, $_POST, ['nom_article', 'description', 'date_debut_encheres', 'date_fin_encheres', 'prix_initial', 'prix_vente', 'no_categorie']);
    // dd($_POST);
    if($v->validate()) {
        $articleTable->updateArticle($article);
        $success = true;
    } else {
        $errors = $v->errors();
    }
}

$form = new Form($article, $errors);

if ($success):
?>
<div class="alert alert-success">
    L'article a bien été modifié
</div>
<?php endif; 

if (isset($_GET['created'])):
    ?>
<div class="alert alert-success">
    L'article a bien été créé
</div>
<?php endif;

if(!empty($errors)): ?>
<div class="alert alert-danger">
    L'article n'a pas pu être modifié, merci de corriger vos erreurs
</div>
<?php endif ?>

<div class="mt-5 pt-5">
    <h1>Editer l'article <?= $params['id']?></h1>
    <?php require('_form.php')?>
</div>