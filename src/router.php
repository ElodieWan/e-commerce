<?php

namespace App;

use App\controller\ConnexionController;
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
                        //    return $postController->create();
                    } elseif ('read' === $action && isset($_GET['id'])) {
                        return $article->read($_GET['id']);
                    }
                }
                return $article->readAll();
            } elseif ('login' === $route && $action) {
                if ('connexion' === $action) {
                } elseif ('deconnexion' === $action) {
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
