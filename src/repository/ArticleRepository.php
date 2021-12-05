<?php

namespace App\repository;

use App\Database;
use App\model\ArticleModel;

class ArticleRepository extends Database
{
    public function createArticle(ArticleModel $article) : bool
    {
        $sql = 'INSERT INTO articles VALUES (:date, :titre, :description, :marque, :etat)';
        $result = $this->createQuery($sql, [
            ':date' => $article->getDate(),
            ':titre' => $article->getTitre(),
            ':description' => $article->getDescription(),
            'marque' => $article->getMarque(),
            'etat' => $article->getEtat(),
        ]);
        return (bool) $result->rowCount();
    }

    public function getLast3(): array
    {
        $prep = $this->createQuery("SELECT * FROM articles WHERE etat = 1 ORDER BY DATE DESC LIMIT 3");
        $result = $prep->fetchAll(\PDO::FETCH_ASSOC);
        $res = array();
        foreach ($result as $row) {
            array_push($res, ($this->buildObject($row)));
        }
        return $res;
    }

    public function getNumberArticles(): int
    {
        $prep = $this->createQuery("SELECT count(*) AS 'nb' FROM articles WHERE etat = 1");
        return ($prep->fetch())['nb'];
    }

    public function getAll(): array
    {
        $prep = $this->createQuery("SELECT * FROM articles");
        $result = $prep->fetchAll(\PDO::FETCH_ASSOC);
        $res = array();
        foreach ($result as $row) {
            array_push($res, ($this->buildObject($row)));
        }
        return $res;
    }

    public function checkExist(int $id): bool
    {
        $result = $this->createQuery('SELECT * FROM articles WHERE id=:id', [':id' => $id]);
        return (bool) $result->rowCount();
    }

    public function getById(int $id)
    {
        if ($this->checkExist($id)) {
            $result = $this->createQuery('SELECT * FROM articles WHERE id=:id AND etat=:etat', 
            [':id' => $id, ':etat' => 1]);
            return $this->buildObject($result->fetch());
        }
        return false;
    }

    public function updateArticle(ArticleModel $article) : bool
    {
        return 1;
    }

    public function buildObject($row): ArticleModel
    {
        $article = new ArticleModel();
        $article->setId($row['id']);
        $article->setDate($row['date']);
        $article->setTitre($row['titre']);
        $article->setDescription($row['description']);
        $article->setMarque($row['marque']);
        $article->setPrix($row['prix']);
        $article->setImage($row['image']);
        $article->setEtat($row['etat']);

        return $article;
    }
}
