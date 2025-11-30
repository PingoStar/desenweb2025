<?php
include 'includes/conexao.php';
include 'includes/funcoes.php';

$departamento_id = $_GET['departamento'] ?? 0;

// Perguntas por departamento
$perguntas = $pdo->prepare("SELECT * FROM perguntas WHERE id_departamento=? ORDER BY id");
$perguntas->execute([$departamento_id]);
$perguntas = $perguntas->fetchAll(PDO::FETCH_ASSOC);

// Departamento
$departamento = $pdo->prepare("SELECT * FROM departamentos WHERE id=?");
$departamento->execute([$departamento_id]);
$departamento = $departamento->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Avaliação - <?= htmlspecialchars($departamento['nome']) ?></title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2>Avaliação do Departamento: <?= htmlspecialchars($departamento['nome']) ?></h2>

<form id="avaliacaoForm" method="POST" action="salvar_avaliacao.php">
  <input type="hidden" name="departamento_id" value="<?= $departamento_id ?>">

  <?php foreach($perguntas as $p): ?>
    <div class="pergunta">
      <p><?= htmlspecialchars($p['texto']) ?></p>
      <div class="escala">
        <?php for($i=0;$i<=10;$i++): ?>
          <div class="botao-nota" data-valor="<?= $i ?>" onclick="document.getElementById('nota_<?= $p['id'] ?>').value=<?= $i ?>"><?= $i ?></div>
        <?php endfor; ?>
      </div>
      <input type="hidden" name="resposta_<?= $p['id'] ?>" id="nota_<?= $p['id'] ?>" required>
    </div>
  <?php endforeach; ?>

  <div class="pergunta">
    <p>Comentário ou sugestão de melhoria:</p>
    <textarea name="comentario" placeholder="Digite aqui o que poderia melhorar..."></textarea>
  </div>

  <button type="submit">Enviar Avaliação</button>
</form>

<div id="mensagem" class="oculto">
  <p>Obrigado! Sua avaliação foi registrada com sucesso.</p>
</div>

<script src="assets/js/script.js"></script>
</body>
</html>

