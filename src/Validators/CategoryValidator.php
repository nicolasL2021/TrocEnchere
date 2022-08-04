<?php

namespace App\Validators;

use App\Table\CategoryTable;

class CategoryValidator extends AbstractValidator{

    public function __construct(array $data, CategoryTable $table, ?int $id = null)
    {
        parent::__construct($data);
        $this->validator->rule('required', 'libelle');
        $this->validator->rule('lengthBetween', 'libelle', 3, 200);
        $this->validator->rule(function ($field, $value) use ($table, $id){
            return !$table->exists($field, $value, $id);
        }, 'nom_categorie', 'Cette valeur est déjà utilisée');
    }

}