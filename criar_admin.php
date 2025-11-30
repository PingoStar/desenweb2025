<?php
require_once __DIR__ . '/Includes/conexao.php';

$usuario = 'admin';
$senha = '1234';

$senha_hash = password_hash($senha, PASSWORD_BCRYPT);

$stmt = $pdo->prepare("SELECT 1 FROM usuarios_admin WHERE usuario = :u");
$stmt->execute([':u' => $usuario]);

if ($stmt->fetch()) {
    echo "Usuário admin já existe!";
} else {
    $ins = $pdo->prepare("INSERT INTO usuarios_admin (usuario, senha_hash) VALUES (:u, :s)");
    $ins->execute([':u' => $usuario, ':s' => $senha_hash]);
    echo "Admin criado com sucesso!";
}
?>
