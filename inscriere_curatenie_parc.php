<?php
session_start();
require "config.php";

if(!isset($_SESSION['user_id'])){
    echo "Trebuie să fii autentificat!";
    exit;
}

$id_user = $_SESSION['user_id'];

$nume  = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$day   = $_POST['day'] ?? '';
$skills = $_POST['skills'] ?? '';

if(!$nume || !$email || !$phone || !$day){
    echo "Completează toate câmpurile obligatorii!";
    exit;
}

$sql = "INSERT INTO inscrieri_curatenie_parc
        (id_user, nume, email, telefon, zi_disponibila, observatii)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        $id_user,
        $nume,
        $email,
        $phone,
        $day,
        $skills
    ]);
    echo "success";
} catch(Exception $e){
    echo "Eroare la salvare!";
}
