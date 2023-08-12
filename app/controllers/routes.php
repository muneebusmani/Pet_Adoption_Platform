<?php
namespace controllers;
class routes {
    private $projRoot='/Pet_Adoption_Platform';
    private $uri;
    private $userDir="public/src/user/";
    private $adminDir="public/src/admin/";
    private $xt=".php";
    private $assets='public/assets';

    private function clean(){
        $uri=$this->uri;
        $uri=str_replace('/Pet_Adoption_Platform/','',$uri);
        return explode('?',$uri);
    }
    public function routes(){
        return [
            "",
            "home",
            "index",
            "contact",
            "support",
            "register",
            "profile",
            "login",
            "staff/profile",
            "adopter/profile",
            "forbidden",
            "handler",
            "$this->assets/css/dist/style.css",
        ];
    }
    public function get(){
        $uriAQuery=$this->clean();
        $uri=$uriAQuery[0];
        $errDir="public/error404.php";
        if(empty($uri)){
            $uri='index';
        }
        $file=$this->userDir.$uri.$this->xt;
        if (file_exists($file) && in_array($uri, $this->routes())
        ) {
            require $file;
        }
        else {
            require $errDir;
        }
    }
    function __construct($uri){
        $this->uri=$uri;
    }

}
