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

    public function read($id)
    {
        if ($this->articleRepository->checkExist($id)) {
            $this->view->render("/ArticleView/read", [
                "article" => $this->articleRepository->getById($id)
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
