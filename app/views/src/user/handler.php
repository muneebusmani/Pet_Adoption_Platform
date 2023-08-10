<?php
$username=$_SESSION['username'];
$role=$_SESSION['role'];


switch ($profile['role']) {

    case 'Shelter Staff':
        header('location: staff/profile');
        break;

    case 'Adopter':
        header('location: adopter/profile');
        break;
}