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
            $resultat = $this->buildObject($prep);
            if (password_verify($password, $resultat->getPassword())) {
                return $resultat;
            }
            $message='incorrect password';
        }
        return $message;
    }

    public function createAccount(UsersModel $users) : bool
    {
        $prep = $this->createQuery('INSERT INTO users VALUE :username, :email, :password, :authority', [
            ':username'=>$users->getUsername(),
            ':email'=>$users->getEmail(),
            ':password'=>password_hash($users->getPassword(), PASSWORD_DEFAULT),
            'autorithy'=>$users->getAutorithy()
        ]);
        return (bool) $prep->rowCount();
    }

    public function buildObject($row): UsersModel
    {
        $users = new UsersModel();
        $users->setUsername($row['username']);
        $users->setEmail($row['email']);
        $users->setPassword($row['password']);
        $users->setAuthority($row['authority']);

        return $users;
    }
}