<?php
require "config.php";
session_start();

$email = $_POST['email'] ?? '';
$pass  = $_POST['password'] ?? '';

if (!$email || !$pass) {
    echo "Completati toate câmpurile!";
    exit;
}

$sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email]);
$user = $stmt->fetch();

if(!$user){
    echo "Email neînregistrat!";
    exit;
}

if($pass !== $user['password']){ // dacă nu ai hash, compari direct
    echo "Parolă incorectă!";
    exit;
}

$_SESSION['user_id'] = $user['id'];
$_SESSION['email']   = $user['email'];
$_SESSION['role']    = $user['role'];

// Răspuns corect pentru JS
if($user['role'] === "admin"){
    echo "admin";
} else {
    echo "user";
}
exit;
?>
