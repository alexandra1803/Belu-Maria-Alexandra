<?php
// ------------------ PDO (pentru proiectul studenti) ------------------
$host = 'localhost';
$port = 3310;
$db   = 'studenti';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "Eroare conectare DB (PDO): " . $e->getMessage();
    exit;
}


// ------------------ MySQLi (pentru proiectul TW) ------------------
$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("Eroare conexiune MySQLi: " . mysqli_connect_error());
}
?>
