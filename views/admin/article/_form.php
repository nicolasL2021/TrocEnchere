<form action="" method="POST">
    <?= $form->input('nom_article', 'Titre', 'text');?>
    <?= $form->select('no_categorie', 'Catégorie', $categories);?>
    <?= $form->textarea('description', 'Description');?>
    <?= $form->input('date_debut_encheres', 'Date début enchères', 'text');?>
    <?= $form->input('date_fin_encheres', 'Date fin enchères', 'text');?>
    <?= $form->input('prix_initial', 'Prix initial', 'number');?>
    <?= $form->input('prix_vente', 'Prix actuel', 'number');?>
    <?= $form->input('created_at', 'Créé le', 'text');?>
    <button class="my-5 btn btn-primary">
        <?php if($article->getNo_article() !== null): ?>
        Modifier
        <?php else: ?>
        Créer
        <?php endif ?>
    </button>
</form>