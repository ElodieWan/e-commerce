<?php

namespace App\repository;

use App\Database;
use App\model\ArticleModel;

class ArticleRepository extends Database
{
    private $connection;

    public function __construct()
    {
        $this->connection = $this->getConnection();
    }

    public function createArticle(ArticleModel $article) : bool
    {
        $sql = 'INSERT INTO articles VALUES (:id, :date, :titre, :contenu, :auteur, :etat)';
        $result = $this->createQuery($sql, [
            ':id' => $article->getId(),
            ':title' => $article->getDate(),
            ':content' => $article->getTitre(),
            ':createdAt' => $article->getContenu(),
            'updatedAt' => $article->getAuteur(),
            'deletedAt' => $article->getEtat(),
        ]);
        return (bool) $result->rowCount();
    }

    public function getLast3(): array
    {
        $prep = $this->connection->prepare("SELECT article_id, article_titre, article_contenu FROM articles WHERE article_etat = 1 ORDER BY article_date DESC");
        $prep->execute();
        return $prep->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getNumberArticles(): int
    {
        $prep = $this->connection->prepare("SELECT count(*) AS 'nb' FROM articles WHERE article_etat = 1");
        $prep->execute();
        return ($prep->fetch())['nb'];
    }

    public function getAll(): array
    {
        $prep = $this->connection->prepare("SELECT * FROM articles");
        $prep->execute();
        $result = $prep->fetchAll(\PDO::FETCH_ASSOC);
        $res = array();
        foreach ($result as $row) {
            array_push($res, ($this->buildObject($row)));
        }
        return $res;
    }

    public function checkExist(int $id): bool
    {
        $sql = 'SELECT * FROM articles WHERE article_id=:id';
        $result = $this->createQuery($sql, [':id' => $id]);
        return (bool) $result->rowCount();
    }

    public function getById(int $id)
    {
        $sql = 'SELECT * FROM articles WHERE article_id=:id AND article_etat=:etat';
        if ($this->checkExist($id)) {
            $result = $this->createQuery($sql, [':id' => $id, ':etat' => 1]);
            return $this->buildObject($result->fetch());
        }
        return false;
    }

    public function buildObject($row): ArticleModel
    {
        $article = new ArticleModel();
        $article->setId($row['article_id']);
        $article->setDate($row['article_date']);
        $article->setTitre($row['article_titre']);
        $article->setContenu($row['article_contenu']);
        $article->setAuteur($row['article_auteur']);
        $article->setEtat($row['article_etat']);

        return $article;
    }
}
