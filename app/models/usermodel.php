<?php
namespace models;
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
        $sql="profile_fetch ?,?";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute([$this->uName,$this->email]);
        $Profile=$stmt->fetch(conn::FETCH_OBJ);
        return $Profile;
    }
}