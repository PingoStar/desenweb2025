<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><title>Exercício 1</title></head>
<body>
<h2>Soma de três valores</h2>

<form method="post">
  Valor 1: <input type="number" name="v1" required><br><br>
  Valor 2: <input type="number" name="v2" required><br><br>
  Valor 3: <input type="number" name="v3" required><br><br>
  <input type="submit" value="Calcular">
</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $v1=$_POST["v1"]; $v2=$_POST["v2"]; $v3=$_POST["v3"];
  $soma=$v1+$v2+$v3;

  if($v1>10){
    echo "<p style='color:blue'>Resultado: $soma</p>";
  }elseif($v2<$v3){
    echo "<p style='color:green'>Resultado: $soma</p>";
  }elseif($v3<$v1 && $v3<$v2){
    echo "<p style='color:red'>Resultado: $soma</p>";
  }else{
    echo "<p>Resultado: $soma</p>";
  }
}
?>
</body>
</html>
