<form action="" method="POST">
    <?= $form->input('libelle', 'Libelle', 'text');?>
    <?= $form->input('fontawesome', 'Fontawesome', 'text');?>
    <button class="my-5 btn btn-primary">
        <?php if($item->getNo_categorie() !== null): ?>
        Modifier
        <?php else: ?>
        Créer
        <?php endif ?>
    </button>
</form>