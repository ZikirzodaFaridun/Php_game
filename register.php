<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect the data from the form
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT); // Encrypt password
    
    // Save user to a file (users.txt)
    $userData = $username . "," . $password . "\n";
    
    file_put_contents('users.txt', $userData, FILE_APPEND); // Append user data to file
    
    echo "Registration successful! You can <a href='login.html'>Login</a> now.";
} else {
    // If not a POST request, redirect to register page
    header('Location: register.html');
    exit;
}
?>
