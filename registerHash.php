<?php
session_start();
require_once('config.php');

if(isset($_POST['register'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  // Validate input
  $errors = array();
  if(empty($username)) { $errors[] = "Username field is required"; }
  if(empty($password)) { $errors[] = "Password field is required"; }
  if(empty($email)) { $errors[] = "Email field is required"; }
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = "Invalid email format"; }

  // Check if username or email already exists
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
  $stmt->execute(['username' => $username, 'email' => $email]);
  $user = $stmt->fetch();
  if($user){
    if($user['username'] === $username) { $errors[] = "Username already exists"; }
    if($user['email'] === $email) { $errors[] = "Email already exists"; }
  }

  // If no errors, hash password and insert user into database
  if(count($errors) === 0){
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
    $stmt->execute(['username' => $username, 'password' => $hashed_password, 'email' => $email]);
    $_SESSION['success'] = "Registration successful!";
    header("Location: login.php");
    return;
  }
}
?>
