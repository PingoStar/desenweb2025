<?php
require_once __DIR__ . '/../Includes/conexao.php';
require_once __DIR__ . '/../Includes/funcoes.php';
proteger_pagina_admin();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['novo_texto'])) {
    $texto = $_POST['novo_texto'];
    $stmt = $pdo->prepare("INSERT INTO perguntas (texto) VALUES (:t)");
    $stmt->execute([':t' => $texto]);
    header('Location: perguntas.php'); exit;
}

$qs = $pdo->query("SELECT id, texto, status FROM perguntas ORDER BY id");
$perguntas = $qs->fetchAll();
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Perguntas</title></head><body>
<h2>Perguntas</h2>
<p><a href="dashboard.php">Voltar</a></p>

<form method="post">
  <input name="novo_texto" placeholder="Nova pergunta..." required>
  <button>Adicionar</button>
</form>

<table border="1" cellpadding="6">
  <tr><th>ID</th><th>Texto</th><th>Status</th></tr>
  <?php foreach ($perguntas as $p): ?>
    <tr>
      <td><?php echo $p['id']; ?></td>
      <td><?php echo htmlspecialchars($p['texto']); ?></td>
      <td><?php echo $p['status'] ? 'ativo' : 'inativo'; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
</body></html>
