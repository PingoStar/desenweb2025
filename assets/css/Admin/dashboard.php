<?php
require_once __DIR__ . '/../Includes/conexao.php';
require_once __DIR__ . '/../Includes/funcoes.php';
proteger_pagina_admin();

$stmt = $pdo->query("
    SELECT p.id, p.texto, AVG(a.resposta) AS media, COUNT(a.id) AS total
    FROM perguntas p
    LEFT JOIN avaliacoes a ON a.id_pergunta = p.id
    WHERE p.status = true
    GROUP BY p.id, p.texto
    ORDER BY p.id
");
$rows = $stmt->fetchAll();
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Dashboard</title></head><body>
<h2>Dashboard</h2>
<p>Olá, <?php echo htmlspecialchars($_SESSION['admin_usuario']); ?> — <a href="logout.php">Sair</a></p>
<table border="1" cellpadding="6">
  <tr><th>ID</th><th>Pergunta</th><th>Média</th><th>Total respostas</th></tr>
  <?php foreach ($rows as $r): ?>
    <tr>
      <td><?php echo $r['id']; ?></td>
      <td><?php echo htmlspecialchars($r['texto']); ?></td>
      <td><?php echo $r['media'] !== null ? number_format($r['media'],2) : '---'; ?></td>
      <td><?php echo $r['total']; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
</body></html>
