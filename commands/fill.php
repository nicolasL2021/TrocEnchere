<?php

use App\Connection;
require './vendor/autoload.php';

// Faker pour remplir la BDD
$faker = Faker\Factory::create('fr_FR');

$pdo = Connection::getPDO();

$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE articles_vendus');
$pdo->exec('TRUNCATE TABLE categories');
$pdo->exec('TRUNCATE TABLE encheres');
$pdo->exec('TRUNCATE TABLE retraits');
$pdo->exec('TRUNCATE TABLE utilisateurs');
// $pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

for ($i=0; $i < 100 ; $i++) { 
    $pdo->exec("INSERT INTO articles_vendus SET
        no_article=$i,
        nom_article='{$faker->word()}', 
        description='{$faker->paragraphs(2, true)}',
        date_debut_encheres='{$faker->date()}',
        date_fin_encheres='{$faker->date()}',
        prix_initial='{$faker->randomNumber(4, false)}',
        prix_vente='',
        no_utilisateur='{$faker->randomDigit()}',
        no_categorie='{$faker->randomDigit()}'");
};

for ($i=0; $i < 10; $i++) {
    $pdo->exec("INSERT INTO categories SET libelle='{$faker->word()}'");
};

for ($i= 0; $i< 100; $i++) { 
    $pdo->exec("INSERT INTO retraits SET 
        no_article = $i, 
        rue='{$faker->streetAddress()}',
        code_postal = '{$faker->postcode()}',
        ville = '{$faker->city()}'");
};

for ($i=0; $i < 10; $i++) { 
    $pdo->exec("INSERT INTO utilisateurs SET
        no_utilisateur = $i,
        pseudo = '{$faker->word()}',
        nom = '{$faker->lastName()}',
        prenom = '{$faker->firstName()}',
        email = '{$faker->email()}',
        telephone = '{$faker->phoneNumber()}',
        rue='{$faker->streetAddress()}',
        code_postal = '{$faker->postcode()}',
        ville = '{$faker->city()}',
        mot_de_passe = '{$faker->password()}'");
};