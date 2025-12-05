<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><title>Exercício 5</title></head>
<body>
<h2>Área do Triângulo Retângulo</h2>

<form method="post">
  Base: <input type="number" name="base" required><br><br>
  Altura: <input type="number" name="altura" required><br><br>
  <input type="submit" value="Calcular">
</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $b=$_POST["base"]; $h=$_POST["altura"];
  $area=($b*$h)/2;
  echo "<p>A área do triângulo de base $b m e altura $h m é $area m².</p>";
}
?>
</body>
</html>
