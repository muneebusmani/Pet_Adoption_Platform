<?php
namespace controllers\user;
use controllers\type;

class credentials extends type
{
    private $err = [];

    public function pswdLen()
    {
        return (strlen($this->password) >= 8) ? true : false;
    }

    public function pswdMatch()
    {
        return ($this->password === $this->cPassword) ? true : false;
    }

    public function uNameLen()
    {
        return (strlen($this->uName) >= 5) ? true : false;
    }

    public function emailValidate()
    {
        return (filter_var($this->email, FILTER_VALIDATE_EMAIL)) ? true : false;
    }

    public function throwErrors()
    {
        return $this->err;
    }

    public function __construct(string $uName, string $fName, string $email, string $password, string $cPassword)
    {
        $this->uName = $uName;
        $this->fName = $fName;
        $this->email = $email;
        $this->password = $password;
        $this->cPassword = $cPassword;
    }

    public function emptyCheck()
    {
        return (!empty($this->uName) && !empty($this->fName) && !empty($this->email) && !empty($this->password) && !empty($this->role)) ? true : false;
    }
}
