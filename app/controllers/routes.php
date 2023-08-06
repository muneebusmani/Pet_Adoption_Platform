<?php
namespace controllers;
class routes {
    private $projRoot='/Pet_Adoption_Platform';
    private $uri;
    private $userDir="app/views/src/user/";
    private $adminDir="app/views/src/admin/";
    private $xt=".php";

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
        ];
    }
    public function get(){
        $uriAQuery=$this->clean();
        $uri=$uriAQuery[0];
        $errDir="app/views/error404.php";
        if(empty($uri)){
            $uri='index';
        }
        $file=$this->userDir.$uri.$this->xt;
        if (file_exists($file) && in_array($uri, $this->routes())) {
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
