<?php

namespace App\controller;

use App\repository\ArticleRepository;

class ArticleController
{
    public function read($id)
    {
        $articleRepository = new ArticleRepository();
        if ($articleRepository->checkExist($id)) {
            header('Location: article.php?id=' . $id);
            exit();
        }
        header('Location: articles.php');
    }

    public function create()
    {
        $articleRepository = new ArticleRepository();
    }

    public function modif() {
        
    }
}
