<?php

namespace App\Model;

class Categorie{

    private $no_categorie;
    private $libelle;
    private $fontawesome;

    /**
     * Get the value of no_categorie
     */ 
    public function getNo_categorie(): ?int
    {
        return $this->no_categorie;
    }
    
    /**
     * setNo_categorie
     *
     * @param  mixed $id
     * @return self
     */
    public function setNo_categorie(int $id): self
    {
        $this->no_categorie = $id;

        return $this;
    }

    /**
     * Get the value of libelle
     */ 
    public function getLibelle(): ?string
    {
        return htmlentities(ucfirst($this->libelle));
    }
    
    /**
     * setLibelle
     *
     * @param  mixed $libelle
     * @return self
     */
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;
        
        return $this;
    }

    /**
     * Get the value of fontAwesome
     */ 
    public function getFontawesome()
    {
        return $this->fontawesome;
    }
    
    /**
     * setFontawesome
     *
     * @param  mixed $fontawesome
     * @return self
     */
    public function setFontawesome(string $fontawesome):self
    {
        $this->fontawesome = $fontawesome;

        return $this;
    }
}