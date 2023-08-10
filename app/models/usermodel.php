<?php
namespace models;
use PDO;
class usermodel{
    public $conn;
    public string $uName;
    public string $email;
    function __construct($conn,string $uName,string $email){
        $this->conn=$conn;
        $this->uName=$uName;
        $this->email=$email;
    }
    function load_profile()
    {
        global $conn;
        $sql="profile_fetch ?,?";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute([$this->uName,$this->email]);
        $Profile=$stmt->fetch($conn::FETCH_OBJ);
        return $Profile;
    }
    static function load_profile_u($conn,$username){
        $query="[fetch profile via username] ?";
        $stmt=$conn->prepare($query);
        $stmt->bindParam(1,$username,PDO::PARAM_STR);
        $stmt->execute();
        $profile=$stmt->fetch(PDO::FETCH_ASSOC);
        return $profile;
    }
}