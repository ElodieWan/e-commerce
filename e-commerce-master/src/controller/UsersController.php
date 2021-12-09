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
    public function connexion()
    {
        $this->view->render("/UsersView/login");
    }

    public function inscription()
    {
        $this->view->render("/UsersView/inscription");
    }

    public function deconnexion()
    {
        session_start();
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
        $this->view->render("/UsersView/login", ['message' => "déconnexion réussite"]);
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
                $_SESSION['id'] = $login->getId();
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
                  $message = "inscription réussi";
              };
          }
          $message = "nom d'utilisateur existant";
      }
        $this->view->render('UsersView/inscription', ["message" => $message]);
        //$this->view->render('i/UsersView/inscription', ["message" => $message]);
    }
}
