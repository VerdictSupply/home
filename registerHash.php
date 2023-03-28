<?php
session_start();
require_once('config.php');

if(isset($_POST['register'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Validate input
  $errors = array();
  if(empty($email)) { $errors[] = "email field is required"; }
  if(empty($password)) { $errors[] = "Password field is required"; }
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = "Invalid email format"; }

  // Create connection to mysql db
  $servername = "localhost";
  $username = "verdictsupply";
  $password = "password";
  $conn = new mysqli($servername, $username, $password);
  
  //output any mysql db connection errors
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
  
  // Check if email already exists
  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $stmt->execute(['email' => $email]);
  $user = $stmt->fetch();
  if($user){
    if($user['email'] === $email) { $errors[] = "email already exists"; }
  }

  // If no errors, hash password and insert user into database
  if(count($errors) === 0){
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
    $stmt->execute(['email' => $email, 'password' => $hashed_password);
    $_SESSION['success'] = "Registration successful!";
    $conn->close();
    header("Location: login.php");
    return;
  }
}
?>
