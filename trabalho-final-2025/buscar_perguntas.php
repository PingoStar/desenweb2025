<?php
include 'includes/conexao.php';
include 'includes/funcoes.php';

// Recebe o id do departamento via GET
$depId = $_GET['id'] ?? 0;

// Busca perguntas específicas do departamento
$perguntas = pegarPerguntas($pdo, $depId);

// Retorna em JSON
header('Content-Type: application/json');
echo json_encode($perguntas);


