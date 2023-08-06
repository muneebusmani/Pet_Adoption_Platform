<?php
namespace controllers;
class type
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
    }
}