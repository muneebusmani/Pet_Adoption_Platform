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
        $this->email=$Profile->email;
        $this->uName=$Profile->username;
        $this->password=$Profile->password;

        return array(
            'username'=>$this->uName,
            'email'=>$this->email,
            'full_name'=>$this->fName,
            'password'=>$this->password
        );
}
}