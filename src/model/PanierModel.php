<?php

namespace App\model;

class PanierModel
{
    private int $id;
    private int $idPanierArticles;

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id) : self
    {
        $this->id;
        return $this;
    }

    public function getIdPanierArticles() : int
    {
        return $this->idPanierArticles;
    }

    public function setIdPanierArticles(int $idPanierArticles) : self
    {
        $this->idPanierArticles = $idPanierArticles;
        return $this;
    }

}