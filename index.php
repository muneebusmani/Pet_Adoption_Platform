<?php
declare (strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "autoloader.php";
session_save_path('D:/.tmp/');
session_start();


$con=new models\conn();
$conn=$_ENV['conn']=$con->init();
foreach ($_ENV as $key => $value) {
    $$key=$value;
}
echo <<<HTML
<link rel="stylesheet" href="public/assets/css/dist/style.css">
<script  src="public/assets/jquery/jquery-3.7.0.min.js"></script>
HTML;
$route=new controllers\routes($_SERVER['REQUEST_URI']);
$route->get();