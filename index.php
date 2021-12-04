<?php

require 'vendor/autoload.php';

use App\Router;
use App\view\View;
use App\repository\ArticleRepository;

$router = new Router();
$router->run();
$view = new View();
$articles = new ArticleRepository();
$view->render('\home', ['lastThree' => $articles->getLast3()]);
