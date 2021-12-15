<?php

namespace App\controller;

use App\repository\PanierRepository;
use App\view\View;
use App\controller\ArticleController;

class PanierController
{
    private View $view;
    private PanierRepository $panierRepository;

    public function __construct()
    {
        $this->view = new View();
        $this->panierRepository = new PanierRepository();
    }

    public function read($data = [])
    {
        session_start();
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
        session_write_close();
        $articles = $this->panierRepository->getArticlesByUsers($id);
        $prix = $this->panierRepository->getTotalPrix($id);
        if (isset($data["message"])) {
            $this->view->render("/PanierView/read", [
                'username' => $username,
                'articles' => $articles,
                'prix' => $prix,
                'message' => $data['message']
            ]);
        }
        $this->view->render("/PanierView/read", [
            'username' => $username,
            'articles' => $articles,
            'prix' => $prix
        ]);
    }

    public function ajout(int $id)
    {
        session_start();
        $idUsers = $_SESSION['id'];
        $connecter = $_SESSION['connecter'];
        session_write_close();
        $this->panierRepository->addArticle(['idUsers' => $idUsers, 'idArticles' => $id]);
        $article = new ArticleController();
        $article->read($id, ['message' => "Ajout avec succès"]);
    }

    public function delete(int $id)
    {
        session_start();
        $idUsers = $_SESSION['id'];
        $this->panierRepository->deleteArticle(['idUsers' => $idUsers, 'idArticles' => $id]);
        session_write_close();
        $this->read(["message" => "suppression réussite"]);
    }
}
