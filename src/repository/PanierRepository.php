<?php

namespace App\repository;

use App\Database;
use App\repository\ArticleRepository;

class PanierRepository extends Database
{
    public function addArticle($data = []) : bool //data = : id d'Users et id de l'article
    {
        $prep = $this->createQuery("INSERT INTO panier_articles VALUES (:idUsers, :idArticles)", [
            ':idUsers'=>$data['idUsers'],
            ':idArticles'=>$data['idArticles']
        ]);
        return (bool) $prep->rowCount();
    }

    public function deleteArticle($data = []) : bool
    {
        $prep = $this->createQuery("DELETE FROM panier_articles WHERE idUsers=:idUsers AND idArticles=:idArticles", [
            ':idUsers'=>$data['idUsers'],
            ':idArticles'=>$data['idArticles']
        ]);
        return (bool) $prep->rowCount();
    }

    public function getArticlesByUsers(int $id) : array
    {
        $prep = $this->createQuery("SELECT * FROM articles JOIN panier_articles pa ON pa.idArticles = articles.id WHERE (SELECT id FROM users WHERE users.id = pa.idUsers AND users.id =:id'", ['id' => $id]);
        $result = $prep->fetchAll(\PDO::FETCH_ASSOC);
        $res = array();
        foreach ($result as $row) {
            $article = new ArticleRepository();
            array_push($res, ($article->buildObject($row)));
        }
        return $res;
    }
}
