<?php
include 'includes/conexao.php';

// Verifica se o ID do departamento foi passado
if(!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['erro' => 'ID do departamento não fornecido']);
    exit;
}

$depId = (int) $_GET['id'];

// Busca todas as perguntas ativas deste departamento
$stmt = $pdo->prepare("SELECT id, texto FROM perguntas WHERE id_departamento = :dep AND status = true ORDER BY id");
$stmt->execute([':dep' => $depId]);
$perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Reorganiza para garantir que a última pergunta seja de feedback
// Vamos supor que a última pergunta contém "O que poderia melhorar" no texto
$feedbackIndex = null;
foreach($perguntas as $k => $p){
    if(stripos($p['texto'], 'melhorar') !== false){
        $feedbackIndex = $k;
        break;
    }
}

if($feedbackIndex !== null && $feedbackIndex !== count($perguntas)-1){
    // Remove a pergunta de feedback da posição atual
    $feedback = $perguntas[$feedbackIndex];
    unset($perguntas[$feedbackIndex]);
    // Reindexa array
    $perguntas = array_values($perguntas);
    // Coloca a pergunta de feedback no final
    $perguntas[] = $feedback;
}

header('Content-Type: application/json');
echo json_encode($perguntas);
?>