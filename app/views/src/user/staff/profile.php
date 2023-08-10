<?php
if ($_SESSION['role'] !=='Adopter') {
    header("Location: " . "../forbidden");
}
include ('../../../../controllers/connection.inc.php');
$credentials=models\usermodel::load_profile_u($conn, $_SESSION['username']);
print_r($credentials);
