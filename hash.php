<?php
// Start session
session_start();

// Check if form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to database
    $conn = mysqli_connect('localhost', 'username', 'password', 'database');

    // Check for SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if username and password match
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $row['id'];

            // Redirect to home page
            header('Location: home.php');
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid username.";
    }

    // Close database connection
    mysqli_close($conn);
}
?>
