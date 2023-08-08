<?php
// Get the custom header value
$creds = $_SERVER['HTTP_CUSTOM_DATA'];

if ($creds) {
    // Decode the base64-encoded JSON data
    $creds = base64_decode($creds);

    // Decode the JSON data into an associative array
    $creds = json_decode($creds, true);

    // Now you can use the decoded data
    $username = $decodedData['username'];
    $password = $decodedData['password'];

    // Example: Display the decoded data
    echo "Username: $username<br>";
    echo "Username: $email<br>";
    echo "Username: $full_name<br>";
    echo "Password: $password<br>";
} else {
    echo "No custom data found.";
}
?>
