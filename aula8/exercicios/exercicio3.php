<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><title>Exercício 3</title></head>
<body>
<h2>Área do Quadrado</h2>

<form method="post">
  Lado (m): <input type="number" name="lado" required>
  <input type="submit" value="Calcular">
</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $lado=$_POST["lado"];
  $area=$lado*$lado;
  echo "<p>A área do quadrado de lado $lado metros é $area metros quadrados.</p>";
}
?>
</body>
</html>
