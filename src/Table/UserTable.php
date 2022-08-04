<?php

namespace App\Table;

use PDO;
use App\Model\User;
use App\Table\Exception\NotFoundException;

class UserTable extends Table {

    protected $nameId = "no_utilisateur";
    protected $table = "utilisateurs";
    protected $class = User::class;

    public function findByPseudo(string $pseudo){
        $query = $this->pdo->prepare('SELECT * FROM '.$this->table.' WHERE pseudo = :pseudo;');
        $query->execute(['pseudo' => $pseudo]);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();
        if ($result === false) {
           throw new NotFoundException($this->table, $pseudo);
        }
        return $result;
    }
}