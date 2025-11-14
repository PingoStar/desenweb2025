<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><title>Exercício 6</title></head>
<body>
<h2>Joãozinho na Feira</h2>

<form method="post">
  Maçã (kg): <input type="number" step="0.1" name="maca" required><br>
  Melancia (kg): <input type="number" step="0.1" name="melancia" required><br>
  Laranja (kg): <input type="number" step="0.1" name="laranja" required><br>
  Repolho (kg): <input type="number" step="0.1" name="repolho" required><br>
  Cenoura (kg): <input type="number" step="0.1" name="cenoura" required><br>
  Batatinha (kg): <input type="number" step="0.1" name="batata" required><br><br>
  <input type="submit" value="Calcular">
</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $precos=[
    "maca"=>6,"melancia"=>3,"laranja"=>4,"repolho"=>2.5,"cenoura"=>3.5,"batata"=>4
  ];
  $total=
    $_POST["maca"]*$precos["maca"]+
    $_POST["melancia"]*$precos["melancia"]+
    $_POST["laranja"]*$precos["laranja"]+
    $_POST["repolho"]*$precos["repolho"]+
    $_POST["cenoura"]*$precos["cenoura"]+
    $_POST["batata"]*$precos["batata"];

  $dinheiro=50;

  echo "<p>Total da compra: R$ ".number_format($total,2,',','.')."</p>";

  if($total>$dinheiro){
    $dif=$total-$dinheiro;
    echo "<p style='color:red'>Faltou R$ ".number_format($dif,2,',','.')."</p>";
  }elseif($total<$dinheiro){
    $sobrou=$dinheiro-$total;
    echo "<p style='color:blue'>Joãozinho ainda pode gastar R$ ".number_format($sobrou,2,',','.')."</p>";
  }else{
    echo "<p style='color:green'>Saldo esgotado! Gastou exatamente R$ 50,00.</p>";
  }
}
?>
</body>
</html>
