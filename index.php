<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "autoloader.php";
session_start();
 
$conn=$_SESSION['conn']=new models\conn(
    'sqlsrv',
    'localhost',
    'management',
    'sa',
    'muneeb123',
    array("Encrypt" => 1,"TrustServerCertificate" => 0)
);
$route=new controllers\routes($_SERVER['REQUEST_URI']);
$route->get();