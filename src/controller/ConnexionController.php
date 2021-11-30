<?php

namespace App\controller;

use App\repository\PostRepository;
use App\view\View;

class ConnexionController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function read(int $id)
    {
        $this->view->render('home', ['name' => 'test']);
    }
}