<?php
$arquivo = "pessoas.json";

// Verifica se o arquivo existe
if (!file_exists($arquivo)) {
    echo "Arquivo JSON não encontrado.";
    exit;
}

// Lê o conteúdo do JSON
$conteudo = file_get_contents($arquivo);
$dados = json_decode($conteudo, true);

// Verifica se existem registros
if (!$dados || count($dados) === 0) {
    echo "Nenhuma pessoa cadastrada ainda.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pessoas - JSON</title>
</head>
<body>

<h2>Lista de Pessoas</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Email</th>
        <th>Senha</th>
        <th>Cidade</th>
        <th>Estado</th>
    </tr>

    <?php foreach ($dados as $pessoa): ?>
        <tr>
            <td><?= htmlspecialchars($pessoa['nome']) ?></td>
            <td><?= htmlspecialchars($pessoa['sobrenome']) ?></td>
            <td><?= htmlspecialchars($pessoa['email']) ?></td>
            <td><?= htmlspecialchars($pessoa['senha']) ?></td>
            <td><?= htmlspecialchars($pessoa['cidade']) ?></td>
            <td><?= htmlspecialchars($pessoa['estado']) ?></td>
        </tr>
    <?php endforeach; ?>

</table>

<br>
<a href="cadastro_json.html">Cadastrar nova pessoa</a>

</body>
</html>
