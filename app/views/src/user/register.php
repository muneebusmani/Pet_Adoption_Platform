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
            <input type="text" id="username" name="uName">
        </div><br>

        <div class="w-full">
            <label for="fullName">Full Name:</label><br>
            <input type="text" id="fullName" name="fName">
        </div><br>

        <div class="w-full">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email">
        </div><br>

        <div class="w-full">
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password">
        </div><br>

        <div class="w-full">
            <label for="cPassword">Confirm Password:</label><br>
            <input type="password" id="cPassword" name="cPassword">
        </div><br>

        <div class="w-full">
            <label for="role">Role</label><br>
            <select name="role" id="role">
                <option disabled selected></option>
                <option value="Adopter">Adopter</option>
                <option value="Shelter Staff">Shelter Staff</option>
            </select>
        </div><br>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    foreach($_POST as $key => $value):
        $$key=$value;
    endforeach;
    $validation=new controllers\validation($uName,$fName,$email,$password,$cPassword);
    if ($validation->validateUserReg()){
        $conn->create();
        $conn->query("SELECT * FROM [management];");
    }   
}