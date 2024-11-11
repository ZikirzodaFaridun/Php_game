<?php
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect the data from the form, trimming spaces to prevent unnecessary errors
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Check if the username and password are provided
    if (empty($username) || empty($password)) {
        echo "Username and password are required. <a href='register.html'>Go back</a>";
        exit;
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare user data for storage
    $userData = $username . "," . $hashedPassword . "\n";

    // Append user data to the file
    if (file_put_contents('users.txt', $userData, FILE_APPEND | LOCK_EX)) {
        echo "Registration successful! You can <a href='login.html'>Login</a> now.";
    } else {
        echo "An error occurred. Please try again. <a href='register.html'>Go back</a>";
    }
} else {
    // Redirect to register page if not a POST request
    header('Location: register.html');
    exit;
}
?>
