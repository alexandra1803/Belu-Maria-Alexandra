<?php
session_start();
require "config.php";

if(!isset($_SESSION['user_id'])){
    echo "Trebuie să fii logat pentru a te înscrie!";
    exit;
}

$id_user = $_SESSION['user_id'];

$nume    = $_POST['name']    ?? '';
$email   = $_POST['email']   ?? '';
$telefon = $_POST['phone']   ?? '';
$atelier = $_POST['atelier'] ?? '';
$skills  = $_POST['skills']  ?? '';

if(!$nume || !$email || !$telefon || !$atelier){
    echo "Toate câmpurile obligatorii trebuie completate!";
    exit;
}

$sql = "INSERT INTO inscrieri_atelier_copii (id_user, nume, email, telefon, atelier, skills)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([$id_user, $nume, $email, $telefon, $atelier, $skills]);
    echo "success";
} catch (Exception $e){
    echo "Eroare la inserare: " . $e->getMessage();
}
?>
