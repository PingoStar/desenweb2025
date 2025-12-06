<?php
require_once __DIR__ . '/../Includes/conexao.php';
require_once __DIR__ . '/../Includes/funcoes.php';
proteger_pagina_admin();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'])) {
    $stmt = $pdo->prepare("INSERT INTO dispositivos (nome) VALUES (:n)");
    $stmt->execute([':n' => $_POST['nome']]);
    header('Location: dispositivos.php'); exit;
}

$qs = $pdo->query("SELECT id, nome, status FROM dispositivos ORDER BY id");
$rows = $qs->fetchAll();
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Dispositivos</title></head><body>
<h2>Dispositivos</h2>
<p><a href="dashboard.php">Voltar</a></p>

<form method="post">
  <input name="nome" placeholder="Nome do dispositivo" required>
  <button>Adicionar</button>
</form>

<table border="1" cellpadding="6">
  <tr><th>ID</th><th>Nome</th><th>Status</th></tr>
  <?php foreach ($rows as $r): ?>
    <tr>
      <td><?php echo $r['id']; ?></td>
      <td><?php echo htmlspecialchars($r['nome']); ?></td>
      <td><?php echo $r['status'] ? 'ativo' : 'inativo'; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
</body></html>
