<?php

use App\Auth;
use App\HTML\Form;
use App\Connection;
use App\ObjectHelper;
use App\Model\Categorie;
use App\Table\CategoryTable;
use App\Validators\CategoryValidator;

Auth::check();

$errors = [];
$item = new Categorie();

if(!empty($_POST)){
    $pdo = Connection::getPDO();
    $table = new CategoryTable($pdo);
    $v = new CategoryValidator($_POST, $table);
    ObjectHelper::hydrate($item, $_POST, ['libelle', 'fontawesome']);
    
    if($v->validate()) {
        $table->create([
            'no_categorie' => $item->getNo_categorie(),
            'libelle' => $item->getLibelle(),
            'fontawesome' => $item->getFontawesome()
        ]);
        header('Location: ' . $router->url('admin_categories') . '?created=1');
        exit();
    } else {
        $errors = $v->errors();
    }
}

$form = new Form($item, $errors);

if(!empty($errors)): ?>
<div class="alert alert-danger">
    La catégorie n'a pas pu être enregistré, merci de corriger vos erreurs
</div>
<?php endif ?>

<div class="mt-5 pt-5">
    <h1>Créer un catégorie</h1>
    <?php require('_form.php')?>
</div>