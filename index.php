<link rel="stylesheet" href="app/views/assets/dist/style.css">
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "autoloader.php";
session_start();
$con=new models\conn();
$conn=$_ENV['conn']=$con->init();
foreach ($_ENV as $key => $value) {
    $$key=$value;
}
$route=new controllers\routes($_SERVER['REQUEST_URI']);
$route->get();