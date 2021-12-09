<?php

namespace App\repository;

use App\Database;
use App\model\UsersModel;

class UsersRepository extends Database
{

    public function login(String $username, String $password)
    {
        $message='incorrect username';
        $prep = $this->createQuery('SELECT * FROM users WHERE username=:username', [':username'=>$username]);
        if((bool) $prep->rowCount()) {
            $resultat = $this->buildObject($prep->fetch());
            if (password_verify($password, $resultat->getPassword())) {
                return $resultat;
            }
            $message='incorrect password';
        }
        return $message;
    }

    public function checkExist(String $username) : bool
    {
        $prep = $this->createQuery('SELECT * FROM users WHERE username=:username', [':username'=>$username]);
        return (bool) $prep->rowCount();
    }

    public function createAccount(array $data=[])
    {
        $prep = $this->createQuery('INSERT INTO users (username, email, password, authority) VALUES (:username, :email, :password, :authority)', [
            ':username'=>$data['username'],
            ':email'=>$data['email'],
            ':password'=>password_hash($data['password'], PASSWORD_DEFAULT),
            'authority'=>1
        ]);
        return (bool) $prep->rowCount();
    }

    public function buildObject($row): UsersModel
    {
        $users = new UsersModel();
        $users->setId($row['id']);
        $users->setUsername($row['username']);
        $users->setEmail($row['email']);
        $users->setPassword($row['password']);
        $users->setAuthority($row['authority']);
        $users->setPanier($row['panier']);

        return $users;
    }
}