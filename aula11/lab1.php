<?php
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$pass = "pingo"; // sua senha

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");

if ($conn) {
    echo "Conexão realizada com sucesso!<br>";
} else {
    echo "Erro ao conectar.<br>";
    exit;
}

$result = pg_query($conn, "SELECT version()");
$row = pg_fetch_assoc($result);

echo "PostgreSQL versão: " . $row['version'];
?>
