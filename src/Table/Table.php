<?php

namespace App\Table;

use PDO;
use App\Table\Exception\NotFoundException;
use Exception;

abstract class Table {

    protected $pdo;
    protected $nameId = null;
    protected $table = null;
    protected $class = null;

    public function __construct(PDO $pdo)
    {
        if($this->nameId === null)
        {
            throw new Exception("La class " . get_class($this) ." n'a pas de propriété id");
        }
        if($this->table === null)
        {
            throw new Exception("La class " . get_class($this) ." n'a pas de propriété table");
        }
        if($this->class === null)
        {
            throw new Exception("La class " . get_class($this) ." n'a pas de propriété class");
        }
        $this->pdo = $pdo;
    }

    public function find(int $id)
    {
        $query = $this->pdo->prepare('SELECT * FROM '.$this->table.' WHERE '.$this->nameId.' = :id;');
        $query->execute(['id' => $id]);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();
        if ($result === false) {
           throw new NotFoundException($this->table, $id);
        }
        return $result;
    }

    /**
     * Vérifie si une valeur existe dans la table
     *
     * @param string $field Champ à vérifier
     * @param [type] $value Valeur associé au champ
     * @return boolean
     */
    public function exists (string $field, $value, ?int $except = null): bool
    {
        $sql = "SELECT COUNT({$this->nameId}) FROM {$this->table} WHERE $field = ?";
        $params = [$value];
        if($except !== null){
            $sql .= " AND {$this->nameId} != ?";
            $params[] = $except;
        }
        $query = $this->pdo->prepare($sql);
        $query->execute($params);
        return (int)$query->fetch(PDO::FETCH_NUM)[0] >0;
    }

    public function queryAndFetchAll($sql)
    {
        return $this->pdo->query($sql, PDO::FETCH_CLASS, $this->class)->fetchAll();
    }

    public function prepAndFetch($sql, $params)
    {

    }

    public function delete(int $id)
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE {$this->nameId} = ?");
        $ok = $query->execute([$id]);
        if ($ok === false){
            throw new \Exception("impossible de supprimer l'engeristrement $id dans la table {$this->table}");
        }
    }

    public function create(array $data): int
    {
        $sqlFields = [];
        foreach ($data as $key => $value) {
            $sqlFields[] = "$key = :$key";
        }
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET " . implode(', ', $sqlFields));
        $ok = $query->execute($data);
        if ($ok === false){
            throw new \Exception("Impossible de créer l'engeristrement $this->nameId dans la table {$this->table}");
        }
        
        return (int)$this->pdo->lastInsertId();
    }

    public function update(array $data, int $id)
    {
        $sqlFields = [];
        foreach ($data as $key => $value) {
            $sqlFields[] = "$key = :$key";
        }
        
        $query = $this->pdo->prepare("UPDATE {$this->table} SET " . implode(', ', $sqlFields) . " WHERE {$this->nameId} = :{$this->nameId}");
        // dd($query);
        $ok = $query->execute(array_merge($data, [$this->nameId => $id]));
        $ok = $query->execute($data);
        if ($ok === false){
            throw new \Exception("Impossible de modifier l'engeristrement $this->nameId dans la table {$this->table}");
        }
    }
}