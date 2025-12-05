<?php
// Arquivo: grava_json.php
$arquivo = "pessoas.json";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Sanitização dos dados
    $nome       = filter_var($_POST["nome"] ?? "", FILTER_SANITIZE_SPECIAL_CHARS);
    $sobrenome  = filter_var($_POST["sobrenome"] ?? "", FILTER_SANITIZE_SPECIAL_CHARS);
    $email      = filter_var($_POST["email"] ?? "", FILTER_SANITIZE_EMAIL);
    $senha      = filter_var($_POST["senha"] ?? "", FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade     = filter_var($_POST["cidade"] ?? "", FILTER_SANITIZE_SPECIAL_CHARS);
    $estado     = filter_var($_POST["estado"] ?? "", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($nome) || empty($email)) {
        echo "Erro: Nome e Email são obrigatórios!";
        exit;
    }

    // Cria array da pessoa
    $pessoa = [
        "nome"      => $nome,
        "sobrenome" => $sobrenome,
        "email"     => $email,
        "senha"     => $senha,
        "cidade"    => $cidade,
        "estado"    => $estado
    ];

    // Lê o arquivo se existir
    if (file_exists($arquivo)) {
        $json = file_get_contents($arquivo);
        $dados = json_decode($json, true);
        if (!is_array($dados)) $dados = [];
    } else {
        $dados = [];
    }

    // Adiciona a nova pessoa
    $dados[] = $pessoa;

    // Salva no arquivo JSON
    file_put_contents($arquivo, json_encode($dados, JSON_PRETTY_PRINT));

    echo "Pessoa salva com sucesso!<br>";
    echo '<a href="cadastro_json.html">Voltar ao cadastro</a>';

} else {
    echo "Acesso inválido.";
}
?>
