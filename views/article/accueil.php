<?php

use App\Connection;
use App\Model\Article;
use App\Model\Categorie;
use App\Table\ArticleTable;
use App\Table\CategoryTable;
use App\Table\UserTable;

$title = 'troc-Enchère';
$pdo = Connection::getPDO();
$query = $pdo->query('SELECT * FROM categories ORDER BY libelle ASC;');
$categories = $query->fetchAll(PDO::FETCH_CLASS, Categorie::class);
$lastArticle = (new ArticleTable($pdo))->last();
$categorie = (new CategoryTable($pdo))->find($lastArticle->getNo_categorie());
$utilisateur = (new UserTable($pdo))->find($lastArticle->getNo_utilisateur());
// dd($utilisateur);


?>
<div class="pt-5">
    <section class="py-5 mt-5">
        <div class="px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="" alt="..." /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder"><?= $lastArticle->getNom_article() ?></h1>
                    <h5>Catégorie : <?= $categorie->getLibelle()?></h5>
                    <div class="fs-5 mb-5">
                        <span>Prix actuel : <?= $lastArticle->getPrix_vente()?> €</span>
                    </div>
                    <p class="lead"><?= $lastArticle->getDescription()?></p>
                    <p>Début des enchères : <?= $lastArticle->getDate_debut_encheres()->format("d/m/Y") ?></p>
                    <p>Fin des enchères : <?= $lastArticle->getDate_fin_encheres()->format("d/m/Y") ?></p>
                    <p>Vendu par : <?= $utilisateur->getNom() ?> <?= $utilisateur->getPrenom() ?></p>
                    <div class="d-flex">
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Enchérir
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="row py-5">
    <?php foreach ($categories as $category) :?>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="<?= $category->getFontawesome()?>"></i>
                    <a
                        href="<?= $router->url('category', ['id' => $category->getNo_categorie()])?>"><?= htmlentities($category->getLibelle()) ?></a>
                </h5>
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>