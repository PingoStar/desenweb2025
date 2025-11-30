<?php
include 'includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = json_decode(file_get_contents('php://input'), true);

    if (!$dados || !isset($dados['respostas'])) {
        http_response_code(400);
        echo json_encode(['erro' => 'Dados inválidos']);
        exit;
    }

    try {
        $pdo->beginTransaction();

        // Salvar notas
        $stmt = $pdo->prepare("INSERT INTO avaliacoes (id_pergunta, resposta) VALUES (:id_pergunta, :resposta)");
        foreach ($dados['respostas'] as $r) {
            $stmt->execute([
                ':id_pergunta' => $r['id_pergunta'],
                ':resposta' => $r['nota']
            ]);
        }

        // Salvar feedback textual
        if (!empty($dados['feedback']) && !empty($dados['feedback']['texto'])) {
            $stmtFeedback = $pdo->prepare("INSERT INTO avaliacoes (id_pergunta, feedback) VALUES (:id_pergunta, :feedback)");
            $stmtFeedback->execute([
                ':id_pergunta' => $dados['feedback']['id_pergunta'],
                ':feedback' => $dados['feedback']['texto']
            ]);
        }

        $pdo->commit();
        echo json_encode(['sucesso' => true]);

    } catch (Exception $e) {
        $pdo->rollBack();
        http_response_code(500);
        echo json_encode(['erro' => $e->getMessage()]);
    }
}
?>
