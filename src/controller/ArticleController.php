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

    public function read($id, $data = [])
    {
        if ($this->articleRepository->checkExist($id)) {
            if(isset($data["message"])) {
                $this->view->render("/ArticleView/read", [
                    "article" => $this->articleRepository->getById($id),
                    "message" => $data['message']
                ]);
            }
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

      $this->ArticleRepository->createArticle(['idUsers' => $idUsers, 'idArticles' => $id]);
      $article = new ArticleController();
      $article->read($id, ['message' => "Ajout avec succès"]);

      $message = "formulaire non rempli";
      if ('POST' === $_SERVER['REQUEST_METHOD'] && isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['marque']) && isset($_POST['prix'])) {
          if (!(is_string($message = $this->articleRepository->createArticle($_POST)))) {
              $message = "ajout article réussi";
          }
      }
      $this->view->render('ArticleView/newArticle', ["message" => $message]);
      //$this->view->render('i/ArticleView/newArticle', ["message" => $message]);

    }

    public function modif() {

    }
}
