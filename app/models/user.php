<?php
namespace models;
use controllers\type;
use controllers\user\validation;
class user extends conn{
    
        protected $uName;
        protected $fName;
        protected $email;
        protected $password;
        protected $cPassword;
        protected $role;
        public function handleUserReg()
        {
                $validation=new validation($this->uName,$this->fName,$this->email,$this->password,$this->cPassword);
                if ($validation->validateUserReg()){
                    $con=new conn();
                    $conn=$con->init();
                    $stmt=$conn->prepare("[if exists] ?,?");
                    $stmt->execute([$this->uName,$this->email]);
                    $row=$stmt->fetch();
                    if (!$row){
                        $stmt=$conn->prepare("userReg ?,?,?,?,?");
                        $uName=$this->uName;
                        $fName=$this->fName;
                        $email=$this->email;
                        $password=$this->password;
                        $cPassword=$this->cPassword;
                        $role=$this->role;
                        if ($stmt->execute([$uName,$fName,$email,$password,$role])) {
                            echo "
                            <script>
                            alert('Sign Up Success');
                            </script>";
                            $user=new type($this->uName,$this->fName,$this->email,$this->password,$this->cPassword,$this->role);
                            return $user->load_profile();
                        }
                    }
                    else{
                        echo 
                        "<script>
                        alert('User Already Exists')
                        </script>";
                        return false;
                    }
                }
        }
        public function __construct($uName,$fName,$email,$password,$cPassword,$role) {
            $this->uName=$uName;
            $this->fName=$fName;
            $this->email=$email;
            $this->password=$password;
            $this->cPassword=$cPassword;
            $this->role=$role;
        }
    }