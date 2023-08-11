<?php
if ($_SESSION['role'] !=='Adopter') {
    header("Location: " . "../forbidden");
}
$con=new models\conn();
$conn=$_ENV['conn']=$con->init();
$credentials=models\usermodel::load_profile_u($conn, $_SESSION['username']);
print_r($credentials);
