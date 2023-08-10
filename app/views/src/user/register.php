<?php
foreach ($_POST as $key => $value) {
    $$key = $value;
}
if (isset($_POST['submit'])) {
    $handling = new models\user($uName, $fName, $email, $password, $cPassword, $role);
    if (($creds = $handling->handleUserReg())) {
        $_SESSION=array_merge($_SESSION,$creds);
        header("location: handler");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/dist/style.css">
</head>
<body>
    <form method="post" class="bg-zinc-600">
        <div class="w-full">
            <label  for="username">Username:</label><br>
            <input value="<?php echo (isset($_POST['uName'])) ? "$uName": ''?>" type="text" id="username" name="uName">
        </div><br>

        <div class="w-full">
            <label for="fullName">Full Name:</label><br>
            <input value="<?php echo (isset($_POST['fName'])) ? "$fName": ''?>" type="text" id="fullName" name="fName">
        </div><br>

        <div class="w-full">
            <label for="email">Email:</label><br>
            <input value="<?php echo (isset($_POST['email'])) ? "$email": ''?>" type="email" id="email" name="email">
        </div><br>

        <div class="w-full">
            <label for="password">Password:</label><br>
            <input value="<?php echo (isset($_POST['password'])) ? "$password": ''?>" type="password" id="password" name="password">
        </div><br>

        <div class="w-full">
            <label for="cPassword">Confirm Password:</label><br>
            <input value="<?php echo (isset($_POST['cPassword'])) ? "$cPassword": ''?>" type="password" id="cPassword" name="cPassword">
        </div><br>

        <div class="w-full">
            <label for="role">Role</label><br>
            <select name="role" id="personRole">
                <option disabled selected></option>
                <option value="Adopter">Adopter</option>
                <option value="Shelter Staff">Shelter Staff</option>
            </select>
        </div><br>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>