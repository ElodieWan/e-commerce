<?php
namespace App\model;

class ArticleModel
{
    private int $id;
    private String $date;
    private String $titre;
    private String $description;
    private String $marque;
    private int $prix;
    private String $image;
    private bool $etat;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }
    
    public function getDate() : String
    {
        return $this->date;
    }

    public function setDate(String $date) : self
    {
        $this->date = $date;
        return $this;
    }

    public function getTitre() : String
    {
        return $this->titre;
    }

    public function setTitre(String $titre):self
    {
        $this->titre = $titre;
        return $this;
    }

    public function getDescription():String
    {
        return $this->description;
    }

    public function setDescription(String $description):self
    {
        $this->description = $description;
        return $this;
    }

    public function getMarque() : String
    {
        return $this->marque;
    }

    public function setMarque(String $marque) : self
    {
        $this->marque = $marque;
        return $this;
    }

    public function getPrix() : int
    {
        return $this->prix;
    }

    public function setPrix(int $prix) : self
    {
        $this->prix = $prix;
        return $this;
    }

    public function getImage() : String
    {
        return $this->image;
    }

    public function setImage(String $image) : self
    {
        $this->image = $image;
        return $this;
    }

    public function getEtat() : bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat) : self
    {
        $this->etat = $etat;
        return $this;
    }
}