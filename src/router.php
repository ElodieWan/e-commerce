<?php

namespace App;

use App\controller\UsersController;
use App\controller\ArticleController;

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
                    if ('create' === $action) {
                    } elseif ('read' === $action && isset($_GET['id'])) {
                        return $article->read($_GET['id']);
                    }
                }
                return $article->readAll();
            } elseif ('users' === $route && $action) {
                $users = new UsersController();
                if ('connexion' === $action) {
                    $users->connexion();
                } elseif ('inscription' === $action) {
                    $users->inscription();
                } elseif ('login' === $action) {
                    $users->login();
                } elseif ('deconnexion' === $action) {
                } elseif ('create' === $action) {
                    $users->create();
                }
            } elseif ('shopping' === $route && $action) {
                if ('read' === $action) {
                }
            }
        } else {
            require_once 'index.php';
        }
    }
}
