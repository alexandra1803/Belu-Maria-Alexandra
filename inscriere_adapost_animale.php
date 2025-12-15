<?php
session_start();
require "config.php";

if (!isset($_SESSION['user_id'])) {
    echo "Trebuie să fii autentificat pentru a te înscrie!";
    exit;
}

$id_user = $_SESSION['user_id'];

$nume  = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$telefon = $_POST['phone'] ?? '';
$disponibilitate = $_POST['availability'] ?? '';
$skills = $_POST['skills'] ?? '';

if (!$nume || !$email || !$telefon || !$disponibilitate) {
    echo "Completează toate câmpurile obligatorii!";
    exit;
}

$sql = "INSERT INTO inscrieri_adapost_animale
        (id_user, nume, email, telefon, disponibilitate, skills)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        $id_user,
        $nume,
        $email,
        $telefon,
        $disponibilitate,
        $skills
    ]);
    echo "success";
} catch (Exception $e) {
    echo "Eroare la inserare: " . $e->getMessage();
}
