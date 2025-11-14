<?php
$arquivo_json = "pessoas.json";
$arquivo_serializado = "dados2.txt";

if (!file_exists($arquivo_json)) {
    echo "Arquivo JSON não encontrado.";
    exit;
}

// Lê o conteúdo do JSON
$conteudo_json = file_get_contents($arquivo_json);
$dados = json_decode($conteudo_json, true);

// Cria arquivo serializado
file_put_contents($arquivo_serializado, serialize($dados));

echo "Arquivo serializado criado com sucesso!<br>";
echo '<a href="listar.php">Ver lista de pessoas</a>';
?>
