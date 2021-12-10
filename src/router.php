<?php

namespace App;

use App\controller\UsersController;
use App\controller\ArticleController;
use App\controller\PanierController;

class Router
{
    public function run()
    {
        $route = $_GET['route'] ?? null;
        $action = $_GET['action'] ?? null;

        if (isset($_GET['route'])) {
            if ('article' === $route) {
                $article = new ArticleController();

                if ($action) {
                    if ('read' === $action && isset($_GET['id'])) {
                        $article->read($_GET['id']);
                    } elseif ('newArt' === $action) {
                        $article->createNewArticle();
                    } elseif ('create' === $action) {
                        $article->create();
                    } elseif ('delete' === $action && isset($_GET['id'])) {
                        $article->delete($_GET['id']);
                    } elseif ('modifArt' === $action && isset($_GET['id'])) {
                        $article->modifArt($_GET['id']);
                    } elseif ('modif' === $action) {
                        $article->modif($_GET['id']);
                    }
                }
                $article->readAll();
            }    elseif ('users' === $route && $action) {
                $users = new UsersController();
                if ('connexion' === $action) {
                    $users->connexion();
                } elseif ('inscription' === $action) {
                    $users->inscription();
                } elseif ('login' === $action) {
                    $users->login();
                } elseif ('deconnexion' === $action) {
                    $users->deconnexion();
                } elseif ('create' === $action) {
                    $users->create();
                }
            } elseif ('shopping' === $route && $action) {
                $panier = new PanierController();
                if ('read' === $action) {
                    $panier->read();
                }
                if ('ajout' === $action && isset($_GET['id'])) {
                    $panier->ajout($_GET['id']);
                }
                if ('delete' === $action && isset($_GET['id'])) {
                    $panier->delete($_GET['id']);
                }
            } else {
                require_once 'index.php';
            }
        }
    }
}
