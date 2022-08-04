<?php

namespace App\Table;

use App\Model\Categorie;
use App\Table\Exception\NotFoundException;
use PDO;

class CategoryTable extends Table {

    protected $nameId = 'no_categorie';
    protected $table = 'categories';
    protected $class = Categorie::class;


    public function hydrateArticles (array $article) : void
    {
        
    }

    public function all (): array
    {
        return $this->queryAndFetchAll("SELECT * FROM {$this->table}");
    }
    public function list(): array
    {
        $categories = $this->queryAndFetchAll("SELECT * FROM {$this->table} ORDER BY libelle ASC");
        $results = [];
        foreach($categories as $category){
            $results[$category->getNo_categorie()] = $category->getLibelle();
        }
        return $results;
    }
}