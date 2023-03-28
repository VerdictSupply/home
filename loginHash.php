<?php
// Start session
session_start();

// Check if form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to database
    $conn = mysqli_connect('localhost', 'username', 'password', 'verdictsupply');

    // Check for SQL injection
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email and password match
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $row['id'];
            // Login execution here
            // Redirect to home page
            header('Location: index.php');
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid email address.";
    }

    // Close database connection
    mysqli_close($conn);
}
?>
