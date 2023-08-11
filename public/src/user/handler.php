<?php
switch ($_SESSION['role']) {

    case 'Shelter Staff':
        header('location: staff/profile');
        break;

    case 'Adopter':
        header('location: adopter/profile');
        break;
    default:
    echo
    "
    <script>
        alert('Please Sign in');
        window.location.href='login';
    </script>
    ";
}