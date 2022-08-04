<?php

namespace App\Table;

use PDO;
use App\Model\Article;
use App\PaginatedQuery;
use App\Table\Exception\NotFoundException;

class ArticleTable extends Table {

    protected $nameId = "no_article";
    protected $table = "articles_vendus";
    protected $class = Article::class;

    public function updateArticle(Article $article): void
    {
        $this->update([
            'no_article' => $article->getNo_article(),
            'nom_article' => $article->getNom_article(),
            'description' => $article->getDescription(),
            'date_debut_encheres' => $article->getDate_debut_encheres()->format('Y-m-d'),
            'date_fin_encheres' => $article->getDate_fin_encheres()->format('Y-m-d'),
            'prix_initial' => $article->getPrix_initial(),
            'prix_vente' => $article->getPrix_vente(),
            'no_categorie' => $article->getNo_categorie()

        ], $article->getNo_article());
    }
    public function createArticle(Article $article): void
    {
        $id = $this->create([           
            'nom_article' => $article->getNom_article(),
            'description' => $article->getDescription(),
            'date_debut_encheres' => $article->getDate_debut_encheres()->format('Y-m-d'),
            'date_fin_encheres' => $article->getDate_fin_encheres()->format('Y-m-d'),
            'prix_initial' => $article->getPrix_initial(),
            'prix_vente' => $article->getPrix_vente(),
            'no_categorie' => $article->getNo_categorie(),
            'created_at' => $article->getCreated_at()->format('Y-m-d H:i:s'),

        ]);
        $article->setNo_article($id);
       
    }

    public function findPaginated()
    {
        $paginatedQuery = new PaginatedQuery(
            "SELECT * FROM {$this->table} ORDER BY date_debut_encheres DESC",
            "SELECT count({$this->nameId}) FROM {$this->table}",
            $this->pdo
        );
        $articles = $paginatedQuery->getItems(Article::class);
        return [$articles, $paginatedQuery];

    }

    public function findPaginatedForCategory(int $categoryId)
    {
        $paginatedQuery = new PaginatedQuery(
            "SELECT * FROM {$this->table} WHERE no_categorie = {$categoryId} ORDER BY date_debut_encheres DESC",
            "SELECT count({$this->nameId}) FROM {$this->table} WHERE no_categorie = {$categoryId}"
        );
        
        $articles = $paginatedQuery->getItems(Article::class);
        return [$articles, $paginatedQuery];
    }
    
    public function last()
    {
        $sql = "SELECT MAX({$this->nameId}) FROM {$this->table}";
        $query = $this->pdo->query($sql);
        $lastId = $query->fetch(PDO::FETCH_NUM);
        return (new ArticleTable($this->pdo))->find($lastId[0]); 
            
    }

    
}