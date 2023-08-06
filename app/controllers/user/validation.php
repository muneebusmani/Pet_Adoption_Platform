<?php
namespace controllers\user;

class validation extends credentials{
    public function validateUserReg(){
        //Errors log into this array
        $err=[];

        //Error Messages
        $uNameErr="Username Not Valid";
        $emailValidateErr="Email Not Valid";
        $pswdLenErr="Password Must Be Longer than 8 characters";
        $pswdMatchErr="Passwords dont match";

        //Evaluation of Situation
        $uNameLenCheck=$this->uNameLen();
        $pswdLenCheck=$this->pswdLen();
        $pswdMatchCheck=$this->pswdMatch();
        $emailValidateCheck=$this->emailValidate();

        //Error Logging
        if (!$uNameLenCheck) {
            array_push($err,$uNameErr);
        }
        if (!$pswdLenCheck) {
            array_push($err,$pswdLenErr);
        }
        if (!$pswdMatchCheck) {
            array_push($err,$pswdMatchErr);
        }
        if (!$emailValidateCheck) {
            array_push($err,$emailValidateErr);
        }
               
        if($uNameLenCheck == true && $pswdLenCheck  == true && $pswdMatchCheck && $emailValidateCheck == true ){
            return true;
        }
        else{
            foreach($err as $er){
                echo 
                "<script>
                    alert('$er')
                </script>";
            }
        }
    }
}
