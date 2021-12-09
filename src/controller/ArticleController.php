<?php

namespace App\controller;

use App\view\View;
use App\repository\ArticleRepository;

class ArticleController
{
    private View $view;
    private ArticleRepository $articleRepository;

    public function __construct()
    {
        $this->view = new View();
        $this->articleRepository = new ArticleRepository();
    }

    public function read($id, $data = [])
    {
        if ($this->articleRepository->checkExist($id)) {
            session_start();
            $article = $this->articleRepository->getById($id);
            $href="index.php?route=users&action=connexion";
            if(isset($_SESSION['connecter'])) {
                $href="index.php?route=shopping&action=ajout&id=".$article->getId();
            }
            session_write_close();
            if(isset($data["message"])) {
                $this->view->render("/ArticleView/read", [
                    "article" => $article,
                    "href" => $href,
                    "message" => $data['message']
                ]);
            }
            $this->view->render("/ArticleView/read", [
                "article" => $article,
                "href" => $href
            ]);
        }
    }

    public function readAll()
    {
        $this->view->render("/ArticleView/readAll", [
            "articles" => $this->articleRepository->getAll(),
            "rowCount" => (((int)($this->articleRepository->getNumberArticles()/3))+1)*3,
            "articlesNumber" => $this->articleRepository->getNumberArticles()
        ]);
    }

    public function create()
    {
    }

    public function modif() {
        
    }
}
