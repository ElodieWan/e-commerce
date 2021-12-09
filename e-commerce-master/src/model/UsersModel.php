<?php

namespace App\model;

class UsersModel
{
    private int $id;
    private String $username;
    private String $email;
    private String $password;
    private int $authority;
    private int $panier;

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }

    public function getUsername() : String
    {
        return $this->username;
    }

    public function setUsername(String $username) : self
    {
        $this->username = $username;
        return $this;
    }

    public function getEmail() : String
    {
        return $this->email;
    }

    public function setEmail(String $email) : self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword() : String
    {
        return $this->password;
    }

    public function setPassword(String $password) : self
    {
        $this->password = $password;
        return $this;
    }

    public function getAuthority() : int
    {
        return $this->authority;
    }

    public function setAuthority(int $authority) : self
    {
        $this->authority = $authority;
        return $this;
    }

    public function getPanier() : int
    {
        return $this->panier;
    }

    public function setPanier(int $panier) : self
    {
        $this->panier = $panier;
        return $this;
    }
}