<?php
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$pass = "pingo";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");

if (!$conn) {
    die("Erro ao conectar.");
}

$busca = "";
$sql = "SELECT * FROM TBPESSOA";

if (isset($_GET['q']) && $_GET['q'] !== "") {
    $busca = $_GET['q'];
    $sql = "SELECT * FROM TBPESSOA WHERE PESNOME ILIKE '%$busca%'";
}

$result = pg_query($conn, $sql);
?>

<h2>Lista de Pessoas</h2>

<form method="GET">
    Buscar por nome:
    <input type="text" name="q" value="<?= $busca ?>">
    <button type="submit">Buscar</button>
</form>

<br>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Email</th>
        <th>Cidade</th>
        <th>Estado</th>
    </tr>

<?php
while ($row = pg_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['pescodigo']."</td>";
    echo "<td>".$row['pesnome']."</td>";
    echo "<td>".$row['pessobrenome']."</td>";
    echo "<td>".$row['pesemail']."</td>";
    echo "<td>".$row['pescidade']."</td>";
    echo "<td>".$row['pesestado']."</td>";
    echo "</tr>";
}
?>

</table>

<br>
<a href="cadastro.html">Cadastrar nova pessoa</a>
