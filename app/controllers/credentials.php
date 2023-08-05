<?php
namespace controllers;
class credentials{
    public $userName;
    public $name;
    public $email;
    public $password;
    public $confirmPassword;
    public $err=[];
    public function pswdLen(){
        return ((strlen($this->password) >= 8) ? true:false);
        }
    public function pswdMatch(){
        return (($this->password === $this->confirmPassword)?true:false);
        }
    public function uNameLen(){
        return ((strlen($this->userName) >= 5)?true:false);
    }
    public function emailValidate(){
        return ((filter_var($this->email,FILTER_VALIDATE_EMAIL))?true:false);
    }
    public function throwErrors(){
        return $this->err;
    }
    public function __construct(string $userName,string $name,string $email,string $password,string $confirmPassword){
        $this->userName=$userName;
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
        $this->confirmPassword=$confirmPassword;
    }
}