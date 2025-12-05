<?php
include 'includes/conexao.php';

// Busca departamentos do banco
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

<!-- Tela de abertura inicial -->
<div id="intro">
  <div class="intro-content">
    <img src="imagens/logo.png" alt="Logo da Loja">
    <h1>Bem-vindo ao Sistema de Avaliação</h1>
    <p>Suas respostas nos ajudam a melhorar continuamente nossos serviços.</p>
    <button id="startBtn">Iniciar Avaliação</button>
  </div>
</div>

<!-- Tela de escolha de departamento -->
<div id="splash" style="display:none;">
  <div class="splash-content">
    <h1>Escolha o Departamento</h1>
    <div class="departamentos">
      <?php foreach($departamentos as $dep): ?>
        <div class="dep-box" data-id="<?php echo $dep['id']; ?>">
          <?php echo $dep['nome']; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- Questionário -->
<div class="container" id="questionario" style="display:none;">
  <h1 id="dep-title"></h1>
  <p>Por favor, avalie cada aspecto do nosso serviço. Clique na nota correspondente <br>(0 = ruim / 10 = excelente).</p>

  <form id="avaliacaoForm">
    <div id="perguntas-container"></div>
  </form>

  <div id="mensagem" class="oculto">
    <p>O estabelecimento agradece sua resposta! Ela é muito importante para nós e nos ajuda a melhorar continuamente nossos serviços.</p>
  </div>
</div>

<script src="assets/js/script.js"></script>
</body>
</html>
