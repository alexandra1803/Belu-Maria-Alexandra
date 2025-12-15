<?php
session_start();
require "config.php";

if (!isset($_SESSION['user_id'])) {
    echo "Trebuie să fii autentificat pentru a te înscrie!";
    exit;
}

$id_user = $_SESSION['user_id'];

$nume   = $_POST['name']  ?? '';
$email  = $_POST['email'] ?? '';
$telefon= $_POST['phone'] ?? '';
$zi     = $_POST['day']   ?? '';
$obs    = $_POST['skills'] ?? '';

if (!$nume || !$email || !$telefon || !$zi) {
    echo "Toate câmpurile obligatorii trebuie completate!";
    exit;
}

$sql = "INSERT INTO inscrieri_plantare_copaci 
        (id_user, nume, email, telefon, zi_disponibila, observatii)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        $id_user,
        $nume,
        $email,
        $telefon,
        $zi,
        $obs
    ]);
    echo "success";
} catch (Exception $e) {
    echo "Eroare la inserare: " . $e->getMessage();
}
