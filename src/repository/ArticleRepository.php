<?php

namespace App\repository;

use App\Database;
use App\model\ArticleModel;

class ArticleRepository extends Database
{
    public function createArticle(array $data = [])
    {
        $result = $this->createQuery('INSERT INTO articles (date, titre, description, marque, prix, image, etat) VALUES (:date, :titre, :description, :marque, :prix, :image, :etat)', [
            ':date' => date("Y-m-d"),
            ':titre' => $data['titre'],
            ':description' => $data['description'],
            ':marque' => $data['marque'],
            ':prix' => $data['prix'],
            ':image' => "https://via.placeholder.com/150",
            ':etat' => 1

        ]);
        return (bool) $result->rowCount();
    }


    public function deleteArticle(int $id): bool
    {
        $prep = $this->createQuery("DELETE FROM articles WHERE id=:id", [':id' => $id]);
        return (bool) $prep->rowCount();
    }

    public function modifArticle($id, $data = []): bool
    {
        $prep = $this->createQuery("UPDATE articles SET titre=:titre, description=:description, marque=:marque, prix=:prix WHERE id=:id", [
            ':id' => $id,
            ':titre' => $data['titre'],
            ':description' => $data['description'],
            ':marque' => $data['marque'],
            ':prix' => $data['prix'],

        ]);
        return (bool) $prep->rowCount();
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
            $result = $this->createQuery(
                'SELECT * FROM articles WHERE id=:id AND etat=:etat',
                [':id' => $id, ':etat' => 1]
            );
            return $this->buildObject($result->fetch());
        }
        return false;
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
