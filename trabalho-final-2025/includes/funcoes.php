<?php
function pegarDepartamentos($pdo) {
    $stmt = $pdo->query("SELECT * FROM departamentos ORDER BY id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function pegarDepartamento($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM departamentos WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// FUNÇÃO CORRIGIDA: pega perguntas **somente do departamento certo**
function pegarPerguntas($pdo, $departamento_id) {
    $stmt = $pdo->prepare("SELECT * FROM perguntas WHERE id_departamento = ? AND status = true ORDER BY id");
    $stmt->execute([$departamento_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
