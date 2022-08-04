<?php

use App\Auth;
use App\HTML\Form;
use App\Connection;
use App\ObjectHelper;
use App\Table\CategoryTable;
use App\Validators\CategoryValidator;

Auth::check();

$pdo = Connection::getPDO();
$table = new CategoryTable($pdo);
$item = $table->find($params['id']);
$success = false;
$errors = [];
$fields = ['libelle', 'fontawesome'];

if(!empty($_POST)){
    $v = new CategoryValidator($_POST, $table, $item->getNo_categorie());
    ObjectHelper::hydrate($item, $_POST, $fields);
    
    if($v->validate()) {
        $table->update([
            'no_categorie' => $item->getNo_categorie(),
            'libelle' => $item->getLibelle(),
            'fontawesome' => $item->getFontawesome()
        ], $item->getNo_categorie());
        $success = true;
    } else {
        $errors = $v->errors();
    }
}

$form = new Form($item, $errors);

if ($success):
?>
<div class="alert alert-success">
    La catégorie a bien été modifié
</div>
<?php endif; 

if (isset($_GET['created'])):
    ?>
<div class="alert alert-success">
    La catégorie a bien été créé
</div>
<?php endif;

if(!empty($errors)): ?>
<div class="alert alert-danger">
    La catégorie n'a pas pu être modifié, merci de corriger vos erreurs
</div>
<?php endif ?>

<div class="mt-5 pt-5">
    <h1>Editer la catégorie <?= $params['id']?></h1>
    <?php require('_form.php')?>
</div>