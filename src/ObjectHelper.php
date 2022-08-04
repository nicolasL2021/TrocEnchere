<?php

namespace App;

class ObjectHelper{

    public static function hydrate($object, array $data, array $fields): void
    {
        foreach($fields as $field){
            $method = 'set' . ucfirst($field);
            $object->$method($data[$field]);
        }
        // $article
        //             ->setNom_article($_POST['nom_article'])
        //             ->setDescription($_POST['description'])
        //             ->setDate_debut_encheres($_POST['date_debut_encheres'])
        //             ->setDate_fin_encheres($_POST['date_fin_encheres'])
        //             ->setPrix_initial($_POST['prix_initial'])
        //             ->setPrix_vente((int)$_POST['prix_vente'])
        //             // ->setCreated_at($_POST['created_at'])
        //             ;
    }
}