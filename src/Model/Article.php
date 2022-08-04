<?php

namespace App\Model;

use DateTime;
use App\Helpers\Text;

class Article{

    private $no_article;
    private $nom_article;
    private $description;
    private $date_debut_encheres;
    private $date_fin_encheres;
    private $prix_initial;
    private $prix_vente;
    private $no_utilisateur;
    private $no_categorie;
    private $created_at;


    /**
     * Get the value of no_article
     */ 
    public function getNo_article(): ?int
    {
        return $this->no_article;
    }

    /**
     * Set the value of no_article
     *
     * @return  self
     */ 
    public function setNo_article(int $no_article): self
    {
        $this->no_article = $no_article;

        return $this;
    }
    
    /**
     * Get the value of nom_article
     */ 
    public function getNom_article()
    {
        return ucfirst($this->nom_article);
    }
    
    /**
     * Set the value of nom_article
     *
     * @return  self
     */ 
    public function setNom_article(string $nom_article): self
    {
        $this->nom_article = $nom_article;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getFormattedDescription():  ?string
    {
        return nl2br(htmlentities($this->description));
    }
    
    /**
     * Get the value of description
     */ 
    public function getExcerpt(): ?string
    {
        if ($this->description === null) {
            return null;
        }
        return nl2br(htmlentities(Text::excerpt($this->description, 60)));
    }

        /**
     * Get the value of description
     */ 
    public function getDescription(): ?string
    {
        return $this->description;
    }
    
    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    
    /**
     * Get the value of date_debut_encheres
     */ 
    public function getDate_debut_encheres(): DateTime
    {
        return new DateTime($this->date_debut_encheres);
    }

        /**
     * Set the value of date_debut_encheres
     *
     * @return  self
     */ 
    public function setDate_debut_encheres(string $date_debut_encheres): self
    {
        $this->date_debut_encheres = $date_debut_encheres;

        return $this;
    }

     /**
     * Get the value of date_fin_encheres
     */ 
    public function getDate_fin_encheres()
    {
        return new DateTime($this->date_fin_encheres);
    }

    /**
     * Set the value of date_fin_encheres
     *
     * @return  self
     */ 
    public function setDate_fin_encheres(string $date_fin_encheres): self
    {
        $this->date_fin_encheres = $date_fin_encheres;

        return $this;
    }
    
    /**
     * Get the value of prix_initial
     */ 
    public function getPrix_initial(): ?int
    {
        return $this->prix_initial;
    }

     /**
     * Set the value of prix_initial
     *
     * @return  self
     */ 
    public function setPrix_initial($prix_initial): self
    {
        $this->prix_initial = $prix_initial;

        return $this;
    }
   
    /**
     * Get the value of prix_vente
     */ 
    public function getPrix_vente(): ?int
    {
        return $this->prix_vente;
    }
    
    /**
     * Set the value of prix_vente
     *
     * @return  self
     */ 
    public function setPrix_vente($prix_vente): self
    {
        $this->prix_vente = $prix_vente;

        return $this;
    }

    /**
     * Get the value of no_utilisateur
     */ 
    public function getNo_utilisateur()
    {
        return $this->no_utilisateur;
    }
    
    /**
     * Get the value of no_categorie
     */ 
    public function getNo_categorie()
    {
        return $this->no_categorie;
    }
    
    /**
     * Set the value of no_categorie
     *
     * @return  self
     */ 
    public function setNo_categorie($no_categorie)
    {
        $this->no_categorie = $no_categorie;

        return $this;
    }
    
    /**
     * Get the value of created_at
     */ 
    public function getCreated_at(): DateTime
    {
        return new DateTime($this->created_at);
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at(string $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    

    

}