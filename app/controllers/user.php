<?php
namespace controllers;
class user
{
    private $userName;
    private $name;
    private $email;
    private $password;
    private $role;

    function __construct(string $userName,string $name,string $email,string $password,string $confirmPassword,string $role,) {
        $this->userName         =$userName;
        $this->name             =$name;
        $this->email            =$email;
        $this->password         =$password;
        $this->role             =$role;
    }
    private function session(){
        $this->userName         =$_SESSION['userName'];
        $this->name             =$_SESSION['name'];
        $this->email            =$_SESSION['email'];
        $this->password         =$_SESSION['password'];
        $this->role             =$_SESSION['role'];
    }
}