<?php

namespace App;

use App\controller\ConnexionController;
use App\controller\PostController;

class Router
{
    public function run()
    {
        $route = $_GET['route'] ?? null;
        $action = $_GET['action'] ?? null;

        if (isset($_GET['route'])) {
            if ('post' === $route && $action) {
                //$postController = new PostController();
                $co = new ConnexionController();
                if ('create' === $action) {
                //    return $postController->create();
                } elseif ('read' === $action && isset($_GET['id'])) {
                    return $co->read($_GET['id']);
                //    return $postController->read($_GET['id']);
                }
            } elseif ('contact' === $route) {
                var_dump('contact');
            }
        } else {
            require_once 'index.php';
        }
    }
}
