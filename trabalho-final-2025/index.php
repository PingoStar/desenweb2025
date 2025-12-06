<?php
include 'includes/conexao.php';
$departamentos = $pdo->query("SELECT * FROM departamentos ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistema de Avaliação</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div id="intro">
  <div class="intro-content">
    <img src="imagens/logo.png" alt="Logo da Loja">
    <h1>Bem-vindo ao Sistema de Avaliação</h1>
    <p>Suas respostas nos ajudam a melhorar continuamente nossos serviços.</p>
    <button id="startBtn">Iniciar Avaliação</button>
  </div>
</div>

<div id="splash" style="display:none;">
  <div class="splash-content">
    <h1>Escolha o Departamento</h1>
    <div class="departamentos">
      <?php foreach($departamentos as $dep): ?>
        <div class="dep-box" data-id="<?= $dep['id'] ?>"><?= $dep['nome'] ?></div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div class="container" id="questionario" style="display:none;">
  <h1 id="dep-title"></h1>
  <p>Por favor, avalie cada aspecto do nosso serviço. Clique na nota correspondente <br>(0 = ruim / 10 = excelente).</p>
  <div id="perguntas-container"></div>
</div>

<!-- Mensagem de agradecimento -->
<div class="container" id="mensagem" style="display:none;">
  <h3>O estabelecimento agradece sua resposta e ela é muito importante para nós, pois nos ajuda a melhorar continuamente nossos serviços.</h3>
</div>

<script src="assets/js/script.js"></script>
</body>
</html>
