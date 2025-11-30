<?php
include 'includes/conexao.php';
include 'includes/funcoes.php';

$departamentos = pegarDepartamentos($pdo);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escolher Departamento</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <h2>Escolha o Departamento</h2>
  <div class="departamentos-container">
    <?php foreach($departamentos as $d): ?>
      <div class="departamento-card" onclick="escolherDepartamento(<?= $d['id'] ?>)">
        <?= $d['nome'] ?>
      </div>
    <?php endforeach; ?>
  </div>

  <script>
  function escolherDepartamento(id) {
    window.location.href = 'avaliar.php?departamento=' + id;
  }
  </script>
</body>
</html>
