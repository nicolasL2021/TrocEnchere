<?php

namespace App\Validators;

use App\Table\ArticleTable;

class ArticleValidator extends AbstractValidator{

    public function __construct(array $data, ArticleTable $table, ?int $articleID = null, array $category)
    {
        parent::__construct($data);
        $this->validator->rule('required', 'nom_article');
        $this->validator->rule('lengthBetween', 'nom_article', 3, 200);
        $this->validator->rule('required', 'no_categorie', $category);
        $this->validator->rule(function ($field, $value) use ($table, $articleID){
            return !$table->exists($field, $value, $articleID);
        }, 'nom_article', 'Cette valeur est déjà utilisée');
    }

}