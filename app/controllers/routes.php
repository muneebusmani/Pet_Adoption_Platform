<?php
namespace controllers;
class routes{
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
    public function get(){
        $uriAQuery=$this->clean();
        $uri=$uriAQuery[0];
        if(empty($uri)){
            $uri='index';
        }
        require $this->userDir.$uri.$this->xt;
    }
    function __construct($uri){
        $this->uri=$uri;
    }

}
