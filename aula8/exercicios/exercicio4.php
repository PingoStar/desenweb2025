<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><title>Exercício 4</title></head>
<body>
<h2>Área do Retângulo</h2>

<form method="post">
  Lado A: <input type="number" name="a" required><br><br>
  Lado B: <input type="number" name="b" required><br><br>
  <input type="submit" value="Calcular">
</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $a=$_POST["a"]; $b=$_POST["b"];
  $area=$a*$b;

  $texto="A área do retângulo de lados $a e $b metros é $area metros quadrados.";
  if($area>10){
    echo "<h1>$texto</h1>";
  }else{
    echo "<h3>$texto</h3>";
  }
}
?>
</body>
</html>
