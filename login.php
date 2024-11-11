<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect the data from the form
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Read the users from the file
    $users = file('users.txt');
    
    foreach ($users as $user) {
        list($storedUsername, $storedPassword) = explode(',', trim($user));
        
        // Check if the username matches and password is correct
        if ($username === $storedUsername && password_verify($password, $storedPassword)) {
            $_SESSION['username'] = $username; // Set session variable for logged-in user
            header('Location: dashboard.php'); // Redirect to the dashboard after login
            exit;
        }
    }

    // If we reach here, login failed
    $errorMessage = "Invalid username or password.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h2>Login</h2>

    <?php if (isset($errorMessage)) { echo "<p style='color:red;'>$errorMessage</p>"; } ?>

    <form method="POST">
        <label for="username">Username: </label>
        <input type="text" name="username" required><br><br>
        
        <label for="password">Password: </label>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
    
    <p>Don't have an account? <a href="register.html">Register here</a></p>

</body>
</html>
