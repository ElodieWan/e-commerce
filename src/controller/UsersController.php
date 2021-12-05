<?php

namespace App\controller;

use App\repository\UsersRepository;
use App\view\View;

class UsersController
{
    private View $view;
    private UsersRepository $usersRepository;

    public function __construct()
    {
        $this->view = new View();
        $this->usersRepository = new UsersRepository();
    }

    public function read(int $id)
    {
        $this->view->render('home', ['name' => 'test']);
    }

    public function connexion()
    {
        $this->view->render("/UsersView/login");
    }

    public function inscription()
    {
        $this->view->render("/UsersView/inscription");
    }

    public function login()
    {
        $login = "champs vide";
        if ('POST' === $_SERVER['REQUEST_METHOD'] && isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $login = $this->usersRepository->login($username, $_POST['password']);
            if (!(is_string($login))) {
                session_start();
                $_SESSION['connecter'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['authority'] = $login->getAuthority();
                $login = "connexion réussite";
            }
        }
        $this->view->render("/UsersView/login", ["message" => $login]);
    }

    public function create()
    {
        $message = "formulaire non rempli";
        if ('POST' === $_SERVER['REQUEST_METHOD'] && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
            if (!$this->usersRepository->checkExist($_POST['username'])) {
                if (!(is_string($message = $this->usersRepository->createAccount($_POST)))) {
                   $message="inscription réussi";
                };
            }
            $message="nom d'utilisateur existant";
        }
        $this->view->render('i/UsersView/inscription', ["message" => $message]);
    }
}
