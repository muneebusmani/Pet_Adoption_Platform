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
                    $con = new conn('sqlsrv', 'localhost', 'Pet Adoption Platform', 'sa', 'muneeb123', array("Encrypt" => 1,"TrustServerCertificate" => 0));
                    $conn=$con->create();
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
                        if ($stmt->execute([$uName,$fName,$email,$password,$cPassword,$role])) {
                            echo "
                            <script>
                            alert('Sign Up Success');
                            </script>";
                            $user=new type($this->uName,$this->fName,$this->email,$this->password,$this->cPassword,$this->role);
                            $credentials=$user->load_profile();
                        }
                    }
                    else{
                        echo 
                        "<script>
                        alert('User Already Exists')
                        </script>";
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