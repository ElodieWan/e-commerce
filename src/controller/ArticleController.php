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

    public function createNewArticle()
    {
        $this->view->render("/ArticleView/newArticle");
    }

    public function modifArt($id, $data = []) {
      if ($this->articleRepository->checkExist($id)) {
          $article = $this->articleRepository->getById($id);
          }

          $this->view->render("/ArticleView/modifArticle", [
              "article" => $article
          ]);
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
        $message = "formulaire non rempli";
        if ('POST' === $_SERVER['REQUEST_METHOD'] && isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['marque'])&& isset($_POST['prix'])) {
            if (!(is_string($message = $this->articleRepository->createArticle($_POST)))) {
                $message = "ajout réussi";
            };
        }
        $this->view->render('/ArticleView/newArticle', ["message" => $message]);
    }


    public function modif(int $idbis) {

      if (isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['marque'])&& isset($_POST['prix'])) {
        try {
          $this->articleRepository->modifArticle(['id' => $idbis]);
          $this->view->render('/ArticleView/readAll');

          }
        }
     }


    public function deleteBis(int $idbis)
    {
        $this->articleRepository->deleteArticlebis(['id' => $idbis]);    }
}
