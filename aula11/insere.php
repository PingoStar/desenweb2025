<?php
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$pass = "pingo"; // senha correta

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");

if (!$conn) {
    die("Erro ao conectar.");
}

$sql = "INSERT INTO TBPESSOA (PESNOME, PESSOBRENOME, PESEMAIL, PESPASSWORD, PESCIDADE, PESESTADO)
        VALUES ($1, $2, $3, $4, $5, $6)";

$params = [
    $_POST['nome'],
    $_POST['sobrenome'],
    $_POST['email'],
    $_POST['senha'],
    $_POST['cidade'],
    $_POST['estado']
];

$result = pg_query_params($conn, $sql, $params);

if ($result) {
    echo "Cadastro realizado com sucesso!<br>";
} else {
    echo "Erro ao cadastrar.<br>";
}

echo '<br><a href="cadastro.html">Voltar ao cadastro</a>';
echo '<br><a href="listar.php">Listar cadastros</a>';
?>

