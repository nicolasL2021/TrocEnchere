<?php

namespace App\Model;

use DateTime;

class User {

    private $no_utilisateur;
    private $pseudo;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $rue;
    private $code_postal;
    private $ville;
    private $mot_de_passe;
    private $credit;
    private $administrateur;
    private $created_at;

    /**
     * Get the value of id
     */ 
    public function getId(): ?int
    {
        return $this->no_utilisateur;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($no_utilisateur): self
    {
        $this->no_utilisateur = $no_utilisateur;

        return $this;
    }

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of telephone
     */ 
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */ 
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of rue
     */ 
    public function getRue(): ?string
    {
        return $this->rue;
    }

    /**
     * Set the value of rue
     *
     * @return  self
     */ 
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get the value of codePostal
     */ 
    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    /**
     * Set the value of codePostal
     *
     * @return  self
     */ 
    public function setCodePostal($code_postal)
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille(): ?string
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword(): ?string
    {
        return $this->mot_de_passe;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    /**
     * Get the value of credit
     */ 
    public function getCredit(): ?int
    {
        return $this->credit;
    }

    /**
     * Set the value of credit
     *
     * @return  self
     */ 
    public function setCredit($credit)
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Get the value of admin
     */ 
    public function getAdmin(): bool
    {
        return $this->administrateur;
    }

    /**
     * Set the value of admin
     *
     * @return  self
     */ 
    public function setAdmin($administrateur)
    {
        $this->administrateur = $administrateur;

        return $this;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }
}