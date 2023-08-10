<?php
namespace controllers;
use models\usermodel;
class type
{
    protected $fName;
    protected $email;
    protected $uName;
    protected $password;
    protected $cPassword;
    protected $role;

    function __construct(string $userName,string $name,string $email,string $password,string $confirmPassword,string $role,) {
        $this->uName            =$userName;
        $this->fName            =$name;
        $this->email            =$email;
        $this->password         =$password;
        $this->role             =$role;
    }
    public function load_profile(){
        global $conn;
        $user=new usermodel($conn, $this->uName, $this->email);
        $Profile=$user->load_profile();

        $this->fName=$Profile->name;
        $this->uName=$Profile->username;

        return array(
            'username'=>$this->uName,
            'role'=>$this->role,
        );
}
}