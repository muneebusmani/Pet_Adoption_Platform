<?php
namespace controllers;
use models\conn;
use controllers\validation;
class handling extends credentials{
    function handleUserReg(){
            $validation=new validation($this->uName,$this->fName,$this->email,$this->password,$this->cPassword);
            if ($validation->validateUserReg()){
                $con = new conn('sqlsrv', 'localhost', 'Pet Adoption Platform', 'sa', 'muneeb123', array("Encrypt" => 1,"TrustServerCertificate" => 0));
                $conn=$con->create();
                $stmt=$conn->prepare("[if exists] ?,?");
                $stmt->execute([$this->uName,$this->email]);
                $row=$stmt->fetch();
                if (!$row){
                    $stmt=$conn->prepare("userReg ?,?,?,?,?");
                    if ($stmt->execute([$this->uName,$this->fName,$this->email,$this->password,$this->role])) {
                        echo "
                        <script>
                        alert('Sign Up Success');
                        </script>";
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