<?php
include "config.php";

$email = $_POST['email'];
$password = $_POST['password'];

// VALIDARE PAROLĂ MINIM 6 CARACTERE
if(strlen($password) < 6){
    echo "Parola trebuie să aibă minim 6 caractere!";
    exit;
}

// VALIDARE EMAIL EXISTENT
$check = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' LIMIT 1");

if(mysqli_num_rows($check) > 0){
    echo "Acest email este deja înregistrat!";
    exit;
}

// INSERARE CU ROL = user
$sql = "INSERT INTO users (email, password, role) VALUES ('$email', '$password', 'user')";

if(mysqli_query($conn, $sql)){
    echo "Cont creat cu succes!";
} else {
    echo "Eroare la înregistrare: " . mysqli_error($conn);
}
?>
