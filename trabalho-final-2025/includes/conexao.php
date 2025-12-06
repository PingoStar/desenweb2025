<?php
$host = 'localhost';
$db   = 'avaliacao';
$user = 'postgres';
$pass = 'pingo'; // coloque a senha correta
$port = "5432";

$dsn = "pgsql:host=$host;port=$port;dbname=$db;";
try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

