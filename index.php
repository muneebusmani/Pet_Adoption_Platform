<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "autoloader.php";
session_start();
$_ENV['conn']=$con->init();
foreach ($_ENV as $key => $value) {
    $$key=$value;
}
$route=new controllers\routes($_SERVER['REQUEST_URI']);
$route->get();