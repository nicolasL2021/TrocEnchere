<?php

use App\Connection;
use App\Model\Article;
use App\Model\Categorie;
use App\Table\ArticleTable;
use App\Table\CategoryTable;
use App\Table\UserTable;

$title = 'troc-Enchère';
$pdo = Connection::getPDO();
$query = $pdo->query('SELECT * FROM categories ORDER BY no_categorie ASC;');
$categories = $query->fetchAll(PDO::FETCH_CLASS, Categorie::class);
$lastArticle = (new ArticleTable($pdo))->last();
$categorie = (new CategoryTable($pdo))->find($lastArticle->getNo_categorie());
$utilisateur = (new UserTable($pdo))->find($lastArticle->getNo_utilisateur());
// $dateDeb = $lastArticle->getDate_debut_encheres();
// $dateFin = $lastArticle->getDate_fin_encheres()->getTimestamp();
// dd($dateFin);
// dd($utilisateur);


?>
<div class="pt-5">
    <section class="py-5 mt-5">
        <div class="px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="../../img/imgDefault.jpg" alt="..." />
                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder"><?= $lastArticle->getNom_article() ?></h1>
                    <h5>Catégorie : <?= $categorie->getLibelle()?></h5>
                    <div class="fs-5 mb-5">
                        <span>Prix actuel : <?= $lastArticle->getPrix_vente()?> €</span>
                    </div>
                    <p class="lead"><?= $lastArticle->getDescription()?></p>
                    <p class="date_debut">Début des enchères :
                        <?= $lastArticle->getDate_debut_encheres()->format("d/m/Y") ?></p>
                    <p>Fin des enchères :
                        <span class="date_fin"><?= $lastArticle->getDate_fin_encheres()->format("d/m/Y") ?></span>
                    </p>
                    <p>Vendu par : <?= $utilisateur->getNom() ?> <?= $utilisateur->getPrenom() ?></p>
                    <div class="timer" id="timer"></div>
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
    <div class="col-md-3 py-2">
        <div class="card img-fluid">
            <img class="card-img-top" src="../img/imgCategory/<?= $category->getNo_categorie() ?>.jpg">
            <div class="card-img-overlay my-2">
                <h5 class="card-title text-center">
                    <a href="<?= $router->url('category', ['id' => $category->getNo_categorie()])?>"><i
                            class="<?= $category->getFontawesome()?>"></i><br><span
                            class="card-title"><?= htmlentities($category->getLibelle()) ?></span>
                        <span class="line -right"></span>
                        <span class="line -top"></span>
                        <span class="line -left"></span>
                        <span class="line -bottom"></span></a>
                </h5>
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>