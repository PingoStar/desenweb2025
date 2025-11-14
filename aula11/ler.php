<?php

echo "TESTE - O arquivo carregou!<br>";

$arquivo = "dados.txt";

if (!file_exists($arquivo)) {
    echo "Arquivo não encontrado.";
    exit;
}

$conteudo = file_get_contents($arquivo);
echo "<pre>$conteudo</pre>";
?>
