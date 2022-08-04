<?php

use App\Connection;
use App\HTML\Form;
use App\Model\User;
use App\Table\Exception\NotFoundException;
use App\Table\UserTable;

$user = new User();
$errors = [];
if(!empty($_POST)){
    $user->setPseudo($_POST['pseudo']);
    $errors['password'] = 'Identifiant ou mot de passe incorrect';

    if(empty($_POST['pseudo']) && empty($_POST['password'])){
    }
    $pdo = Connection::getPDO();
    $table = new UserTable($pdo);
    try {
        $u = $table->findByPseudo($_POST['pseudo']);
        if($_POST['password'] == $u->getPassword()){
            session_start();
            $_SESSION['auth'] = $u->getId();
            header('Location: ' . $router->url('admin_articles'));
            exit();
        }
        // METTRE HACHAGE SUR MOT DE PASSE POUR REMETTRE CE CODE
        // if(password_verify($_POST['password'], $user->getPassword() === true)){
        //     header('Location: ' . $router->url('admin_articles'));
        //     exit();
        // }
    } catch (NotFoundException $e) {
       
    }
}
$form = new Form($user, $errors);
?>
<div class="pt-5">
    <h1 class="pt-5">Se connecter</h1>
    <?php if(isset($_GET['forbidden'])): ?>
        <div class="alert alert-danger">
            Vous ne pouvez pas accéder à cette page !
        </div>
    <?php endif ?>
    <form action="<?= $router->url('login') ?>" method="POST">
        <?= $form->input('pseudo', 'Nom d\'utilisateur', 'text')?>
        <?= $form->input('password', 'Mot de passe', 'password')?>
        <button type="submit" class="my-5 btn btn-primary">Se connecter</button>
    </form>
</div>